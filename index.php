<?php
include("MenuEntry.php");
include("PostbackCalculate.php");

/*
 * index.php
 * Newman Catering PoS App
 * Main Page - postback form for both choosing menu items and displaying the total price for said items
 *
 */

$foodOptions[] = new MenuEntry("burrito","Burrito", "Mildly Spicy Burrito", 7.95);
$foodOptions[] = new MenuEntry("tacos","Tacos", "Run of the mill Tacos; we recommend this with Carne Asada", 2.20);
$foodOptions[] = new MenuEntry("friedIceCream","Fried Ice Cream", "Mexican Fried Ice Cream: Too darn sweet", 5.00);

$OrderAnyItems = false;
// postback validation

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Food Truck picker</title>
        <script language="JavaScript">
        function toggleQuantityVisible(itemCheckbox)
        {
            if(itemCheckbox.checked) document.getElementById(itemCheckbox.value + "Quantity").style.visibility = "visible";
            else /* -->   -->  -->*/ document.getElementById(itemCheckbox.value + "Quantity").style.visibility = "hidden";
        }
        </script>
        <style>
        .error {color: red; font-weight: bold;}
        </style>
    </head>
    <body>
        <h1>Welcome to The Food Truck</h1>

        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            <?php
                // print out the menu items that make up the order form
                foreach($foodOptions as $menuItem)
                {
                    echo $menuItem->createCheckboxHtml("food");
                }
            ?>
            <input type = "submit" name = "purchaseFood" onclick="validateForm()"/>
        </form>

        <?php
        if(isset($_POST["purchaseFood"]))
        {
            $order = 'Your order: </br>';
            $total = 0;
            if ( calculatePostback($order, $total) )
            {
                echo "<br />".$order;
                echo "<br />";
                echo 'Your total: $'.sprintf('%0.2f', $total);
            }
            else
            {
                echo '<span class="error">Please Select an Item</span>';
            }
        }
        ?>
    </body>
</html>
