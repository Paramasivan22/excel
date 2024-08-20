<?php

namespace App\Imports;

use App\Models\People;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToCollection, ToModel
{

    private $current = 0;


    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }  public function model(array $row)
    {
        $this->current++;

        if ($this->current > 1) {
            // Create a new User instance
            $user = new People;
            $user->name = $row[0] ?? null; // Handle potential null values
            $user->last = $row[1] ?? null; // Handle potential null values
            $user->email = $row[2];

            // Validate and set number
            $user->number = is_numeric($row[3]) ? (int)$row[3] : 0; // Default to 0 if not a valid number

            // Save the User instance
            return $user;
        }

        return null; // Return null for header row
    }
}
