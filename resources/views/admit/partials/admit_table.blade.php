<div class="overflow-x-auto relative">
    <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border cursor-pointer sortable group" data-sort="id">
                    <div class="flex items-center justify-between">
                        <span>#</span>
                        <span class="text-gray-400 group-hover:text-gray-600">
                            @if (request('sort') == 'id')
                                {!! request('direction') == 'asc' ? '&uarr;' : '&darr;' !!}
                            @else
                                &updownarrow;
                            @endif
                        </span>
                    </div>
                </th>
                <th class="px-4 py-2 border cursor-pointer sortable group" data-sort="name_bn">
                    <div class="flex items-center justify-between">
                        <span>নাম</span>
                        <span class="text-gray-400 group-hover:text-gray-600">
                            @if (request('sort') == 'name_bn')
                                {!! request('direction') == 'asc' ? '&uarr;' : '&darr;' !!}
                            @else
                                &updownarrow;
                            @endif
                        </span>
                    </div>
                </th>
                <th class="px-4 py-2 border cursor-pointer sortable group" data-sort="roll">
                    <div class="flex items-center justify-between">
                        <span>রোল</span>
                        <span class="text-gray-400 group-hover:text-gray-600">
                            @if (request('sort') == 'roll')
                                {!! request('direction') == 'asc' ? '&uarr;' : '&darr;' !!}
                            @else
                                &updownarrow;
                            @endif
                        </span>
                    </div>
                </th>
                <th class="px-4 py-2 border cursor-pointer sortable group" data-sort="exam_center_bn">
                    <div class="flex items-center justify-between">
                        <span>কেন্দ্র</span>
                        <span class="text-gray-400 group-hover:text-gray-600">
                            @if (request('sort') == 'exam_center_bn')
                                {!! request('direction') == 'asc' ? '&uarr;' : '&darr;' !!}
                            @else
                                &updownarrow;
                            @endif
                        </span>
                    </div>
                </th>
                <th class="px-4 py-2 border">অ্যাকশন</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admitCards as $card)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $card->id }}</td>
                    <td class="px-4 py-2 border">{{ $card->name_bn }}</td>
                    <td class="px-4 py-2 border">{{ $card->roll }}</td>
                    <td class="px-4 py-2 border">{{ $card->exam_center_bn }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex flex-wrap gap-1">
                            <a href="https://pdf.sajidifti.com/pdf?delay=1&filename={{ $card->roll }}&url={{ urlencode(route('admit.pdf', $card->id)) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-2 py-1 rounded text-sm"
                                target="_blank">View</a>
                            <a href="https://pdf.sajidifti.com/pdf/download?delay=1&filename={{ $card->roll }}&url={{ urlencode(route('admit.pdf', $card->id)) }}"
                                class="bg-green-500 hover:bg-green-600 text-white font-semibold px-2 py-1 rounded text-sm"
                                target="_blank">Download</a>
                            <a href="{{ route('admit.edit', $card->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-2 py-1 rounded text-sm">Edit</a>
                            <form action="{{ route('admit.destroy', $card->id) }}" method="POST"
                                class="inline delete-form"
                                onsubmit="return confirm('Are you sure you want to delete this admit card?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white font-semibold px-2 py-1 rounded text-sm cursor-pointer">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-2 border text-center text-gray-500">No admit cards found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if ($admitCards->hasPages())
    <div class="mt-4 flex flex-col md:flex-row justify-between items-center gap-4">
        {{-- Pagination Info --}}
        <div class="text-sm text-gray-700">
            Showing
            <span class="font-medium">{{ $admitCards->firstItem() ?? 0 }}</span>
            to
            <span class="font-medium">{{ $admitCards->lastItem() ?? 0 }}</span>
            of
            <span class="font-medium">{{ $admitCards->total() }}</span>
            results
        </div>

        {{-- Pagination Links --}}
        <div class="flex items-center gap-1">
            {{-- Previous Button --}}
            @if ($admitCards->onFirstPage())
                <span
                    class="px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded cursor-not-allowed">
                    &laquo; Previous
                </span>
            @else
                <a href="{{ $admitCards->previousPageUrl() }}"
                    class="pagination-link px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50 transition-colors cursor-pointer">
                    &laquo; Previous
                </a>
            @endif

            {{-- Page Numbers --}}
            @php
                $currentPage = $admitCards->currentPage();
                $lastPage = $admitCards->lastPage();
                $start = max(1, $currentPage - 2);
                $end = min($lastPage, $currentPage + 2);

                // Adjust if we're near the beginning or end
                if ($currentPage <= 3) {
                    $end = min(5, $lastPage);
                }
                if ($currentPage > $lastPage - 3) {
                    $start = max(1, $lastPage - 4);
                }
            @endphp

            {{-- First Page --}}
            @if ($start > 1)
                <a href="{{ $admitCards->url(1) }}"
                    class="pagination-link px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50 transition-colors cursor-pointer">
                    1
                </a>
                @if ($start > 2)
                    <span class="px-2 py-2 text-sm text-gray-500">...</span>
                @endif
            @endif

            {{-- Page Numbers --}}
            @for ($page = $start; $page <= $end; $page++)
                @if ($page == $currentPage)
                    <span class="px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $admitCards->url($page) }}"
                        class="pagination-link px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50 transition-colors cursor-pointer">
                        {{ $page }}
                    </a>
                @endif
            @endfor

            {{-- Last Page --}}
            @if ($end < $lastPage)
                @if ($end < $lastPage - 1)
                    <span class="px-2 py-2 text-sm text-gray-500">...</span>
                @endif
                <a href="{{ $admitCards->url($lastPage) }}"
                    class="pagination-link px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50 transition-colors cursor-pointer">
                    {{ $lastPage }}
                </a>
            @endif

            {{-- Next Button --}}
            @if ($admitCards->hasMorePages())
                <a href="{{ $admitCards->nextPageUrl() }}"
                    class="pagination-link px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50 transition-colors cursor-pointer">
                    Next &raquo;
                </a>
            @else
                <span
                    class="px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded cursor-not-allowed">
                    Next &raquo;
                </span>
            @endif
        </div>
    </div>
@endif
