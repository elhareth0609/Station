<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Sim;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as LaravelFile;
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
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteCoupon(' . $user->id . ')"><i class="mdi mdi-trash-can"></i></a>
                    ';
                }
            })
            ->make(true);
        }
        return view('content.dashboard.users.list');
    }

    public function stations(Request $request) {
        $query = Station::query();

        if ($request->has('type') && $request->type != 'all') {
            if ($request->type == 'active') {
                $query->where('status', 'active');
            } elseif ($request->type == 'inactive') {
                $query->where('status', 'inactive');
            }
        }

        $stations = $query->get();

        $ids = $stations->pluck('id');
        if($request->ajax()) {
            return DataTables::of($stations)
            ->editColumn('id', function ($station) {
                return (string) $station->id;
            })
            ->editColumn('user_id', function ($station) {
                return $station->user->full_name;
            })
            ->editColumn('name', function ($station) {
                return $station->name;
            })
            ->editColumn('code', function ($station) {
                return $station->code;
            })
            ->editColumn('status', function ($station) {
                if ($station->status == 'active') {
                    return '<span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">'. __('Active') .'</span>';
                } else {
                    return '<span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">'. __('In Active') .'</span>';
                }
            })
            ->addColumn('sims', function ($station) {
                return $station->sims->count();
            })
            ->editColumn('created_at', function ($station) {
                return $station->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function ($station) use ($request) {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editStation(' . $station->id . ')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteStation(' . $station->id . ')"><i class="mdi mdi-trash-can"></i></a>
                    ';
            })
            ->rawColumns(['status','actions'])
            ->with('ids', $ids)
            ->make(true);
        }
        return view('content.dashboard.stations.list');
    }

    public function sims(Request $request) {
        $query = Sim::query();

        if ($request->has('type') && $request->type != 'all') {
            if ($request->type == 'active') {
                $query->where('status', 'active');
            } elseif ($request->type == 'inactive') {
                $query->where('status', 'inactive');
            }
        }

        $sims = $query->get();

        $ids = $sims->pluck('id');
        if($request->ajax()) {
            return DataTables::of($sims)
            ->editColumn('id', function ($sim) {
                return (string) $sim->id;
            })
            ->editColumn('station_id', function ($sim) {
                return (string) $sim->station->name;
            })
            ->editColumn('name', function ($sim) {
                return $sim->name;
            })
            ->editColumn('status', function ($sim) {
                if ($sim->status == 'active') {
                    return '<span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">'. __('Active') .'</span>';
                } else {
                    return '<span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">'. __('In Active') .'</span>';
                }
            })
            ->editColumn('created_at', function ($sim) {
                return $sim->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function ($sim) use ($request) {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editSim(' . $sim->id . ')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteSim(' . $sim->id . ')"><i class="mdi mdi-trash-can"></i></a>
                    ';
            })
            ->rawColumns(['status','actions'])
            ->with('ids', $ids)
            ->make(true);
        }
        return view('content.dashboard.sims.list');
    }

    public function transactions(Request $request) {
        $query = Sim::query();

        if ($request->has('type') && $request->type != 'all') {
            if ($request->type == 'active') {
                $query->where('status', 'active');
            } elseif ($request->type == 'inactive') {
                $query->where('status', 'inactive');
            }
        }

        $transactions = $query->get();

        $ids = $transactions->pluck('id');
        if($request->ajax()) {
            return DataTables::of($transactions)
            ->editColumn('id', function ($transaction) {
                return (string) $transaction->id;
            })
            ->editColumn('name', function ($transaction) {
                return $transaction->name;
            })
            ->editColumn('status', function ($transaction) {
                if ($transaction->status == 'active') {
                    return '<span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">'. __('Active') .'</span>';
                } else {
                    return '<span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">'. __('In Active') .'</span>';
                }
            })
            ->editColumn('created_at', function ($transaction) {
                return $transaction->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function ($transaction) use ($request) {
                    return '
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary" onclick="editStation(' . $transaction->id . ')"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="deleteStation(' . $transaction->id . ')"><i class="mdi mdi-trash-can"></i></a>
                    ';
            })
            ->rawColumns(['status','actions'])
            ->with('ids', $ids)
            ->make(true);
        }
        return view('content.dashboard.transactions.list');
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

        return view('content.dashboard.languages.index')
            ->with('languages', $languages);
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

        return view('content.dashboard.roles.index');
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

        return view('content.dashboard.permissions.index');
    }

}
