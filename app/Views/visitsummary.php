<?php
include_once('navigation.php');
?>
<body>
    <hr>
        <div class="col-sm-6">
            <div class="card shadow-sm border-info">
                <div class="card-img-top text-center p-t-50">
                    <i class="fas fa-3x fa-drumstick-bite" style="color: #39b6bc;"></i>
                </div>
                    <div class="card-body text-center">
                        <h2 class="card-title fw-bold"> Vitals</h4> 
                        <?php 
                        foreach ($vitals as $key => $value) {
                        echo '
                        <p class="fw-bold">' .$key." " .':'. " ".$value. '</p>
                        ';}?>
                    </div>
            </div>
        </div>
    <hr>
    <div class="col-sm-6">
            <div class="card shadow-sm border-info">
                <div class="card-img-top text-center p-t-50">
                    <i class="fas fa-3x fa-drumstick-bite" style="color: #39b6bc;"></i>
                </div>
                    <div class="card-body text-center">
                        <h2 class="card-title fw-bold"> Signs and Symptoms</h4> 
                        <?php 
                        foreach ($sign_symp as $key => $value) {
                        echo '
                        <p class="fw-bold">' .$key." " .':'. " ".$value. '</p>
                        ';}?>
                    </div>
            </div>
        </div>                        
</body>
</html>