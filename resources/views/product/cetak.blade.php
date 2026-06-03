<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8f9fb;
        }

        .invoice-box {
            background: #fff;
            max-width: 900px;
            margin: auto;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .brand {
            font-size: 22px;
            font-weight: 800;
            color: #1a1a2e;
        }

        .sub-brand {
            color: #6c757d;
            font-size: 13px;
        }

        .invoice-title {
            font-size: 28px;
            font-weight: 700;
            color: #e94560;
        }

        .info-box {
            background: #f8f9fb;
            padding: 15px;
            border-radius: 12px;
        }

        table thead {
            background: #1a1a2e;
            color: white;
        }

        table tbody tr:hover {
            background: #f8f9fb;
        }

        .total-box {
            background: linear-gradient(135deg, #e94560, #c23152);
            color: white;
            padding: 15px;
            border-radius: 12px;
            text-align: right;
            font-weight: 600;
        }

        .no-print {
            margin-bottom: 20px;
        }

        @media print {
            body {
                background: white;
            }

            .no-print {
                display: none !important;
            }

            .invoice-box {
                box-shadow: none;
                border-radius: 0;
                padding: 0;
            }
        }
    </style>
</head>

<body class="p-4">

<div class="no-print text-center">
    <button onclick="window.print()" class="btn btn-danger">
        <i class="bi bi-printer"></i> Print Invoice
    </button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>

<div class="invoice-box">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <div class="brand">FAHRI PROJECT</div>
            <div class="sub-brand">Invoice / Laporan Produk</div>
        </div>

        <div class="text-end">
            <div class="invoice-title">INVOICE</div>
            <div class="sub-brand">No: #PRD-{{ date('YmdHis') }}</div>
        </div>
    </div>

    <!-- INFO -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="info-box">
                <strong>Dicetak oleh</strong><br>
                Admin System
            </div>
        </div>

        <div class="col-md-6 text-end">
            <div class="info-box">
                <strong>Tanggal Cetak</strong><br>
                {{ now()->format('d M Y, H:i') }}
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $i => $product)
                <tr>
                    <td>{{ $i + 1 }}</td>

                    <td>
                        <strong>{{ $product->name }}</strong><br>
                        <small class="text-muted">
                            {{ Str::limit($product->description, 40) }}
                        </small>
                    </td>

                    <td>
                        <span class="badge bg-secondary">
                            {{ $product->category ?? '-' }}
                        </span>
                    </td>

                    <td>
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </td>

                    <td>
                        {{ $product->stock }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- TOTAL -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="text-muted small">
                Total Produk: {{ $products->count() }}
            </div>
        </div>

        <div class="col-md-6">
            <div class="total-box">
                TOTAL NILAI:
                Rp {{ number_format($products->sum('price'), 0, ',', '.') }}
            </div>
        </div>
    </div>

</div>

</body>
</html>