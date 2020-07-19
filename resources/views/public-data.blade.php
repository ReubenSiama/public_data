@extends('layouts.master')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"></h1>
          
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    {{-- <button type="button" class="btn btn-sm float-right btn-success" data-toggle="modal" data-target="#myModal">Add Business Type</button> --}}
    <h6 class="m-0 font-weight-bold text-primary">Data Collected</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Type</th>
            <th>Company / Firm Name</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($public_data as $data)
              <tr>
                <td>{{ $data->BusinessType->business_type }}</td>
                <td>{{ $data->company_firm_name }}</td>
                <td>{{ $data->address_line_1 }}, {{ $data->address_line_2 }}, {{ $data->district }}, PIN: {{ $data->pin_code }}</td>
                <td>
                  <a href="{{ route('view-data', $data->id) }}" class="btn btn-sm btn-success">View</a>
                  <a href="{{ route('edit-data', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('scripts')
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
@endsection