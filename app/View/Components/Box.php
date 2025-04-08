<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Box extends Component
{
    public string $titulo;

    public int $raiz;

    public string $name;
    public int $codigo;
    public string $status;
    public string $color;
    public string $nombre;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $titulo,string $status,string $nombre,int $raiz = 0,
                                string $name,string $color = 'bg-blue',int $codigo = 0)
    {
        $this->titulo = $titulo;
        $this->raiz = $raiz;
        $this->name = $name;
        $this->color = $color;
        $this->codigo = $codigo;
        $this->status = $status;
        $this->nombre = $nombre;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box');
    }
}
