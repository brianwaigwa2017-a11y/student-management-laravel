<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'course_code',
        'course_name',
        'description',
        'duration',
        'status',
    ];
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function feeStructures()
    {
        return $this->hasMany(FeeStructure::class);
    }
}
