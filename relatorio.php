<?php
require ('fpdf/fpdf.php');

$pdf = new FPDF('P', 'cm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$conexao = new PDO('mysql:host=localhost;dbname=relatoriophp', 'root', '');

$sql = $conexao->prepare("SELECT * FROM produtos ORDER BY quantidade DESC");
$sql->execute();
$pdf->SetFillColor(224, 224, 224);
$pdf->Cell(3, 1, 'Código', 1, 0, 'C', true);
$pdf->Cell(5, 1, 'Nome', 1, 0, 'C', true);
$pdf->Cell(3, 1, 'Quantidade', 1, 0, 'C', true);
$pdf->Cell(5, 1, 'Data', 1, 1, 'C', true);
foreach($sql as $resultado){
    $pdf->Cell(3, 1, $resultado['codigo'], 1, 0, 'C');
    $pdf->Cell(5, 1, $resultado['nome_produto'], 1, 0, 'C');
    $pdf->Cell(3, 1, $resultado['quantidade'], 1, 0, 'C');
    $pdf->Cell(5, 1, $resultado['data_compra'], 1, 1, 'C');
   
}
$pdf->Output();

?>