
<?php

$pokemons = ["Bulbasaur", "RoseRade" , "Squirtle" , "Leafeon",  "Osha wott","Gyarados" , "Ho-Oh",  "Vulpix" , "Infernape"];
$statment = "Please Select any pokemon 😃: \n Bulbasaur\n RoseRade \n Leafeon \n Squirtle \n Osha wott \n Gyarados \n Ho-Oh \n Vulpix \n Infernape\n\nType Below your favourite pokemon name: \n";


$player1 = readline('Player1 Name: ');
$pokemon1 = readline( $statment );
while (!in_array($pokemon1, $pokemons)) {
    echo "Please select any of the above pokemon\n";
    $pokemon1 = readline("Type here: ");
}
echo "\n";

$player2 = readline('Player2 Name: ');
$pokemon2 = readline($statment);
while (!in_array($pokemon2, $pokemons)) {
    echo "Please select any of the above pokemon\n";
    $pokemon2 = readline("Type here: ");
}

echo "\n\t\t\t\t\t....................... POKEMON BATTLE BEGINS ..........................\n";

echo " \t\t\t\t\t\t\t\t  '".strtoupper($pokemon1). "'" ." VS " . "'".  strtoupper($pokemon2)."' \n"  ;
?> 


