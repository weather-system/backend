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
        ], [
            'required' => 'Field :attribute wajib diisi.',
            'numeric' => 'Field :attribute harus berupa angka.',
            'string' => 'Field :attribute harus berupa teks.',
            'max' => 'Field :attribute maksimal 255 karakter.',
        ]);

        try {
            // Simpan data ke database
            $data = WeatherData::create($validatedData);

            // Log data yang disimpan
            Log::info('Data Saved:', $data->toArray());

            // Berikan respons sukses
            return response()->json([
                'message' => 'Data berhasil disimpan.',
                'data' => $data,
            ], 201);
        } catch (\Exception $e) {
            // Debug: Log error jika ada masalah
            Log::error('Error saving data:', [
                'error' => $e->getMessage(),
                'data' => $request->all(),
            ]);

            // Berikan respons gagal
            return response()->json([
                'message' => 'Gagal menyimpan data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function index()
    {
        try {
            // Ambil semua data dari tabel WeatherData
            $data = WeatherData::all();

            // Log data yang diambil
            Log::info('Weather Data Retrieved:', $data->toArray());

            // Berikan respons sukses
            return response()->json([
                'message' => 'Data berhasil diambil.',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            // Debug: Log error jika ada masalah
            Log::error('Error retrieving data:', [
                'error' => $e->getMessage(),
            ]);

            // Berikan respons gagal
            return response()->json([
                'message' => 'Gagal mengambil data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function showAll(Request $request)
    {
        try {
            // Ambil semua data WeatherData
            $data = WeatherData::all();

            // Berikan respons sukses
            return response()->json([
                'message' => 'Data berhasil diambil.',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            // Log error jika ada masalah
            Log::error('Error retrieving all data:', [
                'error' => $e->getMessage(),
            ]);

            // Berikan respons gagal
            return response()->json([
                'message' => 'Gagal mengambil semua data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


}
