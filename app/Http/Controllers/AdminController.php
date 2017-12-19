<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function reports()
    {
        if (Auth::check() && Auth::user()->admin != 1)
        {
            return redirect()->route('welcome');
        }
        $reports = Report::where('resolved', 0)
                          ->paginate(10);
        return view('admins.reports', compact('reports'));
    }

    public function mark_report($id)
    {
        if (Auth::check() && Auth::user()->admin != 1)
        {
            return redirect()->route('welcome');
        }
        $report = Report::find($id);

        $report->resolved = 1;
        $report->save();

        return redirect()->back();
    }

    public function deactivate_user($id)
    {
        if (Auth::check() && Auth::user()->admin != 1)
        {
            return redirect()->route('welcome');
        }
        $user = User::find($id);

        $user->active = 0;
        $user->save();

        return redirect()->back();
    }
}
