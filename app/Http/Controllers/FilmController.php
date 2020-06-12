<?php

namespace App\Http\Controllers;

use App\DataModel\Manager\FilmManager;

class FilmController extends Controller
{
    public function create()
    {
        return view('owner.film.create');
    }

    public function showFilms($text)
    {
        $limit = 3;
        if(Input::get('page'))
            $offset = Input::get('page');
        else
            $offset = 1;

        $film = (new FilmManager())->getAllFilms($offset, $limit);
        $countFilms = (new FilmManager())->filmCount();

        return view('owner.film.showFilm')->with(['films'=>$film, 'countFilms' => $countFilms, 'limit' => $limit]);
    }

    public function filmWithComments($id)
    {
        $film = (new FilmManager())->getFilmById($id);
        return view('owner.film.showComment')->with(['film'=>$film]);
    }
}
