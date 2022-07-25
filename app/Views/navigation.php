<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Navigation Bar</title>
    </head>
        <body>
         <?php $user = array('id'=>1,'role_id'=>1,'firstname'=>'John','lastname'=>'Doe') ;  ?>   
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#39b6bc;">
            <div class="container-fluid">   
                <a class="navbar-brand" href="#"><image src="/images/<?php echo setImage($user['role_id']); ?>.png" alt="<?php echo setImage($user['role_id']) ?>" width="40px" height="40px"></a>
                    <div class="text-white"> Welcome <?php echo "  ".$user['firstname']." ".$user['lastname']; ?></div>   
            </div>       
        </nav>  

        <?php 
        
        function setImage(string $role_id = null)
        {
            $image = "";
            switch ($role_id) {
                case 1:
                $image = "patient";
                break;
                case 2:
                $image = "admin";
                break;
                case 3:
                $image = "doctor";
                break;
                case 4:
                $image = "nurse";
                break;
                case 5:
                $image = "receptionist";
                break;
                default:
                $image = "";
            }
            return $image;
        }
        
        ?>                    

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
</html>