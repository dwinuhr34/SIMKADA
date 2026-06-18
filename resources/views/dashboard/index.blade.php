<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard SIMKADA</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f4f7fb;
display:flex;
color:#07122f;
}

/* SIDEBAR */

.sidebar{
width:250px;
min-height:100vh;
position:fixed;
padding:24px 20px;
color:white;

background:
linear-gradient(rgba(9,24,74,.92),rgba(9,24,74,.94)),
url('/images/Kantor.webp');

background-size:cover;
background-position:center;
}

.brand{
display:flex;
align-items:center;
gap:12px;
margin-bottom:38px;
}

.logo{
width:55px;
height:55px;
background:white;
border-radius:50%;
display:flex;
align-items:center;
justify-content:center;
overflow:hidden;
}

.logo img{
width:100%;
height:100%;
object-fit:cover;
}

.brand h2{
font-size:21px;
}

.brand p{
font-size:11px;
}

.menu-title{
font-size:11px;
opacity:.75;
margin-bottom:14px;
}

.menu{
display:flex;
align-items:center;
gap:12px;

text-decoration:none;
color:white;

padding:12px 15px;
border-radius:14px;

margin-bottom:13px;
font-size:13px;
}

.menu:hover{
background:rgba(255,255,255,.08);
}

.active{
background:#ff7a00;
}

.logout{
margin-top:40px;
}

/* MAIN */

.main{
margin-left:250px;
width:calc(100% - 250px);
padding:28px;
}

/* TOPBAR */

.topbar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:26px;
}

.top-title h1{
font-size:28px;
margin-bottom:8px;
}

.top-title p{
color:#64748b;
font-size:13px;
}

.admin{
display:flex;
align-items:center;
gap:12px;
}

.admin img{
width:44px;
height:44px;
border-radius:50%;
}

.admin h4{
font-size:14px;
}

.admin p{
font-size:11px;
color:#6b7280;
}

/* CARD */

.cards{
display:grid;
grid-template-columns:repeat(2,1fr);
gap:20px;
margin-bottom:28px;
}

.card{
background:white;
padding:24px;
border-radius:20px;
}

.card-icon{
width:58px;
height:58px;
border-radius:16px;

display:flex;
align-items:center;
justify-content:center;

color:white;
font-size:22px;
margin-bottom:18px;
}

.blue{
background:#2563eb;
}

.green{
background:#16a34a;
}

.card h2{
font-size:28px;
margin-bottom:8px;
}

.card p{
color:#64748b;
font-size:14px;
}

/* CONTENT */

.content{
display:grid;
grid-template-columns:2fr 1fr;
gap:20px;
}

.box{
background:white;
padding:24px;
border-radius:20px;
}

/* CHART */

.chart-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

.chart-header h2{
font-size:24px;
}

.chart-header select{
padding:8px 12px;
border:1px solid #dbe1ea;
border-radius:10px;
outline:none;
font-size:13px;
}

.chart{
height:320px;
display:flex;
align-items:flex-end;
gap:12px;
padding-top:20px;
}

.bar-item{
flex:1;
display:flex;
flex-direction:column;
align-items:center;
}

.bar{
width:100%;
background:#2563eb;
border-radius:12px 12px 0 0;
min-height:10px;
}

.month{
margin-top:10px;
font-size:12px;
color:#64748b;
}

/* TABLE */

.table-title{
font-size:22px;
margin-bottom:18px;
}

table{
width:100%;
border-collapse:collapse;
}

th{
text-align:left;
padding-bottom:14px;
font-size:13px;
color:#64748b;
}

td{
padding:14px 0;
border-top:1px solid #edf0f5;
font-size:13px;
}

.badge{
padding:6px 12px;
border-radius:999px;
font-size:12px;
font-weight:bold;
display:inline-block;
background:#dcfce7;
color:#166534;
}

</style>

</head>

<body>

<div class="sidebar">

<div class="brand">

<div class="logo">
<img src="/images/logo.jpg">
</div>

<div>
<h2>SIMKADA</h2>
<p>PTSP - Perikanan</p>
</div>

</div>

<p class="menu-title">MENU</p>

<a class="menu active" href="/dashboard">
<i class="fa-solid fa-house"></i>
Dashboard
</a>

<a class="menu" href="/perizinan">
<i class="fa-solid fa-folder"></i>
Data Perizinan
</a>

<a class="menu" href="/export-excel">
<i class="fa-solid fa-file-excel"></i>
Import Excel
</a>

<a class="menu" href="/laporan">
<i class="fa-solid fa-chart-line"></i>
Laporan
</a>

<a class="menu logout" href="/">
<i class="fa-solid fa-right-from-bracket"></i>
Logout
</a>

</div>

<div class="main">

<div class="topbar">

<div class="top-title">

<h1>Dashboard SIMKADA</h1>

<p>
Sistem Rekapan Data Perizinan Sektor Perikanan
</p>

</div>

<div class="admin">

<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">

<div>
<h4>Pegawai</h4>
<p>Bidang PTSP</p>
</div>

</div>

</div>

<div class="cards">

<div class="card">

<div class="card-icon blue">
<i class="fa-solid fa-folder"></i>
</div>

<h2>{{ $totalData }}</h2>

<p>Total Data Perizinan</p>

</div>

<div class="card">

<div class="card-icon green">
<i class="fa-solid fa-calendar-day"></i>
</div>

<h2>{{ $totalHariIni }}</h2>

<p>Total Perizinan Hari Ini</p>

</div>

</div>

<div class="content">

<div class="box">

<div class="chart-header">

<h2>Rekapan Data Perizinan</h2>

<form method="GET" action="/dashboard">

<select name="tahun" onchange="this.form.submit()">

@foreach($tahunList as $tahun)

<option
value="{{ $tahun }}"
{{ $tahun == $tahunDipilih ? 'selected' : '' }}>

{{ $tahun }}

</option>

@endforeach

</select>

</form>

</div>

<div class="chart">

@php

$max = max($rekapBulanan);

$bulanNama = [
'Jan','Feb','Mar','Apr','Mei','Jun',
'Jul','Agu','Sep','Okt','Nov','Des'
];

@endphp

@foreach($rekapBulanan as $index => $jumlah)

@php

$tinggi = $max > 0
? ($jumlah / $max) * 250
: 10;

@endphp

<div class="bar-item">

@if($jumlah > 0)
<div style="
font-size:12px;
font-weight:bold;
margin-bottom:5px;
color:#07122f;
">
{{ $jumlah }}
</div>
@endif

<div
class="bar"
style="height:{{ $tinggi }}px">
</div>

<div class="month">

{{ $bulanNama[$index] }}

</div>

</div>

@endforeach

</div>

</div>

<div class="box">

<h2 class="table-title">
    Data Perizinan Terbaru
</h2>

<table>

    <tr>

        <th style="width:70px; padding-left:10px;">
            No
        </th>

        <th style="padding-left:25px;">
            Perusahaan
        </th>

        <th style="text-align:center;">
            Jenis Izin
        </th>

    </tr>

    @foreach($dataTerbaru as $data)

    <tr>

        <td style="padding-left:10px;">
            {{ $loop->iteration }}
        </td>

        <td style="padding-left:25px;">
            {{ $data->nama_perusahaan }}
        </td>

        <td style="text-align:center;">

            <span class="badge">
                {{ $data->jenis_izin }}
            </span>

        </td>

    </tr>

    @endforeach

</table>

</div>

</div>

</div>

</body>
</html>