
<?php
class pokemon{
   
   function __construct($name,$health,$attackDamage,$sound,$move,$type){
       $this->name = $name;
       $this->health = $health;
       $this->attackDamage = $attackDamage;
       $this->sound = $sound;
       $this->move = $move;       
       $this->type = $type OR 'normal';
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
        $this->storage = [];
    }

    function catch($value){
       array_push($this->storage,$value);
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
            
            if($this->type2 ===  $this->weakness1){
                $this->attackDamage2  = $this->attackDamage2 * 1.25;
                echo  $this->attackDamage2 . " attack damage 2\n";
                $this->health1 = ($this->health1)-($this->attackDamage2 * 1.25);
                echo $this->name2 . " hit " .$this->name1 . " for " . $this->attackDamage2  . " damage \n";
                echo $this->name1 . " health is " . $this->health1 . "\n";
            }else{
                $this->attackDamage1  = $this->attackDamage2 * 1.25;
                $this->health1 = ($this->health2)-($this->attackDamage1);
                echo $this->name2. " hit " .$this->name1 . " for " . $this->attackDamage2  . " damage \n";
                echo $this->name1 . " health is " . $this->health1 . "\n";
            }
            
            
            if($this->health1<=0||$this->health2<=0){
                if($this->health1 > $this->health2){
                    echo($this->name1 . " wins!!");
                }else{
                    echo($this->name2 . " wins!!!!");
                }
            }


        }
       
    }
}



$jeff = new Pokemon ('jeff', 50, 60, 'meow', 'jump', 'fire');
$charlie = new Pokemon('charlie',70, 10,'moo','milk','grass' );

$fatima = new Trainer ('fatima');
$nathan = new Trainer ('nathan');

$battle = new Battle($fatima,$charlie,$nathan,$jeff);
$battle->fight();
 

?>

