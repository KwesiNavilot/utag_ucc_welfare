<?php

namespace App\Http\Controllers;

use App\Models\BenefitRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RetiralAndDemiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retirees = User::all()->retiree();

        return view('executives.retiralanddemise.index', ['retirees', $retirees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BenefitRequest  $benefitRequest
     * @return \Illuminate\Http\Response
     */
    public function show(BenefitRequest $benefitRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BenefitRequest  $benefitRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(BenefitRequest $benefitRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BenefitRequest  $benefitRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BenefitRequest $benefitRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BenefitRequest  $benefitRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(BenefitRequest $benefitRequest)
    {
        //
    }
}
