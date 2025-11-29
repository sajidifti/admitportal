@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">Admit Cards</h2>
            <a href="{{ route('admit.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">Create new</a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-4">
            <div class="flex items-center gap-2">
                <label for="per_page" class="text-gray-700 font-medium">Show</label>
                <select id="per_page" class="border rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="text-gray-700 font-medium">entries</span>
            </div>
            <div class="w-full md:w-auto grow md:grow-0 flex gap-2">
                <input type="text" id="search" placeholder="Search by Name, Roll, Center..."
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button id="reset_filters"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded whitespace-nowrap cursor-pointer">↻</button>
            </div>
        </div>

        <div id="admit-table-container">
            @include('admit.partials.admit_table')
        </div>
    </div>

    <input type="hidden" id="hidden_sort_by" value="" />
    <input type="hidden" id="hidden_sort_type" value="asc" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var timeout = null;

            function fetch_data(page, sort_type, sort_by, search_query, per_page) {
                $.ajax({
                    url: "{{ route('admit.list') }}?page=" + page + "&sort=" + sort_by + "&direction=" +
                        sort_type + "&search=" + search_query + "&per_page=" + per_page,
                    success: function(data) {
                        $('#admit-table-container').html(data);
                    }
                });
            }

            $(document).on('click', '#reset_filters', function() {
                $('#search').val('');
                $('#per_page').val('10');
                $('#hidden_sort_by').val('');
                $('#hidden_sort_type').val('asc');
                fetch_data(1, 'asc', '', '', 10);
            });

            $(document).on('click', '.pagination-link', function(event) {
                event.preventDefault();
                var href = $(this).attr('href');
                var url = new URL(href, window.location.origin);
                var page = url.searchParams.get('page');
                var sort_by = $('#hidden_sort_by').val();
                var sort_type = $('#hidden_sort_type').val();
                var search_query = $('#search').val();
                var per_page = $('#per_page').val();
                fetch_data(page, sort_type, sort_by, search_query, per_page);
            });

            $(document).on('keyup', '#search', function() {
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    var search_query = $('#search').val();
                    var page = 1;
                    var sort_by = $('#hidden_sort_by').val();
                    var sort_type = $('#hidden_sort_type').val();
                    var per_page = $('#per_page').val();
                    fetch_data(page, sort_type, sort_by, search_query, per_page);
                }, 500);
            });

            $(document).on('change', '#per_page', function() {
                var search_query = $('#search').val();
                var page = 1;
                var sort_by = $('#hidden_sort_by').val();
                var sort_type = $('#hidden_sort_type').val();
                var per_page = $('#per_page').val();
                fetch_data(page, sort_type, sort_by, search_query, per_page);
            });

            $(document).on('click', '.sortable', function() {
                var column_name = $(this).data('sort');
                var current_sort_by = $('#hidden_sort_by').val();
                var current_sort_type = $('#hidden_sort_type').val();
                var reverse_order = 'asc';

                if (current_sort_by == column_name) {
                    if (current_sort_type == 'asc') {
                        reverse_order = 'desc';
                    } else {
                        reverse_order = 'asc';
                    }
                } else {
                    reverse_order = 'asc';
                }

                $('#hidden_sort_by').val(column_name);
                $('#hidden_sort_type').val(reverse_order);

                var page = 1;
                var search_query = $('#search').val();
                var per_page = $('#per_page').val();

                fetch_data(page, reverse_order, column_name, search_query, per_page);
            });
        });
    </script>
@endsection
