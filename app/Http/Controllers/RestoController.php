<?php

namespace App\Http\Controllers;

use App\Models\Resto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRestoRequest;
use App\Http\Requests\UpdateRestoRequest;



class RestoController extends Controller
{
    public function index()
    {

        return Resto::all();

    }

    public function store(StoreRestoRequest $request)
    {

       return Resto::create(
        $request->validated()
       );

    }

    public function show(Resto $resto)
    {

       return $resto;

    }

    public function update(UpdateRestoRequest $request, Resto $resto)
    {

        $resto->update($request->validated());

        return $resto->refresh();

    }

    public function destroy(Resto $resto)
    {

       $resto->delete();

       return $resto;

    }

    public function reviews(Resto $resto)
    {
        return $resto->reviews->load('user');
    }

}