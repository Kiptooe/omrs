<?php
echo view('navigation.php');
?>
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
      
                <div class="d-grid gap-2 p-3 mx-auto"  style="padding: 10px; height:350px; width:350px;">
                        <div class="dashboard-stats" style="padding: 30px 15px;" >
                                <h5 class="card-title fw-bold"> Vitals</h5> 
                                <?php 
                                foreach ($vitals as $key => $value) {
                                echo '
                                <p class="fw-black">' .$key." " .':'. " ".$value. '</p>
                                ';}?>
                            <hr>
                                <h5 class="card-title fw-bold"> Signs and Symptoms</h5> 
                                <?php 
                                for($i=0; $i<count($signs_symptoms); $i++ ) {
                                echo '
                                <p class="fw-black">' .($i+1)." " .':'. " ".$signs_symptoms[$i]. '</p>
                                ';}?>
                            <hr>
                                <h5 class="card-title fw-bold"> Precribed Tests</h5> 
                                <?php 
                                for($i=0; $i<count($prescribed_tests); $i++ ) {
                                echo '
                                <p class="fw-black">' .($i+1)." " .':'. " ".$prescribed_tests[$i]. '</p>
                                ';}?>
                            <hr>
                                <h5 class="card-title fw-bold"> Diagnosis</h5> 
                                <?php 
                                echo '
                                <p class="fw-black">' ."1" .':'. " ".$diagnosis. '</p>
                                ';?>
                            <hr>
                            <h5 class="card-title fw-bold"> Prescriptions</h5> 
                            <?php 
                            for($i=0; $i<count($prescriptions); $i++ ) {
                            echo '
                            <p class="fw-black">' .($i+1)." " .':'. " ".$prescriptions[$i]. '</p>
                            ';}?>       
                        </div>
                </div>

    </div>                            
