<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    //
    protected $fillable = [
        'name',
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
