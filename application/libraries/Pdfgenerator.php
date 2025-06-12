<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator
{
    public function generate($html, $filename = '', $paper = 'A4', $orientation = 'portrait', $stream = TRUE)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();

        if ($stream) {
            $dompdf->stream($filename . ".pdf", array("Attachment" => false));
            exit();
        } else {
            return $dompdf->output();
        }
    }
}
