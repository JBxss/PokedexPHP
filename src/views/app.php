<?php
session_start();

function obtenerID()
{

    $idPredeterminada = 1;
    $idFromForm = $_POST['search'];

    if (isset($_POST['prev'])) {
        if ($idPredeterminada > 1) {
            $idPredeterminada--;
            $_SESSION['idPredeterminada'] = $idPredeterminada;
        }
    } elseif (isset($_POST['next'])) {
        $idPredeterminada++;
        $_SESSION['idPredeterminada'] = $idPredeterminada;
    }

    // Verificar si se proporcionó una ID desde el formulario
    if (!empty($idFromForm)) {
        return $idFromForm;
    } else {
        return $idPredeterminada;
    }
}

function arrayPokemon()
{
    // Inicializa una sesion de cURL
    $ch = curl_init();
    $url = "https://pokeapi.co/api/v2/pokemon/";
    $pokemon = $url . obtenerID();
    curl_setopt($ch, CURLOPT_URL, $pokemon);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $errormsg = curl_error($ch);
        echo "Error al conectarse a la API " . $errormsg;
    } else {
        curl_close($ch);

        // Decode JSON data into PHP array
        $pokemon_data = json_decode($response, true);
        // Store all pokemon results in a variable
        return $pokemon_data;
    }
}
