<?php

namespace App\Models;

use App\Http\Requests\ClientSearchRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Class Flight
 * @package App\Models
 */
class Flight extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Departure airport
     *
     * @return BelongsTo
     */
    public function departureAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'departure_airport_id', 'id');
    }

    /**
     * Arrival airport
     *
     * @return BelongsTo
     */
    public function arrivalAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'arrival_airport_id', 'id');
    }

    /**
     * Transporter
     *
     * @return BelongsTo
     */
    public function transporter(): BelongsTo
    {
        return $this->belongsTo(Transporter::class);
    }

    /**
     * Flights search by departureAirport, arrivalAirport and departureDate
     *
     * @param ClientSearchRequest $request
     * @return Builder[]|Collection
     * @throws \Exception
     */
    public function search(ClientSearchRequest $request): array|Collection
    {
        $query = self::query();
        if ($departureAirport = $request->departureAirport) {
            $query->whereRelation('departureAirport', 'code', $departureAirport);
        }
        if ($arrivalAirport = $request->arrivalAirport) {
            $query->whereRelation('arrivalAirport', 'code', $arrivalAirport);
        }
        if ($departureDate = $request->departureDate) {
            $from = (new \DateTime($departureDate))->setTime(00, 00);
            $to = (new \DateTime($departureDate))->setTime(23, 59);
            $query->whereBetween('departure_datetime', [$from, $to]);
        }

        $flights = $query->orderBy('departure_datetime')->get();
        if (!$flights->count()) {
            throw new HttpResponseException(response()->json(['error' => 'Not found'], 400));
        }

        return $flights;
    }
}
