<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Torann\GeoIP\Facades\GeoIP;
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
      $location=geoip()->getLocation(\Request::ip());

      return view('home');
    }
}
