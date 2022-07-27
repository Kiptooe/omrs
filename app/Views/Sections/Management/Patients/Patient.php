<div class="col col-md-12 table-responsive">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">
          <thead class="bg-info">
              <tr>
                    <th style="width: 3%;">No.</th>
                    <th style="width: 20%;">Patient Name</th>
                    <th style="width: 12%;">National ID</th>
                    <th style="width: 12%;">Birth Cert</th>
                    <th style="width: 13%;">Mobile Number</th>
                    <th style="width: 17%;">Email</th>
                    <th style="width: 10%;">Gender</th>
                    <th colspan="2">Action</th>
                    
               </tr>
            </thead>

            <tbody id="customers_div">
                  <?php
                    if (isset($patient_data) && count($patient_data)>0) {
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
                          <td><?= $patient_data[$i]['mobile_number']?></td>
                          <td><?= $patient_data[$i]['email']?></td>
                          <td><?= $patient_data[$i]['gender']?></td>
                          

                          
                            <td> 
                                <button onclick="view_all(<?= $patient_data[$i]['staff_id']?>,2)" class="btn btn-info btn-sm">
                                    More
                                </button>
                                
                            </td>
                            <td>
                                <button onclick="view_all(<?= $patient_data[$i]['staff_id']?>,2)" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button onclick="delete_data(<?= $patient_data[$i]['staff_id']?>,1)" class="btn btn-danger btn-sm">
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
