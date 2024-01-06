@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full lg:w-3/4">
            <div class="bg-white shadow-md rounded my-6">
                <div class="text-center py-4 border-b">
                    <div class="text-xl font-bold">Bergolong</div>
                </div>
                <div class="table-responsive">
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="text-center px-4 py-2">Kelas Interval</th>
                                <th class="text-center px-4 py-2">Nilai Tengah</th>
                                <th class="text-center px-4 py-2">Frekuensi</th>
                                <th class="text-center px-4 py-2">Frek Relatif</th>
                                <th class="text-center px-4 py-2">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataBergolong as $data)
                            <tr>
                                <td class="text-center border px-4 py-2">{{$data['interval']}}</td>
                                <td class="text-center border px-4 py-2">{{$data['mid_value']}}</td>
                                <td class="text-center border px-4 py-2">{{$data['frekuensi']}}</td>
                                <td class="text-center border px-4 py-2">{{$data['frekuensi_relatif']}}</td>
                                <td class="text-center border px-4 py-2">{{$data['persentase']}}</td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
