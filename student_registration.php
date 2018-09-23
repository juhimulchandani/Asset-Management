<?php require_once("includes/db.php"); ?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<?php
   //connecting database
//    $connection = mysqli_connect("localhost","Shyam Rochlani","Shyam1234","assetmanagement");
    
    //INserting data in table
    if(isset($_POST['submit'])){
        
        $username = $_POST['username'];
        $division = $_POST['division'];
        $roll_no = $_POST['roll_no'];
        //$email = $_POST['email'];
        $department = $_POST['department']; 
        $password = $_POST['password'];
        //if($department==)
         echo "<br>$department";
      
        
       $query = "INSERT INTO student(name,class,roll_no,dept_id,password)
        VALUES('$username','$division',$roll_no,$department,'$password')";
        //echo $query;
        $add = mysqli_query($connection, $query);
        if(!$add){
        die("Query FAILED : ". mysqli_error($connection));
            
        }
            
        $user_id=mysqli_insert_id($connection);
        echo "$user_id";
        $user_type=1;
        $query = "INSERT INTO user(user_id,user_type)
        VALUES($user_id,$user_type)";
        //echo $query;
        $add = mysqli_query($connection, $query);
        if(!$add){
        die("Query FAILED : ". mysqli_error($connection));
    }
       // echo "hello";
    
    }
    
?>    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student-Registration - HTML5 </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
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
                    <h1>Sign Up</h1>
                </div>
                <div class="login-form">
                    <form method="POST" role="form">
                        <div class="form-group">
                            <label>UserName</label>
                            <input type="text" class="form-control" placeholder="UserName" name="username">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                         <div class="form-group">
                            <label>Roll-no</label>
                            <input type="number" class="form-control" placeholder="Enter your Number" name="roll_no">
                        </div>
                        
                        <div class="form-group">
                            <label>Class</label>
                            <input type="text" class="form-control" placeholder="Enter your class" name="division">
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <br>
                            <select name="department" id="department">
                               <option value="" selected>Select your option..</option>
                                <option value="1">CMPN</option>
                                <option value="2">IT</option>
                                <option value="3">EXTC</option>
                                <option value="4">ETRX</option>
                                <option value="5">INSTRU</option>
                            </select>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        <div class="social-login-content">
                            <div class="social-button">
                                <form action="http://facebook.com" >
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                                </form>
<!--                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>-->
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="#"> Sign in</a></p>
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
