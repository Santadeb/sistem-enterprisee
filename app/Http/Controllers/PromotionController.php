<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        Promotion::create($request->only(['name', 'description']));
        return redirect()->route('promotions.index')->with('success', 'Promosi berhasil ditambahkan.');
    }

    public function show($promotion_id)
    {
        $promotion = Promotion::findOrFail($promotion_id);
        return view('admin.promotions.show', compact('promotion'));
    }

    public function edit($promotion_id)
    {
        $promotion = Promotion::findOrFail($promotion_id);
        return view('admin.promotions.edit', compact('promotion'));
    }

    public function update(Request $request, $promotion_id)
    {
        $promotion = Promotion::findOrFail($promotion_id);

        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $promotion->update($request->only(['name', 'description']));
        return redirect()->route('promotions.index')->with('success', 'Promosi berhasil diperbarui.');
    }

    public function destroy($promotion_id)
    {
        $promotion = Promotion::findOrFail($promotion_id);
        $promotion->delete();
        return redirect()->route('promotions.index')->with('success', 'Promosi berhasil dihapus.');
    }
}
