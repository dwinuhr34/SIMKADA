<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Import Excel SIMKADA</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
padding:26px;
}

/* TOPBAR */

.topbar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:26px;
}

.topbar h1{
font-size:28px;
}

.topbar p{
color:#6b7280;
margin-top:6px;
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

/* BOX */

.export-box{
background:white;
border-radius:22px;
padding:28px;
}

.table-action{
display:flex;
align-items:center;
justify-content:space-between;
gap:12px;
margin-bottom:24px;
}

.left-action{
display:flex;
align-items:center;
gap:12px;
}

input[type=file]{
padding:10px;
border:1px solid #dbe1ea;
border-radius:10px;
background:white;
}

.search{
width:320px;
height:42px;
border:1px solid #dbe1ea;
border-radius:12px;
padding:0 14px;
outline:none;
}

.btn{
border:none;
padding:10px 16px;
border-radius:10px;
cursor:pointer;
font-size:13px;
color:white;
text-decoration:none;
}

.btn-import{
background:#2563eb;
}

.btn-delete{
background:#ef4444;
}

.success{
background:#dcfce7;
color:#166534;
padding:14px;
border-radius:12px;
margin-bottom:18px;
font-size:13px;
}

.history-title{
font-size:20px;
margin:24px 0 18px;
}

table{
width:100%;
border-collapse:collapse;
}

th{
text-align:left;
padding-bottom:14px;
color:#64748b;
font-size:12px;
}

td{
padding:14px 0;
border-top:1px solid #edf0f5;
font-size:12px;
}

.success-text{
color:#16a34a;
font-weight:bold;
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

<a class="menu" href="/dashboard">
<i class="fa-solid fa-house"></i>
Dashboard
</a>

<a class="menu" href="/perizinan">
<i class="fa-solid fa-folder"></i>
Data Perizinan
</a>

<a class="menu active" href="/export-excel">
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

<div>
<h1>Import Excel</h1>
<p>Upload data perizinan dari file Excel</p>
</div>

<div class="admin">

<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">

<div>
<h4>Pegawai</h4>
<p>Bidang PTSP</p>
</div>

</div>

</div>

<div class="export-box">

@if(session('success'))

<div class="success">
{{ session('success') }}
</div>

@endif

<form
action="/import-excel"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="table-action">

<div class="left-action">

<input type="file" name="file" required>

<button class="btn btn-import">

<i class="fa-solid fa-upload"></i>
Import Excel

</button>

</div>

<input
type="text"
id="searchInput"
class="search"
placeholder="Cari riwayat import...">

</div>

</form>

<h2 class="history-title">
Riwayat Import
</h2>

<table id="dataTable">

<tr>
<th>No</th>
<th>Nama File</th>
<th>Tanggal Import</th>
<th>Jumlah Data</th>
<th>Status</th>
<th>Aksi</th>
</tr>

@forelse($histories as $history)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $history->nama_file }}</td>

<td>
{{ $history->created_at->format('d/m/Y H:i') }}
</td>

<td>{{ $history->jumlah_data }}</td>

<td>

@if($history->status == 'Berhasil')

    <span class="success-text">
        {{ $history->status }}
    </span>

@else

    <span style="color:#ef4444; font-weight:bold;">
        {{ $history->status }}
    </span>

@endif

</td>

<td>

<form
action="/import-history/{{ $history->id }}"
method="POST">

@csrf
@method('DELETE')

<button
class="btn btn-delete"
onclick="return confirm('Hapus data import ini?')">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="6">
Belum ada riwayat import
</td>

</tr>

@endforelse

</table>

</div>

</div>

<script>

document.getElementById("searchInput")
.addEventListener("keyup", function(){

let keyword = this.value.toLowerCase();

let rows = document.querySelectorAll("#dataTable tr");

rows.forEach((row, index) => {

if(index === 0) return;

row.style.display =
row.innerText.toLowerCase().includes(keyword)
? ""
: "none";

});

});

</script>

</body>
</html>