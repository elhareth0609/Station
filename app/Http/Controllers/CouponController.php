<?php

namespace App\Http\Controllers;

use App\Events\PublicationDeleted;
use App\Exports\CouponsExport;
use App\Imports\CouponsImport;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use setasign\Fpdi\Fpdi;

class CouponController extends Controller {
    public function get($id) {
        try {
            $coupon = Coupon::find($id);
            return response()->json([
                'coupon' => $coupon,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'icon' => 'error',
                'state' => __("Error"),
                'message' => $e->getMessage()
            ]);
        }
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|unique:coupons',
            'max' => 'required|integer|min:1',
            'discount' => 'required|integer|min:1|max:100',
            'expired_date' => 'required|date',
            'status' => 'required|in:active,inactive',
            ]);

        if ($validator->fails()) {
            return response()->json([
            'icon' => 'error',
            'state' => __("Error"),
            'message' => $validator->errors()->first()
            ], 422);
        }

        try{

            $coupon = new Coupon();
            $coupon->code = $request->code;
            $coupon->max = $request->max;
            $coupon->discount = $request->discount;
            $coupon->expired_date = $request->expired_date;
            $coupon->status = $request->status;
            $coupon->save();

            return response()->json([
            'icon' => 'success',
            'state' => __("Success"),
            'message' => __("Coupon Created successfully")
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
            'icon' => 'error',
            'state' => __("Error"),
            'message' => $e->getMessage()
            ]);
        }

    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string',
            'code' => [
                'required',
                'string',
                Rule::unique('coupons')->ignore($request->id),
            ],
            'max' => 'required|integer|min:1',
            'discount' => 'required|integer|min:1|max:100',
            'expired_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'icon' => 'error',
            'state' => __("Error"),
            'message' => $validator->errors()->first()
            ], 422);
        }

        try{

        $coupon = Coupon::find($request->id);
        $coupon->code = $request->code;
        $coupon->max = $request->max;
        $coupon->discount = $request->discount;
        $coupon->expired_date = $request->expired_date;
        $coupon->status = $request->status;
        $coupon->save();

        return response()->json([
            'icon' => 'success',
            'state' => __("Success"),
            'message' => __("Coupon Updated Successfully.")
        ]);
        } catch (\Exception $e) {
        return response()->json([
            'icon' => 'error',
            'state' => __("Error"),
            'message' => $e->getMessage()
        ]);
        }

    }

    public function check(Request $request) {
        $state = false;
        $message = '';

        $coupon = Coupon::where('code', $request->code)->first();

        if ($coupon) {
            if ($coupon->max >= $coupon->users->count()) {
            $state = true;
            $message = __('Coupon code applied successfully.');
            $discount = $coupon->discount;
            } else {
            $message = __('Maximum usage limit for this coupon has been reached.');
            $state = false;
            $discount = 0;
            }

            if ($coupon->expired_date && Carbon::parse($coupon->expired_date)->isPast()) {
            $state = false;
            $message = __('Coupon code has expired.');
            $discount = 0;
            }


            if ($coupon->status == 'inactive') {
            $state = false;
            $message = __('Coupon code has inactive.');
            $discount = 0;
        }
        } else {
            $state = false;
            $message = __('Invalid coupon code.');
            $discount = 0;
        }

        return response()->json([
            'message' => $message,
            'state' => $state,
            'discount' => $discount
        ]);
    }

    public function updateCode(Request $request, $id) {
        $coupon = Coupon::find($id);

        if ($coupon) {
            $coupon->code = $request->input('code');
            $coupon->save();

            return response()->json([
                'icon' => 'success',
                'state' => __('Success'),
                'message' => __('Coupon code updated successfully.')
            ]);
        }

        return response()->json([
            'icon' => 'error',
            'state' => __('Error'),
            'message' => __('Product not found.')
        ], 404);
    }

    public function export() {
        return Excel::download(new CouponsExport, 'coupons.xlsx'); // Export coupons to an Excel file
    }

    public function import(Request $request) {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
        ]);

        Excel::import(new CouponsImport, $request->file('file')); // Import coupons from the uploaded file

        return redirect()->back()->with('success', 'Coupons imported successfully.');
    }

    public function restore($id) {
        $coupon = Coupon::withTrashed()->findOrFail($id);
        $coupon->restore();

        return response()->json([
            'icon' => 'success',
            'state' => 'Restored',
            'message' => 'Coupon restored successfully.'
        ]);
    }

    public function pdf($id) {
        $coupon = Coupon::find($id);
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
        $pdf->Cell(0, 10, $coupon->code, 0, 0, 'C');

        // Reason for certificate
        $pdf->SetFontSize(20);
        $pdf->SetXY(80, 105);
        $pdf->Cell(150, 10, $coupon->expired_date, 0, 0, 'C');

        // Date components
        $pdf->SetXY(118, 122);
        $pdf->Cell(20, 10, $coupon->discount, 0, 0, 'C'); // Day

        $pdf->SetXY(160, 122);
        $pdf->Cell(30, 10, $coupon->max, 0, 0, 'C'); // Month

        $pdf->SetXY(200, 122);
        $pdf->Cell(20, 10, $coupon->expired_date, 0, 0, 'L'); // Year

        // Output the PDF as a response to download
        return response()->streamDownload(function () use ($pdf) {
            $pdf->Output();
        }, 'certificate.pdf');
    }

    public function delete($id) {
        try {
            $coupon = Coupon::withTrashed()->findOrFail($id);

            if ($coupon->trashed()) {
                $coupon->forceDelete();
            } else {
                $coupon->delete();
            }

            return response()->json([
                'icon' => 'success',
                'state' => 'Deleted',
                'message' => 'Coupon deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'icon' => 'error',
                'state' => 'Error',
                'message' => 'An error occurred while deleting the coupon.'
            ], 500);
        }
    }

}
