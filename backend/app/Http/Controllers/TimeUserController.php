<?php

namespace App\Http\Controllers;

use App\Models\UserTime;
use Illuminate\Http\Request;

class TimeUserController extends Controller
{
    public function index(){
        $timeUsers = UserTime::all();
        return view('userTime.index',compact('timeUsers'));
    }
    public function create()
    {
        return view('userTime.create');
    }
    public function show(UserTime $userTime)
    {
        return view('userTime.show', compact('userTime'));
    }

    public function delete(UserTime $userTime)
    {
        $userTime->delete();

        return redirect()->route('time-user.index');
    }
}
