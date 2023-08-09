<?php

function arrayPokemon() {
        // Inicializa una sesion de cURL
         $ch = curl_init();
         $url = 'https://pokeapi.co/api/v2/pokemon/12';
         curl_setopt($ch, CURLOPT_URL, $url);
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