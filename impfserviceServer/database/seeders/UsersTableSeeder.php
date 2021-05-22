<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;
        $user->firstName = 'Sandra';
        $user->lastName = 'Huber';
        $user->admin = false;
        $user->gender = 'female';
        $user->dateOfBirth = new Carbon();
        $user->svnr = 2563145;
        $user->phoneNr = 98765445;
        $user->street = 'Nitscha';
        $user->houseNumber = '258';
        $user->postalCode = 8200;
        $user->city = 'Gleisdorf';
        $user->vacStatus = false;
        $user->email = 'test@gmail.com';
        $user->password = bcrypt('mau');
        $vacevent = \App\Models\Vacevent::all()->first();
        $user->vacevent()->associate($vacevent);


        $user2 = new \App\Models\User;
        $user2->firstName = 'Hanna';
        $user2->lastName = 'Simmer';
        $user2->admin = false;
        $user2->gender = 'female';
        $user2->dateOfBirth = new Carbon();
        $user2->svnr = 5994597;
        $user2->phoneNr = 5676316;
        $user2->street = 'Fürstenfelder Straße';
        $user2->houseNumber = '12a/25';
        $user2->postalCode = 8200;
        $user2->city = 'Gleisdorf';
        $user2->vacStatus = false;
        $user2->email = 'test2@gmail.com';
        $user2->password = bcrypt('mau');
        $vacevent2 = \App\Models\Vacevent::all()->last();
        $user2->vacevent()->associate($vacevent2);

        $user3 = new \App\Models\User;
        $user3->firstName = 'Teresa';
        $user3->lastName = 'Himmel';
        $user3->admin = false;
        $user3->gender = 'female';
        $user3->dateOfBirth = new Carbon();
        $user3->svnr = 64236556;
        $user3->phoneNr = 254896321;
        $user3->street = 'Bachweg';
        $user3->houseNumber = '14';
        $user3->postalCode = 8200;
        $user3->city = 'Gleisdorf';
        $user3->vacStatus = false;
        $user3->email = 'test3@gmail.com';
        $user3->password = bcrypt('mau');
        $vacevent3 = \App\Models\Vacevent::all()->get('id', 2);
        $user3->vacevent()->associate($vacevent3);

        $user4 = new \App\Models\User;
        $user4->firstName = 'Eva';
        $user4->lastName = 'Neuherz';
        $user4->admin = false;
        $user4->gender = 'female';
        $user4->dateOfBirth = new Carbon();
        $user4->svnr = 2561458;
        $user4->phoneNr = 664911051354954;
        $user4->street = 'Nitscha';
        $user4->houseNumber = '214';
        $user4->postalCode = 8200;
        $user4->city = 'Gleisdorf';
        $user4->vacStatus = false;
        $user4->email = 'test4@gmail.com';
        $user4->password = bcrypt('mau');
        $user4->vacevent()->associate($vacevent3);

        $user5 = new \App\Models\User;
        $user5->firstName = 'Linda';
        $user5->lastName = 'Neuhold';
        $user5->admin = true;
        $user5->gender = 'female';
        $user5->dateOfBirth = new Carbon();
        $user5->svnr = 5645416;
        $user5->phoneNr = 66491105165444;
        $user5->street = 'Nitscha';
        $user5->houseNumber = '214';
        $user5->postalCode = 8200;
        $user5->city = 'Gleisdorf';
        $user5->vacStatus = false;
        $user5->email = 'test5@gmail.com';
        $user5->password = bcrypt('mau');
        $user5->vacevent()->associate($vacevent3);

        $user6 = new \App\Models\User;
        $user6->firstName = 'Susi';
        $user6->lastName = 'Stein';
        $user6->admin = true;
        $user6->gender = 'female';
        $user6->dateOfBirth = new Carbon();
        $user6->svnr = 89456545;
        $user6->phoneNr = 664646357686;
        $user6->street = 'Fachbachweg';
        $user6->houseNumber = '12';
        $user6->postalCode = 8200;
        $user6->city = 'Gleisdorf';
        $user6->vacStatus = true;
        $user6->email = 'test6@gmail.com';
        $user6->password = bcrypt('mau');
        $user6->vacevent()->associate($vacevent3);

        $user7 = new \App\Models\User;
        $user7->firstName = 'Herbert';
        $user7->lastName = 'Neuherz';
        $user7->admin = false;
        $user7->gender = 'female';
        $user7->dateOfBirth = new Carbon();
        $user7->svnr = 98465346;
        $user7->phoneNr = 66464578943;
        $user7->street = 'Nitscha';
        $user7->houseNumber = '214';
        $user7->postalCode = 8200;
        $user7->city = 'Gleisdorf';
        $user7->vacStatus = true;
        $user7->email = 'test7@gmail.com';
        $user7->password = bcrypt('mau');
        $user7->vacevent()->associate($vacevent3);

        $user8 = new \App\Models\User;
        $user8->firstName = 'Elfride';
        $user8->lastName = 'Maier';
        $user8->admin = false;
        $user8->gender = 'female';
        $user8->dateOfBirth = new Carbon();
        $user8->svnr = 98465346;
        $user8->phoneNr = 664911051354954;
        $user8->street = 'Nitscha';
        $user8->houseNumber = '214';
        $user8->postalCode = 8200;
        $user8->city = 'Gleisdorf';
        $user8->vacStatus = false;
        $user8->email = 'test8@gmail.com';
        $user8->password = bcrypt('mau');

        $user->save();
        $user2->save();
        $user3->save();
        $user4->save();
        $user5->save();
        $user6->save();
        $user7->save();
        $user8->save();
    }
}
