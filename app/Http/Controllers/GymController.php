<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function indexApi()
    {
        $data = gym::all();
        return response()->json($data, 200);
        // return json_encode($data);
    }

    public function showApi(gym $id)
    {
        return response()->json($id, 200);
    }

    public function index()
    {
        $data = Gym::all();
        return view('gym/index', compact('data'));
    }
    public function create()
    {
        return view('gym/add');
    }
    public function ambilData(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric|unique:gym|min:1',
            'nama_paket' => 'required|min:4|max:100',
            'harga_paket' => 'required|min:1|max:20',
            'jumlah_paket' => 'required|min:1|max:100',
            'ket_paket' => 'required|min:2|max:250'

        ]);
        $data = Gym::create($request->all());
        // redirect
        return redirect('gym/index');
        // dd($request->all());
    }
    public function destroy(Gym $id)
    {
        $id->delete();
        return redirect(url('gym/index'));
    }
    public function edit($id)
    {
        $data = Gym::find($id);
        // dd($data);
        return view('gym/edit', compact('data'));
    }
    public function update($id, Request $request)
    {
        $data = Gym::find($id);
        //    validasi update Blog
        $gymValid = [
            'nama_paket' => 'required|min:4|max:100',
            'harga_paket' => 'required|min:1|max:20',
            'jumlah_paket' => 'required|min:1|max:100',
            'ket_paket' => 'required|min:2|max:250'
        ];
        // validasi id untuk id agar tidak sama dengan id yg lain(unique)

        if ($request->id != $data->id) {
            $gymValid['id'] = 'required|unique:gym';
        }
        $validatedData = $request->validate($gymValid);
        // end validasi blog
        $data->update($request->all());
        // redirect
        return redirect(url('gym/index'));
        // dd($request->all());
    }
}
