@extends('layouts.app')

@section('content')

<div class="container mx-auto mt-5 max-w-screen-md">
    <div class="mb-3 text-center">
        <h3 class="text-xl font-semibold">Data Uji T</h3>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto bg-white border border-collapse border-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2">Ket.</th>
                    <th class="px-4 py-2 text-center">X1</th>
                    <th class="px-4 py-2 text-center">X2</th>
                    <th class="px-4 py-2 text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2 font-semibold text-center">MEAN Y</td>
                    <td class="px-4 py-2 text-center">{{ $meanX1 }}</td>
                    <td class="px-4 py-2 text-center">{{ $meanX2 }}</td>
                    <td class="px-4 py-2 text-center">{{ $meanN }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-semibold text-center">N</td>
                    <td class="px-4 py-2 text-center">{{ $N }}</td>
                    <td class="px-4 py-2 text-center">{{ $N }}</td>
                    <td class="px-4 py-2 text-center">{{ $N + $N }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-semibold text-center">SSY</td>
                    <td class="px-4 py-2 text-center">{{ $SSYX1 }}</td>
                    <td class="px-4 py-2 text-center">{{ $SSYX2 }}</td>
                    <td class="px-4 py-2 text-center">{{ $SSYN }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-semibold text-center">&Sigma;Y</td>
                    <td class="px-4 py-2 text-center">{{ $sumX1 }}</td>
                    <td class="px-4 py-2 text-center">{{ $sumX2 }}</td>
                    <td class="px-4 py-2 text-center">{{ $sumX1 + $sumX2 }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-semibold text-center">&Sigma;Y2</td>
                    <td class="px-4 py-2 text-center">{{ $sumY2X1 }}</td>
                    <td class="px-4 py-2 text-center">{{ $sumY2X2 }}</td>
                    <td class="px-4 py-2 text-center">{{ $sumY2X1 + $sumY2X2 }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
