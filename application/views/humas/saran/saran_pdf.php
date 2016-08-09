<?php
class PDF extends FPDF
{
	//Page header
	function Header()
	{
        $this->Ln(5);
        //$this->Image(base_url().'assets/images/logo-bw.jpg', 15, 15,'20','25','jpeg');

        $this->Ln(-7);
        $this->setFont('times','B',20);
        $this->setFillColor(255,255,255);
            $this->cell(7,6,'',0,0,'C',0); 
            $this->cell(100,6,'Kotak Saran Website',0,1,'L',1); 
        $this->setFont('times','B',16);
            $this->cell(7,6,'',0,0,'C',0); 
            $this->cell(100,6,"Pemerintah Kota Salatiga",0,1,'L',1); 
        $this->setFont('times','B',12);
            $this->cell(7,6,'',0,0,'C',0); 
            $this->cell(100,6,'http://saran.salatiga.go.id/',0,1,'L',1); 
        
        $this->Line(10,$this->GetY()+7,200,$this->GetY()+7);
        $this->SetLineWidth(1);
        $this->Line(10,$this->GetY()+6,200,$this->GetY()+6);
        $this->Ln(15);
    }
 
	function Content($data)
	{    
        foreach ($data->result() as $key) {
            //$this->Ln(13);
            $this->setFont('courier','',12);
            $this->setFillColor(255,255,255);
            $this->cell(10);
                $this->cell(25,10,'Waktu',0,0,'L',1);
                $this->cell(130,10,':  '.date("d M Y  H:i:s",strtotime($key->tanggal_saran)).' WIB',0,0,'L',1);
                $this->setFont('courier','I',10);
                    $this->cell(0,10,'ID_'.$key->id_saran,1,1,'C',1);
            $this->setFont('courier','',12);
            $this->cell(10);
                $this->cell(25,10,'Nama',0,0,'L',1);
                $this->cell(50,10,':  '.$key->nama,0,1,'L',1);
            $this->cell(10);
                $this->cell(25,10,'Telepon',0,0,'L',1);
                $this->cell(50,10,':  '.$key->telepon,0,1,'L',1);
            $this->cell(10);
                $this->cell(25,10,'Email',0,0,'L',1);
                $this->cell(50,10,':  '.$key->email,0,1,'L',1);
            $this->cell(10);
                $this->cell(25,10,'Alamat',0,0,'L',1);
                $this->cell(50,10,':  '.$key->alamat,0,1,'L',1);
            $this->cell(10);
                $this->cell(25,10,'Pesan',0,0,'L',1);
                $this->cell(50,10,':',0,1,'L',1);
            $this->cell(20);
                $this->MultiCell(160,7,$key->saran,0,1,'L',1);
        }
	}
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-25);
        $this->SetFont('TIMES','I',9);
        $this->Cell(0,10,'*Isi pesan sesuai masukan dari masyarakat melalui website',0,1,'R');
		//buat garis horizontal
		$this->Line(10,$this->GetY(),200,$this->GetY());
		//Arial italic 9
        $this->SetFont('Arial','I',9);
                $this->Cell(0,10,'Tanggal Cetak ' .date('d/m/Y'),0,0,'L');
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

$pdf = new PDF('P','mm','A4');
$pdf->SetTopMargin(20);
$pdf->SetTitle('Kotak Saran Pemkot Salatiga');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data);

$pdf->Output();

?>