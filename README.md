Reiyan Store Backend - Enterprise PPOB & Game Engine
Reiyan Store adalah platform Backend API yang dikembangkan dengan Laravel 12 menggunakan standar Clean Code dan SOLID Principles. Sistem ini dirancang untuk skalabilitas tinggi, keamanan transaksi finansial, dan optimasi performa.

🛠️ Tech & Infrastructure Highlights
Performance: Menggunakan cache dan cache_locks untuk menangani traffic tinggi dan mencegah race conditions pada saat checkout.

Asynchronous Processing: Implementasi jobs, job_batches, dan failed_jobs untuk integrasi API provider yang stabil dan sistem antrean notifikasi.

Security & Audit: Full audit trail menggunakan activity_log untuk memantau setiap perubahan data sensitif oleh admin atau user.

Architecture: Service-Repository Pattern untuk memisahkan logika bisnis dari akses data.

💎 Featured Modules (Based on Database Schema)

1. Finance & Transaction Logic
   Automated Transactions: Alur kerja transaksi dari pending hingga success dengan integrasi Midtrans/Duitku.

Internal Wallet System: Riwayat saldo user yang sinkron dengan sistem refund otomatis.

Multi-Payment Methods: Pengelolaan berbagai metode pembayaran secara dinamis melalui tabel payment_methods.

2. Marketing & Growth Tools
   Voucher Engine: Sistem diskon yang mendukung limitasi per user via user_vouchers dan many-to-many kategori.

Membership System: Tingkatan level user (member_levels) untuk segmentasi harga (Reseller/VIP).

SEO & Social Media: Terintegrasi dengan seo_meta_tags dan social_media management untuk meningkatkan ranking Google secara dinamis.

Content Management: Pengelolaan banners, faqs, dan info sistem melalui dashboard admin.

3. Service & Provider Management
   Provider Abstraction: Integrasi ke berbagai provider (KirimAja, Digiflazz, dll) melalui tabel providers.

Dynamic Products: Manajemen ribuan services yang dikelompokkan berdasarkan products dan categories.

4. Security & Role Management
   Role-Based Access Control (RBAC): Manajemen hak akses mendalam menggunakan tabel roles.

Token Authentication: Keamanan API menggunakan personal_access_tokens (Laravel Sanctum).

🗄️ Database Map (The Engine)
Sistem ini menggunakan 27+ tabel yang dioptimasi untuk kecepatan dan integritas data:

Core: users, transactions, services, products.

Support: notifications, activity_log, sessions, password_reset_tokens.

Business: vouchers, member_levels, payment_methods.

Marketing: banners, faqs, seo_meta_tags, social_media.

🚀 Key Implementation (Clean Code)
Kami memastikan setiap fitur memiliki logic yang terisolasi:

Refund Logic: Dana otomatis kembali ke user jika status transaksi dari provider gagal.

Notification Type: Menggunakan Enum untuk membedakan notifikasi TRX, REFUND, TOPUP, dan VOUCHER.

Cache Management: Mengurangi beban database dengan sistem caching pada data produk dan layanan.

⚙️ Installation & Setup

1. Clone & Install Dependencies
   Bash
   git clone https://github.com/reiyan/reiyan-store-backend.git
   cd reiyan-store-backend
   composer install
2. Environment Configuration
   Salin .env.example, buat database, dan sesuaikan kredensial:

Bash
cp .env.example .env
php artisan key:generate
Pastikan QUEUE_CONNECTION=database dan CACHE_STORE=database di set pada .env.

3. Database Migration & Seeding
   Jalankan migrasi untuk membangun seluruh struktur tabel dan mengisi data master:

Bash
php artisan migrate --seed 4. Running the Engine
Untuk memproses transaksi dan notifikasi secara asinkron, jalankan worker:

Bash

# Menjalankan server API

php artisan serve

# Menjalankan background worker (Wajib untuk refund/status update)

php artisan queue:work

👨‍💻 Reiyan - Fullstack Developer Specializing in High-Traffic Fintech & PPOB Solutions
