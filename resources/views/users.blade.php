@extends('layouts.master')
@section('content')
<!-- Page Heading -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif
          
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    @if (Auth::user()->role->role_name == 'admin')
    <button type="button" class="btn btn-sm float-right btn-success" data-toggle="modal" data-target="#myModal">Add User</button>
    @endif
    <h6 class="m-0 font-weight-bold text-primary">Users</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Type</th>
            <th>Role</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role->role_name) }}</td>
                <td>
                  @if (Auth::user()->role->role_name == 'admin')
                  <button class="btn btn-sm btn-success edit-user" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-role="{{ $user->role_id }}" data-id="{{ $user->id }}" data-toggle="modal" data-target="#updateModal">Edit</button>
                  @endif
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
<form action="{{ route('add-user') }}" method="post">
  @csrf
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <div class="form-group">
            <select name="role" id="role" class="form-control">
                <option value="">--Role--</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ ucfirst($role->role_name) }}</option>
                @endforeach
            </select>
        </div>
          <div class="form-group">
            <input required type="text" name="name" id="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group"><input required type="email" name="email" id="email" class="form-control" placeholder="Email"></div>
        <div class="form-group"><input required type="password" name="password" id="password" class="form-control" placeholder="Password"></div>
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

<form action="{{ route('update-user') }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" id="user_id">
    <div class="modal fade" id="updateModal">
      <div class="modal-dialog">
        <div class="modal-content">
  
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
  
          <!-- Modal body -->
          <div class="modal-body">
          <div class="form-group">
              <select name="role" id="editrole" class="form-control">
                  <option value="">--Role--</option>
                  @foreach ($roles as $role)
                      <option value="{{ $role->id }}">{{ ucfirst($role->role_name) }}</option>
                  @endforeach
              </select>
          </div>
            <div class="form-group">
              <input required type="text" name="name" id="editname" class="form-control" placeholder="Name">
          </div>
          <div class="form-group"><input required type="email" name="email" id="editemail" class="form-control" placeholder="Email"></div>
          <div class="form-group"><input type="password" name="password" id="editpassword" class="form-control" placeholder="Password"></div>
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

@section('scripts')
  <script>
      $('button.edit-user').on('click', function(){
        let id = $(this).data('id');
        let name = $(this).data('name');
        let email = $(this).data('email');
        let role = $(this).data('role');
        $('input#user_id').val(id);
        $('select#editrole').val(role);
        $('input#editname').val(name);
        $('input#editemail').val(email);
      });
  </script>
@endsection