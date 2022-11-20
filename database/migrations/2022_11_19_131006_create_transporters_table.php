<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $transporters = [
        [
            'name' => 'Saudi Arabian Airlines',
            'code' => 'SV',
        ],
        [
            'name' => 'Kharkiv Airlines',
            'code' => 'KT',
        ],
        [
            'name' => 'SriLankan Airlines',
            'code' => 'UL',
        ],
        [
            'name' => 'Avianova',
            'code' => 'AO',
        ],
        [
            'name' => 'Aurora',
            'code' => 'HZ',
        ],
        [
            'name' => 'Austrian Airlines',
            'code' => 'OS',
        ],
        [
            'name' => 'Adria Airways',
            'code' => 'JP',
        ],
        [
            'name' => 'AZAL - Azerbaijan Airlines',
            'code' => 'J2',
        ],
        [
            'name' => 'Azimuth',
            'code' => 'A4',
        ],
        [
            'name' => 'Azur Air',
            'code' => 'ZF',
        ],
        [
            'name' => 'Azur Air Ukraine',
            'code' => 'QU',
        ],
        [
            'name' => 'I Fly',
            'code' => 'I4',
        ],
        [
            'name' => 'Icelandair',
            'code' => 'FI',
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
        });

        foreach ($this->transporters as $transporter) {
            DB::table('transporters')->insert([
                'name' => $transporter['name'],
                'code' => $transporter['code'],
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
        Schema::dropIfExists('transporters');
    }
};
