<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MemoController extends Controller
{
    public function index()
    {
        $memos = Memo::where('user_id', Auth::id())->get();
        return view('memos.index', compact('memos'));
    }

    public function create()
    {
        return view('memos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 's3');
            Storage::disk('s3')->setVisibility($imagePath, 'public');
        }

        Memo::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);
        \Log::info($imagePath);

        return redirect()->route('memo.index');
    }
}