<?php

 /**
 * Class for defining Courier model.
 *
 * A Courier is a service used for shipping different Parcels in a Batch.
 * 
 * @author Enrique Worwa <eworwa@gmail.com>
 *
 * @version 1.0
 *
 * @var integer $id				unique identifier for the current element
 * @var string	$name			name of current element
 * @var string 	$address		address of current element
 * @var string	$data_method	method user by the current element to send digital date (email, FTP, other)
 */
class Courier{
  var $id;
  var $name;
  var $address;
  var $data_method;

  /**
   * Constructor
   */
  function Courier($id=0,$name="",$address="",$data_method=""){
    $this->id=$id;
    $this->name=$name;
    $this->address=$address;
    $this->data_method=$data_method;
  }

  /**
   * Static Function for retreiving all existing couriers
   *
   * @return Courier[] list of all existing couriers
   */
  public static function getCouriers(){
    $couriers;
    $couriers[]=new Courier(1,"DHL","Manchester","email");
    $couriers[]=new Courier(2,"UPS","Manchester","FTP");
    $couriers[]=new Courier(3,"Super Delivery","Manchester","email");
    $couriers[]=new Courier(4,"Delivery Fast","Manchester","FTP");
    
    return $couriers;
  }

  /**
   * Static Function for retreiving a specific courier by it's ID
   *
   * @param integer	$courierId	ID of the courier to be retreived
   *
   * @return Courier a Courier object identified by the provided ID
   */
  public static function getCourierById($courierId){
    $courier;
    switch($courierId){
      case 1:
	$courier=new Courier($courierId,"DHL","Manchester","email");
        break;
      case 2:
	$courier=new Courier($courierId,"UPS","Manchester","FTP");
        break;
      case 3:
	$courier=new Courier($courierId,"Super Delivery","Manchester","email");
        break;
      case 4:
	$courier=new Courier($courierId,"Delivery Fast","Manchester","FTP");
        break;
    }
    return $courier; 
  }

  /**
   * Function for storing a new Courier in database
   *
   * @return void
   */
  function addCourier(){
    // Logic to add a new Courier
  }

  /**
   * Function for deleting a Courier from database
   *
   * @return void
   */
  function deleteCourier(){
    // Logic to delete a Courier
  }

  /**
   * Function for storing a new Courier in database
   *
   * @param integer $courierId	unique identifier of Courier to be used to generate the requested Consignment Number
   *
   * @return string Consignment Number generated from custom Courier provided code
   */
  public static function generateConsignmentNumber($courierId){
    $consNumber="";
    switch($courierId){
      case 1:
      	// Code provided by Courier
        $consNumber="56756756";
        break;
      case 2:
        // Code provided by Courier
        $consNumber="asfasdf23";
        break;
      case 3:
	    // Code provided by Courier
        $consNumber="qwer987";
        break;
      case 4:
      	// Code provided by Courier
        $consNumber="as98fd98";
        break;
    }

    return $consNumber;
  }
}
?>
