@extends('admin.app')

@section('content')
<div class="container">
    <h3>Daftar Promosi yang Dikirim</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('send_promotions.create') }}" class="btn btn-primary mb-3">Kirim Promosi Baru</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Customer</th>
                <th>Nama Promosi</th>
                <th>Tanggal Dikirim</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sendPromotions as $sendPromotion)
                <tr>
                    <td>{{ $sendPromotion->customer->name }}</td>
                    <td>{{ $sendPromotion->promotion->name }}</td>
                    <td>{{ $sendPromotion->sent_at }}</td>
                    <td>
                        <a href="{{ route('send_promotions.edit', $sendPromotion->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('send_promotions.destroy', $sendPromotion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
