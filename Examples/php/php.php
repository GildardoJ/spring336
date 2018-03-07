<!DOCTYPE html>
<html>
    <head>
        <title>PHP Arrays</title>
    </head>
    <body>
        
        <?php
            echo "<h1>Indexed</h1>";
            // Indexed array
            // Order matters
            // I can initialize with values
            $groceryList = array("newspaper", "candy", 3.141828);
            
            // Add elements in order to the indexed array
            $groceryList[] = "bread";
            $groceryList[] = "milk";
            
            // This only adds to the end
            array_push($groceryList, "cheese", "butter", "chicken");
            
            var_dump($groceryList);
            
            // How do i get elements out?
            echo "<div>Item (1): ".$groceryList[1]."</div>";
            
            // Loop through the array
            echo "<ol>";
            for ($i = 0; $i < count($groceryList); $i++) {
            echo "<li>Item ($i): ".$groceryList[$i]."</li>";
            }
            echo "</ol>";
            
            // Insert and Delete
            // https://www.w3schools.com/php/func_array_splice.asp
            
            // Get rid of Pi and bread and get mangos instead
            array_splice($groceryList, 2, 2, array("mangos", "bananas"));
            
            echo "<ol>";
            for ($i = 0; $i < count($groceryList); $i++) {
            echo "<li>Item ($i): ".$groceryList[$i]."</li>";
            }
            echo "</ol>";
            
            // Put an array in an array in an array....
            
            $hearts = array("1","2","3","4","5","6","7","8","9","10","11","12","13");
            $partialDeck = array($hearts);
            for ($i = 0; $i < count($partialDeck[0]); $i++) {
                echo "Item ($i): ".$partialDeck[0][$i]." ";
            }
            
            echo "<h1>Associative</h1>";

            // Associative arrays
            $deck = array("hearts" => $hearts);

            var_dump($deck);
            
            echo "<h3>Full Array</h3>";

            $deck["diamonds"] = array("1","2","3","4","5","6","7","8","9","10","11","12","13");
            $deck["spades"] = array("1","2","3","4","5","6","7","8","9","10","11","12","13");
            $deck["clubs"] = array("1","2","3","4","5","6","7","8","9","10","11","12","13");

            // http://php.net/manual/en/control-structures.foreach.php
            foreach ($deck as $key=>$value) {
                $suit = $deck[$key];
                echo " suit: " $suit;
                echo "<div>".$key."</div>";
                echo "<ul>";
                for ($i = 0; $i < count($suit); $i++) {
                    echo "<li>Card ($i): ".$suit[$i]."</li>";
                }
                echo "</ul>";
            }
        ?>

    </body>
</html>