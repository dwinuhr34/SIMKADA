<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class PerizinanExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{
    protected $perizinans;

    public function __construct($perizinans)
    {
        $this->perizinans = $perizinans;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nomor Izin',
            'Nomor SKRD',
            'Tanggal Izin',
            'Nama Perusahaan',
            'Alamat',
            'Jenis Izin',
            'Lokasi Perusahaan',
            'Masa Berlaku Izin',
            'Tanggal Bayar',
            'Keterangan',
        ];
    }

    public function collection()
    {
        return $this->perizinans->map(function ($data, $index) {
            return [
                $index + 1,
                $data->nomor_izin,
                $data->nomor_skrd,
                $data->tanggal_izin,
                $data->nama_perusahaan,
                $data->alamat,
                $data->jenis_izin,
                $data->lokasi_perusahaan,
                $data->masa_berlaku_izin,
                $data->tanggal_bayar,
                $data->keterangan,
            ];
        });
    }

    public function columnWidths(): array
    {
        return [
            'A' => 6,
            'B' => 18,
            'C' => 18,
            'D' => 16,
            'E' => 28,
            'F' => 35,
            'G' => 18,
            'H' => 35,
            'I' => 18,
            'J' => 18,
            'K' => 40,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();
        $lastColumn = $sheet->getHighestColumn();

        $sheet->getStyle("A1:{$lastColumn}1")
            ->getFont()
            ->setBold(true);

        $sheet->getStyle("A1:{$lastColumn}{$lastRow}")
            ->getAlignment()
            ->setWrapText(true)
            ->setVertical('top');

        $sheet->getStyle("A1:{$lastColumn}{$lastRow}")
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        return [];
    }
}