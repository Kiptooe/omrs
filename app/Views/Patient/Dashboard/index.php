<?php echo view('navigation.php'); ?>

  <div class="container">

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
                  <div class="user_options ">
                      <button class="col" onclick="showOptions();">
                        <i class="fa fa-gear"></i>
                      </button>
                      <div id="mark" ><i class="fa fa-play fa-rotate-270"></i></div>

                    </div >
      </div>

          <?php
          function createSection($title,$location){
          ?>

          <div class="d-grid gap-2 p-3 mx-auto"  style="padding: 10px; height:150px; width:250px;">
                <div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href='<?=$location?>'">
                    <div class="text-center">
                        <div class="h5 font-weight-bold"><?=$title?></div>
                    </div>
                </div>
          </div>  
              
          <?php     
          }
          createSection('Visit Summary','/Patientroles/summary/'.$logedIn_data['patient_id']);
          createSection('Past Visit','/Patientroles/visits/'.$logedIn_data['patient_id']);
          // createSection('Reports','/Patientroles/summary/'.$logedIn_data['patient_id']);

          ?>
</div>