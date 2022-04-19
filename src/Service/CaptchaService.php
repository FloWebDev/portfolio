<?php

class CaptchaService
{
    public static function createCaptcha()
    {
        // Enregistrement du captcha en session
        $captchaCode = mt_rand(1000, 9999);
        $_SESSION['captcha'] = $captchaCode;

        // Création de l'image
        $img = imagecreate(100, 30);

        // Lien vers le fichier font
        $font = __DIR__ . '/../../public/assets/fonts/destroy.ttf';

        // RGB colors
        $bg        = imagecolorallocate($img, 189, 93, 56); // automatiquement la couleur de fond car 1ère couleur déclarée
        $textcolor = imagecolorallocate($img, 255, 255, 255);

        self::imagettftext_cr($img, 10, 0, 50, 12, $textcolor, $font, $captchaCode);

        ob_start();
        imagejpeg($img, null, 100);
        imagedestroy($img);
        $output = ob_get_clean();


        return base64_encode($output);
    }

    // https://www.php.net/manual/fr/function.imagettftext.php#48938
    // Put center-rotated ttf-text into image
    // Same signature as imagettftext();
    private static function imagettftext_cr($img, $size, $angle, $x, $y, $color, $fontfile, $text)
    {
        // retrieve boundingbox
        $bbox = imagettfbbox($size, $angle, $fontfile, $text);
        
        // calculate deviation
        $dx = ($bbox[2] - $bbox[0]) / 2.0 - ($bbox[2] - $bbox[4]) / 2.0;         // deviation left-right
        $dy = ($bbox[3] - $bbox[1]) / 2.0 + ($bbox[7] - $bbox[1]) / 2.0;        // deviation top-bottom
        
        // new pivotpoint
        $px = (int) ($x - $dx);
        $py = (int) ($y - $dy);
        // var_dump($x, $y, $py);
        imagettftext($img, $size, $angle, $px, $py, $color, $fontfile, $text);
    }
}
