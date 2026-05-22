<?php
// app/Http/Controllers/VideoController.php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('order', 'desc')->orderBy('created_at', 'desc')->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_url' => 'required'
        ]);

        Video::create([
            'title' => $request->title,
            'youtube_url' => $request->youtube_url,
            'order' => Video::count() + 1
        ]);

        return redirect()->route('admin.videos.index')
            ->with('success', 'تم إضافة الفيديو بنجاح');
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_url' => 'required|url|regex:/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/'
        ]);

        $video = Video::findOrFail($id);
        $video->update([
            'title' => $request->title,
            'youtube_url' => $request->youtube_url
        ]);

        return redirect()->route('admin.videos.index')
            ->with('success', 'تم تحديث الفيديو بنجاح');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('admin.videos.index')
            ->with('success', 'تم حذف الفيديو بنجاح');
    }

    public function updateOrder(Request $request)
    {
        $orders = $request->orders;
        foreach ($orders as $order => $id) {
            Video::where('id', $id)->update(['order' => $order + 1]);
        }
        return response()->json(['success' => true]);
    }

    public function toggleStatus($id)
    {
        $video = Video::findOrFail($id);
        $video->is_active = !$video->is_active;
        $video->save();

        return response()->json(['success' => true, 'is_active' => $video->is_active]);
    }

    public function latestWork()
    {
        $videos = Video::where('is_active', true)->orderBy('created_at', 'desc')->orderBy('order', 'asc')->get();
        return view('latestWork', compact('videos'));
    }
}