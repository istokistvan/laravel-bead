<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class SearchHistoryController extends Controller
{
    public function store(Request $request)
    {
        $valid = $request->validate([
            'license' => 'required|string',
            'regex:/^\w{3}-?\d{3}/',
        ]);

        if (!$valid) {
            return redirect()->route('welcome', ['error_message' => 'Nem megfelelő adatok!']);
        }

        $license = strtoupper($request->input('license'));
        if (!str_contains($license, '-')) {
            $license = substr($license, 0, 3) . '-' . substr($license, 3);
        }

        $vehicle = Vehicle::where('license', $license)->first();

        if ($vehicle) {
            History::factory()->create([
                'license' => $license,
                'date' => now(),
                'user_id' => auth()->user()->id
            ]);

            return redirect()->route('vehicle.show', ['vehicle' => $license]);
        } else {
            return redirect()->route('welcome', ['error_message' => 'Az adott jármű nem található!']);
        }
    }
}
