<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\User;
use App\Models\Pemesanan;
use App\Models\Tiket;
use Carbon\Carbon;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {   
            $tanggal1 = Carbon::now()->isoformat('D MMMM Y');
            $tanggal2 = Carbon::now()->addDay(1)->isoformat('D MMMM Y');
            $tanggal3 = Carbon::now()->addDay(2)->isoformat('D MMMM Y');
            $tanggal4 = Carbon::now()->addDay(3)->isoformat('D MMMM Y');
            $tanggal5 = Carbon::now()->addDay(4)->isoformat('D MMMM Y');
            $tanggal6 = Carbon::now()->addDay(5)->isoformat('D MMMM Y');
            $tanggal7 = Carbon::now()->addDay(6)->isoformat('D MMMM Y');
            $today = Carbon::today();
            $tiket = Tiket::all();
            $pemesanan = Pemesanan::all();

            for($k=0; $k<count($pemesanan); $k++){
                $diff[$k] = $today->diffInDays($pemesanan[$k]->tanggal_berangkat, false)+1;
            }
            $h1 = 0;
            $h2 = 0;
            $h3 = 0;
            $h4 = 0;
            $h5 = 0;
            $h6 = 0;
            $h7 = 0;
            if(!empty($diff)){
            for($k=0; $k<count($diff); $k++){
                if($diff[$k] == "1") {
                    $h1+=1;
                }
                if($diff[$k] == "2") {
                    $h2+=1;
                }
                if($diff[$k] == "3") {
                    $h3+=1;
                }
                if($diff[$k] == "4") {
                    $h4+=1;
                }
                if($diff[$k] == "5") {
                    $h5+=1;
                }
                if($diff[$k] == "6") {
                    $h6+=1;
                }
                if($diff[$k] == "7") {
                    $h7+=1;
                }
                $diff[$k] = $today->diffInDays($pemesanan[$k]->tanggal_berangkat, false)+1;
            }
        }
            $user = User::whereRoleIs(['user'])->get();
            return $this->chart->barChart()
            ->setTitle('Diagram Batang Total Pesanan Tiket Kereta Api')
            ->setSubtitle('Web Kretix')
            ->addData('Penjualan Tiket', [$h1, $h2, $h3, $h4, $h5, $h6, $h7])
            ->setXAxis([$tanggal1, $tanggal2, $tanggal3, $tanggal4, $tanggal5, $tanggal6, $tanggal7])
            ->setColors(['#3EB09C']);

            
            
}
    public function build1(): \ArielMejiaDev\LarapexCharts\DonutChart {
        $tiket = Tiket::all();
        $ekonomi = Tiket::where('jenis', 'Ekonomi')->count();
        $bisnis = Tiket::where('jenis', 'Bisnis')->count();
        $eksekutif = Tiket::where('jenis', 'Eksekutif')->count();
        return $this->chart->donutChart()
        ->setTitle('Tiket Tersedia Berdasarkan Jenis')
        ->setSubtitle('Hari-1 sampai Hari-7')
        ->addData([$ekonomi, $bisnis, $eksekutif])
        ->setLabels(['Tiket Ekonomi', 'Tiket Bisnis', 'Tiket Eksekutif'])
        ->setColors(['#3EB09C', '#414141','#B2B2B2']);
    }
}