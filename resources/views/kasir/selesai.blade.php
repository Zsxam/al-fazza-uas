<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Berhasil - Al-Fazza</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    
    <style>
        .container-selesai {
            padding: 50px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: var(--bg-cream);
            min-height: 100vh;
        }

        .status-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .status-header i {
            font-size: 4rem;
            color: #388e3c;
            margin-bottom: 15px;
        }

        /* Styling area struk belanja */
        .struk-box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
            font-family: 'Courier New', Courier, monospace;
            border: 1px solid #ddd;
        }

        .struk-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .struk-divider {
            border-top: 1px dashed #000;
            margin: 15px 0;
        }

        .struk-total {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 10px;
        }

        /* Area tombol aksi */
        .action-buttons {
            margin-top: 30px;
            display: flex;
            gap: 15px;
        }

        .btn-action {
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            border: none;
            font-size: 1rem;
        }

        .btn-print { background-color: #1a365d; color: white; }
        .btn-new { background-color: var(--primary-brown); color: white; }

        /* Logic sembunyikan elemen saat print */
        @media print {
            body * { visibility: hidden; }
            #print-area, #print-area * { visibility: visible; }
            #print-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                box-shadow: none;
                border: none;
            }
            .action-buttons, .status-header { display: none; }
        }
    </style>
</head>
<body>

    <div class="container-selesai">
        
        <div class="status-header">
            <i class="fa-solid fa-circle-check"></i>
            <h1>Transaksi Berhasil!</h1>
            <p>Invoice: <strong>{{ $transaksi->invoice_number }}</strong></p>
        </div>

        <div class="struk-box" id="print-area">
            <div style="text-align: center; margin-bottom: 20px;">
                <h2 style="margin: 0;">AL-FAZZA BAKERY</h2>
                <p style="font-size: 0.9rem;">Jl. Edelweis III No.16 blok J2</p>
                <p>--------------------------------</p>
            </div>

            <div style="font-size: 0.9rem; margin-bottom: 15px;">
                <p>No     : {{ $transaksi->invoice_number }}</p>
                <p>Kasir  : {{ Auth::user()->name }}</p>
                <p>Tanggal: {{ $transaksi->created_at->format('d/m/Y H:i') }}</p>
                <p>--------------------------------</p>
            </div>

            <div class="items-list">
                @foreach($transaksi->details as $detail)
                <div style="margin-bottom: 10px;">
                    <div>{{ $detail->product->nama }}</div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>{{ $detail->qty }} x {{ number_format($detail->price, 0, ',', '.') }}</span>
                        <span>{{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="struk-divider"></div>

            <div class="struk-total">
                <span>TOTAL :</span>
                <span>Rp {{ number_format($transaksi->total_amount, 0, ',', '.') }}</span>
            </div>
            
            <div style="display: flex; justify-content: space-between; font-size: 0.9rem; margin-top: 5px;">
                <span>Metode Bayar :</span>
                <span>{{ $transaksi->payment_method }}</span>
            </div>
            <div style="display: flex; justify-content: space-between; font-size: 0.9rem;">
                <span>Tunai :</span>
                <span>Rp {{ number_format($transaksi->amount_paid, 0, ',', '.') }}</span>
            </div>
            <div style="display: flex; justify-content: space-between; font-size: 0.9rem;">
                <span>Kembali :</span>
                <span>Rp {{ number_format($transaksi->change_amount, 0, ',', '.') }}</span>
            </div>

            <div style="text-align: center; margin-top: 40px; font-size: 0.85rem;">
                <p>Terima Kasih Atas Kunjungan Anda</p>
                <p>~ Happy Eating ~</p>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('kasir.pos') }}" class="btn-action btn-new">
                <i class="fa-solid fa-cart-plus"></i> Transaksi Baru
            </a>
            <button onclick="window.print()" class="btn-action btn-print">
                <i class="fa-solid fa-print"></i> Cetak Struk
            </button>
        </div>

    </div>

</body>
</html>
