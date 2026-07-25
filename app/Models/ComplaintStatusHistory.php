<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintStatusHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_id',
        'user_id',
        'complaint_status',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
