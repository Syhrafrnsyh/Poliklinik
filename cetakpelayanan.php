<?php
include('src/config.php');
session_start();
require('fpdf184/fpdf.php');
date_default_timezone_set('Asia/Jakarta');
$currentTime = date( 'd F Y h:i:s A', time () );
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);
//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(130 ,5,'POLIKLINIK',0,0);
$pdf->Cell(59 ,5,'APPOINTMENT',0,1);//end of line
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);
$pdf->Cell(130 ,5,'Jl. Gatot Subroto No.Kav 021',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line
$pdf->Cell(130 ,5,'Jakarta, Indonesia, 12950',0,0);

$query=mysqli_query($con,"select * from book_dokter where id = '".$_GET['id']."'");
        while($row=mysqli_fetch_array($query)){
$dok = $row["id_dokter"];
$sql2 = mysqli_query($con, "SELECT * FROM dokter WHERE id='$dok' ");
$row2 = mysqli_fetch_array($sql2);
$pasien = $row["id_pasien"];
$sql3 = mysqli_query($con, "SELECT * FROM pasien WHERE id='$pasien' ");
$row3 = mysqli_fetch_array($sql3);

$pdf->Cell(25 ,5,'Tanggal  :',0,0);
$pdf->Cell(34 ,5,$row['tanggal_book'].'  '.$row['jam_book'],0,1);//end of line
$pdf->Cell(130 ,5,'Telepon (021) 29672555',0,0);
$pdf->Cell(25 ,5,'Nomor    :',0,0);
$pdf->Cell(34 ,5,$row['id'],0,1);//end of line
$pdf->Cell(130 ,5,'Fax (0411) 11223344',0,0);
$pdf->Cell(25 ,5,'Dokter    :',0,0);
$pdf->Cell(34 ,5,$row2['nama'],0,1);//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
//billing address
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100 ,5,'DETAILS PASIEN CHECK',0,1);//end of line
$pdf->Cell(100 ,5,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Nama',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row3['nama'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line
$birth = new DateTime($row3['lahir']);
$today = new DateTime();
$diff = $today->diff($birth);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Umur',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$diff->y.'th',0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Kelamin',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row3['kelamin'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Alamat',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row3['alamat'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Telepon',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row3['telepon'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'___________________________________________________________________________________________________',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,'',0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Diagnosis',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,'',0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line
$pdf->SetFont('Arial','I',11);
$pdf->Cell(45 ,5,$row['diagnosis'],0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,'',0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line
$pdf->MultiCell(120 ,5,'',0,1);
//make a dummy empty cell as a vertical spacer
//$pdf->Cell(189 ,10,'',0,1);
//end of line
# untuk menuliskan nama bulan dengan format Indonesia
$bln_list = array(
  '01' => 'Januari',
  '02' => 'Februari',
  '03' => 'Maret',
  '04' => 'April',
  '05' => 'Mei',
  '06' => 'Juni',
  '07' => 'Juli',
  '08' => 'Agustus',
  '09' => 'September',
  '10' => 'Oktober',
  '11' => 'November',
  '12' => 'Desember'
);
# footer
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
//$pdf->SetFont('Arial','',9);
$pdf->SetX(120);
$pdf->MultiCell(95,10,'Jakarta, '.date('d').' '.$bln_list[date('m')].' '.date('Y'),0,'C');
$pdf->SetX(120);
$pdf->MultiCell(95,0,'Dokter',0,'C');
$pdf->SetX(120);
$pdf->MultiCell(95,20, '',0,'C');
$gambar=$row2['ttd'];
$pdf->Image($gambar,140,140,55,30);
$pdf->SetX(120);
//$pdf->MultiCell(95,1, 'CAHYA SUKIDIN, S.KOM',0,'C');
$pdf->SetX(120);
//$pdf->MultiCell(95,1, '_________________________',0,'C');
$pdf->SetX(120);
$pdf->MultiCell(95,8,$row2['nama'],0,'C');
$pdf->Ln();
//$fullname = $row['techName'];
$dokter = $row2['nama'];
$pasien = $row3['nama'];
}
$pdf_file_name = $dokter.'  '.$pasien.'  '.date('d F Y h:i:s A').".pdf";
$pdf->Output($pdf_file_name,'D');
//$pdf->Output('F', 'C:/xampp/htdocs/Poliklinik/TTD' . $pdf_file_name, true); // to parent/parent folder
//$pdf->Output($pdf_file_name,'F');
//$pdf->Output('F', '../../' . $filename, true); // to parent/parent folder
//$filename="/home/user/public_html/test.pdf";
//$pdf->Output($filename,'F');
//$pdf->Output("Laporan Check.pdf","I");
?>