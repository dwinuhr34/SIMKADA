<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Perizinan SIMKADA</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
.active{background:#ff7a00}.logout{margin-top:40px}

.main{margin-left:250px;width:calc(100% - 250px);padding:26px}
.topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:26px}
.topbar h1{font-size:28px}.topbar p{color:#6b7280;margin-top:6px;font-size:13px}
.admin{display:flex;align-items:center;gap:12px}
.admin img{width:44px;height:44px;border-radius:50%}
.admin h4{font-size:14px}.admin p{font-size:11px;color:#6b7280}

.table-box{background:white;padding:24px;border-radius:22px;overflow-x:auto}
.table-action{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;gap:12px}
.search{width:320px;height:42px;border:1px solid #dbe1ea;border-radius:12px;padding:0 14px;outline:none}
.btn-add{background:#2563eb;color:white;border:none;padding:12px 16px;border-radius:12px;cursor:pointer;font-size:13px}

table{width:100%;border-collapse:collapse;table-layout:fixed}
th{background:#f8fafc;text-align:left;padding:12px;color:#64748b;font-size:12px;border:1px solid #edf0f5}
td{padding:12px;border:1px solid #edf0f5;font-size:12px;word-wrap:break-word;white-space:normal;vertical-align:top}

th:nth-child(1),td:nth-child(1){width:45px}
th:nth-child(2),td:nth-child(2){width:120px}
th:nth-child(3),td:nth-child(3){width:120px}
th:nth-child(4),td:nth-child(4){width:180px}
th:nth-child(5),td:nth-child(5){width:120px}
th:nth-child(6),td:nth-child(6){width:200px}
th:nth-child(7),td:nth-child(7){width:120px}
th:nth-child(8),td:nth-child(8){width:170px}

.aksi{display:flex;align-items:center;justify-content:center;gap:8px}
.btn-edit{background:#2563eb;color:white;border:none;padding:8px 12px;border-radius:8px;cursor:pointer;font-size:12px;display:flex;align-items:center;gap:5px}
.btn-hapus{background:#ef4444;color:white;border:none;padding:8px 12px;border-radius:8px;cursor:pointer;font-size:12px;display:flex;align-items:center;gap:5px}

.modal{position:fixed;inset:0;background:rgba(0,0,0,.4);display:none;justify-content:center;align-items:center;z-index:99}
.modal-box{width:720px;max-height:90vh;overflow-y:auto;background:white;padding:30px;border-radius:24px}
.modal-box h2{margin-bottom:20px}
.modal-box label{display:block;margin-top:14px;margin-bottom:6px;font-size:13px;font-weight:bold}
.modal-box input,.modal-box textarea{width:100%;border:1px solid #dbe1ea;border-radius:12px;padding:12px;outline:none}
.modal-box textarea{min-height:90px}
.modal-action{display:flex;gap:12px;margin-top:24px}
.btn-save{flex:1;background:#2563eb;color:white;border:none;padding:14px;border-radius:12px;cursor:pointer}
.btn-cancel{flex:1;background:#e5e7eb;border:none;padding:14px;border-radius:12px;cursor:pointer}
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
    <a class="menu active" href="/perizinan"><i class="fa-solid fa-folder"></i> Data Perizinan</a>
    <a class="menu" href="/export-excel"><i class="fa-solid fa-file-excel"></i> Import Excel</a>
    <a class="menu" href="/laporan"><i class="fa-solid fa-chart-line"></i> Laporan</a>
    <a class="menu logout" href="/"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>

<div class="main">

    <div class="topbar">
        <div>
            <h1>Data Perizinan</h1>
            <p>Kelola data perizinan sektor perikanan</p>
        </div>

        <div class="admin">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
            <div>
                <h4>Pegawai</h4>
                <p>Bidang PTSP</p>
            </div>
        </div>
    </div>

    <div class="table-box">

        <div class="table-action">
            <input type="text" id="searchInput" class="search" placeholder="Cari data perizinan...">

            <button class="btn-add" onclick="openModal('modalTambah')">
                <i class="fa-solid fa-plus"></i> Tambah Data
            </button>
        </div>

        <table id="dataTable">
            <tr>
                <th>No</th>
                <th>Nomor Izin</th>
                <th>Nomor SKRD</th>
                <th>Nama Perusahaan</th>
                <th>Jenis Izin</th>
                <th>Lokasi</th>
                <th>Masa Berlaku</th>
                <th>Aksi</th>
            </tr>

            @forelse($perizinans as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nomor_izin }}</td>
                <td>{{ $data->nomor_skrd }}</td>
                <td>{{ $data->nama_perusahaan }}</td>
                <td>{{ $data->jenis_izin }}</td>
                <td>{{ $data->lokasi_perusahaan }}</td>
                <td>{{ $data->masa_berlaku_izin }}</td>
                <td>
                    <div class="aksi">
                        <button class="btn-edit" onclick="openModal('modalEdit{{ $data->id }}')">
                            <i class="fa-solid fa-pen"></i> Edit
                        </button>

                        <form action="/perizinan/{{ $data->id }}" method="POST" style="margin:0;">
                            @csrf
                            @method('DELETE')

                            <button class="btn-hapus" onclick="return confirm('Yakin hapus data ini?')">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>

            <div class="modal" id="modalEdit{{ $data->id }}">
                <div class="modal-box">
                    <h2>Edit Data Perizinan</h2>

                    <form action="/perizinan/{{ $data->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label>Nomor Izin</label>
                        <input type="text" name="nomor_izin" value="{{ $data->nomor_izin }}" required>

                        <label>Nomor SKRD</label>
                        <input type="text" name="nomor_skrd" value="{{ $data->nomor_skrd }}" required>

                        <label>Tanggal Izin</label>
                        <input type="date" name="tanggal_izin" value="{{ $data->tanggal_izin }}" required>

                        <label>Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" value="{{ $data->nama_perusahaan }}" required>

                        <label>Alamat</label>
                        <textarea name="alamat" required>{{ $data->alamat }}</textarea>

                        <label>Jenis Izin</label>
                        <input type="text" name="jenis_izin" value="{{ $data->jenis_izin }}" required>

                        <label>Lokasi Perusahaan</label>
                        <textarea name="lokasi_perusahaan" required>{{ $data->lokasi_perusahaan }}</textarea>

                        <label>Masa Berlaku Izin</label>
                        <input type="date" name="masa_berlaku_izin" value="{{ $data->masa_berlaku_izin }}" required>

                        <label>Tanggal Bayar</label>
                        <input type="date" name="tanggal_bayar" value="{{ $data->tanggal_bayar }}">

                        <label>Keterangan</label>
                        <textarea name="keterangan">{{ $data->keterangan }}</textarea>

                        <div class="modal-action">
                            <button class="btn-save">Update</button>
                            <button type="button" class="btn-cancel" onclick="closeModal('modalEdit{{ $data->id }}')">Batal</button>
                        </div>
                    </form>
                </div>
            </div>

            @empty
            <tr>
                <td colspan="8">Belum ada data perizinan</td>
            </tr>
            @endforelse
        </table>
    </div>
</div>

<div class="modal" id="modalTambah">
    <div class="modal-box">
        <h2>Tambah Data Perizinan</h2>

        <form action="/perizinan" method="POST">
            @csrf

            <label>Nomor Izin</label>
            <input type="text" name="nomor_izin" required>

            <label>Nomor SKRD</label>
            <input type="text" name="nomor_skrd" required>

            <label>Tanggal Izin</label>
            <input type="date" name="tanggal_izin" required>

            <label>Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" required>

            <label>Alamat</label>
            <textarea name="alamat" required></textarea>

            <label>Jenis Izin</label>
            <input type="text" name="jenis_izin" required>

            <label>Lokasi Perusahaan</label>
            <textarea name="lokasi_perusahaan" required></textarea>

            <label>Masa Berlaku Izin</label>
            <input type="date" name="masa_berlaku_izin" required>

            <label>Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar">

            <label>Keterangan</label>
            <textarea name="keterangan"></textarea>

            <div class="modal-action">
                <button class="btn-save">Simpan</button>
                <button type="button" class="btn-cancel" onclick="closeModal('modalTambah')">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(id){
    document.getElementById(id).style.display = "flex";
}

function closeModal(id){
    document.getElementById(id).style.display = "none";
}

document.getElementById("searchInput").addEventListener("keyup", function(){
    let keyword = this.value.toLowerCase();
    let rows = document.querySelectorAll("#dataTable tr");

    rows.forEach((row, index) => {
        if(index === 0) return;
        row.style.display = row.innerText.toLowerCase().includes(keyword) ? "" : "none";
    });
});
</script>

</body>
</html>