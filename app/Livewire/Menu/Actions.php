<?php

namespace App\Livewire\Menu;

use App\Livewire\Forms\MenuForm;
use App\Models\Menu;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    //ambil menu form yang telah dibuat
    public MenuForm $form;

    //attribute photo untuk menyimpan file upload
    public $photo;

    // attribute show untuk menampilkan modal, dengan default false
    public $show = false;

    //with file upload dari livewire
    use WithFileUploads;

    //dispatch ketika button add diclick pada blade menggunakan wire:click
    #[On('createMenu')]
    public function createMenu()
    {
        // ketika button di click show akan bernilai 'true'
        $this->show = true;
    }

    // function simpan pada wire:submit action
    public function simpan()
    {
        // jika photo tidak kosong maka simpan ke storage
        if ($this->photo) {
            $this->form->photo = $this->photo->hashName('menu');
            $this->photo->store('menu');
        }

        if (isset($this->form->menu)) {
            // jika membawa data maka lakukan update
            $this->form->update();
        } else {
            // jika data kosong maka lakukan store
            $this->form->store();
        }

        $this->closeModal();

        // ketika data sudah selesai ditambah/diupdate maka reload data (refresh web), edit juga pada Menu.index Livewire
        // untuk melakukan dispatch reload
        $this->dispatch('reload');
    }

    // dispatch edit data dari menu index
    #[On('editMenu')]
    public function editMenu(Menu $menu)
    {
        //data diambil dari setMenu di MenuForm
        $this->form->setMenu($menu);
        //show modal
        $this->show = true;
    }

    // dispatch delete data dari menu index
    #[On('deleteMenu')]
    public function deleteMenu(Menu $menu)
    {
        $menu->delete();

        // reload data
        $this->dispatch('reload');
    }

    //close modal
    public function closeModal()
    {
        $this->show = false;
        $this->photo = null; //hilangkan photo
        $this->form->reset(); //reset all form
    }

    public function render()
    {
        return view('livewire.menu.actions', [
            //static menu $types pada model
            'types' => Menu::$types
        ]);
    }
}
