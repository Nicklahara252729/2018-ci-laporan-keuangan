<div class="login-container"> 
            <div class="login-header login-caret"> 
                <div class="login-content"> 
                    <a href="#" class="logo"> 
                        <p style="color:white;font-size:40px;">LOGIN</p>
                    </a> 
                    <p class="description">Dear user, log in to access the admin area!</p> 
                    
            </div> 
        </div> 
        
        <div class="login-form"> 
            <div class="login-content"> 
                <div class="form-login-error"> 
                    <h3>Invalid login</h3> <p>Enter  as login and password.</p> 
                </div> 
                <?php echo form_open('login/proses',['role'=>'form','id'=>'']) ?>
                
                    <div class="form-group"> <div class="input-group"> 
                        <div class="input-group-addon"> <i class="glyphicon glyphicon-user"></i> 
                        </div> 
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" /> 
                        </div> 
                    </div> 
                    <div class="form-group"> 
                        <div class="input-group"> 
                            <div class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i> 
                            </div> 
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" /> </div> 
                    </div> 
                    <div class="form-group"> <button type="submit" class="btn btn-primary btn-block btn-login"> <i class="glyphicon glyphicon-log-in"></i>Login In</button>
                    </div>                    
                     <?php echo form_close(); ?>
                </div> </div> </div> 