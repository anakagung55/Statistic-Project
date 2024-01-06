<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use Illuminate\Support\Facades\DB;
use MathPHP\Probability\Distribution\Continuous;
use App\Exports\ExportNilai;
use App\Imports\ImportNilai;
use Maatwebsite\Excel\Facades\Excel;

class nilaiController extends Controller
{
    public function index(Request $request){
    
        $nilai = Nilai::orderBy('nilai', 'asc')->paginate(4);
        
        return view('nilai', ['nilai' => $nilai]);
    }
    public function store(Request $request){
        $dataSiswa = $request->validate([
            'nilai' => 'required|numeric',
        ]);
    
        $newNilai = Nilai::create($dataSiswa); 
    
        return redirect(route('nilai'));
    }
    public function delete(Nilai $dataSiswa){
        $dataSiswa->delete();
        return redirect(route('nilai'))->with('success', 'Data berhasil terhapus');  
    }
    public function distribusiFrekuensi(request $request)
    {
        $scoreFrequencies = nilai::groupBy('nilai')
            ->selectRaw('nilai, count(*) as count')
            ->orderBy('nilai', 'asc')
            ->paginate(10);
            
        return view('datafrekuensi', compact('scoreFrequencies'));
    }
    public function deskripsi(){
        
        $maxValue = nilai::max('nilai'); // Mencari nilai maksimal
        $minValue = nilai::min('nilai'); // Mencari nilai minimal
        $averageValue = nilai::avg('nilai'); // Menghitung rata-rata nilai
        $stdDeviation = nilai::selectRaw('STDDEV_POP(nilai) as std_deviation')->value('std_deviation');
        $totalData = nilai::count(); // Menghitung jumlah data
        
        return view('deskripsi', compact('maxValue', 'minValue', 'averageValue', 'totalData', 'stdDeviation'));
        
    }
    
    public function databergolong()
    {
        $totalData = Nilai::count();

        // Mengambil nilai minimum dan maksimum dari skor
        $minValue = Nilai::min('nilai');
        $maxValue = Nilai::max('nilai');

        // Menentukan jumlah kelas interval (bisa disesuaikan)
        $jumlahKelas = 10;

        // Menghitung lebar interval
        $lebarKelas = ceil(($maxValue - $minValue) / $jumlahKelas);

        // Mengelompokkan data skor ke dalam kelas interval
        $dataStatistik = [];
        for ($i = 0; $i < $jumlahKelas; $i++) {
        $batasBawah = $minValue + ($i * $lebarKelas);
        $batasAtas = $minValue + (($i + 1) * $lebarKelas);

        // Menghitung nilai tengah kelas interval
        $nilaiTengah = ($batasBawah + $batasAtas) / 2;
        
        // Menghitung frekuensi kelas interval
         $frekuensi = Nilai::where('nilai', '>=', $batasBawah)
            ->where('nilai', '<=', $batasAtas)
            ->count();
        // Menghitung frekuensi relatif dan persentase
        $frekuensiRelatif = $frekuensi / $totalData;
        $persentase = $frekuensiRelatif * 100;
    

        // Menyimpan data kelas interval, nilai tengah, dan frekuensi
        $dataBergolong[] = [
            'interval' => "($batasBawah - $batasAtas)",
            'mid_value' => $nilaiTengah,
            'frekuensi' => $frekuensi,
            'frekuensi_relatif' => $frekuensiRelatif,
            'persentase' => $persentase,
            ];
        }
    
        return view('databergolong', ['dataBergolong' => $dataBergolong]);
    }
    public function getChiSquare()  
    {
        $result = DB::table('tb_zed')->paginate(7);

        return view('tabelChi', compact('result'));
    }
    public function calculateChiSquare(Request $request)
    {

        $chi = DB::table('tb_zed')->where('z', substr($request->chi, 0, -1))->first();
        $lastChi    = substr($request->chi, -1);
        $result = '';

        if ($lastChi === '0') {
            $result = $chi->nol;
        } elseif ($lastChi === '1') {
            $result = $chi->satu;
        } elseif ($lastChi === '2') {
            $result = $chi->dua;
        } elseif ($lastChi === '3') {
            $result = $chi->tiga;
        } elseif ($lastChi === '4') {
            $result = $chi->empat;
        } elseif ($lastChi === '5') {
            $result = $chi->lima;
        } elseif ($lastChi === '6') {
            $result = $chi->enam;
        } elseif ($lastChi === '7') {
            $result = $chi->tujuh;
        } elseif ($lastChi === '8') {
            $result = $chi->delapan;
        } elseif ($lastChi === '9') {
            $result = $chi->sembilan;
        } else {
            $result = $chi->nol;
        }
        return back()->with('success', $result);
    }
    public function Ttest()
    {
        $result = DB::table('ttest')->paginate(5);
        $sumX1 = $result->sum('x1');
        $sumX2 = $result->sum('x2');
        $averageX1 = $result->avg('x1');
        $averageX2 = $result->avg('x2');
        $SD1 = DB::table('ttest')
            ->selectRaw('SQRT(SUM(POWER(x1 - ' . $averageX1 . ', 2)) / (COUNT(x1) - 1)) AS result')->first();
        $SD2 = DB::table('ttest')
            ->selectRaw('SQRT(SUM(POWER(x2 - ' . $averageX2 . ', 2)) / (COUNT(x2) - 1)) AS result')->first();

        $roundedSDX1 = round($SD1->result, 2);
        $roundedSDX2 = round($SD2->result, 2);

        $variance1 = DB::table('ttest')
            ->selectRaw('SUM(POWER(x1 - ' . $averageX1 . ', 2)) / (COUNT(x1) - 1) AS result')
            ->first();
        $variance2 = DB::table('ttest')
            ->selectRaw('SUM(POWER(x2 - ' . $averageX2 . ', 2)) / (COUNT(x2) - 1) AS result')
            ->first();

        $roundedVariance1 = round($variance1->result, 2);
        $roundedVariance2 = round($variance2->result, 2);

        return view('Ttest', compact('result', 'sumX1', 'sumX2', 'averageX1', 'averageX2', 'roundedSDX1', 'roundedSDX2', 'roundedVariance1', 'roundedVariance2'));
    }

    function normsdist($x)
    {
        $distribution = new Continuous\Normal(0, 1);
        return $distribution->cdf($x);
    }
    
    public function liliefors()
    {
        $scores = Nilai::paginate(7);
        $scoresAverage = $scores->avg('nilai');
        $scoresSTD = DB::table('tb_nilai')
            ->selectRaw('SQRT(SUM(POWER(nilai - ' . $scoresAverage . ', 2)) / (COUNT(nilai) - 1)) AS result')->first();

        $sortedScores = $scores->pluck('nilai')->sort()->toArray();

        $totalData = count($sortedScores);

        $empiricalCumulativeProbability = [];

        $cumulativeCount = 0;
        foreach ($sortedScores as $value) {
            $cumulativeCount++;
            $empiricalCumulativeProbability[$value] = $cumulativeCount / $totalData;
        }

        $zScores = [];
        foreach ($scores as $score) {
            $scoreValue = $score->nilai;
            $zScore = ($scoreValue - $scoresAverage) / $scoresSTD->result;
            $normsdist = $this->normsdist($zScore);
            $zScores[$score->id] = [
                'scoreValue' => $scoreValue,
                'zScore' => number_format($zScore, 5),
                'normsdist' => number_format($normsdist, 5),
                'empiricalCumulativeProbability' => number_format($empiricalCumulativeProbability[$scoreValue], 5),
                'fx' => abs($normsdist - $empiricalCumulativeProbability[$scoreValue]),
            ];
        }

        return view('liliefors', compact('scores', 'zScores'));
    }
    public function export()
    {
        return Excel::download(new ExportNilai, 'scores.xlsx');
    }

    public function importView()
    {
        return view('import');
    }

    public function import()
    {
        Excel::import(new ImportNilai, request()->file('file'));

        return redirect('/')->with('success', 'Success Import Scores');
    }
    public function biserial()
    {
        $result = DB::table('ttest')->get();
        $N = $result->count();

        // Assuming 'x' is the column you want to calculate biserial correlation for
        $sumX1 = $result->sum('x1');
        $sumX2 = $result->sum('x2');

        $meanX1 = $sumX1 / $N;
        $meanX2 = $sumX2 / $N;

        // Calculate SSY (Sum of Squares for Y) for x1 and x2 separately
        $SSYX1 = $result->sum(function ($item) use ($meanX1) {
            return pow($item->x1 - $meanX1, 2);
        });
        $SSYX2 = $result->sum(function ($item) use ($meanX2) {
            return pow($item->x2 - $meanX2, 2);
        });

        // Calculate ΣY2 for x1 and x2 separately
        $sumY2X1 = $result->sum(function ($item) {
            return pow($item->x1, 2);
        });
        $sumY2X2 = $result->sum(function ($item) {
            return pow($item->x2, 2);
        });

        // Create a new variable 'total' that combines x1 and x2 values
        $total = $result->pluck('x1')->merge($result->pluck('x2'))->toArray();
        $Ntotal = count($total);
        $sumN = array_sum($total);
        $sumY2N = array_sum(array_map(function ($item) {
            return pow($item, 2);
        }, $total));
        $meanN = $sumN / $Ntotal;
        $SSYN = array_sum(array_map(function ($item) use ($meanN) {
            return pow($item - $meanN, 2);
        }, $total));


        return view('biserial', compact('result', 'N', 'sumX1', 'sumX2', 'meanX1', 'meanX2', 'SSYX1', 'SSYX2', 'sumY2X1', 'sumY2X2', 'Ntotal', 'sumN', 'sumY2N', 'meanN', 'SSYN'));
    }
}