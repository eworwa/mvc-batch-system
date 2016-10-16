<?php

/**
 * Class for defining Parcel model.
 * Attributes:
 *  parcelId -> numeric, unique identifier
 *  weight -> float, weight of the parcel
 */
 
 /**
 * Class for defining Parcel model.
 *
 * A Parcel is a package to be send to customers.
 * 
 * @author Enrique Worwa <eworwa@gmail.com>
 *
 * @version 1.0
 *
 * @var integer $parcelId		unique identifier for the current element
 * @var float	$weight			weight of current element (in kg)
 */
class Parcel{
  var $parcelId;
  var $weight;

  /**
   * Constructor
   */
  function Parcel(){
    $this->parcelId=1;
    $this->weight=5.2;
  }

  /* Static function for listing differents parcels */
  /**
   * Static Function for retreiving a random list of Parcels
   *
   * @return Parcel[] list of Parcels
   */
  public static function getParcels(){
    $parcels;
    for($i=0;$i<5;$i++){
    	$parcels[]=new Parcel();
    }
    
    return $parcels;
  }
}
