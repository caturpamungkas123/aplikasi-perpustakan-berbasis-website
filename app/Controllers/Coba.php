<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;

class Coba extends BaseController
{
    public function index()
    {
        $qrCode = new QrCode('Catur Pamungkas');
        $qrCode->setSize(300);
        $qrCode->setMargin(10);

        // Set advanced options
        $qrCode->setWriterByName('png');
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
        $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
        $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
        $qrCode->setLogoPath(__DIR__ . '../../../vendor/endroid/qr-code/assets/images/symfony.png');
        $qrCode->setLogoSize(100, 100);
        $qrCode->setValidateResult(false);

        // Round block sizes to improve readability and make the blocks sharper in pixel based outputs (like png).
        // There are three approaches:
        $qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_MARGIN); // The size of the qr code is shrinked, if necessary, but the size of the final image remains unchanged due to additional margin being added (default)
        $qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_ENLARGE); // The size of the qr code and the final image is enlarged, if necessary
        $qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_SHRINK); // The size of the qr code and the final image is shrinked, if necessary

        // Set additional writer options (SvgWriter example)
        $qrCode->setWriterOptions(['exclude_xml_declaration' => true]);

        // Directly output the QR code
        header('Content-Type: ' . $qrCode->getContentType());

        // Save it to a file

        $qrCode->writeFile(__DIR__ . '../../../public/img/anggota/qrcode/qrcode.png');

        // Generate a data URI to include image data inline (i.e. inside an <img> tag)
        // $dataUri = $qrCode->writeDataUri();
        // echo '<img src="' . $dataUri . '">';
        return redirect()->to('/');
    }

    public function auth()
    {
        return view('auth/login');
    }
}
