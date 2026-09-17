<?php
/**
 * Processing Layer
 * Berisi fungsi kalkulasi dan logika bisnis, terpisah dari data dan tampilan.
 */

/**
 * Menghitung total nilai aset gudang (akumulasi harga x stok seluruh produk).
 *
 * @param array $products Daftar produk (dari Data Layer)
 * @return float Total nilai aset gudang
 */
function hitungTotalNilaiStok(array $products): float
{
    $total = 0;

    foreach ($products as $produk) {
        $total += $produk["harga"] * $produk["stok"];
    }

    return $total;
}

/**
 * Menentukan status stok produk berdasarkan ambang batas kritis (< 3).
 *
 * @param int $jumlahStok Jumlah stok produk
 * @return string "kritis" jika stok < 3, selain itu "aman"
 */
function cekStatusStok(int $jumlahStok): string
{
    if ($jumlahStok < 3) {
        return "kritis";
    }

    return "aman";
}

/**
 * Format angka ke format Rupiah untuk tampilan.
 *
 * @param float $angka
 * @return string
 */
function formatRupiah(float $angka): string
{
    return "Rp " . number_format($angka, 0, ",", ".");
}
