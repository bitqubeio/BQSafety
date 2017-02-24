<?php

namespace App\Http\Controllers;

use App\Reportsheet;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class DashboardController extends Controller
{
    public function home()
    {
        /*
        |--------------------------------------------------------------------------
        | Report Graphic Now
        |--------------------------------------------------------------------------
        */

        for ($i = 0; $i < 7; $i++) {
            $reports[$i] = Reportsheet::whereDate('created_at', '=', Date::now()->sub($i . ' day')->format('Y-m-d'))
                ->where('user_id', auth()->user()->id)
                ->count();
            $days[$i] = Date::now()->sub($i . ' day')->format('D d');
        }

        $days[0] = 'hoy';

        $nowChartjs = app()->chartjs
            ->name('nowChartjs')
            ->type('bar')
            ->labels(array_reverse($days))
            ->datasets([
                [
                    "label" => "Reportes por día",
                    'backgroundColor' => [
                        'rgba(31, 72, 124, 0.2)',
                        'rgba(192, 80, 78, 0.2)',
                        'rgba(247, 150, 71, 0.2)',
                        'rgba(96, 74, 123, 0.2)',
                        'rgba(79, 129, 188, 0.2)',
                        'rgba(74, 172, 197, 0.2)',
                        'rgba(155, 187, 88, 0.2)'
                    ],
                    'borderColor' => [
                        'rgba(31, 72, 124, 1)',
                        'rgba(192, 80, 78, 1)',
                        'rgba(247, 150, 71, 1)',
                        'rgba(96, 74, 123, 1)',
                        'rgba(79, 129, 188, 1)',
                        'rgba(74, 172, 197, 1)',
                        'rgba(155, 187, 88, 1)'
                    ],
                    'borderWidth' => 1,
                    'data' => array_reverse($reports)
                ]
            ])
            ->options([
                'scales' => [
                    'yAxes' => [[
                        'ticks' => [
                            'min' => 0,
                            'stepSize' => 1
                        ]
                    ]]
                ]
            ]);

        /*
        |--------------------------------------------------------------------------
        | last reports
        |--------------------------------------------------------------------------
        */

        $reports = Reportsheet::orderBy('reportsheets.created_at', 'DESC')
            ->where('user_id', auth()->user()->id)
            ->join('locations', 'locations.id', '=', 'reportsheets.location_id')
            ->select('reportsheets.id', 'location_name', 'reportsheet_description', 'reportsheet_status')
            ->take(10)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Pie Report Graphic
        |--------------------------------------------------------------------------
        */

        $total = Reportsheet::select('reportsheet_classification')->get();

        $var1 = $var2 = $var3 = $var4 = $var5 = $var6 = null;

        for ($i = 0; $i <= count($total) - 1; $i++) {
            $value = $total[$i]->reportsheet_classification;
            $values = explode(',', $value);
            in_array(1, $values) ? $var1++ : null;
            in_array(2, $values) ? $var2++ : null;
            in_array(3, $values) ? $var3++ : null;
            in_array(4, $values) ? $var4++ : null;
            in_array(5, $values) ? $var5++ : null;
            in_array(6, $values) ? $var6++ : null;
        }

        $pieChartjs = app()->chartjs
            ->name('pieChartjs')
            ->type('pie')
            ->labels(['Accidente Seguridad', 'Incidente Seguridad', 'Acto Subestandar', 'Accidente Ambiental', 'Incidente Ambiental', 'Condición Subestandar'])
            ->datasets([
                [
                    'backgroundColor' => [
                        'rgba(226,86,104,0.8)',
                        'rgba(207,86,226,0.8)',
                        'rgba(138,86,226,0.8)',
                        'rgba(104,226,86,0.8)',
                        'rgba(226,207,86,0.8)',
                        'rgba(226,137,86,0.8)'
                    ],
                    'hoverBackgroundColor' => [
                        'rgba(226,86,104,1)',
                        'rgba(207,86,226,1)',
                        'rgba(138,86,226,1)',
                        'rgba(104,226,86,1)',
                        'rgba(226,207,86,1)',
                        'rgba(226,137,86,1)'
                    ],
                    'data' => [$var1, $var2, $var3, $var4, $var5, $var6]
                ]
            ])
            ->options([]);

        return view('home', compact('nowChartjs', 'pieChartjs', 'reports'));
    }

    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Report Graphic Now
        |--------------------------------------------------------------------------
        */

        for ($i = 0; $i < 7; $i++) {
            $reports[$i] = Reportsheet::whereDate('created_at', '=', Date::now()->sub($i . ' day')->format('Y-m-d'))
                ->where('user_id', auth()->user()->id)
                ->count();
            $days[$i] = Date::now()->sub($i . ' day')->format('D d');
        }

        $days[0] = 'hoy';

        $nowChartjs = app()->chartjs
            ->name('nowChartjs')
            ->type('bar')
            ->labels(array_reverse($days))
            ->datasets([
                [
                    "label" => "Reportes por día",
                    'backgroundColor' => [
                        'rgba(31, 72, 124, 0.2)',
                        'rgba(192, 80, 78, 0.2)',
                        'rgba(247, 150, 71, 0.2)',
                        'rgba(96, 74, 123, 0.2)',
                        'rgba(79, 129, 188, 0.2)',
                        'rgba(74, 172, 197, 0.2)',
                        'rgba(155, 187, 88, 0.2)'
                    ],
                    'borderColor' => [
                        'rgba(31, 72, 124, 1)',
                        'rgba(192, 80, 78, 1)',
                        'rgba(247, 150, 71, 1)',
                        'rgba(96, 74, 123, 1)',
                        'rgba(79, 129, 188, 1)',
                        'rgba(74, 172, 197, 1)',
                        'rgba(155, 187, 88, 1)'
                    ],
                    'borderWidth' => 1,
                    'data' => array_reverse($reports)
                ]
            ])
            ->options([
                'scales' => [
                    'yAxes' => [[
                        'ticks' => [
                            'min' => 0,
                            'stepSize' => 1
                        ]
                    ]]
                ]
            ]);

        /*
        |--------------------------------------------------------------------------
        | Report Graphic
        |--------------------------------------------------------------------------
        */

        $total = Reportsheet::select('reportsheet_classification')->get();

        $var1 = $var2 = $var3 = $var4 = $var5 = $var6 = null;

        for ($i = 0; $i <= count($total) - 1; $i++) {
            $value = $total[$i]->reportsheet_classification;
            $values = explode(',', $value);
            in_array(1, $values) ? $var1++ : null;
            in_array(2, $values) ? $var2++ : null;
            in_array(3, $values) ? $var3++ : null;
            in_array(4, $values) ? $var4++ : null;
            in_array(5, $values) ? $var5++ : null;
            in_array(6, $values) ? $var6++ : null;
        }

        $chartjs = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->labels(['Accidente Seguridad', 'Accidente Ambiental', 'Incidente Seguridad', 'Incidente Ambiental', 'Acto Subestandar', 'Condición Subestandar'])
            ->datasets([
                [
                    'backgroundColor' => [
                        'rgba(74,130,188,0.7)',
                        'rgba(84,184,215,0.7)',
                        'rgba(92,96,147,0.7)',
                        'rgba(219,92,155,0.7)',
                        'rgba(251,193,105,0.7)',
                        'rgba(11,132,165,0.7)'
                    ],
                    'hoverBackgroundColor' => [
                        'rgba(74,130,188,1)',
                        'rgba(84,184,215,1)',
                        'rgba(92,96,147,1)',
                        'rgba(219,92,155,1)',
                        'rgba(251,193,105,1)',
                        'rgba(11,132,165,1)'
                    ],
                    'data' => [$var1, $var2, $var3, $var4, $var5, $var6]
                ]
            ])
            ->options([]);

        return view('home', compact('nowChartjs', 'chartjs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
