<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurProductInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'ourproduct_id',
        'first_name',
        'last_name',
        'email',
        'mobile_no',
        'address',
        'company_name',
        'designation_name',
        'message',
    ];

    public function ourproduct()
    {
        return $this->belongsTo(OurProduct::class)->withTrashed();
    }
}
