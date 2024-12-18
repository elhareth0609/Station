<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Telescope\EntryType;
use Laravel\Telescope\Telescope;
use Yajra\DataTables\Facades\DataTables;
use Google_Client;
use Google\Service\Sheets as Google_Service_Sheets;

class DataTabelController extends Controller {

    public function users(Request $request) {
        $users = User::all();
        if ($request->ajax()) {
            return DataTables::of($users)
            ->editColumn('id', function ($user) {
                return $user->id;
            })
            ->editColumn('fullname', function ($user) {
                return $user->fullname;
            })
            ->editColumn('email', function ($user) {
                return $user->email;
            })
            ->editColumn('phone', function ($user) {
                return $user->phone;
            })
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function ($user) use ($request){
                if ($request->has('trashed') && $request->trashed == 1) {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-warning" onclick="restoreCoupon(' . $user->id . ')"><i class="mdi mdi-backup-restore"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteCoupon(' . $user->id . ')"><i class="mdi mdi-delete-forever-outline"></i></a>
                    ';
                } else {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editCoupon(' . $user->id . ')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-success" onclick="printCoupon(' . $user->id . ')"><i class="mdi mdi-printer"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteCoupon(' . $user->id . ')"><i class="mdi mdi-trash-can"></i></a>
                    ';
                }            })
            ->make(true);
        }
        return view('content.users.list');
    }

    public function datatabels(Request $request) {
        $query = Coupon::query();

        if ($request->has('trashed') && $request->trashed == 1) {
            $query->onlyTrashed();
        }

        if ($request->has('type') && $request->type != 'all') {
            if ($request->type == 'expired') {
                $query->where('expired_date', '<', now());
            } elseif ($request->type == 'active') {
                $query->where('status', 'active')->where('expired_date', '>=', now());
            } elseif ($request->type == 'inactive') {
                $query->where('status', 'inactive');
            }
        }

        $coupons = $query->get();

        $ids = $coupons->pluck('id');
        if($request->ajax()) {
            return DataTables::of($coupons)
            ->editColumn('id', function ($coupon) {
                return (string) $coupon->id;
            })
            ->editColumn('code', function ($coupon) {
                return $coupon->code;
            })
            ->editColumn('status', function ($coupon) {
                if ($coupon->status == 'active') {
                    return '<span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">'. __('Active') .'</span>';
                } else {
                    return '<span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">'. __('In Active') .'</span>';
                }
            })
            ->editColumn('discount', function ($coupon) {
                return $coupon->discount;
            })
            ->editColumn('max', function ($coupon) {
                return $coupon->max;
            })
            ->editColumn('expired_date', function ($coupon) {
                return $coupon->expired_date;
            })
            ->editColumn('created_at', function ($coupon) {
                return $coupon->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function ($coupon) use ($request) {
                if ($request->has('trashed') && $request->trashed == 1) {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-warning" onclick="restoreCoupon(' . $coupon->id . ')"><i class="mdi mdi-backup-restore"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteCoupon(' . $coupon->id . ')"><i class="mdi mdi-delete-forever-outline"></i></a>
                    ';
                } else {
                    return '
                        <a href="'. route('coupon',$coupon->id) .'" class="btn btn-icon btn-outline-primary"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editCoupon(' . $coupon->id . ')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-success" onclick="printCoupon(' . $coupon->id . ')"><i class="mdi mdi-printer"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-success" onclick="printPdfCoupon(' . $coupon->id . ')"><i class="mdi mdi-printer-outline"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteCoupon(' . $coupon->id . ')"><i class="mdi mdi-trash-can"></i></a>
                    ';
                }
            })
            ->rawColumns(['status','actions'])
            ->with('ids', $ids)
            ->make(true);

            // ->toArray();

            // $data = $datatable['data'];

            // $ids = collect($data)->pluck('id');
            // $datatable['ids'] = $ids;

            // return response()->json($datatable);
        }
        return view('content.datatabels.index');
    }

    public function logs(Request $request) {

        Log::info("test");
        $logs = DB::table('telescope_entries')
        // ->where('type', 'log')
        ->get();
        $id = 0;

        if($request->ajax()) {
            return DataTables::of($logs)
            ->addColumn('id', function ($log) use (&$id) {
                return (string) ++$id;
            })
            ->editColumn('type', function ($log) {
                return $log->type;
            })
            ->editColumn('content', function ($log) {
                return $log->content;
            })
            ->editColumn('created_at', function ($log) {
                return $log->created_at;
            })
            // ->rawColumns([])
            ->make(true);
        }
        return view('content.logs.list');
    }

    public function google_sheet(Request $request) {
        $client = new Google_Client();

        $client->setAuthConfig(base_path(env('GOOGLE_SHEET_CREDENTIALS_PATH', 'sheet_credentials.json'))); // Your credentials file
        $client->addScope(Google_Service_Sheets::SPREADSHEETS);

        $service = new Google_Service_Sheets($client);

        $spreadsheetId = '1hu8hFq_zWXSsJ7df5uWBwiXqvSbf03mKDahB1RFXUyg';
        $range = 'Students1!A2:L';

        try {
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues();

            $absences = collect($values)->map(function ($row) {
                return [
                    'email' => $row[0] ?? '',
                    'imei' => $row[1] ?? '',
                    'first_name' => $row[2] ?? '',
                    'last_name' => $row[3] ?? '',
                    'department' => $row[4] ?? '',
                    'level' => $row[5] ?? '',
                    'speciality' => $row[6] ?? '',
                    'group' => $row[7] ?? '',
                    'reason' => $row[8] ?? '',
                    'from_date' => $row[9] ?? '',
                    'to_date' => $row[10] ?? '',
                    'document' => $row[11] ?? '',
                ];
            });

            $counter = 0;
            $actions_counter = 0;
            if ($request->ajax()) {
                return DataTables::of($absences)
                    ->addColumn('id', function ($absence) use (&$counter) {
                        return ++$counter;
                    })
                    ->editColumn('imei', function ($absence) {
                        return $absence['imei'];
                    })
                    ->editColumn('name', function ($absence) {
                        return $absence['first_name'] . ' ' . $absence['last_name'];
                    })
                    ->editColumn('reason', function ($absence) {
                        return $absence['reason'];
                    })
                    ->editColumn('from_date', function ($absence) {
                        return $absence['from_date'];
                    })
                    ->editColumn('to_date', function ($absence) {
                        return $absence['to_date'];
                    })
                    ->editColumn('department', function ($absence) {
                        return $absence['department'];
                    })
                    ->editColumn('level', function ($absence) {
                        return $absence['level'];
                    })
                    ->editColumn('speciality', function ($absence) {
                        return $absence['speciality'];
                    })
                    ->editColumn('group', function ($absence) {
                        return $absence['group'];
                    })
                    ->editColumn('email', function ($absence) {
                        return $absence['email'];
                    })
                    ->editColumn('document', function ($absence) {
                        return $absence['document'];
                    })
                    ->editColumn('company', function ($absence) {
                        return $absence['department'];
                    })
                    ->addColumn('actions', function ($absence) use (&$actions_counter) {
                        return '
                            <a href="javascript:void(0)" onclick="printPdfCertificate(' . ++$actions_counter . ')" class="btn btn-icon btn-outline-success"><i class="mdi mdi-printer-outline"></i></a>
                            <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editCertificate(' . $absence->id . ')"><i class="mdi mdi-pencil"></i></a>
                            <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteCertificate(' . $absence->id . ')"><i class="mdi mdi-trash-can"></i></a>
                        ';
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
            }
            
            return view('content.google-sheet.index');
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
