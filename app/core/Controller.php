<?php


class Controller
{
    public function view($view, $data = [])
    {
        require_once "../app/views/" . $view . ".php";
    }

    public function model($model): object
    {
        require_once "../app/models/" . $model . ".php";
        return new $model;
    }
}
