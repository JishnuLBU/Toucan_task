<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;

class MembersExport implements FromQuery
{
    protected $schoolId;

    public function __construct($schoolId = null)
    {
        $this->schoolId = $schoolId;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Member::select('members.id', 'first_name', 'email_address')
            ->join('school_mappings', 'school_mappings.member_id', '=', 'members.id');
        if ($this->schoolId != 0) {
            $query->where('school_id', $this->schoolId);
        }
        return $query;
    }
}
