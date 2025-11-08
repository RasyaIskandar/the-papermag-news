<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
      // Define the $siswas variable before passing it to the view
    $siswas = Siswa::all(); // Fetch data from the Siswa model (ensure you have a Siswa model defined)

    // Pass the $siswas variable to the view
    return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        // Validasi data input dari form
        $request->validate([
            'pelapor' => 'required|string|max:255',
            'terlapor' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'laporan' => 'required|string',
            'bukti' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048', // Validasi file upload
        ]);

        // Simpan data ke database
        $data = Siswa::create([
            'pelapor' => $request->input('pelapor'),
            'terlapor' => $request->input('terlapor'),
            'kelas' => $request->input('kelas'),
            'laporan' => $request->input('laporan'),
            'bukti' => $request->file('bukti')->store('bukti_laporan', 'public'), // Menyimpan file ke storage
            'status' => 'pending',
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function selesai($id)
    {
        $pengaduan = Siswa::find($id);
        $pengaduan->status = 'selesai';
        $pengaduan->save();

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Diubah');
    }

}
