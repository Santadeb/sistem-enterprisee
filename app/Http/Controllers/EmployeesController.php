<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class EmployeesController extends Controller
{
    public function index()
    {
        // Fetch employees with their related users and departments
        $employees = Employee::with(['user', 'department'])->paginate(10);
        
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        $users = User::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->get();

        return view('admin.employees.create', compact('users', 'departments'));
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'departments_id' => 'required|exists:departments,id',
        'address' => 'required|string|max:255',
        'place_of_birth' => 'nullable|string|max:255',
        'dob' => 'nullable|date',
        'religion' => 'required|in:Islam,Katolik,Protestan,Hindu,Budha,Konghucu',
        'sex' => 'required|in:Male,Female',
        'phone' => 'required|string|max:15',
        'salary' => 'required|numeric',
    ]);

    // Insert employee baru ke dalam database
    DB::table('employees')->insert([
        'user_id' => $request->user_id,
        'departments_id' => $request->department_id,
        'address' => $request->address,
        'place_of_birth' => $request->place_of_birth,
        'dob' => $request->dob,
        'religion' => $request->religion,
        'sex' => $request->sex,
        'phone' => $request->phone,
        'salary' => $request->salary,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
}


    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $users = User::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->get();

        return view('admin.employees.edit', compact('employee', 'users', 'departments'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'address' => 'required|string|max:255',
            'place_of_birth' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'religion' => 'required|in:Islam,Katolik,Protestan,Hindu,Budha,Konghucu',
            'sex' => 'required|in:Male,Female',
            'phone' => 'required|string|max:15',
            'salary' => 'required|numeric',
        ]);
    
        // Update employee berdasarkan ID
        DB::table('employees')->where('id', $id)->update([
            'user_id' => $request->user_id,
            'department_id' => $request->department_id,
            'address' => $request->address,
            'place_of_birth' => $request->place_of_birth,
            'dob' => $request->dob,
            'religion' => $request->religion,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'updated_at' => now(),
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }
    

    public function destroy($id)
    {
        // Hapus employee berdasarkan ID
        DB::table('employees')->where('id', $id)->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
    
}