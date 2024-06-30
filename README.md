# JobStreet Bot

JobStreet Bot adalah skrip otomatisasi berbasis PHP untuk mencari dan mengekstrak informasi pekerjaan dari situs JobStreet. Bot ini dirancang untuk mempermudah pencarian pekerjaan dengan mengotomatisasi proses pencarian, pengumpulan data dan apply otomatis tanpa henti.

## Fitur

- **Pencarian Otomatis**: Cari pekerjaan berdasarkan kata kunci dan lokasi.
- **Ekstraksi Data**: Ekstrak informasi pekerjaan seperti judul, perusahaan, lokasi, dan deskripsi.
- **Penyimpanan Hasil**: Simpan hasil pencarian dalam format CSV atau database.
- **Konfigurasi Mudah**: Konfigurasi pencarian melalui file konfigurasi.
- **Auto Apply**: Lamar pekerjaan berdasarkan format tertentu setiap *sec.

## Persyaratan

- **PHP 7.4 atau lebih baru**.
- Ekstensi PHP:
  - `curl`
  - `json`

## Instalasi

1. Clone repositori ini:

    ```bash
    git clone https://github.com/cloxt01/jobstreet_bot.git
    cd jobstreet_bot
    ```

2. Pastikan ekstensi `curl` dan `json` diaktifkan di `php.ini`.

3. Instal dependensi (jika ada) dengan menggunakan [Composer](https://getcomposer.org/):

    ```bash
    composer install
    ```

## Penggunaan

1. Sesuaikan file `auth.json` dengan profil anda. Contoh:

    ```json
    access_token = "eyaInOG81iY..."
    refresh_token = "v1.JaUb28j8Jwnsl..."
    id_token = "eyApK71Nmak92n2..."
    expired = 3600
    type = "Bearer"
    ```

2. Jalankan skrip utama:

    ```bash
    php jobstreet_bot.php
    ```

3. Hasil pencarian akan disimpan di file yang ditentukan dalam `config.php` (`results.csv` atau `results.json`).

## Output

```bash
[auth] Load Authorization berhasil
[auth] Authorization tersimpan
---------76910823--------
[graphql] HTTP Response Code: 200
[graphql] HTTP Response Code: 200
[graphql] HTTP Response Code: 200
[is_applied] True
```

## Struktur Proyek


- `jobstreet_bot.php`: Skrip utama untuk menjalankan bot.
- `auth.json`: File ini merupakan otoritasi untuk mengakses server
- `README.md`: Dokumentasi ini.

## Lisensi

Proyek ini dilisensikan di bawah Lisensi MIT - lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.

## Penulis

- [Nacho](https://github.com/cloxt01)
