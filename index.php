<?php
    
    $cardNumbers = array();
    $scores = array();
    $players = array("fantastic", "thing", "torch", "invisible");
    $playerNum = 0;
   
    for($i = 1; $i <= 52; $i++)
    {
        $cardNumbers[] = $i;
        // Creates an array using the numbers 1 to 52
        // Each number represents a different card
    }
    
    function getHand() {
        
        global $cardNumbers;
        global $scores;
        $playerHand = array(); // This array holds the card numbers that are drawn
        $done = TRUE;
        
        $score = 0;
        
        while($done)
        {
            $newCard = rand(1, 52);
           
            if($cardNumbers[$newCard-1] != 0) // if the number == 0, then it has already been used
            {
                
                $playerHand[] = $newCard; // The new number is placed in the array
                $cardNumbers[$newCard - 1] = 0; // The number is then replaced so that it can't be used again
                
                if($newCard % 13 == 0)
                {
                    $score += 13;
                    // If the card number mod 13 == 0, then the card is a king.  The point value is adjusted accordingly
                }
                else
                {
                    
                    $score += ($newCard % 13);
                    // $newCard mod 13 will give the correct point values for all cards except kings
                }
                    
            }
            
            if($score >= 36)      // If the score is equal to or greater than 36, no more cards are drawn
            {
                $done = FALSE;
            }
            
        }
        $scores[] = $score;
        displayHand($playerHand, $playerNym);
        // The new player hand array is returned
        
    }

function displayHand($hand, $playerNum)
{
    global $scores;
    global $playerNum;
    global $players;
    echo "<img id='playerCard' src='player/" . $players[$playerNum] . ".jpg' />";
    if($players[$playerNum] == 'fantastic')
        {
            echo "Mr. Fantastic";
        }
    else if($players[$playerNum] == 'thing')
        {
            echo "Thing";
        }
    else if($players[$playerNum] == 'torch')
        {
            echo "Human Torch";
        }
    else
    {
        echo "Invisible Woman";
    }
    echo "<br> </br>";
   for($i = 0; $i < sizeof($hand); $i++) {
        echo "<img src='cards/" . $hand[$i] . ".png' />";
        }
    echo "<h2> Score: " . $scores[$playerNum] . " </h2>";
    $playerNum++;
    echo "<br> </br>";
}

function displayWinner() {



}

 
?>


<!DOCTYPE html>
<html>
    <head>
        <title>SilverJack </title>
        
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <h1> SilverJack </h1>
        <div>
        <?php
            shuffle($players);
            for($j = 0; $j < 4; $j++){
                getHand();
            }
        ?>
        </div>
    </body>
</html>