<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BenefitRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = User::find(Auth::id())->benefits()->get()->paginate(10);

//        dd($requests);

        return view('members.benefits', ['requests' => $requests]);
    }
}
