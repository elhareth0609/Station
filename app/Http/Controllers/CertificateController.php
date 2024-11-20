<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use setasign\Fpdi\Fpdi;

// class CertificateController extends Controller {
//     public function generateCertificate() {
//         // Create a new FPDI instance in Landscape mode
//         $pdf = new FPDI('L');

//         // Set the path to the existing PDF template
//         $pdfPath = public_path('assets/img/my/defaults/certificate.pdf');

//         // Load the existing PDF
//         $pagecount = $pdf->setSourceFile($pdfPath);

//         // Import the first page from the template
//         $tpl = $pdf->importPage(1);

//         // Get the dimensions of the imported template
//         $size = $pdf->getTemplateSize($tpl);

//         // Add a page with the same dimensions as the template
//         $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);

//         // Use the imported page as the template
//         $pdf->useTemplate($tpl);

//         // Set font and add text
//         $pdf->SetFont('Helvetica');

//         // User's name
//         $pdf->SetFontSize(30);
//         $pdf->SetXY(10, 89);
//         $pdf->Cell(0, 10, 'الحارث', 0, 0, 'C');

//         // Reason for certificate
//         $pdf->SetFontSize(20);
//         $pdf->SetXY(80, 105);
//         $pdf->Cell(150, 10, 'creating an awesome tutorial', 0, 0, 'C');

//         // Date components
//         $pdf->SetXY(118, 122);
//         $pdf->Cell(20, 10, date('d'), 0, 0, 'C'); // Day

//         $pdf->SetXY(160, 122);
//         $pdf->Cell(30, 10, date('M'), 0, 0, 'C'); // Month

//         $pdf->SetXY(200, 122);
//         $pdf->Cell(20, 10, date('Y'), 0, 0, 'L'); // Year

//         // Output the PDF as a response to download
//         return response()->streamDownload(function () use ($pdf) {
//             $pdf->Output();
//         }, 'certificate.pdf');
//     }
// }










// for text to pdf 

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use TCPDF;

// class CertificateController extends Controller {
//     public function generateCertificate() {
//         // Create a new PDF instance
//         $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

//         // Set document information
//         $pdf->SetCreator('My App');
//         $pdf->SetAuthor('My App');
//         $pdf->SetTitle('Certificate');
//         $pdf->SetSubject('Certificate of Achievement');

//         // Remove default header/footer
//         $pdf->setPrintHeader(false);
//         $pdf->setPrintFooter(false);

//         // Set RTL support for Arabic
//         $pdf->setRTL(true);

//         // Set font for Arabic (ensure the font is in tcpdf/fonts/)
//         $pdf->SetFont('amiri', '', 20); // 'amiri' must be added to tcpdf/fonts/

//         // Add a page
//         $pdf->AddPage();

//         // Add content in Arabic
//         $pdf->SetXY(10, 50);
//         $pdf->Cell(0, 10, 'شهادة تقدير', 0, 1, 'C', 0, '', 0, false, 'T', 'M'); // Title in Arabic

//         $pdf->SetXY(10, 70);
//         $pdf->Cell(0, 10, 'تم منح هذه الشهادة إلى', 0, 1, 'C', 0, '', 0, false, 'T', 'M'); // Subtitle in Arabic

//         $pdf->SetFontSize(30);
//         $pdf->SetXY(10, 100);
//         $pdf->Cell(0, 10, 'خلفاوي الحارث', 0, 1, 'C', 0, '', 0, false, 'T', 'M'); // Name in Arabic

//         $pdf->SetFontSize(16);
//         $pdf->SetXY(10, 130);
//         $pdf->Cell(0, 10, 'لإبداعه في إنشاء هذا التطبيق', 0, 1, 'C', 0, '', 0, false, 'T', 'M'); // Reason in Arabic

//         // Add date
//         $pdf->SetXY(10, 160);
//         $pdf->Cell(0, 10, date('d-m-Y'), 0, 1, 'C', 0, '', 0, false, 'T', 'M'); // Date in Arabic

//         // Output PDF as a download
//         $pdfContent = $pdf->Output('certificate.pdf', 'S'); // Capture output as a string

//         return response($pdfContent)
//             ->header('Content-Type', 'application/pdf')
//             ->header('Content-Disposition', 'inline; filename="certificate.pdf"');
//     }
// }


    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use setasign\Fpdi\Tcpdf\Fpdi;
    use Exception;
    
    class CertificateController extends Controller
    {
        public function generateCertificate(Request $request)
        {
            try {
                // Path to the certificate template
                $pdfPath = public_path('assets/img/my/defaults/certificate.pdf');
    
                // Check if the template exists
                if (!file_exists($pdfPath)) {
                    return response()->json([
                        'error' => 'Certificate template not found',
                        'path' => $pdfPath
                    ], 404);
                }
    
                // Create new PDF document using FPDI instead of TCPDF
                $pdf = new Fpdi('L', 'mm', 'A4', true, 'UTF-8', false);
    
                // Set document information
                $pdf->SetCreator('Your Organization');
                $pdf->SetAuthor('Your Organization');
                $pdf->SetTitle('Certificate of Completion');
    
                // Remove default header/footer
                // $pdf->setPrintHeader(false);
                // $pdf->setPrintFooter(false);
    
                // Set margins
                // $pdf->SetMargins(0, 0, 0);
                // $pdf->SetAutoPageBreak(false, 0);
    
                // Add a page
                // $pdf->AddPage('L', 'A4');
    
                // Import the template using FPDI
                try {
                    // Import first page of the template
                    $pdf->setSourceFile($pdfPath);
                    $tplIdx = $pdf->importPage(1);
                    //         // Get the dimensions of the imported template
                    $size = $pdf->getTemplateSize($tplIdx);

                    // Add a page with the same dimensions as the template
                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);

                    $pdf->useTemplate($tplIdx); // A4 landscape dimensions
                } catch (Exception $e) {
                    return response()->json([
                        'error' => 'Error loading PDF template',
                        'details' => $e->getMessage()
                    ], 500);
                }
    
                // Enable Arabic text support
                $pdf->setRTL(true);
                
                // Set font for Arabic text
                // Make sure the Amiri font files are in the correct TCPDF fonts directory
                $pdf->SetFont('amiri', '', 24);
    
                // Overlay dynamic content in Arabic
                $pdf->SetXY(10, 50);
                $pdf->Cell(0, 10, 'شهادة تقدير', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
    
                $pdf->SetXY(10, 70);
                $pdf->Cell(0, 10, 'تم منح هذه الشهادة إلى', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
    
                $pdf->SetFontSize(30);
                $pdf->SetXY(10, 100);
                $pdf->Cell(0, 10, 'خلفاوي الحارث', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
    
                $pdf->SetFontSize(16);
                $pdf->SetXY(10, 130);
                $pdf->Cell(0, 10, 'لإبداعه في إنشاء هذا التطبيق', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
    
                // Add the date
                $pdf->SetXY(10, 160);
                $pdf->Cell(0, 10, date('d-m-Y'), 0, 1, 'C', 0, '', 0, false, 'T', 'M');
    
                // Generate unique filename
                return response()->streamDownload(function () use ($pdf) {
                    $pdf->Output();
                }, 'certificate.pdf');

                // Return the PDF as a download
                return response()->streamDownload(
                    function() use ($pdf) {
                        echo $pdf->Output($filename, 'S');
                    },
                    $filename,
                    [
                        'Content-Type' => 'application/pdf',
                        'Content-Disposition' => 'attachment; filename="' . $filename . '"'
                    ]
                );
    
            } catch (Exception $e) {
                return response()->json([
                    'error' => 'Certificate generation failed',
                    'details' => $e->getMessage()
                ], 500);
            }
        }
    }




