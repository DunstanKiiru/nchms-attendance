<?php

namespace App\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;

class EmployeesIndex extends Component
{
    public function render()
    {
        $employees = Employee::get();
        return view('livewire.employees.employees-index', compact("employees"));
    }
}
