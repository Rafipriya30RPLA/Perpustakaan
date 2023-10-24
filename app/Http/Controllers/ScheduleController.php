<?php

namespace App\Http\Controllers;

use App\Models\peminjam;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
public function checkTenggat(Request $request)
{
    $today = now(); // Mengambil tanggal dan waktu saat ini

    // Mengambil semua schedule yang tenggat-nya melebihi hari ini
    $schedules = peminjam::where('tenggat', '>', $today)->get();

    // Iterasi melalui daftar peminjam yang melebihi tenggat
    foreach ($schedules as $schedule) {
        // Periksa apakah tenggat melebihi hari ini
        if ($schedule->tenggat > $today) {
            // Jika iya, atur status peminjam menjadi "terlambat"
            $schedule->update(['status' => 'terlambat']);
        }
    }

    // Mengembalikan data atau melakukan tindakan yang sesuai dengan hasilnya
    // Contoh: Mengembalikan data dalam bentuk JSON
    return response()->json(['schedules' => $schedules]);
}
}
