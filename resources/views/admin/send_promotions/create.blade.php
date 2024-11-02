@extends('admin.app')

@section('content')
<div class="container">
    <h3>Kirim Promosi Baru</h3>

    <form action="{{ route('send_promotions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select class="form-control" id="customer_id" name="customer_id" required>
                <option value="">Pilih Customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->customer_id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="promotion_id">Promosi</label>
            <select class="form-control" id="promotion_id" name="promotion_id" required>
                <option value="">Pilih Promosi</option>
                @foreach ($promotions as $promotion)
                    <option value="{{ $promotion->promotion_id }}">{{ $promotion->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Kirim</button>
        <a href="{{ route('send_promotions.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
