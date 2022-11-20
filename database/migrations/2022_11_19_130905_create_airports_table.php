<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** @var array|string[][] */
    private array $airports = [
        [
            'code' => 'ATL',
            'title' => 'Hartsfield Jackson Atlanta International Airport',
            'country' => 'USA',
        ],
        [
            'code' => 'HND',
            'title' => 'Tokyo Haneda International Airport',
            'country' => 'Japan',
        ],
        [
            'code' => 'CDG',
            'title' => 'Charles de Gaulle International Airport',
            'country' => 'France',
        ],
        [
            'code' => 'FRA',
            'title' => 'Frankfurt am Main Airport',
            'country' => 'Germany',
        ],
        [
            'code' => 'JFK',
            'title' => 'John F Kennedy International Airport',
            'country' => 'USA',
        ],
        [
            'code' => 'CGK',
            'title' => 'Soekarno-Hatta International Airport',
            'country' => 'Indonesia',
        ],
        [
            'code' => 'MAD',
            'title' => 'Adolfo Suárez Madrid–Barajas Airport',
            'country' => 'Spain',
        ],
        [
            'code' => 'LAS',
            'title' => 'McCarran International Airport',
            'country' => 'USA',
        ],
        [
            'code' => 'CTU',
            'title' => 'Chengdu Shuangliu International Airport',
            'country' => 'China',
        ],
        [
            'code' => 'SEA',
            'title' => 'Seattle Tacoma International Airport',
            'country' => 'USA',
        ],
        [
            'code' => 'BOM',
            'title' => 'Chhatrapati Shivaji International Airport',
            'country' => 'India',
        ],
        [
            'code' => 'MIA',
            'title' => 'Miami International Airport',
            'country' => 'USA',
        ],
        [
            'code' => 'CLT',
            'title' => 'Charlotte Douglas International Airport',
            'country' => 'USA',
        ],
        [
            'code' => 'YYZ',
            'title' => 'Lester B. Pearson International Airport',
            'country' => 'Canada',
        ],
        [
            'code' => 'BCN',
            'title' => 'Barcelona International Airport',
            'country' => 'Spain',
        ],
        [
            'code' => 'PHX',
            'title' => 'Phoenix Sky Harbor International Airport',
            'country' => 'USA',
        ],
        [
            'code' => 'LGW',
            'title' => 'London Gatwick Airport',
            'country' => 'United Kingdom',
        ],
        [
            'code' => 'MUC',
            'title' => 'Munich Airport',
            'country' => 'Germany',
        ],
        [
            'code' => 'TPE',
            'title' => 'Taiwan Taoyuan International Airport',
            'country' => 'Taiwan',
        ],
        [
            'code' => 'SYD',
            'title' => 'Sydney Kingsford Smith International Airport',
            'country' => 'Australia',
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('country');
            $table->string('code')->unique();
        });

        foreach ($this->airports as $airport) {
            DB::table('airports')->insert([
                'title' => $airport['title'],
                'country' => $airport['country'],
                'code' => $airport['code'],
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
        Schema::dropIfExists('airports');
    }
};
