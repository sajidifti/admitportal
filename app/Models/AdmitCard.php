<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmitCard extends Model
{
    protected $fillable = [
        'name_bn',
        'father_name_bn',
        'mother_name_bn',
        'roll',
        'school',
        'exam_center_bn',
        'exam_time',
        'exam_date',
        'class',
    ];
}
