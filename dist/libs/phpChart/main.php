<?php

error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR); // Отображаем только критические ошибки

class PHPChart {

 public $img;

 public function setSize($w, $h) {
  $this->$img = imagecreatetruecolor($h, $w);
 }

 public function setBkg($r, $g, $b) {
  $bkgColor = imagecolorallocate($this->$img, $r, $g, $b);
  imagefill($this->$img, 0, 0, $bkgColor);
 }

 public function setName($nm, $x) {
  $textColor = imagecolorallocate($this->$img, 100, 100, 100);
  imagettftext($this->$img, 20, 0, $x, 50, $textColor, $_SERVER["DOCUMENT_ROOT"].'/dist/libs/phpChart/fonts/Arial.ttf', $nm);
 }

 public function setD($x1, $y1, $x2, $y2) {
  $lineColor = imagecolorallocate($this->$img, 100, 100, 100);
  imageline($this->$img, $x1, $y1, $x2, $y2, $lineColor);
 }

 public function setPHD($max, $price, $lx, $mx, $nx, $ly) {
  $priceColor = imagecolorallocate($this->$img, 100, 100, 100);
  $lineColor = imagecolorallocate($this->$img, 200, 200, 200);
  $lastY = $ly;
  $sx = $lx + $mx;
  $lc = $max / $price;
  for($i = 0; $i <= $lc; $i++) {
   $y = $lastY - $price; 
   imageline($this->$img, $lx, $y, $sx, $y, $priceColor);
   imageline($this->$img, $sx, $y, $nx, $y, $lineColor);
   $lastY = $lastY - $price;
  }
 }

 public function setVHD($max, $price, $lx, $my, $ny) {
  $priceColor = imagecolorallocate($this->$img, 100, 100, 100);
  $lastX = $lx;
  $lc = $max / $price;
  for($i = 0; $i <= $lc; $i++) {
   $x = $lastX + $price; 
   imageline($this->$img, $x, $my, $x, $ny, $priceColor);
   $lastX = $lastX + $price;
  }
 }

 public function setPHDC($price, $r, $ly, $nx, ...$text) {
  $textColor = imagecolorallocate($this->$img, 100, 100, 100);
  $lastY = $ly;
  foreach($text as $t) {
   $y = $lastY - $price;
   imagettftext($this->$img, 10, $r, $nx, $y, $textColor, $_SERVER["DOCUMENT_ROOT"].'/dist/libs/phpChart/fonts/Arial.ttf', $t);
   $lastY = $lastY - $price;
  }
 }

 public function setVHDC($price, $r, $lx, $ny, ...$text) {
  $textColor = imagecolorallocate($this->$img, 100, 100, 100);
  $lastX = $lx;
  foreach($text as $t) {
   $x = $lastX + $price;
   imagettftext($this->$img, 10, $r, $x, $ny, $textColor, $_SERVER["DOCUMENT_ROOT"].'/dist/libs/phpChart/fonts/Arial.ttf', $t);
   $lastX = $lastX + $price;
  }
 }

 public function drawChartLine($x1, $y1, $x2, $y2) {
  $lineColor = imagecolorallocate($this->$img, 100, 100, 255);
  imageline($this->$img, $x1, $y1, $x2, $y2, $lineColor);
 }

 // Вывод изображения в браузер
 public function output($type) {
  if ($type == 'png') {
   header('Content-Type: image/png');
   imagepng($this->$img);
  } elseif ($type == 'gif') {
   header('Content-Type: image/gif');
   imagegif($this->$img);
  } elseif ($type == 'avif') {
   header('Content-Type: image/avif');
   imageavif($this->$img);
  } elseif ($type == 'bmp') {
   header('Content-Type: image/bmp');
   imagebmp($this->$img);
  } elseif ($type == 'jpeg') {
   header('Content-Type: image/jpeg');
   imagejpeg($this->$img);
  } elseif ($type == 'jpg') {
   header('Content-Type: image/jpeg');
   imagejpeg($this->$img);
  } else {
   header('Content-Type: text/html');
   exit('<p style="font-family: system-ui;"><b>PHPChart Error</b>: unknown value of the <code>$type</code> parameter in the <code>output()</code> function.</p><hr noshade color="silver"><p style="font-family: system-ui;">On line <b>'.debug_backtrace()[0]['line'].'</b> in <code>'.debug_backtrace()[0]['file'].'</code> file.</p>');
  }
 }

}

?>