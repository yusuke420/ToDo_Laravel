<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolder;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    /**
     * 新規フォルダ作成画面表示
     *
     * @return \Illuminate\View\View
     */
    public function showCreateForm(): \Illuminate\View\View
    {
        return view('folders.create');
    }

    /**
     * フォルダの新規登録
     *
     * @param CreateFolder $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateFolder $request): \Illuminate\Http\RedirectResponse
    {
        $folder = new Folder();

        $folder->title = $request->title;

        Auth::user()->folders()->save($folder);

        return redirect()->route('tasks.index', ['folder' => $folder->id]);
    }
}