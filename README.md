# Mini Project 1: Product Information System (Desain)

**Mata Kuliah:** Pemrograman Web — Pertemuan 2
**Sesi:** Desain Arsitektur (Tanpa Coding)

## Tujuan

Merancang struktur blueprint sistem manajemen data informasi produk siap pakai, berbasis konsep teori yang telah dipelajari.

> **Catatan Penting Sesi Ini:** Pembelajaran hanya berfokus pada pematangan blueprint konsep arsitektur desain secara logis. Belum ada implementasi kode pada tahap ini — seluruh file PHP yang disebutkan masih berupa rencana desain.

## Arsitektur Sistem

Sistem dirancang menggunakan pendekatan 3 layer (pemisahan tanggung jawab):

```
┌─────────────────────────────┐
│   Presentation Layer        │
│   index.php                 │
│   (merender tabel HTML)     │
└──────────────┬──────────────┘
               │ require_once
               ▼
┌─────────────────────────────┐
│   Processing Layer          │
│   functions.php             │
│   (kalkulasi & logika)      │
└──────────────┬──────────────┘
               │ akses data
               ▼
┌─────────────────────────────┐
│   Data Layer                │
│   products.php               │
│   (multidimensional array)  │
└─────────────────────────────┘
```

## Komponen

| Layer | File | Tanggung Jawab |
|---|---|---|
| Data Layer | `products.php` | Menyimpan data produk (ID, Nama, Kategori, Harga, Stok, Deskripsi) dalam multidimensional array |
| Processing Layer | `functions.php` | Fungsi `hitungTotalNilaiStok()` untuk kalkulasi nilai aset gudang; logika conditional untuk menandai baris dengan stok kritis (< 3) |
| Presentation Layer | `index.php` | Menggabungkan seluruh komponen via `require_once`, merender data ke tabel HTML menggunakan perulangan `foreach` |

## Status Proyek

- [x] Desain blueprint arsitektur
- [x] Implementasi `products.php`
- [x] Implementasi `functions.php`
- [x] Implementasi `index.php`
- [x] Integrasi & pengujian

Detail rancangan tiap komponen ada di [`docs/blueprint.md`](docs/blueprint.md).

## Struktur Repo (Rencana)

```
mini-project-1/
├── README.md
├── docs/
│   └── blueprint.md
├── products.php
├── functions.php
└── index.php
```
