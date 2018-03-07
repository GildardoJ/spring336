<?php

$maxNumPlayer  = array(0,0,0,0); // global variable for the player stop hurdle. 
$playerTotal = array(0,0,0,0); // player total points
$player = array("mark","jake","rod","jim");

foreach($maxNumPlayer as $key => $value){ // sets value for each player
        $bar = 0;
        $bar = rand(33,42); // hurdle rang
        $maxNumPlayer[$key] = $bar;
}
    
function play(){
//makeDeck()  done by: John Economides
    $players = array();  //make array of players
    
    $faces = array( "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13");  
    $deck = array("clubs" => $faces, "diamonds"  => $faces, "hearts" => $faces, "spades" => $faces);
    
    $face = array(); // empty array for each face of the card of each player
    $playerHand = array("clubs" => $face, "diamonds" => $face, "hearts" => $face, "spades" => $face);
        
    for($i = 0; $i<4; $i++){  // set players
        $players[$i] = $playerHand;
        //echo " . " ;
    }
    //var_dump($players);
    shuffleCards($deck);
    
    //echo "after shuffleCards fucntion";
   
    seatPlayers($players);
    
    dealGame($deck,$players);
    
    //var_dump($players);
    
    display($players); // display players
    
    return true;
}

function shuffleCards(&$deck){
      //  echo "in Shuffle cards function";
    foreach ($deck as $key=>$value) { // display deck
        $suit = $deck[$key];
        shuffle($suit); // suffle each suit.
      //  echo "<div>".$key."</div>";
      //  echo "<ul> suit size" . count($suit);
        
      //  for ($i = 0; $i < count($suit); $i++) {
      //      echo "<li>Card ($i): ".$suit[$i]."</li>";
      //  }
      //  echo " end of suit </ul>";
        unset($key);
    }
}
function seatPlayers(&$players){
    
    shuffle($players);  // shuffle player order
    
    //for($i =0; $i< 4; $i++){  //debug players
    //    echo " P".$i."layer ". $players[$i];
   // }    
    return true;
}

function dealGame(&$deck,&$players){
    global $maxNumPlayer;  //number at which each player will stop dealing cards
    
   // var_dump($maxNumPlayer); // check random for $maxNumPLayer
  // var_dump($players); //+
  for($i = 0;$i < 5; $i++){
       foreach($players as $key => $value){ // loops through each player. 
           $playerDeck = $players[$key];
           //echo " dealGame: " . $playerDeck; // array good at this point, gets lost in next function
           dealPlayer($deck,$playerDeck);
           //echo " dealGame: " . $playerDeck;
           $players[$key] = $playerDeck;
          // foreach($deck as $key => $value){
               
          // }
        }
  }
    
    //var_dump($players); // good 
    
    
    
    return true;
}

function dealPlayer(&$deck,&$playerDeck){
    
    $rSuit = 0;
    $rCard = 0;
    
    $random = array_rand($deck,1);
    
    //$rSuit = rand(0,);
    //echo " random suit: " . $rSuit;
   // echo " random: ". $random;
    //echo " random suit: " . $random_keys; // good output.
    
    //$suit = $deck[$random]; // $suit given an array. good. 
    //$playerSuit = $playerDeck[$random];
   // echo " suit : " . $suit; // an array
    
    $random_keys = array_rand($deck[$random],1);
    //echo " random card #: ". $deck[$random][$random_keys];
    //echo " playerDeck: " . $playerDeck[$random];
    //var_dump($playerDeck[$random]);
    array_push($playerDeck[$random],$deck[$random][$random_keys]); // adds card to player deck
    unset($deck[$random][$random_keys]); // removes card from deck
    ///$deck[$random] = $suit;   // new values copied back into the main deck
   
    //var_dump($playerSuit);   // dumps all values of the array. 
    
    ///$playerDeck[$random] = $playerSuit;
    //echo " #". $suit[$random_keys]. "# "; // confirm card is removed. 
    
    //var_dump($suit);
    
    return true;
}

function display(&$players){
    global $player ;
    global $playerTotal;
    shuffle($player);
    //setPlayers()  done by: John Economides
    
    foreach($players as $key => $value){ // players cards
        
        echo "<div class='player-field'>";
        //echo "<h3 class='player-points'>". $playerTotal[$thePlayer] . "</h3>";
        echo "<img class=\"players\" src=players/".$player[$key].".png alt='Picture of card'>";
    
       // echo " number of players = " . count($players). " ";
            
        $deck = $players[$key];
        $thePlayer = $key;
       // echo "size of deck : " . $key;
       // echo " Player number: " . $players[$key];   // debug code
        foreach ($deck as $key=>$value) { // display hand of players
            $suit = $deck[$key];
            //shuffle($suit); // suffle each suit.  // shuffle test
           // echo "<div>".$key."</div>";           // debug code
          //  echo " suit size " . count($suit);  // debug code
            
            for ($j = 0; $j < count($suit); $j++) {
            //foreach($suit as $key => $value){             // debug code
                //echo "<li>Card ($i): ".$suit[$i]."</li>"; // debug code
               // echo " j: ".  $j ;                        // debug code
                echo "<img class='image-object' src='cards/".$key."/".$suit[$j].".png' alt='Picture of card'>";
                $playerTotal[$thePlayer] += $suit[$j];
            }
          //  echo " end of suit</ul>";
       //     unset($key);
        }     
        unset($key);
        
        //echo "  player: " . $playerTotal[$thePlayer];
        echo "". $player[$thePlayer]. " ";
        echo "<h3 class='player-points'>". $playerTotal[$thePlayer] . "</h3>";
        echo "</div>";
            
    }
    
    ///// display winner/////
    $winner = array(0,0);
    foreach($playerTotal as $key => $value){
        if(($playerTotal[$key] > $winner[1]) and $playerTotal[$key] <= 42){
            $winner[0] = $key;
            $winner[1] = $playerTotal[$key];
        }
    }
    
    echo " The winner is " . ($winner[0]+1) . " with " . $winner[1] . " points";
    return true;
}







?>