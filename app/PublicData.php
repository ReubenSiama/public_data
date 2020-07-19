<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicData extends Model
{
    public function BusinessType()
    {
        return $this->belongsTo(BusinessType::class);
    }
}
