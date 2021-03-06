<!--*****************************************************
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 *****************************************************-->

<head>
	<?php
		session_start();
		if(!isset($_SESSION['user']))
		{
			header('Location:index.php');
		}
		include 'includes/dashboard_header.php' 
	?>
<link rel="stylesheet" href="css/jquery-nicemodal.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/jquery-nicemodal.js"></script>


  </head>
  <body>
	<div id="header">
		<div class="inHeader">
			<div class="mosAdmin">
				Hello, <?php echo ucfirst($_SESSION['user']);?><br>
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
		<h3>Vehicles</h3>
		<hr />

		<div id="smallCenter">
			<a href="create-vehicle.php"><br>
				<h3>
					<div align="center" class="btn">Add a New Vehicle</div>
				</h3>
			</a>
		</div>
		<div class="shortcutHome"></div>

		<table class="data">
			<tr class="data">
				<th class="data">Model</th>
				<th class="data">Make</th>
				<th class="data">Vehicle Year</th>
				<th class="data">Maintenance Date</th>
				<th class="data">Maintenance Description</th>
				<th class="data">License Plate</th>
				<th class="data">Km Count</th>
				<th class="data">History</th>
				<th class="data" width="75px"></th>
			</tr>
			<tr class="data">
				<?php
					include 'includes/connect.php';
					$sqls= mysqli_query($dbhandle,"SELECT * FROM vehicle");
					$sqlr= mysqli_num_rows($sqls);
					while($sqlf=mysqli_fetch_assoc($sqls))
					{   
				?>
						<td class="data" width="30px"><center><?php echo $sqlf['model']; ?></center></td>
						<td class="data"><center><?php echo $sqlf['make']; ?></center></td>
						<td class="data"><center><?php echo $sqlf['vehicle_year']; ?></center></td>
						<td class="data"><center><?php echo $sqlf['maintaince_date']; ?></center></td>
						<td class="data"><center><?php echo $sqlf['maintaince_description']; ?></center></td>
						<td class="data"><center><?php echo $sqlf['license_plate']; ?></center></td>
						<td class="data"><center><?php echo $sqlf['km_count']; ?></center></td>
						<td class="data"><center><?php echo $sqlf['history']; ?></center></td>
						<td class="data" width="75px">
							<center>
							<?php $vid= $sqlf['id_vehicle']; ?>
        <button> <a href="edit-vehicle.php?vid=<?php echo $vid;?>"><img src="css/img/edit.png"></a></button>
              <button name="delete" id="demo" formmethod="post" data-url="delete-vehicle.php?vid=<?php echo $vid;?>">  <img src="css/img/delete.png"></button>
							</center>
							</td>
      </tr><?php }

    ?>
    </table>
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
</div>
<?php 

include 'includes/dashboard_footer.php'

?>


   

