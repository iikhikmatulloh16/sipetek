<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 14px;
                color: #6c757d;
            }
            p {
                margin-top: -0.9rem;
            }
            .header {
                text-align: center;
                padding-bottom: 0.9rem;
            }
            .table {
                border-collapse: collapse;
                width: 100%;
            }
            .table thead th {
                padding: 12px 8px 12px 8px;
                text-align: left;
                background-color: #313a46;
                color: #fff;
            }
            .table tbody td {
                font-weight: 400;
            }
            .table td,
            .table th {
                border: 1px solid #ddd;
                padding: 8px;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h3>
                DINAS TENAGA KERJA DAN TRANSMIGRASI <br />
                KABUPATEN SUBANG
            </h3>
            <p>Jl. Mayjen Sutoyo Siswomiharjo No.48, Karanganyar, <br />Kec. Subang, Kabupaten Subang, <br />Jawa Barat 41211</p>
            <hr />
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pengadu</th>
                    <th>Perusahaan Terkait</th>
                    <th>Perihal Pengaduan</th>
                    <th>Tanggal Pengaduan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->author->name }}</td>
                    <td>{{ $row->perusahaan->name }}</td>
                    <td>{{ $row->perihal->name }}</td>
                    <td>{{ $row->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
