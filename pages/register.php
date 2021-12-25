<?php

include '../includes/dbconfig.php';

$auth = $firebase->createAuth();
if(isset($_POST['signup'])){
    session_start();
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];

    $userAuth = [
        'email' => $email,
        'emailVerified' => false,
        'password'=> $password,
    ];

    if($password == $conpassword){
        try{
            # Create User
            $createUser = $auth -> createUser($userAuth);
            echo 'user created';
            #Push Data
            $query=[
                $createUser->uid=>[
                    'info' =>[
                        'fname' => $fname,
                        'lname' => $lname,
                        'address' => $address
                    ],
                ],
            ];
            $database -> getReference('User')->set(
                [
                    $createUser->uid =>[
                    'info' =>[
                        'fname' => $fname,
                        'lname' => $lname,
                        'address' => $address
                        ],
                    ],
                ] 
            );
            $auth->sendEmailVerificationLink($email);
            echo '<script>alert("Successfully Registered! Please check your inbox for your email verification link!")</script>';
            
        }catch(Exception $e){
            echo '<script>alert("${e}")</script>';
            // echo $e;
        }
    }else{
        echo '<script>alert("Password not Match:)</script>';
    }

}
// elseif ($usertype=="establishment") {
//     echo("ESTABLISHMENT UNDER CONSTRUCTION");
// } 

?>

<html>
    <head>
        <title>PangLocally Register</title>
    </head>
    <body>
        

    
    <div class="EndUserReg">
    <p><h3>Register as User</h3></p>
        <form action="register.php" method="POST">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname"><br>
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname"><br>
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address"><br>
            <label for="fname">Email:</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            <label for="conpassword">Confirm-Password:</label><br>
            <input type="password" id="conpassword" name="conpassword"><br>
            <input type="submit" value="Submit" name="signup"><br>
        </form>

    </div>
    <div class="DoTLocalReg">
        <p><h3>Register as Department of Tourism</h3></p>
        <form action="register.php" method="POST">
            <label for="DotEmail">DoT Email:</label><br>
            <input type="text" id="dotEmail" name="dotEmail"><br>
            <label for="DotAddress">Dot Address:</label><br>
            <input type="text" id="dotAddress" name="dotAddress"><br>
            <label for="DoTZip">Zip:</label><br>
            <input type="text" id="dotZip" name="dotZip"><br>
            <label for="DotPassword">Password:</label><br>
            <input type="password" id="dotPassword" name="dotPassword"><br>
            <label for="DotConPassword">Confirm-Password:</label><br>
            <input type="password" id="dotconpassword" name="dotconpassword"><br>
            <input type="submit" value="Submit" name="signup"><br>
        </form>
    </div>

    </body>

</html>