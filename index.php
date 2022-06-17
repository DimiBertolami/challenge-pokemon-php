<?php
//xdebug_break();
//phpinfo();

// $pokeName = $_POST['pokemonName'];
if(!isset($_POST['pokemonName'])){
    $pokeName = "charmander";
} else {
    $pokeName = $_POST['pokemonName'];
}
$pokeURL = "https://pokeapi.co/api/v2/pokemon/$pokeName";
$data = file_get_contents($pokeURL);
$decoded_Data = json_decode($data, true);
$Name = $decoded_Data['name'];
$ID = $decoded_Data['id'];
$speciesUrl = $decoded_Data['species']['url'];
//print_r($speciesUrl);
$evolutionData = file_get_contents($speciesUrl);
$decoded_EvoData = json_decode($evolutionData, true);
$evolutionUrl = $decoded_EvoData['evolution_chain']['url'];
//print_r($evolutionUrl);
$evolutions = file_get_contents($evolutionUrl);
$decoded_Evolutions = json_decode($evolutions, true);
//var_dump($decoded_Evolutions);
//$decoded_Evolutions->chain->evolves_to[0]->evolves_to[0]->species->url
//$decoded_Evolutions->chain->evolves_to[0]->species->url
$evolvesToUrl = $decoded_Evolutions['chain']['evolves_to'][0]['species']['url'];
$evolvesToName = $decoded_Evolutions['chain']['evolves_to'][0]['species']['name'];
$evolvesToTootUrl = $decoded_Evolutions['chain']['evolves_to'][0]['evolves_to'][0]['species']['url'];
$evolvesToTootName = $decoded_Evolutions['chain']['evolves_to'][0]['evolves_to'][0]['species']['name'];
$pokeURL2 = "https://pokeapi.co/api/v2/pokemon/$evolvesToName";
$pokeURL3 = "https://pokeapi.co/api/v2/pokemon/$evolvesToTootName";
//print_r($evolvesToUrl);
$data2 = file_get_contents($pokeURL2);
$decoded_Data2 = json_decode($data2, true);
$Name2 = $decoded_Data2['name'];
$ID2 = $decoded_Data2['id'];

$data3 = file_get_contents($pokeURL3);
$decoded_Data3 = json_decode($data3, true);
$Name3 = $decoded_Data3['name'];
$ID3 = $decoded_Data3['id'];
$Name= "$Name($ID)";
//$Name2= "$Name2($ID2)";
//$Name3= "$Name3($ID3)";
// echo $Name;
$image  =  $decoded_Data['sprites']['front_default'];
$image2 = $decoded_Data2['sprites']['front_default'];
$image3 = $decoded_Data3['sprites']['front_default'];

$abilityName  =   $decoded_Data['abilities'];
$abilityName2 =  $decoded_Data2['abilities'];
$abilityName3 =  $decoded_Data3['abilities'];
for ($i = 0; $i < count($abilityName); $i++) {
    if ($i < 40) {
        $Name .= $abilityName[$i]['ability']['name'] . "(=ability), ";
    }
}
for ($i = 0; $i < count($abilityName2); $i++) {
    if($i<40){
        $Name2 .= $abilityName2[$i]['ability']['name'] . "(=ability), ";
    }
}
for ($i = 0; $i < count($abilityName3); $i++) {
    if($i<40){
        $Name3 .= $abilityName3[$i]['ability']['name'] . "(=ability), ";
    }
}
$moves = $decoded_Data['moves'];
$moves2 = $decoded_Data2['moves'];
$moves3 = $decoded_Data3['moves'];
for ($i = 0; $i < count($moves); $i++) {
    if($i<40){
        $Name .= $moves[$i]['move']['name'] . "(=move), ";
    }
}
for ($i = 0; $i < count($moves2); $i++) {
    if($i<40) {
        $Name2 .= $moves2[$i]['move']['name'] . "(=move), ";
    }
}
for ($i = 0; $i < count($moves3); $i++) {
    if($i<40) {
    $Name3 .= $moves3[$i]['move']['name'] . "(=move), ";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>AJAX-Pokedex</title>
</head>
<body border="2em solid black">
<span id="target">
    <img src='<?php echo $image; ?>' alt="1" title="<?php echo $Name; ?>">
    <img src='<?php echo $image2; ?>' alt="2" title="<?php echo $Name2; ?>">
    <img src='<?php echo $image3; ?>' alt="3" title="<?php echo $Name3; ?>">
</span>
<div class="poke_box">
</div>
<div class="child-to-body box">
    <form method="post">
        <input type="text" id="pokemonName" value="charmander" class="button" name="pokemonName">
        <input type="submit" class="button" name="Go" id="Go" value="Go">
    </form>
    <label for="id" style="top: 50px; left:50px"></label><div id="id" style="top: 50px; left:20px"></div>
    <label for="abilities" style="top: 65px; left:40px"></label><div id="abilities" style="top: 80px; left:50px"></div>
    <label for="moves" style="top: 160px; left:20px"></label><div id="moves" style="top: 160px; left:50px"></div>
    <div class="pokeball">
        <div class="pokeball__button" id="pokeball__button">
        </div>
    </div>

</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<!--<script src="pokedex.js"></script>-->

</body>
</html>



