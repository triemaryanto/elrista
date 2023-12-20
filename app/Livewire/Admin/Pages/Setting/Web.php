<?php

namespace App\Livewire\Admin\Pages\Setting;

use App\Models\SettingWeb;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Web extends Component
{

    use WithFileUploads;

    public $idnya, $data_web, $site_name, $slogan, $description, $keywords, $edit_favicon, $edit_logo, $favicon, $logo, $address, $phone, $fax, $email, $link_fb, $link_ig, $link_x, $link_linkedin, $provinsi_list = [], $city_list = [], $provinsi_id, $city_id;

    public function mount()
    {
        $this->data_web = SettingWeb::find(1);
        $this->site_name = $this->data_web->site_name;
        $this->slogan = $this->data_web->slogan;
        $this->description = $this->data_web->description;
        $this->keywords = $this->data_web->keywords;
        $this->edit_favicon = $this->data_web->favicon;
        $this->edit_logo = $this->data_web->logo;
        $this->address = $this->data_web->address;
        $this->phone = $this->data_web->phone;
        $this->fax = $this->data_web->fax;
        $this->email = $this->data_web->email;
        $this->link_fb = $this->data_web->link_fb;
        $this->link_ig = $this->data_web->link_ig;
        $this->link_x = $this->data_web->link_x;
        $this->link_linkedin = $this->data_web->link_linkedin;
        $response = Http::withHeaders([
            'Key' => 'fdeafd9b4b4ebaea6268209487c8b765',
        ])->get('https://api.rajaongkir.com/starter/province');
        $this->provinsi_list = $response['rajaongkir']['results'];
        $this->provinsi_id = $this->data_web->provinsi_id;
        $response = Http::withHeaders([
            'Key' => 'fdeafd9b4b4ebaea6268209487c8b765',
        ])->get('https://api.rajaongkir.com/starter/city?province=' . $this->provinsi_id);

        $this->city_list = $response['rajaongkir']['results'];
        $this->city_id = $this->data_web->city_id;
    }

    public function updatedProvinsiId()
    {
        $response = Http::withHeaders([
            'Key' => 'fdeafd9b4b4ebaea6268209487c8b765',
        ])->get('https://api.rajaongkir.com/starter/city?province=' . $this->provinsi_id);

        $this->city_list = $response['rajaongkir']['results'];
    }

    public function simpan()
    {
        $this->data_web->site_name = $this->site_name;
        $this->data_web->slogan = $this->slogan;
        $this->data_web->description = $this->description;
        $this->data_web->keywords = $this->keywords;
        $this->data_web->favicon = $this->edit_favicon;
        $this->data_web->logo = $this->edit_logo;
        $this->data_web->address = $this->address;
        $this->data_web->phone = $this->phone;
        $this->data_web->fax = $this->fax;
        $this->data_web->email = $this->email;
        $this->data_web->link_fb = $this->link_fb;
        $this->data_web->link_ig = $this->link_ig;
        $this->data_web->link_x = $this->link_x;
        $this->data_web->provinsi_id = $this->provinsi_id;
        $this->data_web->city_id = $this->city_id;
        $this->data_web->link_linkedin = $this->link_linkedin;
        if ($this->logo != '') {
            if ($this->edit_logo != "") {
                if (Storage::exists($this->edit_logo)) {
                    Storage::delete($this->edit_logo);
                }
            }
            $this->data_web->logo = $this->logo->store('public/logo');
        }
        if ($this->favicon != '') {
            if ($this->edit_favicon != "") {
                if (Storage::exists($this->edit_favicon)) {
                    Storage::delete($this->edit_favicon);
                }
            }
            $this->data_web->favicon = $this->favicon->store('setting_web');
        }
        $this->data_web->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success', // Jenis alert, misalnya 'success', 'error', atau 'warning'
            'title' => '', // Judul pesan
            'text' => 'The data has been successfully saved to the system.', // Isi pesan
        ]);
    }

    public function render()
    {
        return view('livewire.admin.pages.setting.web');
    }
}
