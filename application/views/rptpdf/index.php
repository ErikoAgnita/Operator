<?php
class PDF extends FPDF
{
	//Page header
	function Header()
	{
                $this->setFont('Arial','B',10);
                $this->setFillColor(255,255,255);
                $this->cell(100,6,"Kotak Saran Website",0,0,'L',1); 
                $this->cell(80,6,"Printed date : " . date('d/m/Y'),0,1,'R',1); 
                $this->Image(base_url().'assets/images/balaikota_salatiga.jpg', 10, 25,'20','20','jpeg');
                
                $this->Ln(12);
                $this->setFont('helvetica','',14);
               // $this->setFillColor(255,255,255);
                $this->cell(25,6,'',0,0,'C',0); 
                $this->cell(100,6,'Kotak Saran Website',0,1,'L',1); 
                $this->cell(25,6,'',0,0,'C',0); 
                $this->cell(100,6,"Pemerintah Kota Salatiga",0,1,'L',1); 
                $this->cell(25,6,'',0,0,'C',0); 
                $this->cell(100,6,'http://saran.salatiga.go.id',0,1,'L',1); 
                $this->Line(10,$this->GetY()+2,200,$this->GetY()+2);
                $this->SetLineWidth(1);
                $this->Line(10,$this->GetY()+1,200,$this->GetY()+1);
                
                
	}
 
	function Content($data)
	{    
        foreach ($data as $key) {
            
            $this->Ln(5);
            $this->setFont('courier','',12);
            $this->setFillColor(255,255,255);
            $this->cell(10);
                $this->cell(25,10,'Waktu',0,0,'L',1);
                $this->cell(50,10,$key->tanggal_saran,0,1,'L',1);
            $this->cell(10);
                $this->cell(25,10,'Nama',0,0,'L',1);
                $this->cell(50,10,$key->nama,0,1,'L',1);
            $this->cell(10);
                $this->cell(25,10,'Telepon',0,0,'L',1);
                $this->cell(50,10,$key->telepon,0,1,'L',1);
            $this->cell(10);
                $this->cell(25,10,'Email',0,0,'L',1);
                $this->cell(50,10,$key->email,0,1,'L',1);
            $this->cell(10);
                $this->cell(25,10,'Alamat',0,0,'L',1);
                $this->cell(50,10,$key->alamat,0,1,'L',1);
            $this->cell(10);
                $this->cell(25,10,'Pesan',0,0,'L',1);
                $this->MultiCell(150,7,$key->saran,0,1,'L',1);
        }
	}
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),210,$this->GetY());
		//Arial italic 9
        $this->SetFont('Arial','I',9);
                $this->Cell(0,10,'ID_ ' . date('Y'),0,0,'L');
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data);
$pdf->Output();