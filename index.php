<?php
require 'vendor/autoload.php';
require 'src/views/app.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PokédexPHP</title>
    <link rel="stylesheet" href="src/css/main.css">
    <link rel="shortcut icon" href="src/img/favicon.png" type="image/x-icon">
</head>

<body>
    <main>

        <img src="<?php echo arrayPokemon()['sprites']['front_default']; ?>" alt="pokemon" class="pokemon__image">

        <h1 class="pokemon__data">
            <span class="pokemon__number"><?php echo arrayPokemon()['id']; ?></span> -
            <span class="pokemon__name"><?php echo arrayPokemon()['name']; ?></span>
        </h1>

        <form class="form" method="post">
            <input type="search" class="input__search" placeholder="Name or Number" name="search" required />
            <h4 style="padding-top: 10px;">01 - 1010</h4>
        </form>

        <form method="post">
            <div class="buttons">
                <button class="button btn-prev" name="prev">&lt; Prev</button>
                <button class="button btn-next" name="next">Next &gt;</button>
            </div>
        </form>

        <img src="src/img/pokedex.png" alt="pokedex" class="pokedex">
    </main>
</body>

</html>