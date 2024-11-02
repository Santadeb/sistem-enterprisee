@extends('admin.app')

@section('content')
<div class="container">
    <h3>Promotions</h3>

    <a href="{{ route('promotions.create') }}" class="btn btn-primary mb-3">Tambah Promotion</a>

    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($promotions as $promotion)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $promotion->name }}</td>
                    <td>{{ $promotion->description }}</td>
                    <td>
                        <a href="{{ route('promotions.edit', $promotion->promotion_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('promotions.destroy', $promotion->promotion_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Data Ini Di Hapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data promosi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
