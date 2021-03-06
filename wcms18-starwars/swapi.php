<?php
/**
* Functions for communicating with the Starwars API
*/

function swapi_get_films() {
    //do we have the films cached?
   $films = get_transient(‘swapi_get_films’);

               //if so return the cached films
               if($films) {
                   return $films;
               } else {
               //otherwisw retrieve the films from the Starwars API
               $result = wp_remote_get('https://swapi.co/api/films');

               if(wp_remote_retrieve_response_code($result) === 200) {
                   $data = json_decode(wp_remote_retrieve_body($result));
                   $films = $data->results;
                   set_transient(‘swapi_get_films’, $films, 60*60);

                   return $films;
               } else {
                   return false;
           }
       }

   }

   function swapi_get_character($character_id) {
    //do we have the films cached?
   $characters = get_transient(‘swapi_get_character_’ . $character_id);

               //if so return the cached films
               if($characters) {
                   return $characters;
               } else {

                   //$next = null;
                   //while($next !== null) {

                   //}
               //otherwisw retrieve the films from the Starwars API
               $result = wp_remote_get('https://swapi.co/api/films' . $character_id);

               if(wp_remote_retrieve_response_code($result) === 200) {
                   $character = json_decode(wp_remote_retrieve_body($result));
                   set_transient(‘swapi_get_character_’ . $character_id, $character, 60*60*24*7);

                   return $character;
               } else {
                   return false;
           }
       }
   }