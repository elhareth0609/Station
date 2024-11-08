<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
            ->addColumn('actions', function ($user) {
                return '<button class="btn btn-primary">Action Button</button>'; // Add action button HTML
            })
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
        $query = Log::query();

        if ($request->has('type') && $request->type != 'all') {
            if ($request->type == 'expired') {
                $query->where('expired_date', '<', now());
            } elseif ($request->type == 'active') {
                $query->where('status', 'active')->where('expired_date', '>=', now());
            } elseif ($request->type == 'inactive') {
                $query->where('status', 'inactive');
            }
        }

        $logs = $query->get();

        if($request->ajax()) {
            return DataTables::of($logs)
            ->editColumn('id', function ($log) {
                return (string) $log->id;
            })
            ->editColumn('code', function ($log) {
                return $log->code;
            })
            ->editColumn('status', function ($log) {
                if ($log->status == 'active') {
                    return '<span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">'. __('Active') .'</span>';
                } else {
                    return '<span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">'. __('In Active') .'</span>';
                }
            })
            ->editColumn('created_at', function ($log) {
                return $log->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function ($log) {
                return '
                    <a href="'. route('log',$log->id) .'" class="btn btn-icon btn-outline-primary"><i class="mdi mdi-pencil"></i></a>
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteLog(' . $log->id . ')"><i class="mdi mdi-trash-can"></i></a>
                ';
            })
            ->rawColumns(['status','actions'])
            ->make(true);
        }
        return view('content.logs.list');
    }
}
