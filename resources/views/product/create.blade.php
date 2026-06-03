@extends('layouts.master')
@section('title', 'Tambah Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="d-flex align-items-center gap-3 mb-4">
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h4 class="mb-0 fw-bold">Tambah Produk Baru</h4>
                <p class="text-muted mb-0 small">Isi form di bawah untuk menambah produk</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i class="bi bi-plus-circle me-2 text-danger"></i>Informasi Produk
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-500">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Contoh: Laptop ASUS ROG"
                                value="{{ old('name') }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-500">Deskripsi</label>
                            <textarea name="description" rows="3"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Deskripsi produk...">{{ old('description') }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-500">Harga <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    placeholder="0"
                                    value="{{ old('price') }}" min="0" required>
                            </div>
                            @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-500">Stok <span class="text-danger">*</span></label>
                            <input type="number" name="stock"
                                class="form-control @error('stock') is-invalid @enderror"
                                placeholder="0"
                                value="{{ old('stock', 0) }}" min="0" required>
                            @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-500">Kategori</label>
                            <input type="text" name="category"
                                class="form-control @error('category') is-invalid @enderror"
                                placeholder="Contoh: Elektronik"
                                value="{{ old('category') }}" list="categories">
                            <datalist id="categories">
                                <option value="Elektronik">
                                    <option value="Pakaian">
                                    <option value="Makanan">
                                    <option value="Minuman">
                                    <option value="Aksesoris">
                            </datalist>
                            @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-500">Gambar Produk</label>
                            <input type="file" name="image" accept="image/*"
                                class="form-control @error('image') is-invalid @enderror"
                                onchange="previewImage(this)">
                            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12" id="imagePreviewContainer" style="display:none;">
                            <img id="imagePreview" src="" alt="Preview"
                                style="max-height:200px;border-radius:12px;object-fit:cover;">
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x me-1"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i>Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreviewContainer').style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
