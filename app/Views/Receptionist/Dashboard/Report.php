<div class="col col-md-12 table-responsive">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">
          <thead class="bg-info">
              <tr>
                    <th style="width: 3%;">No.</th>
                    <th style="width: 10%;">Name</th>
                    <th style="width: 10%;">National ID</th>
                    <th style="width: 10%;">Birth Certificate</th>
                    <th style="width: 15%;">Email</th>
                    <th style="width: 8%;">Mobile Phone</th>
                    <th style="width: 7%;">Gender</th>
                    <th style="width: 13%;">Registered Date</th>
                    <th style="width: 13%;">Updated Date</th>
                    <th style="width: 13%;">Last Visit Date</th>
                    <th colspan="2">Action</th>
                    
               </tr>
            </thead>

            <tbody id="customers_div">
                  <?php

                  // print_r($patient_data);
                    if (isset($patient_data) && !empty($patient_data)) {
                      // code...
                      $number=0;

                      for ($i=0; $i <count($patient_data) ; $i++){
                        $number +=1;

                        ?>
                        <tr>
                          <td><?= $number;?></td>
                          <td><?= $patient_data[$i]['firstname']." ".$patient_data[$i]['lastname']?></td>
                          <td><?= $patient_data[$i]['national_id']?></td>
                          <td><?= $patient_data[$i]['birth_cert']?></td>
                          <td><?= $patient_data[$i]['email']?></td>
                          <td><?= $patient_data[$i]['mobile_number']?></td>
                          <td><?= $patient_data[$i]['gender']?></td>
                          <td><?= $patient_data[$i]['registered_at']?></td>
                          <td><?= $patient_data[$i]['updated_at']?></td>
                          <td><?= $visits_data[$i]['visit_date']?></td>

                            <td> 
                                <button onclick="view_all(<?= $patient_data[$i]['patient_id']?>,2)" class="btn btn-warning btn-sm">
                                  <i class="fa fa-pencil"></i>
                                </button>
                                
                            </td>
                            <td>
                                <button onclick="delete_data(<?= $patient_data[$i]['patient_id']?>,1)" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>

                        </tr>

                        <?php
                      }
                    }
                  ?>
            </tbody>
      </table>
    </div>
</div>
