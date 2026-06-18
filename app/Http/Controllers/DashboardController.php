<?php 

namespace App\Http\Controllers;

use App\Models\Perizinan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // cek apakah sudah login
        if (!session('login')) {
            return redirect('/');
        }

        $tahunList = Perizinan::whereNotNull('tanggal_izin')
            ->get()
            ->map(function ($data) {
                return date('Y', strtotime($data->tanggal_izin));
            })
            ->unique()
            ->sortDesc()
            ->values();

        if ($tahunList->isEmpty()) {
            $tahunList = collect([date('Y')]);
        }

        $tahunDipilih = request('tahun', $tahunList->first());

        $totalData = Perizinan::count();

        $totalHariIni = Perizinan::whereDate('created_at', Carbon::today())->count();

        $dataTerbaru = Perizinan::latest()->take(5)->get();

        $rekapBulanan = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $rekapBulanan[] = Perizinan::whereMonth('tanggal_izin', $bulan)
                ->whereYear('tanggal_izin', $tahunDipilih)
                ->count();
        }

        return view('dashboard.index', compact(
            'totalData',
            'totalHariIni',
            'dataTerbaru',
            'rekapBulanan',
            'tahunDipilih',
            'tahunList'
        ));
    }
}