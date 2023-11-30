@extends('layouts.app')

@section('content')

    <h1>{{ __('add_dealer_heading') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('concessionnaire') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="name">{{__('add_name_label')}}</label>
            <input type="text" class="form-control" id="titre" placeholder="{{__('add_enter_name_placeholder')}}" name="name">
        </div>

        <div class="form-group mb-3">
            <label for="content">{{__('add_add_details_label')}}</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="photo">{{__('add_add_picture_label')}}</label> <br />
            <input type="file" name="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">{{__('add_save_button')}}</button>
    </form>

@endsection
