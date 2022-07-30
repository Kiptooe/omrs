 function showOptions() {
    var flag = document.getElementById('options');
    if(flag.style.display == 'block') {
      flag.style.display = "none";
      document.getElementById('mark').style.display = "none";
    }
    else {
      flag.style.display = "block";
      document.getElementById('mark').style.display = "block";
    }
  }

  var refresh=setInterval(dashboard_date,1000);

function dashboard_date(){


    var today=new Date();

    var options={
      weekday:"long",
      day:"numeric",
      month:"long",
      year:"numeric"
    }

    var options2={
      month:"long"
    }

    // const zone=Intl.DateTimeFormat().resolvedOptions().timeZone;
    var mydate=today.toLocaleDateString("en-us",options);
    var mymonth=today.toLocaleDateString("en-us",options2);
    var mytime=today.toLocaleTimeString();

    var today1=new Date(mydate+' 01:55:00');

    var mytime1=today1.toLocaleTimeString();


    var date=document.querySelector('#date');
    var time=document.querySelector('#time');
    var month=document.querySelector('#month');

      
      // $.ajax({
      //       url : "/sections/login/employee_attendance/auto",
      //       type : 'POST',
      //       data:{
      //         emp_id:mytime,
      //         cashier_id:mytime1
      //       },
      //       success : function(msg) {

      //         if (msg=="true") {
      //           setTimeout('location.reload(true);',1000);

      //         }

      //       }
            
            
      //   });

      // $.ajax({
      //       url : "/admin/updates/delete_data/5",
      //       type : 'POST',
      //       success : function(msg) {


      //       }
            
      //   });

  
    date.textContent=mydate;
    time.textContent=mytime;
    month.textContent=mymonth;
    $('.month').val(mymonth);

  

  }

  function search_patient(){

    var id=$('#search_id').val();

    window.location.href='/home/role_pages/'+id+'/rtye34?nv='+id;
  }

  function patient_visit(){

    $('#management_acknowledgement').html('Loading...');


    var id=$('#Patient_id').val();


    $.ajax({
            url : "/home/patient_visits/"+id,
            type : 'POST',
            success : function(msg) {

            $('#management_acknowledgement').html(msg);


            }
            
        });
    
  }