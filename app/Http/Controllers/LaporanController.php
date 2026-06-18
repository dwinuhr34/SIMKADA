<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use App\Exports\PerizinanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $perizinans = $this->filterData($request)->latest()->get();

        $tahunList = Perizinan::whereNotNull('tanggal_izin')
            ->get()
            ->map(function ($data) {
                return date('Y', strtotime($data->tanggal_izin));
            })
            ->unique()
            ->sortDesc()
            ->values();

        return view('laporan.index', compact('perizinans', 'tahunList'));
    }

    public function excel(Request $request)
    {
        $perizinans = $this->filterData($request)->latest()->get();

        return Excel::download(
            new PerizinanExport($perizinans),
            'laporan_perizinan.xlsx'
        );
    }

    public function print(Request $request)
    {
        $perizinans = $this->filterData($request)->latest()->get();

        return view('laporan.print', compact('perizinans'));
    }

    private function filterData(Request $request)
    {
        $query = Perizinan::query();

        if ($request->tahun) {
            $query->whereYear('tanggal_izin', $request->tahun);
        }

        if ($request->bulan) {
            $query->whereMonth('tanggal_izin', $request->bulan);
        }

        if ($request->cari) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_perusahaan', 'like', '%' . $request->cari . '%')
                  ->orWhere('jenis_izin', 'like', '%' . $request->cari . '%')
                  ->orWhere('nomor_izin', 'like', '%' . $request->cari . '%')
                  ->orWhere('nomor_skrd', 'like', '%' . $request->cari . '%');
            });
        }

        return $query;
    }
}