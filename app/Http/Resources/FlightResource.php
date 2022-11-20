<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Nette\Utils\DateTime;

/**
 * Class FlightResource
 * @package App\Http\Resources
 */
class FlightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'transporter' => new TransporterResource($this->transporter),
            'flightNumber' => $this->flight_number,
            'departureAirport' => $this->departureAirport->code,
            'arrivalAirport' => $this->arrivalAirport->code,
            'departureDateTime' => (new DateTime($this->departure_datetime))->format('Y-m-d H:i'),
            'arrivalDateTime' => (new DateTime($this->arrival_datetime))->format('Y-m-d H:i'),
            'duration' => $this->duration,
        ];
    }
}
