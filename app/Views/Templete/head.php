<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, Bootstrap">
	<link rel="shortcut icon" type="image/jpg" href="/favicon.ico"/>

	<title>Outpatient Medical Records System</title>

    <link rel="shortcut icon" href="images/hospital.svg" type="image/x-icon">
	<!-- <link rel="shortcut icon" href="/titlelogo.ico" type="image/x-icon"> -->
<!-- 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">  

    


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	
  	 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="/js/bootstrap.min.js"><\/script>')</script>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


  	<?= link_tag("/CSS/bootstrap.min.css")?>
  	<?= link_tag("/CSS/bootstrap.cs")?>
  	<?= link_tag("/My_CSS/style1.css")?>
  	<?= link_tag("/My_CSS/Root_Admin/style1.css")?>
  	<?= link_tag("/My_CSS/Root_Admin/style2.css")?>

  	


	

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


	

