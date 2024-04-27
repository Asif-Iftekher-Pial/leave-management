@extends('master')
@section('content')
<div class="card">
  
    <div class="card-body">
      <a href="{{ route('employee-leave-request.create') }}" class="btn btn-sm btn-primary float-end mt-2">Create Leave Request</a>
      <h5 class="card-title">Leave History</h5>
        
      <!-- Table with stripped rows -->
      <table class="table table-striped" id="myTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Leave Type</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Reason</th>
            <th scope="col">Admin Comment</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($leaves as $row=>$item)
                <tr>
                    <th scope="row">{{ $row+1 }}</th>
                    <td>{{ $item->leave_type }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>
                       {{ $item->end_date }}
                    </td>
                    <td>{{ $item->reason }}</td>
                    <td>{{ $item->admin_comment }}</td>
                    <td>
                        <span class="badge bg-{{ $item->leave_status == 'pending' ? 'warning' : ($item->leave_status == 'approved' ? 'success' : 'danger') }}">{{ $item->leave_status }}</span>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
@endsection