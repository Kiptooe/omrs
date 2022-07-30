
$(document).ready( function() { 
  $("#add-medicine").on('submit', function(e){

     e.preventDefault();

  });
})


function register() {
	
  $("#registration_acknowledgement").html('');

  var first_name = $("#first_name").val();
  var last_name = $("#last_name").val();
  var identification = $("#identification").val();
  var national_id = $("#national_id").val();
  var certificate_no = $("#certificate_no").val();
  var email = $("#email").val();
  var contact = $("#contact").val();
  var role_name = $("#role_name").val();


  if(!validate_Name(first_name, "first_name_error"))
    first_name.focus();
  else if(!validate_Name(last_name, "last_name_error"))
    last_name.focus();
  else if(!validate_select(role_name, "role_error"))
    role_name.focus();
  else if(!validate_Email(email, "Email_error"))
    email.focus();
  else if(!validateContactNumber(contact, "contact_error"))
    contact.focus();
  else {

    // alert()


     $.ajax({
            url : "/registration/registration",
            type : 'POST',
            data :  $('#form-register').serialize(),
            success : function(msg) {

                $("#registration_acknowledgement").html(msg);

            }

            
        });

  }

}




function add_medicine() {




  $("#medicine_acknowledgement").html('');

  var medicine_name = $("#medicine_name").val();
  var medicine_price = $("#medicine_price").val();
  var medicine_quantity = $("#medicine_quantity").val();
  var expiry_date = $("#expiry_date").val();


  if(!validate_Name(medicine_name, "medicine_name_error"))
    medicine_name.focus();
  else if(!validate_integers(medicine_price, "medicine_price_error"))
    medicine_price.focus();
  else if(!validate_integers(medicine_quantity, "medicine_quantity_error"))
    medicine_quantity.focus();
  else if(!validate_Date(expiry_date, "expiry_date_error"))
    expiry_date.focus();
  else {


     $.ajax({
            url : "/registration/medicine",
            type : 'POST',
            data :  $('#add-medicine').serialize(),
            success : function(msg) {

                $("#medicine_acknowledgement").html(msg);

            }

            
        });

  }

}












// function add_beneficiary() {
//   document.getElementById("beneficiary_acknowledgement").innerHTML = "";


  
//   var beneficiary_first_name = document.getElementById("Beneficiary_first_name").value;
//   var beneficiary_middle_names = document.getElementById("Beneficiary_middle_names").value;
//   var beneficiary_last_name = document.getElementById("Beneficiary_last_name").value;
//   var beneficiary_identification = document.getElementById("Beneficiary_identification").value;
//   var beneficiary_national_id = document.getElementById("Beneficiary_id_no").value;
//   var beneficiary_certificate_no = document.getElementById("Beneficiary_cert_no").value;
//   var beneficiary_country = document.getElementById("Beneficiary_country").value;
//   var beneficiary_email = document.getElementById("Beneficiary_email").value;
//   var beneficiary_first_contact = document.getElementById("Beneficiary_mobile1").value;
//   var beneficiary_second_contact = document.getElementById("Beneficiary_mobile2").value;
//   var beneficiary_dob = document.getElementById("Beneficiary_dob").value;
//   var beneficiary_image = document.getElementById("Beneficiary_photo").files;
//   var beneficiary_mission_code = document.getElementById("Beneficiary_mission_code").value;
//   var added_by = document.getElementById("Beneficiary_added_by").value;
//   var beneficiary_gender = document.getElementById("Beneficiary_gender").value;




//   if(!validate_Name(beneficiary_first_name, "Beneficiary_first_name_error"))
//     beneficiary_first_name.focus();
//   // else if(!validate_Name(beneficiary_middle_names, "middle_name_error"))
//   //   beneficiary_middle_names.focus();
//   // else if(!validate_Name(beneficiary_last_name, "last_name_error"))
//   //   beneficiary_last_name.focus();
//   // // else if(!validate_continent(beneficiary_continent, "countinent_error"))
//   // //   beneficiary_continent.focus();
//   // // else if(!validate_country(beneficiary_country, "country_error"))
//   // //   beneficiary_country.focus();
//   // else if(!validate_city(beneficiary_city, "County_error"))
//   //   beneficiary_city.focus();
//   // else if(!validateAddress(beneficiary_estate, "Estate_error"))
//   //   beneficiary_estate.focus();
//   // else if(!validate_Email(beneficiary_email, "Email_error"))
//   //   beneficiary_email.focus();
//   // else if(!validateContactNumber(beneficiary_first_contact, "contact_number1_error"))
//   //   beneficiary_first_contact.focus();
//   // else if(!validateContactNumber(beneficiary_second_contact, "contact_number2_error"))
//   //   beneficiary_second_contact.focus();
//   // else if(!checkDate(beneficiary_dob, "dob_error"))
//   //   beneficiary_dob.focus();
//   // else if(!validate_category(beneficiary_category_name, "Category_error"))
//   //   beneficiary_category_name.focus();
//   // else if(!validate_fileupload(beneficiary_image, 'Photo_error'))
//   //   beneficiary_image.focus();


  
//   else {



//     if (beneficiary_image.length>0) {

//       document.getElementById("beneficiary_acknowledgement").innerHTML = 'Registration in progress...';

//     var image=beneficiary_image[0];

//     if (!image.type.match('image.*')) {
//       document.getElementById("beneficiary_acknowledgement").innerHTML = 'The file selected is not an image.';

//     }

//     var form_data = new FormData();                  
//     form_data.append("beneficiary_image", image,image.name);              
//     form_data.append("beneficiary_first_name", beneficiary_first_name);              
//     form_data.append("beneficiary_middle_names", beneficiary_middle_names);              
//     form_data.append("beneficiary_last_name", beneficiary_last_name);              
//     form_data.append("beneficiary_identification", beneficiary_identification);              
//     form_data.append("beneficiary_national_id", beneficiary_national_id);              
//     form_data.append("beneficiary_certificate_no", beneficiary_certificate_no);              
//     form_data.append("beneficiary_gender", beneficiary_gender);              
//     form_data.append("beneficiary_email", beneficiary_email);              
//     form_data.append("beneficiary_first_contact", beneficiary_first_contact);              
//     form_data.append("beneficiary_second_contact", beneficiary_second_contact);              
//     form_data.append("beneficiary_dob", beneficiary_dob);              
//     form_data.append("beneficiary_mission_code", beneficiary_mission_code);              
//     form_data.append("beneficiary_added_by", added_by); 
//     form_data.append("beneficiary_country", beneficiary_country); 



//     var xhttp = new XMLHttpRequest();

//     xhttp.onreadystatechange = function() {
//       if(this.readyState = 4 && this.status == 200)


//         document.getElementById("beneficiary_acknowledgement").innerHTML = this.responseText;
//         document.getElementById("b_refresh").style.display="block";


//        // setTimeout('location.reload(true);',10000);
//     };

//     xhttp.open("POST","/root_admin/members/registration/beneficiary_registration",true);
      
//     xhttp.send(form_data);



//     }
//     else{
//       alert("Please Select a file");
//       return false;
//     }

          
//   }
//    // return false;
// }








// function add_arch_dioces() {
//   document.getElementById("arch_dioces_acknowledgement").innerHTML = "";

  
//   var national_id = document.getElementById("arch_national_id").value;
//   var arch_dioces_name = document.getElementById("arch_dioces_name").value;
//   var continent_name = document.getElementById("arch_continent_name").value;
//   var country_name = document.getElementById("arch_country_name").value;
//   var added_by = document.getElementById("arch_added_by").value;
  

//   if(!validate_identification(national_id, "arch_dioces_id_error"))
//     national_id.focus();
//   // else if(!validate_Name(member_middle_names, "middle_name_error"))
//   //   member_middle_names.focus();
//   // else if(!validate_Name(member_last_name, "last_name_error"))
//   //   member_last_name.focus();
//   // // else if(!validate_continent(member_continent, "countinent_error"))
//   // //   member_continent.focus();
//   // // else if(!validate_country(member_country, "country_error"))
//   // //   member_country.focus();
//   // else if(!validate_city(member_city, "County_error"))
//   //   member_city.focus();
//   // else if(!validateAddress(member_estate, "Estate_error"))
//   //   member_estate.focus();
//   // else if(!validate_Email(member_email, "Email_error"))
//   //   member_email.focus();
//   // else if(!validateContactNumber(member_first_contact, "contact_number1_error"))
//   //   member_first_contact.focus();
//   // else if(!validateContactNumber(member_second_contact, "contact_number2_error"))
//   //   member_second_contact.focus();
//   // else if(!checkDate(member_dob, "dob_error"))
//   //   member_dob.focus();
//   // else if(!validate_category(member_category_name, "Category_error"))
//   //   member_category_name.focus();
//   // else if(!validate_fileupload(member_image, 'Photo_error'))
//   //   member_image.focus();


  
//   else {


//     document.getElementById("arch_dioces_acknowledgement").innerHTML = 'Registration in progress...';

    


//     var form_data = new FormData();                  
//     form_data.append("national_id", national_id);              
//     form_data.append("arch_dioces_name", arch_dioces_name);              
//     form_data.append("continent_name", continent_name);              
//     form_data.append("country_name", country_name);              
//     form_data.append("added_by", added_by);              
    


//     var xhttp = new XMLHttpRequest();

//     xhttp.onreadystatechange = function() {
//       if(this.readyState = 4 && this.status == 200)


//         document.getElementById("arch_dioces_acknowledgement").innerHTML = this.responseText;
//         document.getElementById("a_refresh").style.display="block";


//        // setTimeout('location.reload(true);',10000);
//     };

//     xhttp.open("POST","/root_admin/members/registration/arch_dioces_registration",true);
      
//     xhttp.send(form_data);


          
//   }
//    // return false;
// }



// function add_dioces() {


//   document.getElementById("dioces_acknowledgement").innerHTML = "";

  
//   var national_id = document.getElementById("dioces_national_id").value;
//   var arch_dioces_code = document.getElementById("arch_dioces_code").value;
//   var added_by = document.getElementById("dioces_added_by").value;
//   var dioces_name = document.getElementById("dioces_name").value;
  

//   if(!validate_identification(national_id, "dioces_id_error"))
//     national_id.focus();
//   // else if(!validate_Name(member_middle_names, "middle_name_error"))
//   //   member_middle_names.focus();
//   // else if(!validate_Name(member_last_name, "last_name_error"))
//   //   member_last_name.focus();
//   // // else if(!validate_continent(member_continent, "countinent_error"))
//   // //   member_continent.focus();
//   // // else if(!validate_country(member_country, "country_error"))
//   // //   member_country.focus();
//   // else if(!validate_city(member_city, "County_error"))
//   //   member_city.focus();
//   // else if(!validateAddress(member_estate, "Estate_error"))
//   //   member_estate.focus();
//   // else if(!validate_Email(member_email, "Email_error"))
//   //   member_email.focus();
//   // else if(!validateContactNumber(member_first_contact, "contact_number1_error"))
//   //   member_first_contact.focus();
//   // else if(!validateContactNumber(member_second_contact, "contact_number2_error"))
//   //   member_second_contact.focus();
//   // else if(!checkDate(member_dob, "dob_error"))
//   //   member_dob.focus();
//   // else if(!validate_category(member_category_name, "Category_error"))
//   //   member_category_name.focus();
//   // else if(!validate_fileupload(member_image, 'Photo_error'))
//   //   member_image.focus();


  
//   else {



//     document.getElementById("dioces_acknowledgement").innerHTML = 'Registration in progress...';
    


//     var form_data = new FormData();                  
//     form_data.append("national_id", national_id);              
//     form_data.append("arch_dioces_code", arch_dioces_code);              
//     form_data.append("added_by", added_by);              
//     form_data.append("dioces_name", dioces_name);              
    


//     var xhttp = new XMLHttpRequest();

//     xhttp.onreadystatechange = function() {
//       if(this.readyState = 4 && this.status == 200)


//         document.getElementById("dioces_acknowledgement").innerHTML = this.responseText;
//         document.getElementById("d_refresh").style.display="block";
       
//        // setTimeout('location.reload(true);',10000);
//     };

//     xhttp.open("POST","/root_admin/members/registration/dioces_registration",true);
      
//     xhttp.send(form_data);


          
//   }
//    // return false;
// }

// function add_mission() {
//   document.getElementById("mission_acknowledgement").innerHTML = "";

  
//   var national_id = document.getElementById("mission_national_id").value;
//   var dioces_code = document.getElementById("dioces_code").value;
//   var mission_name = document.getElementById("mission_name").value;
//   var added_by = document.getElementById("mission_added_by").value;

//   if(!validate_identification(national_id, "mission_id_error"))
//     national_id.focus();
//   // else if(!validate_Name(member_middle_names, "middle_name_error"))
//   //   member_middle_names.focus();
//   // else if(!validate_Name(member_last_name, "last_name_error"))
//   //   member_last_name.focus();
//   // // else if(!validate_continent(member_continent, "countinent_error"))
//   // //   member_continent.focus();
//   // // else if(!validate_country(member_country, "country_error"))
//   // //   member_country.focus();
//   // else if(!validate_city(member_city, "County_error"))
//   //   member_city.focus();
//   // else if(!validateAddress(member_estate, "Estate_error"))
//   //   member_estate.focus();
//   // else if(!validate_Email(member_email, "Email_error"))
//   //   member_email.focus();
//   // else if(!validateContactNumber(member_first_contact, "contact_number1_error"))
//   //   member_first_contact.focus();
//   // else if(!validateContactNumber(member_second_contact, "contact_number2_error"))
//   //   member_second_contact.focus();
//   // else if(!checkDate(member_dob, "dob_error"))
//   //   member_dob.focus();
//   // else if(!validate_category(member_category_name, "Category_error"))
//   //   member_category_name.focus();
//   // else if(!validate_fileupload(member_image, 'Photo_error'))
//   //   member_image.focus();


  
//   else {



//     document.getElementById("mission_acknowledgement").innerHTML = 'Registration in progress...';
    


//     var form_data = new FormData();                  
//     form_data.append("national_id", national_id);              
//     form_data.append("dioces_code", dioces_code);              
//     form_data.append("mission_name", mission_name);              
//     form_data.append("added_by", added_by);              
    


//     var xhttp = new XMLHttpRequest();

//     xhttp.onreadystatechange = function() {
//       if(this.readyState = 4 && this.status == 200)


//         document.getElementById("mission_acknowledgement").innerHTML = this.responseText;
//         document.getElementById("m_refresh").style.display="block";


//        // setTimeout('location.reload(true);',10000);
//     };

//     xhttp.open("POST","/root_admin/members/registration/mission_registration",true);
      
//     xhttp.send(form_data);


          
//   }
//    // return false;
// }


// function validate() {


  
//   $(document).ready(function(){

//     $('#login-btn').on('click',function(){

//       var username=$('#login-username').val();
//       var pswd=$('#login-pswd').val();

//       if (username==""){
//         $('#login').html("Username is required");
//         // alert()
//       }
//       else if(pswd==""){
//         $('#login').html("Password is required");
//       }
//       else{


//       $("#login").html("Loading...");
//        $.ajax({
//             url : "/root_admin/members/log_in_out/validate_details",
//             type : 'POST',
//             data :  $('#form-login').serialize(),
//             success : function(msg) {

//               if (msg=="true") {
                

//                     $("#form-login").submit();


//               }
//               else{

//                     $("#login").html("Invalid Username or Password");

//               }

//             }
//             // error:function(error)
//             // {
//             //         document.getElementById('login').innerHTML=Object.value(error);

//             // }
//         });
      

//       }

//     });

//   });

  


//   }



// function validateCredentials() {


//   if(is_loged_in == "true"){
//     return true;
//   }
//   else if(is_loged_in=="false"){
//     return false;
//   }
// }

