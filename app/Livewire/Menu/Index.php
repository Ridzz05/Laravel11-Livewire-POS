<?php

namespace App\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;

class Index extends Component
{

    //declare variable search
    public $search;

    public $no = 1; //declare variable no

    //dispatch reload
    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.menu.index', [ //parsing data
            // tambahkan ketika ada search
            'menus' => Menu::when($this->search, function($menu){
                $menu->where('name', 'like', '%'.$this->search.'%')
                ->orWhere('type', 'like', '%'.$this->search.'%')
                ->orWhere('desc', 'like', '%'.$this->search.'%');
            })->get() //getAll data menu
        ]);
    }
}
