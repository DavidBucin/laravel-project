@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))

<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>

@endif

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (Auth::id() == $concessionnaire->user_id)
                    <a class="btn btn-success" href="{{ url('vehicule/'.$concessionnaire->id.'/create') }}">Add a
                        car</a>
                    @endif
                </div>
                @if ($vehicules->isEmpty())
                <p>No vehicles available for this concessionnaire.</p>
                @else
                <div class="card-body">

                    <table class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Brand
                                </th>
                                <th>
                                    Year
                                </th>
                                <th>
                                    Color
                                </th>
                                <th>
                                    Price($)
                                </th>
                                @if (Auth::id() == $concessionnaire->user_id)
                                <th>
                                    DELETE
                                </th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicules as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->marque }} </td>
                                <td> {{ $item->annee }} </td>
                                <td> {{ $item->couleur }} </td>
                                <td> {{ $item->prix }} </td>
                                @if (Auth::id() == $concessionnaire->user_id)
                                <td>
                                    <form
                                        action="{{ url("concessionnaire/".$concessionnaire->id."/vehicule/". $item->id) }}"
                                        method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                                    </form>
                                </td>
                                
                                @endif


                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                </div>
                @endif

            </div>
        </div>







    </div>
</div>









@endsection