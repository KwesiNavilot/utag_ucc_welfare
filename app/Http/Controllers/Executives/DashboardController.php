<?php

namespace App\Http\Controllers\Executives;

use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\User;
use App\Traits\Essentials;
use Illuminate\Contracts\Support\Renderable;

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
        return view('executives.dashboard', [
            'greeting' => $this->greet(),
            'pending_requests' => BenefitRequest::pending()->count(),
            'approved_requests' => BenefitRequest::approved()->count(),
            'total_requests' => BenefitRequest::all()->count(),
            'members' => User::all()->count()
        ]);
    }
}
