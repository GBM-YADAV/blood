<?php
$errors="";
$result="";
  if($_SERVER["REQUEST_METHOD"]== "POST"){
    session_start();
    $conn=mysqli_connect("localhost", "root", "", "blood");

    $bg=htmlspecialchars($_POST["blood"]);
    $mandal=htmlspecialchars($_POST["mandal"]);

            
    if(empty($bg) or empty($mandal)){
        $errors="make sure the selection of all the columns";
   
     }else{
         $status='yes';
         $result=mysqli_query($conn,"select name,address,email,number from blood.register where bg='$bg' and mandal='$mandal'and status='$status';");
         
     }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="list.css">
    <title>Document</title>
</head>
<body>
    <div class="list">
    <p style="color:red; " align="left"> <?php echo $errors; ?></p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            
                <p> Blood Group:<select class="in" id="blood group" name="blood">
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
          
        Mandal: <input class="in" type="text" name="mandal" placeholder="enter mandal"> <button class="logn">search</button>
        </p>
        <br>
    </form>
    
</div>
<div class="donars">
    <table id="donars" border="2px">
        <?php
      
         if($result->num_rows>0){ 
             
        ?>
            <tr><h2>list of Donors:-<br></h2></tr>
            <tr>
            <th>name</th>
            <th>address</th>
            <th>email</th>
            <th>mobile</th>
        </tr>
       <?php }
        ?>
        <tbody>
        <?php 

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
        ?>
     
        <tr>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['number'];?></td>
        </tr>

     <?php
            }
        }
        
        ?>
   
    </tbody>
    </table>
    
</div>
        
</body>
</html>
