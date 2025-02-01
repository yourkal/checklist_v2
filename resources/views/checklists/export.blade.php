<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Export Checklist</title>
  <style>
    body {
      font-family: 'DejaVu Sans', sans-serif;
      font-size: 10px;
      margin: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }

    th, td {
      border: 1px solid #000;
      padding: 5px;
      text-align: center;
    }

    th {
      background-color: #f4f4f4;
      font-size: 11px;
      font-weight: bold;
    }

    td {
      vertical-align: middle;
    }

    /* Styling untuk tabel daftar pekerjaan */
    .pekerjaan-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 5px;
    }

    .pekerjaan-table th,
    .pekerjaan-table td {
      border: 1px solid black;
      padding: 5px;
      text-align: center;
      font-size: 9px;
    }

    .checked {
      font-size: 12px;
      font-weight: bold;
      color: black;
    }

    .unchecked {
      font-size: 12px;
      color: gray;
    }
    
    /* Tambahan jarak antar checklist */
    .checklist-wrapper {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <h2>Daftar Checklist</h2>

  @foreach($checklists as $checklist)
    <div class="checklist-wrapper">
      <!-- Tabel Header Informasi Checklist -->
      <table>
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Jam</th>
            <th>PIC</th>
            <th>Area</th>
            <th>Notes</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $checklist->tanggal }}</td>
            <td>{{ \Carbon\Carbon::createFromFormat('m', str_pad($checklist->bulan, 2, '0', STR_PAD_LEFT))->format('F') }}</td>
            <td>{{ $checklist->tahun }}</td>
            <td>{{ $checklist->jam_inspeksi }}</td>
            <td>{{ $checklist->nama_pic }}</td>
            <td>{{ $checklist->area }}</td>
            <td>{{ $checklist->deskripsi_pekerjaan }}</td>
          </tr>
        </tbody>
      </table>

      <!-- Tabel Checklist Pekerjaan -->
      <table class="pekerjaan-table">
        <thead>
          
            <th colspan="9">Checklist Pekerjaan</th>
          
        </thead>
        <tbody>
          @php
            $pekerjaan = [
              'Cermin', 'Pintu Masuk', 'Platfon', 'Kap Lampu', 'Dinding Kubikal',
              'Wastafel', 'Accesories Toilet', 'Tempat Sampah', 'Closet', 'Exhaust Fan',
              'Lantai', 'Floordrain', 'Flushing', 'Urinoir', 'Hand Soap', 'Tissue', 'Keset',''
            ];
            // Membagi daftar pekerjaan menjadi 2 kolom agar tampilan lebih rapi
            $pekerjaan_chunked = array_chunk($pekerjaan, ceil(count($pekerjaan) / 2));
          @endphp
          @foreach($pekerjaan_chunked as $chunk)
            <tr>
              @foreach($chunk as $item)
                <td>
                  @if(in_array($item, $checklist->status_pekerjaan))
                    <span class="checked">✔</span>
                  @else
                    <span class="unchecked">✘</span>
                  @endif
                  {{ $item }}
                </td>
              @endforeach
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endforeach
</body>
</html>
