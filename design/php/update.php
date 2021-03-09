<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/host.css"> 
    <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/info.css">
    <script type="text/javascript" src="../Js/update.js"></script>
    <title>SANCTURY</title>   <link href="../image/login/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body>
<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-type:text/html;charset=utf-8");
//连接数据库
$con = mysql_connect("localhost","root","");
    //选择数据库
 $c=mysql_select_db("user");
 $id= $_SESSION[ 'id' ];
$query = "select * from users where id='$id'";
$result =mysql_query($query);
$row= mysql_fetch_assoc($result); 

?>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fa fa-bars" id="btn"></i>  
        <i class="fa fa-times" id="cancel"></i>  
     </label>

    <div class="sidebar">
    <header>SANCTURY</header>
    <ul>
     <li ><a href="host.php"><i class="fa fa-qrcode"></i>Personal</a></li>
     <li ><a href="album.php"><i class="fa fa-music"></i>Music</a></li>
     <li ><a href="#"><i class="fa fa-shopping-bag"></i>Market</a></li>
     <li ><a href="#"><i class="fa fa-shopping-cart"></i>Shopping cart</a></li>
     <li ><a href="#"><i class="fa fa-film"></i>Gallery</a></li>
     <li ><a href="#"><i class="fa fa-envelope-open"></i>Contact Us</a></li>
     <li ><a href="index.php"><i class="fa fa-sign-out"></i>Sign out</a></li>
    </ul>
</div>
<section>
   <!-- <h1 class=>Welcome To The Sanctuary！</h1> -->
   <div class="font"><h3><?php date_default_timezone_set('PRC');
         $showtime=date("H:i");  
     if($showtime>='6:00'&&$showtime<='11:59'){ echo "Good Morning！Dear  ".$row['username'];}
     else if($showtime>='11:30'&&$showtime<='12:59'){ echo "Good Noon！Dear  ".$row['username'];}
     else if($showtime>='13:00'&&$showtime<='18:59'){ echo "Good Afternoon！Dear  ".$row['username'];}
     else if($showtime>='19:00'&&$showtime<='23:59'){ echo "Good Evening！Dear  ".$row['username'];}
     else{echo "Good Mid-Night！Dear  ".$row['username'];}
        ?>&nbsp;<i class="fa fa-smile-o"></i></h3>  
        <h4> <?php  date_default_timezone_set('PRC');
              echo "Today is ".$w=date("l");echo ",  ".$date=date("Y M d");?></h4></div>
   <div class="info"><form action="upsql.php" class="box" method="POST" onsubmit="return updatechk();">
   <table><tr> <th colspan="3"> Personal Information Card</th></tr>   
           <tr><td rowspan="4">
               <img src="<?php if($row['gender']=='LFJJ'){echo "../image/index/female.jpg";}else{echo "../image/index/male.jpg";}?>"></td>
           <td colspan="2"><i class="fa fa-address-card-o" ></i><span>Account IDNum：<?PHP echo $row['id']?></span></td>
       </tr>
          <tr>
          <td><i class="fa fa-user"></i><span>Username：<input type="text" value="<?PHP echo $row['username']?>" name="mn" id="mname" onblur="upname()" ></span></td>
          <td><i class="fa fa-venus-mars"></i><span>Gender：<input type="text" name="mg" value="<?php if($row['gender']=='LFJJ'){ echo "LFJJ";} else { echo "LFGG";}?>" id="mgender" onblur="upgender()" ></span></td></tr>
          <tr>
         <td><i class="fa fa-birthday-cake"></i><span>Birthday：<input type="text" value="<?PHP echo $row['birthday']?>" id="mbirth" name="mb" onblur="upbirth()"></span></td>
          <td><i class="fa fa-phone"></i><span>Telephone：<input type="tel" value="<?PHP echo $row['tel']?>" name="mt" id="mtel" onblur="uptel()"></span></td></tr>
          <tr><td><i class="fa fa-envelope-o"></i><span class="mail">E-mail：<input type="email" value="<?PHP echo $row['email']?>" name="ma" id="mail" onblur="upmail()"></span></td>
          <td ><i class="fa fa-line-chart"></i><span>Account Type：Regular Member</span></td>
        </tr>
    </table>
    <input type="submit" class="update" value="修改信息">
</form>
</div>


</section>
</div>
</body>
</html>