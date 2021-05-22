<?php

namespace App\Http\Controllers;

use App\Models\Vacevent;
use App\Models\Vaclocation;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VaceventController extends Controller
{
    public function index() {
        /*
         * load all vacevents and relations with eager loading (sofort laden), Gegenteil lazy (erst wenn anfrage)
         */
        $vacevents = Vacevent::with(['vaclocation'])->get();
        return $vacevents;
    }

    public function getUsers(int $id) {
        $users = User::where('vacevent_id', $id)->get()->count();
        return $users;
    }

    public function findByState(string $state) {
        $vacevents = Vacevent::with(['vaclocation'])
            ->whereHas('vaclocation', function ($query) use ($state) {
                $query->where('state', 'LIKE', '%' . $state . '%');
            })->orderBy('date')->get();
        $vaceventArray = [];
        foreach ($vacevents as $vacev){
            $vacev->setAttribute('userAmount', $this->getUsers($vacev->id));
            array_push($vaceventArray, $vacev);
        }
        return $vaceventArray;
    }

    public function findDetailsByID(int $id) {
        $vacevent = Vacevent::with(['vaclocation', 'users'])
            ->where('id', 'LIKE', '%' . $id . '%')
            ->first();
        return $vacevent;
    }

    /**
     * create new Vacevent
     */
    public function save(Request $request) : JsonResponse  {
        $request = $this->parseRequest($request);
        DB::beginTransaction();
        try {
            $vacevent = Vacevent::create($request->all());
            // save vaclocation
            if (isset($request['vaclocation_id'])) {
                $vacloc = Vaclocation::find($request->vaclocation_id);
                $vacevent->vaclocation()->associate($vacloc);
            }
            DB::commit();
            // return a valid http response
            return response()->json($vacevent, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving the Vaccination Event failed: " . $e->getMessage(), 420);
        }
    }

    public function update(Request $request, string $id) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $vacevent = Vacevent::with(['vaclocation', 'users'])
                ->where('id', $id)->first();
            if ($vacevent != null) {

                $request = $this->parseRequest($request);
                $vacevent->update($request->all());

                if (isset($request['vaclocation_id'])) {
                    $vacloc = Vaclocation::find($request->vaclocation_id);
                    $vacevent->vaclocation()->associate($vacloc);
                }

                if (isset($request['users']) && is_array($request['users'])) {
                    foreach ($request['users'] as $user) {
                        $vacevent->users()->save(User::where("id", $user["id"])->first());
                    }
                }

                $vacevent->save();
            }
            DB::commit();

            // return a vaild http response
            return response()->json($vacevent, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating Vacevent failed: " . $e->getMessage(), 420);
        }
    }

    /**
     * returns 200 if Vacevent deleted successfully, throws excpetion if not
     */
    public function delete(string $id) : JsonResponse
    {
        $vacevent = Vacevent::where('id', $id)->first();
        if ($vacevent != null) {
            $vacevent->delete();
        }
        else
            throw new \Exception("Vacevent couldn't be deleted - it does not exist");
        return response()->json('Vacevent (' . $id . ') successfully deleted', 200);
    }

    /**
     * modify / convert values if needed
     */
    private function parseRequest(Request $request) : Request {
        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z"
        $startTime = new \DateTime($request->startTime);
        $request['startTime'] = $startTime;
        $endTime = new \DateTime($request->endTime);
        $request['endTime'] = $endTime;
        $date = new \Carbon\Carbon($request->date);
        $request['date'] = $date;
        return $request;
    }

}
