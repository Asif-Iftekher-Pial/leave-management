@extends('master')
@section('content')
<div class="card">
  
    <div class="card-body">
      <a href="{{ route('employee.create') }}" class="btn btn-sm btn-primary float-end mt-2">Create Employee</a>
      <h5 class="card-title">Employee</h5>
        
      <!-- Table with stripped rows -->
      <table class="table table-striped" id="myTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Photo</th>
            <th scope="col">Age</th>
            <th scope="col">Address</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($employees as $row=>$item)
                <tr>
                    <th scope="row">{{ $row+1 }}</th>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->email }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$item->photo) }}" alt="{{ $item->user->name }}" srcset="" height="80" width="80">
                    </td>
                    <td>{{ $item->age }}</td>
                    <td>{{ $item->address }}</td>
                    <td>
                        <span class="badge bg-{{ $item->status == 'unblocked' ? 'success' : 'danger' }}">{{ $item->status }}</span>
                    </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="{{ route('employee.edit', $item->id) }}" class="btn btn-info btn-sm ">Edit</a>
                        <form action="{{ route('employee.destroy', $item->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <div class="dropdown">
                          <button class="btn btn-warning dropdown-toggle btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                           Status
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('employee.status', [$item->id, 'blocked']) }}">Block</a></li>
                            <li><a class="dropdown-item" href="{{ route('employee.status', [$item->id, 'unblocked']) }}">Unblock</a></li>
                          </ul>
                        </div>
                      </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
@endsection