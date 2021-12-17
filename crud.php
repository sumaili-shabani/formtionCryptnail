<!DOCTYPE html>
<html>
<head>
	<?php include("_meta.php") ?>
	 
	  
	 
</head>
<body>


<?php include("_navigation.php") ?>

<div class="container mt-4">
	<div class="col-md-12">
		<div class="row">

			<div class="col-md-12 mb-2">
				<div align="right">
			     <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
			    </div>
			</div>	

			<div class="col-md-12 mt-1">

				<!-- mes scripts -->
				<table id="user_data" class="table table-bordered table-striped">
			     <thead>
			      <tr>
			       <th width="5%">Image</th>
			       <th width="30%">Nom</th>
			       <th width="30%">Postnom</th>
			       <th width="25%">email</th>
			       <th width="5%">Edit</th>
			       <th width="5%">Del</th>
			      </tr>
			     </thead>

			     <tfoot>
			     	<tr>
			     	   <th width="5%">Image</th>
				       <th width="30%">Nom</th>
				       <th width="30%">Postnom</th>
				       <th width="25%">email</th>
				       <th width="5%">Edit</th>
				       <th width="5%">Del</th>
			     	</tr>
			     </tfoot>
			    </table>
				<!-- fin -->
				

			</div>



		</div>
	</div>
</div>


<!-- modal -->

<div id="userModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header bg-info">
     <h5 class="modal-title">Ajouter utilisateur</h5>
     <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
     
    </div>
    <div class="modal-body">
     <label>Entrez le nom</label>
     <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Entrez le nom" />
     <br />
     <label>Entrez le postnom</label>
     <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Entrez le postnom" />
     <br />

     <br />
     <label>Adresse e-mail</label>
     <input type="email" name="email" id="email" class="form-control" placeholder="nomdomaine@gmail.com" />
     <br />
     <label>Selectionner l'image</label>
     <input type="file" name="user_image" id="user_image" />
     <span id="user_uploaded_image"></span>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
    </div>
   </div>
  </form>
 </div>
</div>

<!-- fin modal -->



<?php include("_footer.php") ?>
<?php include("_script.php") ?>

<script type="text/javascript">
	$(document).ready(function() {
		// $('#user_data').DataTable();

		$(document).on('click', '#add_button', function(event) {
			event.preventDefault();
			/* Act on the event */

			  $('#user_form')[0].reset();
			  $('.modal-title').text("Ajouter");
			  $('#action').val("Add");
			  $('#operation').val("Add");
			  $('#user_uploaded_image').html('');

		});




		
		

		//formantage du tableau
		 var dataTable = $('#user_data').DataTable({
			  "processing":true,
			  "serverSide":true,
			  "order":[],
			  "ajax":{
			   url:"fetch.php",
			   type:"POST"
			  },
			  "columnDefs":[
			   {
			    "targets":[0, 3, 4],
			    "orderable":false,
			   },
			  ],

		 });

		$(document).on('submit', '#user_form', function(event) {
			event.preventDefault();
			/* Act on the event */

		  var firstName = $('#first_name').val();
		  var lastName = $('#last_name').val();
		  var email = $('#email').val();
		  var extension = $('#user_image').val().split('.').pop().toLowerCase();
		  if(extension != '')
		  {
		   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
		   {
		    alert("Invalid Image File");
		    $('#user_image').val('');
		    return false;
		   }
		  } 
		  if(firstName != '' && lastName != '' && email !='')
		  {
			   $.ajax({
			    url:"Insertion.php",
			    method:'POST',
			    data:new FormData(this),
			    contentType:false,
			    processData:false,
			    success:function(data)
			    {
			      alert(data);
			     $('#user_form')[0].reset();
			     $('#userModal').modal('hide');
			      dataTable.ajax.reload();
			    }
			   });
		  }
		  else
		  {
		   alert("Tous les champs sont requis!");
		  }



			
		});

		$(document).on('click', '.update', function(){
		  var user_id = $(this).attr("id");
		  $.ajax({
		   url:"fetch_single.php",
		   method:"POST",
		   data:{id:user_id},
		   dataType:"json",
		   success:function(data)
		   {

		   	// console.log(data.first_name);
		    $('#userModal').modal('show');
		    $('#first_name').val(data.first_name);
		    $('#last_name').val(data.last_name);
		     $('#email').val(data.email);
		    $('.modal-title').text("Edit User");
		    $('#user_id').val(user_id);
		    $('#user_uploaded_image').html(data.user_image);
		    $('#action').val("Edit");
		    $('#operation').val("Edit");
		   }
		  })
		});

		$(document).on('click', '.delete', function(){
		  var user_id = $(this).attr("id");

		  if(confirm("Etes-vous sûr de vouloir le supprimer?"))
		  {
		   $.ajax({
		    url:"delete.php",
		    method:"POST",
		    data:{id:user_id},
		    success:function(data)
		    {
		     alert(data);
		     dataTable.ajax.reload();
		    }
		   });
		  }
		  else
		  {
		   return false; 
		  }


	   });

		
 


	});
</script>


</body>
</html>