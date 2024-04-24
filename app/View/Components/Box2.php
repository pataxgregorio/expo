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
   
    /**
     * Create a new component instance.
     *
     * @return void
     */
   
    public function __construct(string $titulo2,string $color2 = 'bg-blue',int $cantidad = 0, string $status,int $raiz = 0)
    {
        $this->titulo2 = $titulo2;
        $this->color2 = $color2;
        $this->cantidad = $cantidad;
        $this->status = $status;
        $this->raiz = $raiz;
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
