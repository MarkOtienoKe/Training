<?php
session_start();
require_once 'classes/functions.php';
$user = new LoginRegistration();
$uid = $_SESSION['uid'];
$username = $_SESSION['uname'];

if (isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];

} else {
	header('Location:index.php');
	exit();
}

if (!$user->getSession()) {
	header('Location:login.php');
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Registration System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .welcome{
            color: blue;
        }
    </style>


</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h5>LoGIN REGISTRATION SYSTEM</h5>
        </div>
        <div class="mainMenu">
            <ul>
                <?php if ($user->getSession()) {?>
                    <li><a href="index.php">HOME</li></a>
                    <li><a href="profile.php">SHOW PROFILE</li></a>
                    <li><a href="changePassword.php">CHANGE PASSWORD</li></a>
                    <li><a href="logout.php">LOGOUT</li></a>
                    <?php } else {?>
                        <li><a href="login.php">LOGIN</li></a>
                        <li><a href="register.php">REGISTER</li></a>
                        <?php }?>
                    </ul>
                </div>

                <div class="content">

                    <p class="login_msg">


                    </p>

                    <h2 class="welcome">Welcome, <?php echo $username; ?></h2>

                    <p class="userlist">Profile of :<?php $user->getUsername($id);?></p>
                    <table class="table1">
                        <?php
$getUsers = $user->getUserById($id);
foreach ($getUsers as $user) {

	?>
                           <tr>
                            <td>Username</td>
                            <td><?php echo $user['username']; ?></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><?php echo $user['email']; ?></td>
                        </tr>

                        <tr>
                            <td>Website</td>
                            <td><?php echo $user['website']; ?></td>
                        </tr>

                      <tr>
                       <td>Updte Profile</td>
                       <td><a href="update.php?id=<?php echo $user['id']; ?>">Edit Profile</a></td>

                   </tr>
                   <?php }?>
               </table>
               <div class="back">
                <a href="index.php"><img src="images/back.png" width="30px" height="30px" alt="back"/></a>
            </div>
        </div>

        <div class="footer">
            <h3>@2016 all rights reserved</h3>
        </div>

    </div>



</body>
</html>