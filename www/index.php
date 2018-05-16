<?php
header("Content-Type: image/png");

//Créer une image
$imgWidth = 300;
$imgHeigh = 200;
$image = imagecreate(300, 200);

$background = imagecolorallocate($image, rand(0, 100),rand(0, 100),rand(0, 100));
$char = "abcdefghijklmonpqrstuvwxyz0123456789";
$char = str_shuffle($char);
$length = rand(-8,-6);
$captcha = substr($char, $length);
$fonts = glob("./fonts/*.ttf");

$x = rand(5, 10);
for($i=0;$i<strlen($captcha);$i++) {
    $size = rand(20, 25);
    $angle = rand(-20, 20);
    $y = rand(90, $imgHeigh-90);
    $color = imagecolorallocate($image, rand(150, 250),rand(150, 250),rand(150, 250));
    imagettftext($image, $size, $angle, $x, $y, $color, $fonts[rand(0, count($fonts)-1)], $captcha[$i]);
    $x += $size + rand(5, 10);
}

for($j=0;$j<rand(4,6);$j++) {
    $x1 = rand(0, $imgWidth);
    $x2 = rand(0, $imgWidth);
    $y1 = rand(0, $imgHeigh);
    $y2 = rand(0, $imgHeigh);
    $color = imagecolorallocate($image, rand(150, 250),rand(150, 250),rand(150, 250));
    
    switch(rand(0,2)) {
        case 0:
            imageline($image, $x1, $y1, $x2, $y2, $color);
            break;
        case 1:
            imagerectangle($image, $x1, $y1, $x2, $y2, $color);
            break;
        default:
            imageellipse($image, $x1, $y1, $x2, $y2, $color);
            break;
    }
}

//imagestring($image, 5, 25, 80, $captcha, $color);
 
//Couleur de fond aléatoire (attention à la lisibilité)
//Avoir un dossier avec 4 fonts en ttf
//Appliquer aléatoirement une police par caractère
//Attention le nom des polices doivent être dynamiques
//Ajouter des formes géométriques sur l'image
// -> nb aléatoire (max 10)
// -> couleur aléatoire (Attention à la lisibilité)
// -> position aléatoire
//Caractères avec des angles aléatoires
//Caractères couleurs aléatoires
//Caractères tailles aléatoires
//Caractères positions aléatoires
//Ajouter d'un lecteur audio des caractères pour Arthur
 
 
 
 
 
//Afficher l'image (ou l'enregistrer)
imagepng($image);
