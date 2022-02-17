# Tools
* HTML5
* CSS3
* Javascript
* MySQL
* PHP

# Fitur
* CRUD
* Login and register dua level (admin dan user)
* User hanya bisa membaca data
* Admin bisa menambah, mengupdate, dan menghapus data
* Responsive
* Router

# Template
* [Login_v1](https://colorlib.com/wp/template/login-form-v1/)
* [startbootstrap](https://startbootstrap.com/templates/sb-admin/)

# Kredensial
## Akun admin
    Username = Admin
    Password = admin123

## Akun user
    Username = User
    Password = user123

# Instalasi
## Langkah 1: Instal Git
Panduan untuk melakukan hal ini bisa dilihat di [link](https://www.atlassian.com/git/tutorials/install-git#windows) berikut.  

## Langkah 2: Instal XAMPP beserta PHP 8.0
Panduan untuk melakukan hal ini bisa dilihat di [link](https://php.tutorials24x7.com/blog/how-to-install-xampp-with-php-8-on-windows-10) berikut.  

## Langkah 3: Clone atau download repository ini ke PC Anda
Url untuk melakukan clone dan tombol download ada dapat dilihat ketika mengklik tombol **Code** yang berwarna hijau pada gambar dibawah ini.  
![tombol download](https://user-images.githubusercontent.com/52129348/154085310-c634b23d-ad65-42fa-8be6-172bea910fa9.jpg)  
Jangan lupa untuk meng-extract folder zip dari repository ini jika melakukan download.

## Langkah 4: Ubah document root pada konfigurasi Apache di Xampp
Untuk membuka file konfigurasi Apache, klik tombol **Config**, kemudian buka menu **Apache (httpd.conf)**.  
![konfig apache](https://user-images.githubusercontent.com/52129348/154085446-9b352999-a2ad-4953-bdd7-1587491d3e89.jpg)  

Setelah itu, akan tampil sebuah text file seperti dibawah ini.  
![httpd conf](https://user-images.githubusercontent.com/52129348/154085520-7ab335f1-96a0-444b-bbd2-284432029e42.jpg)  

Pada file `httpd.conf`, cari kata **DocumentRoot**, kemudian ganti nilai dari dua kalimat yang dilingkari di bawah ini menjadi path dari folder repository yang sudah didownload.  
![http conf_2](https://user-images.githubusercontent.com/52129348/154085601-e645f0fb-abe8-4d4e-a9be-e413b9b0e671.jpg)  

Pastikan bahwa path folder yang dimasukkan merupakan path dari folder yang berisikan `index.php`.  
![path](https://user-images.githubusercontent.com/52129348/154085656-32523ea0-657b-4f90-90fa-8110c6ac9b73.jpg)  

Setelah itu, klik tombol start pada baris Apache di XAMPP, kemudian buka [http://127.0.0.1:8888](http://127.0.0.1:8888) pada browser.  
![tombol start](https://user-images.githubusercontent.com/52129348/154085714-4d7da4b7-af0e-4dcb-ad2c-11e41623e0bc.jpg)  

Jika langkah di atas telah dilakukan dengan benar, maka halaman berikut ini akan tampil di browser.  
![tampilan](https://user-images.githubusercontent.com/52129348/154509339-0e9f40df-e6c3-4188-b20f-a19ef5f101b1.jpeg)

## Langkah 5: Buat sebuah database baru pada phpMyadmin
Untuk mengakses phpMyAdmin, nyalakan MySQL pada XAMPP terlebih dahulu dengan mengklik tombol **Start**.  
Jika MySQL sudah aktif, maka XAMPP akan memiliki tampilan seperti berikut:  
![mysql](https://user-images.githubusercontent.com/52129348/154086195-3334b097-a236-4196-b85a-fa3445535a0e.jpg)  

Kemudian, klik tombol **Admin** atau buka [http://127.0.0.1:8888/phpmyadmin](http://127.0.0.1:8888/phpmyadmin) pada browser.  

## Langkah 6: Pada database yang baru dibuat di langkah ke-5, jalankan script `pendaftaran_siswa.sql`
Script ini dapat ditemukan didalam folder repository ini.  
![Screenshot 2022-02-15 215105](https://user-images.githubusercontent.com/52129348/154086518-d0032de0-6c58-4ab3-9e7f-07fd9b936544.jpg)  

## Langkah 7: Masukan kredensial database pada aplikasi PHP
Untuk melakukan hal ini, buka folder `database`, kemudian copy file `config.example.php` dan paste dengan nama file `config.php`. Kemudian, isi kolom-kolom pada file tersebut sesuai dengan kredensial database yang baru saja dibuat. Berikut ini adalah contoh isi dari file `config.php` yang menggunakan database bernama `pendaftaran_siswa`.  
![config php](https://user-images.githubusercontent.com/52129348/154085888-3adc7c26-da18-4972-802e-657ad48ca0e9.jpg)  

## Langkah 8: Buka aplikasi web pada localhost
Jika semua langkah di atas telah dilakukan, maka aplikasi ini sudah dapat dibuka 
pada browser melalui [http://127.0.0.1:80](http://127.0.0.1:80).  
![tampilan website](https://user-images.githubusercontent.com/52129348/154085950-5ec75647-c78f-4fa2-ac74-7630b7f33b26.jpg)  
