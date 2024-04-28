<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // return view('welcome_message');
        $mostrar["contenido"] = "vista_inicio"; //contenido tendra la vista php vista_inicio
        return view("plantilla", $mostrar);
    }
}
