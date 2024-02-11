<?php

header('HTTP/1.1 200 OK');

require_once $_SERVER["DOCUMENT_ROOT"].'/dist/libs/phpChart/main.php';

$pc = new PHPChart();

$pc->setSize(800, 600);

$pc->setBkg(245, 245, 255);

$pc->setName('Кол-во посетителей', 275);

$pc->setD(50, 550, 50, 75);

$pc->setD(50, 550, 750, 550);

$pc->setPHD(400, 50, 30, 20, 750, 550);

$pc->setVHD(700, 50, 50, 575, 550);

$pc->setPHDC(50, 0, 550, 5, '0', '10', '50', '100', '100', '5000', '10000', '50000', '100000');

$pc->setVHDC(50, 20, 40, 600, '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00');

$pc->drawChartLine(50, 500, 200, 350);
$pc->drawChartLine(200, 350, 250, 350);
$pc->drawChartLine(250, 350, 300, 250);
$pc->drawChartLine(300, 250, 400, 200);
$pc->drawChartLine(400, 200, 450, 150);
$pc->drawChartLine(450, 150, 600, 100);
$pc->drawChartLine(600, 100, 750, 250);

$pc->output('png');

?>