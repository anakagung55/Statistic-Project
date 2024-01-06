@extends('layouts.app')

@section('content')

<div class="container mx-auto mt-5">
    <div class="bg-white shadow-md rounded-md w-3/4 mx-auto">
        <div class="bg-blue-500 py-4 px-6 rounded-t-md">
            <h3 class="text-white text-center text-lg font-semibold">Data Uji T</h3>
        </div>
        <div class="p-4">
            <table class="w-full border-collapse border border-gray-300 mt-3">
                <thead class="bg-blue-200">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">X1</th>
                        <th class="border border-gray-300 px-4 py-2">X2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $item)
                    <tr class="border border-gray-300">
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->x1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->x2 }}</td>
                    </tr>
                    @endforeach
                    <tr class="bg-blue-100 border border-gray-300">
                        <td class="border border-gray-300 px-4 py-2"><strong>SUM:</strong></td>
                        <td class="border border-gray-300 px-4 py-2">{{ $sumX1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $sumX2 }}</td>
                    </tr>
                    <tr class="bg-blue-100 border border-gray-300">
                        <td class="border border-gray-300 px-4 py-2"><strong>Rerata:</strong></td>
                        <td class="border border-gray-300 px-4 py-2">{{ $averageX1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $averageX2 }}</td>
                    </tr>
                    <tr class="bg-blue-100 border border-gray-300">
                        <td class="border border-gray-300 px-4 py-2"><strong>SD:</strong></td>
                        <td class="border border-gray-300 px-4 py-2">{{ $roundedSDX1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $roundedSDX2 }}</td>
                    </tr>
                    <tr class="bg-blue-100 border border-gray-300">
                        <td class="border border-gray-300 px-4 py-2"><strong>Variants:</strong></td>
                        <td class="border border-gray-300 px-4 py-2">{{ $roundedVariance1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $roundedVariance2 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4 flex justify-center">
            {{ $result->links('pagination::tailwind') }}
        </div>
    </div>
</div>

@endsection
