<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Influencer;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\InfluencersImport;

class InfluencerController extends Controller
{
    // Show the upload form
    public function showUploadForm()
    {
        return view('influencers.upload');
    }

    // Handle the import
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new InfluencersImport, $request->file('file'));

        return redirect()->route('influencers.index')->with('success', 'Influencers imported successfully.');
    }

    // Show the list of influencers
    public function index()
    {
        $influencers = Influencer::all();
        return view('influencers.index', compact('influencers'));
    }

    public function create()
{
    return view('influencers.add_influencer');
}


public function store(Request $request)
{
    $request->validate([
        'name_of_influencer' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:influencers',
        'phone_number' => 'required|string|max:15',
        'youtube_link' => 'nullable|url',
        'instagram_link' => 'nullable|url',
        'cost' => 'nullable|numeric',
    ]);

    Influencer::create([
        'name_of_influencer' => $request->name_of_influencer,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'youtube_link' => $request->youtube_link,
        'instagram_link' => $request->instagram_link,
        'cost' => $request->cost,
    ]);

    return redirect()->back()->with('success', 'Influencer added successfully.');
}






    public function search(Request $request)
{
    if ($request->ajax()) {
        $search = $request->get('search');
        $influencers = Influencer::where('name_of_influencer', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone_number', 'like', '%' . $search . '%')
            ->get();

        $output = '';

        if (count($influencers) > 0) {
            foreach ($influencers as $influencer) {
                $output .= '
                <tr>
                    <td>' . $influencer->name_of_influencer . '</td>
                    <td>' . $influencer->email . '</td>
                    <td>' . $influencer->phone_number . '</td>
                    <td>' . ($influencer->youtube_link ? '<a href="' . $influencer->youtube_link . '" target="_blank">YouTube</a>' : '') . '</td>
                    <td>' . ($influencer->insta_link ? '<a href="' . $influencer->insta_link . '" target="_blank">Instagram</a>' : '') . '</td>
                    <td>' . $influencer->Cost . '</td>
                </tr>';
            }
        } else {
            $output = '<tr><td colspan="6">No influencers found</td></tr>';
        }

        return response()->json($output);
    }
}

}
