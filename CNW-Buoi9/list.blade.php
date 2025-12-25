@extends('layouts.app')

@section('content')
    <h2>Danh sách sinh viên</h2>

    <!-- Form thêm sinh viên -->
    <form action="{{ route('sinhvien.store') }}" method="POST" style="margin-bottom: 20px;">
        @csrf
        <label for="ten_sinh_vien">Tên sinh viên:</label>
        <input type="text" name="ten_sinh_vien" id="ten_sinh_vien" required style="margin-right:10px;">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required style="margin-right:10px;">

        <button type="submit">Thêm sinh viên</button>
    </form>

    <!-- Table danh sách sinh viên -->
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sinh viên</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($danhSachSV as $sv)
                <tr>
                    <td>{{ $sv->id }}</td>
                    <td>{{ $sv->ten_sinh_vien }}</td>
                    <td>{{ $sv->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 16px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }
        .styled-table tbody tr {
            background-color: #f3f3f3;
        }
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #e9e9e9;
        }
        .styled-table tbody tr:hover {
            background-color: #d1f2eb;
        }
        .styled-table th {
            text-transform: uppercase;
        }
    </style>
@endsection
