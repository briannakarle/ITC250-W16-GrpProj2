<?php


/**
 * PostbackCalculate.php gets the info from the form and it does the math for the program 
 *
 * @package NewmanTacoTruck
 * @author Turner Tackitt, Souha, Alec
 * @version 1.0 2016/02/02 
 * @link http://itc250.denryu.net/ITC250-W16-GrpProj2/
 * @see index.php
 * @see MenuEntry.php
 * @todo none
 */


/**
   * Gets quanties and adds up to get total
   *
   * 
   *
   * <code>
   * $order = ''; // passed as reference to get order text
   * $total = 0.0; // passed as reference to get order total
   * $output = calculatePostback(&$order, &$total);
   * </code>
   *
   * @param  string &$order The returned order of the client. Passed as reference for multiple return values.
   * @param float &$total The returned total of the client's order Passed as reference for multiple return values.
   * @return boolean  Test if the form is validated or not, and if we have any valid orders.
   * @todo none
   */
function calculatePostback(&$order, &$total)
{
    global $foodOptions;
    $OrderAnyItems = false;
    foreach($foodOptions as $currentFoodOption)
    {

    // tests for if the user wants an item by checking the form
    //  for the checked item (eg, burrito is tested using the checkbox burritoDesired)
        if( isset($_POST[$currentFoodOption->InternalName . "Desired"]) )
        {
            if( isset($_POST[$currentFoodOption->InternalName . "Quantity"] ) && is_numeric($_POST[$currentFoodOption->InternalName . "Quantity"]) )
            {    
                //Get total price
                $itemQuantityFlt = (float)$_POST[$currentFoodOption->InternalName . "Quantity"];
                $total += $itemQuantityFlt * $currentFoodOption->ItemPrice;
                
                //Get order output
                $order .= $currentFoodOption-> DisplayName ." x ". $itemQuantityFlt." </br> ";
                $OrderAnyItems = true;
            }
        }    
    }
    
    return $OrderAnyItems;
}
