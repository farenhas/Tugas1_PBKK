# Faren Haseena - 5025221031

## Struktur Website

### Halaman Home
#### Navbar
- **Isi Navbar**: Menyediakan tautan ke Halaman Beranda, Tentang, Blog, dan Kontak untuk navigasi mudah.
#### Header
- **Judul**: "Halaman Home"
#### Isi
- **Deskripsi**: "Ini adalah Halaman Home" — pengenalan kepada user.

   <img src="https://github.com/farenhas/Tugas1_PBKK/blob/main/resources/pbkk1_home.png?raw=true" width="500" alt="Halaman Tentang">

---

### Halaman About
#### Navbar
- **Isi Navbar**: Tautan yang sama seperti di halaman Home untuk konsistensi navigasi.
#### Header
- **Judul**: "Halaman Tentang"
#### Isi
- **Deskripsi**: Detail mengenai pemilik website termasuk nama, program studi, dan ID mahasiswa yang disajikan secara ringkas dan informatif.

  <img src="https://github.com/farenhas/Tugas1_PBKK/blob/main/resources/pbkk1_about.png?raw=true" width="500" alt="Halaman Tentang">

---

### Halaman Blog
#### Navbar
- **Isi Navbar**: Mempermudah pengguna dalam berpindah antar halaman.
#### Header
- **Judul**: "Halaman Blog"
#### Isi
- **Deskripsi**: Menampilkan 2 judul artikel blog posts dengan ringkasan paragraf singkat untuk setiap artikel.

  <img src="https://github.com/farenhas/Tugas1_PBKK/blob/main/resources/pbkk1_blog.png?raw=true" width="500" alt="Halaman Tentang">

---

### Halaman Kontak
### Navbar
- **Isi Navbar**: Navigasi yang efisien ke semua halaman lain.
#### Header
- **Judul**: "Halaman Kontak"
#### Isi
- **Deskripsi**: Informasi tentang cara menghubungi pemilik website, termasuk email dan Instagram.

  <img src="https://github.com/farenhas/Tugas1_PBKK/blob/main/resources/pbkk1_contact.png?raw=true" width="500" alt="Halaman Tentang">

---

### Responsivitas Website
Setiap halaman dirancang untuk responsif, menyesuaikan tampilan berdasarkan perangkat yang digunakan, baik itu desktop, tablet, atau smartphone untuk memudahkan user.

<img src="https://github.com/farenhas/Tugas1_PBKK/blob/main/resources/pbkk1_responsive.png?raw=true" width="500" alt="Halaman Tentang">


## Update Section 3-4 
![image](https://github.com/user-attachments/assets/0f60dfa8-d75f-4b36-967e-4f4b03c156ca)
Menambah 5 potongan artikel pada Blog Page, dengan membuat Post Model, database diisi menggunakan `php artisan tinker`

![image](https://github.com/user-attachments/assets/c621b231-1948-46a0-8dca-b3e8906886b7)
Terdapat single post untuk tiap artikel, fungsinya adalah menunjukkan artikel secaara lengkap. Selain, itu terdapat `Back to Post` untuk kembali ke page sebelumnya

#### Langkah-langkah
Menambah 5 Potongan Artikel pada Blog Page dengan Laravel
Langkah-langkah berikut menjelaskan cara membuat **Post Model** dan mengisi database dengan data menggunakan **php artisan tinker**.

##### 1. Membuat Model Post
Pertama, buat model untuk Post beserta migration-nya menggunakan command berikut:

```bash
php artisan make:model Post -m
```

Command di atas akan menghasilkan dua file:
- Model: `app/Models/Post.php`
- Migration: `database/migrations/xxxx_xx_xx_create_posts_table.php`

##### 2. Menambahkan Kolom di Migration
Selanjutnya, buka file migration di `database/migrations` dan tambahkan kolom yang diperlukan untuk artikel. Misalnya, judul dan konten artikel:

```php
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->timestamps();
    });
}
```

Setelah itu, jalankan migration untuk membuat tabel:

```bash
php artisan migrate
```

##### 3. Mengisi Database dengan Tinker
Setelah tabel `posts` berhasil dibuat, buka Tinker untuk menambahkan 5 artikel ke dalam database:

```bash
php artisan tinker
```

Di dalam Tinker, buat data post sebagai berikut:

```php
use App\Models\Post;

Post::create(['title' => 'Judul Artikel 1', 'content' => 'Konten artikel 1']);
Post::create(['title' => 'Judul Artikel 2', 'content' => 'Konten artikel 2']);
Post::create(['title' => 'Judul Artikel 3', 'content' => 'Konten artikel 3']);
Post::create(['title' => 'Judul Artikel 4', 'content' => 'Konten artikel 4']);
Post::create(['title' => 'Judul Artikel 5', 'content' => 'Konten artikel 5']);
```

Setiap `Post::create()` akan menambah satu record ke dalam tabel `posts`.

##### 4. Menampilkan Artikel di Blog Page
Agar artikel-artikel tersebut muncul di halaman Blog, buatlah controller dan route yang akan menampilkan data dari tabel `posts`.

**Controller:** Buat controller menggunakan command:

```bash
php artisan make:controller PostController
```

Di dalam controller, tambahkan method untuk mengambil semua artikel dan mengirimkannya ke view:

```php
use App\Models\Post;

public function index()
{
    $posts = Post::all();
    return view('blog.index', compact('posts'));
}
```

**Route:** Tambahkan route untuk halaman Blog di `routes/web.php`:

```php
Route::get('/blog', [App\Http\Controllers\PostController::class, 'index']);
```

**View:** Buat file view `resources/views/blog/index.blade.php` untuk menampilkan artikel:

```php
@foreach ($posts as $post)
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
@endforeach
```

#### Update Section 5
1. Membuat 200 data dummy untuk post menggunakan `App\Models\Post::factory(200)->create();  `
   ![image](https://github.com/user-attachments/assets/351bfe62-9c3b-40dc-b420-e6f5239afea4)

2. Membuat relasi antara penulis dan artikel
   ![image](https://github.com/user-attachments/assets/1c4c101f-316d-4d40-a5c0-dda063c52514)

3. Menambah Post Category dan mengkategorikan artikel berdasarkan nama author
   ![image](https://github.com/user-attachments/assets/410c7098-dd94-40d2-9c94-2b3927cc1d9a)

   ![image](https://github.com/user-attachments/assets/0297b77c-285f-4579-950c-e23a9bf5dd29)

#### Update Section 6
1. Mengatasi N+1 Problem
   ![image](https://github.com/user-attachments/assets/90f9a0bc-3bbf-4a74-ace0-825b3d0c7bad)

2. Redesign UI
   ![image](https://github.com/user-attachments/assets/44696ae2-7db4-4cc8-8965-5efc01e22510)

3. Searching
   ![image](https://github.com/user-attachments/assets/d4c8361b-3c39-4ef5-abd0-12699bcb9f8d)

   





