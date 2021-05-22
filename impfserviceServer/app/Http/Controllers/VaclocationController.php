<?php

namespace App\Http\Controllers;

use App\Models\Vaclocation;
use Illuminate\Http\Request;

class VaclocationController extends Controller
{
    public function getLocationsByState(string $state) {
        $vaclocations = Vaclocation::where('state', $state)->get();
        return $vaclocations;
    }

    public function getLocationsById(int $id) {
        $vaclocation = Vaclocation::where('id', $id)->get()->first();
        return $vaclocation;
    }
}
