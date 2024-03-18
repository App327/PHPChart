<?php

header('HTTP/1.1 200 OK');

require_once $_SERVER["DOCUMENT_ROOT"].'/dist/libs/phpChart/main.php';

$pc = new PHPChart();

$pc->setSize(700, 500);

$pc->setBkg(255, 255, 255);

$pc->setName('Изменение температуры', 200);

$pc->setD(50, 450, 50, 75);

$pc->setD(50, 450, 650, 450);

$pc->setPHD(300, 50, 30, 20, 650, 450);

$pc->setVHD(500, 50, 50, 450, 475);

$pc->setPHDC(50, 0, 450, 10, '0°C', '1°C', '2°C', '3°C', '4°C', '5°C', '6°C');

$pc->setVHDC(50, 0, 50, 490, '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00');

$pc->drawChartLine(50, 400, 150, 350);
$pc->drawChartLine(150, 350, 250, 350);
$pc->drawChartLine(250, 350, 300, 250);
$pc->drawChartLine(300, 250, 400, 200);
$pc->drawChartLine(400, 200, 600, 100);
$pc->drawChartLine(600, 100, 650, 100);

$pc->output('png');

?>
