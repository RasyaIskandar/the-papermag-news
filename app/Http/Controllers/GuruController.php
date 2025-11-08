<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Siswa::all();

        return view('guru.index', compact('gurus'));
    }

    
}
