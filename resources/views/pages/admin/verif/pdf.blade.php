<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pekerjaan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table, td, th {
          border: 1px solid black;
          padding: 1%;
        }

        table {
          width: 100%;
          border-collapse: collapse;
        }
        .content {
            padding: 1ch
        }
        </style>
</head>
<body>
    <div style="padding: 2rem">
        <div style="padding: 1rem">
            <h3> <center> <b><i> PT. Teknologi Kode Indonesia </i></b> </center> </h3>
        </div>
        <div class="content">
            <h6>Tanggal Tugas : {{ $verif->created_at }}</h6><br>
            <table>
                <tr>
                    <th>No</th>
                    <th>Tugas Yang Sudah Dikerjakan</th>
                </tr>
                @foreach ($taskResults as $result)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $result->task->name }}</td>
                    </tr>
                    @endforeach
            </table>

        </div>
    </div>
</body>
</html>
