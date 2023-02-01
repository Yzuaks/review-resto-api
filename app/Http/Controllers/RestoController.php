<?php

namespace App\Http\Controllers;

use App\Models\Resto;
use Illuminate\Http\Request;

class RestoController extends Controller
{
    public function index()
    {
        return Resto::all();
    }
}
