<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Exception;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function create(Request $request)
    {
        try {

            // Validate the request data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'serial_number' => 'required|string|max:255|unique:assets',
                'status' => 'required|string|max:50',
            ]);

            // Create a new asset
            $asset = Asset::create($validated);

            return response()->json([
                'message' => 'Asset created successfully',
                'asset' => $asset,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to create asset',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function fetch($id)
    {
        try {
            $asset = Asset::with(['inspections' => function ($query) {
                $query->orderBy('id', 'desc')->limit(3);
            }])->findOrFail($id);

            return response()->json([
                'asset' => $asset,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch asset',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
