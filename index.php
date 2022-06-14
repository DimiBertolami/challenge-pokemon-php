<?php
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

<span id="target"></span>
<div class="poke_box">
</div>
<div class="child-to-body box">
    <input type="text" id="Name" size="20" height="10" value="charmander" title="please enter the pokemon you want to search or it's ID number">
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
<script src="ajax-pokedex.js"></script>
</body>
</html>