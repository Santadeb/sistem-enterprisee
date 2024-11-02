@extends('admin.app')

@section('content')
<div class="container">
    <h3>Edit Promosi</h3>

    <form action="{{ route('promotions.update', $promotion->promotion_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Promosi</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $promotion->name) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $promotion->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Perbarui</button>
        <a href="{{ route('promotions.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
