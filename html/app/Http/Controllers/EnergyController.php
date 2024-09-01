<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EnergyController extends Controller
{
    public function consumpt()
    {
        return view('pages.energy.consumpt');
    }

    public function diff()
    {
        return view('pages.energy.diff');
    }

    public function hall()
    {
        return view('pages.energy.hall');
    }

    public function getConsumpt(Request $request)
    {
        /*
        $lastDatetime = DB::table('t_power')->orderBy('datetime', 'desc')->pluck('datetime')->first();
        $startTime = date("Y-m-d H:i:s", strtotime($lastDatetime.' - 1 minute'));
        $endTime = Carbon::now();
        //
        $data = DB::table('t_power')
            ->whereBetween('datetime', [$startTime, $endTime])
            ->get();
        */
        $n = 10;
        $data = DB::table('t_power')->orderBy('datetime', 'desc')
            ->take($n)
            ->get();

        if($request->input('format') === 'csv') {
            $data = array_map(fn($d) => [Carbon::parse($d->datetime)->setTimezone('UTC')->format('Y-m-d\TH:i:s\Z'), $d->voltage], $data->toArray());
            $data = array_merge([['Time', 'Value']], $data);

            $output = fopen('php://temp', 'r+');
        
                // Insert the data into the CSV
                foreach ($data as $row) {
                    fputcsv($output, $row);
                }
        
                rewind($output);
                $csv = stream_get_contents($output);

                // Close the buffer
                fclose($output);
                return response($csv, 200)
                ->header('Content-Type', 'text/plain');
        }

        return response()->json($data, 200);
    }

    public function getHall(Request $request)
    {
        // Example logic
        $data = DB::select('SELECT datetime, voltage, current, active FROM t_power');
        $arrays = array_map(function($obj) {
            return array_values(get_object_vars((object) [
                'datetime' => strtotime($obj->datetime), 
                'voltage' => (float)$obj->voltage,
                'current' => (float)$obj->current,
                'active' => (float)$obj->active,
            ]));
        }, $data);
        return response()->json($arrays, 200);
    }

    public function getDiff(Request $request)
    {
        $dStart1 =  date("Y-m-d H:i:s", strtotime($request->input('dStart').' - 1 minute'));
        $dStart2 =  date("Y-m-d H:i:s", strtotime($request->input('dStart').' + 1 minute'));
        $dEnd1 =  date("Y-m-d H:i:s", strtotime($request->input('dEnd').' - 1 minute'));
        $dEnd2 =  date("Y-m-d H:i:s", strtotime($request->input('dEnd').' + 1 minute'));
        //
        $eStart = DB::table('t_power')->whereBetween('datetime', [ $dStart1, $dStart2, ])->pluck('energy')->first();
        $eEnd = DB::table('t_power')->whereBetween('datetime', [ $dEnd1, $dEnd2, ])->pluck('energy')->first();
        //
        if($eStart && $eEnd) {
            $diff = ((float)$eEnd - (float)$eStart);
            return response()->json([
                'result' => $diff, 
                'status' => 'success',
                'energyStart' => $eStart, 
                'energyEnd' => $eEnd, 
                'dateStart' => [ $dStart1, $dStart2 ], 
                'dateEnd' => [ $dEnd1, $dEnd2 ], 
            ], 200);
        } else {
            return response()->json([
                'result' => 'Нет данных',
                'status' => 'error',
                'energyStart' => $eStart, 
                'energyEnd' => $eEnd, 
                'dateStart' => [ $dStart1, $dStart2 ], 
                'dateEnd' => [ $dEnd1, $dEnd2 ], 
            ], 200);
        }
    }
}
