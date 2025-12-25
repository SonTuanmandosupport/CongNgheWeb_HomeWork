<?php

namespace App\Http\Controllers;
use App\Models\SinhVien;

use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function index()
    {
        $danhSachSV = SinhVien::all();
        return view('sinhvien.list', compact('danhSachSV'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        SinhVien::create($data);

        return redirect()->route('sinhvien.index');
    }
}
