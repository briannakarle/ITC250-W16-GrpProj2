<?php
/*
 * MenuEntry.php
 * Newman Catering PoS App
 * Class MenuEntry - contains data about a single menu item in food truck
 *
 * Fields
 *    $InternalName (string) - the internal name of the item (this will be saved to receipts, used for POSTs, and otherwise refer to this item)
 *  $DisplayName (string)  - the name of the item as it will be shown to the user
 *  $ItemPrice   (float)   - the price of this item
 */
class MenuEntry
{
    public $InternalName;
    public $DisplayName;
    public $Description;
    public $ItemPrice;
    public $ErrorMsg;
    
    function __construct($internalName, $displayName, $description, $itemPrice)
    {
        $this->InternalName = $internalName;
        $this->DisplayName  = $displayName;
        $this->Description  = $description;
        $this->ItemPrice    = $itemPrice;
        $this->ErrorMsg = '';
    }
    
    /**
    
    */
    public function createCheckboxHtml($checkboxGroupName)
    {
        // Example output is
        // <input type="checkbox" name="bunchOfBoxes" value="sample" />Sample Item! ($5)
        // <input type="text" name="sampleQuantity" placeholder="Quantity"/><br />
        //
        // Name of Quantity Box is derived from $internalName (eg, internal name for item is "sample", so input is "sampleQuantity"
        // sprintf($format, $arg1, ..., $argN) replaces format strings (%s, %d, %f, etc) with the arguments supplied.
        // First arg maps to first format string, second arg matches second format string, etc
        //
        // The odd dollar signs in the middle of the output are used to control which argument is used. Eg, %1$s will be replaced with the 1st argument, which will be formatted as a boring old string.
        return sprintf('<input type="checkbox" name="%2$sDesired" value="%2$s" onClick="toggleQuantityVisible(this)" />%3$s ($%4$0.2f)<select name="%2$sQuantity" id="%2$sQuantity" style="visibility: hidden; margin-left: 8pt;">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        </select>
        <span class="error">%5$s</span>
        <div style="padding-left: 50px;">%6$s</div>
        <br />',
        $checkboxGroupName, $this->InternalName, $this->DisplayName, $this->ItemPrice, $this->ErrorMsg, $this->Description);


    }
}

