<?php
if(isset($action)){

    if($action=='add'){

       

?>
<div id=""class="row col col-lg-5 "  >
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="first_name">First Name :<span class="star ">*</span></label>
    <input type="text" class="form-control" placeholder="First name as per ID" name="first_name" id="first_name" onblur ="validate_Name(this.value, 'first_name_error');">
    <code class="text-danger small font-weight-bold float-right" id="first_name_error" style="display: none;"></code>
  </div>
</div>



<div id=""class="row col col-lg-5">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="last_name">Last Name :<span class="star">*</span></label>
    <input type="text" class="form-control" placeholder="Surname as per ID" name="last_name" id="last_name" onblur="validate_Name(this.value, 'last_name_error');">
    <code class="text-danger small font-weight-bold float-right" id="last_name_error" style="display: none;"></code>
  </div>
</div>


<div id=""class="row col col-lg-5">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="role_name">Role Name :<span class="star">*</span></label>
    <select class="form-control" name="role_name" id="role_name" onchange ="validate_select(this.value, 'role_error');">
      <option value="">Choose Role</option>
      <option value="Administrator">Admin</option>
      <option value="Doctor">Doctor</option>
      <option value="Nurse">Nurse</option>
      <option value="Lab Technician">Lab Technician</option>
      <option value="Patient">Patient</option>
      <option value="Receptionist">Receptionist</option>
      <option value="Pharmacist">Pharmacist</option>
      
    </select>
    <code class="text-danger small font-weight-bold float-right" id="role_error" style="display: none;"></code>
  </div>
</div>



<div id="identification_type"class="row col col-lg-5" style="display:none">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="identification">Choose Identification :<span class="star">*</span></label>
    <select class="form-control" id="identification" name="identification" onchange="identification(this.value,'identification_error');">
      <option value="national_id">National ID</option>
      <option value="birth_certificate">Birth Certificate</option>
    </select>
    <code class="text-danger small font-weight-bold float-right" id="identification_error" style="display: none;"></code>
  </div>
</div>

<div id="national_id" class="row col col-lg-5">
  <div  class="col col-md-12 form-group">
    <label class="font-weight-bold" for="national_id">Enter National ID No. :<span class="star">*</span></label>
    <input type="text" class="form-control" placeholder="National ID" name="national_id" id="national_id" onblur="validate_identification(this.value, 'national_id_error');" required>
    <code class="text-danger small font-weight-bold float-right" id="national_id_error" style="display: none;"></code>
  </div>
</div>

<div id="birth_certificate"class="row col col-lg-5" style="display:none">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="certificate_no">Enter Certificate No. :<span class="star">*</span></label>
    <input type="text" class="form-control" placeholder="Birth Certificate" name="certificate_no" id="certificate_no" onblur ="validate_identification(this.value, 'birth_certificate_error');" required>
    <code class="text-danger small font-weight-bold float-right" id="birth_certificate_error" style="display: none;"></code>
  </div>
</div>






<div id=""class="row col col-lg-5">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="email">Email :<span id="star1" class="star">*</span></label>
    <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" onblur ="validate_Email(this.value, 'Email_error');">
    <code class="text-danger small font-weight-bold float-right" id="Email_error" style="display: none;"></code>
  </div>
</div>

<div id=""class="row col col-lg-5">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="contact">Contact Number :<span id="star1" class="star">*</span></label>
    <input type="text" class="form-control" placeholder="Contact Number" name="contact" id="contact" onblur ="validateContactNumber(this.value, 'contact_error');">
    <code class="text-danger small font-weight-bold float-right" id="contact_error" style="display: none;"></code>
  </div>
</div>

<div id=""class="row col col-lg-5" style="display:none">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="gender">Choose Gender :<span class="star">*</span></label>
    <select class="form-control" id="gender" name="gender">
      <option value="Male">Male</option>
      <option value="female">Female</option>
    </select>
    <code class="text-danger small font-weight-bold float-right" id="gender_error" style="display: none;"></code>
  </div>
</div>




<div class="col col-md-12">
  <hr class="col-md-12 float-left" style="padding: 0px; width: 95%; border-top: 2px solid  #02b6ff;">
</div>

<!-- form submit button -->
<div class="row col col-md-12">
  &emsp;
  <div class="form-group m-auto col col-md-5" >
    <center><button class="btn btn-primary" id="upload_btn" onclick="register()" style="margin-bottom: 2%;">Register</button></center>
  </div>

<?php
    }
    else if ($action=='view') {
        # code...

?>

<div class="col col-md-12 table-responsive">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">
          <thead class="bg-info">
              <tr>
                    <th style="width: 3%;">No.</th>
                    <th style="width: 16%;">Medicine Name</th>
                    <th style="width: 11%;">Quantity</th>
                    <?php
                        if(isset($expired)){
                    ?>
                    <th style="width: 7%;">Price</th>
                    <th style="width: 7%;">Added By</th>
                    <?php
                        }
                    ?>
                    <th style="width: 15%;">Added Date</th>
                    <?php
                        if(isset($expired)){
                    ?>
                    <th style="width: 15%;">Updated Date</th>
                    <?php
                        }
                    ?>
                    <th style="width: 10%;">Expiry Date</th>
                    <?php
                        if(isset($expired)){
                    ?>
                    <th style="width: 5%;">Expired</th>
                    <?php
                        }
                    ?>
               </tr>
            </thead>

            <tbody id="customers_div">
                  <?php
                    if (isset($medicine_data) && count($medicine_data)>0) {
                      // code...
                      $number=0;

                      for ($i=0; $i <count($medicine_data) ; $i++){
                        $number +=1;

                        ?>
                        <tr>
                          <td><?= $number;?></td>
                          <td><?= $medicine_data[$i]['medicine_name']?></td>
                          <td><?= $medicine_data[$i]['quantity']?></td>
                          <?php
                            if(isset($expired)){
                          ?>
                          <td><?= $medicine_data[$i]['price']?></td>
                          <td><?= $medicine_data[$i]['added_by']?></td>
                          <?php
                              }
                          ?>
                          <td><?= $medicine_data[$i]['added_at']?></td>
                          <?php
                            if(isset($expired)){
                          ?>
                            <td><?= $medicine_data[$i]['updated_at']?></td>

                          <?php
                              }
                          ?>
                          <td><?= $medicine_data[$i]['expiry_date']?></td>
                          <?php
                            if(isset($expired)){
                          ?>
                          <td><?= $medicine_data[$i]['Expired']?></td>
                          <?php
                              }
                          ?>
                          
                          
                        </tr>

                        <?php
                      }
                    }
                  ?>
            </tbody>
      </table>
    </div>
</div>


<?php
    }

}
?>