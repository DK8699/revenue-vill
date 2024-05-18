<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Proposal;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->level == 1) {
            // $proposal = Proposal::select('id')->count();
            return redirect('/admin/dashboard');
        } else {
            return redirect('/user-dashboard');
        }
    }

    // public function cardOpt()
    // {
    //     return view('cardsOption');
    // }
}
