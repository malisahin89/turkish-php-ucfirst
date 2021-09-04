<?php
// https://www.linkedin.com/in/muhammetalisahin/
// bilisimarsivi.com

function ilk_harf($gelen){
	$gelen = mb_substr($gelen , 0 , 1);
	$gelen = str_replace("ğ","Ğ",$gelen);
	$gelen = str_replace("ü","Ü",$gelen);
	$gelen = str_replace("ş","Ş",$gelen);
	$gelen = str_replace("i","İ",$gelen);
	$gelen = str_replace("ö","Ö",$gelen);
	$gelen = str_replace("ç","Ç",$gelen);
	$gelen = str_replace("ı","I",$gelen);
	return $gelen;
}
function orta($gelen){
	$gelen = strtolower($gelen);
	$gelen = str_replace("Ğ","ğ",$gelen);
	$gelen = str_replace("Ü","ü",$gelen);
	$gelen = str_replace("Ş","ş",$gelen);
	$gelen = str_replace("İ","i",$gelen);
	$gelen = str_replace("Ö","ö",$gelen);
	$gelen = str_replace("Ç","ç",$gelen);
	$gelen = str_replace("I","ı",$gelen);
	return $gelen;
}
function baslik($metin){
	$metin=preg_replace('/\s\s+/',' ',$metin);
	
	$dots = array("+",",",".","-","'","\"","&","!","?",":",";","#","~","=","/","$","£","^","(",")","_","<",">");
	$dot = array("+  ",",  ",".  ","-  ","'  ","\"  ","&  ","!  ","?  ",":  ",";  ","#  ","~  ","=  ","/  ","$  ","£  ","^  ","(  ",")  ","_  ","<  ",">  ");
	$metin = str_replace($dots, $dot, $metin);
	
	$dizi = explode (" ",$metin);
	$giden=[];
	foreach($dizi as $diz){
		$diz=orta($diz);
		if($diz!="ve"&&$diz!="veya"&&$diz!="ise"&&$diz!="ki"&&$diz!="vs"&&$diz!="de"&&$diz!="da"&&$diz!="ile"&&$diz!="yahut"&&$diz!="ya"){
		array_push($giden, ilk_harf($diz).orta(mb_substr($diz , 1)));
		}else{
			array_push($giden, orta($diz));
		}
	}
	$giden= implode(" ", $giden);
	echo str_replace($dot, $dots, $giden);
}

baslik('ĞĞĞ ÜÜÜ ŞŞŞ İİİ ÖÖÖ ÇÇÇ III ğğğ üüü şşş iii ççç ööö ııı');
echo '<hr>';
baslik('İSTANBUL KARŞIYAKA BİZDEN SORULUR BİLİŞİMARŞİVİ.COM - istanbul karşıyaka bizden sorulur bilişimarşivi.com');
echo '<hr>';
baslik('"mali", veya ve hay yaşa ya da ise /aa/ dlsşal');
?>
