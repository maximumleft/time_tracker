<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeRequest;
use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        $times = Time::all();
        return view('time.index', compact('times'));
    }

    public function show(Time $time)
    {
        return view('time.show', compact('time'));
    }

    public function create()
    {
        return view('time.create');
    }

    public function store(TimeRequest $request)
    {
        $data = $request->validated();
        Time::create($data);

        return redirect()->route('time.index');
    }

    public function edit(Time $time)
    {
        return view('time.edit', compact('time'));
    }

    public function update(Time $time,TimeRequest $request)
    {
        $data = $request->validated();
        $time->update($data);

        return view('time.show', compact('time'));
    }

    public function delete(Time $time)
    {
        $time->delete();

        return redirect()->route('time.index');
    }
}
