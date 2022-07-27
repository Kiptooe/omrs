<?php
echo view('navigation.php');
?>
<div class="container-fluid">
      <div class="container">

        <!-- header section -->
        <?php
       
        echo view("sections/header");
          createHeader('eye', 'View '.$header, 'View Existing '.$header);
        ?>
        <!-- header section end -->

        <!-- form content -->
        <div class="row">

          <?php
  
              // code...
              echo view('sections/'.$directory);

            
          ?>

        </div>
        <!-- form content end -->
        <hr style="border-top: 2px solid #ff5252;">
      </div>
    </div>