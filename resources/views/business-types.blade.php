@extends('layouts.master')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"></h1>
          
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <button type="button" class="btn btn-sm float-right btn-success" data-toggle="modal" data-target="#myModal">Add Business Type</button>
    <h6 class="m-0 font-weight-bold text-primary">Business Types</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Type</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($bTypes as $type)
              <tr>
                <td>{{ $type->business_type }}</td>
                <td>{{ $type->description }}</td>
                <td>
                  <button class="btn btn-sm btn-success">Approve</button>
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


    {{-- fee payments --}}

<!-- The Modal -->
<form action="{{ route('add-business-type') }}" method="post">
  @csrf
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Business Type</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="business_type" id="businessType" class="form-control" placeholder="Business Type">
        </div>
        <div class="form-group"><input required type="text" name="description" id="description" class="form-control" placeholder="Description"></div>
      </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm">Save</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</form>
@endsection