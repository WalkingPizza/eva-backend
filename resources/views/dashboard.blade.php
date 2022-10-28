@extends('layout') @section('content')
<div class="overflow-x-auto relative container mx-auto mt-10 shadow">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Activity
                </th>
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <th scope="col" class="py-3 px-6">
                    Time
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($changelogs as $changelog)
            <tr class="bg-white border-b">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                    {{ $changelog->activity }}
                </th>
                <td class="py-4 px-6">
                    {{ $changelog->created_at->format('m/d/Y') }}
                </td>
                <td class="py-4 px-6">
                    {{ $changelog->created_at->format('h:i A') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
