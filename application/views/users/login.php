<html>

<?php
    $user=$_POST['username'];
    $pwd=$_POST['password'];

$query="Select * from users where userID='$user' and password='$pwd'" ;  

$con=mysqli_connect("localhost","root","1234","ticketingsystem");
$records=mysqli_query($con,$query);
if ($rec=mysqli_fetch_array($records)){
    session_start();
    $_SESSION['currentname']=$user;
    $_SESSION['currentrole']=$rec[4];
    
     if( $rec[4]==1){
        header('location: http://localhost/ticketsystem/admin/admin.php');
    }elseif ( $rec[4]==2) {
         header('location: http://localhost/ticketsystem/staff/staff.php');
     }elseif ( $rec[4]==3) {
         header('location: http://localhost/ticketsystem/students/mainStudent.php');
     }
}
else{
    echo "<h2> Invalid username  or password</h2> ";
    echo "<A href='http://localhost/ticketsystem/users/login.html'>    retry</A> <br>";
    echo "<A> To Create the account please contact Admin user </A>";
}
    ?>
</html>


