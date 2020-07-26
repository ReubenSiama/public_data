@extends('layouts.master')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"></h1>
          
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Collected</h6>
  </div>
  <div class="card-body">
    <div class="form-group">
      <div class="row">
        <div class="col-md-4">
          <form action="" method="get">
            <input type="text" name="phone_number_search" id="" placeholder="Phone Number">
            <button>Search</button>
          </form>
        </div>
        <div class="col-md-8">
          @if (Auth::user()->role->role_name != 'Data Collector')
          <form action="" method="get">
            <select name="business_type" id="bType">
              <option value="">--Filter--</option>
              @foreach ($bTypes as $bType)
                  <option {{ isset($_GET['business_type']) && $_GET['business_type'] == $bType->id ? 'selected' : '' }} value="{{ $bType->id }}" title="{{ $bType->description }}">{{ $bType->business_type }}</option>
              @endforeach
            </select>
            <input type="text" name="search" id="" placeholder="Search">
            <button>Go!</button>
          </form>
          @endif
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Added By</th>
            <th>Type</th>
            <th>Company / Firm Name</th>
            <th>Address</th>
            <th>Verification Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($public_data as $data)
              <tr>
                <td>{{ $data->data_id }}</td>
                <td>{{ $data->addedBy->name }}</td>
                <td>{{ $data->BusinessType->business_type }}</td>
                <td>{{ $data->company_firm_name }}</td>
                <td>{{ $data->address_line_1 }}, {{ $data->address_line_2 }}, {{ $data->district }}, PIN: {{ $data->pin_code }}</td>
                <td>{{ $data->verification_status }}</td>
                <td>
                  <a href="{{ route('view-data', $data->id) }}" class="btn btn-sm btn-success">View</a>
                  <a href="{{ route('edit-data', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                  @if (Auth::user()->role->role_name != 'Data Collector' && $data->verification_status == 'Unverified')
                  <a href="{{ route('verify-data', $data->id) }}" class="btn btn-sm btn-success">Verify</a>
                  @endif
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-4 offset-5">
      {{ $public_data->links() }}
    </div>
  </div>
</div>
@endsection

@section('scripts')

@endsection