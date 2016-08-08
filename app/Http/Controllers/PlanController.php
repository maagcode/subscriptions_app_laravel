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

    public function show(Plan $plan, Request $request)
    {

        // Statement to check if user is already subscribed to the plan,
        // preventing him/her to land on the same subscription.
        if ($request->user()->subscribedToPlan($plan->braintree_plan, 'main'))
        {
            return redirect()->route('home');
        }


        return view('plans.show')->withPlan($plan);
    }
}
