<?php
class Pokeagenda
{

    public function __construct()
    {
        $this->model = loadModel('Pokemons');
    }

    public function index()
    {
        $pokemons = $this->model->getPokemons();
        $next = $pokemons->next;
        loadView('Pokeagenda', array(
            'pokemons' => $pokemons->results,
            'next' => $next
        ));
    }

    public function getProximo()
    {
        $url = $_GET['url'];
        $pokemons = $this->model->getByUrl($url);
        echo json_encode($pokemons);
    }

    public function getPokemonInfo()
    {
        $url = $_GET['url'];
        echo json_encode($this->model->getPokemonInfo($url));
    }
}