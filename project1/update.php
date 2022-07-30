<?php
 session_start();
 $errors="";

 if(is_null($_SESSION["email"]))
 {
  header("Location: login.php");
 }
$user=$_SESSION["email"];
 $con=mysqli_connect("localhost","root","","blood");

 $select=mysqli_query($con, "SELECT * FROM register WHERE email='$user'");
  $data1 =mysqli_fetch_assoc($select); 

  
$name=$data1["name"];
$bg=$data1["bg"];
$email=$data1["email"];
$number=$data1["number"];
$dob=$data1["dob"];
$address=$data1["address"];
$mandal=$data1["mandal"];
$district=$data1["district"];
$state=$data1["state"];
$country=$data1["country"];
$pincode=$data1["pincode"];
$password=$data1["password"];
$status=$data1["status"];


if($_SERVER["REQUEST_METHOD"]=="POST"){




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

$sql="UPDATE blood.register SET name='$name',bg='$bg',number='$number',dob='$dob',address='$address',mandal='$mandal',
district='$district',state='$state',country='$country',pincode='$pincode',password='$password',status='$status' where email='$user'";


if (mysqli_query($con, $sql))
{
  echo "updated record created successfully";
  header("Location: details.php");
} 
  else 
  {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
  
}



?>
<head>
    <title>update details </title>
    <link rel="stylesheet" href="New User.css">
</head>
    <body>
        <div class="main">
            <div class="fbd">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST"> 
                    
                    <div class="ho">
                        <div class="hol">
                            <label for="name">Name</label>
                                <input class="in" type="text" placeholder="name" id="Name" name="name" value="<?php echo $name;?>">
                        </div>
                         <div class="hor">  
                            <label for="bg">blood Group</label>
                            <select class="in" id="blood group" name="bg" >
                                <option value="<?php echo $bg;?>"><?php echo $bg;?></option>
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
                        <label for="email">E-mail</label>
                        <input class="in" type="email" placeholder="Email" id="User id" name="email" value="<?php echo $email;?>">
                    </div>
                    <div class="ho">
                        <div class="hol">
                            <label for="number">Mobile</label>
                            <input class="in" type="text" placeholder="Number" id="Mobile" maxlength="10" name="number" value="<?php echo $number;?>" >
                        </div>
                        <div class="hor">
                            <label for="dob">Date of Birth</label>
                            <input class="in" type="date" placeholder="Date Of Birth" id="DOB" name="dob" value="<?php echo $dob;?>">
                        </div>
                    </div>
                    <div class="ho">
                        <div class="hol">
                            <label for="address">Address</label>
                            <input class="in" type="text" placeholder="dno,villagename" id="line1" name="address" value="<?php echo $address;?>">
                        </div>
                        <div class="hor">
                            <label for="mandal"> Mandal</label>
                            <input class="in" type="text" placeholder="mandal" id="line2" name="mandal" value="<?php echo $mandal; ?>">
                        </div>
                    </div>
                     <div class="ho">
                        <div class="hol">
                            <label for="district">district</label>
                            <input class="in" type="text" placeholder="district" id="dist" name="district" value="<?php echo $district;?>">
                        </div>
                        <div class="hor">
                            <label for="state">State</label>
                            <input class="in" type="text" placeholder="state" id="state" name="state" value="<?php echo $state;?>">
                        </div>
                     </div> 
                     <div class="ho">   
                        <div class="hol">
                            <label for="pincode">pincode</label>
                            <input class="in" type="text" placeholder="pincode" id="pin" maxlength="6" name="pincode" value="<?php echo $pincode;?>">
                        </div>
                        <div class="hor">
                            <label for="country">Country</label>
                            <input class="in" type="text" placeholder="Country" id="Country" name="country" value="<?php echo $country;?>">
                        </div>
                    </div>
                  <div class="ho">
                    <div class="hol">
                        <label for="password">Password</label>
                        <input class="in" type="password" placeholder="Password" id="password" minlength="6" name="password" value="<?php echo $password;?>">
                      </div>         
                   
                  </div>
                  <div class="ho">
                      <div class="ho1">
                    <label for="donate">are you willing to donate?</label>
                     <input type="radio" name="status" value="yes" <?php if($status=='yes'){echo 'checked';}?>>yes
                    <input type="radio" name="status" value="no" <?php if($status=='no'){echo 'checked';}?>>no
                </div>
                </div>
                
            
                   <div class="bu">
                    <button class="logn">UPDATE</button>
                   </div>
                </form>
            </div>

        </div>
    </body>
</html>  

