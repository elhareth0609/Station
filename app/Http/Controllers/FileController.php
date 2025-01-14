<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller {
    // public function index(Request $request)
    // {
    //     $folder_id = $request->query('folder_id');
        
    //     $files = File::where('user_id', Auth::user()->id)
    //         ->where('folder_id', $folder_id)
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(20);
            
    //     return view('files.index', compact('files'));
    // }

    public function upload(Request $request) {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB Max
            'folder_id' => 'nullable|exists:folders,id'
        ]);

        $file = $request->file('file');
        $path = $file->store('user_files/' . Auth::user()->id);

        File::create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'size' => $file->getSize(),
            'type' => $file->getMimeType(),
            'folder_id' => $request->folder_id,
            'user_id' => Auth::user()->id
        ]);

        return back()->with('success', 'File uploaded successfully!');
    }

    public function download(File $file) {
        if ($file->user_id !== Auth::user()->id) {
            abort(403);
        }

        return Storage::download($file->path, $file->name);
    }

    public function destroy(File $file) {
        if ($file->user_id !== Auth::user()->id) {
            abort(403);
        }

        Storage::delete($file->path);
        $file->delete();

        return back()->with('success', 'File deleted successfully!');
    }
}
