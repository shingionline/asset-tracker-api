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

            // Return a success response with the created asset
            return response()->json([
                'message' => 'Asset created successfully',
                'asset' => $asset,
            ], 200);

        } catch (Exception $e) {

            // Return an error response if something goes wrong
            return response()->json([
                'error' => 'Failed to create asset',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function fetch($id)
    {
        try {

            // Fetch the asset with 3 inspections
            $asset = Asset::with(['inspections' => function ($query) {
                $query->orderBy('id', 'desc')->limit(3);
            }])->findOrFail($id);

            // Return the asset
            return response()->json([
                'asset' => $asset,
            ], 200);

        } catch (Exception $e) {

            // Return an error response if something goes wrong
            return response()->json([
                'error' => 'Failed to fetch asset',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
