<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LostAndFoundItem;
use Illuminate\Support\Facades\Storage;

class LostAndFoundController extends Controller
{
    public function index()
    {
        // Get all items, order by status (active first) then by creation date
        $items = LostAndFoundItem::orderBy('status', 'asc')
                                 ->orderBy('created_at', 'desc')
                                 ->get();
        return view('admin.lost-and-found.index', compact('items'));
    }

    public function edit(LostAndFoundItem $lost_and_found)
    {
        return view('admin.lost-and-found.edit', compact('lost_and_found'));
    }

    public function update(Request $request, LostAndFoundItem $lost_and_found)
    {
        $validated = $request->validate([
            'type' => 'required|in:lost,found',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'contact_info' => 'required|string|max:255',
            'status' => 'required|in:active,resolved',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($lost_and_found->image_path) {
                Storage::disk('public')->delete($lost_and_found->image_path);
            }
            $imagePath = $request->file('image')->store('lost_and_found', 'public');
            $validated['image_path'] = $imagePath;
        }

        $lost_and_found->update($validated);

        return redirect()->route('admin.lost-and-found.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(LostAndFoundItem $lost_and_found)
    {
        if ($lost_and_found->image_path) {
            Storage::disk('public')->delete($lost_and_found->image_path);
        }
        
        $lost_and_found->delete();
        
        return redirect()->route('admin.lost-and-found.index')->with('success', 'Item deleted successfully.');
    }
}
