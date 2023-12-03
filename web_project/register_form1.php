<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $reg_num = mysqli_real_escape_string($conn, $_POST['reg_num']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $member = $_POST['member'];
   $utr_ref = mysqli_real_escape_string($conn, $_POST['utr_ref']);
   $ph_num = mysqli_real_escape_string($conn, $_POST['ph_num']);

   $select = " SELECT * FROM members WHERE email = '$email' && member ='$member'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){ 

    $error[] = 'user already registered!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO members(name, email, password, member, reg_num, utr_ref, ph_num) VALUES('$name','$email','$pass','$member','$reg_num','$utr_ref','$ph_num')";
         mysqli_query($conn, $insert);
         header('location:events.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="text" name="reg_num" required placeholder="enter your registration number">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="member">
         <option value="CSI">CSI</option>
         <option value="IEEE">IEEE</option>
      </select>
      make payment(i,e:if CSI-900Rs/if IEEE-1200Rs) to 9949064526(phonepe/googlepay/paytm) enter the details below
      <input type="text" name="utr_ref" required placeholder="enter upi reference number">
      <input type="text" name="ph_num" required placeholder="enter mobile number">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <a href="events.php">back</a>
   </form>

</div>

</body>
</html>