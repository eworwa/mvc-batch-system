<?php
include 'Courier.php';

/**
 * Class for defining Consignment model.
 *
 * A Consignment is an element which is conform by a Parcel that is going to be send using a specific Courier.
 * 
 * @author Enrique Worwa <eworwa@gmail.com>
 *
 * @version 1.0
 *
 * @var integer $consId			unique identifier for the current element
 * @var string	$consNumber		unique identifier generates from custom code provided by Courier associated to the current element
 * @var integer $batchId		ID of Batch related to current element
 * @var integer	$parcelId		ID of Parcel related to current element
 * @var integer	$courierId		ID of Courier related to current element
 */
class Consignment{
  var $consId;
  var $consNumber;
  var $batchId;
  var $parcelId;
  var $courierId;
  
  /**
   * Constructor
   */
  function Consignment($batchId=0,$parcelId=0,$courierId=0){
    $this->consId=1;
    $this->batchId=$batchId;
    $this->parcelId=$parcelId;
    $this->courierId=$courierId;

    $this->consNumber=$this->generateConsignmentNumber();
  }

  /* Private function for genereting the Consignment number */
  /**
   * Function for generating the consignment number from the Courier
   *
   * @return string the generated consignment number
   */
  private function generateConsignmentNumber(){
    return Courier::generateConsignmentNumber($this->courierId);
  }
}
