# 🚀 Reiyan Store Backend - Next-Gen PPOB & Game Engine

**Reiyan Store** adalah platform Backend API _High-Performance_ yang dibangun di atas **Laravel 12**. Dirancang khusus untuk menangani transaksi produk digital (Game, PPOB, E-Wallet) dengan fokus utama pada **keamanan finansial**, **otomatisasi provider**, dan **skalabilitas sistem**.

---

## 🛠️ High-End Tech Stack

- **Framework:** Laravel 12 (Stable) with Service-Repository Pattern.
- **Database:** MySQL/PostgreSQL with Optimized Indexing.
- **Concurrency:** `cache_locks` & `atomic_locks` untuk mencegah _race conditions_ (double top-up/double refund).
- **Worker Engine:** Redis-backed `Queues` untuk pemrosesan API Provider & Notifikasi secara asinkron.
- **Security:** Laravel Sanctum (Token-based) & Full Audit Trail.

---

## 💎 Features & Business Logic (The Pro Level)

### 1. Robust Finance & Wallet System

- **Dual-Wallet Logic:** Pemisahan saldo masuk dan riwayat penggunaan dengan audit trail `balance_before` & `balance_after`.
- **Anti-Fraud Payment:** Integrasi Payment Gateway (Midtrans/Duitku) dengan sistem _callback_ yang aman dan validasi _Signature Key_.
- **Zero-Fee Strategy:** Fitur pembayaran via Saldo Internal untuk meningkatkan loyalitas user dan mengurangi beban biaya admin PG.

### 2. Smart Provider Management

- **Multi-Provider Routing:** Integrasi ke berbagai provider (VIP Reseller, Digiflazz, dll) dengan sistem _failover_.
- **Real-time Status Sync:** Sinkronisasi status pesanan otomatis menggunakan Cron Jobs & Webhooks.

### 3. Growth & Marketing Engine

- **Tiered Membership:** Sistem `MemberLevel` (Bronze, Silver, Gold, Reseller) dengan margin harga dinamis.
- **Advanced Voucher System:** Diskon fleksibel dengan limitasi per user dan validasi tanggal kadaluarsa.
- **User Reviews per Product:** Fitur ulasan produk untuk meningkatkan _Social Proof_ dan kepercayaan pembeli.

### 4. Admin Audit & Security

- **Full Activity Log:** Mencatat setiap perubahan data sensitif (perubahan status deposit atau penyesuaian saldo manual).
- **RBAC (Role-Based Access Control):** Manajemen hak akses mendalam untuk tim admin dan operator.

---

## 🗄️ Database Architecture (27+ Tables)

Struktur tabel telah dinormalisasi untuk performa maksimal:

- **Finansial:** `wallets`, `deposits`, `transactions`, `balance_histories`.
- **Katalog:** `categories`, `products`, `services`, `providers`.
- **Engagement:** `ratings`, `vouchers`, `user_vouchers`, `banners`.
- **System:** `activity_log`, `configurations`, `seo_meta_tags`, `social_media`.

---

## ⚙️ Installation & Setup

### 1. Clone & Install Dependencies

```sh
git clone git@github.com:achmadnoerhidayat/reiyan-store-backend.git
cd reiyan-store-backend
```

### 2. Environment Configuration

Salin .env.example, buat database, dan sesuaikan kredensial:

```sh
cp .env.example .env
php artisan key:generate
```

### 3. Database Migration & Seeding

Jalankan migrasi untuk membangun seluruh struktur tabel dan mengisi data master:

```sh
php artisan migrate --seed
```

### 4. Running the Engine

Untuk memproses transaksi dan notifikasi secara asinkron, jalankan worker:

```sh
php artisan serve
php artisan queue:work
```

👨‍💻 Achmad Noerhidayat - Fullstack Developer Specializing in High-Traffic Fintech & PPOB Solutions
