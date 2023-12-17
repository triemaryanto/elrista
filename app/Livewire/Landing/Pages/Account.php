<?php

namespace App\Livewire\Landing\Pages;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Account extends Component
{
    use WithFileUploads;
    public $name, $wa, $email, $photo, $idnya, $path_photo, $current_password, $password, $password_confirmation;

    public function mount()
    {
        $profile = User::find(auth()->user()->id);
        $this->idnya = $profile->id;
        $this->name = $profile->name;
        $this->wa = $profile->wa;
        $this->email = $profile->email;
        $this->path_photo = $profile->profile_photo_path;
    }

    public function save()
    {
        $this->validate([
            "name" => 'required|max:255',
            "email" => 'required|email',
            "wa" => 'required|min:8|max:14',
            "photo" => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        $profile = User::find($this->idnya);
        $profile->name = $this->name;
        $profile->wa = $this->wa;
        if ($this->photo) {
            $profile->profile_photo_path = $this->photo->store('profile');
            if (Storage::exists($this->path_photo)) {
                Storage::delete($this->path_photo);
            }
        }
        $profile->save();
        $this->dispatchBrowserEvent('Update');
    }

    public function saveAcc()
    {

        $this->validate([
            "email" => 'required|email',
            "password" => 'required|min:8',
            "password_confirmation" => 'required|same:password',
        ]);
        $cekData = User::where('id', auth()->user()->id)->first();

        $cekData->update(
            [
                "email" => $this->email,
                "password" => Hash::make($this->password),
            ]
        );
        $this->password = '';
        $this->password_confirmation = '';
        $this->dispatchBrowserEvent('UpdatePassword');
    }
    public function render()
    {
        return view('livewire.landing.pages.account')->layout('layouts.front.app');
    }
}
