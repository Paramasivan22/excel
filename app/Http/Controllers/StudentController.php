<?php

// app/Http/Controllers/StudentController.php


namespace App\Http\Controllers;

use App\Http\Resources\Student as ResourcesStudent;
use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function showUploadForm()
    {
        return view('students.upload');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new StudentsImport, $request->file('file'));

        return redirect()->route('students.list')->with('success', 'Students imported successfully.');
    }

    public function list(Request $request)
    {
        $search = $request->input('search');
        $students = Student::query()
            ->when($search, function($query) use ($search) {
                return $query->where('name_of_students', 'LIKE', "%{$search}%")
                             ->orWhere('email', 'LIKE', "%{$search}%")
                             ->orWhere('phone_number', 'LIKE', "%{$search}%");
            })
            ->get();

        return view('students.list', ['students' => $students]);
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->get('search');
            $students = Student::where('name_of_students', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phone_number', 'LIKE', "%{$search}%")
                ->orWhere('college_name', 'LIKE', "%{$search}%")
                ->orWhere('designation', 'LIKE', "%{$search}%")
                ->orWhere('society', 'LIKE', "%{$search}%")
                ->get();
    
            $output = '';
    
            if (count($students) > 0) {
                foreach ($students as $student) {
                    $output .= '
                    <tr>
                        <td>' . $student->name_of_students . '</td>
                        <td>' . $student->email . '</td>
                        <td>' . $student->phone_number . '</td>
                        <td>' . $student->college_name . '</td>
                        <td>' . $student->designation . '</td>
                        <td>' . $student->society . '</td>
                    </tr>';
                }
            } else {
                $output = '<tr><td colspan="6">No students found</td></tr>';
            }
    
            return response()->json($output);
        }
    }
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
{
    $request->validate([
            'name_of_students' => 'required|string|min:4|max:255', // At least 4 characters
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'required|numeric|digits_between:3,20|unique:students,phone_number', // At least 3 digits
            'college_name' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'society' => 'nullable|string|max:255',
    ]);

    $data = [
        'name_of_students' => $request->name_of_students,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
    ];

    if ($request->filled('college_name')) {
        $data['college_name'] = $request->college_name;
    }
    if ($request->filled('designation')) {
        $data['designation'] = $request->designation;
    }
    if ($request->filled('society')) {
        $data['society'] = $request->society;
    }

    Student::create($data);

    return redirect()->route('students.list')->with('success', 'Student added successfully.');
}


    
}
