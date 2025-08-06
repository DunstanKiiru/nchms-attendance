<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserEdit extends Component
{

    public $user, $name, $email, $password, $password_confirmation;

     public function mount($id)
    {
        $this->user = User::find($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.users.user-edit');
    }

    public function submit()
{
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'same:password_confirmation',
        ]);

        $this->user->name = $this->name;
        $this->user->email = $this->email;

        if($this->password){
            $this->user->password = Hash::make($this->password);
        }

        $this->user->save();
        
        return to_route("users.index")->with("success", "User Updated successfully");
    }
}
