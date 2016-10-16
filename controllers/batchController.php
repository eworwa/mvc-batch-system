<?php
include '../models/Batch.php';

$action=$_REQUEST['action'];

$batchId=$_GET['batch_id'];
$parcelId=$_GET['parcel'];
$courierId=$_GET['couriers'];

$batch=Batch::getBatchById($batchId);
$consignment=new Consignment($batchId,$parcelId,$courierId);

//echo $action;

switch($action){
	case "create":
		$newBatch=Batch::createNewBatch();
		$batchId=$newBatch->id;
		$msg="<h2>New Batch created</h2>";
		break;
	case "close_batch":
		$batch->closeBatch();
		$msg="<h2>Batch closed</h2>";
		break;
	case "add_consignment":
		$batch->addConsignment($consignment);
		$msg="<h2>Consignment added to Batch ".$batch->id."</h2>";
		break;
	case "remove_consignment":
		$batch->removeConsignment($consignment);
		$msg="<h2>Consignment removed from Batch ".$batch->id."</h2>";
		break;
}
echo $msg;
echo "<a href='../views/adminBatch.php?batch_id=".$batchId."'>Go back to Batch</a>";
?>
