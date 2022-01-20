<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::get();
        return view('page.member.index', compact('members'));
    }

    public function store(Request $r)
    {
        Member::create($r->all());
        return back();
    }

    public function update(Request $r)
    {
        Member::find($r->id)->update($r->all());
        return back();
    }

    public function destroy(Request $r)
    {
        Member::findOrFail($r->id)->delete();
        return back();
    }
}
