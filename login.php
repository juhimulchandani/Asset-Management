<?php require_once("includes/db.php");  ?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<?php
    
 //connecting database
   
     

 

if(isset($_POST['submit']))
{
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $user_type = $_POST['login_as']; 
    echo"$user";
    echo "$pass";
    echo "$user_type";
    
    
//    if(mysql_num_rows($result) == 1){ 
//        $row = mysql_fetch_array($sql); 
//        session_start(); 
//        $_SESSION['username'] = $row['username']; 
//        $_SESSION['fname'] = $row['first_name']; 
//        $_SESSION['lname'] = $row['last_name']; 
//        $_SESSION['logged'] = TRUE; 
//        header("Location: users_page.php"); // Modify to go to the page you would like 
//        exit; 
//    }
    
  
        $query = "SELECT * FROM student WHERE  name = '$user'  AND password='$pass'";
    //echo $query;
    $result = mysqli_query($connection,$query);
    
    if(mysqli_num_rows($result) == 1)
    {
        $row = mysql_fetch_array($result);
        header("Location: student.php"); // Modify to go to the page you would like 
//        exit;
        
    }
        
//     if(!$result){
//        die("Query FAILED : ". mysqli_error($connection));
//     }
 

}
?>
<!--
    //echo $user,$pass,$table;
   
//    $query = "SELECT * FROM $table WHERE  name = $user  AND password = $pass " ;
//    echo $query;
//    $result = mysqli_query($connection,$query);
//    
//    if ($result) 
//    {
//        echo "query successfull wrote to DB";
//      
//    }
//    else
//    {
//        echo"unscccessful login";
//    }

-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="Login - HTML5 ">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h1>Login</h1>
                </div>
                <div class="login-form">
                    <form method="POST" action="">
                       <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                       
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div>
<label>Login AS:</label>  
                       
                                      
<div class = "radio">

  <label><input type="radio" value="1" id="login_as" name="login_as" checked>Student</label>


  <label><input type="radio" value="3" id="login_as" name="login_as">Teacher</label>


  <label><input type="radio" value="2" id="login_as" name="login_as" >Lab Assistant</label>


  <label><input type="radio" value="6" id="login_as" name="login_as" >HOD</label>

 
  <label><input type="radio" value="5" id="login_as" name="login_as" >DPO</label>
  <label><input type="radio" value="7" id="login_as" name="login_as" >CPO</label>
 
        
        
</div>                                                                
                        <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="social-login-content">
                            <div class="social-button">
                               <form action="http://facebook.com">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                </form>
<!--                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>-->
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
