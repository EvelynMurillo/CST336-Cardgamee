<?php

    $cardNumbers = array();
    $scores = array();

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
        return($playerHand);
        // The new player hand array is returned

    }

    function displayHand($input) {



    }
      function displayWinner() {
              //global variables
              global $score;
              global $player;
              $winner = 0;
              $lowScore = 0;
              $totalScore = 0;
              $closest=$score[0];
              for( $i= 0; $i < 4; $i++ )// finds out who the winner is
              {
                  $lowScore=($score[$i]-42);

                  if($lowScore<$closest)
                  {
                      $closest = $lowScore;
                      $winner = $i;
                  }
              }

              for($j=0; $j<4; $j++) //prints out the winner out of the 4 players
              {
                 if($j != $winner)
                 {
                  $totalScore = $totalScore + $score[$j];
                 }
                  }
                  //prints out the winner
              echo 'The Winner is: ' . $player[$winner] . ' The Score is: ' . $totalScore;
          }


?>


<!DOCTYPE html>
<html>
    <head>
        <title>TEST </title>
    </head>
    <body>


    <?=displayWinner()?>


    </body>
</html>
