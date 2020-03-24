<?php
//Init Class
$game = new Game;

// Choice variable! You can choose between Rock , Paper or Scissor. Everything else will throw exception!
$choice = "Paper";

// Starting the game!
// play() You will play single round against random player!
// playRounds(xx) You will play more than one round against random player!


//$game->playRounds(3);
$game->play($choice);




class Game
{

    /**
     * Call this method to execute one game
     * @param $choice
     * @throws Exception
     */
    public function play($choice){
        $yourChoice = trim(strtoupper($choice));
        if($yourChoice == 'ROCK'){
            $playerOne = 1;
            $playerTwo = rand(1,3);
            $this->result($playerOne,$playerTwo);
        }elseif($yourChoice == 'PAPER'){
            $playerOne = 2;
            $playerTwo = rand(1,3);
            $this->result($playerOne,$playerTwo);
        }elseif($yourChoice == 'SCISSOR'){
            $playerOne = 3;
            $playerTwo = rand(1,3);
            $this->result($playerOne,$playerTwo);
        }else{
            throw new Exception("You need to make right choice!");
        }
    }

    /**
     * Call this method to execute game with more than one round
     * @param $rounds
     */
    public function playRounds($rounds){
        $resultOne = 0;
        $resultTwo = 0;

        for($x = 1; $x <= $rounds; $x++){
            $playerOne = rand(1,3);
            $playerTwo = rand(1,3);

            $finalResult = $this->checkForWinner($playerOne,$playerTwo);
            if($finalResult == 3){
                $resultOne++;
            }elseif($finalResult == 1){
                $resultTwo++;
            }else{
                $x--;
                echo "You have Draw -> New Game\n";
            }

        }
        $this->winner($resultOne,$resultTwo);

    }

    /**
     * This method count final result and print to console
     * @param $playerOne
     * @param $playerTwo
     * @param $finalResult
     */
    public function printResult($playerOne, $playerTwo, $finalResult) {
        $resultLabel = 'Draw';

        if ($finalResult == 1) {
            $resultLabel = 'Lose';
        }elseif ($finalResult == 3) {
            $resultLabel = 'Win';
        }

        echo "Player One has: ".$this->getHandName($playerOne)." vs Player Two has: ". $this->getHandName($playerTwo)." Result : ".$resultLabel." \n";
    }


    /**
     * Convert random number from 1 to 3 into String [Rock,Paper or Scissor]
     * @param $playerHand
     * @return string
     */
    public function getHandName($playerHand){
    $result = 'Scissor';

    if($playerHand == 1){
        $result = 'Rock';
    }elseif($playerHand == 2) {
        $result = 'Paper';
    }
    return $result;

}



    /**
     * This method return values for checking who will win the game.
     * @param $playerOne
     * @param $playerTwo
     * @return int
     */
    public function checkForWinner($playerOne, $playerTwo){
    if(($playerOne == 1 && $playerTwo == 2) || ($playerOne == 2 && $playerTwo == 3 || ($playerOne == 3 && $playerTwo == 1))){
        $this->printResult($playerOne, $playerTwo, 1);
        return 1;
    }elseif(($playerOne == 1 && $playerTwo == 1) || ($playerOne == 2 && $playerTwo == 2) || ($playerOne == 3 && $playerTwo == 3)){
        $this->printResult($playerOne, $playerTwo, 2);
        return 2;
    }else{
        $this->printResult($playerOne, $playerTwo, 3);
        return 3;
    }
}


    /**
     * This method print who is the winner after all rounds!
     * @param $resultOne
     * @param $resultTwo
     */
    public function winner($resultOne, $resultTwo){
        if($resultOne > $resultTwo){
            echo 'You are Winner';
        }else{
            echo 'You are Loser';
        }
    }
}

