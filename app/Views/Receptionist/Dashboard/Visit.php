<?php
echo view('sections/search');

$timezone=app_timezone();
date_default_timezone_set($timezone);
$timezone=date_default_timezone_get();

$date=date('Y-m-d');
?>

<div class="container">
	<div class="div" style="width:100%;">
		<div style="width:50%;" class="font-weight-bold">
			<span>First Name</span><br><br>
			<span>Last Name</span><br><br>
			<span>National ID</span><br><br>
			<span>Birth Certificate</span><br><br>
			<span>Email</span><br><br>
			<span>Mobile Number</span><br><br>
			<span>Registered Date</span><br><br>
			<span>Last Updated Date</span><br><br>
			<span>Last Visit Date</span><br><br>

		</div>
		<div style="width:50%;" class="font-weight-bold ">

			<?php
				if (isset($patient_1_data)) {
					// code...

					if ($patient_1_data) {
						// code...
			?>
			<input type="text" name="" readonly id="" class="form-control text-success" value="<?= $patient_1_data['firstname']?>">
			<input type="text" name="" readonly id="" class="form-control text-success" value="<?= $patient_1_data['lastname']?>">
			<input type="text" name="" readonly id="" class="form-control text-success" value="<?= $patient_1_data['national_id']?>">
			<input type="text" name="" readonly id="" class="form-control text-success" value="<?= $patient_1_data['birth_cert']?>">
			<input type="text" name="" readonly id="" class="form-control text-success" value="<?= $patient_1_data['email']?>">
			<input type="text" name="" readonly id="" class="form-control text-success" value="<?= $patient_1_data['mobile_number']?>">
			<input type="text" name="" readonly id="" class="form-control text-success" value="<?= $patient_1_data['registered_at']?>">
			<input type="text" name="" readonly id="" class="form-control text-success" value="<?= $patient_1_data['updated_at']?>">
			<input type="text" name="" readonly id="" class="form-control text-danger" value="<?= $visit_1_data['visit_date'].' '.$visit_1_data['visit_time']?>">
			<?php
					}
					else{
						?>
					<h3 class="m-2 text-info">No Visit Record Available (<span class="text-danger">Not Registered</span>)</h3><br><br>	
					<input type="text" name="" id="Patient_id" class="form-control"  value="<?= $patient_national_id?>">


						<?php
					}

			if (isset($visit_1_data['visit_date']) && $visit_1_data['visit_date']==$date) {
				// code...

				?>
			<input type="button"  value="New Visit" class="btn btn-primary font-weight-bold" disabled>

				<?php

			}
			else{

				?>

			<input type="button" onclick="patient_visit()" name="" id="btn-new-visit" value="New Visit" class="btn btn-primary font-weight-bold">
			<?php

			}

			
				}

			?>
			
		</div>
	</div>
</div>
