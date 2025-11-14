<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable = [
        'title',
        'client_name',
        'status',
        'uploaded_at',
        'reviewed_by',
        'reviewed_at',
    ]; 

    protected $casts = [
        'uploaded_at' => 'datetime',
        'reviewed_at' => 'datetime',
    ];

    protected $appends = ['is_reviewed'];

    public function getIsReviewedAttribute()
    {
        return $this->reviewed_at !== null;
    }
}
