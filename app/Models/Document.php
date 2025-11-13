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
}
