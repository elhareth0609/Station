<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FolderController extends Controller {
    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:folders,id'
        ]);

        Folder::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'user_id' => Auth::user()->id
        ]);

        return back()->with('success', 'Folder created successfully!');
    }

    public function destroy(Folder $folder) {
        if ($folder->user_id !== Auth::user()->id) {
            abort(403);
        }

        // Delete all files in the folder
        foreach ($folder->files as $file) {
            Storage::delete($file->path);
            $file->delete();
        }

        // Recursively delete subfolders
        foreach ($folder->children as $child) {
            $this->destroy($child);
        }

        $folder->delete();

        return back()->with('success', 'Folder and its contents deleted successfully!');
    }
}
