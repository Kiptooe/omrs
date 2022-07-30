<?php
echo view('navigation.php');
$alphaNumeric="12345abcdefGHIJKL6789mnopqr0STUVWXyZ";
        
$_SESSION['code']=substr(str_shuffle($alphaNumeric),0,5);
?>
      <div class="container" >

        <!-- header section -->
        <?php
       
        echo view("sections/header");

        if (isset($role_pages)) {
              // code...
              createHeader($icon, $header, null);


            }
            else{

              createHeader('eye', 'View '.$header, 'View Existing '.$header);

            }
        ?>
        <!-- header section end -->
      </div>
        <!-- form content -->
        <div class="row container" style="width:100%;">

          <?php
  
              // code...
            if (isset($role_pages)) {
              // code...
              echo view($directory);

            }
            else{

              echo view('sections/'.$directory);
            }

            
          ?>

        <div id="management_acknowledgement" class="col-md-12 h3 text-success font-weight-bold text-center" style="font-family: sans-serif;">

        <hr style="border-top: 2px solid #ff5252;">
        </div>

        </div>
        <!-- form content end -->
        
