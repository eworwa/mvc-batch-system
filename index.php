<?php
include 'models/Batch.php';

session_start();

//global $batchs_global;
$batchs_global=Batch::getBatchs();
$_SESSION['batchs_global']=$batchs_global;
?>
<html>
<head>
	<title>Batch Control System</title>
</head>
<body>
	<h1>Batch Control System</h1>
	<br><a href="controllers/batchController.php?action=create">Create new Batch</a>
	<br><br>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>Date</td>
			<td>Status</td>
			<td>Consignments</td>
			<td>Action</td>
		</tr>
		<?php foreach($batchs_global as $batch){  ?>
		<tr>
			<td><?php echo $batch->id; ?></td>
			<td><?php echo $batch->date; ?></td>
			<td><?php echo $batch->status; ?></td>
			<td><?php echo count($batch->consignments); ?></td>
			<td><?php if($batch->status=="not dispatched") echo "<a href='views/adminBatch.php?batch_id=$batch->id'>Administer Batch</a>"; ?></td>
		</tr>
		    <?php } ?>
	</table>
</body>
</html>
