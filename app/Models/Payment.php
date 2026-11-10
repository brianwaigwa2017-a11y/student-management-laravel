<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'student_id',
        'fee_structure_id',
        'amount',
        'payment_method',
        'transaction_reference',
        'payment_date',
        'received_by',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function feeStructure()
    {
        return $this->belongsTo(FeeStructure::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'received_by');
    }
}
