<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/kipstyle.css">
    <title>Navigation Bar</title>
    </head>
        <body>
                <?php $user = array('id'=>1,'role_id'=>1) ;?>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#39b6bc;">
            <div class="container-fluid">
                    <?php if($user['role_id']==1){?>   
                            <a class="navbar-brand" href="#"><image src="/images/patient.png" alt="Patient" width="40px" height="40px"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Visit Summary</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="/Patientroles/summary/visitsummary/<?php echo $user['id'];?>">Vitals</a>
                                                <a class="dropdown-item" href="/Adminroles/medicineAvailable">Signs&Symptoms</a>
                                        </div>
                                </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/Patientroles/costs">Costs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/Patientroles/pastVisits">Past visits</a>
                                    </li>
                                     
                                    <?php } elseif($user['role_id']==2) {?>   
                            <a class="navbar-brand" href="#"><image src="/images/admin.png" alt="Admin" width="40px" height="40px"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Staff</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/Adminroles/registerStaff/registerstaff">Register</a>
                                            <a class="dropdown-item" href="/Adminroles/editStaff">Edit</a>
                                    </div>
                                </li>
                                     <li class="nav-item">
                                        <a class="nav-link" href="/Adminroles/registerRole/registerrole">Roles</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/Adminroles/visitsNumber">Number of visits</a>
                                            <a class="dropdown-item" href="/Adminroles/medicineAvailable">Number of medicines</a>
                                        </div>
                                    </li>
                                        
                                  
                                    <?php }?>
                                
                                    <li class="nav-item"><a class="nav-link" href="/Common/resetPassword">Reset Password</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/Common/logout">Logout</a></li>
                         </ul>
                 </div>    
             </div>    
        </nav>  
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
</html>