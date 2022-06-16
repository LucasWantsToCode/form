<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'firstName',
        'lastName',
        'birthdate',
        'birthPlace',
        'email',
        'phone',
        'address',
        'studyLevel',
        'serie',
        'englishLevel',
        'training',
        'job_status',
        'enterprise',
        'piece_no',
        'piece_photo',
        'doc_bac',
        'other_doc',
        'resume',
        'id_type',
        'mention_bac'
    ];
}
