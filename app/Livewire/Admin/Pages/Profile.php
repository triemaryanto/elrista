<?php

namespace App\Livewire\Admin\Pages;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{
    use WithFileUploads;
    public $name, $wa, $email, $photo, $idnya, $path_photo, $current_password, $password, $password_confirmation;
    public function mount(){
        $profile = User::find(auth()->user()->id);
        $this->idnya = $profile->id;
        $this->name = $profile->name;
        $this->wa = $profile->wa;
        $this->email = $profile->email;
        $this->photo = $profile->profile_photo_path;
    }

    public function save(){
        $profile = User::find($this->idnya);
        $profile->name = $this->name;
        $profile->wa = $this->wa;
        if ($this->path_photo) {
            $profile->profile_photo_path = $this->path_photo->store('profile');
            if (Storage::exists($this->path_photo)) {
                Storage::delete($this->path_photo);
            }
        }
        $profile->save();
        $this->dispatchBrowserEvent('Update');
    }
    
    public function saveAcc(){
        $this->validate([
            "name" => 'required',
            "email" => 'required|email',
            "current_password" => 'required|min:8',
            "password" => 'required|min:8',
            "password_confirmation" => 'required|same:password',
        ]);
            $cekData = User::where('id', auth()->user()->id)->first();

        if (!$cekData || !Hash::check($this->current_password, $cekData->password)) {
            $this->addError('current_password', 'Current Password Not Match');
            return false;
        }
        $cekData->update(
            [
                "name" => $this->name,
                "email" => $this->email,
                "password" => Hash::make($this->password),
            ]
        );
        $this->dispatchBrowserEvent('UpdatePassword');
    }

    public function render()
    {
        return view('livewire.admin.pages.profile');
    }
}
