<!-- <html>
    
<head>
    <title>SafeSpend | Register</title>
    <link rel="stylesheet" type="text/css" href="register.css" />
    <link rel="icon" href="public/playground_assets/Logo.png" type="image/x-icon">
</head>

<body>
    <form action="registerpost.php" method = "post" enctype="multipart/form-data">
        <div class="container">
          <h1>Register</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>
      
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" id="password" minlength=8 maxlength=15 required>
      
          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="password2" id="password2" minlength=8 maxlength=15 required>

          <label for="name"><b>Name</b></label>
          <input type="text" placeholder="Enter Name" name="name" id="name" required>

          <label for="number"><b>Phone Number</b></label>
          <input type="number" placeholder="Enter Contact No." name="mobileno" id="mobileno" minlength=10 maxlength=10 required>

          <label for="age"><b>Age</b></label>
          <input type="number" placeholder="Enter Age" name="age" id="age" required>
          <hr>
          
          <label for="photo"><b>Profile Photo (Optional)</b></label><br>
          <input type="file" name="photo" id="photo">
          <hr>

      
          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
          <button type="submit" class="registerbtn" value="Upload">Register</button>
        </div>
      
        <div class="container signin">
          <p>Already have an account? <a href="login.php">Sign in</a>.</p>
        </div>
      </form>
</body>
</html>  -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SafeSpend | Register</title>
        <link rel="stylesheet" href="bootstrap2/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap2/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="bootstrap2/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="css/reg.css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.6.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                background-color: #333333;
            }
            .btn{
                font-size: 24px;
                border-color:#e62272;
                border:1;
                background-color:#fff;
           
                color: #e62272;
                height: auto;
            }
            .btn.focus, .btn:focus, .btn:hover {
            color: #fff;
            text-decoration: none;
            background-color:#e62272;
            }
            .field-icon {
            float: right;
            margin-right: 140px;
            margin-top: -25px;
            position: relative;
            z-index: 1;
            }
            .red{
                color: red;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="logo"><img src="img/logo2.png" alt="lifestyle store logo"></a>
                </div>
                <div class="navbar-collapse collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right" style="font-size:20px;letter-spacing: 4px;word-spacing: -8px;">
                        <li><a href="signup.php" target="_self"><span class="glyphicon glyphicon-user">&nbsp;Sign Up</span></a></li>
                        <li><a href="login.php" target="_self" style="color:#e62272;"><span class="glyphicon glyphicon-log-in">&nbsp;Login</span></a></li>
                    </ul>
                </div>    
            </div>
        </nav>
        <br><br><br><br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel">                  
                            <div class="panel-heading">
                                <h2 style="text-align:center">LOGIN</h2>
                            </div>
                            <div class="panel-body">
                                <center>
                                <p class="text-warning">Login to make a purchase</p> 
                                <form class="form" action="login_submit.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required> 
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"  id="password" name="password" placeholder="Password" pattern=".{6,}" required>
                                        <i class="far fa-eye field-icon" id="togglePassword" style="cursor:pointer"></i>  
                                    </div>
                                    <script>
                                        const togglePassword = document.querySelector('#togglePassword');
                                        const password = document.querySelector('#password');
                                        togglePassword.addEventListener('click',function(e){
                                        const type = password.getAttribute('type') == 'password' ? 'text' : 'password';
                                        password.setAttribute('type',type);
                                        this.classList.toggle('fa-eye-slash');
                                    });
                                    </script>
                                    <button type="submit" value="Register" class="btn">Login</button><hr>
                                  
                                </form> 
                                </center>
                            </div>
                            <br><br><br>
                            <div class="panel-footer">
                                <center> Don't have an account? <a href="signup.php">Register</a></center>
                            </div>     
                        </div>
                    </div>
                </div>
            </div>
        <footer style="position: absolute;">
            <div class="container">
                <center>
                    <p>Copyright &copy; Lifestyle Store. All Rights Reserved  |  Contact Us: +91 90000 00000</p>	
                </center>
            </div>
        </footer>
    </body>
</html>