<?php
use Firebase\Auth\Token\Exception\InvalidToken;
// Firebase Database
include '../PangLocally/includes/dbconfig.php';
// include 'includes/dbconfig.php';


   
// Firebase Auth
$auth = $firebase->createAuth();

if(isset($_POST['btnLogin'])){
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    

    try {
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        $token = $signInResult->idToken();
        echo "Clicked";
        

        try {
            $verIdToken = $auth->verifyIdToken($token);
            // disregards
            $uid = $verIdToken->claims()->get('sub');

            $_SESSION['uid'] = $uid;
            $_SESSION['token'] = $token;

            // $_SESSION = "Logged in successfully!";
            header('Location: pages/dashboard.php');
            echo "SUCCESS";
            exit();
        } catch (InvalidToken $e) {
            echo '<script>alert("The token is invalid!")</script>';
        } catch (\InvalidArgumentException $e) {
            echo '<script>alert("The token could not be parsed!")</script>';
        }
    } catch (Exception $e) {
        echo '<script>alert("Invalid Email and/or Password!")</script>';
        
    }
}

$reference = $database->getReference('Test')->getValue();
echo $reference;

?>
<!DOCTYPE html>
<html>
    <header>
        <title>PangLocally Login</title>
    </header>
    <body>
    <form action="index.php" method="POST">
        <form>
            <label for="email">E-mail:</label><br>
            <input type="text" id="email" name="email" placeholder="189casd@gmail.com"><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" name="btnLogin" onclick="console.log('clicked')" value="login">
            <p>Dont have an account!<a href="pages/register.php">Sign Up!</a></p>
            <a >Forgot Password</a>
        </form>
        <div id="forgot" class="modal">
        <form id="resetpw"  method="post">
            <p>Email Address</p>
            <input type="email" name="forEmail" required>
            <p><input type="submit" id="resBtn" name="forSubmit" value="Reset"></p>
            <?php
            
            if(isset($_POST['forSubmit'])){
                session_start();
                $email = $_POST['forEmail'];
                echo 'Clicked';
            try {
                $auth->sendPasswordResetLink($email);
                echo('<b>Password Reset Link has been sent to your email address! <br/>Can\'t find it? Check your SPAM folder!</b>');
            } catch (Exception $e) {
                if(str_contains($e->getMessage(), "EMAIL_NOT_FOUND")) {
                    echo('<b>Email not found! Kindly double check the email.</b><br>
                    <p>Email Address</p>
                    <input type="email" name="resEmail" required>
                    <p><input type="submit" id="resBtn" name="resSubmit" value="Reset"></p>');
                }
            }
        }
            ?>
        </form>
        </div>
    </body>
</html>
