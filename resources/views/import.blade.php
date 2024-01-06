@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <div class="flex justify-center">
        <div class="w-full md:w-1/2">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="text-center font-semibold text-xl mb-4">{{ __('Import Data Score') }}</div>

                <div class="px-4">
                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="formFile" class="block text-sm font-medium text-gray-700">Choose File:</label>
                            <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" type="file" id="formFile" name="file">
                            <p class="text-xs text-gray-500">Allowed Extensions: xlxs, xlx, csv</p>
                        </div>

                        <div class="flex items-center justify-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
