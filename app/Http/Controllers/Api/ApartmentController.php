<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with('images')->paginate(10);

        return response()->json([
            'results' => $apartments,
            'success' => true
        ]);
    }

    public function show(string $slug)
    {

        $apartment = Apartment::with('images', 'services')->where('slug', $slug)->first();

        if($apartment) {
            return response()->json([
                'results' => $apartment,
                'success' => true 
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Nessun appartamento trovato'
            ]);
        }

    }

    

}
