<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ServiceController extends Controller
{
    // Controller of the services offered once subscribed
    public function index()
    {
        return 'Services';
    }
}
