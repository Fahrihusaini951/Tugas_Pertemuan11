@extends('layouts.master')
@section('title', 'Manajemen Produk')

@section('content')
<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1 fw-bold">Daftar Produk</h4>
        <p class="text-muted mb-0">Kelola semua produk Anda di sini</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('products.cetak') }}" class="btn btn-outline-secondary" target="_blank">
            <i class="bi bi-printer me-1"></i> Cetak
        </a>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Tambah Produk
        </a>
    </div>
</div>

<!-- Search & Filter -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('products.index') }}">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" name="search" class="form-control border-start-0"
                            placeholder="Cari produk..." value="{{ request('search') }}"
                            style="border-radius:0 12px 12px 0;">
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="category" class="form-select" style="border-radius:12px;">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-funnel me-1"></i> Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Table -->
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <span><i class="bi bi-table me-2"></i>Data Produk</span>
        <span class="badge bg-primary">{{ $products->total() }} produk</span>
    </div>
    <div class="card-body p-0">
        @if($products->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size:3rem;color:#dee2e6;"></i>
                <p class="text-muted mt-3">Belum ada produk. <a href="{{ route('products.create') }}">Tambah sekarang</a></p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Tanggal</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $index => $product)
                        <tr>
                            <td class="text-muted">{{ $products->firstItem() + $index }}</td>
                            <td>
                                @if($product->image)
                         <img src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                              style="width:42px;height:42px;object-fit:cover;border-radius:10px;flex-shrink:0;">
                           @else
                     <div style="width:42px;height:42px;background:linear-gradient(135deg,#e94560,#c23152);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                           <i class="bi bi-box text-white"></i>
                    </div>
                               @endif
                                        <div class="fw-600">{{ $product->name }}</div>
                                        <div class="text-muted" style="font-size:0.8rem;">
                                            {{ Str::limit($product->description, 40) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $product->category ?? '-' }}</span>
                            </td>
                            <td class="fw-600">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>
                                @if($product->stock > 10)
                                    <span class="badge bg-success bg-opacity-10 text-success badge-stock">
                                        <i class="bi bi-circle-fill me-1" style="font-size:0.5rem;"></i>{{ $product->stock }}
                                    </span>
                                @elseif($product->stock > 0)
                                    <span class="badge bg-warning bg-opacity-10 text-warning badge-stock">
                                        <i class="bi bi-circle-fill me-1" style="font-size:0.5rem;"></i>{{ $product->stock }}
                                    </span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger badge-stock">
                                        <i class="bi bi-circle-fill me-1" style="font-size:0.5rem;"></i>Habis
                                    </span>
                                @endif
                            </td>
                            <td class="text-muted" style="font-size:0.85rem;">
                                {{ $product->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('products.show', $product) }}"
                                        class="btn btn-sm btn-outline-info" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product) }}"
                                        class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="POST" action="{{ route('products.destroy', $product) }}"
                                        onsubmit="return confirm('Yakin ingin hapus produk ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($products->hasPages())
                <div class="p-4 border-top">
                    {{ $products->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
