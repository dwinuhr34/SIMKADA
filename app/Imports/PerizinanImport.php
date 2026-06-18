<?php

namespace App\Imports;

use App\Models\Perizinan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PerizinanImport implements ToCollection, WithHeadingRow
{
    public $jumlah = 0;
    protected $importHistoryId;

    public function __construct($importHistoryId)
    {
        $this->importHistoryId = $importHistoryId;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (empty($row['nomor_izin']) && empty($row['nama_perusahaan'])) {
                continue;
            }

            Perizinan::create([
                'import_history_id' => $this->importHistoryId,
                'nomor_izin' => $row['nomor_izin'] ?? '',
                'nomor_skrd' => $row['nomor_skrd'] ?? '',
                'tanggal_izin' => $this->formatTanggal($row['tanggal_izin'] ?? null),
                'nama_perusahaan' => $row['nama_perusahaan'] ?? '',
                'alamat' => $row['alamat'] ?? '',
                'jenis_izin' => $row['jenis_izin'] ?? '',
                'lokasi_perusahaan' => $row['lokasi_perusahaan'] ?? '',
                'masa_berlaku_izin' => $this->formatTanggal($row['masa_berlaku_izin'] ?? null),
                'tanggal_bayar' => $this->formatTanggal($row['tanggal_bayar'] ?? null),
                'keterangan' => $row['keterangan'] ?? '',
            ]);

            $this->jumlah++;
        }
    }

    private function formatTanggal($value)
    {
        if (empty($value)) {
            return null;
        }

        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value)->format('Y-m-d');
        }

        return date('Y-m-d', strtotime($value));
    }
}