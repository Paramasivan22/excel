<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as ResourcesUser;
use App\Imports\UserImport;
use App\Models\People;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
class PeopleController extends Controller
{
    
    public function import_excel()
    {
        return view('import_excel');
    }


    public function import_excel_post(Request $request)
    {
        Excel::import(new UserImport, $request->file('excel_file'));

        return redirect()->route('users')->with('success', 'File imported successfully.');
    }

    public function index()
    {
        $users = People::paginate(3); // Adjust the number 10 to the desired number of users per page
        return view('user_lists', compact('users'));
    }
    
 

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'number' => 'required|string|max:15',
        ]);

        People::create([
            'name' => $request->name,
            'last' => $request->last,
            'email' => $request->email,
            'number' => $request->number,
        ]);

        return redirect()->route('users')->with('success', 'User added successfully.');
    }

    public function search(Request $request)
    {
        if($request->ajax()) {
            $output = '';
            $query = $request->get('search');
    
            if($query != '') {
                $users = People::where('name', 'LIKE', '%'.$query.'%')
                             ->orWhere('last', 'LIKE', '%'.$query.'%')
                            ->orWhere('email', 'LIKE', '%'.$query.'%')
                            ->orWhere('number', 'LIKE', '%'.$query.'%')
                            ->get();
    
                if($users->count() > 0) {
                    foreach($users as $user) {
                        $output .= '
                        <tr>
                            <td>'.$user->id.'</td>
                            <td>'.$user->name.'</td>
                            <td>'.$user->last.'</td>
                            <td>'.$user->email.'</td>
                            <td>'.$user->number.'</td>
                        </tr>';
                    }
                } else {
                    $output = '<tr><td colspan="4">No results found</td></tr>';
                }
            }
    
            return response()->json($output);
        }
    }
     
    public function show($id)
    {
        $user = People::find($id);

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

}
