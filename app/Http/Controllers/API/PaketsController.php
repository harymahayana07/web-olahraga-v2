<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Support\Facades\Validator;

class PaketsController extends Controller
{
    // menampilkan data pakets
    public function index()
    {
        $datas = Paket::all();
        return response()->json([
            'pesan' => 'Data Berhasil Ditemukan',
            'data' => $datas
        ], 200);
    }
    // menampilkan data paket berdasarkan id
    public function show($id)
    {
        $data = Paket::where('id_paket', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Tidak ditemukan', 
                'data' => ''], 404);
        }
        return response()->json([
            'pesan' => 'Data Berhasil Ditemukan', 
            'data' => $data], 200);
    }

    // create data order
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_paket' => 'required',
            'harga_paket' => 'required',
            'ket_paket' => 'required',
            'category_paket' => 'required'
        ]);
        if ($validasi->fails()) {
            return response()->json([
                'pesan' => 'data gagal ditambahkan', 
                'data' => $validasi->errors()->all()], 404);
        }
        $data = Paket::create($request->all());
        return response()->json([
            'pesan' => 'data berhasil ditambahkan', 
            'data' => $data], 200);
    }

    // update data paket berdasarkan id
    public function update(Request $request, $id)
    {
        $pakets = Paket::where('id_paket', $id)->first();
        if (empty($pakets)) {
            return response()->json([
                'pesan' => 'data tidak ditemukan', 
                'data' => ''], 404);
        } else {
            $validasi = Validator::make($request->all(), [
                'nama_paket' => 'required',
                'harga_paket' => 'required|numeric',
                'ket_paket' => 'required',
                'category_paket' => 'required'
            ]);

            if ($validasi->fails()) {
                return response()->json([
                    'pesan' => 'Data Gagal diUpdate', 
                    'data' => $validasi->errors()->all()], 404);
            }
            $pakets->update($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil disimpan', 
                'data' => $pakets], 200);
        }
    }

    // delete paket berdasarkan request id
    public function destroy($id)
    {
        $pakets = Paket::where('id_paket', $id)->first();
        if (empty($pakets)) {
            return response()->json([
                'pesan' => 'Data Tidak ditemukan', 
                'data' => ''], 404);
        }
        $pakets->delete();
        return response()->json([
            'pesan' => 'Data Berhasil dihapus', 
            'data' => $pakets], 200);
    }

    // Relasi tabel paket dengan tabel order
    public function paket_relasi()
    {
        $pakets = Paket::with('order')->get();
        return response()->json([
            'pesan' => 'Data Berhasil ditemukan', 
            'data' => $pakets], 200);
    }
}
