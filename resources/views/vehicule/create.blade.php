@extends('layouts.app')


@section('content')

<h1>Add a car</h1>


@if ($errors->any())

<div class="alert alert-danger">

    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach

    </ul>

</div>

@endif

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add the information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url("vehicule/". $concessionnaire->id). "/create" }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Brand :</label>
                            <input type="text" name="marque" class="form control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Year :</label>
                            <input type="text" name="annee" class="form control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Color :</label>
                            <input type="text" name="couleur" class="form control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Price :</label>
                            <input type="number" name="prix" class="form control" step=".01">
                            <label for="">$</label>
                        </div>

                        <div class="form-group mb3">
                            <button type="submit" class="btn btn-primary">Save Car</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection