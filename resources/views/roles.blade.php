@extends('layouts.master')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"></h1>
          
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <button type="button" class="btn btn-sm float-right btn-success" data-toggle="modal" data-target="#myModal">Add Role</button>
    <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
              <tr>
                <td>{{ $role->role_name }}</td>
                <td>
                  <button class="edit btn btn-sm btn-success" data-toggle="modal" data-target="#editRole" data-id="{{ $role->id }}" data-role="{{ $role->role_name }}">Edit</button>
                  {{-- <button class="delete btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteRole" data-id="{{ $role->id }}" data-role="{{ $role->role_name }}">Delete</button> --}}
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
<form action="{{ route('add-role') }}" method="post">
  @csrf
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Role</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <input required type="text" name="role_name" id="role" class="form-control" placeholder="Role">
        </div>
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

<!-- The Modal -->
<form action="{{ route('update-role') }}" method="post">
  @csrf
  <input type="hidden" name="id" id="id">
  <input type="hidden" name="_method" value="PUT">
  <div class="modal fade" id="editRole">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Role</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="role_name" id="editrole" class="form-control" placeholder="Role">
        </div>
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

<!-- The Modal -->
<form action="{{ route('delete-role') }}" method="post">
  @csrf
  <input type="hidden" name="id" id="delete_id">
  <input type="hidden" name="_method" value="DELETE">
  <div class="modal fade" id="deleteRole">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Role</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            Are you sure you want to delete this role?
        </div>
      </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm">Yes</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">No</button>
        </div>

      </div>
    </div>
  </div>
</form>
@endsection

@section('scripts')
  <script>
    $('button.edit').on('click', function(){
      let id = $(this).data('id');
      let role_name = $(this).data('role');
      $('input#id').val(id);
      $('input#editrole').val(role_name);
    });

    $('button.delete').on('click', function(){
      let id = $(this).data('id');
      $('input#delete_id').val(id);
    })
  </script>
@endsection