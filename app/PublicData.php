<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicData extends Model
{
    public function BusinessType()
    {
        return $this->belongsTo(BusinessType::class);
    }

    public function mobile_number()
    {
        return $this->hasMany(MobileNumber::class);
    }
    
    public function whatsapp_number()
    {
        return $this->hasMany(WhatsappNumber::class);
    }

    public function email_id()
    {
        return $this->hasMany(EmailId::class);
    }
}
