@extends('layouts.master')
@section('content')
<form action="">
    <div class="row">
        <div class="col-md-4">
            <select name="date" id="date" class="form-control form-control-sm">
                <option value="">--Select Date--</option>
                @foreach ($dates as $date)
                    <option value="{{ $date }}">{{ $date }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-sm btn-success">Get Report</button>
        </div>
    </div>
</form>
<br>
<div class="col-md-6">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User</th>
                    <th class="text-center">Number of Records</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->user->name }}</td>
                    <td class="text-center">{{ $report->number_of_records }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection