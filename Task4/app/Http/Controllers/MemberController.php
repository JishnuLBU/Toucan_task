<?php

namespace App\Http\Controllers;

use App\Http\Requests\Members\MemberIndexRequest;
use App\Http\Requests\Members\MemberCreateRequest;
use App\Http\Requests\Members\MemberExcelRequest;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\School;
use App\Models\SchoolMapping;
use DataTables;
use App\Exports\MembersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = DB::table('school_mappings')
            ->join('schools', 'school_mappings.school_id', '=', 'schools.id')
            ->select(DB::raw('COUNT(*) as cnt'), 'schools.name')
            ->groupBy('schools.name', 'school_mappings.school_id')
            ->get();

        return view('members.index', compact('schools'));
    }
    public function getMembers(Request $request)
    {
        $query = Member::select('members.id', 'first_name', 'email_address')
            ->join('school_mappings', 'school_mappings.member_id', '=', 'members.id');
        $selectedSchool = $request->input();
        if ($request->school && $request->school != 'Select a School') {
            $query->where('school_mappings.school_id', $request->school);
        }
        return DataTables::of($query)->make(true);
    }

    public function create()
    {
        $schools = School::get();
        return view('members.create', ['schools' => $schools]);
    }
    public function store(MemberCreateRequest $request)
    {
        $addMember = Member::create([
            'first_name' => $request->first_name,
            'email_address' => $request->email_address,
        ]);
        $memberId = $addMember->id;
        $schoolIds = $request->school;
        foreach ($schoolIds as $schoolId) {
            SchoolMapping::create([
                'member_id' => $memberId,
                'school_id' => $schoolId,
            ]);
        }
        return redirect()->route('members.index');
    }

    public function export(MemberExcelRequest $request)
    {
        $schoolId = $request->input('school');
        if ($schoolId != 0) {
            $export =  new MembersExport($schoolId);
            return Excel::download($export, 'members.xlsx');
        } else {
            return Excel::download(new MembersExport, 'members.xlsx');
        }
    }
}
