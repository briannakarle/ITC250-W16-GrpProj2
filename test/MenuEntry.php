<?php
/**
 * MenuEntry.php - contains data about a single menu item in the food truck
 *
 * @package NewmanTacoTruck
 * @author Turner Tackitt, Souha, Alec
 * @version 1.0 2016/02/02 
 * @link http://itc250.denryu.net/ITC250-W16-GrpProj2/
 * @see PostbackCalculate.php
 * @see index.php
 * @todo none
 */


/*
 * contains data about a single menu item in the food truck
 *  @var $InternalName (string) - the internal name of the item (this will be saved to receipts, used for POSTs, and otherwise refer to this item)
 *  @var $DisplayName (string)  - the name of the item as it will be shown to the user
 *  @var $Description (string)  - the description of the item
 *  @var $ItemPrice   (float)   - the price of this item
 *  <code>
 *  $itemOnMenu=new MenuEntry("internal_name1","name1","description1","price1")
 *  </code> 
 */
class MenuEntry
{
    public $InternalName;
    public $DisplayName;
    public $Description;
    public $ItemPrice;
    public $ErrorMsg;
    
     /**
   * creates construtor
   *
   * 
   *
   * <code>
   * new MenuEntry($internalName, $displayName, $description, $itemPrice)  
   * </code>
   *
   * @param string $InternalName  the internal name of the item (this will be saved to receipts, used for POSTs, and otherwise refer to this item)
   *@param string $DisplayName  the name of the item as it will be shown to the user
   *@param string $Description the description of the item
   *@param float $ItemPrice  the price of this item
   * @todo none
   */
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
    

    /**
   * creates checkboxes for desired numbers
   * Example Output is:
   *	<input type="checkbox" name="bunchOfBoxes" value="sample" />Sample Item! ($5)
   *	<input type="select" name="sampleQuantity">[..items..]</select><span class="error"></span><div style="padding-left: 50px;">Description</div><br />
   *
   * <code>
   * echo $menuItem->createCheckboxHtml() 
   * </code>
   *
   * @return generated HTML for checkboxes
   * @todo none
   */
    public function createCheckboxHtml()
    {
        // Example output is
        // 
        // 
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
        null, $this->InternalName, $this->DisplayName, $this->ItemPrice, $this->ErrorMsg, $this->Description);


    }
}

