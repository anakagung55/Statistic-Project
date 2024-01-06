@extends('layouts.app')

@section('content')

<div class="container mx-auto mt-5">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h3 class="text-xl font-semibold text-center mb-4">Liliefors Test</h3>
        <div class="overflow-x-auto">
            <table id="myTable" class="w-full whitespace-nowrap bg-white rounded shadow-md">
                <thead>
                    <tr>
                        <th class="border-b-2 border-gray-300 py-2 text-center">Nomor</th>
                        <th class="border-b-2 border-gray-300 py-2 text-center">Skor</th>
                        <th class="border-b-2 border-gray-300 py-2 text-center">Z-Score</th>
                        <th class="border-b-2 border-gray-300 py-2 text-center">F(x)</th>
                        <th class="border-b-2 border-gray-300 py-2 text-center">Empirical CDF</th>
                        <th class="border-b-2 border-gray-300 py-2 text-center">|F(x) - Empirical CDF|</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($zScores as $scoreId => $data)
                    <tr class="hover:bg-gray-100">
                        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $data['scoreValue'] }}</td>
                        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $data['zScore'] }}</td>
                        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $data['normsdist'] }}</td>
                        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $data['empiricalCumulativeProbability'] }}</td>
                        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $data['fx'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4 flex justify-center items-center">
    <nav role="navigation" aria-label="Pagination">
        {{-- Previous Page Link --}}
        @if ($scores->onFirstPage())
            <span class="relative inline-flex items-center px-2 py-1 border border-gray-300 bg-white text-sm font-medium text-gray-500 rounded-md cursor-not-allowed">
                Previous
            </span>
        @else
            <a href="{{ $scores->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-1 border border-gray-300 bg-white text-sm font-medium text-gray-700 rounded-md hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:bg-gray-50 transition ease-in-out duration-150">
                Previous
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($scores as $page => $url)
            @if (is_string($page))
                <span class="relative inline-flex items-center px-4 py-1 border border-gray-300 bg-white text-sm font-medium text-gray-700">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-1 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:bg-gray-50 transition ease-in-out duration-150">{{ $page }}</a>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($scores->hasMorePages())
            <a href="{{ $scores->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-1 border border-gray-300 bg-white text-sm font-medium text-gray-700 rounded-md hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:bg-gray-50 transition ease-in-out duration-150">
                Next
            </a>
        @else
            <span class="relative inline-flex items-center px-2 py-1 border border-gray-300 bg-white text-sm font-medium text-gray-500 rounded-md cursor-not-allowed">
                Next
            </span>
        @endif
    </nav>
</div>

    </div>
</div>

@endsection
