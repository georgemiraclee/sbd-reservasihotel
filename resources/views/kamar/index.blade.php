@extends('layout.layout')
@section('content')
<div style="margin-top: 15px">
    <div style="margin-bottom: -70px">
        <div style="float:right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('kamar.index') }}" type="button">Data Kamar</a>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('kamar.trash') }}" type="button">Trash</a>
        </div>
    </div>
</div>
<h4 class="mt-5">Data kamar</h4>
<a href="{{ route('kamar.create') }}" type="button" class="btn btn-success rounded-3">Add Data</a>

<div class="form-search" style="float:right">
    <form action="{{ route('kamar.search') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="search" id="nama" name="nama" class="form-control" placeholder="Cari Nomor Kamar">
            <button type="submit" class="btn btn-secondary">Search</button>
    </form>
</div>
</div>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>Id Kamar</th>
            <th>Tipe</th>
            <th>No.Kamar</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_kamar }}</td>
            <td>{{ $data->tipe }}</td>
            <td>{{ $data->no_kamar }}</td>
            <td>{{ $data->harga }}</td>
            <td>
                <a href="{{ route('kamar.edit', $data->id_kamar) }}" type="button"
                    class="btn btn-warning rounded-3">Edit</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_kamar }}">
                    Delete
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_kamar }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Confirm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('kamar.hide', $data->id_kamar) }}">
                                @csrf
                                <div class="modal-body">
                                    Are you sure to delete this data?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop