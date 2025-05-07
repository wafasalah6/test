<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return view('sessions.index', compact('sessions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:class,event',
            'decription' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'price_cents' => 'required|integer|min:0',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
        Session::create($data);
        return redirect()->route('sessions.index');
    }

    public function show(Session $session)
    {
        return view('sessions.show', compact('session'));
    }

    public function update(Request $request, Session $session);
    {
        $data = $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:class,event',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'price_cents' => 'required|integer|min:0',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
        $session->update($data);
        return redirect()->route('sessions.index');

    }

    public function destroy(Session $session)
    {
        $session->delete();
        return back();
    }
}
