<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;
use App\User;

class DashboardController extends Controller
{
  public function __construct(User $user)
  {
    $this->middleware('auth');
    $this->user     = $user;

  }

  public function index(Request $request)
  {
    return view('backend.dashboard.home');
  }

}
