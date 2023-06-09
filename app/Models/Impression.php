<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Impression extends Model
{
    protected $fillable = [
        'doc_id',
        'cli_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/impressions/'.$this->getKey());
    }
}
