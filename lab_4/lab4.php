<?php
$nameError = $emailError= $usernameError=$passwordError=$confirmpaswordError="";
// $n=$e=$u=$p=$cp="";
if(isset($_POST['name']))
{
    $fullName = $_POST['name'];
    if($fullName=="" || (!preg_match("/^[a-zA-Z]+\s+[a-zA-Z]*$/",$fullName))|| (strlen($fullName)>40))
    {
        $nameError="Name is required";
    }
    else
    {
        $n="your name is $fullName";
    }
}
if(isset($_POST['email']))
{
    $email=$_POST['email'];
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $e="your email is $email";
    }
    else {
        $emailError=" invalid email";
    }
}
if(isset($_POST['username']))
{
    $userName = $_POST['username'];

    if($userName=="" || (!preg_match("/^\w+(\d{2})?$/",$userName))|| (strlen($userName)>10))
    {
        $usernameError="username  is required";
    }
    else
    {
        $u="your name is $userName";
    }
}
if(isset($_POST['password']))
{
    $password = $_POST['password'];

    if($password=="" || (!preg_match("/^[a-zA-Z0-9!@#$%^&+]{6,16}$/",$password))|| (strlen($userName)>16))
    {
        $passwordError="password is required";
    }
    else
    {
        $p="valid";
    }
}
if(isset($_POST['confirmPassword']))
{
    $confirmpassword = $_POST['confirmPassword'];
    if(!$confirmpassword==$password)
    {
        $confirmpasswordError="password didnot match";
        $userName = $_POST['username'];
    }
    else
    {
        $cp="matched";
    }
}

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Side Form Validation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<form action="lab4.php" name="signUp" method="post">
    <h1 class="form-tittle">Sign Up</h1>
    <div class="form-group" id="name-group">
        <label for="">Full Name</label>
        <input type="text" name="name" />
        <p class="message"><?php echo $nameError ;?></p>
        </div>


        <div class="form-group " id="email-group" >
            <label for="">Email Address</label>
            <input type="email" name="email"  />
            <p class="message"><?php echo $emailError ;?> </p>    
        </div>
        <div class="form-group" id="username-group">
            <label for="username">Username</label>
            <input type="text" name="username"  >
            <p class="message"><?php echo $usernameError ;?></p>
 
        <div class="form-group" id="password-group">
            <label for="">Password</label>
            <input type="password" name="password"/>
            <p class="message"><?php echo $passwordError ;?></p>
    
        </div>

        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" name="confirmPassword" />
            <p class="message"><?php echo $confirmpaswordError ;?></p>
        </div>
 
    <button class="btn" id="submit1" name="signup"> Signup</button>
</form>
 </div>
    <!-- <div class="data">
    <p><?php //echo $n ."<br>".$e ."<br>".$u ."<br>".$p ."<br>".$cp ."<br>";?>
</div> -->
</body>
</html>
<?php
$host='localhost';
$userName='root';
$password='';   
$dbName='users_detail';

$connection=new mysqli($host,$userName,$password);
if($connection->connect_error !=0)
{
    die('connection error');
}
$connection->select_db($dbName);
// {
//     echo('connection successfull');
// }

if(isset($_POST['signup']))
{
    $email=trim($_POST['email']);
    $confirmpassword = trim($_POST['confirmPassword']);
    $password =trim( $_POST['password']);
    $userName = trim($_POST['username']);
    $fullName = trim($_POST['name']); 
   
   if( empty($fullName) ||empty($userName)||empty($password)||empty($email)||empty($confirmpassword)){
    echo "please fill all the fields";
   }
   else{
    $sql="
    INSERT INTO users_info VALUES('$fullName','$email','$userName','$password','$confirmpassword');
        ";
        $success=$connection->query($sql);
    if($success)
    {
        echo "record inserted successfully";
    }
    else{
            echo"error in inserting data";
        }
    }
}
?>










