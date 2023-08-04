<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokédexPHP</title>
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="shortcut icon" href="src/img/logo.png" type="image/x-icon">
</head>
<body>
    
    <header>
        <nav class="nav">
            <img src="src/img/logo.png" alt="Logo Pokédex">
            <ul class="nav-list">
                <li class="nav-item"><button class="btn btn-header" id="ver-todos">Ver todos</button></li> 
                <li class="nav-item"><button class="btn btn-header normal" id="normal">Normal</button></li>
                <li class="nav-item"><button class="btn btn-header fire" id="fire">Fire</button></li>
                <li class="nav-item"><button class="btn btn-header water" id="water">Water</button></li>
                <li class="nav-item"><button class="btn btn-header grass" id="grass">Grass</button></li>
                <li class="nav-item"><button class="btn btn-header electric" id="electric">Electric</button></li>
                <li class="nav-item"><button class="btn btn-header ice" id="ice">Ice</button></li>
                <li class="nav-item"><button class="btn btn-header fighting" id="fighting">Fighting</button></li>
                <li class="nav-item"><button class="btn btn-header poison" id="poison">Poison</button></li>
                <li class="nav-item"><button class="btn btn-header ground" id="ground">Ground</button></li>
                <li class="nav-item"><button class="btn btn-header flying" id="flying">Flying</button></li>
                <li class="nav-item"><button class="btn btn-header psychic" id="psychic">Psychic</button></li>
                <li class="nav-item"><button class="btn btn-header bug" id="bug">Bug</button></li>
                <li class="nav-item"><button class="btn btn-header rock" id="rock">Rock</button></li>
                <li class="nav-item"><button class="btn btn-header ghost" id="ghost">Ghost</button></li>
                <li class="nav-item"><button class="btn btn-header dark" id="dark">Dark</button></li>
                <li class="nav-item"><button class="btn btn-header dragon" id="dragon">Dragon</button></li>
                <li class="nav-item"><button class="btn btn-header steel" id="steel">Steel</button></li>
                <li class="nav-item"><button class="btn btn-header fairy" id="fairy">Fairy</button></li>
            </ul>
        </nav>
    </header>

    <main>   
    <?php
    //Inicializa una sesion de cURL
    $ch = curl_init();
    $url = 'https://pokeapi.co/api/v2/pokemon/ditto';
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $errormsg = curl_error($ch);
        echo "Error al conectarse a la API ".$errormsg;
    } else {
        curl_close($ch);
        
        // Decode JSON data into PHP array
        $pokemon_data = json_decode($response, true);
        // Store all pokemon results in a variable
        $poke_objects = $response_data->results;


        echo "<h1>".$pokemon_data["name"]."</h1>";
        echo "<img src=".$pokemon_data["sprites"]["front_default"].">";
    }

    ?>
    </main>


</body>
</html>