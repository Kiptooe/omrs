<?php 
echo view('navigation');
?>
      <div class="container">
        <!-- header section -->
        <?php

          $alphaNumeric="12345abcdefGHIJKL6789mnopqr0STUVWXyZ";
        
          $_SESSION['code']=substr(str_shuffle($alphaNumeric),0,5);
        ?>
        <section class="row content-header ">
            <div class="col-md-1 user_options ">
            
                <ul id="options" class="options list-unstyled m-5" style="display:none;"> 
                    <li>
                    <a href="#" onclick="view_all(<?php //$cashier_data['cashier_id']?>,2,'Cashiers')"><i class="fa fa-user"></i><span>My Profile</span></a>
                    </li>
                    
                    <li>
                    <a href="/home/logout"><i class="fa fa-key"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </section>

        <div class="d-flex">
                  <h3 style="margin-bottom: 0 ;margin-top: 0;" class="text-success font-weight-bold ">Main Dashboard</h3>
                  <div class="user_options ">
                      <button class="col" onclick="showOptions();">
                        <i class="fa fa-gear"></i>
                      </button>
                      <div id="mark" ><i class="fa fa-play fa-rotate-270"></i></div>

                    </div >
            </div>
            <hr style="border-top: 2px solid #ff5252;"><br>
        <!-- header section end -->

        <!-- form content -->
        <div class="row">

          


            <?php
          //    $session = session();
          //    $confirmation = $session->getFlashdata('vitals-success');
             
          //  if($confirmation){
          //    echo '<div class="alert alert-success">'.$confirmation.'</div>' ;
          //  }

              function createSection2($icon, $location, $title) {
              
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px;">
                  <div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href='<?=$location?>'">
                    <div class="text-center">
                      <span class="h1"><i class="fa fa-<?=$icon?> p-2"></i></span>
                      <div class="h5 font-weight-bold"><?=$title?></div>
                    </div>
                  </div>
                </div>
              <?php
            }
            createSection2('group', '/Nurseroles/show/search', 'Search Patient');
            // createSection2('book', '/home/pages/'.$_SESSION['code'].'?pr='.$_SESSION['code'], 'Patient Report');
           
            ?>

          <!-- </div> -->
          <div class="container">
        <hr style="border-top: 2px solid #ff5252;">

          <div class="col col-xs-10 col-sm-10 col-md-10 col-lg-5 " style="padding: 7px 0; margin-left: 5px;">
            <div class="todays-report">
              <!-- <div class="h3 text-primary font-weight-bold">Todays Report</div> -->
              <table class="table table-bordered table-striped table-hover">
                <tbody>
                  <?php
                    $con=true;
                    if($con) {
                      $date = date('Y-m-d');
                  ?>
                  
                  <tr >
                    <?php
                    }
                    ?>
                    <!-- <th class="bg-success text-light">Total Patient Visit</th>
                    <th class="bg-info"></th> -->
                  </tr>
                </tbody>
              </table>
            </div>

            
          </div>

          <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-5 m-1 font-weight-bold">
            

            <hr style="border-top: 2px solid #20c997;">
            <center><small id="date" class="h3 text-primary"></small></center>
            <hr style="border-top: 2px solid #20c997;">
            <center><small  id="time" class="h3 text-dark"></small></center>
            <hr style="border-top: 2px solid #20c997;">
          </div>

          </div>

        </div>

      </div>