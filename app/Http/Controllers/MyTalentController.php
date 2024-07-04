<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MyTalentController extends Controller
{
    public function apply_form() : View {
        return view('mytalent.apply');
    }
}
