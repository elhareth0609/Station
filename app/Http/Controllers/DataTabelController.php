<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\File;
use App\Models\Folder;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Permission;
use App\Models\Plan;
use App\Models\Product;
use App\Models\Role;
use App\Models\SubCategory;
use App\Models\Url;
use App\Models\User;
use Google\Service\Sheets as Google_Service_Sheets;
use Google_Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as LaravelFile;
use Illuminate\Support\Facades\Log;
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
        $range = 'Students1!A2:L2';

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
                        $actions_counter = $actions_counter + 1;
                        return '
                            <a href="javascript:void(0)" onclick="printPdfCertificate(' . $actions_counter . ')" class="btn btn-icon btn-outline-success"><i class="mdi mdi-printer-outline"></i></a>
                            <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editCertificate(' . $actions_counter . ')"><i class="mdi mdi-pencil"></i></a>
                            <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteCertificate(' . $actions_counter . ')"><i class="mdi mdi-trash-can"></i></a>
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

    public function new_orders(Request $request) {
        if ($request->ajax()) {
            $orders = Order::where('status', 'new')->get();
            return DataTables::of($orders)
            ->editColumn('id', function ($order) {
                return $order->id;
            })
            ->editColumn('customer_name', function ($order) {
                return $order->customer_name;
            })
            ->editColumn('customer_email', function ($order) {
                return $order->customer_email;
            })
            ->editColumn('customer_phone', function ($order) {
                return $order->customer_phone;
            })
            ->editColumn('status', function ($order) {
                return $order->status;
            })
            ->addColumn('actions', function ($order) {
                return '
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editOrder(' . $order->id . ')"><i class="mdi mdi-pencil"></i></a>
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteOrder(' . $order->id . ')"><i class="mdi mdi-trash-can"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('content.orders.new');
    }

    public function progress_orders(Request $request) {
        if ($request->ajax()) {
            $orders = Order::where('status', '!=', 'completed')->get();
            return DataTables::of($orders)
            ->editColumn('id', function ($order) {
                return $order->id;
            })
            ->editColumn('customer_name', function ($order) {
                return $order->customer_name;
            })
            ->editColumn('customer_email', function ($order) {
                return $order->customer_email;
            })
            ->editColumn('customer_phone', function ($order) {
                return $order->customer_phone;
            })
            ->editColumn('status', function ($order) {
                return $order->status;
            })
            ->addColumn('actions', function ($order) {
                return '
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editOrder(' . $order->id . ')"><i class="mdi mdi-pencil"></i></a>
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteOrder(' . $order->id . ')"><i class="mdi mdi-trash-can"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('content.orders.progress');
    }

    public function completed_orders(Request $request) {
        if ($request->ajax()) {
            $orders = Order::where('status', 'completed')->get();
            return DataTables::of($orders)
            ->editColumn('id', function ($order) {
                return $order->id;
            })
            ->editColumn('customer_name', function ($order) {
                return $order->customer_name;
            })
            ->editColumn('customer_email', function ($order) {
                return $order->customer_email;
            })
            ->editColumn('customer_phone', function ($order) {
                return $order->customer_phone;
            })
            ->editColumn('status', function ($order) {
                return $order->status;
            })
            ->make(true);   
        }

        return view('content.orders.completed');
    }

    public function cars(Request $request) {
        if ($request->ajax()) {
            $cars = Car::all();
            return DataTables::of($cars)
            ->editColumn('id', function ($car) {
                return $car->id;
            })
            ->editColumn('user_id', function ($car) {
                return $car->user? $car->user->full_name : '';
            })
            ->editColumn('name', function ($car) {
                return $car->name;
            })
            ->editColumn('imei', function ($car) {
                return $car->imei;
            })
            ->editColumn('created_at', function ($car) {
                return $car->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function ($car) {
                return '
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editCar(' . $car->id . ')"><i class="mdi mdi-pencil"></i></a>
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteCar(' . $car->id . ')"><i class="mdi mdi-trash-can"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('content.cars.list');

    }

    public function coupons(Request $request) {
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
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editCoupon(' . $coupon->id . ')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteCoupon(' . $coupon->id . ')"><i class="mdi mdi-trash-can"></i></a>
                    ';
                }
            })
            ->rawColumns(['status','actions'])
            ->with('ids', $ids)
            ->make(true);
        }
        return view('content.coupons.list');
    }

    public function categories(Request $request) {
        $query = Category::query();

        if ($request->has('trashed') && $request->trashed == 1) {
            $query->onlyTrashed();
        }

        if ($request->has('type') && $request->type != 'all') {
            if ($request->type == 'active') {
                $query->where('status', 'active');
            } elseif ($request->type == 'inactive') {
                $query->where('status', 'inactive');
            }
        }

        $categories = $query->get();

        $ids = $categories->pluck('id');
        if($request->ajax()) {
            return DataTables::of($categories)
            ->editColumn('id', function ($category) {
                return (string) $category->id;
            })
            ->editColumn('name', function ($category) {
                return $category->name;
            })
            ->editColumn('status', function ($category) {
                if ($category->status == 'active') {
                    return '<span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">'. __('Active') .'</span>';
                } else {
                    return '<span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">'. __('In Active') .'</span>';
                }
            })
            ->editColumn('created_at', function ($category) {
                return $category->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function ($category) use ($request) {
                if ($request->has('trashed') && $request->trashed == 1) {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-warning" onclick="restoreCategory(' . $category->id . ')"><i class="mdi mdi-backup-restore"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteCategory(' . $category->id . ')"><i class="mdi mdi-delete-forever-outline"></i></a>
                    ';
                } else {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editCategory(' . $category->id . ')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteCategory(' . $category->id . ')"><i class="mdi mdi-trash-can"></i></a>
                    ';
                }
            })
            ->rawColumns(['status','actions'])
            ->with('ids', $ids)
            ->make(true);
        }
        return view('content.categories.list');
    }

    public function sub_categories(Request $request) {
        $query = SubCategory::query();

        if ($request->has('trashed') && $request->trashed == 1) {
            $query->onlyTrashed();
        }

        if ($request->has('type') && $request->type != 'all') {
            if ($request->type == 'active') {
                $query->where('status', 'active');
            } elseif ($request->type == 'inactive') {
                $query->where('status', 'inactive');
            }
        }

        $sub_categories = $query->get();

        $ids = $sub_categories->pluck('id');
        if($request->ajax()) {
            return DataTables::of($sub_categories)
            ->editColumn('id', function ($sub_category) {
                return (string) $sub_category->id;
            })
            ->editColumn('name', function ($sub_category) {
                return $sub_category->name;
            })
            ->editColumn('category_id', function ($sub_category) {
                return $sub_category->category->name;
            })
            ->editColumn('status', function ($sub_category) {
                if ($sub_category->status == 'active') {
                    return '<span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">'. __('Active') .'</span>';
                } else {
                    return '<span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">'. __('In Active') .'</span>';
                }
            })
            ->editColumn('created_at', function ($sub_category) {
                return $sub_category->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function ($sub_category) use ($request) {
                if ($request->has('trashed') && $request->trashed == 1) {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-warning" onclick="restoreSubCategory(' . $sub_category->id . ')"><i class="mdi mdi-backup-restore"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteSubCategory(' . $sub_category->id . ')"><i class="mdi mdi-delete-forever-outline"></i></a>
                    ';
                } else {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editSubCategory(' . $sub_category->id . ')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteSubCategory(' . $sub_category->id . ')"><i class="mdi mdi-trash-can"></i></a>
                    ';
                }
            })
            ->rawColumns(['status','actions'])
            ->with('ids', $ids)
            ->make(true);
        }

        $categories = Category::all();

        return view('content.sub-categories.list')
        ->with('categories',$categories);

    }

    public function products(Request $request) {
        $query = Product::query();

        if ($request->has('trashed') && $request->trashed == 1) {
            $query->onlyTrashed();
        }

        if ($request->has('type') && $request->type != 'all') {
            if ($request->type == 'active') {
                $query->where('status', 'active');
            } elseif ($request->type == 'inactive') {
                $query->where('status', 'inactive');
            }
        }

        $products = $query->where('user_id',Auth::user()->id)->get();

        $ids = $products->pluck('id');
        if($request->ajax()) {
            return DataTables::of($products)
            ->editColumn('id', function ($product) {
                return (string) $product->id;
            })
            ->editColumn('name', function ($product) {
                return $product->name;
            })
            ->editColumn('price', function ($product) {
                return $product->price;
            })
            ->editColumn('image', function ($product) {
                return $product->image;
            })
            ->editColumn('status', function ($product) {
                if ($product->status == 'active') {
                    return '<span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">'. __('Active') .'</span>';
                } else {
                    return '<span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">'. __('In Active') .'</span>';
                }
            })
            ->editColumn('created_at', function ($product) {
                return $product->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function ($product) use ($request) {
                if ($request->has('trashed') && $request->trashed == 1) {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-warning" onclick="restoreProduct(' . $product->id . ')"><i class="mdi mdi-backup-restore"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteProduct(' . $product->id . ')"><i class="mdi mdi-delete-forever-outline"></i></a>
                    ';
                } else {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editProduct(' . $product->id . ')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="demoProduct(' . $product->id . ')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteProduct(' . $product->id . ')"><i class="mdi mdi-trash-can"></i></a>
                    ';
                }
            })
            ->rawColumns(['status','actions'])
            ->with('ids', $ids)
            ->make(true);
        }

        return view('content.products.list');

    }

    public function orders(Request $request) {
        $query = Product::query();

        if ($request->has('trashed') && $request->trashed == 1) {
            $query->onlyTrashed();
        }

        if ($request->has('type') && $request->type != 'all') {
            if ($request->type == 'active') {
                $query->where('status', 'active');
            } elseif ($request->type == 'inactive') {
                $query->where('status', 'inactive');
            }
        }

        $products = $query->where('user_id',Auth::user()->id)->get();

        $ids = $products->pluck('id');
        if($request->ajax()) {
            return DataTables::of($products)
            ->editColumn('id', function ($product) {
                return (string) $product->id;
            })
            ->editColumn('name', function ($product) {
                return $product->name;
            })
            ->editColumn('price', function ($product) {
                return $product->price;
            })
            ->editColumn('image', function ($product) {
                return $product->image;
            })
            ->editColumn('status', function ($product) {
                if ($product->status == 'active') {
                    return '<span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">'. __('Active') .'</span>';
                } else {
                    return '<span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">'. __('In Active') .'</span>';
                }
            })
            ->editColumn('created_at', function ($product) {
                return $product->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function ($product) use ($request) {
                if ($request->has('trashed') && $request->trashed == 1) {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-warning" onclick="restoreProduct(' . $product->id . ')"><i class="mdi mdi-backup-restore"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteProduct(' . $product->id . ')"><i class="mdi mdi-delete-forever-outline"></i></a>
                    ';
                } else {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editProduct(' . $product->id . ')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="demoProduct(' . $product->id . ')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteProduct(' . $product->id . ')"><i class="mdi mdi-trash-can"></i></a>
                    ';
                }
            })
            ->rawColumns(['status','actions'])
            ->with('ids', $ids)
            ->make(true);
        }

        return view('content.products.list');

    }

    public function languages(Request $request) {
        $languages = [];
        foreach (config('language') as $locale => $language) {
            $languages[] = $locale;
        }

        if ($request->ajax()) {
            $words = [];

            foreach ($languages as $lang) {
                $jsonPath = resource_path("lang/{$lang}.json");
    
                if (LaravelFile::exists($jsonPath)) {
                    $translations = json_decode(LaravelFile::get($jsonPath), true);
    
                    foreach ($translations as $key => $translation) {
                        $words[$key][$lang] = $translation;
                    }
                }
            }

            $words = collect($words)->map(function ($translations, $word) use ($languages) {
                $row = ['word' => $word];
                foreach ($languages as $lang) {
                    $row[$lang] = $translations[$lang] ?? __('Not available');
                }
                return $row;
            });

            $id = 0;
            return DataTables::of($words)
            ->addColumn('id', function ($word) use (&$id) {
                return (string) ++$id;
            })
            ->addColumn('word', function ($word){
                return $word['word'];
            })
            ->addColumn('actions', function ($word) {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editLanguage(\'' . addslashes($word['word']) . '\')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteLanguage(\'' . addslashes($word['word']) . '\')"><i class="mdi mdi-trash-can"></i></a>
                    ';
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('content.languages.index')
            ->with('languages', $languages);
    }

    public function file_manager(Request $request) {
        
        $currentFolderId = null;
        $currentFolder = null;
        if ($request->has('folder_id') && $request->folder_id != null) {
            $currentFolderId = $request->folder_id;
            $currentFolder = Folder::findOrFail($request->folder_id);
        }
        
        if ($request->ajax()) {
            
            // Get folders in current directory
            $folders = Folder::where('user_id', Auth::user()->id)
            ->where('parent_id', $currentFolderId)
            ->select(['id', 'name', 'created_at'])
            ->get()
            ->map(function ($folder) {
                return [
                    'id' => $folder->id,
                    'name' => $folder->name,
                    'type' => 'folder',
                    'size' => '-',
                    'created_at' => $folder->created_at,
                ];
            });
            
            // Get files in current directory
            // return File::all();
            $files = File::where('user_id', Auth::user()->id)
            ->where('folder_id', $currentFolderId)
            ->select(['id', 'name', 'size', 'created_at'])
            ->get()
            ->map(function ($file) {
                return [
                    'id' => $file->id,
                    'name' => $file->name,
                    'type' => 'file',
                    'size' => $this->formatSize($file->size),
                    'created_at' => $file->created_at,
                ];
            });
            
            // Combine folders and files
            $data = $folders->concat($files);

            return DataTables::of($data)
            ->addColumn('actions', function ($row) {
                $actions = '<div class="btn-group">';
                
                if ($row['type'] === 'folder') {
                    $actions .= '<a href="' . route('file-manager', ['folder_id' => $row['id']]) . '" 
                                class="btn btn-sm btn-primary">Open</a>';
                } else {
                    $actions .= '<a href="' . route('files.download', $row['id']) . '" 
                                class="btn btn-sm btn-success">Download</a>';
                }
                
                $actions .= '<button class="btn btn-sm btn-danger delete-btn" 
                            data-type="' . $row['type'] . '" 
                            data-id="' . $row['id'] . '">Delete</button>';
                $actions .= '</div>';
                
                return $actions;
            })
            ->addColumn('icon', function ($row) {
                return $row['type'] === 'folder' 
                    ? '<i class="fas fa-folder text-warning"></i>' 
                    : '<i class="fas fa-file text-primary"></i>';
            })
            ->editColumn('created_at', function ($row) {
                return $row['created_at']->format('Y-m-d H:i:s');
            })
            ->rawColumns(['actions', 'icon'])
            ->make(true);
        }

        return view('content.file-manager.index')
        ->with('currentFolder', $currentFolder);
    }

    public function notifications(Request $request) {
        $notifications = Notification::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get();

        if ($request->ajax()) {
            return DataTables::of($notifications)
            ->editColumn('id', function ($notification) {
                return $notification->id;
            })
            ->editColumn('title', function ($notification) {
                return $notification->title;
            })
            ->editColumn('message', function ($notification) {
                return $notification->message;
            })
            ->editColumn('created_at', function ($notification) {
                return $notification->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($notification) {
                return '
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editNotification(' . $notification->id . ')"><i class="mdi mdi-pencil"></i></a>
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteNotification(' . $notification->id . ')"><i class="mdi mdi-trash-can"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('content.notifications.index');
    }

    public function roles(Request $request) {
        $roles = Role::all();

        if ($request->ajax()) {
            return DataTables::of($roles)
            ->editColumn('id', function ($role) {
                return $role->id;
            })
            ->editColumn('name', function ($role) {
                return $role->name;
            })
            ->editColumn('guard_name', function ($role) {
                return $role->guard_name;
            })
            ->editColumn('created_at', function ($role) {
                return $role->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($role) {
                return '
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editRole(' . $role->id . ')"><i class="mdi mdi-pencil"></i></a>
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteRole(' . $role->id . ')"><i class="mdi mdi-trash-can"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('content.roles.index');
    }

    public function permissions(Request $request) {
        $permissions = Permission::all();

        if ($request->ajax()) {
            return DataTables::of($permissions)
            ->editColumn('id', function ($permission) {
                return $permission->id;
            })
            ->editColumn('name', function ($permission) {
                return $permission->name;
            })
            ->editColumn('guard_name', function ($permission) {
                return $permission->guard_name;
            })
            ->editColumn('created_at', function ($permission) {
                return $permission->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($permission) {
                return '
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editPermission(' . $permission->id . ')"><i class="mdi mdi-pencil"></i></a>
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deletePermission(' . $permission->id . ')"><i class="mdi mdi-trash-can"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('content.permissions.index');
    }

    public function urls(Request $request) {
        $urls = Url::all();

        if ($request->ajax()) {
            return DataTables::of($urls)
            ->editColumn('id', function ($url) {
                return $url->id;
            })
            ->editColumn('name', function ($url) {
                return $url->name;
            })
            ->editColumn('url', function ($url) {
                return $url->url;
            })
            ->editColumn('created_at', function ($url) {
                return $url->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($url) {
                return '
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editUrl(' . $url->id . ')"><i class="mdi mdi-pencil"></i></a>
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteUrl(' . $url->id . ')"><i class="mdi mdi-trash-can"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('content.urls.index');
    }

    public function plans(Request $request) {
        $plans = Plan::all();

        if ($request->ajax()) {
            return DataTables::of($plans)
            ->editColumn('id', function ($plan) {
                return $plan->id;
            })
            ->editColumn('name', function ($plan) {
                return $plan->name;
            })
            ->editColumn('price', function ($plan) {
                return $plan->price;
            })
            ->editColumn('duration', function ($plan) {
                return $plan->duration;
            })
            ->editColumn('created_at', function ($plan) {
                return $plan->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($plan) {
                return '
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editPlan(' . $plan->id . ')"><i class="mdi mdi-pencil"></i></a>
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deletePlan(' . $plan->id . ')"><i class="mdi mdi-trash-can"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('content.plans.index');
    }
}
