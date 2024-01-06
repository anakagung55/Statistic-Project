@extends('layouts.app')

@section('content')

    <div class="ml-16">
        <div class="container mx-auto px-12">
            <h1 class="font-poppins text-4xl font-semibold mb-8 mt-10 text-black">Tabel Chi</h1>
            
            <form action="{{route('chi')}}" method="post" class="w-full flex items-center justify-center">
                @csrf
                <input class="w-full py-2 px-4 rounded-md border border-gray-300 mr-2" type="text" name="chi" id="chi" placeholder="0">
                <button class="py-2 px-4 bg-blue-500 text-white rounded-md" type ="submit">Hitung</button>
            </form>
            @if (session()->has('success'))
                <div class="mt-4 bg-green-200 text-green-800 py-2 px-4">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="container mt-4">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 py-2 px-4">Nilai Z</th>
                        <th class="border border-gray-300 py-2 px-4">Nol</th>
                        <th class="border border-gray-300 py-2 px-4">Satu</th>
                        <th class="border border-gray-300 py-2 px-4">Dua</th>
                        <th class="border border-gray-300 py-2 px-4">Tiga</th>
                        <th class="border border-gray-300 py-2 px-4">Empat</th>
                        <th class="border border-gray-300 py-2 px-4">Lima</th>
                        <th class="border border-gray-300 py-2 px-4">Enam</th>
                        <th class="border border-gray-300 py-2 px-4">Tujuh</th>
                        <th class="border border-gray-300 py-2 px-4">Delapan</th>
                        <th class="border border-gray-300 py-2 px-4">Sembilan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $chi)
                        <tr>
                            <td class="border border-gray-300 py-2 px-4">{{ $chi->z }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $chi->nol }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $chi->satu }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $chi->dua }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $chi->tiga }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $chi->empat }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $chi->lima }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $chi->enam }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $chi->tujuh }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $chi->delapan }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $chi->sembilan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4 flex justify-between items-center">
    <div class="text-sm text-gray-700">
        Showing {{ $result->firstItem() }} to {{ $result->lastItem() }} of {{ $result->total() }} entries 
    </div>
    <div class="flex items-center">
        {{-- Link halaman sebelumnya --}}
        @if ($result->onFirstPage())
            <span class="disabled-pagination rounded-l border border-gray-300 px-3 py-1 text-sm font-medium text-gray-500 cursor-not-allowed">
                Previous
            </span>
        @else
            <a href="{{ $result->previousPageUrl() }}" class="pagination-link rounded-l border border-gray-300 px-3 py-1 text-sm font-medium text-gray-700 hover:text-gray-500">Previous</a>
        @endif

        {{-- Link halaman selanjutnya --}}
        @if ($result->hasMorePages())
            <a href="{{ $result->nextPageUrl() }}" class="pagination-link rounded-r border border-gray-300 px-3 py-1 text-sm font-medium text-gray-700 hover:text-gray-500">Next</a>
        @else
            <span class="disabled-pagination rounded-r border border-gray-300 px-3 py-1 text-sm font-medium text-gray-500 cursor-not-allowed">
                Next
            </span>
        @endif
    </div>
</div>
@endsection
