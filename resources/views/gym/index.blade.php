@extends('partial.master-gym')

@section('judul','Data Hary Gym')

@section('content')

<main class="main-content position-relative border-radius-lg">

   <!-- Navbar -->
   @include('partial.navbar-gym')
   <!-- End Navbar -->
   <div class="container-fluid py-4">
      <div class="row">
         <div class="col-12">
            <div class="card mb-4">
               <div class="card-header pb-0">
                  <h6>Data Gym</h6>
               </div>
               <div class="card-header pb-0">
                  <a class="btn btn-success btn-sm mb-3" href="{{ url('add-gym')}}" role="button"><i class="fas fa-add"></i> Tambah Data</a>
               </div>
               <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                     <table class="table align-items-center mb-0 table-bordered table-striped">
                        <thead>
                           <tr>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                 No
                              </th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                 id
                              </th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                 Nama Paket
                              </th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                 Harga Paket
                              </th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                 Jumlah Paket
                              </th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                 Keterangan
                              </th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                 Action
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $row)
                           <!--  -->
                           <tr>
                              <td class="align-middle text-center text-sm">
                                 <span class="text-secondary text-xs font-weight-bold"> {{ $loop->iteration }}</span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                 <span class="text-secondary text-xs font-weight-bold">{{ $row->id }}</span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                 <span class="text-secondary text-xs font-weight-bold">{{ $row->nama_paket }}</span>
                              </td>
                              <td class="align-middle text-center">
                                 <span class="text-secondary text-xs font-weight-bold">{{ $row->harga_paket }}</span>
                              </td>
                              <td class="align-middle text-center">
                                 <span class="text-secondary text-xs font-weight-bold">{{ $row->jumlah_paket }}</span>
                              </td>
                              <td class="align-middle text-center">
                                 <span class="text-secondary text-xs font-weight-bold">{{ $row->ket_paket }}</span>
                              </td>
                              <td class="align-middle text-center">
                                 <a class="btn btn-sm btn-success bg-success d-inline" href="{{ url('edit-gym')}}/{{ $row->id }}/edit" role="button">
                                    Update
                                 </a>&emsp;
                                 <form action=" {{ route('delete.gym', $row->id) }}" method="post" class="d-inline">
                                    @csrf @method('delete')
                                    <button class=" btn btn-sm btn-warning bg-warning" onclick="return confirm('Yakin ingin menghapus data?')">
                                       Hapus
                                    </button>
                                 </form>
                              </td>
                           </tr>
                           <!--  -->
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
@endsection