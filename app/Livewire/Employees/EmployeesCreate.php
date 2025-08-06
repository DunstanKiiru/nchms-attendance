<?php


namespace App\Livewire\Employees;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Employee;

class EmployeesCreate extends Component
{
    use WithFileUploads;

    public $user_id, $department, $rfid_tag, $biometric_code, $fingerprint_id, $photo;

    public function submit()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'department' => 'required|string|max:255',
            'rfid_tag' => 'nullable|string|max:255',
            'biometric_code' => 'nullable|string|max:255',
            'fingerprint_id' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $photoPath = $this->photo?->store('employees', 'public');

        Employee::create([
            'user_id' => $this->user_id,
            'department' => $this->department,
            'rfid_tag' => $this->rfid_tag,
            'biometric_code' => $this->biometric_code,
            'fingerprint_id' => $this->fingerprint_id,
            'photo_path' => $photoPath,
        ]);

        session()->flash('success', 'Employee created successfully.');

        return redirect()->route('employees.index');
    }

    public function render()
    {
        return view('livewire.employees.employees-create', [
            'users' => User::all(),
        ]);
    }
}
