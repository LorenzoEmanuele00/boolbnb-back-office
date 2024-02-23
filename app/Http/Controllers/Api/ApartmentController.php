<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class ApartmentController extends Controller
{
    public function index(Request $request)
    {
        $apartmentQuery = Apartment::with('images');

        if($request->has('address')){
            
            $lat_lon = $this->getCoordinatesFromAddress($request->address);
            if($lat_lon['coordinates'] == 'errore'){
                return response()->json([
                    'success' => false,
                    'message' => 'Nessun appartamento trovato'
                ]);
            }else {
                 $finalQuery = $this->scopeDistance($apartmentQuery, $lat_lon['coordinates']['lat'], $lat_lon['coordinates']['lon']);
            }
           
            
        }

        $finalQuery = $apartmentQuery->paginate(10);

        return response()->json([
            'results' => $finalQuery,
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

    public static function getCoordinatesFromAddress(string $address)
    {
        $client = new Client(['verify' => false]);
        $addressEncode = $address;
        $response = $client->get('https://api.tomtom.com/search/2/geocode/%27.' . $addressEncode . '.%27.json', [
            'query' => [
                // 'key' => 'bZhPA555PRZ2tCDM2RaSbbHm4xg1LwVn',
                'key' => '0Uo0D3xj0wcPYB8W6Ybk5SuoiIJK1I1M',
                'limit' => 1
            ]
        ]);
        error_log(print_r($response, true));
        $data = json_decode($response->getBody(), true);

        if (isset($data['results']) && count($data['results']) > 0) {
            $coordinates = $data['results'][0]['position'];
            return compact('coordinates');
        } else {
            $error = [
                'error'       => 'Indirizzo non trovato',
                'coordinates' => 'errore'
            ];
            return $error;
        }

    }

    public function scopeDistance($query, $from_latitude, $from_longitude, $distance = 20)
    {
        $between_coords = Apartment::calcCoordinates($from_longitude, $from_latitude, $distance);

        return $query
            ->where(function ($q) use ($between_coords) {
                $q->whereBetween('apartments.longitude', [$between_coords['min']['lng'], $between_coords['max']['lng']]);
            })
            ->where(function ($q) use ($between_coords) {
                $q->whereBetween('apartments.latitude', [$between_coords['min']['lat'], $between_coords['max']['lat']]);
            });
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
