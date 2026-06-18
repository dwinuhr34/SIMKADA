<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use Illuminate\Http\Request;

class PerizinanController extends Controller
{
    public function index()
    {
        $perizinans = Perizinan::latest()->get();

        return view('perizinan.index', compact('perizinans'));
    }

    public function store(Request $request)
    {
        Perizinan::create($request->all());

        return redirect('/perizinan');
    }

    public function update(Request $request, $id)
    {
        $perizinan = Perizinan::findOrFail($id);

        $perizinan->update($request->all());

        return redirect('/perizinan');
    }

    public function destroy($id)
    {
        Perizinan::findOrFail($id)->delete();

        return redirect('/perizinan');
    }
}