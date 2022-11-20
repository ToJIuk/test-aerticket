<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ClientController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function search(Request $request): View
    {
        $response = [];
        if ($request->post()) {
            request()->request->add([
                'searchQuery' => [
                    'departureAirport' => $request->departureAirport,
                    'arrivalAirport' => $request->arrivalAirport,
                    'departureDate' => $request->departureDate,
                ],
            ]);
            $apiRequest = Request::create(config('app.url') . '/api/flights/search', 'POST');
            $apiRequest->headers->set('Authorization', 'Basic ' . base64_encode($request->login . ':' . $request->password));
            $apiRequest->acceptsJson();
            $response = Route::dispatch($apiRequest)->getData(true);
        }

        return view('client.index', compact('response'));
    }
}
