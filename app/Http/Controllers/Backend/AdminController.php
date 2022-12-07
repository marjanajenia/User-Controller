<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('backend.dashboard');
    }
    //Admin Logout method
    public function logout(){
        Auth::logout();
        $notification = array(
            'message' => 'Successfully logout',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    //Application Cache Clear Method
    public function cacheClear(){
        Artisan::call('cache:clear');
        $notification = array(
            'message' => 'Application Cache Clear',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blank()
    {
        return view('backend.blank');
    }

    public function formDesign()
    {
        return view('backend.formDesign');
    }

}
