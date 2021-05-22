<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Seeder;

class VaclocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaclocation = new \App\Models\Vaclocation;
        $vaclocation->name = 'Forum Kloster';
        $vaclocation->street = 'Nitscha';
        $vaclocation->houseNumber = '258';
        $vaclocation->postalCode = 8200;
        $vaclocation->city = 'Gleisdorf';
        $vaclocation->state = 'Steiermark';

        $vaclocation2 = new \App\Models\Vaclocation;
        $vaclocation2->name = 'Sporthalle C';
        $vaclocation2->street = 'Himmelbachweg';
        $vaclocation2->houseNumber = '74';
        $vaclocation2->postalCode = 5020;
        $vaclocation2->city = 'Salzburg';
        $vaclocation2->state = 'Salzburg';

        $vaclocation3 = new \App\Models\Vaclocation;
        $vaclocation3->name = 'Feuerwehrhaus B';
        $vaclocation3->street = 'Himmelbachweg';
        $vaclocation3->houseNumber = '85';
        $vaclocation3->postalCode = 5020;
        $vaclocation3->city = 'Salzburg';
        $vaclocation3->state = 'Salzburg';

        $vaclocation4 = new \App\Models\Vaclocation;
        $vaclocation4->name = 'Stadthalle';
        $vaclocation4->street = 'Fürstenfelder Straße';
        $vaclocation4->houseNumber = '14';
        $vaclocation4->postalCode = 6330;
        $vaclocation4->city = 'Kufstein';
        $vaclocation4->state = 'Tirol';

        $vaclocation5 = new \App\Models\Vaclocation;
        $vaclocation5->name = 'Kinderzentrum';
        $vaclocation5->street = 'Angerbachweg';
        $vaclocation5->houseNumber = '74';
        $vaclocation5->postalCode = 5020;
        $vaclocation5->city = 'Salzburg';
        $vaclocation5->state = 'Salzburg';

        $vaclocation6 = new \App\Models\Vaclocation;
        $vaclocation6->name = 'Vereinsheim';
        $vaclocation6->street = 'Landstraße';
        $vaclocation6->houseNumber = '14';
        $vaclocation6->postalCode = 6370;
        $vaclocation6->city = 'Kitzbühel';
        $vaclocation6->state = 'Tirol';

        $vaclocation7 = new \App\Models\Vaclocation;
        $vaclocation7->name = 'Rathaus';
        $vaclocation7->street = 'Herrengasse';
        $vaclocation7->houseNumber = '1';
        $vaclocation7->postalCode = 8110;
        $vaclocation7->city = 'Graz';
        $vaclocation7->state = 'Steiermark';

        $vaclocation8 = new \App\Models\Vaclocation;
        $vaclocation8->name = 'Stadthalle A';
        $vaclocation8->street = 'Platzweg';
        $vaclocation8->houseNumber = '19';
        $vaclocation8->postalCode = 6020;
        $vaclocation8->city = 'Innsbruck';
        $vaclocation8->state = 'Tirol';

        $vaclocation9 = new \App\Models\Vaclocation;
        $vaclocation9->name = 'Rathaus';
        $vaclocation9->street = 'Nitschaweg';
        $vaclocation9->houseNumber = '360';
        $vaclocation9->postalCode = 9010;
        $vaclocation9->city = 'Klagenfurt';
        $vaclocation9->state = 'Kärnten';

        $vaclocation->save();
        $vaclocation2->save();
        $vaclocation3->save();
        $vaclocation4->save();
        $vaclocation5->save();
        $vaclocation6->save();
        $vaclocation7->save();
        $vaclocation8->save();
        $vaclocation9->save();

    }
}
