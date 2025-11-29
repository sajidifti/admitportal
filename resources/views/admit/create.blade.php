@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Admit Card Form</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admit.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block font-semibold mb-1">নাম (বাংলা):</label>
                <input type="text" name="name_bn" value="{{ old('name_bn') }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('name_bn')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">পিতার নাম (বাংলা):</label>
                <input type="text" name="father_name_bn" value="{{ old('father_name_bn') }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('father_name_bn')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">মাতার নাম:</label>
                <input type="text" name="mother_name_bn" value="{{ old('mother_name_bn') }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('mother_name_bn')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">স্কুল:</label>
                <input type="text" name="school" value="{{ old('school') }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('school')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">শ্রেণি:</label>
                <input type="text" name="class" value="{{ old('class') }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('class')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">পরীক্ষার তারিখ:</label>
                <input type="date" name="exam_date" value="{{ old('exam_date') }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('exam_date')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">পরীক্ষার রোল:</label>
                <input type="text" name="roll" value="{{ old('roll') }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('roll')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">পরীক্ষার কেন্দ্র:</label>
                <input type="text" name="exam_center_bn" value="{{ old('exam_center_bn') }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('exam_center_bn')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">পরীক্ষার সময়:</label>
                <input type="text" name="exam_time" value="{{ old('exam_time') }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('exam_time')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-between pt-6 mt-6 border-t border-gray-100">
                <a href="{{ route('admit.list') }}"
                    class="text-gray-500 hover:text-gray-700 font-medium transition-colors duration-200 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    Back to List
                </a>
                <div class="flex items-center gap-3">
                    <button type="submit" name="save_and_create_another" value="1"
                        class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium px-5 py-2.5 rounded-lg shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save & Create Another
                    </button>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-2.5 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                        Save Admit Card
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
