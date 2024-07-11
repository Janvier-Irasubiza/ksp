<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use App\Models\MyTalent;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request) : \Illuminate\View\View {
        $user = Auth::user();
        
        $query = $request->get('key');
        $appsQuery = Application::query();
        
        $myTalentApps = MyTalent::count();;
        $balance = 0;
    
        if ($user->type == 'AGT') {
            $appsQuery->where('promo_code', $user->promo_code);
            $myTalentApps = MyTalent::where('promo_code', $user->promo_code)->count();
            $balance = MyTalent::where('promo_code', $user->promo_code)->sum('agent_part');
        }
    
        $apps = $appsQuery->where(function($q) use ($query) {
                    $q->where('names', 'like', '%'.$query.'%')
                      ->orWhere('email', 'like', '%'.$query.'%')
                      ->orWhere('phone', 'like', '%'.$query.'%');
                 })
                 ->paginate(10);
    
        return view('admin.dashboard', compact('apps', 'myTalentApps', 'balance'));
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

    public function agent($promo_code) : view {
        $agent = User::where('promo_code', $promo_code)->first();
        $balance = MyTalent::where('promo_code', $promo_code)->sum('agent_part');
        $balance += Application::where('promo_code', $promo_code)->sum('agent_part');
        return view('admin.agent-info', compact('agent', 'balance'));
    }

    public function my_apps(Request $request) : view {
        $user = Auth::user();

        $myTalentApps = 0;
        $balance = 0;
    
        $query = $request->get('key');
        $appsQuery = Application::query();
    
        if ($user->type == 'AGT') {
            $appsQuery->where('promo_code', $user->promo_code);
            $myTalentApps = MyTalent::where('promo_code', $user->promo_code)->count();
            $balance = MyTalent::where('promo_code', $user->promo_code)->sum('agent_part');
        }
    
        $apps = $appsQuery->where(function($q) use ($query) {
                    $q->where('names', 'like', '%'.$query.'%')
                      ->orWhere('email', 'like', '%'.$query.'%')
                      ->orWhere('phone', 'like', '%'.$query.'%');
                 })
                 ->paginate(10);
    
        return view('admin.my-apps', compact('apps', 'myTalentApps', 'balance'));
    }

    public function edu_apps(Request $request) : view {
        $user = Auth::user();

        $myTalentApps = 0;
        $balance = 0;
    
        $query = $request->get('key');
        $appsQuery = Application::query();
    
        if ($user->type == 'AGT') {
            $appsQuery->where('promo_code', $user->promo_code);
            $myTalentApps = MyTalent::where('promo_code', $user->promo_code)->count();
            $balance = MyTalent::where('promo_code', $user->promo_code)->sum('agent_part');
        }
    
        $apps = $appsQuery->where(function($q) use ($query) {
                    $q->where('names', 'like', '%'.$query.'%')
                      ->orWhere('email', 'like', '%'.$query.'%')
                      ->orWhere('phone', 'like', '%'.$query.'%');
                 })
                 ->paginate(10);
    
        return view('admin.my-apps', compact('apps', 'myTalentApps', 'balance'));
    }

    public function ksp_apps(Request $request) : view {
        $user = Auth::user();

        $myTalentApps = MyTalent::count();

        $query = $request->get('key');
        $appsQuery = Application::query();
    
        $apps = $appsQuery->where(function($q) use ($query) {
                    $q->where('names', 'like', '%'.$query.'%')
                      ->orWhere('email', 'like', '%'.$query.'%')
                      ->orWhere('phone', 'like', '%'.$query.'%');
                 })
                 ->paginate(10);
    
        return view('admin.my-apps', compact('apps', 'myTalentApps'));
    }

    public function mytalent(Request $request) : view {
        $user = Auth::user();
        $EduApps = 0;
        $myTalentApps = 0;
    
        $query = $request->get('key');
        $appsQuery = MyTalent::query();
    
        if ($user->type == 'AGT') {
            $appsQuery->where('promo_code', $user->promo_code);
            $EduApps = Application::where('promo_code', $user->promo_code)->count();
            $myTalentApps = MyTalent::where('promo_code', $user->promo_code)->count();
            $balance = MyTalent::where('promo_code', $user->promo_code)->sum('agent_part');
        }
    
        $apps = $appsQuery->where(function($q) use ($query) {
                    $q->where('names', 'like', '%'.$query.'%')
                      ->orWhere('email', 'like', '%'.$query.'%')
                      ->orWhere('phone', 'like', '%'.$query.'%');
                 })
                 ->paginate(10);
    
        return view('admin.mytalent-apps', compact('apps', 'EduApps', 'myTalentApps', 'balance'));
    }

    public function mytalent_apps(Request $request) : view {
        $user = Auth::user();
        $EduApps = Application::count();
        $myTalentApps = MyTalent::count();;
    
        $query = $request->get('key');
        $appsQuery = MyTalent::query();
    
        $apps = $appsQuery->where(function($q) use ($query) {
                    $q->where('names', 'like', '%'.$query.'%')
                      ->orWhere('email', 'like', '%'.$query.'%')
                      ->orWhere('phone', 'like', '%'.$query.'%');
                 })
                 ->paginate(10);
    
        return view('admin.mytalent-apps', compact('apps', 'EduApps', 'myTalentApps'));
    }
}
