@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full lg:w-3/4">
            <div class="bg-white shadow-md rounded my-6">
                <div class="px-6 py-4 border-b">
                    <div class="text-center text-xl font-bold">Data Distribusi Frekuensi</div>
                </div>

                <div class="table-responsive">
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="text-center border px-4 py-2">Id</th>
                                <th class="text-center border px-4 py-2">Nilai</th>
                                <th class="text-center border px-4 py-2">Frekuensi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($scoreFrequencies as $data)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $data['nilai'] }}</td>
                                <td class="border px-4 py-2">{{ $data['count'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-between px-6 py-4">
                    <div class="col-md-6 text-right">Show entries:
                        <select id="show-entries" class="px-2 py-1 border rounded-md">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                            <ul class="flex">
                                @if ($scoreFrequencies->onFirstPage())
                                    <li class="page-item disabled px-2 py-1">Previous</li>
                                @else
                                    <li class="page-item px-2 py-1">
                                        <a href="{{ $scoreFrequencies->previousPageUrl() }}">Previous</a>
                                    </li>
                                @endif

                                @foreach ($scoreFrequencies->getUrlRange(1, $scoreFrequencies->lastPage()) as $page => $url)
                                    <li class="page-item px-2 py-1 {{ $scoreFrequencies->currentPage() == $page ? 'bg-gray-400' : '' }}">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                @if ($scoreFrequencies->hasMorePages())
                                    <li class="page-item px-2 py-1">
                                        <a href="{{ $scoreFrequencies->nextPageUrl() }}">Next</a>
                                    </li>
                                @else
                                    <li class="page-item disabled px-2 py-1">Next</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('entries').addEventListener('change', function() {
        window.location = '{{ route("nilai") }}?entries=' + this.value;
    });
</script>
@endsection
