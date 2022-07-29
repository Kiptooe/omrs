
function validatelogin() {
    var user=document.forms["login-form"]["username"].value;
    var pass=document.forms["login-form"]["password"].value;
    var branch=document.forms["login-form"]["key"].value;

    // if(!validate_select(branch, "branch-error"))
    // branch.focus();
    // else if(!validate_Name(user, "username-error"))
    // user.focus();
    // else if(!validate_password(pass, "psw-error"))
    // pass.focus();
    // else {

        $("#login").html("Loading...");

        
       $.ajax({
            url : "/login/validate_data",
            type : 'POST',
            data :  $('#form-login').serialize(),
            success : function(msg) {

              // alert(msg);

              if (msg==1) {
                
                window.location.href='/login/login';
                // $("#form-login").submit();


              }
              else {

                    $("#login").html(msg);

              }

            }

            
        });
    // } 
    
}

function validate_Date(date,error){

  var today1=new Date();
    var today2=new Date(date);



    var result = document.getElementById(error);

    result.style.display = "block";


    if (date.trim()==="") {
    result.innerHTML="invalid date"
    isValid=false;
    return false;




    }
        
       if (today2.getTime()<today1.getTime()){
            result.innerHTML="Date must be greater than today's date.";
          isValid=false;
          return false;


        }
        else {
            result.style.display = "none";

          isValid=true;
          return true;


        }
  }



function validate_integers(int,error){

  var result = document.getElementById(error);
  result.style.display = "block";

  if (isNaN(int)) {
    result.innerHTML = "Must be only numeric!";

    return false;
  }
  else{
    result.style.display = "none";

    return true;
  }

}

function validate_Name(name,error){

    var result = document.getElementById(error);
  result.style.display = "block";
  if(name.trim() == "") {
    result.innerHTML = "Must be filled out!";

    return false;
  }
  else{


  result.innerHTML = "Must contain only letters!";
  for(var i = 0; i < name.length; i++)
    if(!((name[i] >= 'a' && name[i] <= 'z') || (name[i] >= 'A' && name[i] <= 'Z') || name[i] == ' ')){
      return false;
    }
    else{
      result.style.display = "none";
    return true;
    }


  
  }

}

function identification(id_value,id_element){


  
  if (id_value==="national_id") {

    document.getElementById('national_id').style.display = "block";
    document.getElementById('birth_certificate').style.display = "none";
  }
  else if (id_value==="birth_certificate"){
    document.getElementById('birth_certificate').style.display = "block";
    document.getElementById('national_id').style.display = "none";

  }
  
  
}

function validateContactNumber(contact_number, error,second=null) {

  var result = document.getElementById(error);
  result.style.display = "block";
  if(contact_number.trim() =="") {

    if (second ==null) {
      result.innerHTML = "Must not be empty!";

      return false;
    }
    
  }
  else if(isNaN(contact_number)){
    result.innerHTML = "Must contain only numeric!";
    return false;
  }
  else if(contact_number.length != 10) {
    result.innerHTML = "Must contain 10 digits!";
    return false;
  }
  else
    result.style.display = "none";
  return true;
}


function validateAddress(address, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(address.trim() =="") {
    result.innerHTML = "Must not be empty!";

    return false;
  }
  else if(address.trim().length < 10 || address.trim() =="") {
    result.innerHTML = "Please enter more specific address!";

    return false;
  }
  else
    result.style.display = "none";

  return true;
}


function validate_identification(id,error){

  var result = document.getElementById(error);
  result.style.display = "block";
  if(id.trim() == "") {
    result.innerHTML = "Must be filled out!";
    return false;


  }
  else{

    if (isNaN(id)) {
      
      result.innerHTML = "Must contain only numeric characters!";

      return false;
    }
    else if(id.length !=8){
      result.innerHTML = "Must contain 8 characters!";

      return false;
    }
    else{
      result.style.display = "none";
        return true;
    }

  
  }


}

function validate_Email(email,error){

    var result = document.getElementById(error);
  result.style.display = "block";
  if(email.trim() == "") {
    result.innerHTML = "Must be filled out!";
    isValid=false;
    return false;


  }
    if(email.length > 40 ){
    result.innerHTML = "Must be atmost 40 characters!";
    isValid=false;
    return false;


    }
    else if(email.length <= 5){
    result.innerHTML = "Must be atleast 5 characters!";

    isValid=false;
    return false;


    }
  result.style.display = "none";
    isValid=true;
    return true;


}


function username_pass(value){
  if (value.trim() !='') {
    $(".pass-fld").css('display','block');

  }else{
    $(".pass-fld").css('display','none');

  }
}

var pass="";
var uname="";

function password_match(pass1,pass2){

    $("#password1-edit-error1").css('display','none');
    $("#password1-edit-error2").css('display','none');
    $("#btn-new-pass").attr("disabled", true);

    if (pass1.trim() !="") {



      if (pass2==1) {
        pass=pass1;
      }
      
      
      if (pass2==2 && pass.trim() !="") {

        if (pass1.length==pass.length) {

          if (pass1==pass) {

            $("#password1-edit-error2").css('display','block');
            $("#password1-edit-error2").css("color","green");
            $("#btn-new-pass").attr("disabled", false);

          }
          else{
            $("#password1-edit-error1").css('display','block');
            $("#password1-edit-error1").css("color","red");
            $("#btn-new-pass").attr("disabled", true);

          }
        }else{
          $("#password1-edit-error1").css('display','block');
          $("#password1-edit-error1").css("color","red");
          $("#btn-new-pass").attr("disabled", true);
        }

      
      }
      

      
    }
}


function validate_password(id,error){

  var result = document.getElementById(error);
  result.style.display = "block";
  if(id.trim() == "") {
    result.innerHTML = "Must be filled out!";
    return false;


  }
  else{

    
    if(id.length <5){
      result.innerHTML = "Must contain atleat 5 characters!";

      return false;
    }
    else{
      result.style.display = "none";
        return true;
    }

  
  }


}


function validate_select(select,error){
  var result = document.getElementById(error);
  result.style.display = "block";
  if(select.trim() =="") {
    result.innerHTML = "Must not be empty!";

    return false;
  }
  else

    if (select=="Patient") {
      $('#identification_type').css('display','block');
    }
    else{
      $('#identification_type').css('display','none');
      $('#birth_certificate').css('display','none');

    }
    result.style.display = "none";

  return true;
}



function isAdmin(){

	var username=$('#login-username').val();
	var password=$('#login-pswd').val();

	if (username.trim() !='' && password.trim() !='') {

		 $.ajax({
            url : "/home/IsAdmin",
            type : 'POST',
            data :  $('#form-login').serialize(),
            success:function(msg) {


              	if (msg==0) {
                

                  $('#reset-pass-div').css('display','none');
                  $('#register-div').css('display','block');



              	}
              	else if(msg==2) {

                       $('#key-div').css('display','block');


              	}
              else if(msg==1){

                       $('#register-div').css('display','none');
                       $('#key-div').css('display','none');


              }

            }
            

            
        });
     

   // $('#key-div').css('display','block');
	}
	else{
        $('#key-div').css('display','none');

	}
}

function password_reset(value){

  var email=$('#newpass_email').val();
  var password=$('#newpass').val();
  var code=$('#newpass_code').val();

  $('#password_update').html('Loading...')

 
  

  $.ajax({

    url:'/home/update_password',
    type:'POST',
    data:{
      email:email,
      code:code,
      password:password,
      value:value
    },
    success:function(msg){

      if(msg==1){

        $('#newpass_email').attr('readonly',true);
        $('#btn-code').css('display','none');
        $('.pass-code').css('display','block');
        $('#btn-conf-code').css('display','block');
        $('#password_update').html('Verification Code sent to your email.')
        
      }
      else if(msg==2){
        $('#newpass_code').attr('readonly',true);
        $('#btn-conf-code').css('display','none');
        $('.pass-fld').css('display','block');
        $('#btn-new-pass').css('display','block');
        $('#password_update').html('')
      }
      else if(msg==3){
        $('#newpass').attr('readonly',true);
        $('#btn-new-pass').attr('readonly',true);
        $('#psw-msg').css('display','block');
        $('#password_update').html('')

        // setTimeout('location.reload(true);',20000);

      }
      else{
        $('#password_update').html(msg);
        
      }
      
    }
  });
}