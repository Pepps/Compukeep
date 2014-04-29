
    <link rel='stylesheet' type='text/css' href='<?php echo base_url('../assets/stylesheet.css'); ?>'/>
    <script type='text/javascript' src='<?php echo base_url('../assets/javasLogReg.js');?>'></script>


        <div class="flat-form">
            <ul class="tabs">
                <li>
                    <a href="#login" class="active" style="color: white;">Login</a>
                </li>
                <li>
                    <a href="#register">Register</a>
                </li>
            </ul>
            <div id="login" class="form-action show">
                <h1>Login on CompuKeep</h1>
                <form action='<?php echo base_url('Login/checklogin'); ?>' method='post' >

                    <input type='text' name='email' placeholder='E-mail' required />
                        
                        
                    <input type='password' name='password' placeholder='password' required />
                        
                       
                    <input type="submit" value='Login' class="button" />

                </form>
            </div>
            <!--/#login.form-action-->
            <div id="register" class="form-action hide">
                <h1>Register</h1>
                <form method='post' action='<?php echo base_url('Registration/registrationsent'); ?>' >
                        
                    <input type='text' id='reg' name='email' placeholder='E-mail' required />
                        
                        
                    <input type='password' id='reg' name='password' placeholder='password' required />
                        
                        
                    <input type="submit" id='submit' method='post' name='reg' value='Registrera' class="button" />

                </form>
            </div>
        </div>

