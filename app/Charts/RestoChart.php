<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\resto;

class RestoChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $restoData = Resto::where('status', 'approved')->orderBy('jumlah_klik', 'desc')->take(5)->get();

        return $this->chart->pieChart()
            ->addData($restoData->pluck('jumlah_klik')->toArray())
            ->setLabels($restoData->pluck('namaresto')->toArray());
    }
}
