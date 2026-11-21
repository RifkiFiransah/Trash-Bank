<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light">
    <meta name="theme-color" content="#1f3d2b">
    <title>Trash Bank | Bank Sampah Warga</title>
    <meta name="description" content="Bank sampah warga untuk mencatat setoran sampah, saldo, penarikan, dan penjualan ke pengepul.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700|plus-jakarta-sans:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <a class="skip-link" href="#main">Lewati ke konten</a>

    <header class="site-header" id="top">
        <div class="wrap header-inner">
            <a class="brand" href="#top" aria-label="Trash Bank, kembali ke atas">
                <span class="brand-mark">Trash Bank</span>
                <span class="brand-sub">Bank sampah warga</span>
            </a>

            <nav class="site-nav" aria-label="Navigasi utama">
                <a class="nav-link" href="#tentang">Tentang</a>
                <a class="nav-link" href="#cara">Cara menabung</a>
                <a class="nav-link" href="#jenis">Jenis sampah</a>
                <a class="nav-link" href="#panduan">Panduan</a>
                <a class="btn btn-primary btn-sm" href="{{ route('filament.admin.auth.login') }}" aria-label="Masuk panel petugas">Masuk petugas</a>
            </nav>
        </div>
    </header>

    <main id="main">
        <section class="hero" aria-labelledby="hero-title">
            <div class="wrap hero-grid">
                <div class="hero-copy">
                    <p class="kicker">Bank sampah warga</p>
                    <h1 id="hero-title">Sampah rumah tangga, jadi <em>tabungan warga</em>.</h1>
                    <p class="hero-lead">Bank sampah menimbang sampah yang warga bawa, mencatatnya per jenis, dan menyimpannya sebagai saldo. Setiap setoran dan penarikan tercatat atas nama warga.</p>
                    <div class="hero-actions">
                        <a class="btn btn-primary" href="#cara">Cara menabung sampah</a>
                        <a class="btn btn-ghost" href="#jenis">Lihat jenis sampah</a>
                    </div>
                    <p class="hero-note">Pencatatan dilakukan petugas di lokasi bank sampah. Saldo bisa ditanyakan ke pengurus.</p>
                </div>

                <div class="ledger-wrap" role="group" aria-labelledby="ledger-title">
                    <div class="ledger-card">
                        <div class="ledger-head">
                            <h2 id="ledger-title">Kartu setoran</h2>
                            <span class="ledger-no" aria-hidden="true">No. ______</span>
                        </div>
                        <div class="ledger-rows" aria-hidden="true">
                            <div class="ledger-row"><span class="label">Nama warga</span><span class="value">__________</span></div>
                            <div class="ledger-row"><span class="label">Jenis sampah</span><span class="value">__________</span></div>
                            <div class="ledger-row"><span class="label">Berat</span><span class="value">____ kg</span></div>
                            <div class="ledger-row"><span class="label">Harga per satuan</span><span class="value">Rp ______</span></div>
                            <div class="ledger-row total"><span class="label">Total</span><span class="value">Rp ______</span></div>
                        </div>
                        <div class="ledger-balance" aria-hidden="true">
                            <span>Saldo setelah setoran</span>
                            <span>Rp ______</span>
                        </div>
                        <div class="ledger-foot">
                            <p class="ledger-caption">Contoh format pencatatan. Angka diisi saat setoran diterima.</p>
                            <span class="stamp" aria-hidden="true">Tercatat</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-paper" id="tentang" aria-labelledby="tentang-title">
            <div class="wrap about-grid">
                <div class="about-side">
                    <div class="section-head">
                        <p class="kicker">Tentang bank sampah</p>
                        <h2 id="tentang-title">Sampah yang dipilah punya nilai simpan.</h2>
                        <p class="section-lead">Bank sampah menerima sampah rumah tangga yang sudah dipilah, menimbangnya, dan mencatat hasilnya sebagai saldo warga. Sampah yang terkumpul dijual ke pengepul, sedangkan saldo warga bisa ditarik sesuai ketentuan.</p>
                    </div>
                    <div class="fact">
                        <p><strong>Dua kategori sampah:</strong> organik dan non-organik. Harga per jenis ditentukan pengurus dan dicatat oleh petugas.</p>
                    </div>
                </div>

                <ol class="benefits">
                    <li class="benefit">
                        <span class="benefit-num">01</span>
                        <div>
                            <h3>Mengurangi tumpukan sampah</h3>
                            <p>Sampah rumah tangga yang dipilah dibawa ke bank sampah, tidak dibiarkan menumpuk di rumah atau dibuang sembarangan.</p>
                        </div>
                    </li>
                    <li class="benefit">
                        <span class="benefit-num">02</span>
                        <div>
                            <h3>Setoran tercatat rapi</h3>
                            <p>Setiap setoran dicatat per warga: jenis sampah, berat, harga per jenis, dan total yang masuk ke saldo.</p>
                        </div>
                    </li>
                    <li class="benefit">
                        <span class="benefit-num">03</span>
                        <div>
                            <h3>Saldo bisa ditanyakan</h3>
                            <p>Saldo dihitung dari setoran dan penarikan yang tercatat. Warga bisa menanyakan saldo ke petugas.</p>
                        </div>
                    </li>
                    <li class="benefit">
                        <span class="benefit-num">04</span>
                        <div>
                            <h3>Sampah terpilah lebih mudah dijual</h3>
                            <p>Sampah non-organik yang bersih dan kering lebih mudah dijual ke pengepul, sehingga nilainya tidak hilang.</p>
                        </div>
                    </li>
                </ol>
            </div>
        </section>

        <section class="section section-dark" id="cara" aria-labelledby="cara-title">
            <div class="wrap">
                <div class="section-head">
                    <p class="kicker">Cara menabung</p>
                    <h2 id="cara-title">Dari dapur sampai buku setoran.</h2>
                    <p class="section-lead">Empat langkah yang dilalui warga saat menabung sampah di bank sampah.</p>
                </div>

                <ol class="flow">
                    <li class="flow-step">
                        <span class="flow-num">01</span>
                        <h3>Pilah</h3>
                        <p>Pisahkan sampah organik dan non-organik di rumah.</p>
                    </li>
                    <li class="flow-step">
                        <span class="flow-num">02</span>
                        <h3>Bawa</h3>
                        <p>Bawa sampah yang sudah dipilah ke lokasi bank sampah.</p>
                    </li>
                    <li class="flow-step">
                        <span class="flow-num">03</span>
                        <h3>Timbang dan catat</h3>
                        <p>Petugas menimbang, memilih jenis sampah, dan mencatat berat.</p>
                    </li>
                    <li class="flow-step">
                        <span class="flow-num">04</span>
                        <h3>Saldo bertambah</h3>
                        <p>Total setoran masuk ke saldo warga. Penarikan dicatat saat saldo diambil.</p>
                    </li>
                </ol>

                <p class="flow-note">Setiap setoran dan penarikan tercatat atas nama warga. Tanyakan saldo terbaru ke petugas.</p>
            </div>
        </section>

        <section class="section section-paper-2" id="jenis" aria-labelledby="jenis-title">
            <div class="wrap">
                <div class="section-head">
                    <p class="kicker">Jenis sampah</p>
                    <h2 id="jenis-title">Sampah yang diterima bank sampah.</h2>
                    <p class="section-lead">Bank sampah menerima dua kategori sampah. Contoh jenis sampah yang biasa diterima ada di bawah.</p>
                </div>

                <div class="types-grid">
                    <div class="type-panel organic">
                        <h3>Organik</h3>
                        <p class="type-sub">Dari dapur dan taman</p>
                        <ul class="type-list">
                            <li>Sisa makanan</li>
                            <li>Daun kering</li>
                            <li>Kulit buah</li>
                            <li>Sisa sayuran</li>
                            <li>Ranting kayu</li>
                        </ul>
                    </div>
                    <div class="type-panel inorganic">
                        <h3>Non-organik</h3>
                        <p class="type-sub">Dari rumah dan kemasan</p>
                        <ul class="type-list">
                            <li>Botol plastik</li>
                            <li>Kardus</li>
                            <li>Kaleng aluminium</li>
                            <li>Kertas koran</li>
                            <li>Botol kaca</li>
                            <li>Logam besi</li>
                        </ul>
                    </div>
                </div>

                <p class="type-note">Harga per jenis ditentukan pengurus. Tanyakan harga terbaru di lokasi bank sampah. Bersihkan sisa isi pada non-organik dan keringkan sebelum dibawa.</p>
            </div>
        </section>

        <section class="section section-paper" id="panduan" aria-labelledby="panduan-title">
            <div class="wrap guide-grid">
                <div class="guide-side">
                    <div class="section-head">
                        <p class="kicker">Panduan warga</p>
                        <h2 id="panduan-title">Sebelum membawa sampah.</h2>
                        <p class="section-lead">Hal yang perlu diketahui warga sebelum menabung sampah. Klik pertanyaan untuk melihat penjelasan.</p>
                    </div>
                    <a class="btn btn-outline" href="#jenis">Lihat jenis sampah</a>
                    <p class="guide-note">Panduan ini untuk warga. Pencatatan tetap dilakukan petugas di lokasi bank sampah.</p>
                </div>

                <div class="accordion">
                    <details>
                        <summary>
                            <span class="acc-num">01</span>
                            <span class="acc-title">Apakah harus jadi anggota dulu?</span>
                            <span class="acc-toggle" aria-hidden="true">+</span>
                        </summary>
                        <div class="acc-body">
                            <p>Pendaftaran dilakukan melalui pengurus di lokasi bank sampah. Setelah terdaftar, setiap setoran dicatat atas nama warga.</p>
                        </div>
                    </details>
                    <details>
                        <summary>
                            <span class="acc-num">02</span>
                            <span class="acc-title">Sampah seperti apa yang diterima?</span>
                            <span class="acc-toggle" aria-hidden="true">+</span>
                        </summary>
                        <div class="acc-body">
                            <p>Sampah organik dan non-organik yang sudah dipilah. Untuk non-organik, bersihkan sisa isi dan keringkan sebelum dibawa.</p>
                        </div>
                    </details>
                    <details>
                        <summary>
                            <span class="acc-num">03</span>
                            <span class="acc-title">Bagaimana berat dan harga dihitung?</span>
                            <span class="acc-toggle" aria-hidden="true">+</span>
                        </summary>
                        <div class="acc-body">
                            <p>Petugas menimbang sampah, memilih jenisnya, lalu menghitung total dari berat dikali harga per jenis. Harga ditentukan pengurus.</p>
                        </div>
                    </details>
                    <details>
                        <summary>
                            <span class="acc-num">04</span>
                            <span class="acc-title">Kapan saldo bisa ditarik?</span>
                            <span class="acc-toggle" aria-hidden="true">+</span>
                        </summary>
                        <div class="acc-body">
                            <p>Ajukan penarikan ke petugas. Jumlah penarikan tidak boleh melebihi saldo yang tercatat.</p>
                        </div>
                    </details>
                    <details>
                        <summary>
                            <span class="acc-num">05</span>
                            <span class="acc-title">Apakah sampah campur diterima?</span>
                            <span class="acc-toggle" aria-hidden="true">+</span>
                        </summary>
                        <div class="acc-body">
                            <p>Sampah campur menyulitkan penimbangan dan penjualan. Pilah organik dan non-organik di rumah sebelum dibawa.</p>
                        </div>
                    </details>
                    <details>
                        <summary>
                            <span class="acc-num">06</span>
                            <span class="acc-title">Bagaimana jika lupa saldo?</span>
                            <span class="acc-toggle" aria-hidden="true">+</span>
                        </summary>
                        <div class="acc-body">
                            <p>Tanyakan ke petugas. Saldo warga tercatat bersama riwayat setoran dan penarikan.</p>
                        </div>
                    </details>
                </div>
            </div>
        </section>

        <section class="section section-paper-2" id="petugas" aria-labelledby="petugas-title">
            <div class="wrap">
                <div class="staff-card">
                    <div>
                        <p class="kicker">Untuk petugas</p>
                        <h2 id="petugas-title">Pencatatan harian ada di panel bank sampah.</h2>
                        <p class="staff-lead">Petugas mencatat data sampah, setoran warga, penarikan saldo, penjualan ke pengepul, dan akun warga di satu panel. Saldo warga dihitung dari catatan yang sama.</p>
                    </div>
                    <div class="staff-actions">
                        <a class="btn btn-primary" href="{{ route('filament.admin.auth.login') }}">Masuk panel petugas</a>
                        <p class="staff-note">Gunakan akun petugas yang diberikan pengurus.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="wrap">
            <div class="footer-top">
                <div class="footer-brand">
                    <span class="brand-mark">Trash Bank</span>
                    <p>Pencatatan bank sampah warga: setoran, saldo, penarikan, dan penjualan.</p>
                </div>
                <nav class="footer-links" aria-label="Navigasi footer">
                    <a href="#tentang">Tentang</a>
                    <a href="#cara">Cara menabung</a>
                    <a href="#jenis">Jenis sampah</a>
                    <a href="#panduan">Panduan</a>
                    <a href="#petugas">Untuk petugas</a>
                </nav>
            </div>
            <div class="footer-bottom">
                <span>Sistem pencatatan bank sampah warga.</span>
                <span>&copy; {{ date('Y') }} Trash Bank</span>
                <a href="#top">Kembali ke atas</a>
            </div>
        </div>
    </footer>
</body>
</html>
