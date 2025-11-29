<div class="overflow-x-auto relative">
    <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">#</th>
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
                    <td class="px-4 py-2 border">
                        {{ $loop->iteration + ($admitCards->currentPage() - 1) * $admitCards->perPage() }}</td>
                    <td class="px-4 py-2 border">{{ $card->name_bn }}</td>
                    <td class="px-4 py-2 border">{{ $card->roll }}</td>
                    <td class="px-4 py-2 border">{{ $card->exam_center_bn }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex flex-wrap gap-1">
                            <a href="https://pdf.sajidifti.com/pdf?delay=1&filename={{ $card->roll }}&url={{ urlencode(route('admit.pdf', $card->id)) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-2 py-1 rounded text-sm" target="_blank">View</a>
                            <a href="https://pdf.sajidifti.com/pdf/download?delay=1&filename={{ $card->roll }}&url={{ urlencode(route('admit.pdf', $card->id)) }}"
                                class="bg-green-500 hover:bg-green-600 text-white font-semibold px-2 py-1 rounded text-sm" target="_blank">Download</a>
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

<div class="mt-4">
    {{ $admitCards->links() }}
</div>
