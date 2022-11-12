<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $events = [];

        $appointments = Appointment::with(['client', 'employee'])->get();

        foreach($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->client->name . ' (' . $appointment->employee->name . ')',
                'start' => $appointment->start_time,
                'end'   => $appointment->finish_time,
            ];
        }
        // dd($events);

        return view('home', compact('events'));
    }
}
