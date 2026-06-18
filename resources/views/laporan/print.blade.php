<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Print Laporan</title>

<style>
body{font-family:Arial,sans-serif;color:#111}
h2{text-align:center;margin-bottom:5px}
p{text-align:center;margin-top:0}

table{width:100%;border-collapse:collapse;margin-top:25px;table-layout:fixed}
th,td{border:1px solid #333;padding:8px;font-size:11px;word-wrap:break-word;white-space:normal;vertical-align:top}
th{background:#eee}

th:nth-child(1),td:nth-child(1){width:35px}
th:nth-child(2),td:nth-child(2){width:90px}
th:nth-child(3),td:nth-child(3){width:90px}
th:nth-child(4),td:nth-child(4){width:150px}
th:nth-child(5),td:nth-child(5){width:80px}
th:nth-child(6),td:nth-child(6){width:90px}
th:nth-child(7),td:nth-child(7){width:100px}
th:nth-child(8),td:nth-child(8){width:180px}
</style>
</head>

<body onload="window.print()">

<h2>LAPORAN DATA PERIZINAN</h2>
<p>SIMKADA - PTSP Perikanan</p>

<table>
<tr>
    <th>No</th>
    <th>Nomor Izin</th>
    <th>Nomor SKRD</th>
    <th>Nama Perusahaan</th>
    <th>Jenis Izin</th>
    <th>Tanggal Izin</th>
    <th>Masa Berlaku</th>
    <th>Keterangan</th>
</tr>

@foreach($perizinans as $data)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $data->nomor_izin }}</td>
    <td>{{ $data->nomor_skrd }}</td>
    <td>{{ $data->nama_perusahaan }}</td>
    <td>{{ $data->jenis_izin }}</td>
    <td>{{ $data->tanggal_izin }}</td>
    <td>{{ $data->masa_berlaku_izin }}</td>
    <td>{{ $data->keterangan }}</td>
</tr>
@endforeach
</table>

</body>
</html>