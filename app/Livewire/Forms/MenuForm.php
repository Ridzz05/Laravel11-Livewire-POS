<?php

namespace App\Livewire\Forms;

use App\Models\Menu;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MenuForm extends Form
{
    public $name;
    public $price;
    public $desc;
    public $type = 'coffee';
    public $photo;

    public ?Menu $menu;

    //set menu name
    public function setMenu(Menu $menu)
    {
        $this->menu = $menu;
        $this->name = $menu->name;
        $this->price = $menu->price;
        $this->desc = $menu->description;
        $this->type = $menu->type;
        // $this->photo = $menu->photo;
    }

    //function save data
    public function store()
    {
        $validate = $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'description' => '',
        ]);

        // Save the menu
        Menu::create($validate);

        // Reset the form
        $this->reset();
    }

    //function update data
    public function update()
    {
        $validate = $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'description' => '',
        ]);

        // update data menu
        $this->menu->update($validate);

        // Reset the form
        $this->reset();
    }
}
