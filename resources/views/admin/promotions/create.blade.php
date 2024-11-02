@extends('admin.app')

@section('content')
<div class="container">
    <h3>Tambah Promosi</h3>

    <form action="{{ route('promotions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Promosi</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('promotions.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
