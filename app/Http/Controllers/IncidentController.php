<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{

    public function __construct()
    {
        $this->middleware('premium');
    }

    public function show(Incident $incident)
    {
        return view('incident.show', ['incident' => $incident]);
    }
}
