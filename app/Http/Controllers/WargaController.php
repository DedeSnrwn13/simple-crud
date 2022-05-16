<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

class WargaController extends Controller
{
    public function index()
    {
        $wargas = Warga::all();

        return view('warga.index', compact('wargas'));
    }

    public function create()
    {
        return view('warga.create');
    }

    public function store(Request $request)
    {
        Warga::create($request->except('_token', 'submit'));

        return redirect('/');
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);

        return view('warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $warga->update($request->except('_token', 'submit'));

        return redirect('/');
    }

    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();
        return redirect()->back();
    }
}
