<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Traits\Essentials;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use Essentials;

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('members.dashboard', ['greeting' => $this->greet()]);
    }
}
