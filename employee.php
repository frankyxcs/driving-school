<!--*****************************************************
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 *****************************************************-->

 <?php
session_start();
if(!isset($_SESSION['user'])){
header('Location:index.php');
}
include 'includes/dashboard_header.php';
include 'includes/dashboard_header.php';
?>
<link rel="stylesheet" href="css/jquery-nicemodal.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/jquery-nicemodal.js"></script>


  </head>
  <body>
 
<div id="header">
  <div class="inHeader">
    <div class="mosAdmin">
    Hello, <?php echo ucfirst($_SESSION['user']);

    ?><br>
   | <a href="includes/logout.php">Logout</a>
    </div>
  <div class="clear"></div>
  </div>
</div>


<div id="wrapper">
  <div id="leftBar">
  <ul>
 <?php
include'includes/dashboard_menu.php'
 ?>
  </ul>
  </div>
  <div id="rightContent">
  <h3>Employees</h3>
  <hr />
  
  	      <div id="smallCenter"><a href="create-receptionist.php"><br><h3><div align="center" class="btn">Add a New Receptionist</div></h3></a></div>
 
  <table class="data">
 
      <tr class="data"> 
        <th class="data">First Name</th>
        <th class="data">Last Name</th>
        <th class="data">Gender</th>
        <th class="data">Phone Number</th>
        <th class="data">address</th>
        <th class="data">Username</th>
        <th class="data">Password</th>
        <th class="data" width="75px"></th>
      </tr>
      <tr class="data">
          <?php
include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"SELECT * FROM people inner join receptionist where people.sincard = receptionist.sincard");
$sqlr= mysqli_num_rows($sqls);

while($sqlf=mysqli_fetch_assoc($sqls)){   ?>
        <td class="data" width="30px"><center><?php echo $sqlf['first_name']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['last_name']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['gender']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['phone_num']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['address']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['username']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['password']; ?></center></td>
        <td class="data" width="75px">
           <center>
         <?php  $sqlres=$sqlf['sincard']; ?>
        <button> <a href="edit-receptionist.php?sincard=<?php echo $sqlres;?>"><img src="css/img/edit.png"></a></button>
              <button name="delete" id="demo" formmethod="post" data-url="delete-receptionist.php?sincard=<?php echo $sqlres;?>">  <img src="css/img/delete.png"></button>
       </center>
        </td>
      </tr><?php } ?>
  </table>
       <div id="smallCenter"><a href="create-instructor.php"><br><h3><div align="center" class="btn">Add a New Instructor</div></h3></a></div>


   <table class="data">
      <tr class="data">
         <th class="data">First Name</th>
        <th class="data">Last Name</th>
        <th class="data">Gender</th>
        <th class="data">Phone Number</th>
        <th class="data">address</th>
        <th class="data">Driving License Number</th>

        <th class="data" width="75px"></th>
      </tr>
      <tr class="data">
          <?php
include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"SELECT * FROM people inner join instructor where people.sincard = instructor.sincard");
$sqlr= mysqli_num_rows($sqls);

while($sqlf=mysqli_fetch_assoc($sqls)){   ?>
        <td class="data" width="30px"><center><?php echo $sqlf['first_name']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['last_name']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['gender']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['phone_num']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['address']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['dl_number']; ?></center></td>
        <td class="data" width="75px">
        <center>
         <?php  $sqlres=$sqlf['sincard']; ?>
          <button name="views" formmethod="post" data-url="view-instructor.php?sincard=<?php echo $sqlres;?>" id="demo"><img src="css/img/detail.png"></button>

        <button> <a href="edit-instructor.php?sincard=<?php echo $sqlres;?>"><img src="css/img/edit.png"></a></button>
              <button name="delete" id="demo" formmethod="post" data-url="delete-instructor.php?sincard=<?php echo $sqlres;?>">  <img src="css/img/delete.png"></button>
       </center>
        </td>
    
      </tr><?php } ?>
  </table>
	
	
    
</div>

<script>
$(function(){

    $('button#demo').nicemodal({
        width: '500px',
        keyCodeToClose: 27,
        defaultCloseButton: true,
        idToClose: '#close-nicemodal',
        closeOnClickOverlay: true,
        closeOnDblClickOverlay: false,
          //onCloseModal: function(){
       // alert('Reload Page to see the effect !');
         //   window.location.href='student.php';

         //}
        

    });
});
</script>

<?php 

include 'includes/dashboard_footer.php'

?>


   

