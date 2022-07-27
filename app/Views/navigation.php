<nav class="navbar navbar-expand-lg bg-info" style="max: width 100%;">

    <div class="text-light text-right font-weight-bold" style="width:100%;">

        <?php
            if (isset($_SESSION['role'])) {
                // code...
                ?>
        <image align='right' src="/images/<?= $_SESSION['role']?>.png" alt="<?= $_SESSION['role']?>" width="40px" height="40px">

                <?php
            }
        ?>

         <?php //$_SESSION['login_data']['firstname'].' '.$_SESSION['login_data']['lastname']?>
    </div>

           
</nav> 