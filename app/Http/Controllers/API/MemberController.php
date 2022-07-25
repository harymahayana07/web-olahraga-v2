<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    // menampilkan semua data member
    public function index()
    {
        $datas = Member::all();
        return response()->json([
            'pesan' => 'Data Berhasil Ditemukan',
            'data' => $datas
        ], 200);
    }

    // menampilkan berdasarkan id
    public function show($id)
    {
        $data = Member::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Tidak ditemukan', 
                'data' => ''], 404);
        }
        return response()->json([
            'pesan' => 'Data Berhasil Ditemukan', 
            'data' => $data], 200);
    }

    // create data member
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required'
        ]);
        if ($validasi->fails()) {
            return response()->json([
                'pesan' => 'data gagal ditambahkan', 
                'data' => $validasi->errors()->all()], 404);
        }
        $data = Member::create($request->all());
        return response()->json([
            'pesan' => 'data berhasil ditambahkan', 
            'data' => $data], 200);
    }

    // update data member
    public function update(Request $request, $id)
    {
        $memberr = Member::where('id', $id)->first();
        if (empty($memberr)) {
            return response()->json([
                'pesan' => 'data tidak ditemukan', 
                'data' => ''], 404);
        } else {
            $validasi = Validator::make($request->all(), [
                'nama' => 'required',
                'no_hp' => 'required|numeric',
                'email' => 'required',
                'alamat' => 'required'
            ]);

            if ($validasi->fails()) {
                return response()->json([
                    'pesan' => 'Data Gagal diUpdate', 
                    'data' => $validasi->errors()->all()], 404);
            }
            $memberr->update($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil disimpan', 
                'data' => $memberr], 200);
        }
    }

    // delete member
    public function destroy($id)
    {
        $data = Member::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Tidak ditemukan', 
                'data' => ''], 404);
        }
        $data->delete();
        return response()->json([
            'pesan' => 'Data Berhasil dihapus', 
            'data' => $data], 200);
    }

    // Relasi data member dengan tabel order
    public function member_relasi()
    {
        $members = Member::with('order')->get();
        return response()->json([
            'pesan' => 'Data Berhasil ditemukan', 
            'data' => $members], 200);
    }
}
