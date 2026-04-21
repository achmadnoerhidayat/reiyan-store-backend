<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Reiyan Store Game Topup API</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.6.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.6.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-autentikasi" class="tocify-header">
                <li class="tocify-item level-1" data-unique="autentikasi">
                    <a href="#autentikasi">Autentikasi</a>
                </li>
                                    <ul id="tocify-subheader-autentikasi" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="autentikasi-POSTauth-register">
                                <a href="#autentikasi-POSTauth-register">Register User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autentikasi-POSTauth-login">
                                <a href="#autentikasi-POSTauth-login">Login User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autentikasi-POSTauth-refresh">
                                <a href="#autentikasi-POSTauth-refresh">Refresh Token</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autentikasi-GETlog">
                                <a href="#autentikasi-GETlog">Log Sistem</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-banner" class="tocify-header">
                <li class="tocify-item level-1" data-unique="banner">
                    <a href="#banner">Banner</a>
                </li>
                                    <ul id="tocify-subheader-banner" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="banner-GETbanner">
                                <a href="#banner-GETbanner">List Banner
Endpoint ini digunakan untuk mengambil semua data banner.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="banner-POSTbanner">
                                <a href="#banner-POSTbanner">Tambah Banner</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="banner-PUTbanner--id-">
                                <a href="#banner-PUTbanner--id-">Edit banner</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="banner-DELETEbanner--id-">
                                <a href="#banner-DELETEbanner--id-">Hapus banner Web</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-config-website" class="tocify-header">
                <li class="tocify-item level-1" data-unique="config-website">
                    <a href="#config-website">Config Website</a>
                </li>
                                    <ul id="tocify-subheader-config-website" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="config-website-GETconfig">
                                <a href="#config-website-GETconfig">List Setting Website
Endpoint ini digunakan untuk mengambil semua data config yang aktif.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="config-website-POSTconfig">
                                <a href="#config-website-POSTconfig">Tambah Setting Website</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="config-website-PUTconfig--id-">
                                <a href="#config-website-PUTconfig--id-">Edit config</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="config-website-DELETEconfig--id-">
                                <a href="#config-website-DELETEconfig--id-">Hapus config Web</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-contact-us" class="tocify-header">
                <li class="tocify-item level-1" data-unique="contact-us">
                    <a href="#contact-us">Contact Us</a>
                </li>
                                    <ul id="tocify-subheader-contact-us" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="contact-us-GETcontact-us">
                                <a href="#contact-us-GETcontact-us">List Contact Us
Endpoint ini digunakan untuk mengambil semua data Contact Us.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="contact-us-POSTcontact-us">
                                <a href="#contact-us-POSTcontact-us">Tambah Contact Us</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="contact-us-PUTcontact-us--id-">
                                <a href="#contact-us-PUTcontact-us--id-">Update Contact Us</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="contact-us-DELETEcontact-us--id-">
                                <a href="#contact-us-DELETEcontact-us--id-">Delete Contact Us</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-deposit" class="tocify-header">
                <li class="tocify-item level-1" data-unique="deposit">
                    <a href="#deposit">Deposit</a>
                </li>
                                    <ul id="tocify-subheader-deposit" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="deposit-POSTdeposit-callback-payment">
                                <a href="#deposit-POSTdeposit-callback-payment">Callback Payment Gateway
Endpoint untuk menerima notifikasi status pembayaran dari Midtrans/Duitku.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="deposit-GETdeposit">
                                <a href="#deposit-GETdeposit">List Deposit User
Mengambil semua data Deposit milik user yang sedang login.
Bisa difilter berdasarkan ID Deposit untuk detail, atau search order_id.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="deposit-POSTdeposit">
                                <a href="#deposit-POSTdeposit">tambah deposit
Endpoint ini digunakan untuk membuat pesanan Topup Saldo.
dan mengembalikan URL pembayaran Snap Invoice Duitku.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="deposit-GETdeposit-admin">
                                <a href="#deposit-GETdeposit-admin">List Deposit (Admin)
Mengambil semua data Deposit secara keseluruhan (Global) untuk dashboard admin.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="deposit-DELETEdeposit--id-">
                                <a href="#deposit-DELETEdeposit--id-">Hapus Deposit
Menghapus data Deposit berdasarkan ID.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETdashboard">
                                <a href="#endpoints-GETdashboard">GET dashboard</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETrole">
                                <a href="#endpoints-GETrole">GET role</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTwallet-pin-validation">
                                <a href="#endpoints-POSTwallet-pin-validation">POST wallet/pin-validation</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTnotif--id-">
                                <a href="#endpoints-PUTnotif--id-">PUT notif/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-kategori" class="tocify-header">
                <li class="tocify-item level-1" data-unique="kategori">
                    <a href="#kategori">Kategori</a>
                </li>
                                    <ul id="tocify-subheader-kategori" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="kategori-GETkategori">
                                <a href="#kategori-GETkategori">List Kategori
Endpoint ini digunakan untuk mengambil semua data kategori yang aktif.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="kategori-POSTkategori">
                                <a href="#kategori-POSTkategori">Tambah Kategori</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="kategori-PUTkategori--id-">
                                <a href="#kategori-PUTkategori--id-">Edit Kategori</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="kategori-DELETEkategori--id-">
                                <a href="#kategori-DELETEkategori--id-">Hapus Kategori</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-member-level" class="tocify-header">
                <li class="tocify-item level-1" data-unique="member-level">
                    <a href="#member-level">Member Level</a>
                </li>
                                    <ul id="tocify-subheader-member-level" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="member-level-GETlevel">
                                <a href="#member-level-GETlevel">List User
Endpoint ini digunakan untuk mengambil semua data User.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="member-level-PUTlevel--id-">
                                <a href="#member-level-PUTlevel--id-">Edit Member</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-notifikasi" class="tocify-header">
                <li class="tocify-item level-1" data-unique="notifikasi">
                    <a href="#notifikasi">Notifikasi</a>
                </li>
                                    <ul id="tocify-subheader-notifikasi" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="notifikasi-GETnotif">
                                <a href="#notifikasi-GETnotif">List Notifikasi
Mengambil semua data Notifikasi milik user yang sedang login.
Bisa difilter berdasarkan ID Notifikasi untuk detail, atau search order_id.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-payment-method" class="tocify-header">
                <li class="tocify-item level-1" data-unique="payment-method">
                    <a href="#payment-method">Payment Method</a>
                </li>
                                    <ul id="tocify-subheader-payment-method" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="payment-method-GETpayment-method">
                                <a href="#payment-method-GETpayment-method">List Payment Method
Endpoint ini digunakan untuk mengambil semua data Payment Method.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="payment-method-GETpayment-method-admin">
                                <a href="#payment-method-GETpayment-method-admin">List Payment Method admin
Endpoint ini digunakan untuk mengambil semua data Payment Method.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="payment-method-POSTpayment-method">
                                <a href="#payment-method-POSTpayment-method">Tambah Payment Method</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="payment-method-PUTpayment-method--id-">
                                <a href="#payment-method-PUTpayment-method--id-">Edit Payment Method</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="payment-method-DELETEpayment-method--id-">
                                <a href="#payment-method-DELETEpayment-method--id-">Hapus Payment Method</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-produk" class="tocify-header">
                <li class="tocify-item level-1" data-unique="produk">
                    <a href="#produk">Produk</a>
                </li>
                                    <ul id="tocify-subheader-produk" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="produk-GETproduk">
                                <a href="#produk-GETproduk">List Produk
Endpoint ini digunakan untuk mengambil semua data Produk yang aktif.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produk-GETproduk--slug-">
                                <a href="#produk-GETproduk--slug-">Show Daftar Harga
Endpoint ini digunakan untuk mengambil data Produk yang aktif berdasarkan slug.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produk-POSTproduk-check-username--id-">
                                <a href="#produk-POSTproduk-check-username--id-">Cek Validasi ID Game
Endpoint ini digunakan untuk memvalidasi user ID dan server ID sebelum melakukan transaksi.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produk-POSTproduk-payment">
                                <a href="#produk-POSTproduk-payment">Checkout Top Up
Endpoint ini digunakan untuk membuat pesanan top up (Game, Pulsa, E-Wallet).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produk-GETproduk-list-harga--slug-">
                                <a href="#produk-GETproduk-list-harga--slug-">List Daftar Harga
Endpoint ini digunakan untuk mengambil semua data Harga Dari Provider yang aktif.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produk-POSTproduk">
                                <a href="#produk-POSTproduk">Tambah Produk</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produk-POSTproduk-layanan--id-">
                                <a href="#produk-POSTproduk-layanan--id-">Update Harga Produk</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produk-PUTproduk--id-">
                                <a href="#produk-PUTproduk--id-">Update Produk</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produk-DELETEproduk--id-">
                                <a href="#produk-DELETEproduk--id-">Hapus Produk</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-provider" class="tocify-header">
                <li class="tocify-item level-1" data-unique="provider">
                    <a href="#provider">Provider</a>
                </li>
                                    <ul id="tocify-subheader-provider" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="provider-GETprovider">
                                <a href="#provider-GETprovider">List provider
Endpoint ini digunakan untuk mengambil semua data provider yang aktif.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="provider-PUTprovider--id-">
                                <a href="#provider-PUTprovider--id-">Edit provider</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="provider-DELETEprovider--id-">
                                <a href="#provider-DELETEprovider--id-">Hapus provider</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-review" class="tocify-header">
                <li class="tocify-item level-1" data-unique="review">
                    <a href="#review">Review</a>
                </li>
                                    <ul id="tocify-subheader-review" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="review-GETreview">
                                <a href="#review-GETreview">List Review User
Mengambil semua data Review milik user yang sedang login.
Bisa difilter berdasarkan ID Review untuk detail, atau produk_id.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="review-POSTreview">
                                <a href="#review-POSTreview">Endpoint ini digunakan untuk membuat pesanan Topup Saldo.
dan mengembalikan URL pembayaran Snap Invoice Duitku.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="review-PUTreview--id-">
                                <a href="#review-PUTreview--id-">Update Rating & Balasan
Endpoint ini digunakan oleh User untuk merevisi ulasan (maks 1x)
atau oleh Admin untuk membalas ulasan dan mengatur status publikasi.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="review-GETreview-admin">
                                <a href="#review-GETreview-admin">List Review (Admin)
Mengambil semua data Review secara keseluruhan (Global) untuk dashboard admin.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-seo-meta-tags" class="tocify-header">
                <li class="tocify-item level-1" data-unique="seo-meta-tags">
                    <a href="#seo-meta-tags">Seo Meta Tags</a>
                </li>
                                    <ul id="tocify-subheader-seo-meta-tags" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="seo-meta-tags-GETseo">
                                <a href="#seo-meta-tags-GETseo">List Seo Meta Tags
Endpoint ini digunakan untuk mengambil semua data Seo Meta Tags.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="seo-meta-tags-POSTseo">
                                <a href="#seo-meta-tags-POSTseo">Tambah Seo Meta Tags</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="seo-meta-tags-PUTseo--id-">
                                <a href="#seo-meta-tags-PUTseo--id-">Edit Seo Meta Tags</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="seo-meta-tags-DELETEseo--id-">
                                <a href="#seo-meta-tags-DELETEseo--id-">Hapus Seo Meta Tags</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-site-content" class="tocify-header">
                <li class="tocify-item level-1" data-unique="site-content">
                    <a href="#site-content">Site Content</a>
                </li>
                                    <ul id="tocify-subheader-site-content" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="site-content-GETsite-conten">
                                <a href="#site-content-GETsite-conten">List Site Content
Endpoint ini digunakan untuk mengambil semua data Site Content.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="site-content-POSTsite-conten">
                                <a href="#site-content-POSTsite-conten">Tambah Site Content</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="site-content-PUTsite-conten--id-">
                                <a href="#site-content-PUTsite-conten--id-">Update Site Content</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="site-content-DELETEsite-conten--id-">
                                <a href="#site-content-DELETEsite-conten--id-">Delete Site Content</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-social-media" class="tocify-header">
                <li class="tocify-item level-1" data-unique="social-media">
                    <a href="#social-media">Social Media</a>
                </li>
                                    <ul id="tocify-subheader-social-media" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="social-media-GETsocial-media">
                                <a href="#social-media-GETsocial-media">List Social Media
Endpoint ini digunakan untuk mengambil semua data Social Media.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="social-media-POSTsocial-media">
                                <a href="#social-media-POSTsocial-media">Tambah Social Media</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="social-media-PUTsocial-media--id-">
                                <a href="#social-media-PUTsocial-media--id-">Edit Social Media</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="social-media-DELETEsocial-media--id-">
                                <a href="#social-media-DELETEsocial-media--id-">Hapus Social Media</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-transaksi" class="tocify-header">
                <li class="tocify-item level-1" data-unique="transaksi">
                    <a href="#transaksi">Transaksi</a>
                </li>
                                    <ul id="tocify-subheader-transaksi" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="transaksi-POSTtransaksi-callback-payment">
                                <a href="#transaksi-POSTtransaksi-callback-payment">Callback Payment Gateway
Endpoint untuk menerima notifikasi status pembayaran dari Midtrans/Duitku.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transaksi-POSTtransaksi-callback-ppob">
                                <a href="#transaksi-POSTtransaksi-callback-ppob">Callback Provider PPOB
Endpoint untuk menerima status pesanan dari Provider (VIP/IAK/Digiflazz).
Pastikan header X-Client-Signature dikirim untuk validasi.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transaksi-GETtransaksi">
                                <a href="#transaksi-GETtransaksi">List Transaksi User
Mengambil semua data transaksi milik user yang sedang login.
Bisa difilter berdasarkan ID transaksi untuk detail, atau search order_id.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transaksi-GETtransaksi-admin">
                                <a href="#transaksi-GETtransaksi-admin">List Transaksi (Admin)
Mengambil semua data transaksi secara keseluruhan (Global) untuk dashboard admin.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transaksi-DELETEtransaksi--id-">
                                <a href="#transaksi-DELETEtransaksi--id-">Hapus Transaksi
Menghapus data transaksi berdasarkan ID.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-user" class="tocify-header">
                <li class="tocify-item level-1" data-unique="user">
                    <a href="#user">User</a>
                </li>
                                    <ul id="tocify-subheader-user" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="user-GETuser">
                                <a href="#user-GETuser">List User
Endpoint ini digunakan untuk mengambil semua data User.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-POSTuser">
                                <a href="#user-POSTuser">Tambah User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-PUTuser--id-">
                                <a href="#user-PUTuser--id-">Edit User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-DELETEuser--id-">
                                <a href="#user-DELETEuser--id-">Delete User</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-voucher" class="tocify-header">
                <li class="tocify-item level-1" data-unique="voucher">
                    <a href="#voucher">Voucher</a>
                </li>
                                    <ul id="tocify-subheader-voucher" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="voucher-GETvoucher">
                                <a href="#voucher-GETvoucher">List Voucher
Endpoint ini digunakan untuk mengambil semua data Voucher.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="voucher-POSTvoucher-check--code-">
                                <a href="#voucher-POSTvoucher-check--code-">Cek Ketersedian Voucher</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="voucher-POSTvoucher">
                                <a href="#voucher-POSTvoucher">Tambah Voucher</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="voucher-PUTvoucher--id-">
                                <a href="#voucher-PUTvoucher--id-">Edit Voucher</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="voucher-DELETEvoucher--id-">
                                <a href="#voucher-DELETEvoucher--id-">Hapus Voucher</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-wallet-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="wallet-management">
                    <a href="#wallet-management">Wallet Management</a>
                </li>
                                    <ul id="tocify-subheader-wallet-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="wallet-management-GETwallet">
                                <a href="#wallet-management-GETwallet">Menampilkan data wallet user yang sedang login.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="wallet-management-POSTwallet">
                                <a href="#wallet-management-POSTwallet">Membuat wallet baru (aktivasi wallet).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="wallet-management-PUTwallet--id-">
                                <a href="#wallet-management-PUTwallet--id-">Update status atau saldo wallet (Admin/System Only).</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: April 11, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Dokumentasi resmi untuk integrasi layanan Topup Game Reiyan Store.</p>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="autentikasi">Autentikasi</h1>

    <p>API untuk mengelola login dan logout user Reiyan Store</p>

                                <h2 id="autentikasi-POSTauth-register">Register User</h2>

<p>
</p>

<p>Endpoint ini digunakan untuk register akun reiyan store.</p>

<span id="example-requests-POSTauth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/auth/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"full_name\": \"Bambang Pamungkas\",
    \"user_name\": \"Bambang\",
    \"phone\": \"081227415987\",
    \"email\": \"bambang@gmail.com\",
    \"password\": \"aP1W5B0&gt;YC4I\",
    \"password_confirmation\": \"aP1W5B0&gt;YC4I\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/auth/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "full_name": "Bambang Pamungkas",
    "user_name": "Bambang",
    "phone": "081227415987",
    "email": "bambang@gmail.com",
    "password": "aP1W5B0&gt;YC4I",
    "password_confirmation": "aP1W5B0&gt;YC4I"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTauth-register">
</span>
<span id="execution-results-POSTauth-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTauth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTauth-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTauth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTauth-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTauth-register" data-method="POST"
      data-path="auth/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTauth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTauth-register"
                    onclick="tryItOut('POSTauth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTauth-register"
                    onclick="cancelTryOut('POSTauth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTauth-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>auth/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTauth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTauth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>full_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="full_name"                data-endpoint="POSTauth-register"
               value="Bambang Pamungkas"
               data-component="body">
    <br>
<p>Full Name. Example: <code>Bambang Pamungkas</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_name"                data-endpoint="POSTauth-register"
               value="Bambang"
               data-component="body">
    <br>
<p>User Name. Example: <code>Bambang</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTauth-register"
               value="081227415987"
               data-component="body">
    <br>
<p>User Name. Example: <code>081227415987</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTauth-register"
               value="bambang@gmail.com"
               data-component="body">
    <br>
<p>Email user. Example: <code>bambang@gmail.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTauth-register"
               value="aP1W5B0>YC4I"
               data-component="body">
    <br>
<p>Password user. Example: <code>aP1W5B0&gt;YC4I</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTauth-register"
               value="aP1W5B0>YC4I"
               data-component="body">
    <br>
<p>Password user. Example: <code>aP1W5B0&gt;YC4I</code></p>
        </div>
        </form>

                    <h2 id="autentikasi-POSTauth-login">Login User</h2>

<p>
</p>

<p>Endpoint ini digunakan untuk mendapatkan token akses.</p>

<span id="example-requests-POSTauth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"bambang@gmail.com\",
    \"password\": \"aP1W5B0&gt;YC4I\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "bambang@gmail.com",
    "password": "aP1W5B0&gt;YC4I"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTauth-login">
</span>
<span id="execution-results-POSTauth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTauth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTauth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTauth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTauth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTauth-login" data-method="POST"
      data-path="auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTauth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTauth-login"
                    onclick="tryItOut('POSTauth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTauth-login"
                    onclick="cancelTryOut('POSTauth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTauth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTauth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTauth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTauth-login"
               value="bambang@gmail.com"
               data-component="body">
    <br>
<p>Email user. Example: <code>bambang@gmail.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTauth-login"
               value="aP1W5B0>YC4I"
               data-component="body">
    <br>
<p>Password user. Example: <code>aP1W5B0&gt;YC4I</code></p>
        </div>
        </form>

                    <h2 id="autentikasi-POSTauth-refresh">Refresh Token</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Tukar token lama dengan token baru agar masa berlaku (expiration) diperpanjang.</p>

<span id="example-requests-POSTauth-refresh">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/auth/refresh" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"refresh_token\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/auth/refresh"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "refresh_token": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTauth-refresh">
</span>
<span id="execution-results-POSTauth-refresh" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTauth-refresh"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTauth-refresh"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTauth-refresh" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTauth-refresh">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTauth-refresh" data-method="POST"
      data-path="auth/refresh"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTauth-refresh', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTauth-refresh"
                    onclick="tryItOut('POSTauth-refresh');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTauth-refresh"
                    onclick="cancelTryOut('POSTauth-refresh');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTauth-refresh"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>auth/refresh</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTauth-refresh"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTauth-refresh"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTauth-refresh"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>refresh_token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="refresh_token"                data-endpoint="POSTauth-refresh"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="autentikasi-GETlog">Log Sistem</h2>

<p>
</p>

<p>Endpoint ini digunakan untuk memantau list Log Sistem.</p>

<span id="example-requests-GETlog">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/log" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/log"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETlog">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IlRqRTFueUJSdk9yVzB4TGZ0ZGlZZ3c9PSIsInZhbHVlIjoiYWF2M0w0UGxvUzV4TUlXQkFmNjhkME04V2RRNDM1T25TU3RVRlN1RkIzYjFtMVdFN2hUV2syK2JVcGNVKzlwa1VGRGJ4ZTg0Q1JKSmxieFRTczRtZi9RR2MyUDBQbFZNWWxqQ2xUSkhlQkcrK3IxclZRWjhsdS9ndGZjOE9iUWkiLCJtYWMiOiI2MTgwYmJjYjQxNGJjN2Q2NDRlZjViNGUxNjc1MDNmNzJhYmRiYTAzMjZlMDg1OTMzNjZkOWQyNGVmNWUwMzg5IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:24 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6InZNQU41OFZWdm5DbURaZzc1U1FIa3c9PSIsInZhbHVlIjoiN29Kb0pXbUh4ZUZucjJUTGdpc3JRZzk1QTZYaDlDQys0d3B1dFUzSGNUTWY1cEdYUnIrMTl3OUN6NVg2SXlSQU1UWEJqK3MxRGVWZHpyYmEzbmxCREhPYWYvR0VLcHN2bUZGYTU1aVMreitrVEE4ZnJSRC8xb21mYm1nU2JyMGciLCJtYWMiOiJhNjZkYWFlOWI4ODc0NWIyNTNhMGYzYzJkMTBiYTVlN2UyOGQxNWVjOWIxZDY3MTE5YTZiNmUxODAyMWY3NDY1IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:24 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETlog" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlog"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlog"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETlog" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlog">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETlog" data-method="GET"
      data-path="log"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlog', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlog"
                    onclick="tryItOut('GETlog');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlog"
                    onclick="cancelTryOut('GETlog');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlog"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>log</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETlog"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETlog"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="banner">Banner</h1>

    <p>API untuk mengelola Banner</p>

                                <h2 id="banner-GETbanner">List Banner
Endpoint ini digunakan untuk mengambil semua data banner.</h2>

<p>
</p>

<p>Cocok digunakan di halaman admin.</p>

<span id="example-requests-GETbanner">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/banner?search=Mobile&amp;starts_at=2026-02-15&amp;ends_at=2026-02-30&amp;is_active=1&amp;limit=10" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/banner"
);

const params = {
    "search": "Mobile",
    "starts_at": "2026-02-15",
    "ends_at": "2026-02-30",
    "is_active": "1",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETbanner">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IlB6ZmN4MGtwREpCVmJDZk96b1lxeHc9PSIsInZhbHVlIjoiWmZYU3J5SVlpT1R0d2o1bzROeVZMbzBJN2pWMm10bXRsZGRDdHRXREZ0UzVYVXBzZFJvK1JGOWt5dFdxN1h0K0NTaTZkUitBZWFQWG1PMkRKOFI4eWtiZ2krNzI5aHQvcGt5eUUvS2xnRWNlSjJBSHFnSHZUZHliV0t3ZlhXaXQiLCJtYWMiOiJiMTZiOTY4MWMzMWQyZWZmMTBlNWIzN2ZmMDg3MGIzZTFiMmVkOWY0MjI1N2ZlM2M2ODVjYjkyNmI5Y2MxNmM2IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IlVNRFVUYW1yamMvVWJZZ0JsUnVkSEE9PSIsInZhbHVlIjoiOHYrL2lMZ250dHV4ZzBPWno1RGxBRTZabVh1ZVcycGZGM0g2SGtrL0N4bzlDOXhPcVVkV3UvbTk2bHRsNzNRejdXbVdpTTFRZ2xxamorQUZ1TXRDL0JFMloxMDd1ZEFtdzlWdXV4VkpRd0ljVjNWbWxoVWNVYXVaL00zTHhyQTIiLCJtYWMiOiI2ZTk3MzcxMDQxOGY4MGY3NWVkZDY0ZmZhNDIzZWU0YzQyMGQ5OTViMDcxMWUyN2ViNmYxMGQyZDNhMGJkMGRiIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;SQLSTATE[42S22]: Column not found: 1054 Unknown column &#039;ends_at&#039; in &#039;where clause&#039; (Connection: mysql, Host: db, Port: 3306, Database: reiyan_store, SQL: select * from `banners` where (`title` like %Mobile% and `starts_at` like %2026-02-15% and `ends_at` like %2026-02-30% and `is_active` = 1) order by `created_at` desc limit 4)&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETbanner" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETbanner"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETbanner"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETbanner" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETbanner">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETbanner" data-method="GET"
      data-path="banner"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETbanner', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETbanner"
                    onclick="tryItOut('GETbanner');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETbanner"
                    onclick="cancelTryOut('GETbanner');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETbanner"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>banner</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETbanner"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETbanner"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETbanner"
               value="Mobile"
               data-component="query">
    <br>
<p>Mencari banner berdasarkan nama. Example: <code>Mobile</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>starts_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="starts_at"                data-endpoint="GETbanner"
               value="2026-02-15"
               data-component="query">
    <br>
<p>date Mencari banner berdasarkan tanggal dimulai. Example: <code>2026-02-15</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>ends_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ends_at"                data-endpoint="GETbanner"
               value="2026-02-30"
               data-component="query">
    <br>
<p>date Mencari banner berdasarkan tanggal berakhir. Example: <code>2026-02-30</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETbanner" style="display: none">
            <input type="radio" name="is_active"
                   value="1"
                   data-endpoint="GETbanner"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETbanner" style="display: none">
            <input type="radio" name="is_active"
                   value="0"
                   data-endpoint="GETbanner"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Mencari banner berdasarkan status aktif. Example: <code>true</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETbanner"
               value="10"
               data-component="query">
    <br>
<p>Batasi jumlah data yang tampil. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="banner-POSTbanner">Tambah Banner</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan Banner baru ke dalam sistem.</p>

<span id="example-requests-POSTbanner">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/banner" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=Reiyan Store"\
    --form "link_url=https://reiyanstore.com/promo/ramadhan"\
    --form "starts_at=2026-03-01"\
    --form "end_at=2026-03-31"\
    --form "is_active=1"\
    --form "image=@/tmp/phpbe0HI1" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/banner"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'Reiyan Store');
body.append('link_url', 'https://reiyanstore.com/promo/ramadhan');
body.append('starts_at', '2026-03-01');
body.append('end_at', '2026-03-31');
body.append('is_active', '1');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTbanner">
</span>
<span id="execution-results-POSTbanner" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTbanner"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTbanner"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTbanner" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTbanner">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTbanner" data-method="POST"
      data-path="banner"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTbanner', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTbanner"
                    onclick="tryItOut('POSTbanner');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTbanner"
                    onclick="cancelTryOut('POSTbanner');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTbanner"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>banner</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTbanner"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTbanner"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTbanner"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTbanner"
               value="Reiyan Store"
               data-component="body">
    <br>
<p>Title banner. Example: <code>Reiyan Store</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTbanner"
               value=""
               data-component="body">
    <br>
<p>Gambar banner. Must be an image (png, jpg, jpeg, webp), max 2048KB. Example: <code>/tmp/phpbe0HI1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>link_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="link_url"                data-endpoint="POSTbanner"
               value="https://reiyanstore.com/promo/ramadhan"
               data-component="body">
    <br>
<p>URL tujuan saat banner diklik. Example: <code>https://reiyanstore.com/promo/ramadhan</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>starts_at</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="starts_at"                data-endpoint="POSTbanner"
               value="2026-03-01"
               data-component="body">
    <br>
<p>Tanggal mulai publikasi banner (ISO Format). Example: <code>2026-03-01</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_at</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_at"                data-endpoint="POSTbanner"
               value="2026-03-31"
               data-component="body">
    <br>
<p>Tanggal berakhir publikasi. Harus setelah tanggal mulai. Example: <code>2026-03-31</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTbanner" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTbanner"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTbanner" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTbanner"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status aktif banner (1 untuk aktif, 0 untuk draft). Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="banner-PUTbanner--id-">Edit banner</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk mengubah banner web ke dalam sistem.</p>

<span id="example-requests-PUTbanner--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/banner/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=Reiyan Store"\
    --form "link_url=https://reiyanstore.com/promo/ramadhan"\
    --form "starts_at=2026-03-01"\
    --form "end_at=2026-03-31"\
    --form "is_active=1"\
    --form "image=@/tmp/phpB2NFmi" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/banner/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'Reiyan Store');
body.append('link_url', 'https://reiyanstore.com/promo/ramadhan');
body.append('starts_at', '2026-03-01');
body.append('end_at', '2026-03-31');
body.append('is_active', '1');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTbanner--id-">
</span>
<span id="execution-results-PUTbanner--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTbanner--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTbanner--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTbanner--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTbanner--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTbanner--id-" data-method="PUT"
      data-path="banner/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTbanner--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTbanner--id-"
                    onclick="tryItOut('PUTbanner--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTbanner--id-"
                    onclick="cancelTryOut('PUTbanner--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTbanner--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>banner/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTbanner--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTbanner--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTbanner--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTbanner--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the banner. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTbanner--id-"
               value="Reiyan Store"
               data-component="body">
    <br>
<p>Title banner. Example: <code>Reiyan Store</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="PUTbanner--id-"
               value=""
               data-component="body">
    <br>
<p>Gambar banner. Must be an image (png, jpg, jpeg, webp), max 2048KB. Example: <code>/tmp/phpB2NFmi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>link_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="link_url"                data-endpoint="PUTbanner--id-"
               value="https://reiyanstore.com/promo/ramadhan"
               data-component="body">
    <br>
<p>URL tujuan saat banner diklik. Example: <code>https://reiyanstore.com/promo/ramadhan</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>starts_at</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="starts_at"                data-endpoint="PUTbanner--id-"
               value="2026-03-01"
               data-component="body">
    <br>
<p>Tanggal mulai publikasi banner (ISO Format). Example: <code>2026-03-01</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_at</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_at"                data-endpoint="PUTbanner--id-"
               value="2026-03-31"
               data-component="body">
    <br>
<p>Tanggal berakhir publikasi. Harus setelah tanggal mulai. Example: <code>2026-03-31</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="PUTbanner--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTbanner--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTbanner--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTbanner--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status aktif banner (1 untuk aktif, 0 untuk draft). Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="banner-DELETEbanner--id-">Hapus banner Web</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menghapus banner produk ke dalam sistem.</p>

<span id="example-requests-DELETEbanner--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/banner/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/banner/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEbanner--id-">
</span>
<span id="execution-results-DELETEbanner--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEbanner--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEbanner--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEbanner--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEbanner--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEbanner--id-" data-method="DELETE"
      data-path="banner/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEbanner--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEbanner--id-"
                    onclick="tryItOut('DELETEbanner--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEbanner--id-"
                    onclick="cancelTryOut('DELETEbanner--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEbanner--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>banner/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEbanner--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEbanner--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEbanner--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEbanner--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the banner. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="config-website">Config Website</h1>

    <p>API untuk mengelola Config Website</p>

                                <h2 id="config-website-GETconfig">List Setting Website
Endpoint ini digunakan untuk mengambil semua data config yang aktif.</h2>

<p>
</p>

<p>Cocok digunakan di halaman admin.</p>

<span id="example-requests-GETconfig">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/config?id=architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/config"
);

const params = {
    "id": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETconfig">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6Im9oKzBaOEhuemJhU0JDSG15K1VYbEE9PSIsInZhbHVlIjoiV1BMMUxyTVY3SDc1bVFIZndqWjBNcHZhZXcvZXg3S1VlUnNCQmlFTjMrOUkwQjlBTVNCUnJLeHduelJjMFduemZxZURvMEUwWjRBR3ptYXpiTnBrNTlHYlo1RDdlODU0ZURZRFNBbmt2MWdPN25WcG9OcC9scmF3ZWNndEJkQ2EiLCJtYWMiOiI0NDljZDNiMTBmOWMzN2ViNGIwZTAyNmY4YThjZjQyNTI5YWEzNGFkMTVkZjAzYjMyMGY0OWViNjIzOTg1YTU4IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IkR6bllGZXRwTWhzQ2xnSEVidFBodmc9PSIsInZhbHVlIjoiQ1NZcXQ2NU1RUmFVSTZ2RXZxempPeDBScjRLQ3dRU1dKbE5Xa3EvakFjUWl4RE05NVdhTUZuS2tSdjJCek1jYnpuL3pHRTg3aTZuVUhNZ0MrMFVHOWV6TTZ4RHRNNjBkVE9oYU8xNlVJVHFua0REWjlpZk9hcm5DU2hYaG5uM3giLCJtYWMiOiIyZWQyODZkOWZkM2ZhMWU0ZjEyYjRjOWUwMTc1NmZhNWJhZDlhMDYyNGNkOGFkZWI5YmU2ZjM2YjkwMzRhOWNkIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 200,
        &quot;status&quot;: &quot;success&quot;,
        &quot;message&quot;: &quot;data config berhasil ditampilkan&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETconfig" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETconfig"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETconfig"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETconfig" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETconfig">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETconfig" data-method="GET"
      data-path="config"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETconfig', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETconfig"
                    onclick="tryItOut('GETconfig');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETconfig"
                    onclick="cancelTryOut('GETconfig');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETconfig"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>config</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETconfig"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETconfig"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETconfig"
               value="architecto"
               data-component="query">
    <br>
<p>Mencari config berdasarkan id. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="config-website-POSTconfig">Tambah Setting Website</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan config web baru ke dalam sistem.</p>

<span id="example-requests-POSTconfig">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/config" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=Reiyan Store"\
    --form "short_title=Termurah &amp; Terpercaya"\
    --form "deskripsi=Website Topup Game Termurah &amp; Terpercaya"\
    --form "favicon=@/tmp/phpPDpu0D" \
    --form "logo=@/tmp/php8u2Bzb" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/config"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'Reiyan Store');
body.append('short_title', 'Termurah &amp; Terpercaya');
body.append('deskripsi', 'Website Topup Game Termurah &amp; Terpercaya');
body.append('favicon', document.querySelector('input[name="favicon"]').files[0]);
body.append('logo', document.querySelector('input[name="logo"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTconfig">
</span>
<span id="execution-results-POSTconfig" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTconfig"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTconfig"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTconfig" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTconfig">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTconfig" data-method="POST"
      data-path="config"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTconfig', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTconfig"
                    onclick="tryItOut('POSTconfig');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTconfig"
                    onclick="cancelTryOut('POSTconfig');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTconfig"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>config</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTconfig"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTconfig"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTconfig"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTconfig"
               value="Reiyan Store"
               data-component="body">
    <br>
<p>Title config. Example: <code>Reiyan Store</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>short_title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="short_title"                data-endpoint="POSTconfig"
               value="Termurah & Terpercaya"
               data-component="body">
    <br>
<p>Short Title config. Example: <code>Termurah &amp; Terpercaya</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>favicon</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="favicon"                data-endpoint="POSTconfig"
               value=""
               data-component="body">
    <br>
<p>Foto favicon config (PNG/JPG, max 2MB). Example: <code>/tmp/phpPDpu0D</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="logo"                data-endpoint="POSTconfig"
               value=""
               data-component="body">
    <br>
<p>Foto logo config (PNG/JPG, max 2MB). Example: <code>/tmp/php8u2Bzb</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deskripsi"                data-endpoint="POSTconfig"
               value="Website Topup Game Termurah & Terpercaya"
               data-component="body">
    <br>
<p>Deskripsi config. Example: <code>Website Topup Game Termurah &amp; Terpercaya</code></p>
        </div>
        </form>

                    <h2 id="config-website-PUTconfig--id-">Edit config</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk mengubah config web ke dalam sistem.</p>

<span id="example-requests-PUTconfig--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/config/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=Reiyan Store"\
    --form "short_title=Termurah &amp; Terpercaya"\
    --form "deskripsi=Website Topup Game Termurah &amp; Terpercaya"\
    --form "favicon=@/tmp/phptlhACP" \
    --form "logo=@/tmp/phpTStwHp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/config/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'Reiyan Store');
body.append('short_title', 'Termurah &amp; Terpercaya');
body.append('deskripsi', 'Website Topup Game Termurah &amp; Terpercaya');
body.append('favicon', document.querySelector('input[name="favicon"]').files[0]);
body.append('logo', document.querySelector('input[name="logo"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTconfig--id-">
</span>
<span id="execution-results-PUTconfig--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTconfig--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTconfig--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTconfig--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTconfig--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTconfig--id-" data-method="PUT"
      data-path="config/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTconfig--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTconfig--id-"
                    onclick="tryItOut('PUTconfig--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTconfig--id-"
                    onclick="cancelTryOut('PUTconfig--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTconfig--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>config/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTconfig--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTconfig--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTconfig--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTconfig--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the config. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTconfig--id-"
               value="Reiyan Store"
               data-component="body">
    <br>
<p>Title config. Example: <code>Reiyan Store</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>short_title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="short_title"                data-endpoint="PUTconfig--id-"
               value="Termurah & Terpercaya"
               data-component="body">
    <br>
<p>Short Title config. Example: <code>Termurah &amp; Terpercaya</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>favicon</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="favicon"                data-endpoint="PUTconfig--id-"
               value=""
               data-component="body">
    <br>
<p>nullable Foto favicon config (PNG/JPG, max 2MB). Example: <code>/tmp/phptlhACP</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="logo"                data-endpoint="PUTconfig--id-"
               value=""
               data-component="body">
    <br>
<p>nullable Foto logo config (PNG/JPG, max 2MB). Example: <code>/tmp/phpTStwHp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deskripsi"                data-endpoint="PUTconfig--id-"
               value="Website Topup Game Termurah & Terpercaya"
               data-component="body">
    <br>
<p>Deskripsi config. Example: <code>Website Topup Game Termurah &amp; Terpercaya</code></p>
        </div>
        </form>

                    <h2 id="config-website-DELETEconfig--id-">Hapus config Web</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menghapus config produk ke dalam sistem.</p>

<span id="example-requests-DELETEconfig--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/config/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/config/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEconfig--id-">
</span>
<span id="execution-results-DELETEconfig--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEconfig--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEconfig--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEconfig--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEconfig--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEconfig--id-" data-method="DELETE"
      data-path="config/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEconfig--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEconfig--id-"
                    onclick="tryItOut('DELETEconfig--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEconfig--id-"
                    onclick="cancelTryOut('DELETEconfig--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEconfig--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>config/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEconfig--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEconfig--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEconfig--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEconfig--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the config. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="contact-us">Contact Us</h1>

    <p>API untuk mengelola Contact Us</p>

                                <h2 id="contact-us-GETcontact-us">List Contact Us
Endpoint ini digunakan untuk mengambil semua data Contact Us.</h2>

<p>
</p>

<p>Cocok digunakan di halaman Kebijakan Privasi.</p>

<span id="example-requests-GETcontact-us">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/contact-us?id=16&amp;status=architecto&amp;search=architecto&amp;limit=architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/contact-us"
);

const params = {
    "id": "16",
    "status": "architecto",
    "search": "architecto",
    "limit": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETcontact-us">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IlhjVExQSUVLWXIxeEFwV2lOSTYwTWc9PSIsInZhbHVlIjoiWTV3eElrb09qOHY4cGZMdk1vZkVDSmNGVE1VWVdxeWhjU2R1djRqc2plZ0t5V0tLcmtwTXlxSlY2V005YlFFVjVTemhCWjVCWnhxUXBuOGRncjVZZEFsendDYWZyTWdHVzB3MVo2K09qZGFkVldMbld4K2ZWbCtudGlpM3V1UysiLCJtYWMiOiJiZDUwYzllZGQxNDFmNjgyMDJhMjU2N2I4MzUwNDZkOGM3ZWY3OTQ2MTk2NDk2YWVhOTRiMGRkNWViNTE0MDZmIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:28 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6Ik1acW9aRm1WNXBZVmkxNndhL1J6RlE9PSIsInZhbHVlIjoiYnhycGUzaURCRDhVa1ZwM1dwWkhvRnEzSjhlYXpMWGluazFFaVkwOUVNRXBIbmJQZGpIVktmRFNiK2ZyUzVXOElXMTJIQ0d6Qm9ST01NK2ZvYmdtNy9nUUZrVHhpL0JRd1JQbTdLWUgySlRSSGZCSlUyU0Z3VmJmRXRDRXhOT1ciLCJtYWMiOiIxNGNmNTNmNzNkNzVlNzNiMDM1MTQ2N2JiODgyZmY1NjIyNTNmYmQyYzU1MWQxMDFiOTljNTBjMjI3ZGYyYjczIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:28 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 200,
        &quot;status&quot;: &quot;success&quot;,
        &quot;message&quot;: &quot;data Contact Us berhasil ditampilkan&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETcontact-us" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETcontact-us"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETcontact-us"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETcontact-us" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcontact-us">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETcontact-us" data-method="GET"
      data-path="contact-us"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETcontact-us', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETcontact-us"
                    onclick="tryItOut('GETcontact-us');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETcontact-us"
                    onclick="cancelTryOut('GETcontact-us');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETcontact-us"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>contact-us</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETcontact-us"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETcontact-us"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETcontact-us"
               value="16"
               data-component="query">
    <br>
<p>Mencari Contact Us berdasarkan id. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETcontact-us"
               value="architecto"
               data-component="query">
    <br>
<p>Mencari Contact Us berdasarkan status. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETcontact-us"
               value="architecto"
               data-component="query">
    <br>
<p>Mencari Contact Us berdasarkan title. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="limit"                data-endpoint="GETcontact-us"
               value="architecto"
               data-component="query">
    <br>
<p>integer. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="contact-us-POSTcontact-us">Tambah Contact Us</h2>

<p>
</p>

<p>Endpoint ini digunakan untuk menambahkan Contact Us baru ke dalam sistem.</p>

<span id="example-requests-POSTcontact-us">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/contact-us" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"order_id\": \"architecto\",
    \"kategori\": \"architecto\",
    \"name\": \"architecto\",
    \"phone\": \"architecto\",
    \"deskripsi\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/contact-us"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "order_id": "architecto",
    "kategori": "architecto",
    "name": "architecto",
    "phone": "architecto",
    "deskripsi": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTcontact-us">
</span>
<span id="execution-results-POSTcontact-us" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTcontact-us"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTcontact-us"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTcontact-us" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTcontact-us">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTcontact-us" data-method="POST"
      data-path="contact-us"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTcontact-us', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTcontact-us"
                    onclick="tryItOut('POSTcontact-us');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTcontact-us"
                    onclick="cancelTryOut('POSTcontact-us');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTcontact-us"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>contact-us</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTcontact-us"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTcontact-us"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="order_id"                data-endpoint="POSTcontact-us"
               value="architecto"
               data-component="body">
    <br>
<p>order_id. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>kategori</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kategori"                data-endpoint="POSTcontact-us"
               value="architecto"
               data-component="body">
    <br>
<p>kategori (Masalah Transaksi,Tanya Admin,Salah Tulis Nominal/TF Dibulatkan). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTcontact-us"
               value="architecto"
               data-component="body">
    <br>
<p>name. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTcontact-us"
               value="architecto"
               data-component="body">
    <br>
<p>phone. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deskripsi"                data-endpoint="POSTcontact-us"
               value="architecto"
               data-component="body">
    <br>
<p>deskripsi. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="contact-us-PUTcontact-us--id-">Update Contact Us</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk mengedit Contact Us baru ke dalam sistem.</p>

<span id="example-requests-PUTcontact-us--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/contact-us/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"order_id\": \"architecto\",
    \"kategori\": \"architecto\",
    \"name\": \"architecto\",
    \"phone\": \"architecto\",
    \"deskripsi\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/contact-us/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "order_id": "architecto",
    "kategori": "architecto",
    "name": "architecto",
    "phone": "architecto",
    "deskripsi": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTcontact-us--id-">
</span>
<span id="execution-results-PUTcontact-us--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTcontact-us--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTcontact-us--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTcontact-us--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTcontact-us--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTcontact-us--id-" data-method="PUT"
      data-path="contact-us/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTcontact-us--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTcontact-us--id-"
                    onclick="tryItOut('PUTcontact-us--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTcontact-us--id-"
                    onclick="cancelTryOut('PUTcontact-us--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTcontact-us--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>contact-us/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTcontact-us--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTcontact-us--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTcontact-us--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTcontact-us--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the contact u. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="order_id"                data-endpoint="PUTcontact-us--id-"
               value="architecto"
               data-component="body">
    <br>
<p>order_id. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>kategori</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kategori"                data-endpoint="PUTcontact-us--id-"
               value="architecto"
               data-component="body">
    <br>
<p>kategori (Masalah Transaksi,Tanya Admin,Salah Tulis Nominal/TF Dibulatkan). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTcontact-us--id-"
               value="architecto"
               data-component="body">
    <br>
<p>name. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTcontact-us--id-"
               value="architecto"
               data-component="body">
    <br>
<p>phone. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deskripsi"                data-endpoint="PUTcontact-us--id-"
               value="architecto"
               data-component="body">
    <br>
<p>deskripsi. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="contact-us-DELETEcontact-us--id-">Delete Contact Us</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menghapus Contact Us baru ke dalam sistem.</p>

<span id="example-requests-DELETEcontact-us--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/contact-us/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/contact-us/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEcontact-us--id-">
</span>
<span id="execution-results-DELETEcontact-us--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEcontact-us--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEcontact-us--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEcontact-us--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEcontact-us--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEcontact-us--id-" data-method="DELETE"
      data-path="contact-us/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEcontact-us--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEcontact-us--id-"
                    onclick="tryItOut('DELETEcontact-us--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEcontact-us--id-"
                    onclick="cancelTryOut('DELETEcontact-us--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEcontact-us--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>contact-us/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEcontact-us--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEcontact-us--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEcontact-us--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEcontact-us--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the contact u. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="deposit">Deposit</h1>

    

                                <h2 id="deposit-POSTdeposit-callback-payment">Callback Payment Gateway
Endpoint untuk menerima notifikasi status pembayaran dari Midtrans/Duitku.</h2>

<p>
</p>



<span id="example-requests-POSTdeposit-callback-payment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/deposit/callback-payment" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/deposit/callback-payment"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTdeposit-callback-payment">
</span>
<span id="execution-results-POSTdeposit-callback-payment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTdeposit-callback-payment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTdeposit-callback-payment"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTdeposit-callback-payment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTdeposit-callback-payment">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTdeposit-callback-payment" data-method="POST"
      data-path="deposit/callback-payment"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTdeposit-callback-payment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTdeposit-callback-payment"
                    onclick="tryItOut('POSTdeposit-callback-payment');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTdeposit-callback-payment"
                    onclick="cancelTryOut('POSTdeposit-callback-payment');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTdeposit-callback-payment"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>deposit/callback-payment</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTdeposit-callback-payment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTdeposit-callback-payment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="deposit-GETdeposit">List Deposit User
Mengambil semua data Deposit milik user yang sedang login.
Bisa difilter berdasarkan ID Deposit untuk detail, atau search order_id.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETdeposit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/deposit?id=16&amp;search=architecto&amp;status=architecto&amp;limit=16" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/deposit"
);

const params = {
    "id": "16",
    "search": "architecto",
    "status": "architecto",
    "limit": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETdeposit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IjJMNXF5NGNYZzFJeVZEY2ZqZkFjOVE9PSIsInZhbHVlIjoibkFiQitlQWU1NHAzUDNzOWhieUJ2TDIwdDJTYTA3Q0tGdUIrMU1GRjkxUzkzT1hGcmgzOEx0b1ZTZ1BEUTJIN2Rielh6QVlndWFDVHdKb0U1Mk45SFNBR1V2aGYxZlNyRXY2NCtlOTlpd2Q5MU9EZDduOGN5M05yc0JlMXNST2oiLCJtYWMiOiI3MzA4NjkwNjZjYzg3MjY5OTc2MTlmZGM3NDJmNWY5YjAyZTAyOWQyZWFiMGUzZmIxYTcwNzUxNWZkZmFlZmUyIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IkM2ZUVQYXhPMXdubWs4RldjNGhDYkE9PSIsInZhbHVlIjoidS8yWTZxWFN3ZWZOSFAzTlYxMlRQM1dKVU1BQVJuSVlVZlV6TkN6Mnh6TXdnQXFSYTltZkxqclpKMytpVkVia3gwZzg0TXF1c0hiWHptWmRjM1lMcW5RSTFzUUJvODA1NDErYUlSRWpFaVFKMTB0aisxdGV5a1pOcVZBdjJ0Z2siLCJtYWMiOiI0ZDUwZGRkZWE5MjYyNjkxYzk2ODIzZTEzNTY1MWE2NzIzMTg2YzM2YTI2YmU4MGFkYjUwN2ZmNWFhYTk4MzVhIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETdeposit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETdeposit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETdeposit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETdeposit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdeposit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETdeposit" data-method="GET"
      data-path="deposit"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETdeposit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETdeposit"
                    onclick="tryItOut('GETdeposit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETdeposit"
                    onclick="cancelTryOut('GETdeposit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETdeposit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>deposit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETdeposit"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETdeposit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETdeposit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETdeposit"
               value="16"
               data-component="query">
    <br>
<p>ID Deposit jika ingin mengambil detail satu data. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETdeposit"
               value="architecto"
               data-component="query">
    <br>
<p>Cari berdasarkan Order ID. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETdeposit"
               value="architecto"
               data-component="query">
    <br>
<p>Cari berdasarkan Status. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETdeposit"
               value="16"
               data-component="query">
    <br>
<p>Jumlah data per halaman. Example: <code>16</code></p>
            </div>
                </form>

                    <h2 id="deposit-POSTdeposit">tambah deposit
Endpoint ini digunakan untuk membuat pesanan Topup Saldo.
dan mengembalikan URL pembayaran Snap Invoice Duitku.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTdeposit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/deposit" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"payment_id\": 2,
    \"amount\": 200000
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/deposit"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "payment_id": 2,
    "amount": 200000
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTdeposit">
</span>
<span id="execution-results-POSTdeposit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTdeposit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTdeposit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTdeposit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTdeposit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTdeposit" data-method="POST"
      data-path="deposit"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTdeposit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTdeposit"
                    onclick="tryItOut('POSTdeposit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTdeposit"
                    onclick="cancelTryOut('POSTdeposit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTdeposit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>deposit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTdeposit"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTdeposit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTdeposit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="payment_id"                data-endpoint="POSTdeposit"
               value="2"
               data-component="body">
    <br>
<p>ID metode pembayaran (Midtrans, Duitku, dll). Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>amount</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="amount"                data-endpoint="POSTdeposit"
               value="200000"
               data-component="body">
    <br>
<p>Jumlah Saldo. Example: <code>200000</code></p>
        </div>
        </form>

                    <h2 id="deposit-GETdeposit-admin">List Deposit (Admin)
Mengambil semua data Deposit secara keseluruhan (Global) untuk dashboard admin.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETdeposit-admin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/deposit/admin?id=16&amp;search=architecto&amp;limit=16" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/deposit/admin"
);

const params = {
    "id": "16",
    "search": "architecto",
    "limit": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETdeposit-admin">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6InBicW8xN1pXemdBSklQTGJ5eUlDZ2c9PSIsInZhbHVlIjoiR2tVYVBOYTFPZWk0clZ6SGg0dTFtVzN0eHpVLy9PekVMVWFJSWNlZGJhdHBBV2hJaXVhZkpEbUk5L0RSOWl4eTlKNGFMMGprSzlmUTN5b0lkemNNV29kQUdmY3NGWUQrR01taDdKb2YvUExsODN2WDNsZGFKbUJSbnR5VU1MclkiLCJtYWMiOiJhN2I4ZjNhMjlmNDZiZTY5OTJmYzMxYmVkNDViMDIzMTA4YTEzNjRiNTVkYjMzOWJhMTBjZTIyYzU3NTQ2ZjA4IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6Ilg3NjRjQWFpbi9uOUdQQzhaUDhRcXc9PSIsInZhbHVlIjoicWFacVhMVC9qVGlEYzBFaDJDQVRoWm1VUDRqZmppRGxJd011TW5VeStEVElYTWVCZklBc3RMTGM2N2s4VjcxdXVObW0rZUR6Y3ByYVZENnJBNERPSFVReFo2ekhsSGJuOWdZY28xS0V3SWpROHJCVWF4eG15NEQyelRhakt0eUIiLCJtYWMiOiI3MzU0MTNmOTdkMTg3OGI4ZTFiYmJkZDg5N2NkZjkxN2U0OWUxMTM3ODBhMzI4N2MzOGM3NmMyOTVkOGU3ZGYxIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETdeposit-admin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETdeposit-admin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETdeposit-admin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETdeposit-admin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdeposit-admin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETdeposit-admin" data-method="GET"
      data-path="deposit/admin"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETdeposit-admin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETdeposit-admin"
                    onclick="tryItOut('GETdeposit-admin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETdeposit-admin"
                    onclick="cancelTryOut('GETdeposit-admin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETdeposit-admin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>deposit/admin</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETdeposit-admin"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETdeposit-admin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETdeposit-admin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETdeposit-admin"
               value="16"
               data-component="query">
    <br>
<p>ID Deposit untuk detail admin. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETdeposit-admin"
               value="architecto"
               data-component="query">
    <br>
<p>Cari berdasarkan Order ID. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETdeposit-admin"
               value="16"
               data-component="query">
    <br>
<p>Jumlah data per halaman. Example: <code>16</code></p>
            </div>
                </form>

                    <h2 id="deposit-DELETEdeposit--id-">Hapus Deposit
Menghapus data Deposit berdasarkan ID.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEdeposit--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/deposit/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/deposit/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEdeposit--id-">
</span>
<span id="execution-results-DELETEdeposit--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEdeposit--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEdeposit--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEdeposit--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEdeposit--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEdeposit--id-" data-method="DELETE"
      data-path="deposit/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEdeposit--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEdeposit--id-"
                    onclick="tryItOut('DELETEdeposit--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEdeposit--id-"
                    onclick="cancelTryOut('DELETEdeposit--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEdeposit--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>deposit/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEdeposit--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEdeposit--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEdeposit--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEdeposit--id-"
               value="architecto"
               data-component="url">
    <br>
<p>ID Deposit yang akan dihapus. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETdashboard">GET dashboard</h2>

<p>
</p>



<span id="example-requests-GETdashboard">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/dashboard" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/dashboard"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETdashboard">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6InJrZWRLRmRkNmJWVHlVSlV1OHhZY0E9PSIsInZhbHVlIjoiWlJPTFUvY0FDTytPTE12dGtNR3BVdUtpNnBSSXl1WHVxY0lKMWNwUHM1OVV1d2V4NEE4MllMRVAvVzNKV3JEL1prYXhVLytXVWVVSDFuQWtzNGRibHlKQUZZcVFKY21iaDBDRHlyREcvbXpneEEyRms4TUNyM0pHbzYvazVWVGgiLCJtYWMiOiJlMmZkMzNhOTNiMGU4ZWU0NTNkM2MzZjIxZTc1YWM0NjNjMDNjMjU2MDM3ODVkM2Q5NmExYWZkZTdlM2Q4ZjFiIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:21 GMT; Max-Age=7199; path=/; samesite=lax; reiyan-store-session=eyJpdiI6Ik5VNXd2MjZRbEh2OHJMMlc5V0tEYlE9PSIsInZhbHVlIjoib1ZsaDZkVHZxS2RrN0RQR3lka1BUbklIc0FnN01zSVNEZkl6ZFJsUFFLY0RoNmFzeVUxVFlTY1pLejY5TlB1UWdaVzBXY25SZHlMcU50L09BODQvMS80OWM0d0ZlQVd6N0V6QnlYK2MyWTEyUTAyN1U3V2tqNXZkczVrNy9CeEYiLCJtYWMiOiIyOGQzZjEyZjhjODhlN2M2NTgyMDRjZDY4MDRiMmRjYzY1MmU3MmFmN2M5MTk0ZjNiMmM2OGUyMTJmMTZjYWJmIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:21 GMT; Max-Age=7199; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETdashboard" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETdashboard"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETdashboard"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETdashboard" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdashboard">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETdashboard" data-method="GET"
      data-path="dashboard"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETdashboard', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETdashboard"
                    onclick="tryItOut('GETdashboard');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETdashboard"
                    onclick="cancelTryOut('GETdashboard');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETdashboard"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>dashboard</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETdashboard"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETdashboard"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETrole">GET role</h2>

<p>
</p>



<span id="example-requests-GETrole">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/role" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/role"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETrole">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IllYbjhNdjlua3FMcEZMM1RXQnhTeXc9PSIsInZhbHVlIjoiOThaQ2VxTVZSa2RPZHdTc0dhZER1N3N0VVE5V25UaDdGbWdIVGpTVE1NWnVYU09wRVRKbUlpcWQrcEVvd3JDZ29qSzhwK0lGb2g5QjVuZWpXRGo0YStvTVQ0WmE3cEpWNlBJVXI0cDRKbXRkOUo4US83MnoyVjZPeUVXUktmUUkiLCJtYWMiOiJmM2JhNTY4NjVhMzM5NWIxZTdlZTAyNGE2YWVhNTRlMDRjOWEzODJkNmE1NmZjOTFmZDA2ZDEyNDA4Yzc4OWM4IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:25 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IjlyQXYyMDVzRkJsSU9LWXlVRjFhYVE9PSIsInZhbHVlIjoiTVN1WjViKzRvaEx3eDEyc3lxN1BqNHJLd0MzU1JZOE50UVcyaDZVTXlJWXAxWlpkZGdWSTJ3QkZlZVBwUkRwR01MY1NXelU4SnAvVEdGdWt5YXZIMGVCRlE2c1BCb050VUZZeW5lS3pHaHJoL1B0V2ZoeURNRjFWMFVsL3hLbSsiLCJtYWMiOiJhNjUzODQzZWMwODM1YTgwNWNlNWM0MGZlOWM5ZGIzYTJjMTAyZDQ0ZWEyZWRlYThhNzZjZTBlYzA2MWY2OGQyIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:25 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETrole" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETrole"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETrole"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETrole" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETrole">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETrole" data-method="GET"
      data-path="role"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETrole', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETrole"
                    onclick="tryItOut('GETrole');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETrole"
                    onclick="cancelTryOut('GETrole');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETrole"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>role</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETrole"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETrole"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTwallet-pin-validation">POST wallet/pin-validation</h2>

<p>
</p>



<span id="example-requests-POSTwallet-pin-validation">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/wallet/pin-validation" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"pin\": 46
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/wallet/pin-validation"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "pin": 46
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTwallet-pin-validation">
</span>
<span id="execution-results-POSTwallet-pin-validation" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTwallet-pin-validation"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTwallet-pin-validation"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTwallet-pin-validation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTwallet-pin-validation">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTwallet-pin-validation" data-method="POST"
      data-path="wallet/pin-validation"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTwallet-pin-validation', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTwallet-pin-validation"
                    onclick="tryItOut('POSTwallet-pin-validation');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTwallet-pin-validation"
                    onclick="cancelTryOut('POSTwallet-pin-validation');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTwallet-pin-validation"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>wallet/pin-validation</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTwallet-pin-validation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTwallet-pin-validation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pin</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="pin"                data-endpoint="POSTwallet-pin-validation"
               value="46"
               data-component="body">
    <br>
<p>Must be at least 6. Example: <code>46</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTnotif--id-">PUT notif/{id}</h2>

<p>
</p>



<span id="example-requests-PUTnotif--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/notif/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"is_read\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/notif/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "is_read": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTnotif--id-">
</span>
<span id="execution-results-PUTnotif--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTnotif--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTnotif--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTnotif--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTnotif--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTnotif--id-" data-method="PUT"
      data-path="notif/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTnotif--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTnotif--id-"
                    onclick="tryItOut('PUTnotif--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTnotif--id-"
                    onclick="cancelTryOut('PUTnotif--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTnotif--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>notif/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTnotif--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTnotif--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTnotif--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the notif. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_read</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="PUTnotif--id-" style="display: none">
            <input type="radio" name="is_read"
                   value="true"
                   data-endpoint="PUTnotif--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTnotif--id-" style="display: none">
            <input type="radio" name="is_read"
                   value="false"
                   data-endpoint="PUTnotif--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
        </form>

                <h1 id="kategori">Kategori</h1>

    <p>API untuk mengelola Kategori</p>

                                <h2 id="kategori-GETkategori">List Kategori
Endpoint ini digunakan untuk mengambil semua data kategori yang aktif.</h2>

<p>
</p>

<p>Cocok digunakan untuk menampilkan menu utama di homepage atau halaman produk.</p>

<span id="example-requests-GETkategori">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/kategori?search=Mobile&amp;limit=10" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/kategori"
);

const params = {
    "search": "Mobile",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETkategori">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6ImIzMWtwbzhYbXB5VnY0SEZmdU1MMnc9PSIsInZhbHVlIjoiRlRpUDJ4NXA4N0N4SWo1ZWlnYUhZZE5wUDdJWDZsaWlLa2M0MXdrK0VUVE9sMXM1LzN2SThpeUc3T1lxQUpvdDNkVjIwMXhpdVQ3WnlRT2J6SkQ4Umtoa1d6eVM3eG02c3Z6WVdDdGxuM2RhMGhnaFlyblZaUXFqUExTZVozU1MiLCJtYWMiOiJjMTZmOTgyM2VhYzUyZGI4Mzc1NjllOGJhZjU1OWJkMDFiN2VlNjE2ZmIzN2YxMmQyOWUzM2Q1OTQ0NDBiNWY5IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:26 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IlNjcmp0RnVUS1Y1aWxseWhyWjdhenc9PSIsInZhbHVlIjoiWldXa0RQWGtndFVUNmR6MERDQTV6QWZTUmtGSGhzSnhxUEUzVm13bzlLWEc2Qksya2ZuU005R0ZPMHhqN1k4UUNLUkJ0Z21RemtOd3pYRVRtSnN3Q1h4ZVFCMmlPVFVNS3lGTkdyV2M1eWYzcVR4ZUxTc3JPVkRtTVhMM2dVTnIiLCJtYWMiOiJlZGU5YWRjMWFiY2VhNWUwZjE2NGMwMzIzZTQyNzg3OTY3YzkwODkxYzUyZThmNmRiZDNmNDI2Y2I2MjE2NzQ1IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:26 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 200,
        &quot;status&quot;: &quot;success&quot;,
        &quot;message&quot;: &quot;data kategori berhasil ditampilkan&quot;
    },
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [],
        &quot;first_page_url&quot;: &quot;http://localhost:8000/kategori?page=1&quot;,
        &quot;from&quot;: null,
        &quot;last_page&quot;: 1,
        &quot;last_page_url&quot;: &quot;http://localhost:8000/kategori?page=1&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/kategori?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: null,
        &quot;path&quot;: &quot;http://localhost:8000/kategori&quot;,
        &quot;per_page&quot;: 10,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: null,
        &quot;total&quot;: 0
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETkategori" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETkategori"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETkategori"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETkategori" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETkategori">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETkategori" data-method="GET"
      data-path="kategori"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETkategori', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETkategori"
                    onclick="tryItOut('GETkategori');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETkategori"
                    onclick="cancelTryOut('GETkategori');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETkategori"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>kategori</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETkategori"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETkategori"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETkategori"
               value="Mobile"
               data-component="query">
    <br>
<p>Mencari kategori berdasarkan nama. Example: <code>Mobile</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETkategori"
               value="10"
               data-component="query">
    <br>
<p>Batasi jumlah data yang tampil. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="kategori-POSTkategori">Tambah Kategori</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan kategori produk baru ke dalam sistem.</p>

<span id="example-requests-POSTkategori">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/kategori" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=Game Top Up"\
    --form "position=4326.41688"\
    --form "image=@/tmp/phpqW2oLw" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/kategori"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'Game Top Up');
body.append('position', '4326.41688');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTkategori">
</span>
<span id="execution-results-POSTkategori" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTkategori"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTkategori"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTkategori" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTkategori">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTkategori" data-method="POST"
      data-path="kategori"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTkategori', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTkategori"
                    onclick="tryItOut('POSTkategori');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTkategori"
                    onclick="cancelTryOut('POSTkategori');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTkategori"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>kategori</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTkategori"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTkategori"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTkategori"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTkategori"
               value="Game Top Up"
               data-component="body">
    <br>
<p>Nama kategori. Example: <code>Game Top Up</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTkategori"
               value=""
               data-component="body">
    <br>
<p>nullable Foto logo kategori (PNG/JPG, max 2MB). Example: <code>/tmp/phpqW2oLw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>position</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="position"                data-endpoint="POSTkategori"
               value="4326.41688"
               data-component="body">
    <br>
<p>Example: <code>4326.41688</code></p>
        </div>
        </form>

                    <h2 id="kategori-PUTkategori--id-">Edit Kategori</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk mengubah kategori produk ke dalam sistem.</p>

<span id="example-requests-PUTkategori--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/kategori/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=Game Top Up"\
    --form "position=4326.41688"\
    --form "image=@/tmp/phpWWiNNK" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/kategori/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'Game Top Up');
body.append('position', '4326.41688');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTkategori--id-">
</span>
<span id="execution-results-PUTkategori--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTkategori--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTkategori--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTkategori--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTkategori--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTkategori--id-" data-method="PUT"
      data-path="kategori/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTkategori--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTkategori--id-"
                    onclick="tryItOut('PUTkategori--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTkategori--id-"
                    onclick="cancelTryOut('PUTkategori--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTkategori--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>kategori/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTkategori--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTkategori--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTkategori--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTkategori--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the kategori. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTkategori--id-"
               value="Game Top Up"
               data-component="body">
    <br>
<p>Nama kategori. Example: <code>Game Top Up</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="PUTkategori--id-"
               value=""
               data-component="body">
    <br>
<p>nullable Foto logo kategori (PNG/JPG, max 2MB). Example: <code>/tmp/phpWWiNNK</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>position</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="position"                data-endpoint="PUTkategori--id-"
               value="4326.41688"
               data-component="body">
    <br>
<p>Example: <code>4326.41688</code></p>
        </div>
        </form>

                    <h2 id="kategori-DELETEkategori--id-">Hapus Kategori</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menghapus kategori produk ke dalam sistem.</p>

<span id="example-requests-DELETEkategori--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/kategori/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/kategori/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEkategori--id-">
</span>
<span id="execution-results-DELETEkategori--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEkategori--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEkategori--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEkategori--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEkategori--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEkategori--id-" data-method="DELETE"
      data-path="kategori/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEkategori--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEkategori--id-"
                    onclick="tryItOut('DELETEkategori--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEkategori--id-"
                    onclick="cancelTryOut('DELETEkategori--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEkategori--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>kategori/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEkategori--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEkategori--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEkategori--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEkategori--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the kategori. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="member-level">Member Level</h1>

    <p>API untuk mengelola User / Pengguna</p>

                                <h2 id="member-level-GETlevel">List User
Endpoint ini digunakan untuk mengambil semua data User.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETlevel">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/level?search=architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/level"
);

const params = {
    "search": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETlevel">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IlBZZ2F0VUYwTkxXa1ZDbFh6OGJyanc9PSIsInZhbHVlIjoiOFFDQ1FtdjRRSHVOL3R6Nm1TR283MEFGWGZNRDZoM0RwRGhPUFhnNDZNT0RBT1ptWlRvVUZjdnd4T3VZbWkwYk5IQXhBUXEzL3E3WHlYR1E5VVpNMmp3WlVUekFpc1J6c2FSQklGR05nQVluSVNHZ3VSb08yRTdKOU1QVU9MU1UiLCJtYWMiOiJiZDA2MTlhOTI1ODBjN2E0NTNhNjBlMjcxMWUxMjJlODMzNWJmMDA2YmYzZDhmZDEzMjc3MzNkYjcyYTQ0MzhlIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:25 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6InRRQ1ZKQ0dVNEZTSzlYVVJ4b3YrUGc9PSIsInZhbHVlIjoiUU9FMmNXY2VZdG4zNVhMVHJMVUpkYWNtZW96WktzWFE1TXkxZVhyU1RxN1pIQ2k3TWZGRGVoM1l3ZE5WTnJHTHptS0JwQ1lKblVpL1QxMSswU1crZXJ6VkpmYU1hWlhSMW56cXRNZHh4QU5vMHRRR0RaYTBFVGlSaU1LRjlYQUoiLCJtYWMiOiIzODU0NjBkYzQ1ZWFkZjY3YWUzOGZmZThjZDgyZTliYWM0OTBkZDQzZTU4NDRkNWFlZmFkZmNiMjI2MGQ0OWVkIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:25 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETlevel" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlevel"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlevel"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETlevel" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlevel">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETlevel" data-method="GET"
      data-path="level"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlevel', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlevel"
                    onclick="tryItOut('GETlevel');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlevel"
                    onclick="cancelTryOut('GETlevel');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlevel"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>level</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETlevel"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETlevel"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETlevel"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETlevel"
               value="architecto"
               data-component="query">
    <br>
<p>Mencari user berdasarkan nama. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="member-level-PUTlevel--id-">Edit Member</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan Member baru ke dalam sistem Reiyan Store.</p>

<span id="example-requests-PUTlevel--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/level/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"markup_type\": \"architecto\",
    \"markup_value\": \"architecto\",
    \"min_threshold\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/level/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "markup_type": "architecto",
    "markup_value": "architecto",
    "min_threshold": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTlevel--id-">
</span>
<span id="execution-results-PUTlevel--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTlevel--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTlevel--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTlevel--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTlevel--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTlevel--id-" data-method="PUT"
      data-path="level/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTlevel--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTlevel--id-"
                    onclick="tryItOut('PUTlevel--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTlevel--id-"
                    onclick="cancelTryOut('PUTlevel--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTlevel--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>level/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTlevel--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTlevel--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTlevel--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTlevel--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the level. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTlevel--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Name. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>markup_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="markup_type"                data-endpoint="PUTlevel--id-"
               value="architecto"
               data-component="body">
    <br>
<p>markup Type. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>markup_value</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="markup_value"                data-endpoint="PUTlevel--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Markup Value. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>min_threshold</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="min_threshold"                data-endpoint="PUTlevel--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Min Order. Example: <code>architecto</code></p>
        </div>
        </form>

                <h1 id="notifikasi">Notifikasi</h1>

    

                                <h2 id="notifikasi-GETnotif">List Notifikasi
Mengambil semua data Notifikasi milik user yang sedang login.
Bisa difilter berdasarkan ID Notifikasi untuk detail, atau search order_id.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETnotif">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/notif?id=16&amp;search=architecto&amp;status=architecto&amp;limit=16" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/notif"
);

const params = {
    "id": "16",
    "search": "architecto",
    "status": "architecto",
    "limit": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETnotif">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6InhRczg0ZXdqdFFjYUxENk9pOEVzbGc9PSIsInZhbHVlIjoicGdRWUcvUU96dVlBamkrMkxqUS9mSU5KVmdHeGRGa0tNUlVYUW82eG9YeGh0bUsxb0E1TTBObmk1ZDJORXNDMG44czNIMHYwbm5xaWhIU05Ga01zQlFNY3NPcUVJcmpWd1ZxdlVHdE9Nb3dvejdNZUk0ZW9YellweHBNVmhsNDIiLCJtYWMiOiJhOTZiMzdkZmU3ZjRlMzg3N2QyMTU0NmVjNWY3NGU4Yjg2ZTQ3NjllMDFkMjBkNjk1MTQyNWViYmIwYjViMjBmIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:28 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6Ikd4Y3VDbXJXNlNGTkxHelhYdk9XaGc9PSIsInZhbHVlIjoieUtOa1FrcXIydGI0VldIb2R0TEVVb21DSzBCQ2hwOVlOR3NHUlR2SUl4aG5HSkNMeHU4VlhwamUxb0I4am9oSjNmU2ZLYjhwUm5sRTBYTmZwaVgvbDF0SW56Y3lOdlp3REVSZlpTVUlzODJDUU8wUUVJUjZUaDhLYzdiOFdiRVIiLCJtYWMiOiJkMTVmZjA5Nzc5MGQxZjNkZDJmMDQ1Nzg0NTE5ZjdkZTcxZDFmNzdlNjg3MjJmY2E5MDE5NmFlMGJhZWFkNTRiIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:28 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETnotif" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETnotif"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETnotif"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETnotif" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETnotif">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETnotif" data-method="GET"
      data-path="notif"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETnotif', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETnotif"
                    onclick="tryItOut('GETnotif');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETnotif"
                    onclick="cancelTryOut('GETnotif');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETnotif"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>notif</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETnotif"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETnotif"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETnotif"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETnotif"
               value="16"
               data-component="query">
    <br>
<p>ID Notifikasi jika ingin mengambil detail satu data. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETnotif"
               value="architecto"
               data-component="query">
    <br>
<p>Cari berdasarkan Order ID. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETnotif"
               value="architecto"
               data-component="query">
    <br>
<p>Cari berdasarkan Status. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETnotif"
               value="16"
               data-component="query">
    <br>
<p>Jumlah data per halaman. Example: <code>16</code></p>
            </div>
                </form>

                <h1 id="payment-method">Payment Method</h1>

    <p>API untuk mengelola Payment Method</p>

                                <h2 id="payment-method-GETpayment-method">List Payment Method
Endpoint ini digunakan untuk mengambil semua data Payment Method.</h2>

<p>
</p>

<p>Cocok digunakan di halaman pembelian produk.</p>

<span id="example-requests-GETpayment-method">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/payment-method?id=16&amp;search=Mobile&amp;is_active=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/payment-method"
);

const params = {
    "id": "16",
    "search": "Mobile",
    "is_active": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETpayment-method">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IjF4TjJ3RVRxWGNaWGZEOU5RTTFMMkE9PSIsInZhbHVlIjoiQ0tRWGhmTzRVR2NBZTBUT0JTNkRnV0szN0YzVjR3TjdqcmE3MVZoLzQ4UldGR1o4N2lXeEYrdzVaK1l0QnR3SjNlM2pnS3dtTGRYc3dVZzh4LzhpQXVxVG8wNVZYMFRTSEFzalZhdktuMUNMQVBIMjVkRlhHOXAzRVJCdnFjaG4iLCJtYWMiOiI1YWNiNTkzZWQ3MWM5ZmVkY2ZlNTQ3YjU0MDc1NTYwYjk4MDA5Njg1NzQ5YjMyZDRjOWI0Mzg1YjM3ZWJhNmQ2IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IlEzcW9jRkR2REszWW1PdWhYVUFKL0E9PSIsInZhbHVlIjoiUGI2bDl3TVpDSXAySElvRnl4NE9xSkN1clByZkNCbTNETGxVVHZhNFFRekQ1aTVyVTg4dkJnTlJ5M2o5SWdiamJrVHplcUxRekJjUmljdCtXTmZ4RmlYOTJ5RnBhNkp2Skk3bUZLVE95d1d2dFdTM3VBWkpEK3FBdGh0anVmTG0iLCJtYWMiOiIzNzIzYjE4ZWVkZWE4MTdlNGQ0NTI4OGI2YTMyOTM4MmE1NjIyZWE0YzgyZGZiZjNkNGNjNjY3ODcwOWExMzkzIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 200,
        &quot;status&quot;: &quot;success&quot;,
        &quot;message&quot;: &quot;data Payment Method berhasil ditampilkan&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETpayment-method" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETpayment-method"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETpayment-method"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETpayment-method" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpayment-method">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETpayment-method" data-method="GET"
      data-path="payment-method"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETpayment-method', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETpayment-method"
                    onclick="tryItOut('GETpayment-method');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETpayment-method"
                    onclick="cancelTryOut('GETpayment-method');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETpayment-method"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>payment-method</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETpayment-method"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETpayment-method"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETpayment-method"
               value="16"
               data-component="query">
    <br>
<p>Mencari Payment Method berdasarkan id. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETpayment-method"
               value="Mobile"
               data-component="query">
    <br>
<p>Mencari Payment Method berdasarkan nama. Example: <code>Mobile</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETpayment-method" style="display: none">
            <input type="radio" name="is_active"
                   value="1"
                   data-endpoint="GETpayment-method"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETpayment-method" style="display: none">
            <input type="radio" name="is_active"
                   value="0"
                   data-endpoint="GETpayment-method"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Mencari Payment Method berdasarkan status aktif. Example: <code>true</code></p>
            </div>
                </form>

                    <h2 id="payment-method-GETpayment-method-admin">List Payment Method admin
Endpoint ini digunakan untuk mengambil semua data Payment Method.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Cocok digunakan di halaman pembelian produk.</p>

<span id="example-requests-GETpayment-method-admin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/payment-method/admin?id=16&amp;search=Mobile&amp;is_active=1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/payment-method/admin"
);

const params = {
    "id": "16",
    "search": "Mobile",
    "is_active": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETpayment-method-admin">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6ImU0WlVnb1BoRFhsSHBMbG1qT2tmT3c9PSIsInZhbHVlIjoiTTJBRUkwdWlzcEtmMXU3d3pualpsNStra3p6eFNoRzBTWTgvNlZVQ1JKZVRCS096NnQvWUZMaTFaaVU5alk3SEFhb1NzKzl1RVlTVVFwdHI2bHZ3cUlwMWZVVnA4MEhOaWVaTHZMeTRVT2tBZWExVGMvbFo0RzRRdHlNOXhlTEUiLCJtYWMiOiI2N2U5YjdlMWRhYmM2MGM1YmIyYTJhNzA0NTE3NDFmZmQ1NzNkYzc4ODQ0OGUzNjE0MmQ5MDg2YTUzMjU0Yjk2IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IjEzZVlpK0hWVVBoN3NuSzF3OXRhVFE9PSIsInZhbHVlIjoiTmxiM2hLbytDVzlXM3RyZU1xY09wMC94MTBBQW9ZUnlSMm8vajAvUzdWZTNMSDZRV3hSY3pqR1ZXZ2hXMVljNzB5WEV2SEFmMUtqaUhZT2RFSitkNnE5Z2NJR2RUUkRlNmc4TXJaUVhQREhsNWt3a1pOZTFXUmNzek9xSHcwVWQiLCJtYWMiOiJkMjNkYmQyMTg0YTUwNDIyZTcyY2Y5ZjQzOWM1MDJhMWMxNzZjY2EwNjI1ZGExOTUwZjU4MzJhNzk5ZDA5YWFiIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETpayment-method-admin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETpayment-method-admin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETpayment-method-admin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETpayment-method-admin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpayment-method-admin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETpayment-method-admin" data-method="GET"
      data-path="payment-method/admin"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETpayment-method-admin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETpayment-method-admin"
                    onclick="tryItOut('GETpayment-method-admin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETpayment-method-admin"
                    onclick="cancelTryOut('GETpayment-method-admin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETpayment-method-admin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>payment-method/admin</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETpayment-method-admin"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETpayment-method-admin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETpayment-method-admin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETpayment-method-admin"
               value="16"
               data-component="query">
    <br>
<p>Mencari Payment Method berdasarkan id. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETpayment-method-admin"
               value="Mobile"
               data-component="query">
    <br>
<p>Mencari Payment Method berdasarkan nama. Example: <code>Mobile</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETpayment-method-admin" style="display: none">
            <input type="radio" name="is_active"
                   value="1"
                   data-endpoint="GETpayment-method-admin"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETpayment-method-admin" style="display: none">
            <input type="radio" name="is_active"
                   value="0"
                   data-endpoint="GETpayment-method-admin"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Mencari Payment Method berdasarkan status aktif. Example: <code>true</code></p>
            </div>
                </form>

                    <h2 id="payment-method-POSTpayment-method">Tambah Payment Method</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan Payment Method baru ke dalam sistem.</p>

<span id="example-requests-POSTpayment-method">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/payment-method" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=Dana Transfer"\
    --form "category=E-Wallet"\
    --form "code=DANA_TF"\
    --form "gateway=duitku"\
    --form "fee=1500"\
    --form "is_active=1"\
    --form "image=@/tmp/phpzv0CFa" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/payment-method"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'Dana Transfer');
body.append('category', 'E-Wallet');
body.append('code', 'DANA_TF');
body.append('gateway', 'duitku');
body.append('fee', '1500');
body.append('is_active', '1');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTpayment-method">
</span>
<span id="execution-results-POSTpayment-method" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTpayment-method"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTpayment-method"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTpayment-method" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpayment-method">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTpayment-method" data-method="POST"
      data-path="payment-method"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTpayment-method', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTpayment-method"
                    onclick="tryItOut('POSTpayment-method');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTpayment-method"
                    onclick="cancelTryOut('POSTpayment-method');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTpayment-method"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>payment-method</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTpayment-method"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTpayment-method"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTpayment-method"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTpayment-method"
               value="Dana Transfer"
               data-component="body">
    <br>
<p>Nama payment gateway (ex: Mandiri, Dana). Example: <code>Dana Transfer</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTpayment-method"
               value="E-Wallet"
               data-component="body">
    <br>
<p>category Category gateway (Contoh: E-Wallet, VA, Retail). Example: <code>E-Wallet</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTpayment-method"
               value="DANA_TF"
               data-component="body">
    <br>
<p>Kode unik gateway. Example: <code>DANA_TF</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gateway</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gateway"                data-endpoint="POSTpayment-method"
               value="duitku"
               data-component="body">
    <br>
<p>Tipe vendor gateway (Midtrans/Duitku). Example: <code>duitku</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fee</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fee"                data-endpoint="POSTpayment-method"
               value="1500"
               data-component="body">
    <br>
<p>Biaya admin dalam angka. Example: <code>1500</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTpayment-method" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTpayment-method"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTpayment-method" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTpayment-method"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status aktif (1 atau 0). Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTpayment-method"
               value=""
               data-component="body">
    <br>
<p>Logo gateway (Max: 2MB, Format: png,jpg,jpeg,webp). Example: <code>/tmp/phpzv0CFa</code></p>
        </div>
        </form>

                    <h2 id="payment-method-PUTpayment-method--id-">Edit Payment Method</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk mengubah Payment Method web ke dalam sistem.</p>

<span id="example-requests-PUTpayment-method--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/payment-method/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=Dana Transfer"\
    --form "code=DANA_TF"\
    --form "gateway=duitku"\
    --form "fee=1500"\
    --form "is_active=1"\
    --form "image=@/tmp/php3kMLrE" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/payment-method/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'Dana Transfer');
body.append('code', 'DANA_TF');
body.append('gateway', 'duitku');
body.append('fee', '1500');
body.append('is_active', '1');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTpayment-method--id-">
</span>
<span id="execution-results-PUTpayment-method--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTpayment-method--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTpayment-method--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTpayment-method--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTpayment-method--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTpayment-method--id-" data-method="PUT"
      data-path="payment-method/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTpayment-method--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTpayment-method--id-"
                    onclick="tryItOut('PUTpayment-method--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTpayment-method--id-"
                    onclick="cancelTryOut('PUTpayment-method--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTpayment-method--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>payment-method/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTpayment-method--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTpayment-method--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTpayment-method--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTpayment-method--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the payment method. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTpayment-method--id-"
               value="Dana Transfer"
               data-component="body">
    <br>
<p>Nama payment gateway (ex: Mandiri, Dana). Example: <code>Dana Transfer</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="PUTpayment-method--id-"
               value="DANA_TF"
               data-component="body">
    <br>
<p>Kode unik gateway. Example: <code>DANA_TF</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gateway</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gateway"                data-endpoint="PUTpayment-method--id-"
               value="duitku"
               data-component="body">
    <br>
<p>Tipe vendor gateway (Midtrans/Duitku). Example: <code>duitku</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fee</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fee"                data-endpoint="PUTpayment-method--id-"
               value="1500"
               data-component="body">
    <br>
<p>Biaya admin dalam angka. Example: <code>1500</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="PUTpayment-method--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTpayment-method--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTpayment-method--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTpayment-method--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status aktif (1 atau 0). Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="PUTpayment-method--id-"
               value=""
               data-component="body">
    <br>
<p>Logo gateway (Max: 2MB, Format: png,jpg,jpeg,webp). Example: <code>/tmp/php3kMLrE</code></p>
        </div>
        </form>

                    <h2 id="payment-method-DELETEpayment-method--id-">Hapus Payment Method</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menghapus Payment Method produk ke dalam sistem.</p>

<span id="example-requests-DELETEpayment-method--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/payment-method/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/payment-method/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEpayment-method--id-">
</span>
<span id="execution-results-DELETEpayment-method--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEpayment-method--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEpayment-method--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEpayment-method--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEpayment-method--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEpayment-method--id-" data-method="DELETE"
      data-path="payment-method/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEpayment-method--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEpayment-method--id-"
                    onclick="tryItOut('DELETEpayment-method--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEpayment-method--id-"
                    onclick="cancelTryOut('DELETEpayment-method--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEpayment-method--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>payment-method/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEpayment-method--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEpayment-method--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEpayment-method--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEpayment-method--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the payment method. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="produk">Produk</h1>

    <p>API untuk mengelola Produk</p>

                                <h2 id="produk-GETproduk">List Produk
Endpoint ini digunakan untuk mengambil semua data Produk yang aktif.</h2>

<p>
</p>

<p>Cocok digunakan untuk menampilkan menu utama di homepage atau halaman produk.</p>

<span id="example-requests-GETproduk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/produk?search=architecto&amp;kategori_id=16&amp;slug=architecto&amp;limit=16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/produk"
);

const params = {
    "search": "architecto",
    "kategori_id": "16",
    "slug": "architecto",
    "limit": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETproduk">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IlQxemhJREdOaDZ3bWZ4RjBwNys2WlE9PSIsInZhbHVlIjoiTGpaODhja1pTUGcyVjFWcy9SQ2ZzeVFmUm9qTG9MNjF0Nlk0dDJ3LzE0WkZKdE5ySmJDU0pNcERIelcyZEtjcVAyVnNqYloyY0tta3hFUlRGcEg1Wk16SmpuYlR5a2xaR2VYeVpkRFhCR2U2UXhRT1I4Mk51TCtwQURxRnpZekEiLCJtYWMiOiIyMzUzYjA0NGZjNDM1NDgwMDZjNmFmM2M5NDRjNjZhZGVhOTYxYjNkY2NkYTgwMzk2OTc1ZTZkMzhlYTIzMzYwIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:26 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IlZpM1pOU2l2VjJpWWxpV3NaV2tDZ2c9PSIsInZhbHVlIjoiTTQ1TkR3WHptekI1WEFtalFrQ3JlRzlTbmNtMlJjUEg3c2tXRUFiYkppN2liR004WjRVR3dhZ1EwOWhueTNXVlNULzZoMWNDanlYWUtVS3NVWDhFWkVxeTAvb3NQWnpSM3JNZ3plajRxTHZXWCtGSjBHR3daUHNYZGhhNE5veGMiLCJtYWMiOiJiMmM3NTA2MzM2NmUwOTk0M2U1NGQzN2FkZTUyNzM0ZjgyMGNjMGI4NWI5NDI4YWM5ZmZjMTIxNjM0ZjkxMmM0IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:26 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 200,
        &quot;status&quot;: &quot;success&quot;,
        &quot;message&quot;: &quot;data produk berhasil ditampilkan&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETproduk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETproduk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETproduk"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETproduk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETproduk">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETproduk" data-method="GET"
      data-path="produk"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETproduk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETproduk"
                    onclick="tryItOut('GETproduk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETproduk"
                    onclick="cancelTryOut('GETproduk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETproduk"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>produk</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETproduk"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETproduk"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETproduk"
               value="architecto"
               data-component="query">
    <br>
<p>Mencari Produk berdasarkan nama. Example: Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>kategori_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="kategori_id"                data-endpoint="GETproduk"
               value="16"
               data-component="query">
    <br>
<p>Mencari Produk berdasarkan katergori. Example: Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="GETproduk"
               value="architecto"
               data-component="query">
    <br>
<p>Mencari Produk berdasarkan slug. Example: Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETproduk"
               value="16"
               data-component="query">
    <br>
<p>Batasi jumlah data yang tampil. Example: Example: <code>16</code></p>
            </div>
                </form>

                    <h2 id="produk-GETproduk--slug-">Show Daftar Harga
Endpoint ini digunakan untuk mengambil data Produk yang aktif berdasarkan slug.</h2>

<p>
</p>

<p>Cocok digunakan untuk menampilkan menu utama di homepage atau halaman produk.</p>

<span id="example-requests-GETproduk--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/produk/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/produk/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETproduk--slug-">
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6ImVXV2VjMUhoWm94R1dWU2Z5b3JkSWc9PSIsInZhbHVlIjoiVzhZMzByTW1OeVRSeHRDWmgvNzJ4VUM5MHk5ZWZadkk0bVREWEdFcDBGOGZSdjk2UG1XaXdZRGV5Q2lyRHcwSmdJTDlieGkxT2NUZDE2dnNvMHFFYVpnbGpkczlpcTRhOEdxWGl1OVE2UjZ0b1BGbmZaQUdxSTRXVklHZHVLN28iLCJtYWMiOiJkYjQwYWViNWFmOGEyNTE1N2ZmMTBjYmQyOTkwMGJlNzQwZmJmYmZlNTA4ZWIxYjJhNGU4MGY1ZmQzNmFlMWEzIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:26 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IlZQUEhTbTFDL0gzUDNVajMvYUUzZnc9PSIsInZhbHVlIjoiUUlvSU52VHVNQ29ldFpoTnBZdEVpWDRORkdndmFCWVdTbm1MZGJoZ09VdFhzWEJZZmk0VzJzNFVHcHlHVUhBaEl0cXJ1RVBhOVY4K1FEbExHazZBZkhaMEZ3TEZCY2NORlhrcWFpYlhkbEpUcHNuNXlIR1dJWEhFUVJGMUlzVmQiLCJtYWMiOiI0NTE2ZTUxYmVjYTY0NzU4MDM0Y2Y3ODZmYWVkZjdhNWViZjExNTVkYzM2OWYwYTZkMjBjOTM2ZDI5MGM3YWEyIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:26 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 400,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Attempt to read property \&quot;layanan\&quot; on null&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETproduk--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETproduk--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETproduk--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETproduk--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETproduk--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETproduk--slug-" data-method="GET"
      data-path="produk/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETproduk--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETproduk--slug-"
                    onclick="tryItOut('GETproduk--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETproduk--slug-"
                    onclick="cancelTryOut('GETproduk--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETproduk--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>produk/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETproduk--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETproduk--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="GETproduk--slug-"
               value="architecto"
               data-component="url">
    <br>
<p>The slug of the produk. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="produk-POSTproduk-check-username--id-">Cek Validasi ID Game
Endpoint ini digunakan untuk memvalidasi user ID dan server ID sebelum melakukan transaksi.</h2>

<p>
</p>

<p>Aturan validasi (required/nullable) akan berubah secara dinamis tergantung pada pengaturan produk:</p>
<ul>
<li>Jika <code>is_check_id</code> aktif, maka <code>user_id</code> wajib diisi.</li>
<li>Jika <code>is_check_server</code> aktif, maka <code>server_id</code> wajib diisi.</li>
</ul>

<span id="example-requests-POSTproduk-check-username--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/produk/check-username/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": \"12345678\",
    \"server_id\": \"8821\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/produk/check-username/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "12345678",
    "server_id": "8821"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTproduk-check-username--id-">
</span>
<span id="execution-results-POSTproduk-check-username--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTproduk-check-username--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTproduk-check-username--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTproduk-check-username--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTproduk-check-username--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTproduk-check-username--id-" data-method="POST"
      data-path="produk/check-username/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTproduk-check-username--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTproduk-check-username--id-"
                    onclick="tryItOut('POSTproduk-check-username--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTproduk-check-username--id-"
                    onclick="cancelTryOut('POSTproduk-check-username--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTproduk-check-username--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>produk/check-username/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTproduk-check-username--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTproduk-check-username--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTproduk-check-username--id-"
               value="1"
               data-component="url">
    <br>
<p>Required ID Produk yang ingin dicek. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_id"                data-endpoint="POSTproduk-check-username--id-"
               value="12345678"
               data-component="body">
    <br>
<p>ID User dari game. Required jika produk membutuhkan validasi ID. Example: <code>12345678</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>server_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="server_id"                data-endpoint="POSTproduk-check-username--id-"
               value="8821"
               data-component="body">
    <br>
<p>ID Server dari game. Required jika produk membutuhkan validasi Server. Example: <code>8821</code></p>
        </div>
        </form>

                    <h2 id="produk-POSTproduk-payment">Checkout Top Up
Endpoint ini digunakan untuk membuat pesanan top up (Game, Pulsa, E-Wallet).</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Sistem akan memvalidasi stok produk, menghitung harga (termasuk diskon voucher),
dan mengembalikan URL pembayaran Snap Invoice Duitku.</p>

<span id="example-requests-POSTproduk-payment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/produk/payment" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"service_id\": 1,
    \"produk_id\": 45,
    \"payment_id\": 2,
    \"voucher_id\": 5,
    \"target\": \"architecto\",
    \"server_id\": \"architecto\",
    \"nick_name\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/produk/payment"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "service_id": 1,
    "produk_id": 45,
    "payment_id": 2,
    "voucher_id": 5,
    "target": "architecto",
    "server_id": "architecto",
    "nick_name": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTproduk-payment">
</span>
<span id="execution-results-POSTproduk-payment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTproduk-payment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTproduk-payment"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTproduk-payment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTproduk-payment">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTproduk-payment" data-method="POST"
      data-path="produk/payment"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTproduk-payment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTproduk-payment"
                    onclick="tryItOut('POSTproduk-payment');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTproduk-payment"
                    onclick="cancelTryOut('POSTproduk-payment');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTproduk-payment"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>produk/payment</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTproduk-payment"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTproduk-payment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTproduk-payment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>service_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="service_id"                data-endpoint="POSTproduk-payment"
               value="1"
               data-component="body">
    <br>
<p>ID dari layanan yang dipilih (contoh: Pulsa, Game, dll). Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>produk_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="produk_id"                data-endpoint="POSTproduk-payment"
               value="45"
               data-component="body">
    <br>
<p>ID produk yang ingin dibeli. Example: <code>45</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="payment_id"                data-endpoint="POSTproduk-payment"
               value="2"
               data-component="body">
    <br>
<p>ID metode pembayaran (Midtrans, Duitku, dll). Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>voucher_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="voucher_id"                data-endpoint="POSTproduk-payment"
               value="5"
               data-component="body">
    <br>
<p>ID voucher jika tersedia. Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>target</code></b>&nbsp;&nbsp;
<small>No</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="target"                data-endpoint="POSTproduk-payment"
               value="architecto"
               data-component="body">
    <br>
<p>ID Game / No HP. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>server_id</code></b>&nbsp;&nbsp;
<small>No</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="server_id"                data-endpoint="POSTproduk-payment"
               value="architecto"
               data-component="body">
    <br>
<p>Server. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nick_name</code></b>&nbsp;&nbsp;
<small>Nickname</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nick_name"                data-endpoint="POSTproduk-payment"
               value="architecto"
               data-component="body">
    <br>
<p>Game. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="produk-GETproduk-list-harga--slug-">List Daftar Harga
Endpoint ini digunakan untuk mengambil semua data Harga Dari Provider yang aktif.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETproduk-list-harga--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/produk/list-harga/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/produk/list-harga/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETproduk-list-harga--slug-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IldWYkNZbGI2NjR6eWtPc1JWOVpTR0E9PSIsInZhbHVlIjoiSTBuckV3Yk9GNU5wYW5nU2VUdVUrTFR2TWZjREprM05NMU40V1BWTHMxdllNV29PakZHVFJ5a2JVc0RGUWNSbThMbFVMekxPYXRrdVZ0MlA1ZjBmT0h2emtEZDB0Y0MxWEhjTWtWRE5qY1BZWUU3Z3gxYUw2THFuYlF2ZDlYSWUiLCJtYWMiOiI3NjliMjI2MTI5ZmMzZGJkYzI0OWU3N2JmZDYzZmUwZmIyMjM2YmExZWM1NTAwMmE5MzEyMTZhZTdjODg0MDAxIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:26 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6Ik4weEF6K1Y4Y1dDbyszZ2x0a1dPYVE9PSIsInZhbHVlIjoiMWNqMC9Iem93MUtFUlo5UE8wYlZQbU02b1huQWFObEJIa3Y1L3N3UGhCN1l1U2RLN216NmFpd1NoVEo2bTFVcElETHdkRkN6dlJnU2VpVk9xYzY2dzJscGoxQjBFTUROTmxxcHlCT09MNlZneENpd1MyTFNwQTJXSGtaUU16Z2MiLCJtYWMiOiIyNDM5MDI3ZTY2ODc3MjZlYzFkNTlmZDI2MGE1YjVjMWZhZDEyYTEzMDhiYjA0NzU3YzdmOTI1YWE0ZjRhNTM0IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:26 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETproduk-list-harga--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETproduk-list-harga--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETproduk-list-harga--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETproduk-list-harga--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETproduk-list-harga--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETproduk-list-harga--slug-" data-method="GET"
      data-path="produk/list-harga/{slug}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETproduk-list-harga--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETproduk-list-harga--slug-"
                    onclick="tryItOut('GETproduk-list-harga--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETproduk-list-harga--slug-"
                    onclick="cancelTryOut('GETproduk-list-harga--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETproduk-list-harga--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>produk/list-harga/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETproduk-list-harga--slug-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETproduk-list-harga--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETproduk-list-harga--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="GETproduk-list-harga--slug-"
               value="architecto"
               data-component="url">
    <br>
<p>The slug of the list harga. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="produk-POSTproduk">Tambah Produk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan produk baru ke dalam sistem Reiyan Store.
Pastikan upload menggunakan format multipart/form-data karena menyertakan file image.</p>

<span id="example-requests-POSTproduk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/produk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "categori_id=1"\
    --form "provider_id=1"\
    --form "name=Mobile Legends"\
    --form "brand=Monton"\
    --form "code=Mobile Legend"\
    --form "deskripsi=aybyznkfbqoezonyqoewjbrzzabxblgvzzddqnfsrkycqdnhzrktyiixxfimbnlcqpsktxrjtq"\
    --form "is_check_id=1"\
    --form "is_check_server=1"\
    --form "is_check_name="\
    --form "faq[][question]=Bagaimana cara topup?"\
    --form "faq[][answer]=Masukkan ID dan pilih nominal."\
    --form "logo=@/tmp/phpRhd387" \
    --form "banner=@/tmp/phpnrvHFG" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/produk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('categori_id', '1');
body.append('provider_id', '1');
body.append('name', 'Mobile Legends');
body.append('brand', 'Monton');
body.append('code', 'Mobile Legend');
body.append('deskripsi', 'aybyznkfbqoezonyqoewjbrzzabxblgvzzddqnfsrkycqdnhzrktyiixxfimbnlcqpsktxrjtq');
body.append('is_check_id', '1');
body.append('is_check_server', '1');
body.append('is_check_name', '');
body.append('faq[][question]', 'Bagaimana cara topup?');
body.append('faq[][answer]', 'Masukkan ID dan pilih nominal.');
body.append('logo', document.querySelector('input[name="logo"]').files[0]);
body.append('banner', document.querySelector('input[name="banner"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTproduk">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;status&quot;: &quot;success&quot;,
&quot;message&quot;: &quot;produk berhasil ditambahkan&quot;,
&quot;data&quot;: { &quot;id&quot;: 1, &quot;name&quot;: &quot;Mobile Legends&quot;, ... }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTproduk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTproduk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTproduk"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTproduk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTproduk">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTproduk" data-method="POST"
      data-path="produk"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTproduk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTproduk"
                    onclick="tryItOut('POSTproduk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTproduk"
                    onclick="cancelTryOut('POSTproduk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTproduk"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>produk</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTproduk"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTproduk"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTproduk"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>categori_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="categori_id"                data-endpoint="POSTproduk"
               value="1"
               data-component="body">
    <br>
<p>ID Kategori dari tabel categories. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>provider_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="provider_id"                data-endpoint="POSTproduk"
               value="1"
               data-component="body">
    <br>
<p>ID Provider dari tabel providers. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTproduk"
               value="Mobile Legends"
               data-component="body">
    <br>
<p>Nama Produk. Example: <code>Mobile Legends</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>brand</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="brand"                data-endpoint="POSTproduk"
               value="Monton"
               data-component="body">
    <br>
<p>brand produk untuk sistem. Example: <code>Monton</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTproduk"
               value="Mobile Legend"
               data-component="body">
    <br>
<p>Kode unik produk untuk sistem. Example: <code>Mobile Legend</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deskripsi"                data-endpoint="POSTproduk"
               value="aybyznkfbqoezonyqoewjbrzzabxblgvzzddqnfsrkycqdnhzrktyiixxfimbnlcqpsktxrjtq"
               data-component="body">
    <br>
<p>Must be at least 3 characters. Example: <code>aybyznkfbqoezonyqoewjbrzzabxblgvzzddqnfsrkycqdnhzrktyiixxfimbnlcqpsktxrjtq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="logo"                data-endpoint="POSTproduk"
               value=""
               data-component="body">
    <br>
<p>Foto logo produk (PNG/JPG/WEBP, max 2MB). Example: <code>/tmp/phpRhd387</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>banner</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="banner"                data-endpoint="POSTproduk"
               value=""
               data-component="body">
    <br>
<p>Foto banner produk (PNG/JPG/WEBP, max 2MB). Example: <code>/tmp/phpnrvHFG</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_check_id</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTproduk" style="display: none">
            <input type="radio" name="is_check_id"
                   value="true"
                   data-endpoint="POSTproduk"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTproduk" style="display: none">
            <input type="radio" name="is_check_id"
                   value="false"
                   data-endpoint="POSTproduk"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>msaukuan id game. Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_check_server</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTproduk" style="display: none">
            <input type="radio" name="is_check_server"
                   value="true"
                   data-endpoint="POSTproduk"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTproduk" style="display: none">
            <input type="radio" name="is_check_server"
                   value="false"
                   data-endpoint="POSTproduk"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>msaukuan server game. Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_check_name</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTproduk" style="display: none">
            <input type="radio" name="is_check_name"
                   value="true"
                   data-endpoint="POSTproduk"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTproduk" style="display: none">
            <input type="radio" name="is_check_name"
                   value="false"
                   data-endpoint="POSTproduk"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>msaukuan name pengguna. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>faq</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Daftar FAQ.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>question</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="faq.0.question"                data-endpoint="POSTproduk"
               value="Bagaimana cara topup?"
               data-component="body">
    <br>
<p>Pertanyaan FAQ. Example: <code>Bagaimana cara topup?</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>answer</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="faq.0.answer"                data-endpoint="POSTproduk"
               value="Masukkan ID dan pilih nominal."
               data-component="body">
    <br>
<p>Jawaban FAQ. Example: <code>Masukkan ID dan pilih nominal.</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="produk-POSTproduk-layanan--id-">Update Harga Produk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk mengupdate harga provider dan harga member (Gold, Silver, Bronze).</p>

<span id="example-requests-POSTproduk-layanan--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/produk/layanan/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"code\": \"FFMAX80-S888\",
    \"price_provider\": \"15000\",
    \"is_publish\": true,
    \"member_price\": {
        \"gold\": \"16500\",
        \"bronze\": \"17500\",
        \"silver\": \"17000\"
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/produk/layanan/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "FFMAX80-S888",
    "price_provider": "15000",
    "is_publish": true,
    "member_price": {
        "gold": "16500",
        "bronze": "17500",
        "silver": "17000"
    }
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTproduk-layanan--id-">
</span>
<span id="execution-results-POSTproduk-layanan--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTproduk-layanan--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTproduk-layanan--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTproduk-layanan--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTproduk-layanan--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTproduk-layanan--id-" data-method="POST"
      data-path="produk/layanan/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTproduk-layanan--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTproduk-layanan--id-"
                    onclick="tryItOut('POSTproduk-layanan--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTproduk-layanan--id-"
                    onclick="cancelTryOut('POSTproduk-layanan--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTproduk-layanan--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>produk/layanan/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTproduk-layanan--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTproduk-layanan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTproduk-layanan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTproduk-layanan--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the layanan. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTproduk-layanan--id-"
               value="FFMAX80-S888"
               data-component="body">
    <br>
<p>Required. code produk. Example: <code>FFMAX80-S888</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price_provider</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="price_provider"                data-endpoint="POSTproduk-layanan--id-"
               value="15000"
               data-component="body">
    <br>
<p>Required. Harga beli dari provider. Example: <code>15000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_publish</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTproduk-layanan--id-" style="display: none">
            <input type="radio" name="is_publish"
                   value="true"
                   data-endpoint="POSTproduk-layanan--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTproduk-layanan--id-" style="display: none">
            <input type="radio" name="is_publish"
                   value="false"
                   data-endpoint="POSTproduk-layanan--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Required. Status publikasi produk (true/false). Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>member_price</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>
<p>Required. Data harga untuk tiap level member.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>gold</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="member_price.gold"                data-endpoint="POSTproduk-layanan--id-"
               value="16500"
               data-component="body">
    <br>
<p>Required. Harga untuk member level Gold. Example: <code>16500</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>bronze</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="member_price.bronze"                data-endpoint="POSTproduk-layanan--id-"
               value="17500"
               data-component="body">
    <br>
<p>Required. Harga untuk member level Bronze. Example: <code>17500</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>silver</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="member_price.silver"                data-endpoint="POSTproduk-layanan--id-"
               value="17000"
               data-component="body">
    <br>
<p>Required. Harga untuk member level Silver. Example: <code>17000</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="produk-PUTproduk--id-">Update Produk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk mengubah produk ke dalam sistem Reiyan Store.
Pastikan upload menggunakan format multipart/form-data karena menyertakan file image.</p>

<span id="example-requests-PUTproduk--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/produk/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "categori_id=1"\
    --form "provider_id=1"\
    --form "name=Mobile Legends"\
    --form "code=hmobilelegend"\
    --form "deskripsi=hqziqvndjouolkgssaaypacbpeaybeqdpmkbfywhzmitnadsmrvbekdxdemofrggdrzcntxpvf"\
    --form "brand=Monton"\
    --form "is_check_id=1"\
    --form "is_check_server=1"\
    --form "is_check_name="\
    --form "faq[][id]=architecto"\
    --form "faq[][question]=architecto"\
    --form "faq[][answer]=architecto"\
    --form "logo=@/tmp/phppAAyPp" \
    --form "banner=@/tmp/phpr8Mcsk" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/produk/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('categori_id', '1');
body.append('provider_id', '1');
body.append('name', 'Mobile Legends');
body.append('code', 'hmobilelegend');
body.append('deskripsi', 'hqziqvndjouolkgssaaypacbpeaybeqdpmkbfywhzmitnadsmrvbekdxdemofrggdrzcntxpvf');
body.append('brand', 'Monton');
body.append('is_check_id', '1');
body.append('is_check_server', '1');
body.append('is_check_name', '');
body.append('faq[][id]', 'architecto');
body.append('faq[][question]', 'architecto');
body.append('faq[][answer]', 'architecto');
body.append('logo', document.querySelector('input[name="logo"]').files[0]);
body.append('banner', document.querySelector('input[name="banner"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTproduk--id-">
</span>
<span id="execution-results-PUTproduk--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTproduk--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTproduk--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTproduk--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTproduk--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTproduk--id-" data-method="PUT"
      data-path="produk/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTproduk--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTproduk--id-"
                    onclick="tryItOut('PUTproduk--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTproduk--id-"
                    onclick="cancelTryOut('PUTproduk--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTproduk--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>produk/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTproduk--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTproduk--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTproduk--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTproduk--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the produk. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>categori_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="categori_id"                data-endpoint="PUTproduk--id-"
               value="1"
               data-component="body">
    <br>
<p>ID Kategori dari tabel categories. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>provider_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="provider_id"                data-endpoint="PUTproduk--id-"
               value="1"
               data-component="body">
    <br>
<p>ID Provider dari tabel providers. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTproduk--id-"
               value="Mobile Legends"
               data-component="body">
    <br>
<p>Nama Produk. Example: <code>Mobile Legends</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="PUTproduk--id-"
               value="hmobilelegend"
               data-component="body">
    <br>
<p>Kode unik produk untuk sistem. Example: <code>hmobilelegend</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deskripsi"                data-endpoint="PUTproduk--id-"
               value="hqziqvndjouolkgssaaypacbpeaybeqdpmkbfywhzmitnadsmrvbekdxdemofrggdrzcntxpvf"
               data-component="body">
    <br>
<p>Must be at least 3 characters. Example: <code>hqziqvndjouolkgssaaypacbpeaybeqdpmkbfywhzmitnadsmrvbekdxdemofrggdrzcntxpvf</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>brand</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="brand"                data-endpoint="PUTproduk--id-"
               value="Monton"
               data-component="body">
    <br>
<p>brand produk untuk sistem. Example: <code>Monton</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="logo"                data-endpoint="PUTproduk--id-"
               value=""
               data-component="body">
    <br>
<p>Foto logo produk (PNG/JPG/WEBP, max 2MB). Example: <code>/tmp/phppAAyPp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>banner</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="banner"                data-endpoint="PUTproduk--id-"
               value=""
               data-component="body">
    <br>
<p>Foto banner produk (PNG/JPG/WEBP, max 2MB). Example: <code>/tmp/phpr8Mcsk</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_check_id</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="PUTproduk--id-" style="display: none">
            <input type="radio" name="is_check_id"
                   value="true"
                   data-endpoint="PUTproduk--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTproduk--id-" style="display: none">
            <input type="radio" name="is_check_id"
                   value="false"
                   data-endpoint="PUTproduk--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>msaukuan id game. Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_check_server</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="PUTproduk--id-" style="display: none">
            <input type="radio" name="is_check_server"
                   value="true"
                   data-endpoint="PUTproduk--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTproduk--id-" style="display: none">
            <input type="radio" name="is_check_server"
                   value="false"
                   data-endpoint="PUTproduk--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>msaukuan server game. Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_check_name</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="PUTproduk--id-" style="display: none">
            <input type="radio" name="is_check_name"
                   value="true"
                   data-endpoint="PUTproduk--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTproduk--id-" style="display: none">
            <input type="radio" name="is_check_name"
                   value="false"
                   data-endpoint="PUTproduk--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>msaukuan name pengguna. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>faq</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Daftar FAQ.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="faq.0.id"                data-endpoint="PUTproduk--id-"
               value="architecto"
               data-component="body">
    <br>
<p>id. Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>question</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="faq.0.question"                data-endpoint="PUTproduk--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Pertanyaan. Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>answer</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="faq.0.answer"                data-endpoint="PUTproduk--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Jawaban.</p>
<ul>
<li>@response 201 {
&quot;status&quot;: &quot;success&quot;,
&quot;message&quot;: &quot;produk berhasil diupdate&quot;,
&quot;data&quot;: { &quot;id&quot;: 1, &quot;name&quot;: &quot;Mobile Legends&quot;, ... }
} Example: <code>architecto</code></li>
</ul>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="produk-DELETEproduk--id-">Hapus Produk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menghapus Produk ke dalam sistem.</p>

<span id="example-requests-DELETEproduk--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/produk/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/produk/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEproduk--id-">
</span>
<span id="execution-results-DELETEproduk--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEproduk--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEproduk--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEproduk--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEproduk--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEproduk--id-" data-method="DELETE"
      data-path="produk/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEproduk--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEproduk--id-"
                    onclick="tryItOut('DELETEproduk--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEproduk--id-"
                    onclick="cancelTryOut('DELETEproduk--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEproduk--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>produk/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEproduk--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEproduk--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEproduk--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEproduk--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the produk. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="provider">Provider</h1>

    <p>API untuk mengelola Provider Reiyan Store</p>

                                <h2 id="provider-GETprovider">List provider
Endpoint ini digunakan untuk mengambil semua data provider yang aktif.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETprovider">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/provider?search=Mobile&amp;limit=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/provider"
);

const params = {
    "search": "Mobile",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETprovider">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6InVDK25PcXRmdEgzUFNZc0c2S210c2c9PSIsInZhbHVlIjoiSUNUdVE2d1hkSVU4NXdleVgza1FPMUY0RFMrZG5RcUs0cERpSzU0TXgrSkNkTEJkVzcrVnF3VE1VZlE0ckFRUU5iZ0pRYzVydVVXcjQ2WlI1aThlVldXL25tUm5IYkNyc05KYnlQLzR4NnJBR0gzNmtqbEkvS0NTUk1kbWhrOHkiLCJtYWMiOiJhZjg1MWRhOTQ1ODY3NzM1MDY2ZWI3ZWM0Njc3ZmIzZmQ4YTExMWNmNWFiYTRjMDQwZWVmNzgyYjlhOWJlMWM5IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:26 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IkdFWDFxKzZLcU5vQVMzMjRCdE15aGc9PSIsInZhbHVlIjoiNHZNbFg2WHc1eHZBRjVydUhJbWFDMms5ZnpRU1Q4SFhPUzdMRitXVXRKcktZMGgyQUZXOXVaQStuM1BCYnNxMldIMGtZbE9tQ1UzNFdsclFVTmF6WWgwYkw3UVp3QzE0VlJHUVp1Q1dMRnVWQnNXZ1R6VFhyRDJiajJ3ckE3bmoiLCJtYWMiOiJjZTA4NDYxNjgwZmUyNGEzNjQzNzg1MmE5NmE4OGZhMGM0MmE2OTRmODBlNDczM2JjN2ViZDFkOWY3MDgyYjJhIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:26 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETprovider" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETprovider"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETprovider"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETprovider" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETprovider">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETprovider" data-method="GET"
      data-path="provider"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETprovider', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETprovider"
                    onclick="tryItOut('GETprovider');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETprovider"
                    onclick="cancelTryOut('GETprovider');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETprovider"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>provider</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETprovider"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETprovider"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETprovider"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETprovider"
               value="Mobile"
               data-component="query">
    <br>
<p>Mencari provider berdasarkan nama. Example: <code>Mobile</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETprovider"
               value="10"
               data-component="query">
    <br>
<p>Batasi jumlah data yang tampil. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="provider-PUTprovider--id-">Edit provider</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk mengubah provider produk ke dalam sistem.</p>

<span id="example-requests-PUTprovider--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/provider/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Postpaid\",
    \"driver\": \"App\\\\Services\\\\MobilepulsaService\",
    \"is_active\": \"true\",
    \"payload\": {
        \"url\": \"http:\\/\\/bailey.com\\/\"
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/provider/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Postpaid",
    "driver": "App\\Services\\MobilepulsaService",
    "is_active": "true",
    "payload": {
        "url": "http:\/\/bailey.com\/"
    }
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTprovider--id-">
</span>
<span id="execution-results-PUTprovider--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTprovider--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTprovider--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTprovider--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTprovider--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTprovider--id-" data-method="PUT"
      data-path="provider/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTprovider--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTprovider--id-"
                    onclick="tryItOut('PUTprovider--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTprovider--id-"
                    onclick="cancelTryOut('PUTprovider--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTprovider--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>provider/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTprovider--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTprovider--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTprovider--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTprovider--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the provider. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTprovider--id-"
               value="Postpaid"
               data-component="body">
    <br>
<p>Nama provider. Example: <code>Postpaid</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>driver</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="driver"                data-endpoint="PUTprovider--id-"
               value="App\Services\MobilepulsaService"
               data-component="body">
    <br>
<p>Driver. Example: <code>App\Services\MobilepulsaService</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="is_active"                data-endpoint="PUTprovider--id-"
               value="true"
               data-component="body">
    <br>
<p>Code Provider. Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>payload</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>
<p>nullable Data tambahan konfigurasi (API Key, Secret, dll)</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payload.username"                data-endpoint="PUTprovider--id-"
               value=""
               data-component="body">
    <br>

                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>api_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payload.api_key"                data-endpoint="PUTprovider--id-"
               value=""
               data-component="body">
    <br>

                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payload.url"                data-endpoint="PUTprovider--id-"
               value="http://bailey.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://bailey.com/</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="provider-DELETEprovider--id-">Hapus provider</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menghapus provider produk ke dalam sistem.</p>

<span id="example-requests-DELETEprovider--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/provider/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/provider/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEprovider--id-">
</span>
<span id="execution-results-DELETEprovider--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEprovider--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEprovider--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEprovider--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEprovider--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEprovider--id-" data-method="DELETE"
      data-path="provider/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEprovider--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEprovider--id-"
                    onclick="tryItOut('DELETEprovider--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEprovider--id-"
                    onclick="cancelTryOut('DELETEprovider--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEprovider--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>provider/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEprovider--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEprovider--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEprovider--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEprovider--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the provider. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="review">Review</h1>

    

                                <h2 id="review-GETreview">List Review User
Mengambil semua data Review milik user yang sedang login.
Bisa difilter berdasarkan ID Review untuk detail, atau produk_id.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETreview">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/review?id=16&amp;produk_id=architecto&amp;status=architecto&amp;limit=16" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/review"
);

const params = {
    "id": "16",
    "produk_id": "architecto",
    "status": "architecto",
    "limit": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETreview">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6InhXTHorUFRnZTBGaERuaE9JVlZLZHc9PSIsInZhbHVlIjoiY0xUSVhtd3QzcEZLT253YTJVMlV1ZGE0Uk5vcS9LWjdnMnVTYmZSRkUzOUpxR2xoUHA5OXpNYklEMFJkRDFYc0xWNXcxNkx1c3U0QWJPdTFsc2N1OFAxZ0J5OEFJRmJhenI0Z3I0NE1DQ3U5QnFMZkVIU3NkQi9tSFlhSC9MOXUiLCJtYWMiOiI1ZWNlODY3ODgyZTM5ZTZkMjFmZmU3ZmRhNDJmM2E3Y2M4ZWEzZDg1ZjE0OGU1ZGJlMWQ2ZDllY2E4YmViZTI3IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6ImRNam5tR014bmN0dmJNdFJncStySnc9PSIsInZhbHVlIjoiMUx6NkZxMzBFSTdrN0MySFFUY1RDb1ovc1pJSWx5V1NOanhEZFFORjJuTytvOHNJdml3OElkbnVGaXJQNkJGU3Y1K0FZbmhoWGxscTNLOHI0cEpZL3loVlJlNndqMExxWHFMTFpraGo1Wkk0NENjZTdjMFVhT0tMbzg0V3ArMkwiLCJtYWMiOiJmZDAzZjU5ZTI0NWM1NjU4MWYzZmU1ZTBiNTI0MzdhOWMxNDY0YTg0NzVmMjEyYTAwZTE1MDRiMTc3Yzc2YzU5IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 200,
        &quot;status&quot;: &quot;success&quot;,
        &quot;message&quot;: &quot;data Review berhasil ditampilkan&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETreview" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETreview"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETreview"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETreview" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETreview">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETreview" data-method="GET"
      data-path="review"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETreview', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETreview"
                    onclick="tryItOut('GETreview');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETreview"
                    onclick="cancelTryOut('GETreview');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETreview"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>review</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETreview"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETreview"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETreview"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETreview"
               value="16"
               data-component="query">
    <br>
<p>ID Review jika ingin mengambil detail satu data. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>produk_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="produk_id"                data-endpoint="GETreview"
               value="architecto"
               data-component="query">
    <br>
<p>Cari berdasarkan ID Produk. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETreview"
               value="architecto"
               data-component="query">
    <br>
<p>Cari berdasarkan Status. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETreview"
               value="16"
               data-component="query">
    <br>
<p>Jumlah data per halaman. Example: <code>16</code></p>
            </div>
                </form>

                    <h2 id="review-POSTreview">Endpoint ini digunakan untuk membuat pesanan Topup Saldo.
dan mengembalikan URL pembayaran Snap Invoice Duitku.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTreview">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/review" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"transaksi_id\": 16,
    \"produk_id\": 16,
    \"comment\": \"architecto\",
    \"rating\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/review"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "transaksi_id": 16,
    "produk_id": 16,
    "comment": "architecto",
    "rating": 16
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTreview">
</span>
<span id="execution-results-POSTreview" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTreview"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTreview"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTreview" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTreview">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTreview" data-method="POST"
      data-path="review"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTreview', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTreview"
                    onclick="tryItOut('POSTreview');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTreview"
                    onclick="cancelTryOut('POSTreview');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTreview"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>review</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTreview"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTreview"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTreview"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>transaksi_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="transaksi_id"                data-endpoint="POSTreview"
               value="16"
               data-component="body">
    <br>
<p>ID Transaksi. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>produk_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="produk_id"                data-endpoint="POSTreview"
               value="16"
               data-component="body">
    <br>
<p>ID Produk. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTreview"
               value="architecto"
               data-component="body">
    <br>
<p>comentar. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rating</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rating"                data-endpoint="POSTreview"
               value="16"
               data-component="body">
    <br>
<p>rating. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="review-PUTreview--id-">Update Rating &amp; Balasan
Endpoint ini digunakan oleh User untuk merevisi ulasan (maks 1x)
atau oleh Admin untuk membalas ulasan dan mengatur status publikasi.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTreview--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/review/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"rating\": 16,
    \"comment\": \"architecto\",
    \"reply_message\": \"architecto\",
    \"is_publish\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/review/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "rating": 16,
    "comment": "architecto",
    "reply_message": "architecto",
    "is_publish": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTreview--id-">
</span>
<span id="execution-results-PUTreview--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTreview--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTreview--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTreview--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTreview--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTreview--id-" data-method="PUT"
      data-path="review/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTreview--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTreview--id-"
                    onclick="tryItOut('PUTreview--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTreview--id-"
                    onclick="cancelTryOut('PUTreview--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTreview--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>review/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTreview--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTreview--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTreview--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTreview--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the review. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rating</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rating"                data-endpoint="PUTreview--id-"
               value="16"
               data-component="body">
    <br>
<p>Skala 1-5 (Hanya untuk User). Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="PUTreview--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Isi ulasan (Hanya untuk User). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reply_message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reply_message"                data-endpoint="PUTreview--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Balasan admin (Hanya untuk Admin). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_publish</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTreview--id-" style="display: none">
            <input type="radio" name="is_publish"
                   value="true"
                   data-endpoint="PUTreview--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTreview--id-" style="display: none">
            <input type="radio" name="is_publish"
                   value="false"
                   data-endpoint="PUTreview--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status tampil di frontend (Hanya untuk Admin). Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="review-GETreview-admin">List Review (Admin)
Mengambil semua data Review secara keseluruhan (Global) untuk dashboard admin.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETreview-admin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/review/admin?id=16&amp;search=architecto&amp;limit=16" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/review/admin"
);

const params = {
    "id": "16",
    "search": "architecto",
    "limit": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETreview-admin">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6InNyN2ZuUUlaWDJxQWhXWkd0QVF2WFE9PSIsInZhbHVlIjoib3VMN1JqNlZ3T2RmRWh4SjB4dmpWRDl5MVQ5WjNIbC9sR0d5ekk5SnJSODRvV2ZveG9hN2Nma3djcjhRanFBVEczNjJRcDZaeGFmTDVoYTZORWtlbmRGTHcrVlYwWDhwaGNqcEhTUjdRZy9Xclo4ZXMzbjlvTERteGt1YkJNZzMiLCJtYWMiOiJjMjI1ZWU5ZjkzNjU5MDYyYTNlNDE1ODQzYzhmMTY4MGVlNzdjM2MyZGE3NjE1NzljNzMyZTk5YzQ0Yzc4MGU1IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:28 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6InNvZ29la1BTenlyc3lUNDE5dGdJS0E9PSIsInZhbHVlIjoiSDF3QmppMVlCaXFORmZnSHFBRDhZa09qSC9KQkoxZ0sxOUFlSkVmNXdwUHNyYzBhTm9WR1FDL09CcmNBUTBoODJxYUs4cXZmR1FDeExjQ2lUUDJYZjJkQjlSYlVLSFQyZHpMVnl6cEl3ZlZ0Vkd5NldTdWMxK2c1NkhrSHFXdHIiLCJtYWMiOiJjNzA5ZWY4ZWM5YTllMDlmZjcxNDljNTdkZTQ5MmM2NDdlZGMyYTQwOTYzM2E0NTYyYzk1Njk2MGI3YzMxMWRjIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:28 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETreview-admin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETreview-admin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETreview-admin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETreview-admin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETreview-admin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETreview-admin" data-method="GET"
      data-path="review/admin"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETreview-admin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETreview-admin"
                    onclick="tryItOut('GETreview-admin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETreview-admin"
                    onclick="cancelTryOut('GETreview-admin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETreview-admin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>review/admin</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETreview-admin"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETreview-admin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETreview-admin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETreview-admin"
               value="16"
               data-component="query">
    <br>
<p>ID Review untuk detail admin. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETreview-admin"
               value="architecto"
               data-component="query">
    <br>
<p>Cari berdasarkan Order ID. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETreview-admin"
               value="16"
               data-component="query">
    <br>
<p>Jumlah data per halaman. Example: <code>16</code></p>
            </div>
                </form>

                <h1 id="seo-meta-tags">Seo Meta Tags</h1>

    <p>API untuk mengelola Seo Meta Tags</p>

                                <h2 id="seo-meta-tags-GETseo">List Seo Meta Tags
Endpoint ini digunakan untuk mengambil semua data Seo Meta Tags.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Cocok digunakan di halaman pembelian produk.</p>

<span id="example-requests-GETseo">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/seo?id=16&amp;search=Mobile&amp;is_active=1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/seo"
);

const params = {
    "id": "16",
    "search": "Mobile",
    "is_active": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETseo">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6InNZZW8ySHBEV2ZsZlpFbTdHQXkrR0E9PSIsInZhbHVlIjoiMFA5VE9mWjJJNzBkclFQVlZMbWNRM3c0NUZvN2grVU41NFU0bnVGWUZQN3BEcUM0RXRFRDBlWWNwNWhpUjRJQVd1eWxHbEhxZGNvdDhRWVQycUNPcVNEbHQ2VHlFbnI1ZE9GQlk2bjRCQnYydFMyUmhKNG5kMXRScVRSZ2FBc0QiLCJtYWMiOiJkYmYyOWU5YTc5YjM2NTNiZTc0YjhhYWQ2OGMzOGU4YjUyZWE5MWM0MGZmNGI0ODlkY2E4NjRlYjQwNWI3ZmY4IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IjYzRFk5ai85K3luWjRqUnRldUlFZ2c9PSIsInZhbHVlIjoiSFZzZlZyWHlvbDV3aFpsUHNIREc4UnVjdzltQjFlR3FlTkFHY2hSTGdvb2pGVVpIV0ZOTlViMVdBUCtQWTRLeVNXaGhsK25UMU9yRWhjd3N5Q253V2J4aTFrejN4dTcyTW9wKzBxdFRPZzQzQmgrY1N2VFpEODJ4THdjWTViK1QiLCJtYWMiOiJkMDFlOWRjZjhmYWQ4NWYwODI4ZDBjY2I3ZmY3YmMzOTc3ODU4OTk3ZmNlYTEyYjk1OTc1ZDNhNmRhODRiMTlkIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 200,
        &quot;status&quot;: &quot;success&quot;,
        &quot;message&quot;: &quot;data Seo Meta Tags berhasil ditampilkan&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETseo" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETseo"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETseo"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETseo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETseo">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETseo" data-method="GET"
      data-path="seo"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETseo', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETseo"
                    onclick="tryItOut('GETseo');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETseo"
                    onclick="cancelTryOut('GETseo');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETseo"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>seo</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETseo"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETseo"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETseo"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETseo"
               value="16"
               data-component="query">
    <br>
<p>Mencari Seo Meta Tags berdasarkan id. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETseo"
               value="Mobile"
               data-component="query">
    <br>
<p>Mencari Seo Meta Tags berdasarkan nama. Example: <code>Mobile</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETseo" style="display: none">
            <input type="radio" name="is_active"
                   value="1"
                   data-endpoint="GETseo"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETseo" style="display: none">
            <input type="radio" name="is_active"
                   value="0"
                   data-endpoint="GETseo"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Mencari Seo Meta Tags berdasarkan status aktif. Example: <code>true</code></p>
            </div>
                </form>

                    <h2 id="seo-meta-tags-POSTseo">Tambah Seo Meta Tags</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan Seo Meta Tags baru ke dalam sistem.</p>

<span id="example-requests-POSTseo">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/seo" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"meta_key\": \"og:description\",
    \"meta_value\": \"Topup Game Terpercaya\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/seo"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "meta_key": "og:description",
    "meta_value": "Topup Game Terpercaya"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTseo">
</span>
<span id="execution-results-POSTseo" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTseo"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTseo"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTseo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTseo">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTseo" data-method="POST"
      data-path="seo"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTseo', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTseo"
                    onclick="tryItOut('POSTseo');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTseo"
                    onclick="cancelTryOut('POSTseo');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTseo"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>seo</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTseo"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTseo"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTseo"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meta_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="meta_key"                data-endpoint="POSTseo"
               value="og:description"
               data-component="body">
    <br>
<p>Meta Key (ex: og:description). Example: <code>og:description</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meta_value</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="meta_value"                data-endpoint="POSTseo"
               value="Topup Game Terpercaya"
               data-component="body">
    <br>
<p>Meta Value. Example: <code>Topup Game Terpercaya</code></p>
        </div>
        </form>

                    <h2 id="seo-meta-tags-PUTseo--id-">Edit Seo Meta Tags</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk mengubah Seo Meta Tags web ke dalam sistem.</p>

<span id="example-requests-PUTseo--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/seo/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"meta_key\": \"og:description\",
    \"meta_value\": \"Topup Game Terpercaya\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/seo/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "meta_key": "og:description",
    "meta_value": "Topup Game Terpercaya"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTseo--id-">
</span>
<span id="execution-results-PUTseo--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTseo--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTseo--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTseo--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTseo--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTseo--id-" data-method="PUT"
      data-path="seo/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTseo--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTseo--id-"
                    onclick="tryItOut('PUTseo--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTseo--id-"
                    onclick="cancelTryOut('PUTseo--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTseo--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>seo/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTseo--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTseo--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTseo--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTseo--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the seo. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meta_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="meta_key"                data-endpoint="PUTseo--id-"
               value="og:description"
               data-component="body">
    <br>
<p>Meta Key (ex: og:description). Example: <code>og:description</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meta_value</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="meta_value"                data-endpoint="PUTseo--id-"
               value="Topup Game Terpercaya"
               data-component="body">
    <br>
<p>Meta Value. Example: <code>Topup Game Terpercaya</code></p>
        </div>
        </form>

                    <h2 id="seo-meta-tags-DELETEseo--id-">Hapus Seo Meta Tags</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menghapus Seo Meta Tags produk ke dalam sistem.</p>

<span id="example-requests-DELETEseo--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/seo/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/seo/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEseo--id-">
</span>
<span id="execution-results-DELETEseo--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEseo--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEseo--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEseo--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEseo--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEseo--id-" data-method="DELETE"
      data-path="seo/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEseo--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEseo--id-"
                    onclick="tryItOut('DELETEseo--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEseo--id-"
                    onclick="cancelTryOut('DELETEseo--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEseo--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>seo/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEseo--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEseo--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEseo--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEseo--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the seo. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="site-content">Site Content</h1>

    <p>API untuk mengelola Site Content</p>

                                <h2 id="site-content-GETsite-conten">List Site Content
Endpoint ini digunakan untuk mengambil semua data Site Content.</h2>

<p>
</p>

<p>Cocok digunakan di halaman Kebijakan Privasi.</p>

<span id="example-requests-GETsite-conten">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/site-conten?id=16&amp;type=architecto&amp;search=architecto&amp;limit=architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/site-conten"
);

const params = {
    "id": "16",
    "type": "architecto",
    "search": "architecto",
    "limit": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETsite-conten">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IkZuWVRtMjdpVVlxcXFYSnc2RmdVcmc9PSIsInZhbHVlIjoiaG4xWVkyQ0IrcjlEMzhBNWpudm5ScEs4WGhhWmpKVWFxL0xxYW1zV05Fa0srNjZiNXJQTCtUVUlTNEJPa3FpNHd3OEx3aDUzUmdycVpLSTJUc280UnlwMHg1Nk44SnlsTG5lZnpUZEthdmczNCs0bFgxTUpUTXZiak9qbHVqajciLCJtYWMiOiJhNzQ5ZGQ2NzkzZDAyNDNlYmUxYWRmMDQyNTdiZWRlNTU0Y2EyZTk0Mjg2YzhlNDI4ODZhOWY3NzFkMjViNTE0IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:28 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6ImlSMms0R09TNE0wTmt3Wm90M0pXMlE9PSIsInZhbHVlIjoicno5eFR4bnNyTCtvUWdnWUtMaEdDWDM3cllLbFRIbXpiZ2FKYnY5eFJzeHpncjlCNS8zbWwxa091YzZFS1FraVdWU3FlcnlJYlR4MDdZZ0YzRWxMREdjQVl2cFltTkJHMFhTUC8yQUVoNGVIOWRwK1VSUUVmdUNoVVIzLzVFUDQiLCJtYWMiOiJmODk0ZTI0MzY5MTIzZjI2ZGRmYzk0MWZiZmZiZDk3YjU5ZTZkYWQyYzc0ZDQyMzMyMGJlZDY5MDgzNGU2OWVjIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:28 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 200,
        &quot;status&quot;: &quot;success&quot;,
        &quot;message&quot;: &quot;data site conten berhasil ditampilkan&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETsite-conten" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETsite-conten"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETsite-conten"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETsite-conten" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsite-conten">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETsite-conten" data-method="GET"
      data-path="site-conten"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETsite-conten', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETsite-conten"
                    onclick="tryItOut('GETsite-conten');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETsite-conten"
                    onclick="cancelTryOut('GETsite-conten');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETsite-conten"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>site-conten</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETsite-conten"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETsite-conten"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETsite-conten"
               value="16"
               data-component="query">
    <br>
<p>Mencari Site Content berdasarkan id. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETsite-conten"
               value="architecto"
               data-component="query">
    <br>
<p>Mencari Site Content berdasarkan type. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETsite-conten"
               value="architecto"
               data-component="query">
    <br>
<p>Mencari Site Content berdasarkan title. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="limit"                data-endpoint="GETsite-conten"
               value="architecto"
               data-component="query">
    <br>
<p>integer. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="site-content-POSTsite-conten">Tambah Site Content</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan Site Content baru ke dalam sistem.</p>

<span id="example-requests-POSTsite-conten">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/site-conten" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"type\": \"architecto\",
    \"title\": \"architecto\",
    \"content\": \"architecto\",
    \"is_active\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/site-conten"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "type": "architecto",
    "title": "architecto",
    "content": "architecto",
    "is_active": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTsite-conten">
</span>
<span id="execution-results-POSTsite-conten" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTsite-conten"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTsite-conten"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTsite-conten" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTsite-conten">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTsite-conten" data-method="POST"
      data-path="site-conten"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTsite-conten', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTsite-conten"
                    onclick="tryItOut('POSTsite-conten');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTsite-conten"
                    onclick="cancelTryOut('POSTsite-conten');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTsite-conten"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>site-conten</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTsite-conten"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTsite-conten"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTsite-conten"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTsite-conten"
               value="architecto"
               data-component="body">
    <br>
<p>type (privacy_policy,terms_condition,contact_us). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTsite-conten"
               value="architecto"
               data-component="body">
    <br>
<p>title. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTsite-conten"
               value="architecto"
               data-component="body">
    <br>
<p>content. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="is_active"                data-endpoint="POSTsite-conten"
               value="architecto"
               data-component="body">
    <br>
<p>is_active. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="site-content-PUTsite-conten--id-">Update Site Content</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk mengedit Site Content baru ke dalam sistem.</p>

<span id="example-requests-PUTsite-conten--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/site-conten/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"type\": \"architecto\",
    \"title\": \"architecto\",
    \"content\": \"architecto\",
    \"is_active\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/site-conten/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "type": "architecto",
    "title": "architecto",
    "content": "architecto",
    "is_active": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTsite-conten--id-">
</span>
<span id="execution-results-PUTsite-conten--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTsite-conten--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTsite-conten--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTsite-conten--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTsite-conten--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTsite-conten--id-" data-method="PUT"
      data-path="site-conten/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTsite-conten--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTsite-conten--id-"
                    onclick="tryItOut('PUTsite-conten--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTsite-conten--id-"
                    onclick="cancelTryOut('PUTsite-conten--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTsite-conten--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>site-conten/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTsite-conten--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTsite-conten--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTsite-conten--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTsite-conten--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the site conten. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="PUTsite-conten--id-"
               value="architecto"
               data-component="body">
    <br>
<p>type. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTsite-conten--id-"
               value="architecto"
               data-component="body">
    <br>
<p>title. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="PUTsite-conten--id-"
               value="architecto"
               data-component="body">
    <br>
<p>content. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="is_active"                data-endpoint="PUTsite-conten--id-"
               value="architecto"
               data-component="body">
    <br>
<p>is_active. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="site-content-DELETEsite-conten--id-">Delete Site Content</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menghapus Site Content baru ke dalam sistem.</p>

<span id="example-requests-DELETEsite-conten--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/site-conten/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/site-conten/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEsite-conten--id-">
</span>
<span id="execution-results-DELETEsite-conten--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEsite-conten--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEsite-conten--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEsite-conten--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEsite-conten--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEsite-conten--id-" data-method="DELETE"
      data-path="site-conten/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEsite-conten--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEsite-conten--id-"
                    onclick="tryItOut('DELETEsite-conten--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEsite-conten--id-"
                    onclick="cancelTryOut('DELETEsite-conten--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEsite-conten--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>site-conten/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEsite-conten--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEsite-conten--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEsite-conten--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEsite-conten--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the site conten. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="social-media">Social Media</h1>

    <p>API untuk mengelola Social Media</p>

                                <h2 id="social-media-GETsocial-media">List Social Media
Endpoint ini digunakan untuk mengambil semua data Social Media.</h2>

<p>
</p>

<p>Cocok digunakan di halaman pembelian produk.</p>

<span id="example-requests-GETsocial-media">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/social-media?id=16&amp;search=Mobile&amp;is_active=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/social-media"
);

const params = {
    "id": "16",
    "search": "Mobile",
    "is_active": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETsocial-media">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IjE3SUNEMmRQVkdZSnlZbWJUM2Y4eXc9PSIsInZhbHVlIjoiZFczTXdhd0IzbDdBdDVzaHNyYjJrNzEwMldCUGY1OW5yU0crOGFtRXBxOGUxT1V5blJURFJobWoyRWNMeFhReHQ3ZHhZTkRDaFp3NzhrWW1BVVl2TmZsdlE2c3NuRytMNzBqOWNjK0lUZ0hDNDdqanJtdUNRc09wUUFld1VpVTQiLCJtYWMiOiI5YzMyMjNlZjkyM2U1ZjJhMWI3MjI3NjQ2Y2NlYWYxNzEyMmYzODRmNjlhZWJlZjEwZmI5NDM4YjZjNzU1YTI4IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6ImlNdlh0WWxxZ2Z5SlBUUzdlUWk3dXc9PSIsInZhbHVlIjoiZ2pOK3VXZk5CdzV5aXVVU0pHNmtmMWhOY1d6bWZORWk3OEhzeHRHa1hSQzJCT3RyUk84Z1V4ejU4dmNrd3dSM3FrdjNpU1pabGZQM2JadFNnS0R3OFo2czIvZStSanhLWDdDeUx3c2xoakxjMEQyZmZrRTBYUktZVHRPbm11UFIiLCJtYWMiOiI1ZTU5MmRjMzI1MjEzM2IwZDlkY2VmNmFiMTM4ZjljOWJmM2M0OWU0YTg0OTk5MGJkYzA3YTZlZTdlZTkzMWM3IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 200,
        &quot;status&quot;: &quot;success&quot;,
        &quot;message&quot;: &quot;data Social Media berhasil ditampilkan&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETsocial-media" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETsocial-media"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETsocial-media"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETsocial-media" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsocial-media">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETsocial-media" data-method="GET"
      data-path="social-media"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETsocial-media', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETsocial-media"
                    onclick="tryItOut('GETsocial-media');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETsocial-media"
                    onclick="cancelTryOut('GETsocial-media');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETsocial-media"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>social-media</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETsocial-media"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETsocial-media"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETsocial-media"
               value="16"
               data-component="query">
    <br>
<p>Mencari Social Media berdasarkan id. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETsocial-media"
               value="Mobile"
               data-component="query">
    <br>
<p>Mencari Social Media berdasarkan nama. Example: <code>Mobile</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETsocial-media" style="display: none">
            <input type="radio" name="is_active"
                   value="1"
                   data-endpoint="GETsocial-media"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETsocial-media" style="display: none">
            <input type="radio" name="is_active"
                   value="0"
                   data-endpoint="GETsocial-media"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Mencari Social Media berdasarkan status aktif. Example: <code>true</code></p>
            </div>
                </form>

                    <h2 id="social-media-POSTsocial-media">Tambah Social Media</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan Social Media baru ke dalam sistem.</p>

<span id="example-requests-POSTsocial-media">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/social-media" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "platform=Instagram"\
    --form "url=https://ig.com/profil"\
    --form "is_active=1"\
    --form "icon=@/tmp/phpZWHkFf" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/social-media"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('platform', 'Instagram');
body.append('url', 'https://ig.com/profil');
body.append('is_active', '1');
body.append('icon', document.querySelector('input[name="icon"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTsocial-media">
</span>
<span id="execution-results-POSTsocial-media" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTsocial-media"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTsocial-media"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTsocial-media" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTsocial-media">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTsocial-media" data-method="POST"
      data-path="social-media"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTsocial-media', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTsocial-media"
                    onclick="tryItOut('POSTsocial-media');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTsocial-media"
                    onclick="cancelTryOut('POSTsocial-media');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTsocial-media"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>social-media</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTsocial-media"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTsocial-media"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTsocial-media"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>platform</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="platform"                data-endpoint="POSTsocial-media"
               value="Instagram"
               data-component="body">
    <br>
<p>Platform (ex: Instagram). Example: <code>Instagram</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="url"                data-endpoint="POSTsocial-media"
               value="https://ig.com/profil"
               data-component="body">
    <br>
<p>Url Profil. Example: <code>https://ig.com/profil</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>icon</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="icon"                data-endpoint="POSTsocial-media"
               value=""
               data-component="body">
    <br>
<p>Logo gateway (Max: 2MB, Format: png,jpg,jpeg,webp). Example: <code>/tmp/phpZWHkFf</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTsocial-media" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTsocial-media"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTsocial-media" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTsocial-media"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status aktif (1 atau 0). Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="social-media-PUTsocial-media--id-">Edit Social Media</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk mengubah Social Media web ke dalam sistem.</p>

<span id="example-requests-PUTsocial-media--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/social-media/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "platform=Instagram"\
    --form "url=https://ig.com/profil"\
    --form "is_active=1"\
    --form "icon=@/tmp/phpPA3hyr" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/social-media/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('platform', 'Instagram');
body.append('url', 'https://ig.com/profil');
body.append('is_active', '1');
body.append('icon', document.querySelector('input[name="icon"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTsocial-media--id-">
</span>
<span id="execution-results-PUTsocial-media--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTsocial-media--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTsocial-media--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTsocial-media--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTsocial-media--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTsocial-media--id-" data-method="PUT"
      data-path="social-media/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTsocial-media--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTsocial-media--id-"
                    onclick="tryItOut('PUTsocial-media--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTsocial-media--id-"
                    onclick="cancelTryOut('PUTsocial-media--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTsocial-media--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>social-media/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTsocial-media--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTsocial-media--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTsocial-media--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTsocial-media--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the social medium. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>platform</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="platform"                data-endpoint="PUTsocial-media--id-"
               value="Instagram"
               data-component="body">
    <br>
<p>Platform (ex: Instagram). Example: <code>Instagram</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="url"                data-endpoint="PUTsocial-media--id-"
               value="https://ig.com/profil"
               data-component="body">
    <br>
<p>Url Profil. Example: <code>https://ig.com/profil</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>icon</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="icon"                data-endpoint="PUTsocial-media--id-"
               value=""
               data-component="body">
    <br>
<p>Logo gateway (Max: 2MB, Format: png,jpg,jpeg,webp). Example: <code>/tmp/phpPA3hyr</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="PUTsocial-media--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTsocial-media--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTsocial-media--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTsocial-media--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status aktif (1 atau 0). Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="social-media-DELETEsocial-media--id-">Hapus Social Media</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menghapus Social Media produk ke dalam sistem.</p>

<span id="example-requests-DELETEsocial-media--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/social-media/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/social-media/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEsocial-media--id-">
</span>
<span id="execution-results-DELETEsocial-media--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEsocial-media--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEsocial-media--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEsocial-media--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEsocial-media--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEsocial-media--id-" data-method="DELETE"
      data-path="social-media/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEsocial-media--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEsocial-media--id-"
                    onclick="tryItOut('DELETEsocial-media--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEsocial-media--id-"
                    onclick="cancelTryOut('DELETEsocial-media--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEsocial-media--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>social-media/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEsocial-media--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEsocial-media--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEsocial-media--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEsocial-media--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the social medium. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="transaksi">Transaksi</h1>

    

                                <h2 id="transaksi-POSTtransaksi-callback-payment">Callback Payment Gateway
Endpoint untuk menerima notifikasi status pembayaran dari Midtrans/Duitku.</h2>

<p>
</p>



<span id="example-requests-POSTtransaksi-callback-payment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/transaksi/callback-payment" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/transaksi/callback-payment"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTtransaksi-callback-payment">
</span>
<span id="execution-results-POSTtransaksi-callback-payment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTtransaksi-callback-payment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTtransaksi-callback-payment"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTtransaksi-callback-payment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTtransaksi-callback-payment">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTtransaksi-callback-payment" data-method="POST"
      data-path="transaksi/callback-payment"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTtransaksi-callback-payment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTtransaksi-callback-payment"
                    onclick="tryItOut('POSTtransaksi-callback-payment');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTtransaksi-callback-payment"
                    onclick="cancelTryOut('POSTtransaksi-callback-payment');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTtransaksi-callback-payment"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>transaksi/callback-payment</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTtransaksi-callback-payment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTtransaksi-callback-payment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="transaksi-POSTtransaksi-callback-ppob">Callback Provider PPOB
Endpoint untuk menerima status pesanan dari Provider (VIP/IAK/Digiflazz).
Pastikan header X-Client-Signature dikirim untuk validasi.</h2>

<p>
</p>



<span id="example-requests-POSTtransaksi-callback-ppob">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/transaksi/callback-ppob" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/transaksi/callback-ppob"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTtransaksi-callback-ppob">
</span>
<span id="execution-results-POSTtransaksi-callback-ppob" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTtransaksi-callback-ppob"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTtransaksi-callback-ppob"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTtransaksi-callback-ppob" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTtransaksi-callback-ppob">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTtransaksi-callback-ppob" data-method="POST"
      data-path="transaksi/callback-ppob"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTtransaksi-callback-ppob', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTtransaksi-callback-ppob"
                    onclick="tryItOut('POSTtransaksi-callback-ppob');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTtransaksi-callback-ppob"
                    onclick="cancelTryOut('POSTtransaksi-callback-ppob');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTtransaksi-callback-ppob"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>transaksi/callback-ppob</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTtransaksi-callback-ppob"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTtransaksi-callback-ppob"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="transaksi-GETtransaksi">List Transaksi User
Mengambil semua data transaksi milik user yang sedang login.
Bisa difilter berdasarkan ID transaksi untuk detail, atau search order_id.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETtransaksi">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/transaksi?id=1&amp;search=ORD-2024&amp;limit=15" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/transaksi"
);

const params = {
    "id": "1",
    "search": "ORD-2024",
    "limit": "15",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETtransaksi">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6ImI5aEFKUml6eGJGM0dkWG9mVGRMenc9PSIsInZhbHVlIjoiSU8rSGtEN3BlNDVyZmNjNVlBTlVzREZIbHNmV1YzcUVvZ1hXTUR5Rm81U3RDOVJkVml2SlBmRlZVcTVpdzEvUXlhclk1Q1FKeG1GbmRtcXo3cGZNNkVVN1FmMk15dDlyNW80bnpzeTNqb2h2Q0ZKeE4waWEwRjcwRExaM1U0cy8iLCJtYWMiOiJkOWJlN2U4MjBiMzY5N2Y5NGRiYmRhNzM4YmEyNDg3MzVlYmNiZDNjODFjN2FjNzJjODRlYTE5ZDVjNjU1NzNhIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IjRLM0x1TDZNaWM0cllzTUdNVTd6T3c9PSIsInZhbHVlIjoiT3RXWnJqWnhSQmRJRnExSVdpNVBKZW9NZ24vcDIwZUZDUDZwSlF2WHpNT2FMUlJxbUtmalNYcXRXRmpNR2p4QXdiL3B4M1lLVExLUThTdW5Dd1prZTA0K1dPNE9hZ0xlU2Q4NEVEb1BnRUdDZHYwMnR4Z21XWmIrNjh0d1VrS0giLCJtYWMiOiI1NGEyNTljYzViZTJmYzM2OWRiN2Y0MjcwM2Y2OGZkNDE1MmM2MzI5OTI1M2ViMDlhYzdmYTY4MmFjNDI5ZmI5IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETtransaksi" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETtransaksi"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETtransaksi"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETtransaksi" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETtransaksi">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETtransaksi" data-method="GET"
      data-path="transaksi"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETtransaksi', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETtransaksi"
                    onclick="tryItOut('GETtransaksi');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETtransaksi"
                    onclick="cancelTryOut('GETtransaksi');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETtransaksi"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>transaksi</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETtransaksi"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETtransaksi"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETtransaksi"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETtransaksi"
               value="1"
               data-component="query">
    <br>
<p>ID transaksi jika ingin mengambil detail satu data. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETtransaksi"
               value="ORD-2024"
               data-component="query">
    <br>
<p>Cari berdasarkan Order ID. Example: <code>ORD-2024</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETtransaksi"
               value="15"
               data-component="query">
    <br>
<p>Jumlah data per halaman. Default: 10. Example: <code>15</code></p>
            </div>
                </form>

                    <h2 id="transaksi-GETtransaksi-admin">List Transaksi (Admin)
Mengambil semua data transaksi secara keseluruhan (Global) untuk dashboard admin.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETtransaksi-admin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/transaksi/admin?id=1&amp;search=ORD-2024&amp;limit=20" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/transaksi/admin"
);

const params = {
    "id": "1",
    "search": "ORD-2024",
    "limit": "20",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETtransaksi-admin">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6InExUnZDSVA1Yzk0bFNuenBqMUJZVlE9PSIsInZhbHVlIjoiaTBjNUkvQlA3a1BhbDRGcXFnL0x2bkV6eTkxVjRCZVJFdmZoNlJpdGVCTitMT09LbC9YV1FWOEhTOE1FZ0l3TnBMSTR0L0VzNkpmbFdqTytBVFZQOFNjczZkMmVVSjVKM3F1MW5ZNHBXSnZ3dEE0ZllKbGc2dFV2TUlyQ29EY28iLCJtYWMiOiJhZTg1OTFiNTE1YTQzZGNmMzFiNmM2ZjhjNmM4M2FjMjhmOWYzMmQyNWFkNTZlNDY0OWRlYzBiNWY5NzY2ZTc0IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IkVqOTJGTmNQZDBpekZBbEdoMEFtaUE9PSIsInZhbHVlIjoiemIva3FHZkM5VHNGZFF6Wnl0Z1I4SWlTaCtmOHlXNjRkNStSRWNnT0UrRldjSFdheVZabUZXd3lYdUxsR0xVYTBaZldsaXlId3JlZFVLWm12amFqQVdTVkxqMWQyRE94M1NwR2xYRHcvdnZISFVmNDhuN04wNjFNR1VBZ3JnOE8iLCJtYWMiOiI1OTc3NjQ0MmQ1MjQyMzEyY2NjZDBhNzk3NDg3YTQ2ZjVhYzI1ZDdkYzEzYzI5ZjUxN2ZhYzVhZGVjZTA3YTQyIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETtransaksi-admin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETtransaksi-admin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETtransaksi-admin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETtransaksi-admin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETtransaksi-admin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETtransaksi-admin" data-method="GET"
      data-path="transaksi/admin"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETtransaksi-admin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETtransaksi-admin"
                    onclick="tryItOut('GETtransaksi-admin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETtransaksi-admin"
                    onclick="cancelTryOut('GETtransaksi-admin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETtransaksi-admin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>transaksi/admin</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETtransaksi-admin"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETtransaksi-admin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETtransaksi-admin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETtransaksi-admin"
               value="1"
               data-component="query">
    <br>
<p>ID transaksi untuk detail admin. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETtransaksi-admin"
               value="ORD-2024"
               data-component="query">
    <br>
<p>Cari berdasarkan Order ID. Example: <code>ORD-2024</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETtransaksi-admin"
               value="20"
               data-component="query">
    <br>
<p>Jumlah data per halaman. Example: <code>20</code></p>
            </div>
                </form>

                    <h2 id="transaksi-DELETEtransaksi--id-">Hapus Transaksi
Menghapus data transaksi berdasarkan ID.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEtransaksi--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/transaksi/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/transaksi/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEtransaksi--id-">
</span>
<span id="execution-results-DELETEtransaksi--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEtransaksi--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEtransaksi--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEtransaksi--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEtransaksi--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEtransaksi--id-" data-method="DELETE"
      data-path="transaksi/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEtransaksi--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEtransaksi--id-"
                    onclick="tryItOut('DELETEtransaksi--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEtransaksi--id-"
                    onclick="cancelTryOut('DELETEtransaksi--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEtransaksi--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>transaksi/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEtransaksi--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEtransaksi--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEtransaksi--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEtransaksi--id-"
               value="1"
               data-component="url">
    <br>
<p>ID transaksi yang akan dihapus. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="user">User</h1>

    <p>API untuk mengelola User / Pengguna</p>

                                <h2 id="user-GETuser">List User
Endpoint ini digunakan untuk mengambil semua data User.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETuser">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/user?id=architecto&amp;search=architecto&amp;limit=16" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/user"
);

const params = {
    "id": "architecto",
    "search": "architecto",
    "limit": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6InNoTVhPTzh3QXl4RVBkVmxWeG9KOEE9PSIsInZhbHVlIjoiQWY2MUc5eWpDdWRCdDd4Sk5BUkJHQWJjNUg1WFFENEoyNys4LzFHbmxtcnpISnJNb0JNRHg4LzRsVHUwUld2Tk5zUEFEQ29NQ01YSXg0Nm9HN3RpOG9uMWZQRE4zaWhRV3FISVVuVzJOS3VzOTVGQVdMeFVTUyt5Y05ZK29IRU0iLCJtYWMiOiI3ZGU4ZGMwMmZkMjQzZWRiYmIzNjJmYjAzZDE3MDc5MjVhOWEzMzA5NzRmZjllNTg0MmI2ZjlkMDRkN2UyOGQ3IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:25 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6InplQ1ZSNjNLMWVVV3g0ci9sSmIreWc9PSIsInZhbHVlIjoiQ3YrMXI0SXdRTDJJeWthbXNHUW5oQjF6emFwOUxFTG9GR1hNMEphRGdZNkZMRUZZM0pXY0dPVjFxK1ltV1cvWVRGRCtsUjIyZUoxOUJyeklLaXNZczRFY011cXhMRzBtdHB4YkMrakU3aSs1MHRrUWdnbWhiV1p1UjZSMFVEc0wiLCJtYWMiOiJkYzBiZjVkMGM1OTg4YzAzYTQwMjMyNmUxMzRhMjMyNzYzNmRlY2UxYzMwMjJlMTQxNmY1NGNlNWM2MGFmMTBlIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:25 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser" data-method="GET"
      data-path="user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser"
                    onclick="tryItOut('GETuser');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser"
                    onclick="cancelTryOut('GETuser');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETuser"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETuser"
               value="architecto"
               data-component="query">
    <br>
<p>Mencari user berdasarkan id. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETuser"
               value="architecto"
               data-component="query">
    <br>
<p>Mencari user berdasarkan nama. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETuser"
               value="16"
               data-component="query">
    <br>
<p>Batasi jumlah data yang tampil. Example: <code>16</code></p>
            </div>
                </form>

                    <h2 id="user-POSTuser">Tambah User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan User baru ke dalam sistem Reiyan Store.</p>

<span id="example-requests-POSTuser">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/user" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"member_id\": 4326.41688,
    \"role_id\": 16,
    \"full_name\": \"architecto\",
    \"user_name\": \"architecto\",
    \"phone\": \"architecto\",
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/user"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "member_id": 4326.41688,
    "role_id": 16,
    "full_name": "architecto",
    "user_name": "architecto",
    "phone": "architecto",
    "email": "gbailey@example.net",
    "password": "|]|{+-"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTuser">
</span>
<span id="execution-results-POSTuser" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTuser"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTuser"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTuser" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTuser">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTuser" data-method="POST"
      data-path="user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTuser', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTuser"
                    onclick="tryItOut('POSTuser');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTuser"
                    onclick="cancelTryOut('POSTuser');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTuser"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTuser"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTuser"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTuser"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>member_id</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="member_id"                data-endpoint="POSTuser"
               value="4326.41688"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the member_levels table. Example: <code>4326.41688</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="role_id"                data-endpoint="POSTuser"
               value="16"
               data-component="body">
    <br>
<p>ID Roles. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>full_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="full_name"                data-endpoint="POSTuser"
               value="architecto"
               data-component="body">
    <br>
<p>Full Name. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_name"                data-endpoint="POSTuser"
               value="architecto"
               data-component="body">
    <br>
<p>User Name. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTuser"
               value="architecto"
               data-component="body">
    <br>
<p>No HP. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTuser"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Email. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTuser"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Password. Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="user-PUTuser--id-">Edit User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan User baru ke dalam sistem Reiyan Store.</p>

<span id="example-requests-PUTuser--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/user/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"member_id\": 4326.41688,
    \"role_id\": 16,
    \"full_name\": \"architecto\",
    \"user_name\": \"architecto\",
    \"phone\": \"architecto\",
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/user/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "member_id": 4326.41688,
    "role_id": 16,
    "full_name": "architecto",
    "user_name": "architecto",
    "phone": "architecto",
    "email": "gbailey@example.net",
    "password": "|]|{+-"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTuser--id-">
</span>
<span id="execution-results-PUTuser--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTuser--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTuser--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTuser--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTuser--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTuser--id-" data-method="PUT"
      data-path="user/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTuser--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTuser--id-"
                    onclick="tryItOut('PUTuser--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTuser--id-"
                    onclick="cancelTryOut('PUTuser--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTuser--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>user/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTuser--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTuser--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTuser--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTuser--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>member_id</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="member_id"                data-endpoint="PUTuser--id-"
               value="4326.41688"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the member_levels table. Example: <code>4326.41688</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="role_id"                data-endpoint="PUTuser--id-"
               value="16"
               data-component="body">
    <br>
<p>ID Roles. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>full_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="full_name"                data-endpoint="PUTuser--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Full Name. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_name"                data-endpoint="PUTuser--id-"
               value="architecto"
               data-component="body">
    <br>
<p>User Name. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTuser--id-"
               value="architecto"
               data-component="body">
    <br>
<p>No HP. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTuser--id-"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Email. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTuser--id-"
               value="|]|{+-"
               data-component="body">
    <br>
<p>nullable Password. Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="user-DELETEuser--id-">Delete User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan User baru ke dalam sistem Reiyan Store.</p>

<span id="example-requests-DELETEuser--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/user/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/user/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEuser--id-">
</span>
<span id="execution-results-DELETEuser--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEuser--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEuser--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEuser--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEuser--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEuser--id-" data-method="DELETE"
      data-path="user/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEuser--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEuser--id-"
                    onclick="tryItOut('DELETEuser--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEuser--id-"
                    onclick="cancelTryOut('DELETEuser--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEuser--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>user/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEuser--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEuser--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEuser--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEuser--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="voucher">Voucher</h1>

    <p>API untuk mengelola Voucher</p>

                                <h2 id="voucher-GETvoucher">List Voucher
Endpoint ini digunakan untuk mengambil semua data Voucher.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Cocok digunakan di halaman pembelian produk.</p>

<span id="example-requests-GETvoucher">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/voucher?id=16&amp;search=Mobile&amp;start_at=2026-02-25&amp;end_at=2026-03-25&amp;type=percent" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/voucher"
);

const params = {
    "id": "16",
    "search": "Mobile",
    "start_at": "2026-02-25",
    "end_at": "2026-03-25",
    "type": "percent",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETvoucher">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6ImhGR3JtcnNubmpkYzUwRHNWY2dvaXc9PSIsInZhbHVlIjoiS2taRVZmY0o4UVovM01wKzR0VEFHL2NHZDVlRzhrcjdtSE9MSVNOY0UrRllKZTZacUJ1S0sxZzBZb3BybW1oS0JJSDJHZDNhV3JCTHd4MkJyZStmbDRxS2FrZHRMeGJBQ0hHMTVCODY1REZ0bE1UNGkzUlAyM1BuclB4WVlEK0MiLCJtYWMiOiI3YjhkNDA0OTI1ODIzZjI1MDhlMjE1MmZjNDFlNWNlMGZkNTJjODMwMTg1NjgwYzk4NTZkNTc0MzYzZDliNGYyIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IkxhWnVRYzJnQjZrNkp4d0JXUjVpQVE9PSIsInZhbHVlIjoiYzhlRWxXS0lQT0d3NFRvNUxnRDhmUUkzY1MvVHRkRnFUa2JNSEFLYUpFekxLTDVibjNzRXRZMUZVUHJOMHlIRTlDNWw5UHBHOHMvYk9pNW80TG90cUFwcFN1ZUxGM2FzZXV1VU9XdVB6aDhkNjZDU3VweFkvZndPenNDRHA0NUsiLCJtYWMiOiJhZGQwMmY1OGZhY2UxNWNjMmRiYjNkOTU1YTBlNDQxNjMwYzRhY2ZjY2FhYTJlMWY3YTk0OGZhN2I5MmRjZGJhIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:27 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETvoucher" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETvoucher"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETvoucher"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETvoucher" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETvoucher">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETvoucher" data-method="GET"
      data-path="voucher"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETvoucher', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETvoucher"
                    onclick="tryItOut('GETvoucher');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETvoucher"
                    onclick="cancelTryOut('GETvoucher');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETvoucher"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>voucher</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETvoucher"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETvoucher"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETvoucher"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETvoucher"
               value="16"
               data-component="query">
    <br>
<p>Mencari Voucher berdasarkan id. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETvoucher"
               value="Mobile"
               data-component="query">
    <br>
<p>Mencari Voucher berdasarkan nama. Example: <code>Mobile</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>start_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_at"                data-endpoint="GETvoucher"
               value="2026-02-25"
               data-component="query">
    <br>
<p>date Mencari Voucher berdasarkan Tanggal Dimulai. Example: <code>2026-02-25</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>end_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_at"                data-endpoint="GETvoucher"
               value="2026-03-25"
               data-component="query">
    <br>
<p>date Mencari Voucher berdasarkan Tanggal Berakhir. Example: <code>2026-03-25</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETvoucher"
               value="percent"
               data-component="query">
    <br>
<p>enum Mencari Voucher berdasarkan Type ('percent', 'flat'). Example: <code>percent</code></p>
            </div>
                </form>

                    <h2 id="voucher-POSTvoucher-check--code-">Cek Ketersedian Voucher</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk Mengecek Ketersedian Voucher.</p>

<span id="example-requests-POSTvoucher-check--code-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/voucher/check/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"produk_id\": 1,
    \"service_id\": 4326.41688
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/voucher/check/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "produk_id": 1,
    "service_id": 4326.41688
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTvoucher-check--code-">
</span>
<span id="execution-results-POSTvoucher-check--code-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTvoucher-check--code-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTvoucher-check--code-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTvoucher-check--code-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTvoucher-check--code-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTvoucher-check--code-" data-method="POST"
      data-path="voucher/check/{code}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTvoucher-check--code-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTvoucher-check--code-"
                    onclick="tryItOut('POSTvoucher-check--code-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTvoucher-check--code-"
                    onclick="cancelTryOut('POSTvoucher-check--code-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTvoucher-check--code-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>voucher/check/{code}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTvoucher-check--code-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTvoucher-check--code-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTvoucher-check--code-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTvoucher-check--code-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>produk_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="produk_id"                data-endpoint="POSTvoucher-check--code-"
               value="1"
               data-component="body">
    <br>
<p>ID dari tabel products. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>service_id</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="service_id"                data-endpoint="POSTvoucher-check--code-"
               value="4326.41688"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the services table. Example: <code>4326.41688</code></p>
        </div>
        </form>

                    <h2 id="voucher-POSTvoucher">Tambah Voucher</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menambahkan Voucher baru ke dalam sistem.</p>

<span id="example-requests-POSTvoucher">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/voucher" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"produk_id\": 1,
    \"code\": \"DISKONMERDEKA\",
    \"type\": \"percent\",
    \"value\": 10,
    \"quota\": 100,
    \"min_order\": 50000,
    \"start_at\": \"2026-08-01\",
    \"end_at\": \"2026-08-17\",
    \"is_active\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/voucher"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "produk_id": 1,
    "code": "DISKONMERDEKA",
    "type": "percent",
    "value": 10,
    "quota": 100,
    "min_order": 50000,
    "start_at": "2026-08-01",
    "end_at": "2026-08-17",
    "is_active": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTvoucher">
</span>
<span id="execution-results-POSTvoucher" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTvoucher"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTvoucher"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTvoucher" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTvoucher">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTvoucher" data-method="POST"
      data-path="voucher"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTvoucher', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTvoucher"
                    onclick="tryItOut('POSTvoucher');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTvoucher"
                    onclick="cancelTryOut('POSTvoucher');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTvoucher"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>voucher</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTvoucher"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTvoucher"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTvoucher"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>produk_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="produk_id"                data-endpoint="POSTvoucher"
               value="1"
               data-component="body">
    <br>
<p>ID dari tabel products. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTvoucher"
               value="DISKONMERDEKA"
               data-component="body">
    <br>
<p>Kode unik voucher (max 255 karakter). Example: <code>DISKONMERDEKA</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTvoucher"
               value="percent"
               data-component="body">
    <br>
<p>Tipe potongan harga. Must be one of: percent, flat. Example: <code>percent</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>value</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="value"                data-endpoint="POSTvoucher"
               value="10"
               data-component="body">
    <br>
<p>Nilai potongan (persentase atau nominal rupiah). Example: <code>10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quota</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quota"                data-endpoint="POSTvoucher"
               value="100"
               data-component="body">
    <br>
<p>Jumlah total voucher yang tersedia. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>min_order</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="min_order"                data-endpoint="POSTvoucher"
               value="50000"
               data-component="body">
    <br>
<p>Minimal belanja untuk bisa menggunakan voucher ini. Example: <code>50000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_at</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_at"                data-endpoint="POSTvoucher"
               value="2026-08-01"
               data-component="body">
    <br>
<p>Tanggal mulai berlakunya voucher (YYYY-MM-DD). Example: <code>2026-08-01</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_at</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_at"                data-endpoint="POSTvoucher"
               value="2026-08-17"
               data-component="body">
    <br>
<p>Tanggal berakhirnya voucher (YYYY-MM-DD). Example: <code>2026-08-17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTvoucher" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTvoucher"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTvoucher" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTvoucher"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status keaktifan voucher. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="voucher-PUTvoucher--id-">Edit Voucher</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk mengubah Voucher ke dalam sistem.</p>

<span id="example-requests-PUTvoucher--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/voucher/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"produk_id\": 1,
    \"code\": \"DISKONMERDEKA\",
    \"type\": \"percent\",
    \"value\": 10,
    \"quota\": 100,
    \"min_order\": 50000,
    \"start_at\": \"2026-08-01\",
    \"end_at\": \"2026-08-17\",
    \"is_active\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/voucher/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "produk_id": 1,
    "code": "DISKONMERDEKA",
    "type": "percent",
    "value": 10,
    "quota": 100,
    "min_order": 50000,
    "start_at": "2026-08-01",
    "end_at": "2026-08-17",
    "is_active": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTvoucher--id-">
</span>
<span id="execution-results-PUTvoucher--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTvoucher--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTvoucher--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTvoucher--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTvoucher--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTvoucher--id-" data-method="PUT"
      data-path="voucher/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTvoucher--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTvoucher--id-"
                    onclick="tryItOut('PUTvoucher--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTvoucher--id-"
                    onclick="cancelTryOut('PUTvoucher--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTvoucher--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>voucher/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTvoucher--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTvoucher--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTvoucher--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTvoucher--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the voucher. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>produk_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="produk_id"                data-endpoint="PUTvoucher--id-"
               value="1"
               data-component="body">
    <br>
<p>ID dari tabel products. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="PUTvoucher--id-"
               value="DISKONMERDEKA"
               data-component="body">
    <br>
<p>Kode unik voucher (max 255 karakter). Example: <code>DISKONMERDEKA</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="PUTvoucher--id-"
               value="percent"
               data-component="body">
    <br>
<p>Tipe potongan harga. Must be one of: percent, flat. Example: <code>percent</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>value</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="value"                data-endpoint="PUTvoucher--id-"
               value="10"
               data-component="body">
    <br>
<p>Nilai potongan (persentase atau nominal rupiah). Example: <code>10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quota</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quota"                data-endpoint="PUTvoucher--id-"
               value="100"
               data-component="body">
    <br>
<p>Jumlah total voucher yang tersedia. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>min_order</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="min_order"                data-endpoint="PUTvoucher--id-"
               value="50000"
               data-component="body">
    <br>
<p>Minimal belanja untuk bisa menggunakan voucher ini. Example: <code>50000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_at</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_at"                data-endpoint="PUTvoucher--id-"
               value="2026-08-01"
               data-component="body">
    <br>
<p>Tanggal mulai berlakunya voucher (YYYY-MM-DD). Example: <code>2026-08-01</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_at</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_at"                data-endpoint="PUTvoucher--id-"
               value="2026-08-17"
               data-component="body">
    <br>
<p>Tanggal berakhirnya voucher (YYYY-MM-DD). Example: <code>2026-08-17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="PUTvoucher--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTvoucher--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTvoucher--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTvoucher--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status keaktifan voucher. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="voucher-DELETEvoucher--id-">Hapus Voucher</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Endpoint ini digunakan untuk menghapus Voucher ke dalam sistem.</p>

<span id="example-requests-DELETEvoucher--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/voucher/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/voucher/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEvoucher--id-">
</span>
<span id="execution-results-DELETEvoucher--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEvoucher--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEvoucher--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEvoucher--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEvoucher--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEvoucher--id-" data-method="DELETE"
      data-path="voucher/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEvoucher--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEvoucher--id-"
                    onclick="tryItOut('DELETEvoucher--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEvoucher--id-"
                    onclick="cancelTryOut('DELETEvoucher--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEvoucher--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>voucher/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEvoucher--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEvoucher--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEvoucher--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEvoucher--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the voucher. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="wallet-management">Wallet Management</h1>

    

                                <h2 id="wallet-management-GETwallet">Menampilkan data wallet user yang sedang login.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETwallet">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/wallet" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/wallet"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETwallet">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IjJ3NEd0OURPMUdobDZCU1QwN0c2Unc9PSIsInZhbHVlIjoieVU1V0tzdnFscFVKUWVGbFdQdGFqQ2pWTHVpV05iWVJUWVdQelUwTXA3em9Pb1ZUZzZ5L2poRnVWK2EwS3dkR2lEOVhHUHpqUDlwSHMyN2NzWDFVWGorMjRuL1ZJRHhlZDBvNnd2VHQ4a0N1ckttaFB4N3MxOWVoaVFrMG4xa0UiLCJtYWMiOiIxMWJlMmUxYjhlMDYzN2RmM2JhMmYwMTZjMjBlNGJkNDFlYzIyOTQ4NDdjYmJlY2RlOGRkYTgwZTBjOTg0YzA1IiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:28 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6InV0UHltaEJHMFRiakxKWTduUTJIYUE9PSIsInZhbHVlIjoiRzZIazRIMmkvU0FoTEI1cTU5QW1ONU1CMnpXb2dsb3ZPNjV4cGx3ZnNYYnh6L1FEYitWWDhqTFI5aS9zalIwZC9ZVjBtNnA2QlEvN0lCaDcwbkdTMlY5VGZrTWI1czcweUE5ellORjJDQnQyMGlIem1kdnlqRHhmSFovMHpiM24iLCJtYWMiOiI0ZTIxY2UyNjQxMzk1ODU5NjU3YzQ4NDlkYjA0OTljMzc4NmRkYzAxMTBkMTQyYzQ5MjcxY2VkY2ZlZDVkMjNhIiwidGFnIjoiIn0%3D; expires=Sat, 11 Apr 2026 10:36:28 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETwallet" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETwallet"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETwallet"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETwallet" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETwallet">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETwallet" data-method="GET"
      data-path="wallet"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETwallet', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETwallet"
                    onclick="tryItOut('GETwallet');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETwallet"
                    onclick="cancelTryOut('GETwallet');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETwallet"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>wallet</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETwallet"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETwallet"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETwallet"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="wallet-management-POSTwallet">Membuat wallet baru (aktivasi wallet).</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTwallet">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/wallet" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"pin\": \"123456\\n* @response {\\n\\\"meta\\\": { \\\"code\\\": 200, \\\"status\\\": \\\"success\\\", \\\"message\\\": \\\"data wallet berhasil ditambahkan\\\" },\\n\\\"data\\\": { \\\"id\\\": 1, \\\"balance\\\": 0, \\\"is_frozen\\\": false }\\n}\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/wallet"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "pin": "123456\n* @response {\n\"meta\": { \"code\": 200, \"status\": \"success\", \"message\": \"data wallet berhasil ditambahkan\" },\n\"data\": { \"id\": 1, \"balance\": 0, \"is_frozen\": false }\n}"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTwallet">
</span>
<span id="execution-results-POSTwallet" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTwallet"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTwallet"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTwallet" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTwallet">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTwallet" data-method="POST"
      data-path="wallet"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTwallet', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTwallet"
                    onclick="tryItOut('POSTwallet');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTwallet"
                    onclick="cancelTryOut('POSTwallet');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTwallet"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>wallet</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTwallet"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTwallet"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTwallet"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pin</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="pin"                data-endpoint="POSTwallet"
               value="123456
* @response {
"meta": { "code": 200, "status": "success", "message": "data wallet berhasil ditambahkan" },
"data": { "id": 1, "balance": 0, "is_frozen": false }
}"
               data-component="body">
    <br>
<p>PIN wallet, minimal 6 karakter. Example: `123456</p>
<ul>
<li>@response {
&quot;meta&quot;: { &quot;code&quot;: 200, &quot;status&quot;: &quot;success&quot;, &quot;message&quot;: &quot;data wallet berhasil ditambahkan&quot; },
&quot;data&quot;: { &quot;id&quot;: 1, &quot;balance&quot;: 0, &quot;is_frozen&quot;: false }
}`</li>
</ul>
        </div>
        </form>

                    <h2 id="wallet-management-PUTwallet--id-">Update status atau saldo wallet (Admin/System Only).</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTwallet--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/wallet/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"balance\": \"100000\",
    \"hold_balance\": \"5000\",
    \"is_frozen\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/wallet/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "balance": "100000",
    "hold_balance": "5000",
    "is_frozen": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTwallet--id-">
</span>
<span id="execution-results-PUTwallet--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTwallet--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTwallet--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTwallet--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTwallet--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTwallet--id-" data-method="PUT"
      data-path="wallet/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTwallet--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTwallet--id-"
                    onclick="tryItOut('PUTwallet--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTwallet--id-"
                    onclick="cancelTryOut('PUTwallet--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTwallet--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>wallet/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTwallet--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTwallet--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTwallet--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTwallet--id-"
               value="1"
               data-component="url">
    <br>
<p>ID Wallet. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>balance</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="balance"                data-endpoint="PUTwallet--id-"
               value="100000"
               data-component="body">
    <br>
<p>Saldo wallet. Example: <code>100000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>hold_balance</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="hold_balance"                data-endpoint="PUTwallet--id-"
               value="5000"
               data-component="body">
    <br>
<p>Saldo yang ditahan. Example: <code>5000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_frozen</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTwallet--id-" style="display: none">
            <input type="radio" name="is_frozen"
                   value="true"
                   data-endpoint="PUTwallet--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTwallet--id-" style="display: none">
            <input type="radio" name="is_frozen"
                   value="false"
                   data-endpoint="PUTwallet--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status suspend wallet. Example: <code>true</code></p>
        </div>
        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
