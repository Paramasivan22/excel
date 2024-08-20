<?php

// app/Imports/StudentsImport.php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    // private $current = 0;

    // public function model(array $row)
    // {
    //     $this->current++;
    //     if ($this->current > 1) {
    //         return new Student([
    //             'name_of_students' => $row[0],
    //             'email' => $row[1],
    //             'phone_number' => $row[2],
    //             'college_name' => $row[3] ?? null,
    //             'designation' => $row[4] ?? null,
    //             'society' => $row[5] ?? null,
    //         ]);
    //     }
    // }

    private $current = 0;

    public function model(array $row)
    {
        $this->current++;
        if ($this->current > 1) {
            // Check if the name and email are present
            if (!empty($row[0]) && !empty($row[1])) {
                return new Student([
                    'name_of_students' => $row[0],
                    'email' => $row[1],
                    'phone_number' => $row[2],
                    'college_name' => $row[3] ?? null,
                    'designation' => $row[4] ?? null,
                    'society' => $row[5] ?? null,
                ]);
            }
        }
    }
}
