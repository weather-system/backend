<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherData;
use Illuminate\Support\Facades\Log;

class WeatherDataController extends Controller
{
    public function store(Request $request)
    {
        // Debug: Log semua request masuk
        Log::info('Incoming Request Data:', $request->all());

        // Validasi input
        $validatedData = $request->validate([
            'kecepatan_angin' => 'required|numeric',
            'arah_angin' => 'required|string|max:255',
            'curah_hujan' => 'required|numeric',
            'suhu' => 'required|numeric',
            'kelembapan' => 'required|numeric',
            'intensitas_cahaya' => 'required|numeric',
        ]);

        // Simpan ke database
        $data = WeatherData::create([
            'kecepatan_angin' => $request->kecepatan_angin,
            'arah_angin' => $request->arah_angin,
            'curah_hujan' => $request->curah_hujan,
            'suhu' => $request->suhu,
            'kelembapan' => $request->kelembapan,
            'intensitas_cahaya' => $request->intensitas_cahaya,
        ]);

        return response()->json([
            'message' => 'Data berhasil disimpan.',
            'data' => $data,
        ], 201);
    }

    public function index()
    {
        // Ambil semua data cuaca dari database
        $data = WeatherData::all();

        // Kembalikan response berupa data dalam format JSON
        return response()->json([
            'message' => 'Data cuaca berhasil diambil.',
            'data' => $data,
        ], 200);
    }
}
