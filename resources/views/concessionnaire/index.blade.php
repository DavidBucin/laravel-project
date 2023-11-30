@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-lg-10">
        <h2>{{ __('hello') }}</h2>
    </div>

    <div class="col-lg-2 p-5">
        @if (Auth::id() != null)
        <a class="btn btn-success" href="{{ url('concessionnaire/create') }}">{{__('add_car_dealer')}}</a>
        @endif
    </div>

    <div class="col">
        <h4>{{__('list_of_car_dealers')}} </h4>
    </div>

</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="container">
    <div class="row">
        @foreach ($concessionnaires as $index => $concessionnaire)
        <div class="col-md-4">
            <div class="card card-body">
                <a href="{{ url('concessionnaire/'. $concessionnaire->id) }}">
                    <h2>{{ $concessionnaire->name }}</h2>
                </a>

                <img src="{{ asset('public/images/'.$concessionnaire->photo)}}" width="70px" height="70px" alt="photo">
                <p>{{__("date")}}: {{ $concessionnaire->created_at }}</p>
                <a href="{{ url('concessionnaire/'. $concessionnaire->id) }}" class="btn btn-outline-primary">
                    {{__('learn_more')}}
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
