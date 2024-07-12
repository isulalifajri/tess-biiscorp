@extends('layout.main')

@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    
@endpush
@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Pegawai</h1>
  </div>

  
   <!-- START DATA -->
   <div class="my-3">
       <a href="{{ route('pegawai.tambah') }}" class="btn btn-primary">Tambah Data</a>
   </div>
   <div class="card">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-sortable">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-2">Image</th>
                        <th class="col-md-2">Nama Pegawai</th>
                        <th class="col-md-2">Email</th>
                        <th class="col-md-2">Position</th>
                        <th class="col-md-2">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pegawai as $item)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td><img src="{{ $item->pegawai_url }}" alt="{{ $item->name }}" width="70px"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td><span class="badge bg-info">{{ $item->position }}</span></td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('pegawai.edit', $item->id)  }}" class="btn btn-info btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5" style="text-align: center"><h3> Tidak ada data dalam Tabel</h3></td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END DATA -->

  
  @endsection

  @push('js')

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "lengthMenu": [5, 7, 10, 25, 50, 100],
                "pageLength": 7,
            });
        });
    </script>

@endpush