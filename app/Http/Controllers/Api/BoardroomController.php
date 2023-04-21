<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Boardroom;
use App\Models\Reservation;
use Carbon\Carbon;

class BoardroomController extends Controller
{
    public function index()
    {
        return Boardroom::all();
    }

    public function getDate()
    {
        $date = date('Y-m-d');

        $expD = explode("-", $date);

        $Year = (int)$expD[0];
        $Month = (int)$expD[1];
        $Day = (int)$expD[2];

        return array($Year, $Month, $Day);
    }

    public function getAllReservations()
    {
        return Reservation::all();
    }

    public function getAllReservationsOfDate(Request $request)
    {
        $user_date = $request->route('date');
        $dates = DB::table('reservations')->where('date', $user_date)->get();
        return $dates;
    }
}
