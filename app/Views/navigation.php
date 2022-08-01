<nav class="navbar navbar-expand-lg bg-info" style="max: width 100%;">

    <a href="/login/login" class="btn btn-success ">Home</a>

    <div class="text-light text-right font-weight-bold" style="width:98%;">


        <?php
            if (isset($_SESSION['role'])) {
                // code...
                ?>
        <image align='left' src="/images/<?= $_SESSION['role']?>.png" alt="<?= $_SESSION['role']?>" width="40px" height="40px">

                <?php
                echo $_SESSION['login_data']['firstname'].' '.$_SESSION['login_data']['lastname'];
                
            }
        ?>

    </div>

           
</nav> 
