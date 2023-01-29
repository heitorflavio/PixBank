<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use App\Http\Requests\StoreDataUserRequest;
use App\Http\Requests\UpdateDataUserRequest;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDataUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataUser  $dataUser
     * @return \Illuminate\Http\Response
     */
    public function show(DataUser $dataUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataUser  $dataUser
     * @return \Illuminate\Http\Response
     */
    public function edit(DataUser $dataUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataUserRequest  $request
     * @param  \App\Models\DataUser  $dataUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataUserRequest $request, DataUser $dataUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataUser  $dataUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataUser $dataUser)
    {
        //
    }
}
