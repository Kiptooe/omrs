<nav class="navbar navbar-expand-lg bg-info" style="max: width 100%;">

    <a href="/login/login" class="btn btn-success ">Home</a>

    <div class="text-light text-right font-weight-bold" style="width:98%;">


        <?php
            if (isset($_SESSION['role'])) {
                // code...
                ?>
        <image align='right' src="/images/<?= $_SESSION['role']?>.png" alt="<?= $_SESSION['role']?>" width="40px" height="40px">

                <?php
                echo $logedIn_data['firstname'].' '.$logedIn_data['lastname'];
                
            }
        ?>

    </div>

           
</nav> 