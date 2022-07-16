<?php
include_once('navigation.php');
?>
<body>
    <hr>
    <?php
    foreach ($vitals as $key => $value) {
    echo '
      <div class="col-sm-6">
            <div class="card shadow-sm border-info">
                <div class="card-img-top text-center p-t-50">
                    <i class="fas fa-3x fa-drumstick-bite" style="color: #39b6bc;"></i>
                </div>
                    <div class="card-body text-center">
                        <h4 class="card-title fw-bold">'.$key.'</h4>
                        <p class="card-text">'.$value.'</p>
                    </div>
            </div>
      </div>
    <hr>
    ';
    }?>
</body>
</html>