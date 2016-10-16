<?php
include 'Consignment.php';

/**
 * Class for defining Batch model.
 *
 * A Batch is an element which is open every day and contains
 * differents Consignments, which will be send by the end of 
 * the day when the current Batch is closed.
 * 
 * @author Enrique Worwa <eworwa@gmail.com>
 *
 * @version 1.0
 *
 * @var integer $id				unique identifier for the current element
 * @var date 	$date			creation date of the current element
 * @var string	$status			status of current element (dispatched, not dispatched)
 * @var array	$considgnments	list of Consignments objects conforming the current element
 *
 * @todo Convert $status variable into a boolean one 
 */
class Batch{
  var $id;
  var $date;
  var $status;
  var $consignments;

  /**
   * Constructor
   */
  function Batch(){
    $this->id=1; // this id would be retreived from the db, the last id+1
    $this->date=date("Y-m-d");
    $this->status="not dispatched";

    $cons;
    $cons[]=new Consignment($this->id,1,1);
    $cons[]=new Consignment($this->id,2,2);
    $cons[]=new Consignment($this->id,3,3);
    $cons[]=new Consignment($this->id,4,4);
    $cons[]=new Consignment($this->id,5,3);
    $this->consignments=$cons;
  }

  /**
   * Function for adding a new consignment to the current batch
   *
   * @param Consignment $consignment a Consignment type object to be added to the current element
   *
   * @return void
   */
  function addConsignment($consignment){
    $this->consignments[]=$consignment;
  }

  /**
   * Function for removing a consignment from the current batch
   *
   * @param Consignment $consignment a Consignment type object to be removed from the current element
   *
   * @return void
   */
  function removeConsignment($consignment){
    
  }

  /**
   * Static Function for retreiving all existing batchs
   *
   * @return Batch[] list of all existing batchs
   */
  public static function getBatchs(){
    $batchs;
    
    // List of batchs created manually, this would come from db
    for($i=1;$i<=5;$i++){
      $batch=new Batch();
      $batch->id=$i;
      ($i!=5)?$batch->status="dispatched":$batch->status="not dispatched";
      $batchs[]=$batch;
    }

    return $batchs;
  }

  /**
   * Static Function for retreiving a specific batch by it's ID
   *
   * @param integer	$batchId	ID of the batch to be retreived
   *
   * @return Batch				a Batch object identified by the provided ID
   */
  public static function getBatchById($batchId){
    $batch=new Batch();
    $batch->id=$batchId;

    return $batch;
  }

  /**
   * Function for creating a new batch
   *
   * @return Batch				a new created Batch object
   */
  public static function createNewBatch(){
    return new Batch();
  }

  /**
   * Function for closing the current element
   *
   * @return void
   */
  public function closeBatch(){
    $cons=$this->consignments;
    foreach($cons as $con){
      $courier=Courier::getCourierById($con->courierId);
      echo "Sending Consignment to ".$courier->name." via ".$courier->data_method.", consignment number ".$con->consNumber."<br>";
    }
    $this->status="dispatched";
  }
}
?>
