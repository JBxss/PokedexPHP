<?php
session_start();

// Función para obtener el ID del Pokémon, ya sea a través del formulario o navegación
function obtenerID()
{
    // ID predeterminada inicial
    $idPredeterminada = 1;
    // Obtiene el valor del formulario de búsqueda por POST
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
        // Si no, devuelve la ID predeterminada
        return $idPredeterminada;
    }
}

// Función para obtener los datos del Pokémon utilizando la API PokeAPI
function arrayPokemon()
{
    // Inicializa una sesion de cURL
    $ch = curl_init();
    $url = "https://pokeapi.co/api/v2/pokemon/";
    
    // Obtiene el ID del Pokémon utilizando la función obtenerID()
    $pokemon = $url . obtenerID();
    curl_setopt($ch, CURLOPT_URL, $pokemon);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Realiza la solicitud cURL
    $response = curl_exec($ch);

    // Manejo de errores cURL
    if (curl_errno($ch)) {
        $errormsg = curl_error($ch);
        echo "Error al conectarse a la API " . $errormsg;
    } else {
        curl_close($ch);

        // Decodifica los datos JSON en un array PHP
        $pokemon_data = json_decode($response, true);
        // Retorna los datos del Pokémon
        return $pokemon_data;
    }
}
