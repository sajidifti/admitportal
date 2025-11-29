@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white/60 border border-gray-100 rounded-2xl shadow-lg p-8 backdrop-blur-sm">
            <div class="flex items-center gap-4 mb-6">
                <div class="p-3 rounded-lg bg-linear-to-br from-indigo-600 to-purple-600 text-white shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">Edit Admit Card</h2>
                    <p class="text-sm text-gray-500">Update the information for this admit card.</p>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-4 rounded-md bg-green-50 p-4 text-green-700 border border-green-100">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admit.update', $admit->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-form-input label="নাম (বাংলা)" name="name_bn" :value="old('name_bn', $admit->name_bn)" required/>
                    <x-form-input label="পিতার নাম (বাংলা)" name="father_name_bn" :value="old('father_name_bn', $admit->father_name_bn)"/>
                    <x-form-input label="মাতার নাম" name="mother_name_bn" :value="old('mother_name_bn', $admit->mother_name_bn)"/>
                    <x-form-input label="স্কুল" name="school" :value="old('school', $admit->school)"/>
                    <x-form-input label="শ্রেণি" name="class" :value="old('class', $admit->class)"/>
                    <x-form-input label="পরীক্ষার তারিখ" name="exam_date" type="date" :value="old('exam_date', $admit->exam_date)"/>
                    <x-form-input label="পরীক্ষার রোল" name="roll" :value="old('roll', $admit->roll)"/>
                    <x-form-input label="পরীক্ষার কেন্দ্র" name="exam_center_bn" :value="old('exam_center_bn', $admit->exam_center_bn)"/>
                    <x-form-input label="পরীক্ষার সময়" name="exam_time" :value="old('exam_time', $admit->exam_time)"/>
                </div>

                <div class="flex items-center justify-between pt-6 mt-6 border-t border-gray-100">
                    <a href="{{ route('admit.list') }}" class="inline-flex items-center gap-2 text-sm text-gray-600 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                        </svg>
                        Back to List
                    </a>
                    <div class="flex items-center gap-3">
                        <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-linear-to-r from-indigo-600 to-purple-600 px-5 py-2 text-sm font-semibold text-white shadow-md hover:from-indigo-700 hover:to-purple-700 transition cursor-pointer">
                            Update Admit Card
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
