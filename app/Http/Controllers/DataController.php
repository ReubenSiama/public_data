<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\public_data_request as PublicRequest;
use App\PublicData;
use App\MobileNumber;
use App\WhatsappNumber;
use App\EmailId;

class DataController extends Controller
{
    public function getData()
    {
        $public_data = PublicData::get();
        return view('public-data', compact('public_data'));
    }
    public function addData(PublicRequest $request)
    {
        $public_data = new PublicData;
        $public_data->added_by = 1;
        $public_data->business_type_id = $request->business_type_id;
        $public_data->company_firm_name = $request->company_firm_name;
        $public_data->contact_person_name = $request->contact_person_name;
        $public_data->contact_person_number = $request->contact_person_number;
        $public_data->owner_name = $request->owner_name;
        $public_data->owner_contact_number = $request->owner_contact_number;
        $public_data->tel_number = $request->tel_number;
        $public_data->address_line_1 = $request->address_line_1;
        $public_data->address_line_2 = $request->address_line_2;
        $public_data->district = $request->district;
        $public_data->pin_code = $request->pin_code;
        $public_data->website = $request->website;
        $public_data->source = $request->source;
        $public_data->gst_number = $request->gst_number;
        $public_data->remark = $request->remark;
        $public_data->save();

        foreach($request->mobile_number as $mobile){
            $mobileNumber = new MobileNumber;
            $mobileNumber->public_data_id = $public_data->id;
            $mobileNumber->mobile_number = $mobile;
            $mobileNumber->save();
        }
        foreach($request->whatsapp_number as $whatsapp){
            $whatsappNumber = new WhatsappNumber;
            $whatsappNumber->public_data_id = $public_data->id;
            $whatsappNumber->whatsapp_number = $whatsapp;
            $whatsappNumber->save();
        }
        foreach($request->email_id as $email){
            $email_id = new EmailId;
            $email_id->public_data_id = $public_data->id;
            $email_id->email_id = $email;
            $email_id->save();
        }
        return back()->withSuccess('Data Added Successfully');
    }
}
