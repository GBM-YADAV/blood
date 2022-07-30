<?php
      
         $errors=""; 
     if($_SERVER["REQUEST_METHOD"]== "POST"){
        session_start();
        $conn=mysqli_connect("localhost", "root", "", "blood");

        $email= htmlspecialchars($_POST["email"]);
        $password=htmlspecialchars($_POST["password"]);
                 
                
        if(empty ($email) or empty($password)){
            $errors="Invalid inputs!";
         }else{
            $query=mysqli_query($conn, "SELECT email, password FROM register WHERE email='$email';");
            $data =mysqli_fetch_assoc($query);

            if(is_null($data["email"])){
                $errors= "Username doesn't exist!";
                header("location:register.php");
             }else{
                  if($password==$data["password"]){
                   session_start();
                   $_SESSION["email"]=$email;
                   header("location: details.php");
                  }else{
                    $errors="Password is not correct!";
                    }
             }
        
        }
    }

?>

<html>
<head>
<title>login</title>
<link rel="stylesheet" href="donar.css">
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="log">
              <p style="color:red;"> <?php echo $errors; ?></p>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    <h3 class=heading>Login Here</h3>
            
                    <label for="username">User id</label>
                    <input class="in" type="text" placeholder="Email" name="email">
            
                    <label for="password">Password</label>
                    <input class="in" type="password" placeholder="Password" name="password">
            
                    <button class="logn">Log In</a></button>
                    <button class="sign"><a href="register.php">New User</a></button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>  