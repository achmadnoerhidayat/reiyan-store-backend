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
                    <ul id="tocify-header-payment-method" class="tocify-header">
                <li class="tocify-item level-1" data-unique="payment-method">
                    <a href="#payment-method">Payment Method</a>
                </li>
                                    <ul id="tocify-subheader-payment-method" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="payment-method-GETpayment-method">
                                <a href="#payment-method-GETpayment-method">List Payment Method
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
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: February 13, 2026</li>
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
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/auth/refresh"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
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
set-cookie: XSRF-TOKEN=eyJpdiI6Im02bmdMNm05TUNDejFDY1J1dG9teWc9PSIsInZhbHVlIjoibUtpazJEeGpKMXFEZGNjSDhrajVTaEFxdzZwbjM3NU01VTA0Vnh5UW1PdmpEMXBBalFsclk2WklJU2Mxai9raVlrWlNRTzdCM2xzbHFXbHhQWlhQYm9qQTg4Q0Zqb0h2eFY4ZlV3UUFFK01FdDV2OWpFT1B4dFh0dFkrZjhrY2QiLCJtYWMiOiJiZGFkMDIzZDI0ODAyOTNkODc4OTk0OGEzYWNmMDkyYTMyM2ZhZmQ3NDYzZDliZjUwZmMwNzllNDU4MmNlMDdlIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:49 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6Inc0bTRMaUFWU3dxVXNhaXlkU3lLSnc9PSIsInZhbHVlIjoidC83U1o2OUw3VXFLNENmV0JLSGJmd3V6R1M3SGxWeUJTWksxaXJtQjBjdkw3R3F2UVdONE5XTk9GLzFYZUxOWWN5UFYvdDBhbkQvODZmVTlKeTNaTUJ5VkJqci9rYmFSY2YzNjd6Ryt5Mjl4OHlWWm4xTHFCVjg2MGVrMHNPdUsiLCJtYWMiOiIxNmMyNWU0ZWY4ZTBhYTQxNGU2NDFhNGYwZTU5YjEwNzY3ZTRjN2I3MjJjODQyZTJmMTQxZjYzMzY0MGJjNmFkIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
set-cookie: XSRF-TOKEN=eyJpdiI6IktOSWIwOFhlcVVOcUdiT0tuMzU0ZXc9PSIsInZhbHVlIjoiNU1saEVveC91YlZPRk5PYVVmM29Uclk2YUxqaCsvUHZiVGZQVnN3eUFEcUVMY1dKdjF6WTFIWXMwWktUeTJuaWRZcWRsWUdjeFFRMVJLRDZUOHRaeEJFcjVmL3pzS1ZuY3IwWVI1V0tjVDFCaWZEeDhOR1Z1Q0dydXQ1U28wS0MiLCJtYWMiOiI5NmJiMjE1ZGQ1ZTZlZjI2ZTI4NzM3MWEwNTkxMWM0ZjE4OGU5MzEwZTg4YzI2ODJjODE0YWJjMzkxNjAyYjE0IiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IjZIUjROY3AwR0gvTEJ5dDd5VjZ6TWc9PSIsInZhbHVlIjoiaDBMY2NyVkR3T05kV2dKMXJHRkxnNEZUTzRwa2tkRjZpdkg4U2hLOTM0aUJWdzBTYnpKeDZoMzRFOG9mT25GL0RLamhuaFUycTduR1NtdHVwd2RuV0xnWmhQNlljcmQ0dmN3M3VZd2pxRCt3dGJqUUNaOUk0V1ZWK0hhZkhCVGgiLCJtYWMiOiJmODQ5YTY3YTZlZGU5OTVhZTQwNTliYjMxNDNlZjA1ZDFkMjIxZGU0OTY5NmE3MTRlNWI3Y2RiOGYwOWJlZDNhIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
    --form "image=@/tmp/phpVmCWsR" </code></pre></div>


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
<p>Gambar banner. Must be an image (png, jpg, jpeg, webp), max 2048KB. Example: <code>/tmp/phpVmCWsR</code></p>
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
    "http://localhost:8000/banner/16" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=Reiyan Store"\
    --form "link_url=https://reiyanstore.com/promo/ramadhan"\
    --form "starts_at=2026-03-01"\
    --form "end_at=2026-03-31"\
    --form "is_active=1"\
    --form "image=@/tmp/phpOwnBjD" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/banner/16"
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
               value="16"
               data-component="url">
    <br>
<p>The ID of the banner. Example: <code>16</code></p>
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
<p>Gambar banner. Must be an image (png, jpg, jpeg, webp), max 2048KB. Example: <code>/tmp/phpOwnBjD</code></p>
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
    "http://localhost:8000/banner/16" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/banner/16"
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
               value="16"
               data-component="url">
    <br>
<p>The ID of the banner. Example: <code>16</code></p>
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
set-cookie: XSRF-TOKEN=eyJpdiI6IjhpVmdjUmRoSWJtanE4NG8yTTNNcFE9PSIsInZhbHVlIjoidUdlWVpTWk4vY3Z2eEhoVXVFZHZ1ekljVzVZQzFza1pWSlZMZkluZy9GSHhRaFA2dHA3S3R6bnNvNmJZSXQ5Wk1lL3lwQldTeVplMk00OHZmR0tSRHYrK0V4QTRGRzdhYkwzS3R1YmE1amFuZ1I4OWdNTDlGaWlMWTRDbk9GYnMiLCJtYWMiOiJjNjkxM2ZhNDFkMThiZGU0N2RiYjIwZDU4ZGY1Y2RiYjc2NzYxMWY3ZWE3ZDAyMzMyYjdiYmEzNzljYWRhYTUxIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IjR0a0k5SjZsZjRLNnpSckxwT2pROXc9PSIsInZhbHVlIjoicHVjTXI5OWpwenZreTIxS2hVUGhPVmlRelBhaGkzWUdrWVo1ZG9vZnJWUW1SYWdWZUhjYUlZVG1PTVFnajBCZmp1UURsSXZYTHJYak5kTHVNaTdsaTEzUXZyd0xEUnpkWnJYL1ZicGc0TGlNR0hlYStYdFUyM3o3dVllVnByWUEiLCJtYWMiOiI3MGRlNGQ0OTk3NWYyODJmNWNmZTU3YzcwYmYzNjBlNzEwOWRmNzQzNDNhNGVjMGE5ZGQwZDFiYWIwZTA3NGZmIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
    --form "favicon=@/tmp/phpU46AIP" \
    --form "logo=@/tmp/phpdIS7r1" </code></pre></div>


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
<p>Foto favicon config (PNG/JPG, max 2MB). Example: <code>/tmp/phpU46AIP</code></p>
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
<p>Foto logo config (PNG/JPG, max 2MB). Example: <code>/tmp/phpdIS7r1</code></p>
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
    --form "favicon=@/tmp/phppBViz8" \
    --form "logo=@/tmp/phpke5b8D" </code></pre></div>


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
<p>nullable Foto favicon config (PNG/JPG, max 2MB). Example: <code>/tmp/phppBViz8</code></p>
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
<p>nullable Foto logo config (PNG/JPG, max 2MB). Example: <code>/tmp/phpke5b8D</code></p>
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
set-cookie: XSRF-TOKEN=eyJpdiI6Im5nSUpnMlBKRTF6VW9BY3FBUm1scXc9PSIsInZhbHVlIjoiS0lUMzYvK3hEU0UzLzNiejZneEUwQndiK2hoM2VjTDJLWUcyUi9RTTlzZmV4cFNVd2c3cUFtdThBNEJaZHl0dXNLQ3FTYyswVHNaRzBNOTNLYkZCSUhzTk9kSEJscVJtYkpqSU9URmxqVmNtQWc1ZlUzQXk1dXNoMTZPMitGMkoiLCJtYWMiOiJhZDE3YmE3N2I4ZGUwMDM1ZWM0ZTJmZDNlZGJiOTFkOWY1ZmJmNDAxNzgwMzRkNjMxOTg4ZWE0Mzk5YmExZGRlIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6Ik50eWJuOWZMek1IeURRamtzRVRrcUE9PSIsInZhbHVlIjoiTS96UWFNektraGV2VzEySjN0c2lLL25Mai85VFRlemxiLzJ4Z1BuTmQ3MDFxV2hQOWYwVm9TQjZzWnJhOElJSzFteXBoeTNtYjNSYjRndHhCOXpZVTJNSUhCVFQvd0VtSnBwMENXMkFHUXRxckJjb2dDY3ZsRlliWWJET2E0bTkiLCJtYWMiOiI2ZTYxMmNmY2U2NjY3MDNlZTczYTk2MTMyOWI2MWEyZmQ5YzA2YTkwMDQ4Y2I0ODVmYWYyZmRkNjQwY2RlODNlIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
set-cookie: XSRF-TOKEN=eyJpdiI6Imp0WlVMN012amFGeExGRTZrSkRQSnc9PSIsInZhbHVlIjoiV0dTZUZmZjRzc1JZUnRZWWg5eUNUeHl1V3NDdWt2R3FvMGF0bG9oUGtoNGxBS0UyK3MvNTFnT1hPYWhYS3hRQkdHdVBVVHNGTFRhc3ZxSW5heC93MDhBbG9qaEU5bUp1SDdlRE1xTWRaZjZHU2ZYSU54dk95T3JQK3oyWTdhMkwiLCJtYWMiOiJlNmNkZTFmNWEzYjQzNTgxNmUxZDM1MDk2MTNhYzA3ZGI2MmVjNjVlNWJjODY1ZjRjOTIyZTk1YzNiZjJiMGUxIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6Im9lbkNCdWFlUUE4NE9wVTVWVlNvemc9PSIsInZhbHVlIjoiTVRkMk5uNzMzYkZvd0NkTC9pNGIzTXV0dGxlN1ZmT1NIb0MraG4yRXp2anhHWUpnUDllaW9XcWJLZSsyNjVDNWJuUHhaRUgzcFVQdy9IeStSaWFBelljc29Ic1pRZXZFRGc1NDBkWjlpek9NREZhTy9CRWNGNS8za3l6NGlxaWciLCJtYWMiOiIwNzhmMzVkOTc1MWUwNTJkMzg1N2U3YjliYmM4ZDc2ZWQ5ODliZDNkMTE1MGZmYTY0YmJjYTE2OWFhZDU5ZThmIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
set-cookie: XSRF-TOKEN=eyJpdiI6IjdMZ2lDWFluUlAvVDlPNGMwaWUrM0E9PSIsInZhbHVlIjoiejJxUWkrOHg2RjQ4RjRCeVBFSnF4Wk51MWdoNHI3QlRYaFBjVTFhRDE3ZlFpckpWYWdiVHpaZS94b3RDVXJ1TjhlbFhFQzdWMDVQN2ZzMDNDaG1obURBUThNckJyOUtKclM3amF0ZUxYU1o2RW9wQzBHeVpwaTQ2Ykl0Sll4MU4iLCJtYWMiOiJlNGIxZmE4M2NkOTQzMjJmNTE1Y2RiYzYxMzA0NzM0ZmQ4ODdmNThiODA2N2ZkZGRkMTQ3MTdlYWM2Y2VjZDc3IiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:50 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6ImovTHE2YlY0ZzJBbEMwaTJneVRhMWc9PSIsInZhbHVlIjoiMFpVYnZxWEIwNm5QQWwxM0xvQnJKa0lIMWVaQ2xOaXNScnd1WmNUS2kwYjFka3Z4TjM1cmpFcjZaekhRWlBZQ3hRVytFLzFoaEdSbVJwLzRlNVV0Qkk5b0dieHl6WHk3RXMwejVtZllCSGs0cUFFbTZ6QjZ3bS9qc0R3NnhBYkciLCJtYWMiOiIwOTdiNGFiMDgwNzJhMzQzMDc5MmNkNDlkYWY2NTMzZTIxOWQ0NWNkMGZmYzQyNmFlOTM4NzYzYWI0NDhhYjQ0IiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:50 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
    --form "image=@/tmp/phpoTfRGt" </code></pre></div>


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
<p>nullable Foto logo kategori (PNG/JPG, max 2MB). Example: <code>/tmp/phpoTfRGt</code></p>
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
    --form "image=@/tmp/phpdUCd62" </code></pre></div>


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
<p>nullable Foto logo kategori (PNG/JPG, max 2MB). Example: <code>/tmp/phpdUCd62</code></p>
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
set-cookie: XSRF-TOKEN=eyJpdiI6ImdNMy9FQ21LTGR2bE9pYmt4S0NXWXc9PSIsInZhbHVlIjoiOVZnaG5RaFJpMUI0MUpxZCt2dDAyMklPUm1RSkNTV2xtV2tubU92VWM4TGx0R3VYM0dGZ0c5ZE1RcGtsUDU3eEpHR2JycUhqRjgxQWEzbEdja3MyVUZ4Ynh1TUpQT2FqL0RLTk1kdS8zSEtoZ3dMb1JLUDl6V3BKd29kaDZoNk8iLCJtYWMiOiIyMmY3ZmEyNTg5OWJmMWVkY2IzM2EyN2M4NWQ1OTVhYjU4YTgzZjNkODE2MjdiMzU5NjI5YzhmMTJiNzJjMDcxIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:50 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IkJkVnQwNUNCRzZlYk1pSGR5THBIdmc9PSIsInZhbHVlIjoidEEvbVI5ejY5UzJwcmcwaUMxZFB0WjRUY0F3TXE5SzU0UmFGRHBUZktud2ZGTkFHRksrbFhMOUdPMjk4N25jNlFpVGh6RXNQWHpDV2JhaXpQNWdBZ0trMXowVGRsWWpRMGJPSWJGd2R6VkdRZlFuZWpxaEpOWmlFV0JrWk02NGoiLCJtYWMiOiI2YTAwNjEwNTA2ODg4OTRhYTQ2NmU0Yjg5ODViMTJjMDg0Y2E5NTExMjIwNjllYmQ1MWZlZTYwYjJiMzhmZjRlIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:50 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
set-cookie: XSRF-TOKEN=eyJpdiI6IjJaUXBncjNadHkyRFFwcU9QQnZJUkE9PSIsInZhbHVlIjoiMWlURHFaYmpacEVFYyt4alhEekkvMUZnV211YjlDS3lqOU9wcURCSTVjaEZPTjh3dFk1Tld1OHlpTnk4eHF0eXM3TlpJVjdqZFRIUWV5Y0hDYlFZNVRCdVBydGRHbFVYVGJkSUw3QWVxSEZwSnZQZ1pQV0h6c0Z6WTlSMFkyUDMiLCJtYWMiOiJmODFmNDVmNjZlMTk1Njc2NGFiOTY0M2U5ZjFlNDUyNjI5NGUzMDAzZWI1NGU2NDUxMTg0ZmZhMzM4ZGVhOGRkIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6ImJRN1MzL2pCb0U4K3h5aEZrNFZ1RkE9PSIsInZhbHVlIjoiYituUUxOeEdaalo5bENOT3ZHSHpORFpZV3hIcHhBM2NVaGpsbHh3UGlwYlRQZWFaUmhBakVWZ0JDNXlRd2dPdzJId1lxc00vaE5iRlVnbEg3SWJ0NDJPdDFXR3ZRQUVpZ1ROdk01eDNMTElzdW1oN3U0d1J3WWFJeTVHWlB0TWkiLCJtYWMiOiI2N2IyZWVkODUxOGQyNTA0YzFmNDNmMDBlNzBkZmMyZmFkMzFmNGMzNDVhMGEwNDZiNDhjNDIxMjcxNzFmY2VhIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
    --form "image=@/tmp/phpUQbKIF" </code></pre></div>


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
<p>Logo gateway (Max: 2MB, Format: png,jpg,jpeg,webp). Example: <code>/tmp/phpUQbKIF</code></p>
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
    "http://localhost:8000/payment-method/16" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=Dana Transfer"\
    --form "code=DANA_TF"\
    --form "gateway=duitku"\
    --form "fee=1500"\
    --form "is_active=1"\
    --form "image=@/tmp/phpTHM9my" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/payment-method/16"
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
               value="16"
               data-component="url">
    <br>
<p>The ID of the payment method. Example: <code>16</code></p>
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
<p>Logo gateway (Max: 2MB, Format: png,jpg,jpeg,webp). Example: <code>/tmp/phpTHM9my</code></p>
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
    "http://localhost:8000/payment-method/16" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/payment-method/16"
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
               value="16"
               data-component="url">
    <br>
<p>The ID of the payment method. Example: <code>16</code></p>
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
    --get "http://localhost:8000/produk?search=architecto&amp;slug=architecto&amp;limit=16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/produk"
);

const params = {
    "search": "architecto",
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
set-cookie: XSRF-TOKEN=eyJpdiI6Imc2VHVzQms5Ryt3RGxkazFOeDdKdUE9PSIsInZhbHVlIjoiK3ZwajFvTS9kYkFHeVhNUGpWOHZXVUFiRnpYZXdyZWdkRk5iRDFqWVduY3hDWXVmR3pwdjlnRlRyOWJuQzFpMU16c0V4UFdEVExrSjhrWGVFalE5OUc5c3hUbDRubkJyS3FWYVFGYXNwTWs4ek0xTGR6cnZ2ZG1UdzRQZi90WUoiLCJtYWMiOiI5ZDNmNGQzMWZmYWFkZjQyNjI5ZTM0YzlmMWQxNWQ3MTZmMWFiODlhMmEzMGEyYTc2NTg4N2YzN2RiOGVhMzBjIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IlZ0WjZhdzZIODlES2RQQUhPa2RaL2c9PSIsInZhbHVlIjoiSlp3aFEvSXc1c2Jkcm55Z3JLdVNjUE1NZldKbkpUV3MrWktRaDkzYmtWd09FeHBDMTA2VGRjcTlkMkN6QVVFWVRtYVFwaDM1Vzg0aWpDejF4Nk0zc0NROGNXNk04d1JtVG1wUzE1VlBzOTNJSy9ham5id0kvN0krRjhoR2RsT2giLCJtYWMiOiJlMGUwM2IxNzBhYzRiZGY5OTgwOTgxOGMwMzcyYzJiYmYzZTUwMWE0NTNjOWU2OTJjYjU4M2ZiYmI2MmJhYzZhIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
set-cookie: XSRF-TOKEN=eyJpdiI6IlprckhNdEV3SEdMRXVPZ3BOT2NBMXc9PSIsInZhbHVlIjoiS1ZIY0xqTlU4ZEVPL25Ld1RNUENWTzNQV1NabjdOWDFsTGZYTDlEWkk5N2R0NFVpRWRsdnNzN0N2Vytrcm1Qd3NYOFR4U2MvQ0FZalBiK1p5YXRKc050cGg0UzdMSU1LbVhtTCs0OHgxMW90TUJTSjUvNlAxT0JTZDZ1NTI5QWoiLCJtYWMiOiIwNjFmNDg1MTVmOTA2NzdhNDFhNTFlNmIwNzVkOWE4ZjJlYTQ5YTg5YTU5MGYzOWNmODcxOWI4NThhZDQwMWYwIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IkpxbS95ejRUeStvR0tmaG5wWXg3SkE9PSIsInZhbHVlIjoicnB5c1hMY1pxUFJrME5HVjZ4QTIyUm4wVFpEL0dwSjZvTFdoMXlLTjE4V3NtbzBWSjh1WnUyTkxxN0U2QlhkaENMcHBJODgxdmJNM0xNWmFHa1NZcEFlQ3VROFRKYVRRSjJYUCtlcSthTVBQOEhSbVB4dWxTamU5NlNzcUVZaUQiLCJtYWMiOiI2MmMwNDgxNjFlYTUwZDk4ZWYzOTdkNjJjNGRkMzM4MjRjOTg1ZDk2MWRlMGFhMGEzMGZlYjU3NmI5MWVjNzc5IiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
set-cookie: XSRF-TOKEN=eyJpdiI6IjhNY1BRRHUwdFp3L0RpWThDVHA2NlE9PSIsInZhbHVlIjoiTFZVTkw4Qm5kalBIRDRZaHVsYUxOdm9QV1p3THBiT2FzWm5hUzFlTHRnc05hQVNkOGczaVZIV3JzNndHdDVUYlVncTRaenoyLyt6ZkdzdnlEa2hCRENnVUNEdGtRNmI4Zy9FZGRodjByM2lIc3VpR1NSdCtQYk9zaEFYS21IV1UiLCJtYWMiOiI4YWVkYjhkNTAxZjYyZjQ5Njc0YzRlYWRjYjExNzBmOGU4YmYzZWM2OGJhZDkxMTU2ZTJkMmQwNmY0OTFhOTk3IiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IkJEcENac29veW5wS0hnWnNJbFprM0E9PSIsInZhbHVlIjoiZ0tQbDNxWDNJbS9SVmNKVzNuRko1V1RuSEt4N3B0SmQySUNUMjJBNlNROEtZN3loaUszUHplSFowd2wxODRLYTgzRVdKUUg2OGlJN0o2OU56QlgvL0J1b2tQbjJkMHk5ZmxhdmI5Sm5sYTRQbWZTaUpyZlRUQ3RRN2hjRW5TMS8iLCJtYWMiOiI5MTljYjQ1YjU0MWI2NmI2NWExZjZlZWY0MDZkNDc1NzViOGNhY2NlYmY1MTk3ZTg0NTcxNWM1NmVlZmNhMTI2IiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
    --form "is_check_id=1"\
    --form "is_check_server=1"\
    --form "is_check_name="\
    --form "faq[][question]=Bagaimana cara topup?"\
    --form "faq[][answer]=Masukkan ID dan pilih nominal."\
    --form "logo=@/tmp/phpPTmSBZ" \
    --form "banner=@/tmp/phpdgtNHp" </code></pre></div>


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
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="logo"                data-endpoint="POSTproduk"
               value=""
               data-component="body">
    <br>
<p>Foto logo produk (PNG/JPG/WEBP, max 2MB). Example: <code>/tmp/phpPTmSBZ</code></p>
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
<p>Foto banner produk (PNG/JPG/WEBP, max 2MB). Example: <code>/tmp/phpdgtNHp</code></p>
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
    --form "brand=Monton"\
    --form "is_check_id=1"\
    --form "is_check_server=1"\
    --form "is_check_name="\
    --form "faq[][id]=architecto"\
    --form "faq[][question]=architecto"\
    --form "faq[][answer]=architecto"\
    --form "logo=@/tmp/php4IAKdw" \
    --form "banner=@/tmp/phpMllC7q" </code></pre></div>


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
<p>Foto logo produk (PNG/JPG/WEBP, max 2MB). Example: <code>/tmp/php4IAKdw</code></p>
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
<p>Foto banner produk (PNG/JPG/WEBP, max 2MB). Example: <code>/tmp/phpMllC7q</code></p>
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
set-cookie: XSRF-TOKEN=eyJpdiI6IkZ1TWpjb2RXK0psS3N5UUtMZ0xSanc9PSIsInZhbHVlIjoiQ3M4RmhIbGlLTHRXRXgvcmpLVEp2UlRINlR3RVVkb2pjNWt4MjRLWCs1NmgxRzk3UWRHbU9CdUlUalRkeFBTa3FkZDJ5Vm82WHJJMDIvNXZRY2dPakJHUmlpNGtGWEF4MGxWdjBpMEx2TlNQYlJqNnd6YkU1aDlSbkdFVngxWFEiLCJtYWMiOiI5OGRiMGEwMjY1OTY2MmMzMmUyMjQyYzhlNmE0MDU0ODBjNDI3MzE1MzU0NDZhMmIxNDQ1ZTNjNDM2OTgxMTU5IiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6Im1pQXRQKzh2MmxqY0ZzRG5lOEVwaUE9PSIsInZhbHVlIjoiTjNLSWZZY1VsTHVNWVNWSVpIYmNlVHVwNWw5VHZKTDcrMEFna0JqR2piU3JNMEZvTlN2ZWVSRVh2dHlTRVFMVGpBWDlkUmZsVXFSWXgxdHdIZXo5cFQySi9taWJBSXFHSHZWakV0R2NieUQ5dWdjeWtQaTg5QnhGeDFVRGF2Q2QiLCJtYWMiOiIwOWQwZDNjMGQwYmFmNDVhZTBlOTE4ZjZjNDcxOGEyZGFlYjZlOTYxNzFhN2NkZjMxY2M1ZDM4NDRmYzk3ZDNmIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:51 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
    \"payload\": []
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
    "payload": []
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
            <b style="line-height: 2;"><code>payload</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payload"                data-endpoint="PUTprovider--id-"
               value=""
               data-component="body">
    <br>
<p>nullable Data tambahan konfigurasi (API Key, Secret, dll)</p>
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
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InhuNnFiREZDbEp1R3dZZVUyNW1hVHc9PSIsInZhbHVlIjoiK0ZMc295QXoxdTJDUi9HS1NpZWhJQ1Fzb0dSMkY1Y0RXWWI1YzRwTzdST1Z0S05qL1dncHVwZFo3YWk5ZTd4L2czd09VUlFqM05PQ0t2SXl6cTM4eFk2TFpOeHpYanlhMTIrMW5CZkpiZVNoSEtYaVYvdk1wVW5zbWlTWFY5YWoiLCJtYWMiOiI4OTY3MDY3MDU0ZWY5ZTY0ODIwMDNhN2U3ZjRmZGRlM2EyZmQ5ZDcwYzc3ZjlkM2U2ZDgzMmUyNWI3MjI3M2ZjIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6ImM4ZWQyNDNyL056ajRkY0tsTUR0aHc9PSIsInZhbHVlIjoiaGQ0djUxVHlvUXdyV1k2OWVYU0tCLzJMVzUyZ3VEemVwK3Z2ckJ6anhJWlF2UThsSGZFTUM1UUl2UkRHdkhnOXIyVy9PcytvdmowNVRKTFg4TVgrUGptcWFIOUw2MlRZdmdrK1VpZElwV05sTUJadExuT0ZRNDFWOUN5c3cydnAiLCJtYWMiOiI2YTQ1NDE2MjJkYmRiYTc4ZjA2NDAyMTNlNGNkNmJlY2M5ZDRkODI1NmJjNjI5ZWIyODliMGNkZjI1ZTBhZGQ2IiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
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
set-cookie: XSRF-TOKEN=eyJpdiI6IllVYXE5cjZJVnVOM3hnV3VmbWRZWVE9PSIsInZhbHVlIjoiMG9ERWVzVk9VZzdZeVRmaEFlZWtxRkhTTWllM0NzOXltbWI1TkdJakxneEpncGJhbVFrdHh0MUpKTzVmVFJySHd6YTRyV3JtVU5Ya1VaaE9QV1lIeE04WWF2V0RwUnVOeEcyNzdVb085V1pla0JRdkZ2Qmgyb042OVpTRUhXTDIiLCJtYWMiOiI0NzgwMTQzNTdiNjJlNjg5YmEwYTdlNGRhNWY0MGU2YmYwNTc1YmYxMDFiMTczNzQ3N2ZhODJhZmY4MTA5MjFjIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6Imp6UWx6dUxJYjh6RkU4RDJjeHh6enc9PSIsInZhbHVlIjoibXFpK2Z2R2pIMHNHTXZYVmxxUEJTSUZIWmFuQUFyMk94SklPWFN3OWF6dzNEd0dERGpuL21iQXJ2N2Fsa2lIMWhFemYvUHRqUnZuTWtXbjY1OTMyc25XSDNRczZocHlQa09aL0ViMDc0STFlZGNTQithaUNualpOWnhucWxaVVEiLCJtYWMiOiI2YTk2NDM2ZGZlOWI2NzUxN2YyNTliOTNhNTZlZWVhNDkzMmE5NjVhMGM5MzhjZDc0YzM2Y2RhZmE2MTAxYzIyIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
set-cookie: XSRF-TOKEN=eyJpdiI6IkJzajV2K21DYXhCWHFkS1lCbGwrREE9PSIsInZhbHVlIjoicktEcWRNSk9mWmZtOUZaOHUreTExTkhIVmI5OFJvb1hCQVQ5OHBwdE5LRll2YkRoNkdFTlRUeXM3YUgzM3EvZ1hyTzB4LzNiVFJTL0hzR3BkQi8xdGdHVExsZisxSTNsUUFNZGFWODFoMWlia1JtTm5wMXc0c3BWNXl6OXFLZS8iLCJtYWMiOiJlOGNlYzNmNDU0ZmY1YmRkMzM3NjUzNmZmZWQ0ZjQxNjI1YjNlNjlkODJmZGNmMWRlN2I1ZmExNTVjM2Y4OTliIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IkxURWxIREdRWTUrcmJydzFLQ2FueGc9PSIsInZhbHVlIjoidFJXRFZDVUFhRTVHeU1xM1R6dUw0WVp4SGhJbFBzUG1xemd0MklSeTFYbnh4cVp6N2V3VUNjSzhjcmVnWndyYms5YVZ6dysrdmErcWxFa252YUlpOGZ4SWhEYTU1UDVVUlZSSTB3SGNQLzdLZW5weTZxQzA0Qno2cUVqMmJrL3QiLCJtYWMiOiJhYTc3NWE2OWQxZDVmNzQ5MGU0MDcyZWFiYTUzNWQ1NDRkMzQyZTNiNzBlZWVjNGU2NmI5YTBiZmY0N2MzZWU5IiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
set-cookie: XSRF-TOKEN=eyJpdiI6IkJXeHFiT0h3L2ltQXFJNU9sWExiQnc9PSIsInZhbHVlIjoiVjhMZU9OQTBHMDZYNzJyRzBWWDltYUV0aXpSV3AvMkxDdGhRaFhqbGc5Sy9nUEV0UHc2MWxueUxiaFNUTmRraHFPT0U3dWhqSVdHMzBFbGpvYUJxV3Q5UHlJemloMkN3Z0o4TUo4dlhHWnJXUkdQMnhYcUZ2TW9OQXFIc2MvV3UiLCJtYWMiOiI3MjA1MzYwMGQwMTc0N2QyY2ViOGQ2YzcxM2FhODdmOTZiODY1YjcxZTE1YjdmOTlkYWI2ZjMwMmUyOTUyMmIzIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6Ik1SRzB6Q3NFbW5iWXNCWnl1VTJYaVE9PSIsInZhbHVlIjoiSmdvNmpyQjVzNnlEYlFxaWVKWVB4YU9lMnZHVzV2TWI0TGhHM3FGbUFEMTR3ODVOMm13aFQ1Rjk5SExYTUdTMXVtdThWbUI5Wm5ML1pnQjUwVzRJVmRBSUJRaCtsT3IwejJtVm1JWXBndUpIUG9pN0pNaG5lWmdnVEJ3YUQxZEQiLCJtYWMiOiJjOWRlNGMxOWUwNmU3ZjAwOTA0ODcwYWY5MTlmMzljMjhjMTA3ZGRiYzFhMWZkYjY3Njc2YjY3ZWVhNzVjMWE2IiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
set-cookie: XSRF-TOKEN=eyJpdiI6IlZTTGExSFY4eFJTVGJGQzNldndhQkE9PSIsInZhbHVlIjoib203MXBPNXVIV0RvNVk4VlJMLzNSQmsydzlWYVFHRDkwRENkblVOYXptaGt1RmJ1dWZUcE80ckhoQlNqNHk2K3NReGtxUzgxdVhvb1lsQitJUGV2bk9YRkhGczJrT3RTaE9NRjE1OXordEhob0dBSStRMXRCVk9UUXZSQ1VpNXMiLCJtYWMiOiI1YmZiNmU1NTU1NjU1ZjVlOWYyMjYzOWZiZDU4ZWEyMWZiNDZiZjEzMzc2YTZmNGI1YjQwZjY4N2E4NDcyYzVlIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IkZyQTZTUys2d1p6MlM1TFVRcC9UWkE9PSIsInZhbHVlIjoieHNRWUtyTjBKZUlicWE1VUx2akxjN2ptUHhuNFdJQlpBbVlkQjh1ejE2blVaQ2Qza0lDcmxMOXcvUnhRRjFsc21PYTJOZkFSdXlrbXhXaVRrUTkwemtnMW1HWURUSTB0ckJ5ZVpqQjg4akNDZzRsY0dueW52c3lIMjJLMHRJZDciLCJtYWMiOiJkNzM1YTAxNDNkZTkzMDM0OTczYjIzOGE5MGYwZTMwM2YyZWVlNTAxMGQ0ZjJmYzk5MGZmNjY4ODk1YTc4NzdiIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
set-cookie: XSRF-TOKEN=eyJpdiI6IjlXVk0vWGxsbVhpQmR0RWg0V1ZyYUE9PSIsInZhbHVlIjoicGhzUitFRm83ck4rNFZhVUlyL1cwODhXeVlBTzBPU2FyN2hPQTBGTVdFOHBuVGN5K09HeUV4c1hyaVhLb1F3OHRwS216d2ZOdHRCUUdlS1l2UTZSdUhZbC9ZZWhBaUlmRzB0L1RvYVV0TXVVdGRjYjNaYXJ6Y0xQcm5XQzRxcmYiLCJtYWMiOiI2ZTU3NTUzZDNkYTFkZDNlZTIzNjU2MzhkMDNjN2U0OTFiYmE2MGZhZmM4M2QzNGEyODE2YTRiZDM1ZGZlNzYyIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:50 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IllLSGVhRlpYVmRER2dsZWNJUUJFY0E9PSIsInZhbHVlIjoiNHo5dEsrMGUweUxES2piSWIxQ3o0N214ZlFKN2t4anNhMGEzazBWZmN4ZUxkR0l3Y3pvbkRjWloxcFQweUVOeHd1ZThKUWVQY01HMGROb25jdmVob2dhcy9GOVdWemw5a2F6ajkwZzRQbE1JQTg3NlNhWkRXamRpVTdyZk1BV2ciLCJtYWMiOiI5YTBlZmFlZmE5NTM5NDgyNGZkZDQ2NzJhODM4NDI5YjdhYWY1ZjhkM2VkYjlkODFmOTVkODMzNjNlNGQ0OTEyIiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:50 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
set-cookie: XSRF-TOKEN=eyJpdiI6Im1hU2ZoM1FFL0kvOC8xSGVBbGlWV1E9PSIsInZhbHVlIjoicTlwc2E0Vld3MllvUTN3ZmdXME4wMkl3RjhaT1I3M0hKcTRXYVNKVy9pTWZ2aFN0MTFuV1E1Mm1ldUdxUmxvTit0a3RmNzVlTm9qc0gyWkhVRjNiQU95WGJEbXZJZXFiN1NYWmprU2RRdW12RkR3SFNkNk0vTWkvamlueUhrMWYiLCJtYWMiOiJkZTYwZGQyOGU2ODBmYmZiYzM3ZGY4OWFhYzE5YWE2MTZhYTdhMjc1YWM1ZDU4YzUxYjlkN2M5Y2E3ZWY5Nzg2IiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; samesite=lax; reiyan-store-session=eyJpdiI6IlRFc0t3U3lCUThXWlUwbFdjZG91c2c9PSIsInZhbHVlIjoiYmtjdFJVR2Q3SXgvbzlxYUdpMmN6SEEwZytyY0gvcjJZUDhrNzdYWTY4bmJEZUx2NlYxZWFHTDIwM3BqLzdMcTZ4SnphdjVqQkY0b1NBaXI2OG1DYVBFN0xpVU5CY0tmc0ZWZnh6RWtlSlpYS3RiMTdPOEpyNk1yd3lZYmtXSEIiLCJtYWMiOiJhYzMzZDg4MjdiNDdjNjZjODNjZDcyMDQ4NzNhNWYwYWExZDJkMzRjZjE4YWRhM2JmMTU1OTNhZjkxNDAwMmE4IiwidGFnIjoiIn0%3D; expires=Fri, 13 Feb 2026 19:55:52 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
    \"produk_id\": 1
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
    "produk_id": 1
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
