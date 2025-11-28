@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">Admit Cards</h2>
            <a href="{{ route('admit.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">Create new</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">নাম</th>
                        <th class="px-4 py-2 border">রোল</th>
                        <th class="px-4 py-2 border">কেন্দ্র</th>
                        <th class="px-4 py-2 border">অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admitCards as $card)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $card->name_bn }}</td>
                            <td class="px-4 py-2 border">{{ $card->roll }}</td>
                            <td class="px-4 py-2 border">{{ $card->exam_center_bn }}</td>
                            <td class="px-4 py-2 border">
                                <a href="https://pdf.sajidifti.com/pdf?&url={{ urlencode(route('admit.pdf', $card->id)) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-2 py-1 rounded text-sm mr-1">View</a>
                                <a href="https://pdf.sajidifti.com/pdf/download?delay=1&url={{ urlencode(route('admit.pdf', $card->id)) }}"
                                    class="bg-green-500 hover:bg-green-600 text-white font-semibold px-2 py-1 rounded text-sm">Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
