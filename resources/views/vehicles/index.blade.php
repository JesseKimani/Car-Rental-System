@extends('vehicles.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registered Vehicles</h2></br>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('vehicles.create') }}"> Add New Vehicle</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <a style="float:right" href="homepage">Log Out</a>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Model</th>
            <th>Make</th>
            <th>Year of Manufacture</th>
            <th>Amount per Day(Ksh.)</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($vehicles as $vehicle)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $vehicle->image }}" width="100px"></td>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->make }}</td>
            <td>{{ $vehicle->yearofmanufacture }}</td>
            <td>{{ $vehicle->bookingamount }}</td>
            <td>
                <form action="{{ route('vehicles.destroy',$vehicle->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('vehicles.show',$vehicle->id) }}">Show</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $vehicles->links() !!}
        
@endsection