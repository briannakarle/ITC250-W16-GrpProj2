<?php
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
            if( isset($_POST[$currentFoodOption->InternalName . "Quantity"] ) && is_numeric($_POST[$currentFoodOption->InternalName . "Quantity"]) /* TODO check for blank too - idk if is_numberic tests for blank strings*/ )
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
