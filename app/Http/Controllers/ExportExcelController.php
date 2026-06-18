<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImportHistory;
use App\Imports\PerizinanImport;
use App\Exports\PerizinanExport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class ExportExcelController extends Controller
{
    public function index()
    {
        $histories = ImportHistory::latest()->get();

        return view('export.index', compact('histories'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $history = ImportHistory::create([
            'nama_file' => $request->file('file')->getClientOriginalName(),
            'jumlah_data' => 0,
            'status' => 'Diproses',
        ]);

        try {
            $import = new PerizinanImport($history->id);

            Excel::import($import, $request->file('file'));

            if ($import->jumlah > 0) {
                $history->update([
                    'jumlah_data' => $import->jumlah,
                    'status' => 'Berhasil',
                ]);

                return redirect('/export-excel')
                    ->with('success', 'Data Excel berhasil diupload. Jumlah data masuk: ' . $import->jumlah);
            } else {
                $history->update([
                    'jumlah_data' => 0,
                    'status' => 'Gagal',
                ]);

                return redirect('/export-excel')
                    ->with('error', 'File Excel tidak memenuhi kriteria atau data tidak sesuai format.');
            }

        } catch (Exception $e) {
            $history->update([
                'jumlah_data' => 0,
                'status' => 'Gagal',
            ]);

            return redirect('/export-excel')
                ->with('error', 'File Excel gagal diupload karena format data tidak sesuai.');
        }
    }

    public function destroy($id)
    {
        $history = ImportHistory::findOrFail($id);
        $history->delete();

        return redirect('/export-excel')
            ->with('success', 'Riwayat import dan data terkait berhasil dihapus.');
    }

    public function download()
    {
        return Excel::download(new PerizinanExport, 'data_perizinan_simkada.xlsx');
    }
}