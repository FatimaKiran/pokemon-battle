
<?php

class pokemon{
   
   function __construct($name,$health,$attackDamage,$sound,$move,$type){
       $this->name = $name;
       $this->health = $health;
       $this->attackDamage = $attackDamage;
       $this->sound = $sound;
       $this->move = $move;       
       $this->type = $type;
   } 

    function talk(){
        return $this->sound;
    }
    function useYourMoves(){
        return $this->move;
    }

}

class trainer{
    function __construct($name){
        $this->name = $name;
    }
}

class Battle {
    function __construct($trainer1 , $pokemon1 , $trainer2, $pokemon2){
      

       $this->health1 = $pokemon1->health;
       $this->health2 = $pokemon2->health;

       $this->type1 = $pokemon1->type;
       $this->type2 = $pokemon2->type;

       $this->attackDamage1 = $pokemon1->attackDamage;
       $this->attackDamage2 = $pokemon2->attackDamage;

       $this->name1 = $pokemon1->name;
       $this->name2 = $pokemon2->name;

       if($pokemon1->type === "grass"){
        $this->strength1 = "water";
        $this->weakness1 = "fire";
       }elseif($pokemon1->type === "fire"){
        $this->strength1 = "grass";
        $this->weakness1= "water";
       }elseif($pokemon1->type === "water"){
        $this->strength1 = "fire";
        $this->weakness1= "grass";
        }

        if($pokemon2->type === "grass"){
            $this->strength2 = "water";
            $this->weakness2 = "fire";
        }elseif($pokemon2->type === "fire"){
            $this->strength2 = "grass";
            $this->weakness2 = "water";
        }elseif($pokemon2->type === "water"){
            $this->strength2= "fire";
            $this->weakness2= "grass";
         }
    }

    function fight(){

        while(($this->health1 > 0) and ( $this->health2 > 0)){
            if($this->type1 ===  $this->strength2){
                $this->health2 = ($this->health2)-($this->attackDamage1 * 0.75);

                echo $this->name1 . " hit " .$this->name2 . " for " . $this->attackDamage1 * 0.75 . " damage \n";
                echo $this->name2 . " health is " . $this->health2 . "\n";
            }else{
                // $this->attackDamage1  = $this->attackDamage1 * 1.25;
                echo $this->attackDamage1 . " " . "\n";
                $this->health2 = ($this->health2)-( $this->attackDamage1  = $this->attackDamage1 * 1.25);
                echo $this->name1 . " hit " .$this->name2 . " for " . $this->attackDamage1  * 1.25 . " damage \n";
                echo $this->name2 . " health is " . $this->health2 . "\n";
            }
            sleep(2);
            echo "\n";
            if($this->type2 ===  $this->weakness1){
                $this->attackDamage2  = $this->attackDamage2 * 1.25;
                
                $this->health1 = ($this->health1)-($this->attackDamage2 * 1.25);
                echo $this->name2 . " hit " .$this->name1 . " for " . $this->attackDamage2  . " damage \n";
                echo $this->name1 . " health is " . $this->health1 . "\n";
            }else{
                $this->attackDamage1  = $this->attackDamage2 * 1.25;
                $this->health1 = ($this->health2)-($this->attackDamage1);
                echo $this->name2. " hit " .$this->name1 . " for " . $this->attackDamage2  . " damage \n";
                echo $this->name1 . " health is " . $this->health1 . "\n";
            }
            echo "\n";
            sleep(2);
            
            
            if($this->health1<=0||$this->health2<=0){
                if($this->health1 > $this->health2){
                    echo "\t  \t🎊 🎊 🎊 🎊" . ($this->name1 . " WINS!!")  . "🎊 🎊 🎊 🎊"; 
                }else{
                    echo "\t \t 🎊 🎊 🎊 🎊" .($this->name2 . " WINS!!!!") . "🎊 🎊 🎊 🎊" ;
                }
            }


        }
       
    }
}


include 'input.php';
sleep(1);
include 'pokemons.php';

$pokemon1Data = $pokemons[$pokemon1];
$pokemon2Data = $pokemons[$pokemon2];




$pokemon1name = new Pokemon ($pokemon1Data[0], $pokemon1Data[1], $pokemon1Data[2], $pokemon1Data[3], $pokemon1Data[4],$pokemon1Data[5]);
$pokemon2name = new Pokemon($pokemon2Data[0],$pokemon2Data[1], $pokemon2Data[2],$pokemon2Data[3],$pokemon2Data[4],$pokemon2Data[5] );

 

$firstPlayer = new Trainer ($player1);
$secondPlayer = new Trainer ($player2);

$battle = new Battle($firstPlayer,$pokemon1name,$secondPlayer ,$pokemon1name);
$battle->fight();
 

?>

