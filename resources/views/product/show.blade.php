@extends('layouts.master')
@section('title', 'Detail Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="d-flex align-items-center gap-3 mb-4">
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h4 class="mb-0 fw-bold">Detail Produk</h4>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                style="width:100%;max-width:200px;border-radius:16px;object-fit:cover;box-shadow:0 8px 25px rgba(0,0,0,0.1);">
                        @else
                            <div style="width:100%;max-width:200px;height:200px;background:linear-gradient(135deg,#f0f0f0,#e0e0e0);border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto;">
                                <i class="bi bi-image" style="font-size:3rem;color:#adb5bd;"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h3 class="fw-bold">{{ $product->name }}</h3>
                            @if($product->category)
                                <span class="badge bg-primary">{{ $product->category }}</span>
                            @endif
                        </div>

                        <p class="text-muted">{{ $product->description ?: 'Tidak ada deskripsi.' }}</p>

                        <hr>

                        <div class="row g-3">
                            <div class="col-6">
                                <div class="p-3 rounded-3" style="background:#f8f9fa;">
                                    <div class="text-muted small">Harga</div>
                                    <div class="fw-bold text-danger fs-5">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 rounded-3" style="background:#f8f9fa;">
                                    <div class="text-muted small">Stok</div>
                                    <div class="fw-bold fs-5 {{ $product->stock > 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $product->stock }} unit
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 rounded-3" style="background:#f8f9fa;">
                                    <div class="text-muted small">Ditambahkan</div>
                                    <div class="fw-500">{{ $product->created_at->format('d M Y') }}</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 rounded-3" style="background:#f8f9fa;">
                                    <div class="text-muted small">Diperbarui</div>
                                    <div class="fw-500">{{ $product->updated_at->format('d M Y') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning text-white">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </a>
                            <form method="POST" action="{{ route('products.destroy', $product) }}"
                                onsubmit="return confirm('Yakin hapus produk ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash me-1"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
