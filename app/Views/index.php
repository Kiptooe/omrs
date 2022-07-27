
<div class="container login p-5">

      <div id="login-form" class="bg-info ">
        <div class="card-body">
          <form name="login-form" id="form-login" class="login-form"  method="post" >
            <div >
              <div  class="logo text-center">
              <!-- <img src="/images/title-logo.jpg" class="image profile"/> -->

              
              <h1 class="logo-caption"><span >L</span>ogin</h1>

                
              </div>
        		</div> 


            <div class="input-group form-group">
              <div class="input-group-prepend col-md-12">
                <span class="input-group-text"><i class="fas fa-user text-info" aria-hidden="true"></i></span>
              <input id="login-username" type="text" name="username" class="form-control" placeholder="Username" oninput="isAdmin()">

              </div>
              <label id="username-error" class="text-danger "></label>


            </div> <!--input-group class -->
            <div class="input-group form-group">
              <div class="input-group-prepend col-md-12">
                <span class="input-group-text"><i class="fas fa-key text-info" aria-hidden="true"></i></span>
              <input id="login-pswd" type="password" name="password" class="form-control" placeholder="Password" oninput="isAdmin()">
              </div>
              <label id="psw-error" class="text-danger "></label>


            </div>

            <div id="key-div" class="input-group form-group" style='display: none;'>
              <div class="input-group-prepend col-md-12">
                <span class="input-group-text"><i class="fas fa-key text-info" aria-hidden="true"></i></span>
              <input id="login-key" type="password" name="key" class="form-control" placeholder="Key">
              </div>
              <label id="key-error" class="text-danger "></label>


            </div> <!-- input-group class --> 
            <!-- input-group class -->
            
            <div class="form-group col-md-12">
              <input type="button" id="login-btn" class="btn btn-default btn-default btn-block btn-custom" value="Login" onclick="validatelogin()">
            </div>
          </form> 
          <div id="login" class="col-md-12 h5 m-0 text-dark font-weight-bold text-center" style="font-family: sans-serif;">
            <?php
                  if (isset($session_expires) && strlen($session_expires) >0) {
                    // code...
                    echo $session_expires;
                  }

              $alphaNumeric="12345abcdefGHIJKL6789mnopqr0STUVWXyZ";
        
              $_SESSION['code']=substr(str_shuffle($alphaNumeric),0,5);
            ?>
          </div>

        </div> <!-- cord-body class -->
        
        <div id="reset-pass-div" class="card-footer">
          <div class="text-center">
            <a href="/home/pages?pass=<?= $_SESSION['code'];?>" class="btn-edit-pass text-light" style="cursor: pointer;">Forgot password?</a>
          </div>
        </div> <!-- cord-footer class -->

        <div id="register-div" class="card-footer font-weight-bold" style="display:none;">
          <div class="text-center">
            <a href="/home/pages?reg=<?= $_SESSION['code'];?>" class="btn-edit-pass text-light" style="cursor: pointer;">Register</a>
          </div>
        </div> <!-- cord-footer class -->

      </div> <!-- card class -->

    </div> <!-- container class -->

    
  