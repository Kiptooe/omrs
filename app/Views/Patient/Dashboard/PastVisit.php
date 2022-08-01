<?php echo view('navigation');?>
<div class="d-grid gap-2 p-3 mx-auto"  style="padding: 10px; height:350px; width:350px;">
    <div class="dashboard-stats" style="padding: 30px 15px;" >
    <h5 class="card-title fw-bold"> Past Visit Dates</h5>
    <a class="fw-black" href="/Patientroles/summary/<?php echo $visits[0]['patient_id']; ?>"> <?php echo $visits[0]['visit_date']?></a>  
    </div>
</div>        