<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="width: 100%;border: 1px solid #000000;border-collapse: collapse">
        <thead>
            <tr style="border: 1px solid #000000;">
                <th style="border: 1px solid #000000;">SL</th>
                <th style="border: 1px solid #000000">Appointment Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointment_types as $list)
                <tr style="border: 1px solid #000000;">
                    <td style="border: 1px solid #000000;text-align: center;">{{ $loop->index+1 }}</td>
                    <td style="border: 1px solid #000000;text-align: center">{{ $list->appoinment_type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
