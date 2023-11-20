<?php

    require_once 'dompdf/autoload.inc.php';

    use Dompdf\dompdf;
    use Dompdf\options;

    class Pdf {
        public function generate($html, $filename = '', $paper = '', $orientation = '', $stream = TRUE) {
            $options = new Options();

            $options -> set('isRemoteEnabled', TRUE);

            $dompdf = new Dompdf();

            $dompdf -> loadHtml($html);
            $dompdf -> setPaper($paper, $orientation);
            $dompdf -> render();

            if($stream) {
                $dompdf -> stream($filename, '.pdf', array('Attachment' => 0));
            } else {
                return $dompdf -> output();
            }
        }
    }

?>