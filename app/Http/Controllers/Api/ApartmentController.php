<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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

    // public function searchFilter(Request $request) 
    // {

    //     $query = Apartment::query();

    //     if ($request->filled('title')) {
    //         $query->where('title', 'like', '%' . $request->input('title') . '%');
    //     }

    //     if ($request->filled('address')) {
    //         $query->where('address', $request->input('address'));
    //     }

    //     if ($request->filled('price_min')) {
    //         $query->where('price', '>=', $request->input('price_min'));
    //     }

    //     if ($request->filled('price_max')) {
    //         $query->where('price', '<=', $request->input('price_max'));
    //     }

    //     if ($request->filled('people')) {
    //         $query->where('beds_numbers', '>=', $request->input('people'));
    //     }

    //     if ($request->filled('rooms')) {
    //         $query->where('rooms_numbers', '>=', $request->input('rooms'));
    //     }

    //     $services_selected = $request->input('services', []);

    //     foreach ($services_selected as $service) {

    //         $query->whereHas('services', function ($query) use ($service) {
    //             $query->where('name', $service);
    //         });
    //     }
    //     $appartamenti = $query->get();
    //     return view('risultati-ricerca', ['appartamenti' => $appartamenti]);

    // }

}
