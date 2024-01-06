@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full lg:w-8/12">
            <div class="bg-white shadow-md rounded my-6">
                <div class="bg-gray-200 text-center py-4">
                    Data Tunggal
                </div>
                <div class="p-6">
                    <h5 class="mb-3 text-center">Tambah Nilai</h5>
                    <hr>
                    <form method="POST">
                        @csrf
                        <div class="flex flex-wrap mb-4">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="nilai" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nilai</label>
                                <input id="nilai" type="decimal" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('nilai') border-red-500 @enderror" name="nilai" value="{{ old('nilai') }}" required autocomplete="nilai">
                                @error('nilai')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <div class="flex justify-end">
                                    <a href="/nilai">
                                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="mb-4"></div>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="p-3 text-center">Id</th>
                                    <th class="p-3 text-center">Nilai</th>
                                    <th class="p-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilai as $key => $dataSiswa)
                                    <tr>
                                        <td class="p-3 text-center">{{$nilai->firstItem()+$key}}</td>
                                        <td class="p-3 text-center">{{$dataSiswa->nilai}}</td>
                                        <td class="p-3 text-center">
                                            <form method="post" action="{{ route('nilai.delete', ['dataSiswa' => $dataSiswa]) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-between mt-4">
                        <div>
                            Showing
                            {{ $nilai->firstItem() }}
                            to
                            {{ $nilai->lastItem() }}
                            of
                            {{ $nilai->total() }}
                            entries
                        </div>
                        <div class="flex items-center">
        <div class="flex">
            @if ($nilai->onFirstPage())
                <span class="border border-gray-300 bg-gray-200 text-gray-600 px-3 py-1 rounded-l-md cursor-not-allowed">Previous</span>
            @else
                <a href="{{ $nilai->previousPageUrl() }}" class="border border-gray-300 bg-white text-gray-600 px-3 py-1 rounded-l-md hover:bg-gray-200">Previous</a>
            @endif
            
            @foreach ($nilai->getUrlRange(1, $nilai->lastPage()) as $page => $url)
                @if ($page == $nilai->currentPage())
                    <span class="border border-gray-300 bg-gray-200 text-gray-600 px-3 py-1 hover:bg-gray-200">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="border border-gray-300 bg-white text-gray-600 px-3 py-1 hover:bg-gray-200">{{ $page }}</a>
                @endif
            @endforeach
            
            @if ($nilai->hasMorePages())
                <a href="{{ $nilai->nextPageUrl() }}" class="border border-gray-300 bg-white text-gray-600 px-3 py-1 rounded-r-md hover:bg-gray-200">Next</a>
            @else
                <span class="border border-gray-300 bg-gray-200 text-gray-600 px-3 py-1 rounded-r-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
