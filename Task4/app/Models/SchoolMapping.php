<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolMapping extends Model
{
    use HasFactory;
    protected $fillable = ['member_id', 'school_id'];

}
