
<?php include_once('../../views/shared/_headerview.php');  ?>
<?php include_once('../../../application/classes/UserService.php') ;?>


<?php


        $user="";
        $pwd="";

    if (!empty($_POST['username']) && !empty($_POST['password']))
    {
        echo "<h2> in post username  or password</h2> ";
        $user=$_POST['username'];
        $pwd=$_POST['password'];
    
        $userservice= new UserService();    

        $records = $userservice->loginByRole($user,$pwd);

        if (empty($records))
        {
            echo "<h2> Invalid username  or password</h2> ";
            echo "<A href='login.php'>    retry</A> <br>";
            echo "<A> To Create the account please contact Admin user </A>";
        }
        else
        {
            foreach ($records as $row)
            {
                $_SESSION['Role'] = $row['Role'];        
                $_SESSION['UserName'] = $row['UserName'];
                $_SESSION['Id'] = $row['Id'];
                echo  $_SESSION['Id'];
            }

            if ($_SESSION['Role']==1)
            {                
               // header('Location: ../students/mainstudent.php');
            }
            else if ($_SESSION['Role']==2)
            {
                //header('Location: ../staff/mainstaff.php');
            }
            
            die();
        }
    }
?>

<div class="wrapper">
    <form class="form-signin" action="login.php" method="post">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="username" placeholder="User Name" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
</div>

<?php include_once('../shared/_footerview.php') ?>


