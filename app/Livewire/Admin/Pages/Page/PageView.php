<?php

namespace App\Livewire\Admin\Pages\Page;

use App\Models\Page;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PageView extends Component
{
    use WithFileUploads;

    public $idnya, $author, $picture, $edit_picture, $description_picture, $title, $content;
    public $isAdd = false;
    public $isEdit = false;

    protected $listeners = ['edit'];

    public function updated()
    {
        $rules['title'] = 'required';
        $rules['content'] = 'required';
        $this->validate($rules);
    }
    public  function cancel()
    {
        $this->isAdd = false;
        $this->bersih();
    }

    public function bersih()
    {
        $this->title = null;
        $this->picture = null;
        $this->content = null;
    }

    public function add()
    {
        $this->isAdd = true;
        $this->dispatchBrowserEvent('active_ckeditor');
    }

    public function edit($idnya)
    {
        $data = Page::find($idnya);
        $this->idnya = $data->id;
        $this->title = $data->title;
        $this->content = $data->content;
        if ($data->picture) {
            $this->edit_picture = $data->picture;
        }
        $this->isAdd = true;
        $this->dispatchBrowserEvent('active_ckeditor');
    }

    public function deletepicture()
    {
        $data = Page::find($this->idnya);
        if (Storage::exists($data->picture)) {
            Storage::delete($data->picture);
        }
        $this->edit_picture = null;
        $data->picture = null;
        $data->save();
    }

    public function delpicture()
    {
        $this->picture = null;
        $this->dispatchBrowserEvent('gambar', []);
    }

    public function save()
    {
        $rules['title'] = 'required';
        $rules['content'] = 'required';
        $this->validate($rules);

        if ($this->idnya) {
            $page = Page::find($this->idnya);
            $page->title = $this->title;
            $page->content = $this->content;

            if ($this->picture) {
                $page->picture = $this->picture->store('image/pages');
                $page->description_picture = $this->title;
            }

            $page->save();
        } else {
            $page = Page::create([
                'author' => auth()->user()->id,
                'title' => $this->title,
                'content' => $this->content,
            ]);

            if ($this->picture) {
                $page->picture = $this->picture->store('image/pages');
                $page->description_picture = $this->title;
            }

            $page->save();
        }

        $this->isAdd = false;
        $this->bersih();
    }

    public function render()
    {
        return view('livewire.admin.pages.page.page-view');
    }
}
