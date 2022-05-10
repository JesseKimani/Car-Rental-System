<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Cars</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
    *{
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}
</style>
</head>
<body>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Available Vehicles</h2>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Make</th>
            <th>Model</th>         
            <th>Year of Manufacture</th>
            <th>Amount per Day(Ksh.)</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($vehicles as $vehicle)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $vehicle->image }}" width="100px"></td>
            <td>{{ $vehicle->make }}</td>
            <td>{{ $vehicle->model }}</td>   
            <td>{{ $vehicle->yearofmanufacture }}</td>
            <td>{{ $vehicle->bookingamount }}</td>
            <td>
                  <a class="btn btn-info" href="{{ route('vehicles.show',$vehicle->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('book-car',$vehicle->id) }}">Book Vehicle</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $vehicles->links() !!}
</body>
</html>