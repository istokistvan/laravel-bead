<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function show(string $license)
    {
        $vehicle = Vehicle::where('license', $license)->first();
        if ($vehicle) {
            $incidents = $vehicle->damageEvents;
            return view('vehicle.show', ['vehicle' => $vehicle, 'incidents' => $incidents]);
        }
        return redirect()->route('vehicle.show', ['vehicle' => $license]);
    }

    public function create()
    {
        return view('vehicle.create');
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'license' => 'required|regex:/^\w{3}-?\d{3}/',
            'brand' => 'required|string',
            'type' => 'required|string',
            'creationYear' => 'required|integer',
            'picture' => 'required|file|mimes:jpg,jpeg,png,webp|max:4096'
        ]);

        if (!$valid) {
            return redirect()->route('welcome', ['error_message' => 'Nem megfelelő adatok!']);
        }

        $license = strtoupper($request->input('license'));
        if (!str_contains($license, '-')) {
            $license = substr($license, 0, 3) . '-' . substr($license, 3);
        }
        $vehicle = Vehicle::where('license', $license)->first();

        $file = $request->file('picture');
        $picture_name = $file->hashName();

        if (!$vehicle) {
            Storage::disk('public')->put('images/' . $picture_name, $file->get());
            Vehicle::create([
                'license' => $license,
                'brand' => $request->input('brand'),
                'type' => $request->input('type'),
                'creationYear' => $request->input('creationYear'),
                'picture' => $picture_name
            ]);
        } else {
            return redirect()->route('welcome', ['error_message' => 'Az adott jármű már létezik!']);
        }

        return redirect()->route('vehicle.show', ['vehicle' => $license]);
    }
}
