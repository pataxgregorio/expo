<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Box2 extends Component
{
    public string $titulo2;
    public string $color2;
    public string $cantidad;
    public string $status;
    public int $raiz;
    public int $pagado;
    public int $reservado;



    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct(string $titulo2,string $color2 = 'bg-blue',int $cantidad = 0, string $status,int $raiz = 0,$pagado =0, $reservado=0)
    {
        // var_dump($raiz);
        // var_dump($status);
        // var_dump($cantidad);
        // var_dump($color2);
        $this->titulo2 = $titulo2;
        $this->color2 = $color2;
        $this->cantidad = $cantidad;
        $this->status = $status;
        $this->raiz = $raiz;
        $this->pagado = $pagado;
        $this->reservado = $reservado;

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box2');
    }
}
