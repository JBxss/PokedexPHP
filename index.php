<?php
// Incluye las librerías y el archivo de la vista de la aplicación (contiene lógica relacionada con la interfaz)
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

        <!-- Muestra la imagen del Pokémon obtenida a través de la función arrayPokemon() -->
        <img src="<?php echo arrayPokemon()['sprites']['front_default']; ?>" alt="pokemon" class="pokemon__image">

        <!-- Muestra el número y el nombre del Pokémon obtenidos a través de la función arrayPokemon() -->
        <h1 class="pokemon__data">
            <span class="pokemon__number"><?php echo arrayPokemon()['id']; ?></span> -
            <span class="pokemon__name"><?php echo arrayPokemon()['name']; ?></span>
        </h1>

        <!-- Formulario de búsqueda de Pokémon por nombre o número -->
        <form class="form" method="post">
            <input type="search" class="input__search" placeholder="Name or Number" name="search" required />
            <h4 style="padding-top: 10px;">01 - 1010</h4>
        </form>

        <!-- Formulario con botones para navegar entre Pokémon (anterior y siguiente) -->
        <form method="post">
            <div class="buttons">
                <button class="button btn-prev" name="prev">&lt; Prev</button>
                <button class="button btn-next" name="next">Next &gt;</button>
            </div>
        </form>

        <!-- Muestra una imagen de la Pokédex al final de la página -->
        <img src="src/img/pokedex.png" alt="pokedex" class="pokedex">
    </main>
</body>

</html>