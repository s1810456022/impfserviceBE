<?php

namespace Database\Seeders;

use DateTime;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VaceventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vacevent = new \App\Models\Vacevent;
        $vacevent->date = new Carbon();
        $vacevent->startTime = new DateTime();
        $vacevent->endTime = new DateTime();
        $vacevent->maxVac = 11;
        $vaclocation = \App\Models\Vaclocation::all()->first();
        $vacevent->vaclocation()->associate($vaclocation);

        $vacevent2 = new \App\Models\Vacevent;
        $vacevent2->date = new Carbon();
        $vacevent2->startTime = new DateTime();
        $vacevent2->endTime = new DateTime();
        $vacevent2->maxVac = 12;
        $vaclocation2 = \App\Models\Vaclocation::all()->get('id', 3);
        $vacevent2->vaclocation()->associate($vaclocation2);

        $vacevent3 = new \App\Models\Vacevent;
        $vacevent3->date = new Carbon();
        $vacevent3->startTime = new DateTime();
        $vacevent3->endTime = new DateTime();
        $vacevent3->maxVac = 52;
        $vaclocation3 = \App\Models\Vaclocation::all()->get('id',2);
        $vacevent3->vaclocation()->associate($vaclocation3);

        $vacevent4 = new \App\Models\Vacevent;
        $vacevent4->date = new Carbon();
        $vacevent4->startTime = new DateTime();
        $vacevent4->endTime = new DateTime();
        $vacevent4->maxVac = 47;
        $vaclocation4 = \App\Models\Vaclocation::all()->get('id',4);
        $vacevent4->vaclocation()->associate($vaclocation4);

        $vacevent5 = new \App\Models\Vacevent;
        $vacevent5->date = new Carbon();
        $vacevent5->startTime = new DateTime();
        $vacevent5->endTime = new DateTime();
        $vacevent5->maxVac = 21;
        $vaclocation5 = \App\Models\Vaclocation::all()->get('id',5);
        $vacevent5->vaclocation()->associate($vaclocation5);

        $vacevent6 = new \App\Models\Vacevent;
        $vacevent6->date = new Carbon();
        $vacevent6->startTime = new DateTime();
        $vacevent6->endTime = new DateTime();
        $vacevent6->maxVac = 58;
        $vacevent6->vaclocation()->associate($vaclocation5);

        $vacevent7 = new \App\Models\Vacevent;
        $vacevent7->date = new Carbon();
        $vacevent7->startTime = new DateTime();
        $vacevent7->endTime = new DateTime();
        $vacevent7->maxVac = 33;
        $vaclocation7 = \App\Models\Vaclocation::all()->get('id',7);
        $vacevent7->vaclocation()->associate($vaclocation7);

        $vacevent8 = new \App\Models\Vacevent;
        $vacevent8->date = new Carbon();
        $vacevent8->startTime = new DateTime();
        $vacevent8->endTime = new DateTime();
        $vacevent8->maxVac = 26;
        $vacevent8->vaclocation()->associate($vaclocation3);

        $vacevent->save();
        $vacevent2->save();
        $vacevent3->save();
        $vacevent4->save();
        $vacevent5->save();
        $vacevent6->save();
        $vacevent7->save();
        $vacevent8->save();
    }
}
