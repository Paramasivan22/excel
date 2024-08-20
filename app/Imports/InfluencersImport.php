<?php

namespace App\Imports;

use App\Models\Influencer;
use Maatwebsite\Excel\Concerns\ToModel;

class InfluencersImport implements ToModel
{
    private $current = 0;

    public function model(array $row)
    {
        $this->current++;
        if ($this->current > 1) { // Skip the header row
            return new Influencer([
                'name_of_influencer' => $row[0],
                'email' => $row[1],
                'phone_number' => $row[2],
                'youtube_link' => $row[3] ?? null,
                'insta_link' => $row[4] ?? null,
                'Cost' => $row[5] ?? null,
            ]);
        }
    }
}


