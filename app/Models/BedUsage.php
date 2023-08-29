<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedUsage extends Model
{
    use HasFactory;

    protected $table        = 'bed_usages';
    protected $primaryKey   = 'bed_usage_id';
    protected $fillable     = ['bed_id','start_time', 'finish_time', 'service_time', 'service_status', 'additional_information', 'uploaded_by'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'uploaded_by');
    }

    public function bed()
    {
        return $this->belongsTo('App\Models\Bed', 'bed_id');
    }
}
