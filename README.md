# Sistem Pendukung Keputusan AHP - LARAVEL
Sistem Pendukung Keputusan (DSS) yang dapat digunakan untuk membantu pemilihan keputusan dengan metode AHP (Analytical Hierarchy Process). Project aplikasi ini ditujukan untuk membantu permasalahan pendukung keputusan secara General.

![image](https://user-images.githubusercontent.com/25524265/68144265-dca39a80-ff65-11e9-87a0-afb03b564ac6.png)


## Features
* Melakukan perhitungan dengan kriteria dan kandidat yang dapat disesuaikan secara custom dengan permasalahan anda
* Membuat Perhitungan untuk pendukung keputusan
* Menyimpan hasil perhitungan
* Menampilkan hasil perhitungan

## Instalation
1. Download / clone repository ini,
    ```bash
    git clone https://github.com/bardiz12/laravel-spk-ahp.git
    ```
2. Masuk ke direktori repository ini, lakukan update library dan install laravel:
    ```bash
    composer instal -v
    ```
3. Edit file __.env__ untuk mengatur database nya :
    ```
    #contoh jika menggunakan SQLITE
    DB_CONNECTION=sqlite
    DB_DATABASE=PATH_TO_YOUR_APP/storage/app/database.sqlite
    #ganti PATH_TO_YOUR_APP dengan PATH project anda

    #jika menggunakan MYSQL
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=DB_NAME
    DB_USERNAME=DB_USERNAME
    DB_PASSWORD=DB_PASSWORD
    ```
4. Jalankan Server menggunakan laravel artisan
    ```bash
    php artisan serve
    ```

## Screenshot
1. <a href="https://user-images.githubusercontent.com/25524265/68144265-dca39a80-ff65-11e9-87a0-afb03b564ac6.png" target="_blank">Halaman Awal</a>
2. <a href="https://user-images.githubusercontent.com/25524265/68144440-41f78b80-ff66-11e9-870a-d56655c7ccb1.png" target="_blank">Halaman Pembuatan Perhitungan</a>
2. <a href="https://user-images.githubusercontent.com/25524265/68144476-5fc4f080-ff66-11e9-9467-1b970fdd6dcd.png" target="_blank">Halaman Perhitungan yang disimpan</a>
2. <a href="https://user-images.githubusercontent.com/25524265/68144543-82570980-ff66-11e9-810f-e574a8b431bf.png" target="_blank">Halaman Hasil Perhitungan</a>

## Demo
#### <a href="http://spk-ahp.herokuapp.com/" target="_blank">http://spk-ahp.herokuapp.com/</a>

