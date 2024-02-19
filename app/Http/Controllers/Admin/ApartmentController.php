<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $apartment = new Apartment();
        $apartment->fill($form_data);

        $lat_lon = $this->getCoordinatesFromAddress($apartment->address);
        $apartment->longitude = $lat_lon['coordinates']['lon'];
        $apartment->latitude  = $lat_lon['coordinates']['lat'];

        $apartment->save();
        return redirect()->route('admin.apartments.show', ['apartment' => $apartment->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public static function getCoordinatesFromAddress(string $address): array
    {
        $client = new Client(['verify' => false]);
        $addressEncode = $address;
        $response = $client->get('https://api.tomtom.com/search/2/geocode/%27.'.$addressEncode.'.%27.json', [
            'query' => [
                'key' => 'bZhPA555PRZ2tCDM2RaSbbHm4xg1LwVn',
                'limit' => 1
            ]
        ]);
        error_log(print_r($response,true));
        $data = json_decode($response->getBody(), true);
        $coordinates = $data['results'][0]['position'];
        return compact('coordinates');
    }
}
