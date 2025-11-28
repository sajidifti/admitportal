<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admit Card Form</title>
    <style>
        body {
            font-family: "SolaimanLipi.ttf", sans-serif;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="date"] {
            width: 320px;
            padding: 6px;
        }
    </style>
</head>

<body>
    <h2>Admit Card Form</h2>

    @if (session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admit.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>নাম (বাংলা):</label>
        <input type="text" name="name_bn" value="{{ old('name_bn') }}">
        @error('name_bn')
            <div style="color:red">{{ $message }}</div>
        @enderror

        <label>পিতার নাম (বাংলা):</label>
        <input type="text" name="father_name_bn" value="{{ old('father_name_bn') }}">
        @error('father_name_bn')
            <div style="color:red">{{ $message }}</div>
        @enderror

        <label>মাতার নাম:</label>
        <input type="text" name="mother_name_bn" value="{{ old('mother_name_bn') }}">
        @error('mother_name_bn')
            <div style="color:red">{{ $message }}</div>
        @enderror

        <label>স্কুল:</label>
        <input type="text" name="school" value="{{ old('school') }}">
        @error('school')
            <div style="color:red">{{ $message }}</div>
        @enderror

        <label>পরীক্ষার তারিখ:</label>
        <input type="date" name="exam_date" value="{{ old('exam_date') }}">
        @error('exam_date')
            <div style="color:red">{{ $message }}</div>
        @enderror

        <label>পরীক্ষার রোল:</label>
        <input type="text" name="roll" value="{{ old('roll') }}">
        @error('roll')
            <div style="color:red">{{ $message }}</div>
        @enderror

        <label>পরীক্ষার কেন্দ্র:</label>
        <input type="text" name="exam_center_bn" value="{{ old('exam_center_bn') }}">
        @error('exam_center_bn')
            <div style="color:red">{{ $message }}</div>
        @enderror

        <label>পরীক্ষার সময়:</label>
        <input type="text" name="exam_time" value="{{ old('exam_time') }}">
        @error('exam_time')
            <div style="color:red">{{ $message }}</div>
        @enderror

        <!--
        <label>ছবি (jpg/png):</label>
        <input type="file" name="photo">
        @error('photo')
    <div style="color:red">{{ $message }}</div>
@enderror -->

        <div style="margin-top:15px;">
            <button type="submit">Save</button>
            <a href="{{ route('admit.list') }}" style="margin-left:10px;">View List</a>
        </div>
    </form>
</body>

</html>


<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Admit Card</title>
</head>
<body>

<h2>Admit Card Form</h2>

<form action="{{ route('admit.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>নাম:</label><br>
    <input type="text" name="name_bn"><br><br>

    <label>পিতার নাম:</label><br>
    <input type="text" name="father_name_bn"><br><br>

    <label>মাতার নাম:</label><br>
    <input type="text" name="mother_name_bn"><br><br>

    <label>স্কুল:</label><br>
    <input type="date" name="dob"><br><br>

    <label>পরীক্ষার রোল:</label><br>
    <input type="text" name="roll"><br><br>

    <label>পরীক্ষার কেন্দ্র:</label><br>
    <input type="text" name="exam_center_bn"><br><br>


    <label>পরীক্ষার সময়:</label><br>
    <input type="text" name="exam_center_bn"><br><br>


    <label>পরীক্ষার তারিখ:</label><br>
    <input type="text" name="exam_center_bn"><br><br>

    <button type="submit">Save</button>
</form>

</body>
</html>
-->
