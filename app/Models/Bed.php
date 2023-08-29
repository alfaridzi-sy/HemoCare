<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    protected $table        = 'beds';
    protected $primaryKey   = 'bed_id';
    protected $fillable     = ['status', 'bed_number', 'uploaded_by'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'uploaded_by');
    }

    public function bed_usage()
    {
        return $this->hasMany('App\Models\BedUsage', 'bed_id');
    }
}
