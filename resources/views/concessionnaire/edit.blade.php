@extends('layouts.app')

@section('content')

    <h1>{{ __('edit_dealer_heading') }} {{ $concessionnaire->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ url('concessionnaire/'. $concessionnaire->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div class="form-group mb-3">
            <label for="name">{{__('edit_name_label')}}</label>
            <input type="text" class="form-control" id="name" placeholder="{{__('edit_enter_name_placeholder')}}" name="name"
                value="{{ $concessionnaire->name }}">
        </div>

        <div class="form-group mb-3">
            <label for="content">{{__('edit_add_details_label')}}</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $concessionnaire->content }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="photo">{{__('edit_add_picture_label')}}</label> <br />
            <input type="file" name="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">{{__('edit_save_button')}}</button>
    </form>

@endsection
