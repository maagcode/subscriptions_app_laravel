@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Subscription</div>

                <div class="panel-body">

                    @if (Auth::user()->subscription('main')->cancelled())

                        <p>
                            You have successfully cancelled your subscription. Your subscription services will end in {{ Auth::user()->subscription('main')->ends_at->format('dS M Y') }}
                        </p>

                        <form action="{{ route('subscription.resume') }}" method="post">
                            <button type="submit" class="btn btn-default">Resume Subscription</button>
                            {{ csrf_field() }}
                        </form>

                    @else
                        <p>
                            You are currently a subscribed member.
                        </p>

                        <form action="{{ route('subscription.cancel') }}" method="post">
                            <button type="submit" class="btn btn-default">Cancel Subscription</button>
                            {{ csrf_field() }}
                        </form>

                    @endif

                    <a href="{{ route('plans.index') }}">Change your plan</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
