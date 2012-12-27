<?
/*
 * PHP Clock
 */

    Header("Content-type: image/gif");
    Header("Expires: ".gmdate("D, d M Y H:i:s")." GMT");

    $th = ((date(U) % 43200)+3600) / (4320/2*PI());
    $tm = date(U) % 3600  / (360 /2*PI());
    $ts = date(U) % 60    / (6   /2*PI());

    $sirka = 150; // width
    $vyska = 150; // height

    $stredx = $sirka/2; //center x
    $stredy = $vyska/2; //center y
	
	$txt = "";
	
    $r = min($sirka, $vyska)/2-(min($sirka, $vyska)/10);

    $img = imagecreate($sirka,$vyska);
    $color = imagecolorallocate($img, 58, 110, 165);
    imagefill ($img, 0, 0, $color);

    $color = imagecolorallocate($img, 255, 255, 255);

    $hx = $stredx + $r*0.60 * sin($th);
    $hy = $stredy - $r*0.60 * cos($th);
    $mx = $stredx + $r * sin($tm);
    $my = $stredy - $r * cos($tm);
    $sx = $stredx + $r * sin($ts);
    $sy = $stredy - $r * cos($ts);

    $colorcopy = imagecolorallocate($img, 202, 253, 04);
    $colorcopy2= imagecolorallocate($img, 163, 193, 224);

    //imagestring ($img, 4, $sirka *.3, $vyska*.3, date("H:i:s"), $colorcopy);
	imagestring ($img, 4, $sirka *.3, $vyska*.3, $txt, $colorcopy);

    for($i=0; $i<12; $i++)
    {
        $bod = $i / (1.2/2*PI());

        $bodx = $stredx + ($r*1.0) * sin($bod);
        $body = $stredy - ($r*1.0) * cos($bod);

        Imagesetpixel($img, $bodx, $body, $color);
    }

    imageline($img, $stredx-2, $stredy, $hx-2, $hy, $colorcopy);
    imageline($img, $stredx+2, $stredy, $hx+2, $hy, $colorcopy);
    imageline($img, $stredx-1, $stredy, $hx-1, $hy, $colorcopy2);
    imageline($img, $stredx  , $stredy, $hx  , $hy, $color);
    imageline($img, $stredx+1, $stredy, $hx+1, $hy, $colorcopy2);

    imageline($img, $stredx-1, $stredy, $mx-1, $my, $colorcopy);
    imageline($img, $stredx+1, $stredy, $mx+1, $my, $colorcopy);
    imageline($img, $stredx, $stredy, $mx, $my, $color);

    imageline($img, $stredx, $stredy, $sx, $sy, $color);

    imagegif($img);
?> 