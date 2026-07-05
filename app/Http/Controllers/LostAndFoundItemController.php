<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LostAndFoundItem;
use Illuminate\Support\Facades\Storage;

class LostAndFoundItemController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', 'lost');
        $items = LostAndFoundItem::where('status', 'active')
                    ->where('type', $type)
                    ->orderBy('created_at', 'desc')
                    ->get();
                    
        return view('lost-and-found.index', compact('items', 'type'));
    }

    public function create()
    {
        return view('lost-and-found.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:lost,found',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'contact_info' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $item = new LostAndFoundItem($validated);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('lost_and_found', 'public');
            $item->image_path = $imagePath;
        }
        
        $item->save();
        
        return redirect()->route('lost-and-found.index', ['type' => $validated['type']])->with('success', 'Item reported successfully.');
    }

    public function resolve($id)
    {
        $item = LostAndFoundItem::findOrFail($id);
        
        $item->status = 'resolved';
        $item->save();
        
        return redirect()->route('lost-and-found.index', ['type' => $item->type])
            ->with('success', 'Item marked as resolved and sent to admin.');
    }
}
