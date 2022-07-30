<?php


if($_SERVER["REQUEST_METHOD"]=="POST"){

$con=mysqli_connect("localhost","root","","blood");

$name=$_POST["name"];
$bg=$_POST["bg"];
$email=$_POST["email"];
$number=$_POST["number"];
$dob=$_POST["dob"];
$address=$_POST["address"];
$mandal=$_POST["mandal"];
$district=$_POST["district"];
$state=$_POST["state"];
$country=$_POST["country"];
$pincode=$_POST["pincode"];
$password=$_POST["password"];
$status=$_POST["status"];

$sql="INSERT INTO blood.register (name, bg,email,number,dob,address,mandal,district,state,country,pincode,password,status)  VALUES ('$name','$bg','$email','$number','$dob',
'$address','$mandal','$district','$state','$country','$pincode','$password','$status')";


if (mysqli_query($con, $sql))
{
  echo "<script><alert>new record created successfully</alert></script>";
  header("location:login.php");
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
  
}



?>
<head>
    <title>Register </title>
    <link rel="stylesheet" href="New User.css">
</head>
    <body>
        <div class="main">
            <div class="fbd">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST"> 
                    <h3> Register To Donate Blood</h3>
                    <div class="ho">
                        <div class="hol">
                            <label for="name">Name</label>
                                <input class="in" type="text" placeholder="name" id="Name" name="name">
                        </div>
                         <div class="hor">  
                            <label for="bg">blood Group</label>
                            <select class="in" id="blood group" name="bg">
                                <option value="select">select</option>
                                <option value="O +ve">O +ve</option>
                                <option value="O -ve">O -ve</option>
                                <option value="A +ve">A +ve</option>
                                <option value="A -ve">A -ve</option>
                                <option value="B +ve">B +ve</option>
                                <option value="B +ve">B +ve</option>
                                <option value="AB +ve">AB +ve</option>
                                <option value="AB -ve">AB -ve</option>
                              </select>
                        </div>
                    </div>   
                    
                    <div class="ho">
                    <div class="hol">
                        <label for="email">E-mail</label>
                        <input class="in" type="email" placeholder="Email" id="User id" name="email">
                    </div>
                        <div class="hor">
                            <label for="number">Mobile</label>
                            <input class="in" type="text" placeholder="Number" id="Mobile" maxlength="10" name="number">
                        </div>
                    </div>
                        <div class="ho">
                        <div class="hol">
                            <label for="dob">Date of Birth</label>
                            <input class="in" type="date" placeholder="Date Of Birth" id="DOB" name="dob">
                        </div>
                        <div class="hor">
                            <label for="address">Address</label>
                            <input class="in" type="text" placeholder="dno,villagename" id="line1" name="address">
                        </div>
                        </div>
                        <div class="ho">
                        <div class="hol">
                            <label for="mandal"> Mandal</label>
                            <input class="in" type="text" placeholder="mandal" id="line2" name="mandal">
                         </div>
                        <div class="hor">
                            <label for="district">district</label>
                            <input class="in" type="text" placeholder="district" id="dist" name="district">
                        </div>
                        </div>
                        <div class="ho">
                        <div class="hol">
                            <label for="state">State</label>
                            <input class="in" type="text" placeholder="state" id="state" name="state">
                        </div>
                        <div class="hor">
                            <label for="pincode">pincode</label>
                            <input class="in" type="text" placeholder="pincode" id="pin" maxlength="6" name="pincode">
                        </div>
                        </div>
                        <div class="ho">
                        <div class="hol">
                            <label for="country">Country</label>
                            <input class="in" type="text" placeholder="Country" id="Country" name="country">
                        </div>
                    <div class="hor">
                        <label for="password">Password</label>
                        <input class="in" type="password" placeholder="Password" id="password" minlength="6" name="password">
                      </div>         
                   
                  </div>
                  <div class="ho">
                  <div class="hol">
                    <label for="ho1">are you willing to donate?</label>
                     <input type="radio" name="status" value="yes" >yes
                    <input  type="radio" name="status" value="no" >no
                  </div>
                </div>
                
            
                   <div class="bu">
                    <button class="logn">Register</button>
                   </div>
                </form>
            </div>

        </div>
    </body>
</html>  

