<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;


    public $name;
    public $email;
    public $mobile;
    public $role;
    public $user_id;



    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|unique:users',
        'mobile' => 'nullable|min:10',
        'role' => 'nullable',
    ];
    public function render()
    {
        return view('livewire.user-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();


        if($this->user_id){
            $user = User::find($this->user_id);
        }else{
            $user = new User();
        }
        $user->user_id = $this->user->id;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->mobile = $this->mobile;
        $user->role = $this->role;
        $user->email_verified_at = null;
        $user->password = bcrypt('1234567');
        $user->two_factor_secret = null;
        $user->two_factor_recovery_codes = null;
        $user->remember_token = null;
        $user->current_team_id = null;
        $user->profile_photo_path = null;
        $user->save();

    }

    public function edit($user_id){

        $user = User::find($user_id);

        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->role = $user->role;
        $this->email_verified_at = null;
        $this->password = bcrypt('1234567');
        $this->two_factor_secret = null;
        $this->two_factor_recovery_codes = null;
        $this->remember_token = null;
        $this->current_team_id = null;
        $this->profile_photo_path = null;
    }
    public function delete($user_id){

        User::destroy($user_id);
    }

}
