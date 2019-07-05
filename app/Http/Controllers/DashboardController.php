<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exchange;


class DashboardController extends Controller
{
    public function index()
    {
        $exchanges = Exchange::all();

        return view('dashboard.index', compact('exchanges'));
    }
}
