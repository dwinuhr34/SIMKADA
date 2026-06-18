<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan SIMKADA</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Arial,sans-serif}
body{background:#f4f7fb;display:flex;color:#07122f}

.sidebar{width:250px;min-height:100vh;position:fixed;padding:24px 20px;color:white;background:linear-gradient(rgba(9,24,74,.92),rgba(9,24,74,.94)),url('/images/Kantor.webp');background-size:cover;background-position:center}
.brand{display:flex;align-items:center;gap:12px;margin-bottom:38px}
.logo{width:55px;height:55px;background:white;border-radius:50%;display:flex;align-items:center;justify-content:center;overflow:hidden}
.logo img{width:100%;height:100%;object-fit:cover}
.brand h2{font-size:21px}.brand p{font-size:11px}
.menu-title{font-size:11px;opacity:.75;margin-bottom:14px}
.menu{display:flex;align-items:center;gap:12px;text-decoration:none;color:white;padding:12px 15px;border-radius:14px;margin-bottom:13px;font-size:13px}
.menu:hover{background:rgba(255,255,255,.08)}
.active{background:#ff7a00}
.logout{margin-top:40px}

.main{margin-left:250px;width:calc(100% - 250px);padding:26px}
.topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:26px}
.topbar h1{font-size:28px}
.topbar p{color:#6b7280;margin-top:6px;font-size:13px}
.admin{display:flex;align-items:center;gap:12px}
.admin img{width:44px;height:44px;border-radius:50%}
.admin h4{font-size:14px}
.admin p{font-size:11px;color:#6b7280}

.box{background:white;padding:24px;border-radius:22px;margin-bottom:22px;overflow-x:auto}
.filter{display:flex;align-items:center;gap:10px;flex-wrap:nowrap;overflow-x:auto}
input,select{height:40px;border:1px solid #dbe1ea;border-radius:12px;padding:0 14px;outline:none;font-size:13px}

.btn{border:none;padding:10px 14px;border-radius:12px;color:white;text-decoration:none;cursor:pointer;font-size:12px;white-space:nowrap;display:flex;align-items:center;gap:6px}
.blue{background:#2563eb}
.green{background:#16a34a}
.red{background:#ef4444}
.gray{background:#64748b}

.total{margin-top:18px;background:#eff6ff;color:#1d4ed8;padding:14px;border-radius:12px;font-weight:bold}

table{width:100%;border-collapse:collapse;table-layout:fixed}
th{background:#f8fafc;text-align:left;padding:12px;color:#64748b;font-size:12px;border:1px solid #edf0f5;word-wrap:break-word;white-space:normal;vertical-align:top}
td{padding:12px;border:1px solid #edf0f5;font-size:12px;word-wrap:break-word;white-space:normal;vertical-align:top}

th:nth-child(1),td:nth-child(1){width:45px}
th:nth-child(2),td:nth-child(2){width:120px}
th:nth-child(3),td:nth-child(3){width:120px}
th:nth-child(4),td:nth-child(4){width:180px}
th:nth-child(5),td:nth-child(5){width:120px}
th:nth-child(6),td:nth-child(6){width:120px}
th:nth-child(7),td:nth-child(7){width:130px}
th:nth-child(8),td:nth-child(8){width:230px}
</style>
</head>

<body>

<div class="sidebar">
    <div class="brand">
        <div class="logo">
            <img src="/images/logo.jpg" alt="Logo">
        </div>

        <div>
            <h2>SIMKADA</h2>
            <p>PTSP - Perikanan</p>
        </div>
    </div>

    <p class="menu-title">MENU</p>

    <a class="menu" href="/dashboard"><i class="fa-solid fa-house"></i> Dashboard</a>
    <a class="menu" href="/perizinan"><i class="fa-solid fa-folder"></i> Data Perizinan</a>
    <a class="menu" href="/export-excel"><i class="fa-solid fa-file-excel"></i> Import Excel</a>
    <a class="menu active" href="/laporan"><i class="fa-solid fa-chart-line"></i> Laporan</a>
    <a class="menu logout" href="/"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>

<div class="main">

    <div class="topbar">
        <div>
            <h1>Laporan Data Perizinan</h1>
            <p>Kelola dan cetak laporan data perizinan</p>
        </div>

        <div class="admin">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
            <div>
                <h4>Pegawai</h4>
                <p>Bidang PTSP</p>
            </div>
        </div>
    </div>

    <div class="box">
        <form method="GET" action="/laporan" class="filter">
            <input type="text" name="cari" placeholder="Cari data..." value="{{ request('cari') }}">

            <select name="tahun">
                <option value="">Semua Tahun</option>
                @foreach($tahunList as $tahun)
                    <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                        {{ $tahun }}
                    </option>
                @endforeach
            </select>

            <select name="bulan">
                <option value="">Semua Bulan</option>
                @for($i=1;$i<=12;$i++)
                    <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
                        {{ date('F', mktime(0,0,0,$i,1)) }}
                    </option>
                @endfor
            </select>

            <button class="btn blue">
                <i class="fa-solid fa-filter"></i>
                Filter
            </button>

            <a href="/laporan" class="btn gray">
                <i class="fa-solid fa-rotate-right"></i>
                Reset
            </a>

            <a href="/laporan/excel?cari={{ request('cari') }}&tahun={{ request('tahun') }}&bulan={{ request('bulan') }}" class="btn green">
                <i class="fa-solid fa-file-excel"></i>
                Download Excel
            </a>

            <a href="/laporan/print?cari={{ request('cari') }}&tahun={{ request('tahun') }}&bulan={{ request('bulan') }}" target="_blank" class="btn red">
                <i class="fa-solid fa-print"></i>
                Print / PDF
            </a>
        </form>

        <div class="total">
            Total Data : {{ $perizinans->count() }}
        </div>
    </div>

    <div class="box">
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

            @forelse($perizinans as $data)
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
            @empty
            <tr>
                <td colspan="8">Data tidak ditemukan</td>
            </tr>
            @endforelse
        </table>
    </div>

</div>

</body>
</html>