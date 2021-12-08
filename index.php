<?php
use Firebase\Auth\Token\Exception\InvalidToken;
// Firebase Database
include 'includes/dbconfig.php';

   
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
            // $uid = $verIdToken->claims()->get('sub');

            $uid = $signInResult->firebaseUserId();

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

    // $reference = $database->getReference('Test')->getValue();
    // echo $reference;

?>
<!DOCTYPE html>
<html>
    <header>

    </header>
    <body>
        <form>
            <label for="email">E-mail:</label><br>
            <input type="text" id="email" name="email" placeholder="189casd@gmail.com"><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" name="btnLogin" value="login">
        </form>
    </body>
</html>
