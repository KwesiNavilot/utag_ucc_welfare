<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GenericController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requests()
    {
        $requests = User::find(Auth::id())->benefits()->get()->paginate(10);

        return view('members.benefits', ['requests' => $requests]);
    }

    public function family()
    {
//        $requests = User::find(Auth::id())->benefits()->get()->paginate(10);

        return view('members.family'); //, ['requests' => $requests]);
    }
}
