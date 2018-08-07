<?php include_once('../shared/_headerview.php') ?>
<?php include_once('../application/classes/UserService.php') ?>

<?php
    $user=$_POST['username'];
    $pwd=$_POST['password'];
    
    $userservice= new UserService();    

    $records = $userservice->getUserByRole($user,$pwd);
    
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
            $_SESSION['UserId'] = $row['Id'];
        }

        header('Location: ../students/mainstudent.php');
        die();
    }

?>

<div class="wrapper">
    <form class="form-signin">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
</div>

<?php include_once('../shared/_footerview.php') ?>


