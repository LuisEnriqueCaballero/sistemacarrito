<?php
//Cargar la libreria DOMPDF QUE HEMOS INSTALADO
require_once "../../Libreria/dompdf/dompdf-0.5.1//dompdf.php";
use Dompdf\Dompdf;
$id=$_GET['id_venta'];
// INTRODUCION AL HTML DE PRUEBA
function file_get_contents_curl($url){
    $ch=curl_init();
    
    curl_setopt($ch,CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data=curl_exec($ch);
    curl_close($ch);

    return $data;

}

$html=file_get_contents("http://localhost/sistemacarrito/views/ventas/crearReeportPDF.php?id_venta=".$id);

//Instanciamos un objeto de la clase DOMPDF

$pdf= new DOMPDF();

//definimos el tamaño y orientacion del papel que queremos

$pdf->set_paper("letter","portrait");

//cargamos el contenido pdf

$pdf->load_html(utf8_decode($html));

//Renerizamos el documento PDF

$pdf->render();

//Enviamos el fichero PDF al navegador
$pdf->stream('reporteVenta.pdf');
?>