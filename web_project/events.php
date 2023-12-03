<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">
   <link rel="stylesheet" href="css/style1.css">

<title>events</title>

</head>

<body>
	<section>
		<div class="leftBox">
			<div class="content">
				<h1>
					Events and Members
				</h1><hr>
				
                 <p>
					The department of Computer Science and 
                              Engineering organized an interactive CSI
                              membership driveunder the Computer Society of India Chapter,
                              Access to CSI Knowledge Portal and opportunity to member virtual networking through CSI Communities and Blogs.
Both print and electronic versions of CSI-Communications each month.
Concessional registration fee for CSI events and training programs.
			
				</p>
			</div>
            <div class="content">
      <a href="register_form1.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
   </div>
</div>



<div class="events">
    <div class="container1">
    <table style="padding:10px">

<?php

@include 'config.php';
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

while($row = $result->fetch_assoc())
{
      echo "<tr><td><h2>" . $row["date"] . "</h2></td>
            <td><h1> " . $row["event_name"] . "</h1><hr>
            <h4> " . $row["description"] . "</h4>
            <p>" . $row["organised_by"] . "<p></td>";
}
?>
</table>
</div>
		</div>
	</section>
</body>

</html>
