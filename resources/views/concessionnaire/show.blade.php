@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>{{ $concessionnaire->name }}</h1>
            <p class="lead">{{ $concessionnaire->content }}</p>
            @if (Auth::id() == $concessionnaire->user_id)
            <div class="buttons">
                <a href="{{ url('concessionnaire/'. $concessionnaire->id .'/edit') }}" class="btn btn-info">{{ __('edit_button') }}</a>
                <form action="{{ url('concessionnaire/'. $concessionnaire->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('delete_button') }}</button>
                </form>
            </div>
            @endif

            <a href="{{ url('concessionnaire/vehicule/'. $concessionnaire->id)}}" class="btn btn-info">{{ __('list_of_cars_button') }}</a>
            
        </div>
    </div>
</div>

@endsection
