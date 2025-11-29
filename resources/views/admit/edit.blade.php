@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Edit Admit Card</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admit.update', $admit->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-1">নাম (বাংলা):</label>
                <input type="text" name="name_bn" value="{{ old('name_bn', $admit->name_bn) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('name_bn')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">পিতার নাম (বাংলা):</label>
                <input type="text" name="father_name_bn" value="{{ old('father_name_bn', $admit->father_name_bn) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('father_name_bn')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">মাতার নাম:</label>
                <input type="text" name="mother_name_bn" value="{{ old('mother_name_bn', $admit->mother_name_bn) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('mother_name_bn')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">স্কুল:</label>
                <input type="text" name="school" value="{{ old('school', $admit->school) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('school')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">পরীক্ষার তারিখ:</label>
                <input type="date" name="exam_date" value="{{ old('exam_date', $admit->exam_date) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('exam_date')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">পরীক্ষার রোল:</label>
                <input type="text" name="roll" value="{{ old('roll', $admit->roll) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('roll')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">পরীক্ষার কেন্দ্র:</label>
                <input type="text" name="exam_center_bn" value="{{ old('exam_center_bn', $admit->exam_center_bn) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('exam_center_bn')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">পরীক্ষার সময়:</label>
                <input type="text" name="exam_time" value="{{ old('exam_time', $admit->exam_time) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @error('exam_time')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-between pt-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">Update</button>
                <a href="{{ route('admit.list') }}" class="ml-4 text-blue-700 hover:underline">Back to List</a>
            </div>
        </form>
    </div>
@endsection
