<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Checklist</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2,
        h3 {
            color: #343a40;
            font-weight: 600;
        }

        .form-label {
            font-size: 1.1rem;
            font-weight: 500;
            color: #495057;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 20px;
            font-size: 1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .table {
            border-collapse: collapse;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: center;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }

        .table td {
            background-color: #ffffff;
        }

        .table-sm td,
        .table-sm th {
            padding: 8px;
        }

        .form-check-label {
            font-size: 1rem;
            color: #495057;
        }

        .form-check-input {
            transform: scale(1.3);
        }

        .form-check {
            margin-bottom: 10px;
        }

        .checkbox-wrapper {
            display: grid;
            grid-template-columns: 2fr 4fr 4fr;
            /* Two columns */
            gap: 10px;
        }

        .checkbox-wrapper .form-check {
            width: 100%;
        }

        hr {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .table-sm {
            border: none;
        }

        .status-checkbox {
            width: 20px;
            height: 20px;
        }

        .table-sm tr td:first-child {
            font-weight: 500;
        }

        .status-column {
            text-align: left;
        }

        .table td {
            padding: 8px 10px;
        }

        .navbar {
            background-color: #3a3b3d;
        }

        .navbar .navbar-brand {
            color: #ffffff;
            font-size: 1.5rem;
        }

        .navbar .navbar-nav .nav-item .nav-link {
            color: #ffffff;
            font-size: 1rem;
        }

        .navbar .navbar-nav .nav-item .nav-link:hover {
            color: #d3d3d3;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <div class="d-flex">
                <span class="navbar-text me-3">
                    Hi, {{ Auth::user()->name }}
                </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4 mb-4">
        <h2>Manajemen Checklist</h2>
        <form action="{{ route('checklists.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Tanggal</label>
                    <input type="date" class="form-control form-control-sm" name="tanggal" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Bulan</label>
                    <select class="form-control form-control-sm" name="bulan" required>
                        @foreach (range(1, 12) as $month)
                            <option value="{{ $month }}">{{ \Carbon\Carbon::createFromFormat('m', $month)->format('F') }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tahun</label>
                    <select class="form-control form-control-sm" name="tahun" required>
                        @for ($year = 2020; $year <= date('Y'); $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Jam Inspeksi</label>
                    <select class="form-control form-control-sm" name="jam_inspeksi" required>
                        <option value="07:00">07:00</option>
                        <option value="09:00">09:00</option>
                        <option value="11:00">11:00</option>
                        <option value="14:00">14:00</option>
                        <option value="17:00">17:00</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama PIC</label>
                    <input type="text" class="form-control form-control-sm" name="nama_pic" required>
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Area</label>
                    <select class="form-control form-control-sm" name="area" required>
                        <option value="Area 1">Area 1</option>
                        <option value="Area 2">Area 2</option>
                        <option value="Area 3">Area 3</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Notes</label>
                    <input type="text" class="form-control form-control-sm" name="deskripsi_pekerjaan" required>
                </div>
            </div>
            

            <div class="mb-3 mt-3">
                <label class="form-label">Checklist Pekerjaan =</label>
                <div class="checkbox-wrapper">
                    @foreach (['Cermin', 'Pintu Masuk', 'Platfon', 'Kap Lampu', 'Dinding Kubikal', 'Wastafel', 'Accesories Toilet', 'Tempat Sampah', 'Closet', 'Exhaust Fan', 'Lantai', 'Floordrain', 'Flushing', 'Urinoir', 'Hand Soap', 'Tissue', 'Keset'] as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status_pekerjaan[]"
                                value="{{ $item }}">
                            <label class="form-check-label">{{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <hr>
        
            <h3>Daftar Checklist</h3>
            <table class="table table-bordered">
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
                    @foreach($checklists as $checklist)
                    <tr>
                        <td>{{ $checklist->tanggal }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('m', $checklist->bulan)->format('F') }}</td>
                        <td>{{ $checklist->tahun }}</td>
                        <td>{{ $checklist->jam_inspeksi }}</td>
                        <td>{{ $checklist->nama_pic }}</td>
                        <td>{{ $checklist->area }}</td>
                        <td>{{ $checklist->deskripsi_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <strong>Daftar Pekerjaan:</strong>
                            <table class="table table-bordered">
                                @php
                                    $pekerjaan = ['Cermin', 'Pintu Masuk', 'Platfon', 'Kap Lampu', 'Dinding Kubikal', 'Wastafel', 'Accesories Toilet', 'Tempat Sampah', 'Closet', 'Exhaust Fan', 'Lantai', 'Floordrain', 'Flushing', 'Urinoir', 'Hand Soap', 'Tissue', 'Keset'];
                                    $pekerjaan_chunked = array_chunk($pekerjaan, ceil(count($pekerjaan) / 2)); // Membagi menjadi 2 bagian
                                @endphp
                                @foreach($pekerjaan_chunked as $chunk)
                                <tr>
                                    @foreach($chunk as $item)
                                        <td>
                                            @if(in_array($item, $checklist->status_pekerjaan))
                                                <span style="font-size: 14px; font-weight: bold; color: black;">✔</span>
                                            @else
                                                <span style="color: gray;">✘</span>
                                            @endif
                                            {{ $item }}
                                        </td>
                                    @endforeach
                                </tr>
                                @endforeach
                                
                            </table>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
            <a href="{{ route('checklists.export-pdf') }}" class="btn btn-danger mb-3">Export PDF</a>
        </div>
        
    
</body>

</html>
