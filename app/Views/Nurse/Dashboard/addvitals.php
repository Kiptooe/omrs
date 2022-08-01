<?php echo view('navigation.php');?>
<form action="/Nurseroles/vitals" method="post">
  <fieldset class="dashboard-stats">
    <legend>Record Patient Vitals</legend>
    <input type="text" name="pulse_rate" placeholder="Enter pulse rate" required><br><br>
    <input type="text" name="temperature" placeholder="Enter Temperature" reuired><br><br>
    <input type="text" name="weight" placeholder="Enter Weight" required><br><br>
    <input type="text" name="systolic_pressure" placeholder="Enter Systolic Pressure" required><br><br>
    <input type="text" name="diastolic_pressure" placeholder="Enter Diastolic Pressure" required><br><br>  
    <input type="hidden" name="patient_id" value="<?php echo $patient['pid'];?>">  
    <input type="hidden" name="visit_id" value="<?php echo $patient['vid'];?>">  

    <input type="submit" value="Record">
  </fieldset>
</form>