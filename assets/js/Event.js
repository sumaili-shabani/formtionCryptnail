var form = document.getElementById("my_form");
var btn_close = document.querySelector(".close");

function Showmessage(classe, message)
{
    var outhtml = "<div class='alert alert-"+classe+"'>"+message+"<button class='close' data-dismiss='alert'><i class='fa fa-close'></i></button></div>";
    return  outhtml;

}

function ShowText(texte)
{
    var sms = "";
    if (texte == "") {
        sms ="message";
    }
    else{
        sms = texte;
    }

    return sms;

}

const  login = (e)=>{
    e.preventDefault();

    var name = document.querySelector('#name').value;
    var pwd = document.querySelector('#pwd').value;
    var sms = document.querySelector('.message');

    var error_name = document.querySelector("#error_name");
    var error_pwd = document.querySelector("#error_pwd");

    var n ="patrona";
    var p = "123456";
    var message ="";

    if (name == "" && pwd == "") {
       message ="Veillez complèter le nom";
       error_name.innerText= ShowText(message);

       message ="Veillez complèter le mot de passe";
       error_pwd.innerText= ShowText(message);
    }
    else{

        if (pwd == "" && name !="") {
            message ="Veillez complèter le mot de passe";
            error_pwd.innerText= ShowText(message);
        }
        else if (pwd != "" && name =="") {
            message ="Veillez complèter le nom";
            error_name.innerText= ShowText(message);
        }
        else{

            error_name.innerText= "";
            error_pwd.innerText= "";


            if (name == n && pwd ==p) {

                message = "Félicitation 🆗";


                sms.innerHTML =Showmessage("success", message);
                // alert(message);
            }
            else{

                if (name != n && pwd == p) {
                    message = "Nom d'utilisateur incorrect";
                    document.querySelector('#name').value="";
                }
                else if(name== n && pwd != p){
                    message = "Mot de passe incorrect";
                    document.querySelector('#pwd').value = "";
                }
                else{
                    message = "Informations incorectes!!!!!";
                }
                
                sms.innerHTML =Showmessage("danger", message);
                // alert(message);
            }

        }

       
    }



};
		

form.addEventListener('submit', login);