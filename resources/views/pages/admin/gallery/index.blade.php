@extends('layouts.admin') 

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Paket</h1>
    <a
      href="{{ route('gallery.create') }}"
      class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
      method="GET"
    >
      <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Paket
    </a>
  </div>

  <div class="row">
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table table-bordered"
          id="dataTable"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th>ID</th>
              <th>Travel</th>
              <th>Gambar</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($items as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->travel_package->title }}</td>
              <td>
                <img
                  src="{{ Storage::url($item->image) }}"
                  alt=""
                  style="width: 200px"
                  class="img-thumbnail"
                />
              </td>
              <td>
                <a
                  href="{{ route('gallery.edit', $item->id) }}"
                  class="btn btn-info"
                >
                  <i class="fa fa-pencil-alt"></i>
                </a>
                <form
                  action="{{ route('gallery.destroy', $item->id) }}"
                  method="post"
                  class="d-inline"
                >
                  @csrf @method('delete')
                  <button class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <td colspan="7" class="text-center">Data Kosong</td>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
