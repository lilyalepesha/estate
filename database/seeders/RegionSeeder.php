<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * @var string
     */
    protected string $model = Region::class;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regions')->insertOrIgnore([
            [
                'name' => 'Гродно',
                'street' => 'ул.Советская 52 ',
            ],
            [
                'name' => 'Минск',
                'street' => 'ул.Горького 88'
            ],
            [
                'name' => 'Витебск',
                'street' => 'ул.Карского 98'
            ],
            [
                'name' => 'Гомель',
                'street' => 'ул.Богдановича 78'
            ],
            [
                'name' => 'Брест',
                'street' => 'ул.Социалистическая 78'
            ]
        ]);
    }
}
