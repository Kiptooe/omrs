<div class="container">
	<div class="CenterDIV d-block">
        <dialog class="" style="max-width: 30%;">
            <form class="cashier-edit1 col-md-12" id="cashier-edit1" action="#" method="post">

             
            <div class="pass-email">
               <span>Enter Email: </span>
              <div class="d-flex">
                  <input type="text" id="newpass_email" name="newPass_email" class="col-md-12 font-weight-bold text-primary m-2 text-center form-control" /><span><i></i></span>
                </div>
             </div>

            <div class="pass-code" style="display:none;">

                <span>Enter Code: </span>
              <div class="d-flex">
                  <input type="text" id="newpass_code" name="newPass_email" class="col-md-12 font-weight-bold text-primary m-2 text-center form-control" /><span><i></i></span>
                </div>
            </div>

            <div class="pass-fld" style="display:none;">
              <span>Enter New Password: </span>
              <div class="d-flex" >

                  <input type="password" id="newpass" name="newPass" class="col-md-12 font-weight-bold text-primary m-2 text-center form-control" onkeyup="password_match(this.value,1)" /><span><i></i></span>
                </div>
                   
                  <code class="text-danger small font-weight-bold float-right" id="password1-edit-error" style="display: none;"></code>
                    

                <span >Confirm New Password:</span>
                <div class="d-flex">

                  <input type="password" id="confirn-newpass" class=" col-md-12 font-weight-bold text-primary m-2 text-center form-control" onkeyup="password_match(this.value,2)" /> <span><i style="display: none;" id="password1-edit-error2" class="fa fa-check" aria-hidden="true"></i><i style="display: none;" id="password1-edit-error1" class="fa fa-close" aria-hidden="true"></i></span>
                </div>
                </div> <br>
                    
               
                <a class="btn btn-danger btn-sm text-light font-weight-bold form-control" id="btn-code" onclick="password_reset(1)">Send Code</a>
                <a style="display:none;" class="btn btn-danger btn-sm text-light font-weight-bold form-control" id="btn-conf-code" onclick="password_reset(2)">Confirm Code</a>
                <a style="display:none;" class="btn btn-danger btn-sm text-light font-weight-bold form-control" id="btn-new-pass" onclick="password_reset(3)">Save</a><br>
                <label style="display: none ;" id="psw-msg">Password updated successfully. Go back to <a href="/home/index">Login</a></label>

              </form>
              <div id="password_update" class=" col-md-12 h5 m-2 text-success font-weight-bold text-center" style="font-family: sans-serif;">

            </div>
              <a class="btn-cancel" style="text-decoration: none;" href="/home/home_page">Cancel</a>

          </dialog>


      </div>
</div>