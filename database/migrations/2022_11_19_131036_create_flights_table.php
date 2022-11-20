<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $flights = [
        [
            'flight_number' => 'PS1234',
            'departure_airport_id' => 1,
            'arrival_airport_id' => 2,
            'transporter_id' => 1,
            'departure_datetime' => '2022-11-22 09:30',
            'arrival_datetime' => '2022-11-22 12:10',
            'duration' => 100,
        ],
        [
            'flight_number' => 'WT6574',
            'departure_airport_id' => 3,
            'arrival_airport_id' => 2,
            'transporter_id' => 2,
            'departure_datetime' => '2022-11-24 08:30',
            'arrival_datetime' => '2022-11-24 11:30',
            'duration' => 120,
        ],
        [
            'flight_number' => 'WT6222',
            'departure_airport_id' => 3,
            'arrival_airport_id' => 2,
            'transporter_id' => 2,
            'departure_datetime' => '2022-11-23 14:00',
            'arrival_datetime' => '2022-11-23 15:30',
            'duration' => 90,
        ],
        [
            'flight_number' => 'PT0125',
            'departure_airport_id' => 4,
            'arrival_airport_id' => 5,
            'transporter_id' => 3,
            'departure_datetime' => '2022-11-23 14:00',
            'arrival_datetime' => '2022-11-23 15:30',
            'duration' => 90,
        ],
        [
            'flight_number' => 'RO5874',
            'departure_airport_id' => 4,
            'arrival_airport_id' => 5,
            'transporter_id' => 4,
            'departure_datetime' => '2022-11-23 15:00',
            'arrival_datetime' => '2022-11-23 16:30',
            'duration' => 90,
        ],
        [
            'flight_number' => 'QW1234',
            'departure_airport_id' => 6,
            'arrival_airport_id' => 7,
            'transporter_id' => 5,
            'departure_datetime' => '2022-11-24 17:00',
            'arrival_datetime' => '2022-11-24 19:30',
            'duration' => 150,
        ],
        [
            'flight_number' => 'AS6589',
            'departure_airport_id' => 9,
            'arrival_airport_id' => 8,
            'transporter_id' => 6,
            'departure_datetime' => '2022-11-24 17:00',
            'arrival_datetime' => '2022-11-24 19:30',
            'duration' => 150,
        ],
        [
            'flight_number' => 'RE5241',
            'departure_airport_id' => 9,
            'arrival_airport_id' => 8,
            'transporter_id' => 7,
            'departure_datetime' => '2022-11-24 17:00',
            'arrival_datetime' => '2022-11-24 19:30',
            'duration' => 150,
        ],
        [
            'flight_number' => 'VB5263',
            'departure_airport_id' => 10,
            'arrival_airport_id' => 11,
            'transporter_id' => 8,
            'departure_datetime' => '2022-11-25 13:00',
            'arrival_datetime' => '2022-11-25 15:00',
            'duration' => 60,
        ],
        [
            'flight_number' => 'BN8965',
            'departure_airport_id' => 12,
            'arrival_airport_id' => 13,
            'transporter_id' => 9,
            'departure_datetime' => '2022-11-25 13:00',
            'arrival_datetime' => '2022-11-25 15:00',
            'duration' => 60,
        ],
        [
            'flight_number' => 'ZV2130',
            'departure_airport_id' => 12,
            'arrival_airport_id' => 13,
            'transporter_id' => 10,
            'departure_datetime' => '2022-11-25 13:00',
            'arrival_datetime' => '2022-11-25 16:00',
            'duration' => 120,
        ],
        [
            'flight_number' => 'HG3321',
            'departure_airport_id' => 1,
            'arrival_airport_id' => 2,
            'transporter_id' => 10,
            'departure_datetime' => '2022-11-26 13:00',
            'arrival_datetime' => '2022-11-26 16:00',
            'duration' => 180,
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number');
            $table->foreignId('departure_airport_id')->references('id')->on('airports');
            $table->foreignId('arrival_airport_id')->references('id')->on('airports');
            $table->foreignId('transporter_id')->constrained();
            $table->timestamp('departure_datetime');
            $table->timestamp('arrival_datetime');
            $table->integer('duration');
        });

        foreach ($this->flights as $flight) {
            DB::table('flights')->insert([
                'flight_number' => $flight['flight_number'],
                'departure_airport_id' => $flight['departure_airport_id'],
                'arrival_airport_id' => $flight['arrival_airport_id'],
                'transporter_id' => $flight['transporter_id'],
                'departure_datetime' => $flight['departure_datetime'],
                'arrival_datetime' => $flight['arrival_datetime'],
                'duration' => $flight['duration'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
};
