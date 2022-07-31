<?php $user = array('patient_id'=>1,'visit_id'=>1); ?>
<div class="d-grid gap-4 p-5 mx-auto" style="height:150px; width:300px;">
  <a class="btn btn-primary" type="button" href="/Patientroles/summary/visitsummary/<?php echo $user['patient_id'] .'/'.$user['visit_id']; ?>"> Visit Summary</a>
  <a class="btn btn-primary" type="button">Past Visit</a>
  <a class="btn btn-primary" type="button">Reports</a>
</div>
