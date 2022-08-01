<?php
//  $validation = \Config\Services::validation();
//  $session = session();
//  $error = $session->getFlashdata('iderror');
echo view('navigation.php')
 ?>

<form action="/Nurseroles/searchpatient" method="post">
    <fieldset class="dashboard-stats">
    <legend> Search Patient</legend>
    <input type="number" name="national_id"placeholder="Enter National Id"><br><br>
    <?php
        // if($validation->getError('national_id')){
        //   echo '<div class= "alert alert-danger mt-2">'
        //   .$validation->getError('national_id').
        //   '</div>';
        // }elseif ($error != null) {
        //     echo '<div class= "alert alert-danger mt-2">'
        //     .$error.
        //     '</div>';
        // }       
        ?>
    <input type="submit" value="Search">
    </fieldset>
</form>