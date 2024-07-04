<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(Request $request) : view {
        $query = $request->get('key');
        $apps = Application::where('names', 'like', '%'.$query.'%')
                            ->orWhere('email', 'like', '%'.$query.'%')
                            ->orWhere('phone', 'like', '%'.$query.'%')
                            ->paginate(10);
        return view('admin.dashboard', compact('apps'));
    }

    public function agents(Request $request) : view {
        $query = $request->get('key');
        $agents = User::where('type', 'AGT')
                        ->where(function($q) use ($query) {
                            $q->where('name', 'like', '%'.$query.'%')
                            ->orWhere('email', 'like', '%'.$query.'%')
                            ->orWhere('phone', 'like', '%'.$query.'%');
                        })
                        ->paginate(10);

        return view('admin.agents', compact('agents'));
    }
}
