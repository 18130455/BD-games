<?require_once 'connect.php'; ?>
<?require_once 'PHPExcel/Classes/PHPExcel.php';?>
<?require_once 'PHPExcel/Classes/PHPExcel/Writer/Excel5.php';?>
<?require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php'?>
<?
ob_end_clean();
$title = 'Таблица';
$array = array("№ п/п", "Название", "жанр", "разработчик", "издатель", "цифровой ключ", 
    "дата приобретения", "дата окончания", "url магазина");

$xls = new PHPExcel();
$xls->getProperties()->setTitle("Key");
$xls->getProperties()->setSubject("Key");
$xls->getProperties()->setCreator("Лосева Дарья");
$xls->getProperties()->setCompany("USATU");
$xls->getProperties()->setCategory("ПИ-319");
$xls->getProperties()->setKeywords("Key");
$xls->getProperties()->setCreated("16.11.2020");

$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setTitle('Key');
$sheet->getPageSetup()->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$sheet->getPageMargins()->setTop(1);
$sheet->getPageMargins()->setRight(0.75);
$sheet->getPageMargins()->setLeft(0.75);
$sheet->getPageMargins()->setBottom(1);

$sheet->setCellValueExplicit('A1', 'Ключи игр', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
$sheet->mergeCells('A1:H1');
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
for($i = 0; $i < count($array); $i++){
    $sheet->setCellValueByColumnAndRow($i, 2, $array[$i]);
    $sheet->getStyleByColumnAndRow($i, 2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
}
$j=3;
    $zapros = "SELECT 
    `id_game`, 
    `game_name`, 
    `game_genre`, 
    `game_raz`, 
    `game_izd`, 
    `key_num`, 
    DATE_FORMAT(`key_data_n`,' %d.%m.%Y') as r_date_n,  
    DATE_FORMAT(`key_data_o`,' %d.%m.%Y') as r_date_o ,
    `market_url` 
    FROM f0472780_loseva.key_info 
    ORDER BY id_game";
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу"); 
$result = mysqli_query($link, $zapros); 
while ($row=mysqli_fetch_array($result)){
for($i = 0; $i < count($row)/2; $i++){
        $text = $row[$i];
        $sheet->setCellValueByColumnAndRow($i, $j, $text);
        $sheet->getStyleByColumnAndRow($i, $j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);        
    }
$j++;
}
ob_end_clean();
header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
ob_end_clean();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Keys.xls");

$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');

$objWriter->save('php://output');
ob_end_clean();
?>
