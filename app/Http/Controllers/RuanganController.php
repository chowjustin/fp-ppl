<?php

namespace App\Http\Controllers;
use App\Factories\RuanganFactory;
use App\Http\Requests\StoreRuanganRequest;

use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function store(StoreRuanganRequest $request)
    {
        $ruangan = RuanganFactory::create($request->input('type'), $request->validated());

        return response()->json([   
            'message' => "Ruangan '{$ruangan->name}' dengan tipe '{$request->input('type')}' dan kapasitas {$ruangan->capacity} berhasil dibuat.",
            'data' => $ruangan
        ], 201); 
    }
}
