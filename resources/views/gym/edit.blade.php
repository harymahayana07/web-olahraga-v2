@extends('partial.master-gym')

@section('judul','Edit Data')

@section('content')
<div class="container" style="padding: 20px;">
    <main class="main-content position-relative border-radius-lg">
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6> Edit Data Paket</h6>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>

                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach

                                </ul>
                            </div>
                            @endif
                            <form action="{{ url('edit-gym')}}/{{ $data->id }}" method="post">
                                @method('put')
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="iidd">ID </label>
                                    <input type="number" id="iidd" name="id" class="form-control" value="{{old('id', $data->id)}}" autocomplete="off" autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="at">Nama Paket</label>
                                    <input type="text" id="at" name="nama_paket" class="form-control" value="{{old('nama_paket', $data->nama_paket)}}" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tl">Harga Paket</label>
                                    <input type="text" id="tl" name="harga_paket" class="form-control" value="{{old('harga_paket', $data->harga_paket)}}" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="key">Jumlah Paket</label>
                                    <input type="text" id="key" name="jumlah_paket" class="form-control" value="{{old('jumlah_paket', $data->jumlah_paket)}}" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="bd">Keterangan</label>
                                    <textarea name="ket_paket" id="bd" cols="37" rows="2" autocomplete="off">{{ old('ket_paket', $data->ket_paket) }}</textarea>
                                </div>


                                <input type="submit" class="btn btn-success" name="submit" value="Simpan Data">
                                <a class="btn btn-primary" href="{{ url('gym/index') }}" role="button">Kembali</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection