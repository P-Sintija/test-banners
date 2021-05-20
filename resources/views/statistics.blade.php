@extends('layout')

@section('content')
    <div class="text-blue-900 text-center text-6xl my-10">
        Statistics ({{ $parameter }})
    </div>

    <div class="flex justify-center">
        <table class="min-w-2/3 table-auto">
            <thead class="justify-between">
            <tr class="bg-gray-800">
                <th class="px-16 py-2">
                    <span class="text-gray-300">Image</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-gray-300">Banner ID</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-gray-300"> {{ $parameter }} (total) </span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-gray-200">
            @foreach( $data as $banner)
                <tr class="bg-white border-4 border-gray-200">
                    <td class="px-16 py-2 flex flex-row items-center  justify-center">
                        <img class="h-12 w-12 rounded-full object-cover "
                             src="/storage/{{ $banner->file_path }}" alt="empty"/>
                    </td>
                    <td class="px-16 py-2 ">
                        <span class="text-center ml-2 font-semibold justify-center"> {{  $banner->id }} </span>
                    </td>
                    <td class="px-16 py-2  ">
                        <span> {{ $banner->$parameter }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
