<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Payreq extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Payreq_model');
    $this->load->model('../../suratkeluar/models/Suratkeluar_model');
    $this->load->model('../../prtype/models/Prtype_model');
    $this->load->model('../../payment/models/Payment_model');
  }

  public function index()
  {
    $data['payreq'] = $this->Payreq_model->getAll()->result();
    $this->render_backend('vw_payreq', $data);
  }

  public function create()
  {
    $data['suratkeluar'] = $this->Suratkeluar_model->getAll()->result();
    $data['prtype'] = $this->Prtype_model->getAll();
    $data['payment'] = $this->Payment_model->getAll();
    $this->render_backend('payreq/create', $data);
  }

  public function save()
  {
    $this->form_validation->set_rules('suratkeluar', 'Nomor Surat Keluar', 'required');
    $this->form_validation->set_rules('pr_date', 'Date', 'required');
    $this->form_validation->set_rules('req_name', 'Requestor Name', 'required');
    $this->form_validation->set_rules('pr_type', 'Payment Request Type', 'required');
    $this->form_validation->set_rules('rec_name', 'Receiver Name', 'required');
    $this->form_validation->set_rules('pay_date', 'Payment Date', 'required');
    $this->form_validation->set_rules('pay_method', 'Payment Method', 'required');

    // $this->form_validation->set_rules('bank', 'Bank Account', 'required');  /// tidak mandatory

    // ini page 2
    // $this->form_validation->set_rules('invoice', 'Invoice', 'required');
    // $this->form_validation->set_rules('po', 'PO Number', 'required');

    if ($this->form_validation->run() == true) {
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
      $this->form_validation->set_rules('quantity', 'Quantity', 'required');
      $this->form_validation->set_rules('amount', 'Amount', 'required');

      // if ($this->form_validation->run() == true) {
      $tgl = date('Y-m-d H:i:s');
      $data['idnmr_surat'] = $this->input->post('suratkeluar');
      $data['requestor_name'] = $this->session->userdata('nama');
      $data['pr_date'] = $tgl;
      $data['pr_type'] = $this->input->post('pr_type');
      $data['receiver_name'] = $this->input->post('rec_name');
      $data['due_date'] = $this->input->post('pay_date');
      $data['payment_method'] = $this->input->post('pay_method');
      $data['bank_number'] = $this->input->post('bank');
      $this->Payreq_model->save($data);
      // }

      $nmr_surat = $this->input->post('suratkeluar');
      $invoice = $this->input->post('invoice_number');
      $po = $this->input->post('po');
      $deskripsi = $this->input->post('deskripsi');
      $quantity = $this->input->post('quantity');
      $amount = $this->input->post('amount');

      $number = count($_POST['deskripsi']);
      for ($i = 0; $i < $number; $i++) {
        if (trim($_POST['deskripsi'][$i] != '')) {
          $data_pr['idnmr_surat'] = $nmr_surat;
          $data_pr['invoice_number'] = $invoice[$i];
          $data_pr['po_number'] = $po[$i];
          $data_pr['deskripsi'] = $deskripsi[$i];
          $data_pr['quantity'] = $quantity[$i];
          $data_pr['amount'] = $amount[$i];
          $this->Payreq_model->savedatapr($data_pr);
        }
      }
      $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
      redirect('payreq');
    } else {
      redirect('payreq/create');
    }
  }

  public function detail($idpayreq)
  {
    $data['payreq'] = $this->Payreq_model->getById($idpayreq);
    $this->render_backend('payreq/detail', $data);
  }

  public function edit($idpayreq)
  {
    $data['payreq'] = $this->Payreq_model->getById($idpayreq);
    $this->render_backend('payreq/edit', $data);
  }

  public function update()
  {
    $this->form_validation->set_rules('suratkeluar', 'Nomor Surat Keluar', 'required');
    $this->form_validation->set_rules('pr_date', 'Date', 'required');
    $this->form_validation->set_rules('req_name', 'Requestor Name', 'required');
    $this->form_validation->set_rules('pr_type', 'Payment Request Type', 'required');
    $this->form_validation->set_rules('rec_name', 'Receiver Name', 'required');
    $this->form_validation->set_rules('pay_date', 'Payment Date', 'required');
    $this->form_validation->set_rules('pay_method', 'Payment Method', 'required');

    // $this->form_validation->set_rules('bank', 'Bank Account', 'required');  /// tidak mandatory

    // ini page 2
    // $this->form_validation->set_rules('invoice', 'Invoice', 'required');
    // $this->form_validation->set_rules('po', 'PO Number', 'required');

    if ($this->form_validation->run() == true) {
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
      $this->form_validation->set_rules('quantity', 'Quantity', 'required');
      $this->form_validation->set_rules('amount', 'Amount', 'required');

      // if ($this->form_validation->run() == true) {
      $tgl = date('Y-m-d H:i:s');
      $idpayreq = $this->input->post('idpayreq');
      $data['idnmr_surat'] = $this->input->post('suratkeluar');
      $data['requestor_name'] = $this->session->userdata('nama');
      $data['pr_date'] = $tgl;
      $data['pr_type'] = $this->input->post('pr_type');
      $data['receiver_name'] = $this->input->post('rec_name');
      $data['due_date'] = $this->input->post('pay_date');
      $data['payment_method'] = $this->input->post('pay_method');
      $data['bank_number'] = $this->input->post('bank');
      $this->Payreq_model->update($data, $idpayreq);
      // }

      $nmr_surat = $this->input->post('suratkeluar');
      $invoice = $this->input->post('invoice_number');
      $po = $this->input->post('po');
      $deskripsi = $this->input->post('deskripsi');
      $quantity = $this->input->post('quantity');
      $amount = $this->input->post('amount');

      $number = count($_POST['deskripsi']);
      for ($i = 0; $i < $number; $i++) {
        if (trim($_POST['deskripsi'][$i] != '')) {
          $iddata_pr = $this->input->post('iddata_pr');
          $data_pr['idnmr_surat'] = $nmr_surat;
          $data_pr['invoice_number'] = $invoice[$i];
          $data_pr['po_number'] = $po[$i];
          $data_pr['deskripsi'] = $deskripsi[$i];
          $data_pr['quantity'] = $quantity[$i];
          $data_pr['amount'] = $amount[$i];
          $this->Payreq_model->updatedatapr($data_pr, $iddata_pr);
        }
      }
      $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
      redirect('payreq');
    } else {
      $idpayreq = $this->input->post('idpayreq');
      $data['payreq'] = $this->Payreq_model->getById($idpayreq);
      redirect('payreq/create');
    }
  }

  public function delete($idpayreq)
  {
    $this->Payreq_model->delete($idpayreq);
    redirect('payreq/deletedatapr');
  }

  public function deletedatapr($idnmr_surat)
  {
    $this->Payreq_model->deletedatapr($idnmr_surat);
    $this->session->set_flashdata('message', 'Data berhasil dihapus');
    redirect('payreq');
  }

  public function export($idpayreq)
  {
    //default style
    $spreadsheet = new Spreadsheet();
    $spreadsheet->getDefaultStyle()
      ->getFont()
      ->setName('Times New Roman');
    $sheet = $spreadsheet->getActiveSheet();


    // ambil data
    // all data
    $this->db->from('payreq');
    $this->db->where('idpayreq', $idpayreq);
    $this->db->join('nmr_surat', 'nmr_surat.idnmr_surat = payreq.idnmr_surat');
    $this->db->join('mst_pr', 'mst_pr.idmst_pr = payreq.pr_type');
    $this->db->join('mst_payment', 'mst_payment.idmst_payment = payreq.payment_method');
    $this->db->join('mst_kodesurat', 'mst_kodesurat.idmst_kodesurat=nmr_surat.id_jenis_surat');
    $this->db->join('mst_bulan', 'mst_bulan.idmst_bulan = nmr_surat.bulan');
    $this->db->join('project', 'project.id_project = nmr_surat.id_projek');
    $this->db->join('mst_pt', 'mst_pt.idmst_pt = project.id_pt');
    $this->db->join('mst_instansi', 'mst_instansi.idmst_instansi = project.id_instansi');
    $data = $this->db->get()->result();

    // only data pr
    $this->db->from('payreq');
    $this->db->where('idpayreq', $idpayreq);
    $this->db->join('data_pr', 'payreq.idnmr_surat = data_pr.idnmr_surat');
    $datapr = $this->db->get()->result();

    //tes
    // foreach ($totalAmount as $row) {
    // var_dump($totalAmount);
    // return;
    // }
    //end tes

    //// style array
    // $style_col = [
    //   'font' => ['bold' => true], // Set font nya jadi bold
    //   'alignment' => [
    //     'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
    //     'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    //   ],
    //   'borders' => [
    //     'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
    //     'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
    //     'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
    //     'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
    //   ]
    // ];
    // // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    // $style_row = [
    //   'alignment' => [
    //     'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    //   ],
    //   'borders' => [
    //     'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
    //     'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
    //     'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
    //     'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
    //   ]
    // ];

    $style_headline = [
      'font' => [
        'color' => [
          'rgb' => '000000'
        ],
        'bold' => true,
        'size' => 11
      ],
      'fill' => [
        'fillType' =>  \PhpOffice\PhpSpreadsheet\Style\fill::FILL_SOLID,
        'startColor' => [
          'rgb' => 'AEAAAA'
        ]
      ],
      'borders' => [
        'outline' =>
        [
          'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
        ],
        [
          'color' =>
          ['argb' => '00000000']
        ]
      ],
    ];

    $style_tabel_utama = [
      'font' => [
        'color' => [
          'rgb' => '000000'
        ],
        'bold' => true,
        'size' => 11
      ],
      'fill' => [
        'fillType' =>  \PhpOffice\PhpSpreadsheet\Style\fill::FILL_SOLID,
        'startColor' => [
          'rgb' => 'AEAAAA'
        ]
      ],
      'borders' => [
        'outline' =>
        [
          'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
        ],
        [
          'color' =>
          ['argb' => '00000000']
        ],
        [
          'alignment' =>
          [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
          ],
        ]
      ],
    ];

    $style_outline = [
      'borders' => [
        'outline' =>
        [
          'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
        ],
        [
          'color' =>
          ['argb' => '00000000']
        ],
      ],
    ];

    $style_outline_ttd_header = [
      'font' =>
      [
        'bold' => true
      ], // Set font nya jadi bold
      'alignment' =>
      [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ],
      'borders' => [
        'outline' =>
        [
          'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
        ],

      ],
    ];

    $style_outline_ttd = [
      'alignment' =>
      [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_BOTTOM // Set text jadi di tengah secara vertical (middle)
      ],
      'borders' => [
        'outline' =>
        [
          'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
        ],
      ],
    ];

    $style_outline_amount = [
      'borders' => [
        'outline' =>
        [
          'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
        ],
        [
          'color' =>
          ['argb' => '00000000']
        ],
        [
          'alignment' =>
          [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT
          ],
        ]
      ],
    ];

    $style_pt = [
      'font' => [
        'color' =>
        ['argb' => '002060'],
        'bold' => true,
        'size' => 18
      ]
    ];
    foreach ($data as $row) {
      $str = "$row->color";
      $color = explode("#", $str);
      foreach ($color as $warna) {
        // var_dump($warna);
        // return;
        $style_headcolor = [
          'font' => [
            'color' =>
            ['argb' => '000000'],
            'bold' => true,
            'size' => 20,
          ],
          'fill' => [
            'fillType' =>  \PhpOffice\PhpSpreadsheet\Style\fill::FILL_SOLID,
            'startColor' => [
              'rgb' => "$warna"
            ],
          ],
        ];
      }
    }


    //pengaplikasian style
    //style border luar
    $sheet->getStyle('B2:AM43')->applyFromArray($style_outline);

    // style table utama luar yang sampai bawah
    $sheet->getStyle('C23:AL37')->applyFromArray($style_outline);

    //style ttd
    $sheet->getStyle('H40:P40')->applyFromArray($style_outline_ttd_header);
    $sheet->getStyle('Q40:Y40')->applyFromArray($style_outline_ttd_header);
    $sheet->getStyle('Z40:AG40')->applyFromArray($style_outline_ttd_header);
    $sheet->getStyle('H41:P41')->applyFromArray($style_outline_ttd);
    $sheet->getStyle('Q41:Y41')->applyFromArray($style_outline_ttd);
    $sheet->getStyle('Z41:AG41')->applyFromArray($style_outline_ttd);
    $sheet->getRowDimension(41)->setRowHeight(100);

    //kanan atas 
    $sheet->getStyle('W5:AL6')->applyFromArray($style_headcolor);

    // perusahaan style
    $sheet->getStyle('C8')->applyFromArray($style_pt);

    //style border trancsaction detail
    $sheet->getStyle('C14:R14')->applyFromArray($style_headline);
    $sheet->getStyle('C15:R18')->applyFromArray($style_outline);

    // style border payment detail
    $sheet->getStyle('W14:AL14')->applyFromArray($style_headline);
    $sheet->getStyle('W15:AL18')->applyFromArray($style_outline);

    // style border table utama
    $sheet->getStyle('C22')->applyFromArray($style_tabel_utama);
    $sheet->getStyle('D22:I22')->applyFromArray($style_tabel_utama);
    $sheet->getStyle('J22:O22')->applyFromArray($style_tabel_utama);
    $sheet->getStyle('P22:AD22')->applyFromArray($style_tabel_utama);
    $sheet->getStyle('AE22:AF22')->applyFromArray($style_tabel_utama);
    $sheet->getStyle('AG22:AL22')->applyFromArray($style_tabel_utama);

    $sheet->getStyle('C23:C32')->applyFromArray($style_outline);
    $sheet->getStyle('D23:I32')->applyFromArray($style_outline);
    $sheet->getStyle('J23:O32')->applyFromArray($style_outline);
    $sheet->getStyle('P23:AD32')->applyFromArray($style_outline);
    $sheet->getStyle('AE23:AF32')->applyFromArray($style_outline);
    $sheet->getStyle('AG23:AL32')->applyFromArray($style_outline_amount);
    // printilan total
    $sheet->getStyle('AB33:Af33')->applyFromArray($style_headline);
    $sheet->getStyle('AB34:Af34')->applyFromArray($style_headline);
    $sheet->getStyle('AB35:Af35')->applyFromArray($style_headline);
    $sheet->getStyle('AG33:AL33')->applyFromArray($style_outline_amount);
    $sheet->getStyle('AG34:AL34')->applyFromArray($style_outline_amount);
    $sheet->getStyle('AG35:AL35')->applyFromArray($style_outline_amount);

    //  merge cell
    //kiri atas
    // tabel tansaksi detail
    $sheet->mergeCells('C14:R14');
    $sheet->mergeCells('C15:G15');
    $sheet->mergeCells('C16:G16');
    $sheet->mergeCells('C17:G17');
    $sheet->mergeCells('I15:R15');
    $sheet->mergeCells('I16:R16');
    $sheet->mergeCells('I17:R17');

    // kanan atas
    $sheet->mergeCells('W5:AL5');
    $sheet->mergeCells('W6:AL6');
    // form bawahnya
    $sheet->mergeCells('AD8:AL8');
    $sheet->mergeCells('AD9:AL9');
    $sheet->mergeCells('AD10:AL10');
    $sheet->mergeCells('AD11:AL11');
    // tabel payment detail
    $sheet->mergeCells('W14:AL14');
    $sheet->mergeCells('AD15:AL15');
    $sheet->mergeCells('AD16:AL16');
    $sheet->mergeCells('AD17:AL17');
    $sheet->mergeCells('AD18:AL18');
    // tabel utama
    $sheet->mergeCells('D22:I22');
    $sheet->mergeCells('J22:O22');
    $sheet->mergeCells('P22:AD22');
    $sheet->mergeCells('AE22:AF22');
    $sheet->mergeCells('AG22:AL22');
    // printilan total
    $sheet->mergeCells('AB33:Af33');
    $sheet->mergeCells('AB34:Af34');
    $sheet->mergeCells('AB35:Af35');
    $sheet->mergeCells('AH33:AL33');
    $sheet->mergeCells('AH34:AL34');
    $sheet->mergeCells('AH35:AL35');

    // ttd
    $sheet->mergeCells('H40:P40');
    $sheet->mergeCells('Q40:Y40');
    $sheet->mergeCells('Z40:AG40');
    $sheet->mergeCells('H41:P41');
    $sheet->mergeCells('Q41:Y41');
    $sheet->mergeCells('Z41:AG41');

    // isi cell statis
    // kiri
    // tabel transaksi detail
    $sheet->setCellValue('C14', 'Transaction Detail *');
    $sheet->setCellValue('C15', 'Project ID');
    $sheet->setCellValue('C16', 'Client Name');
    $sheet->setCellValue('C17', 'Project Name');
    $sheet->setCellValue('H15', ' : ');
    $sheet->setCellValue('H16', ' : ');
    $sheet->setCellValue('H17', ' : ');

    // kanan
    // nama payment requesition
    $sheet->setCellValue('W5', 'PAYMENT REQUISITION');
    // form bawahnya
    $sheet->setCellValue('W8', 'PR Date');
    $sheet->setCellValue('W9', 'PR Number');
    $sheet->setCellValue('W10', 'Requestor Name/DIvision');
    $sheet->setCellValue('W11', 'PR Type');
    $sheet->setCellValue('AC8', ' : ');
    $sheet->setCellValue('AC9', ' : ');
    $sheet->setCellValue('AC10', ' : ');
    $sheet->setCellValue('AC11', ' : ');
    //tabel payment detail
    $sheet->setCellValue('W14', 'Payment Detail');
    $sheet->setCellValue('W15', 'Payment Name');
    $sheet->setCellValue('W16', 'Payment Due Date');
    $sheet->setCellValue('W17', 'Payment Method');
    $sheet->setCellValue('W18', 'Bank Account Number');
    $sheet->setCellValue('AC14', ' : ');
    $sheet->setCellValue('AC15', ' : ');
    $sheet->setCellValue('AC16', ' : ');
    $sheet->setCellValue('AC17', ' : ');
    $sheet->setCellValue('AC18', ' : ');
    // tabel utama
    $sheet->setCellValue('C22', 'No');
    $sheet->setCellValue('D22', 'Invoice Number');
    $sheet->setCellValue('J22', 'Po Number');
    $sheet->setCellValue('P22', 'Description');
    $sheet->setCellValue('AE22', 'Qty');
    $sheet->setCellValue('AG22', 'Amount');
    //printilan total
    $sheet->setCellValue('AB33', 'Total');
    $sheet->setCellValue('AB34', 'VAT 10%');
    $sheet->setCellValue('AB35', 'Total Amount');
    $sheet->setCellValue('AG33', 'Rp');
    $sheet->setCellValue('AG34', 'Rp');
    $sheet->setCellValue('AG35', 'Rp');
    $sheet->setCellValue('AH33', '=SUM(AG23:AL32)');
    $sheet->setCellValue('AH34', '=AH33*10%');
    $sheet->setCellValue('AH35', '=SUM(AH33:AL34)');

    // tabel ttd
    $sheet->setCellValue('H40', 'Requested By');
    $sheet->setCellValue('Q40', 'Validated By');
    $sheet->setCellValue('Z40', 'Validated By');
    $sheet->setCellValue('Q41', 'Meylando');
    $sheet->setCellValue('Z41', 'Olan');

    foreach ($data as $row) { // Lakukan looping pada variabel payreq

      // kiri atas
      $sheet->setCellValue('C8', $row->nama_pt);   // nama perusahaan

      // tabel kiri
      $sheet->setCellValue('I15', $row->tahun_projek . '/' . $row->inisial_pt . '/' . $row->no_urut_projek);
      $sheet->setCellValue('I16', $row->inisial_instansi);
      $sheet->setCellValue('I17', $row->nama_projek);

      // kanan atas
      $sheet->setCellValue('W6', $row->nama_pr);

      // form kanan
      $sheet->setCellValue('AD8', $row->pr_date);
      $sheet->setCellValue('AD9', $row->no_urut_projek . '/' . $row->nomor_surat . '/' . $row->inisial_pt . '/' . $row->kode_surat . '/' . $row->inisial_instansi . '/' . $row->bulan_romawi . '/' . $row->tahun);
      $sheet->setCellValue('AD10', $row->requestor_name);
      $sheet->setCellValue('AD11', $row->nama_pr);

      // tabel payment detail
      $sheet->setCellValue('AD15', $row->receiver_name);
      $sheet->setCellValue('AD16', $row->due_date);
      $sheet->setCellValue('AD17', $row->nama_payment);
      $sheet->setCellValue('AD18', $row->bank_number ?? '');

      // tabel ttd
      $sheet->setCellValue('H41', $row->requestor_name);

      $namaexportnya = $row->no_urut_projek . '/' . $row->nomor_surat . '/' . $row->inisial_pt . '/' . $row->kode_surat . '/' . $row->inisial_instansi . '/' . $row->bulan_romawi . '/' . $row->tahun;
    }

    // isi tabel utama
    $no = 1;
    $numrow = 23;
    foreach ($datapr as $row) {
      $sheet->setCellValue('C' . $numrow, $no);
      $sheet->setCellValue('D' . $numrow, $row->invoice_number ?? '');
      $sheet->setCellValue('J' . $numrow, $row->po_number ?? '');
      $sheet->setCellValue('P' . $numrow, $row->deskripsi);
      $sheet->setCellValue('AE' . $numrow, $row->quantity ?? '');
      $sheet->setCellValue('AG' . $numrow, 'Rp');
      $sheet->setCellValue('AH' . $numrow,  $row->amount ?? '');

      // merge isi tabel utama
      $sheet->mergeCells('D' . $numrow . ':' . 'I' . $numrow);
      $sheet->mergeCells('J' . $numrow . ':' . 'O' . $numrow);
      $sheet->mergeCells('P' . $numrow . ':' . 'AD' . $numrow);
      $sheet->mergeCells('AE' . $numrow . ':' . 'AF' . $numrow);
      $sheet->mergeCells('AH' . $numrow . ':' . 'AL' . $numrow);

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Set width kolom
    $sheet->getColumnDimension('A')->setWidth(2); // Set width kolom A
    $sheet->getDefaultColumnDimension()->setWidth(4); // Set width kolom B

    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $sheet->getDefaultRowDimension()->setRowHeight(-1);

    // Set orientasi kertas jadi LANDSCAPE
    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $sheet->setTitle("Export Surat Payment Request");
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $namaexportnya . '".xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }
}
