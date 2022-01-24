<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        $outlets = Outlet::get();
        return view('page.outlet.index', compact('outlets'));
    }

    public function store(Request $r)
    {
        Outlet::create($r->all());
        return back()->with('status', 'New Data Outlet Added!');
    }

    public function update(Request $r)
    {
        Outlet::find($r->id)->update($r->all());
        return back()->with('status', 'Edit Data Member Successfull');
    }

    public function destroy(Request $r)
    {
        Outlet::findOrFail($r->id)->delete();
        return back()->with('status', 'Delete Data Member Success');
    }
}
