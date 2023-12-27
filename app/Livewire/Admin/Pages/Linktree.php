<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;
use App\Models\SettingWeb;
use Livewire\WithFileUploads;
use App\Models\Linktree as ModelsLinktree;

class Linktree extends Component
{
    use WithFileUploads;
    public $add, $link, $title, $imageback, $isEdit, $idNya;

    protected $listeners = ['edit', 'delete'];

    public function edit($id)
    {
        $this->add = !$this->add;
        $this->isEdit = true;
        $a = ModelsLinktree::find($id);
        $this->idNya = $a->id;
        $this->title = $a->title;
        $this->link = $a->url;
    }

    public function editLinktree()
    {
        $b = ModelsLinktree::find($this->idNya);
        $b->title = $this->title;
        $b->url = $this->link;
        $b->save();
        $this->idNya = '';
        $this->title = '';
        $this->link = '';
        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('Update');
    }
    public function delete($id)
    {
        ModelsLinktree::find($id)->delete();
        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('Delete');
    }
    public function AddLinktree()
    {
        $this->add = !$this->add;
    }

    public function saveLinktree()
    {
        ModelsLinktree::create([
            'title' => $this->title,
            'url' => $this->link
        ]);
        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('Success');
        $this->add = !$this->add;
    }

    public function saveBackground()
    {
        $rules['imageback'] = 'required';
        $this->validate($rules);
        $c = SettingWeb::find('1');
        $file = $this->imageback->store('setting_web');
        $c->background_image = $file;
        $c->save();
        $this->dispatchBrowserEvent('Success');
        $this->imageback = '';
    }
    public function render()
    {
        return view('livewire.admin.pages.linktree');
    }
}
