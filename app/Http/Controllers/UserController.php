<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Imports\UsersImport;
use App\Models\User;

set_time_limit(10800);

class UserController extends Controller
{
    public function importExportView()

    {
        $user = User::all();
        return view('importFile', compact('user'));
    }

    public function index()

    {
        $user = User::all();
        return view('importFile', compact('user'));
    }



    /**

     * @return \Illuminate\Support\Collection

     */

    public function export()

    {

        return Excel::download(new ExportUser, 'users.xlsx');
    }



    /**

     * @return \Illuminate\Support\Collection

     */

    public function import(Request $request)

    {

        Excel::import(new UsersImport, request()->file('file'));

        return back();
    }
}
