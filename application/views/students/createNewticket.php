<?php

    $userID=$_POST['uid'];
    $password=$_POST['pwd'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $role=$_POST['role'];


$query="Select * from users where userID='$userID'" ;  
$con=mysqli_connect("localhost","root","1234","ticketingsystem");
$records=mysqli_query($con,$query);
if ($rec=mysqli_fetch_array($records)){
        echo "User name already taken";
}
else{
    $query="insert into users values('$userID','$password','$name','$email',$role)"; 
    
    
    mysqli_query($con,$query);
}

if ($query == true) {
    return 
$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
}else {
    $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';}

?>

<html>

<p>AAAAAAAAAAAAAAAAAAAA</p>
    <a dir="rtl" style="color:dimgrey" >thank you, <?php echo $result ?>!</a>

</html>