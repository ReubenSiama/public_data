@extends('layouts.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a type="button" class="btn btn-sm float-right btn-success" href="{{ route('edit-data', $public_data->id) }}">Edit</a>
      <h6 class="m-0 font-weight-bold text-primary">View Data</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="businessType">Business Type :</label>
                    <em>{{ $public_data->BusinessType->business_type }}</em>
                </div>
                <div class="form-group">
                    <label for="businessType">Added By :</label>
                    <em>{{ $public_data->added_by }}</em>
                </div>
                <div class="form-group">
                    <label for="businessType">Company / Firm Name :</label>
                    <em>{{ $public_data->company_firm_name }}</em>
                </div>
                <div class="form-group">
                    <label for="businessType">Contact Person Name :</label>
                    <em>{{ $public_data->contact_person_name }}</em>
                </div>
                <div class="form-group">
                    <label for="businessType">Contact Person Number :</label>
                    <em>{{ $public_data->contact_person_number }}</em>
                </div>
                <div class="form-group">
                    <label for="businessType">Owner Name :</label>
                    <em>{{ $public_data->owner_name }}</em>
                </div>
                <div class="form-group">
                    <label for="businessType">Owner Contact Number :</label>
                    <em>{{ $public_data->owner_contact_number }}</em>
                </div>
                <div class="form-group">
                    <label for="businessType">Tel. Number :</label>
                    <em>{{ $public_data->tel_number }}</em>
                </div>
                <div class="form-group">
                    <label for="businessType">Website :</label>
                    <em>{{ $public_data->website }}</em>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="businessType">Source :</label>
                    <em>{{ $public_data->source }}</em>
                </div>
                <div class="form-group">
                    <label for="businessType">GST Number :</label>
                    <em>{{ $public_data->gst_number }}</em>
                </div>
                <div class="form-group">
                    <label for="businessType">Address :</label>
                    <em>{{ $public_data->address_line_1 }}, {{ $public_data->address_line_2 }}, {{ $public_data->district }} PIN: {{ $public_data->pin_code }}</em>
                </div>
                <div class="form-group">
                    <label for="businessType">Remark :</label>
                    <em>{{ $public_data->remark }}</em>
                </div>
                
                <div class="form-group">
                    <label for="businessType">Emails :</label>
                    <br>
                    @foreach ($public_data->email_id as $email)
                    <em>{{ $email->email_id }}</em><br>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="businessType">Mobild Numbers :</label>
                    <br>
                    @foreach ($public_data->mobile_number as $mobile_number)
                    <em>{{ $mobile_number->mobile_number }}</em><br>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="businessType">Whatsapp Numbers :</label>
                    <br>
                    @foreach ($public_data->whatsapp_number as $number)
                    <em>{{ $number->whatsapp_number }}</em><br>    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection