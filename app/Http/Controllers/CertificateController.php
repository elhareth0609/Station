<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use setasign\Fpdi\Fpdi;

class CertificateController extends Controller {
    public function generateCertificate() {
        // Create new Landscape PDF
        $pdf = new FPDI('L');

        // Set the path to the existing PDF template
        $pdfPath = public_path('assets/img/my/defaults/certificate.pdf');

        // Load the existing PDF
        $pagecount = $pdf->setSourceFile($pdfPath);

        // Import the first page from the template
        $tpl = $pdf->importPage(1);
        $pdf->AddPage();

        // Use the imported page as the template
        $pdf->useTemplate($tpl);

        // Set font and add text
        $pdf->SetFont('Helvetica');

        // User's name
        $pdf->SetFontSize(30);
        $pdf->SetXY(10, 89);
        $pdf->Cell(0, 10, 'Khalfaoui elhareth', 0, 0, 'C');

        // Reason for certificate
        $pdf->SetFontSize(20);
        $pdf->SetXY(80, 105);
        $pdf->Cell(150, 10, 'creating an awesome tutorial', 0, 0, 'C');

        // Date components
        $pdf->SetXY(118, 122);
        $pdf->Cell(20, 10, date('d'), 0, 0, 'C'); // Day

        $pdf->SetXY(160, 122);
        $pdf->Cell(30, 10, date('M'), 0, 0, 'C'); // Month

        $pdf->SetXY(200, 122);
        $pdf->Cell(20, 10, date('Y'), 0, 0, 'L'); // Year

        // Output the PDF as a response to download
        return response()->streamDownload(function () use ($pdf) {
            $pdf->Output();
        }, 'certificate.pdf');
    }
}
