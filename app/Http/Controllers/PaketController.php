<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $packages = Paket::get();
        return view('page.package.index', compact('packages'));
    }

    public function store(Request $r)
    {
        Paket::create($r->all());
        return back()->with('status', 'New Data Package Added!');
    }

    public function update(Request $r)
    {
        Paket::find($r->id)->update($r->all());
        return back()->with('status', 'Edit Data Package Successfull');
    }

    public function destroy(Request $r)
    {
        Paket::findOrFail($r->id)->delete();
        return back()->with('status', 'Delete Data Package Success');
    }
}
