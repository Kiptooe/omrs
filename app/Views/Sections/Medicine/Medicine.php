<?php

if(isset($action)){

    if($action=='add'){
echo view('navigation');

       

?>
<form id="add-medicine" method="post">
<div id=""class="row col col-lg-5 "  >
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="medicine_name">Medicine Name :<span class="star ">*</span></label>
    <input type="text" class="form-control" placeholder="Medicine Name" name="medicine_name" id="medicine_name" onblur ="validate_Name(this.value, 'medicine_name_error');">
    <code class="text-danger small font-weight-bold float-right" id="medicine_name_error" style="display: none;"></code>
  </div>
</div>



<div id=""class="row col col-lg-5">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="medicine_price">Medicine Price :<span class="star">*</span></label>
    <input type="text" class="form-control" placeholder="Medicine Price" name="medicine_price" id="medicine_price" onblur="validate_integers(this.value, 'medicine_price_error');">
    <code class="text-danger small font-weight-bold float-right" id="medicine_price_error" style="display: none;"></code>
  </div>
</div>


<div  class="row col col-lg-5">
  <div  class="col col-md-12 form-group">
    <label class="font-weight-bold" for="medicine_quantity">Medicine Quantity :<span class="star">*</span></label>
    <input type="text" class="form-control" placeholder="Medicine Quantity" name="medicine_quantity" id="medicine_quantity" onblur="validate_integers(this.value, 'medicine_quantity_error');" required>
    <code class="text-danger small font-weight-bold float-right" id="medicine_quantity_error" style="display: none;"></code>
  </div>
</div>

<div class="row col col-lg-5" >
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="medicine_unit">Choose Unit :<span class="star">*</span></label>
    <select class="form-control" id="medicine_unit" name="medicine_unit" onchange="identification(this.value,'medicine_unit_error');">
      <option value="Kilogram">Kgs</option>
      <option value="Grams">Grams</option>
      <option value="Liters">Liters</option>
      <option value="Packets">Packets</option>
      <option value="Mililiters">Mililiters</option>
    </select>
    <code class="text-danger small font-weight-bold float-right" id="medicine_unit_error" style="display: none;"></code>
  </div>
</div>

<div id=""class="row col col-lg-5">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="expiry_date">Expiry Date :<span class="star">*</span></label>
    <input type="date" class="form-control" placeholder="Expiry Date" name="expiry_date" id="expiry_date" onblur="validate_Date(this.value, 'expiry_date_error');">
    <code class="text-danger small font-weight-bold float-right" id="expiry_date_error" style="display: none;"></code>
  </div>
</div>


    <input type="hidden" class="form-control" name="added_by" id="medicine_added_by" value="">
    


<div class="col col-md-12">
  <hr class="col-md-12 float-left" style="padding: 0px; width: 95%; border-top: 2px solid  #02b6ff;">
</div>

<!-- form submit button -->
<div class="row col col-md-12">
  &emsp;
  <div class="form-group m-auto col col-md-5" >
    <center><button class="btn btn-primary" id="add_medicine_btn" onclick="add_medicine()" style="margin-bottom: 2%;">Add Medicine</button></center>
  </div>
</form>

<div class="col-md-12 h5 text-success font-weight-bold text-center" style="font-family: sans-serif;">
  
  <p id="medicine_acknowledgement"></p>
  <p id="mb_refresh" style="display: none;"><a href="" >Refresh Page</a></p>
</div>
<?php
    }
    else if ($action=='view') {
        # code...

    $timezone=app_timezone();
    date_default_timezone_set($timezone);
    $timezone=date_default_timezone_get();

    $date=date('Y-m-d');


?>

<div class="col col-md-12 table-responsive">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">
          <thead class="bg-info">
              <tr>
                    <th style="width: 3%;">No.</th>
                    <th style="width: 16%;">Medicine Name</th>
                    <th style="width: 11%;">Quantity</th>
                    <th style="width: 11%;">Unit</th>
                    <?php
                        if(isset($expired)){
                    ?>
                    <th style="width: 7%;">Price</th>
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
                    if (isset($dashboard_data['medicine_data']) && count($dashboard_data['medicine_data'])>0) {
                      // code...
                      $number=0;

                      for ($i=0; $i <count($dashboard_data['medicine_data']) ; $i++){
                        $number +=1;

                        ?>
                        <tr>
                          <td><?= $number;?></td>
                          <td><?= $dashboard_data['medicine_data'][$i]['medicine_name']?></td>
                          <td><?= $dashboard_data['medicine_data'][$i]['medicine_quantity']?></td>
                          <td><?= $dashboard_data['unit_data'][$i]['unit_name']?></td>
                          <?php
                            if(isset($expired)){
                          ?>
                          <td><?= $dashboard_data['medicine_data'][$i]['medicine_price']?></td>
                          <?php
                              }
                          ?>
                          <td><?= $dashboard_data['medicine_data'][$i]['added_at']?></td>
                          <?php
                            if(isset($expired)){
                          ?>
                            <td><?= $dashboard_data['medicine_data'][$i]['updated_at']?></td>

                          <?php
                              }
                          ?>
                          <td><?= $dashboard_data['medicine_data'][$i]['expiry_date']?></td>
                          <?php
                            if(isset($expired)){
                          ?>
                           <td><?php
                            if ($dashboard_data['medicine_data'][$i]['expiry_date']<=$date) {
                              // code...
                              echo "Yes";
                            }
                            else{
                              echo "No";
                            }
                            ?>
                           </td>
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