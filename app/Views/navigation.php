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
