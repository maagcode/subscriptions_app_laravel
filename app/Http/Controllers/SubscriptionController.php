<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Plan;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('subscription.index');
    }

    public function create(Request $request)
    {
        $plan = Plan::findOrFail($request->plan);


        // Statement to check if user is already subscribed to the plan,
        // preventing him/her to land on the same subscription.
        if ($request->user()->subscribedToPlan($plan->braintree_plan, 'main'))
        {
            return redirect()->route('home');
        }


        if (!$request->user()->subscribed('main'))
        {

        // Creates new subscription in Braintree
        $request->user()->newSubscription('main', $plan->braintree_plan)->create($request->payment_method_nonce);

    } else {
        // swap or upgrade existing subscription to a new plan
        $request->user()->subscription('main')->swap($plan->braintree_plan);
    }


        return redirect()->route('home');
    }

    public function cancel(Request $request)
    {
        $request->user()->subscription('main')-cancel();

        return redirect()->route('subscription.index');
    }

    public function resume(Request $request)
    {
        $request->user()->subscription('main')->resume();

        return redirect()->route('subscription.index');
    }
}
