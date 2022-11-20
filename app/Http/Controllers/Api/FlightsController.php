<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientSearchRequest;
use App\Http\Resources\FlightCollection;
use App\Models\Flight;
use Illuminate\Http\Request;

/**
 * Class FlightsController
 * @package App\Http\Controllers\Api
 */
class FlightsController extends Controller
{
    /**
     * Flights search
     *
     */
    public function search(ClientSearchRequest $request, Flight $flight)
    {
        $flights = $flight->search($request);

        return new FlightCollection($flights);
    }
}
