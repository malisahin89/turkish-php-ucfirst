<?php
// https://www.linkedin.com/in/muhammetalisahin/
// bilisimarsivi.com

function ilk_harf($gelen){
		$gelen=substr($gelen , 0 , 1);
		$degis=array("+",",",".","-","'","\"","&","!","?",":",";","#","~","=","/","$","£","^","(",")","_","<",">","A","B","C","Ç","D","E","F","G","Ğ","H","I","İ","J","K","L","M","N","O","Ö","P","R","S","Ş","T","U","Ü","V","Y","Z","Q","W","X","A","B","C","Ç","D","E","F","G","Ğ","H","I","İ","J","K","L","M","N","O","Ö","P","R","S","Ş","T","U","Ü","V","Y","Z","Q","W","X");
		$ara=array("+",",",".","-","'","\"","&","!","?",":",";","#","~","=","/","$","£","^","(",")","_","<",">","a","b","c","ç","d","e","f","g","ğ","h","ı","i","j","k","l","m","n","o","ö","p","r","s","ş","t","u","ü","v","y","z","q","w","x","A","B","C","Ç","D","E","F","G","Ğ","H","I","İ","J","K","L","M","N","O","Ö","P","R","S","Ş","T","U","Ü","V","Y","Z","Q","W","X");
		$gelen = str_replace($ara, $degis, $gelen);
		return $gelen;
}
function orta($gelen){
	$ara=array("+",",",".","-","'","\"","&","!","?",":",";","#","~","=","/","$","£","^","(",")","_","<",">","A","B","C","Ç","D","E","F","G","Ğ","H","I","İ","J","K","L","M","N","O","Ö","P","R","S","Ş","T","U","Ü","V","Y","Z","Q","W","X","a","b","c","ç","d","e","f","g","ğ","h","ı","i","j","k","l","m","n","o","ö","p","r","s","ş","t","u","ü","v","y","z","q","w","x");
	$degis=array("+",",",".","-","'","\"","&","!","?",":",";","#","~","=","/","$","£","^","(",")","_","<",">","a","b","c","ç","d","e","f","g","ğ","h","ı","i","j","k","l","m","n","o","ö","p","r","s","ş","t","u","ü","v","y","z","q","w","x","a","b","c","ç","d","e","f","g","ğ","h","ı","i","j","k","l","m","n","o","ö","p","r","s","ş","t","u","ü","v","y","z","q","w","x");
	$gelen = str_replace($ara, $degis, $gelen);
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
		if($diz!="ve"&&$diz!="veya"&&$diz!="ise"&&$diz!="ki"&&$diz!="vs"&&$diz!="de"&&$diz!="da"&&$diz!="ile"&&$diz!="yahut"){
		array_push($giden, ilk_harf($diz).orta(substr($diz , 1)));
		}else{
			array_push($giden, orta($diz));
		}
	}
	$giden= implode(" ", $giden);
	echo str_replace($dot, $dots, $giden);
}

baslik('İSTANBUL VE KARŞIYAKA VEYA BİZDEN SORULUR. BİLİŞİMARŞİVİ.COM - istanbul ve karşıyaka veya bizden sorulur. bilişimarsivi.com');
echo '<br>';
baslik('mali (aa) "naber dedi " ve veya -mali- /lll/ fgdfdgfdg ins:@sahinbey_');

?>

