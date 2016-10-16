<?php
include '../models/Parcel.php';
include '../models/Batch.php';

$batchId=$_REQUEST['batch_id'];
$couriers=Courier::getCouriers();
$parcels=Parcel::getParcels();

$batch=Batch::getBatchById($batchId);
$cons=$batch->consignments;
?>
<html>
<head>
	<title>Batch ID: <?php echo $batch->id; ?></title>
</head>
<body>
	<h1>Batch ID: <?php echo $batch->id; ?></h1>

	<!-- List of all Consignment in the current Batch -->
	<table border="1">
		<tr>
			<td>Consignment Number</td>
			<td>Courier</td>
			<td>Parcel ID</td>
			<td>Remove Consignment</td>
			</tr>
			<?php foreach($cons as $consignmnet){ ?>
			<tr>
			<td><? echo $consignmnet->consNumber; ?></td>
			<td><? echo $consignmnet->courierId; ?></td>
			<td><? echo $consignmnet->parcelId; ?></td>
			<td><? echo "<a href='../controllers/batchController.php?action=remove_consignment&batch_id=".$batch->id."&consignmnet_id=".$consignmnet->consId."'>Remove</a>"; ?></td>
		</tr>
		<?php } ?>
	</table>

	<!-- Form for adding new Consignment to the current Batch-->
	<h3>Add a Consignment</h3>
	<form name="add_consignment_form" method="get" action="../controllers/batchController.php">
		Select a Parcel
		<select name="parcels">
			<? foreach($parcels as $parcel){ ?>
			<option value="<?=$parcel->parcelId?>"><?php echo $parcel->parcelId." - Weight ".$parcel->weight; ?></option>
			<?php } ?>
		</select>
		Select a Courier
		<select name="couriers">
			<? foreach($couriers as $courier){ ?>
			<option value="<?=$courier->name?>"><?php echo $courier->name; ?></option>
			<?php } ?>
		</select>
		<input type="hidden" name="action" value="add_consignment" />
		<input type="hidden" name="batch_id" value="<?php echo $batch->id; ?>" />
		<input type="submit" value="Add" />
	</form><br>

	<!-- Call to action to close the current Batch -->
	<h3>Close Batch</h3>
	<a href="../controllers/batchController.php?action=close_batch&batch_id=<?php echo $batch->id; ?>">Close this batch</a>
	<br><br><br><br>
	<a href="../index.php">Go to index</a>
</body>
</html>
