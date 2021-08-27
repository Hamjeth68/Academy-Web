<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursePurchased extends Model
{

    protected $table = 'course_purchased';
    protected $id = 'id';
    protected $fillable = [
        'student_id',
        'product_id',
        'reference_number',
    ];
    protected $dates = ['created_at', 'updated_at'];



    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

