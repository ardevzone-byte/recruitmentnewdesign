<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (file_exists(FCPATH . 'vendor/autoload.php')) {
    require_once FCPATH . 'vendor/autoload.php';
}

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf
{
    public function create($html, $filename = 'document.pdf', $stream = true)
    {
        $options = new Options();

        // مهم للصور والخطوط
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);

        // مهم جداً: دل dompdf على مجلد الخطوط
        $options->set('fontDir', FCPATH . 'application/fonts/');
        $options->set('fontCache', FCPATH . 'application/fonts/');

        // خله افتراضي Tajawal (حتى لو ما استخدمت CSS)
        $options->set('defaultFont', 'tajawal');
        $options->set('chroot', FCPATH);


        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        if ($stream) {
            $dompdf->stream($filename, ["Attachment" => 1]);
        } else {
            return $dompdf->output();
        }
    }
}
