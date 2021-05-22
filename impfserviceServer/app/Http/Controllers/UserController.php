<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacevent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUser(int $id) {
        $user = User::where('id', $id)->get()->first();
        return $user;
    }

    public function update(Request $request, string $id) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $user = User::with(['vacevent'])
                ->where('id', $id)->first();
            if ($user != null) {

                $request = $this->parseRequest($request);
                $user->update($request->all());

                if (isset($request['vacevent_id'])) {
                    $vacev = Vacevent::find($request->vacevent_id);
                    $user->vacevent()->associate($vacev);
                }
                $user->save();
            }
            DB::commit();

            // return a vaild http response
            return response()->json($user, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating User failed: " . $e->getMessage(), 420);
        }
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
