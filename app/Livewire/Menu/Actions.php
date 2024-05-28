<?php

namespace App\Livewire\Menu;

use App\Livewire\Forms\MenuForm;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    //ambil menu form yang telah dibuat
    public MenuForm $form;

    public $photo;

    //with file upload dari livewire
    use WithFileUploads;

    public function render()
    {
        return view('livewire.menu.actions', [
            //static menu $types pada model
            'types' => Menu::$types
        ]);
    }
}
