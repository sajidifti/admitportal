<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admit Cards List</title>
    <style>
        body {
            font-family: "SolaimanLipi.ttf", sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h2>Admit Cards</h2>

    <a href="{{ route('admit.create') }}">Create new</a>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>নাম</th>
                <th>রোল</th>
                <th>কেন্দ্র</th>
                <th>অ্যাকশন</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admitCards as $card)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $card->name_bn }}</td>
                    <td>{{ $card->roll }}</td>
                    <td>{{ $card->exam_center_bn }}</td>
                    <td>
                        <a href="{{ route('admit.pdf', $card->id) }}">Download PDF</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
