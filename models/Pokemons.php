<?php
class Pokemons
{

    CONST URL_API = 'http://pokeapi.co/api/v2/';

    public function getPokemons()
    {
        return json_decode(file_get_contents(self::URL_API . 'pokemon/'));
    }

    public function getByUrl($url)
    {
        return json_decode(file_get_contents($url));
    }

    public function getPokemonInfo($url)
    {
        return json_decode(file_get_contents($url));
    }
}