<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class Controller
{
    public function index(Request $request)
    {
        $query = $request->get('key');
        $apps = Application::where('names', 'like', '%'.$query.'%')
                            ->orWhere('email', 'like', '%'.$query.'%')
                            ->orWhere('phone', 'like', '%'.$query.'%')
                            ->paginate(10);
        return view('dashboard', compact('apps'));
    }
}
