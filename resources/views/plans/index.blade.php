@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Plans</div>

                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($plans as $plan)
                            <li class="list-group-item clearfix">

                                <div class="pull-left">
                                    <h4>{{ $plan->name }}</h4>
                                    <h4>${{ $plan->cost }}</h4>
                                    <p>{{ $plan->description }}</p>
                                </div>

                                <a href="{{ route('plans.show', $plan->slug) }}" class="btn btn-primary pull-right">Join</a>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
