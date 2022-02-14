<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaketController extends Controller
{
    public function index()
    {
        dd(auth()->user());
        return view('page.package.index');
    }

    public function getData()
    {
        $packages = Paket::get();
        return response()->json($packages);
    }

    public function store(Request $r)
    {
        Paket::create([
            'id_outlet' => Auth()->user()
        ]);
        return response()->json(array('success' => true));
    }

    public function update(Request $r)
    {
        Paket::find($r->id)->update($r->all());
        return response()->json(array('success' => true));
    }

    public function destroy(Request $r)
    {
        Paket::findOrFail($r->id)->delete();
        return response()->json(array('success' => true));
    }
}
