@extends('layouts.master')  
@section('content')

@if(session('success'))

<div class="alert alert-success">{{ session('success') }}</div>

@endif
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
  </div>
  <div class="card-body">
    <form action="{{ route('save-update-data', $public_data->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="business_type">Business Type:</label>
            <select required name="business_type_id" id="business_type" class="form-control form-control-sm">
              <option value="">--select--</option>
              @foreach ($bTypes as $type)
                <option {{ $public_data->business_type_id == $type->id ? 'selected':'' }}  {{ $public_data->business_type_id == $type->id ? 'selected': '' }} value="{{ $type->id }}">{{$type->business_type}}</option>
              @endforeach
            </select>
            @error('business_type_id')
            <div class="alert-danger">
              <strong>Error!</strong> {{ $message }}</li>
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="company_firm_name">Company / Firm Name:</label>
            <input value="{{ $public_data->company_firm_name }}" required type="text" id="comapny_name" name="company_firm_name" class="form-control form-control-sm" placeholder="Company / Firm Name">
            @error('company_firm_name')
            <div class="alert-danger">
              <strong>Error!</strong> {{ $message }}</li>
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="contact_person_name">Contact Person Name:</label>
            <input value="{{ $public_data->contact_person_name }}" type="text" id="contact_person_name" name="contact_person_name" class="form-control form-control-sm" placeholder="Contact Person Name">
          </div>
          <div class="form-group">
            <label for="contact_person_number">Contact Person Number:</label>
            <input value="{{ $public_data->contact_person_number }}" type="text" id="contact_person_number" name="contact_person_number" class="form-control form-control-sm" placeholder="Contact Person Number">
          </div>
          <div class="form-group">
            <label for="owner_name">Owner Name:</label>
            <input value="{{ $public_data->owner_name }}" type="text" id="owner_name" name="owner_name" class="form-control form-control-sm" placeholder="Owner Number">
          </div>
          <div class="form-group">
            <label for="owner_contact_number">Owner Contact Number:</label>
            <input value="{{ $public_data->owner_contact_number }}" type="text" id="owner_contact_number" name="owner_contact_number" class="form-control form-control-sm" placeholder="Owner Contact Number">
          </div>
          <div class="form-group">
              <label for="mobile_number">Mobile Number:</label>
              @foreach ($public_data->mobile_number as $mobile_number)
              <div class="form-group">
                  <input value="{{ $mobile_number->mobile_number }}" required type="text" id="mobile_number" name="mobile_number[]" class="form-control form-control-sm" placeholder="Mobile Number">
              </div>
            @endforeach
          </div>
          <div id="multipleNumbers"></div>
          <button type="button" id="addPhoneNumber" class="btn btn-sm btn-success">
            <i class="fas fa-fw fa-plus"></i>
          </button>
          <div class="form-group">
              <label for="whatsapp_number">Whatsapp Number:</label>
              @foreach ($public_data->whatsapp_number as $whatsapp_number)
              <div class="form-group">
                  <input value="{{ $whatsapp_number->whatsapp_number }}" type="text" id="whatsapp_number" name="whatsapp_number[]" class="form-control form-control-sm" placeholder="Whatsapp Number">
              </div>
              @endforeach
            </div>    
          
          <div id="whatsappNumbers"></div>
          <button type="button" id="addWhatsappNumber" class="btn btn-sm btn-success">
            <i class="fas fa-fw fa-plus"></i>
          </button>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
            <label for="tel_number">Tel. Number:</label>
            <input value="{{ $public_data->tel_number }}" type="text" id="tel_number" name="tel_number" class="form-control form-control-sm" placeholder="Tel. Number">
            @error('tel_number')
                <div class="alert-danger">
                    <strong>Error!</strong> {{ $message }}</li>
                </div>
            @enderror
            </div>
            <div class="form-group">
                <label for="email_id">Email ID:</label>
                @foreach ($public_data->email_id as $email)
                <div class="form-group">
                    <input value="{{ $email->email_id }}" type="email" id="email_id" name="email_id[]" class="form-control form-control-sm" placeholder="Email ID">
                </div>
                @endforeach
            </div>
            <div id="multipleEmails"></div>
            <button type="button" class="btn btn-sm btn-success" id="addEmail">
              <i class="fas fa-fw fa-plus"></i>
            </button>
            <div class="form-group">
                <label for="address">Address:</label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input value="{{ $public_data->address_line_1 }}" type="text" required name="address_line_1" id="addressLine1" class="form-control" placeholder="Address Line 1">
                        </div>
                        @error('address_line_1')
                            <div class="alert-danger">
                                <strong>Error!</strong> {{ $message }}</li>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input value="{{ $public_data->address_line_2 }}" type="text" name="address_line_2" id="address_line_2" class="form-control" placeholder="Address Line 2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input value="{{ $public_data->district }}" type="text" required name="district" id="district" class="form-control" placeholder="District">
                        </div>
                        @error('district')
                            <div class="alert-danger">
                                <strong>Error!</strong> {{ $message }}</li>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input value="{{ $public_data->pin_code }}" type="text" required name="pin_code" id="pin_code" class="form-control" placeholder="PIN Code">
                        </div>
                        @error('pin_code')
                            <div class="alert-danger">
                                <strong>Error!</strong> {{ $message }}</li>
                            </div>
                        @enderror
                    </div>
                </div>
                @error('address')
                <div class="alert-danger">
                    <strong>Error!</strong> {{ $message }}</li>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="website">Website:</label>
                <input value="{{ $public_data->website }}" type="text" id="website" name="website" class="form-control form-control-sm" placeholder="Website">
                @error('website')
                    <div class="alert-danger">
                        <strong>Error!</strong> {{ $message }}</li>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="source">Source:</label>
                <input value="{{ $public_data->source }}" required type="text" id="source" name="source" class="form-control form-control-sm" placeholder="Owner Contact Number">
                @error('source')
                    <div class="alert-danger">
                        <strong>Error!</strong> {{ $message }}</li>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gst_number">GST Number:</label>
                <input value="{{ $public_data->gst_number }}" type="text" id="gst_number" name="gst_number" class="form-control form-control-sm" placeholder="GST Number">
                @error('gst_number')
                    <div class="alert-danger">
                        <strong>Error!</strong> {{ $message }}</li>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="remark">Remark:</label>
                <textarea name="remark" id="remark" cols="10" rows="2" class="form-control" placeholder="Remark">{{ $public_data->remark }}</textarea>
            </div>
            <p class="address mb-5">
                <button class="btn btn-success btn-sm">Save</button>
            </p>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
    <script>
      let toBeAppended = "<div class='form-group'><input required type='text' name='mobile_number[]' class='form-control form-control-sm' placeholder='Mobile Number'></div>";
      $('button#addPhoneNumber').on('click', function(){
        $('div#multipleNumbers').append(toBeAppended);
      });

      let toBeAppended2 = "<div class='form-group'><input type='text' name='whatsapp_number[]' class='form-control form-control-sm' placeholder='Whatsapp Number'></div>";
      $('button#addWhatsappNumber').on('click', function(){
        $('div#whatsappNumbers').append(toBeAppended2);
      });

      let emailAppend = "<div class='form-group'><input type='text' name='email_id[]' class='form-control form-control-sm' placeholder='Email ID'></div>";
      $('button#addEmail').on('click', function(){
        $('div#multipleEmails').append(emailAppend);
      });
    </script>
@endsection