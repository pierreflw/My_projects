<?php
function sprite_generator($tab)
{
	$finalFile = "Sprite";
 	$array = array();
	$namePicture = array();
	$widthPicture = array();
	$heightPicture = array();
	$path = getcwd();
	$height = 0;
	$width = 0;
	$decalage = 0;
	foreach($tab as $value)
		{
			$size = getimagesize($value);//info sur les images + changement de nom des images pour crée le css
			if($height < $size[1])
				$height = $size[1];
			$width += $size[0];
			$value = basename($value);
			$value = str_replace(".png", "", $value);
			$value = str_replace("-", "", $value);
			$value = "sprite-".$value;
			array_push($namePicture, $value);
			array_push($widthPicture, $size[0]);
			array_push($heightPicture, $size[1]);
		}
		array_push($array,$namePicture);
		array_push($array,$widthPicture);
		array_push($array,$heightPicture);
		$img = imagecreatetruecolor($width, $height); //création d'une image vide avec les dimensions de toutes les images additionner
		foreach($tab as  $value)//rajout des images une par une dans l'image vide
		{
			$picture = imagecreatefrompng($value);
			$size = getimagesize($value);
			imagecopyresampled($img , $picture, $decalage , 0 , 0 , 0 , $size[0] , $size[1] , $size[0] , $size[1]);
			$decalage += $size[0];
		}
	imagepng($img,$path.'/CssGenerator/'.$finalFile.".png");//envoi de l'image dans le dossier
	return $array;
}
function css_generator($tab)
{
	$NewFile = "Sprite";
	$path = getcwd();
	$background = 0;
	$column = 0;
	$cmpt = 0;
	$css = ".sprite {
	display: inline-block;
	background: url('".$NewFile.".png') no-repeat;\n}\n";
	for($i=0;$i<count($tab[0]);$i++)//creation du css pour chaque images
	{
		$css .= ".".$tab[0][$i]."{\n\tbackground-position: -".$background."px;\n\twidth: ".$tab[1][$i]."px;\n\theight: ".$tab[2][$i]."px;\n}\n";
		$background += $tab[1][$i];
	}
	$mycss = fopen($path.'/CssGenerator/'.'style.css', 'w');
	fwrite($mycss, $css);
	fclose($mycss);
}
function img_path($argv)
{
	if(count($argv) <2){
			die("veuillez rentrer un chemin! \n");
	}

	if(!is_dir($argv[1])){
		die("Dossier invalide\n");
	}
	else{
		$folder = $argv[1];
	}

	if($handle = opendir($folder)){
		while(($currentFile = readdir($handle)) !== FALSE)
		{
			if($currentFile != "." && $currentFile != "..")
				if(exif_imagetype($folder."/".$currentFile) == IMAGETYPE_PNG)//si le $currentFile est un type PNG on le met dans le tableau
					$results_array[] = $folder."/".$currentFile;
		}
	}
	closedir($handle);
	$path = getcwd();
	if(count($results_array) < 2)
		die("Besoin de 2 photos minimum\n");
	if(!file_exists($path.'/CssGenerator'))
			mkdir($path.'/CssGenerator', 0777, true);
	return $results_array;
}
//function options($argv)
//{
	//$option= (count($argv) < 3) ? die("Options non detéctées.\n");
//}
css_generator(sprite_generator(img_path($argv)));
?>
