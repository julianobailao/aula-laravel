<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DonkeyRequest;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        echo $request->get('nome');
    }

    public function store(DonkeyRequest $request)
    {
        echo $request->input('nome');
    }
}
