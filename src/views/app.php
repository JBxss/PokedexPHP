<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokedexPHP</title>
</head>
<body>
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
</body>
</html>