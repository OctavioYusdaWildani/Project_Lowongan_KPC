<?php

namespace App\Exports;

use App\Models\Ptk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class PtkExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithEvents
{
    public function collection()
    {
        return Ptk::all()->map(function ($ptk) {
            $status = 'Pending';
            if ($ptk->status_manager === 'rejected' || $ptk->status_director === 'rejected' || $ptk->status_hr === 'rejected') {
                $status = 'Rejected';
            } elseif ($ptk->is_published) {
                $status = 'Approved';
            }

            return [
                $ptk->unit,
                $ptk->jabatan,
                $ptk->departemen,
                $ptk->tanggal_permintaan,
                $ptk->Jumlah_tenaga_kerja,
                $ptk->jumlah_permintaan,
                $ptk->pendidikan,
                $ptk->jenis_kelamin,
                $ptk->usia,
                $ptk->status_karyawan,
                $ptk->pengalaman,
                $ptk->bahasa_asing,
                $ptk->keahlian_khusus,
                $ptk->Tes_buta_warna,
                $ptk->uraian_singkat,
                $ptk->permintaan,
                $ptk->alasan,
                $status
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Unit', 'Jabatan', 'Departemen', 'Tanggal Permintaan', 'Jumlah Tenaga Kerja',
            'Jumlah Permintaan', 'Pendidikan', 'Jenis Kelamin', 'Usia', 'Status Karyawan',
            'Pengalaman', 'Bahasa Asing', 'Keahlian Khusus', 'Tes Buta Warna',
            'Uraian Singkat', 'Permintaan', 'Alasan', 'Status'
        ];
    }
    // Header bold
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    // Lebar Kolom
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 15,
            'C' => 15,
            'D' => 20,
            'E' => 20,
            'F' => 20,
            'G' => 15,
            'H' => 15,
            'I' => 6,
            'J' => 15,
            'K' => 12,
            'L' => 15,
            'M' => 15,
            'N' => 15,
            'O' => 20,
            'P' => 15,
            'Q' => 15,
            'R' => 10,
        ];
    }

    // Tambahkan warna fill ke header
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $cellRange = 'A1:R1'; 
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()->setFillType('solid')->getStartColor()->setRGB('DCE6F1');
            },
        ];
    }
}
