<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @include('components.navbar')
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="clearfix mb-3">
                {{-- <a href="{{ route('properties.create') }}" class="btn btn-success float-right">Add Property</a> --}}
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                        <tr>
                            <td>{{ $property->id }}</td>
                            <td>{{ $property->nama }}</td>
                            <td>{{ $property->lokasi }}</td>
                            <td>{{ $property->harga }}</td>
                            <td>{{ $property->status }}</td>
                            <td>
                                <a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
