<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportExcel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_reservasi', 'MR');
		$this->load->model('Mod_tamu', 'MT');
    }

    public function ExportReservasi()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$style_col = [
			'font'			=> ['bold' => true],
			'alignment'		=> [
				'horizontal'	=> \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				'vertical'		=> \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
			],
			'borders'		=> [
				'top'		=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
				'right'		=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
				'bottom'	=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
				'left'		=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
			]
		];

		$style_row = [
			'alignment'	=> [
				'vertical'	=> \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
			],
			'borders'	=> [
				'top'		=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
				'right'		=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
				'bottom'	=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
				'left'		=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
			]
		];

		$sheet->setCellValue('A1', "DATA RESERVASI");
		$sheet->mergeCells('A1:E1');
		$sheet->getStyle('A1')->getFont()->setBold(true);

		$sheet->setCellValue('A3', "NO");
		$sheet->setCellValue('B3', "NIK");
		$sheet->setCellValue('C3', "NAMA USER");
		$sheet->setCellValue('D3', "JENIS KELAMIN");
		$sheet->setCellValue('E3', "ALAMAT");
		$sheet->setCellValue('F3', "NOMOR TELEPON");
        $sheet->setCellValue('G3', "NAMA KAMAR");
        $sheet->setCellValue('H3', "TANGGAL CHECKIN");
        $sheet->setCellValue('I3', "TANGGAL CHECKOUT");
        $sheet->setCellValue('J3', "JUMLAH KAMAR");
        $sheet->setCellValue('K3', "LAMA");
        $sheet->setCellValue('L3', "STATUS");

		$sheet->getStyle('A3')->applyFromArray($style_col);
		$sheet->getStyle('B3')->applyFromArray($style_col);
		$sheet->getStyle('C3')->applyFromArray($style_col);
		$sheet->getStyle('D3')->applyFromArray($style_col);
		$sheet->getStyle('E3')->applyFromArray($style_col);
		$sheet->getStyle('F3')->applyFromArray($style_col);
        $sheet->getStyle('G3')->applyFromArray($style_col);
        $sheet->getStyle('H3')->applyFromArray($style_col);
        $sheet->getStyle('I3')->applyFromArray($style_col);
        $sheet->getStyle('J3')->applyFromArray($style_col);
        $sheet->getStyle('K3')->applyFromArray($style_col);
        $sheet->getStyle('L3')->applyFromArray($style_col);

		$reservasi = $this->MR->DetailReservasi();

		$no = 1;
		$numrow = 4;
		foreach($reservasi as $data) {
			$sheet->setCellValue('A'.$numrow, $no);
			$sheet->setCellValue('B'.$numrow, $data->nik);
			$sheet->setCellValue('C'.$numrow, $data->nama);
			$sheet->setCellValue('D'.$numrow, $data->jeniskelamin);
			$sheet->setCellValue('E'.$numrow, $data->alamat);
			$sheet->setCellValue('F'.$numrow, $data->telepon);
            $sheet->setCellValue('G'.$numrow, $data->namakamar);
            $sheet->setCellValue('H'.$numrow, $data->startdate);
            $sheet->setCellValue('I'.$numrow, $data->enddate);
            $sheet->setCellValue('J'.$numrow, $data->qtykamar);
            $sheet->setCellValue('K'.$numrow, $data->lama);
            $sheet->setCellValue('L'.$numrow, $data->status);

			$sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('J'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('K'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('L'.$numrow)->applyFromArray($style_row);

			$no++;
			$numrow++;
		}

		$sheet->getColumnDimension('A')->setWidth(5);
		$sheet->getColumnDimension('B')->setWidth(15);
		$sheet->getColumnDimension('C')->setWidth(35);
		$sheet->getColumnDimension('D')->setWidth(20);
		$sheet->getColumnDimension('E')->setWidth(100);
		$sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(25);
        $sheet->getColumnDimension('I')->setWidth(25);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(15);
        $sheet->getColumnDimension('L')->setWidth(25);

		$sheet->getDefaultRowDimension()->setRowHeight(-1);

		$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

		$sheet->setTitle("LAPORAN DATA RESERVASI");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="DataReservasi.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}

	public function ExportTamu()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$style_col = [
			'font'			=> ['bold' => true],
			'alignment'		=> [
				'horizontal'	=> \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				'vertical'		=> \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
			],
			'borders'		=> [
				'top'		=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
				'right'		=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
				'bottom'	=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
				'left'		=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
			]
		];

		$style_row = [
			'alignment'	=> [
				'vertical'	=> \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
			],
			'borders'	=> [
				'top'		=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
				'right'		=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
				'bottom'	=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
				'left'		=> ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
			]
		];

		$sheet->setCellValue('A1', "DATA Tamu");
		$sheet->mergeCells('A1:E1');
		$sheet->getStyle('A1')->getFont()->setBold(true);

		$sheet->setCellValue('A3', "NO");
		$sheet->setCellValue('B3', "NIK");
		$sheet->setCellValue('C3', "NAMA Tamu");
		$sheet->setCellValue('D3', "JENIS KELAMIN");
		$sheet->setCellValue('E3', "ALAMAT");
		$sheet->setCellValue('F3', "NOMOR TELEPON");
        $sheet->setCellValue('G3', "USERNAME");
        $sheet->setCellValue('H3', "STATUS MEMBER");

		$sheet->getStyle('A3')->applyFromArray($style_col);
		$sheet->getStyle('B3')->applyFromArray($style_col);
		$sheet->getStyle('C3')->applyFromArray($style_col);
		$sheet->getStyle('D3')->applyFromArray($style_col);
		$sheet->getStyle('E3')->applyFromArray($style_col);
		$sheet->getStyle('F3')->applyFromArray($style_col);
        $sheet->getStyle('G3')->applyFromArray($style_col);
        $sheet->getStyle('H3')->applyFromArray($style_col);

		$tamu = $this->MT->AmbilTamu();

		$no = 1;
		$numrow = 4;
		foreach($tamu as $data) {
			$sheet->setCellValue('A'.$numrow, $no);
			$sheet->setCellValue('B'.$numrow, $data->nik);
			$sheet->setCellValue('C'.$numrow, $data->nama);
			$sheet->setCellValue('D'.$numrow, $data->jeniskelamin);
			$sheet->setCellValue('E'.$numrow, $data->alamat);
			$sheet->setCellValue('F'.$numrow, $data->telepon);
            $sheet->setCellValue('G'.$numrow, $data->username);
            $sheet->setCellValue('H'.$numrow, $data->ismember);

			$sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);

			$no++;
			$numrow++;
		}

		$sheet->getColumnDimension('A')->setWidth(5);
		$sheet->getColumnDimension('B')->setWidth(15);
		$sheet->getColumnDimension('C')->setWidth(35);
		$sheet->getColumnDimension('D')->setWidth(20);
		$sheet->getColumnDimension('E')->setWidth(100);
		$sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(25);

		$sheet->getDefaultRowDimension()->setRowHeight(-1);

		$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

		$sheet->setTitle("LAPORAN DATA TAMU");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="DataTamu.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}
}