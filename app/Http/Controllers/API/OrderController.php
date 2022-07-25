<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    // menampilkan data order
    public function index()
    {
        $datas = Order::all();
        return response()->json([
            'pesan' => 'Data Berhasil Ditemukan',
            'data' => $datas
        ], 200);
    }

    // menampilkan data berdasarkan id
    public function show($id)
    {
        // $data = Order::find($id);
        $data = Order::where('id_order', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Tidak ditemukan', 
                'data' => ''
            ], 404);
        }
        return response()->json([
            'pesan' => 'Data Berhasil Ditemukan', 
            'data' => $data], 200);
    }

    // create data order
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id_member' => 'required|numeric',
            'paket_id' => 'required|numeric',
            'status' => 'required',
            'alamat' => 'required',
        ]);
        if ($validasi->fails()) {
            return response()->json([
                'pesan' => 'data gagal ditambahkan', 
                'data' => $validasi->errors()->all()], 404);
        }
        $data = Order::create($request->all());
        return response()->json([
            'pesan' => 'data berhasil ditambahkan', 
            'data' => $data], 200);
    }

    // update data order
    public function update(Request $request, $id)
    {
        $orders = Order::where('id_order', $id)->first();
        if (empty($orders)) {
            return response()->json([
                'pesan' => 'data tidak ditemukan', 
                'data' => ''], 404);
        } else {
            $validasi = Validator::make($request->all(), [
                'id_member' => 'required|numeric',
                'paket_id' => 'required|numeric',
                'status' => 'required',
                'alamat' => 'required',
            ]);
            
            if ($validasi->fails()) {
                return response()->json([
                    'pesan' => 'Data Gagal diUpdate', 
                    'data' => $validasi->errors()->all()], 404);
            }
            $orders->update($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil disimpan', 
                'data' => $orders], 200);
        }
    }

    // delete data order berdasarkan id
    public function destroy($id)
    {
        $orderes = Order::where('id_order', $id)->first();
        if (empty($orderes)) {
            return response()->json([
                'pesan' => 'Data Tidak ditemukan', 
                'data' => ''], 404);
        }
        $orderes->delete();
        return response()->json([
            'pesan' => 'Data Berhasil dihapus', 
            'data' => $orderes], 200);
    }
    // tes relasi
    public function order_relasi()
    {
        $order = Order::with('member', 'paket')->get();
        return response()->json([
            'pesan' => 'Data Berhasil ditemukan', 
            'data' => $order], 200);
    }
}
