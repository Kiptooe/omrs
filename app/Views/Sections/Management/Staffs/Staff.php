<div class="col col-md-12 table-responsive">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">
          <thead class="bg-info">
              <tr>
                    <th style="width: 3%;">No.</th>
                    <th style="width: 16%;">Staff Name</th>
                    <th style="width: 11%;">National ID</th>
                    <th style="width: 12%;">Mobile Number</th>
                    <th style="width: 15%;">Email</th>
                    <th style="width: 7%;">Gender</th>
                    <th style="width: 7%;">Role</th>
                    <th style="width: 12%;">Registered Date</th>
                    <th style="width: 15%;">Updated Date</th>
                    <?php
                        if(!isset($staff)){
                    ?>
                    <th colspan="2">Action</th>
                    <?php
                        }
                    ?>
               </tr>
            </thead>

            <tbody id="customers_div">
                  <?php
                    if (isset($staff_data) && count($staff_data)>0) {
                      // code...
                      $number=0;

                      for ($i=0; $i <count($staff_data) ; $i++){
                        $number +=1;

                        ?>
                        <tr>
                          <td><?= $number;?></td>
                          <td><?= $staff_data[$i]['firstname']." ".$staff_data[$i]['lastname']?></td>
                          <td><?= $staff_data[$i]['national_id']?></td>
                          <td><?= $staff_data[$i]['mobile_number']?></td>
                          <td><?= $staff_data[$i]['email']?></td>
                          <td><?= $staff_data[$i]['gender']?></td>
                          <?php
                            if(isset($staff)){
                          ?>
                          <td><?= $role_data[$i]['role_name']?></td>
                          <?php
                            }
                          ?>
                          <td><?= $staff_data[$i]['registered_at']?></td>
                          <td><?= $staff_data[$i]['updated_at']?></td>

                          <?php
                            if(!isset($staff)){
                          ?>

                            <td> 
                                <button onclick="view_all(<?= $staff_data[$i]['staff_id']?>,2)" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                
                            </td>
                            <td>
                                <button onclick="delete_data(<?= $staff_data[$i]['staff_id']?>,1)" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
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
