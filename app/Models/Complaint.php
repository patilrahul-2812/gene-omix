<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'complaint_no',
        'user_id',
        'determinationof_vigilance_angle_id',
        'complaint_description',
        'remarks',
        'complaint_document',
        'complaint_status',
        'last_updated_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function determinationofvigilanceangle()
    {
        return $this->belongsTo(DeterminationofVigilanceAngle::class, 'determinationof_vigilance_angle_id', 'id');
    }

    public function complaint_status_history()
    {
        return $this->hasMany(ComplaintStatusHistory::class);
    }
}
