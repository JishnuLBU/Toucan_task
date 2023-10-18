<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    public $timestamp = false;

    protected $fillable = ['id', 'name'];

    public function schoolMembers()
    {
        return $this->hasMany(Member::class, 'school_id', 'id');
    }

    public function getSchoolsByCoutryId($country_id)
    {
        return self::where('country_id', '=', $country_id)->get();
    }

}
