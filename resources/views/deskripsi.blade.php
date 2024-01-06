@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full lg:w-3/4">
            <div class="bg-white shadow-md rounded my-6">
                <div class="text-center py-4 border-b">
                    <div class="text-xl font-bold">Deskripsi</div>
                </div>
                <div class="mx-2 my-4">
                    <p>Nilai Maksimal: {{$maxValue}}</p>
                    <p>Nilai Minimal: {{$minValue}}</p>
                    <p>Nilai Rata-rata: {{$averageValue}}</p>
                    <p>Jumlah Data: {{$totalData}}</p>
                    <p>Standar Deviasi: {{$stdDeviation}}</p>
                </div>
                <div class="table-responsive">
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="text-center px-4 py-2">Skor Max</th>
                                <th class="text-center px-4 py-2">Skor Min</th>
                                <th class="text-center px-4 py-2">Skor Median</th>
                                <th class="text-center px-4 py-2">Jumlah Data</th>
                                <th class="text-center px-4 py-2">Standar Deviasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center border px-4 py-2">{{$maxValue}}</td>
                                <td class="text-center border px-4 py-2">{{$minValue}}</td>
                                <td class="text-center border px-4 py-2">{{$averageValue}}</td>
                                <td class="text-center border px-4 py-2">{{$totalData}}</td>
                                <td class="text-center border px-4 py-2">{{$stdDeviation}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
