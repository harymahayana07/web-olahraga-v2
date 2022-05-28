<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
    // untuk api.php
    public function indexApi()
    {
        // $data = Paket::all();
        // return response()->json($data, 200);
        // return json_encode($data);
        $data = Paket::with('pembeli')->get();
        return response()->json([
            'pesan' => 'Data Berhasil Ditemukan',
            'data' => $data
        ], 200);
    }

    public function showApi(Paket $id)
    {
        return response()->json($id, 200);
    }
    public function createApi()
    {
        // 
    }
    public function ambildataApi(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id' => 'required|numeric|unique:gym|min:1',
            'nama_paket' => 'required|min:4|max:100',
            'harga_paket' => 'required|min:1|max:20',
            'jumlah_paket' => 'required|min:1|max:100',
            'ket_paket' => 'required|min:2|max:250',
           'no_hp_pembeli' => 'required|numeric'
        ]);

        if ($validasi->passes()) {
            $data = Paket::create($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil Ditambahkan',
                'data'  => $data
            ], 200);
        }
        return response()->json([
            'pesan' => 'Data Gagal Ditambahkan',
            'data'  => $validasi->errors()->all()
        ], 404);
    }
    public function updateApi(Request $request, $id)
    {
        $data = Paket::where('id', $id)->first();

        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Tidak Ditemukan',
                'data'  => ''
            ], 404);
        } else {
            $validasi = Validator::make($request->all(), [
                'id' => 'required|numeric|unique:gym|min:1',
                'nama_paket' => 'required|min:4|max:100',
                'harga_paket' => 'required|min:1|max:20',
                'jumlah_paket' => 'required|min:1|max:100',
                'ket_paket' => 'required|min:2|max:250',
                'no_hp_pembeli' => 'required|numeric'
            ]);
            if ($validasi->passes()) {
                $data->update($request->all());
                return response()->json([
                    'pesan' => "Data Berhasil Disimpan",
                    'data'  => $data
                ], 200);
            } else {
                return response()->json([
                    'pesan' => 'Data Gagal di Update',
                    'data'  => $validasi->errors()->all()
                ], 404);
            }
        }
    }
   
    public function destroyApi($id)
    {
        $data = Paket::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Tidak Ditemukan',
                'data'  => ''
            ], 404);
        }
        $data->delete();
        return response()->json([
            'pesan' => 'Data Berhasil Dihapus',
            'data'  => $data
        ], 200);
    }


// untuk web.php
    public function index()
    {
        $data = Paket::all();
        return view('gym/index', compact('data'));
    }
    public function create()
    {
        return view('gym/add');
    }
    public function ambilData(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric|unique:paketgym|min:1',
            'nama_paket' => 'required|min:4|max:100',
            'harga_paket' => 'required|min:1|max:20',
            'jumlah_paket' => 'required|min:1|max:100',
            'ket_paket' => 'required|min:2|max:250'

        ]);
        $data = Paket::create($request->all());
        // redirect
        return redirect('gym/index');
        // dd($request->all());
    }
    public function destroy(Paket $id)
    {
        $id->delete();
        return redirect(url('gym/index'));
    }
    public function edit($id)
    {
        $data = Paket::find($id);
        // dd($data);
        return view('gym/edit', compact('data'));
    }
    public function update($id, Request $request)
    {
        $data = Paket::find($id);
        //    validasi update Blog
        $gymValid = [
            'nama_paket' => 'required|min:4|max:100',
            'harga_paket' => 'required|min:1|max:20',
            'jumlah_paket' => 'required|min:1|max:100',
            'ket_paket' => 'required|min:2|max:250',
            'no_hp_pembeli'=> 'required|numeric'
        ];
        // validasi id untuk id agar tidak sama dengan id yg lain(unique)

        if ($request->id != $data->id) {
            $gymValid['id'] = 'required|unique:paketgym';
        }
        $validatedData = $request->validate($gymValid);
        // end validasi blog
        $data->update($request->all());
        // redirect
        return redirect(url('gym/index'));
        // dd($request->all());
    }
}
