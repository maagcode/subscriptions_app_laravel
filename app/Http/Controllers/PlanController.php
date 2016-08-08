<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::get();

        return view('plans.index')->withPlans($plans);
    }

    public function show(Plan $plan)
    {
        $plan = Plan::get();

        return view('plans.show')->withPlan($plan);
    }
}
