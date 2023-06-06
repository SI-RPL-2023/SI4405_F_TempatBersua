<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Resto;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'=>'TempatBersua',
            'email'=>'tempatbersua@gmail.com',
            'password'=>bcrypt('123'),
            'role'=>'superadmin',
            'status'=>'not logged in',                                                                                                  
            'foto'=>'logo.png',
        ]);
        Resto::create([
            'namaresto'=>'911',
            'district'=>'BUAHBATU',
            'address' =>'Talaga Bodas St No.27, South Lingkar, Lengkong, Bandung City',
            'open'=>'10:10:00',
            'close'=>'22:00:00',
            'price'=>'20000',
            'upto'=>'50000',
            'thumbnail'=>'911.jpeg',
            'content'=> '["911.jpeg","9112.jpg"]',
            'menu'=>'["bahagia menu.jpeg"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'iya',
            'rekomen_makanan'=>'manis',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Bagi Kopi',
            'district'=>'SUMUR BANDUNG',
            'address' =>'Jl. Naripan No.53, Kb. Pisang, Kec. Sumur Bandung, Kota Bandung',
            'open'=>'10:00:00',
            'close'=>'00:00:00',
            'price'=>'15000',
            'upto'=>'50000',
            'thumbnail'=>'bagi kopi.png',
            'content'=>'["bagi kopi.png", "Bagi-Kopi.jpeg"]',
            'menu'=>'["menu bagi kopi.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'iya',
            'rekomen_makanan'=>'asin',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Bahagia Kopi',
            'district'=>'SUMUR BANDUNG',
            'address' =>'Jl. Naripan No.53, Kb. Pisang, Kec. Sumur Bandung, Kota Bandung',
            'open'=>'09:00:00',
            'close'=>'22:00:00',
            'price'=>'15000',
            'upto'=>'50000',
            'thumbnail'=>'bahagia kp.png',
            'content'=>'["bahagia.jpg","bahagia2.jpg"]',
            'menu'=>'["bahagia menu.jpeg"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'iya',
            'rekomen_makanan'=>'manis',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'De U',
            'district'=>'COBLONG',
            'address' =>'Jl. Dipati Ukur No.43 / 60',
            'open'=>'12:00:00',
            'close'=>'23:00:00',
            'price'=>'40000',
            'upto'=>'70000',
            'thumbnail'=>'de.u kopi.jpeg',
            'content'=>'["de.u kopi.jpeg", "deu.jpg"]',
            'menu'=>'["menu de u.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'tidak',
            'rekomen_makanan'=>'manis',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Didago Kopi',
            'district'=>'COBLONG',
            'address' =>'Jl. Ir. H. Juanda No.. 21, Tamansari, Kec. Bandung Wetan, Kota Bandung',
            'open'=>'13:00:00',
            'close'=>'00:00:00',
            'price'=>'40000',
            'upto'=>'80000',
            'thumbnail'=>'didago kopi.jpg',
            'content'=>'["didago.jpg","didago2.jpg","didago3.jpg"]',
            'menu'=>'["menu didago.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'iya',
            'rekomen_makanan'=>'asin',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Dua Kopi',
            'district'=>'COBLONG',
            'address' =>'Jl. Taman Cemp. No.7, Merdeka, Kec. Sumur Bandung, Kota Bandung',
            'open'=>'10:00:00',
            'close'=>'00:00:00',
            'price'=>'20000',
            'upto'=>'60000',
            'thumbnail'=>'dua kopi.jpg',
            'content'=>'["dua.jpg","dua2.jpg","dua3.jpg"]',
            'menu'=>'["menu dua kopi.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'iya',
            'rekomen_makanan'=>'asin',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Eighteen Coffee',
            'district'=>'COBLONG',
            'address' =>'Jl. Cemara No. 46, Sukajadi, Bandung',
            'open'=>'13:00:00',
            'close'=>'00:00:00',
            'price'=>'30000',
            'upto'=>'100000',
            'thumbnail'=>'eighteen.jpg',
            'content'=>'["eighteen.jpg"]',
            'menu'=>'["menu eighteen.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'tidak',
            'rekomen_makanan'=>'manis',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Hamsa Coffee',
            'district'=>'SUMUR BANDUNG',
            'address' =>'Jl. Ciliwung No. 29, Riau, Bandung',
            'open'=>'12:00:00',
            'close'=>'23:00:00',
            'price'=>'25000',
            'upto'=>'50000',
            'thumbnail'=>'hamsa kopi.png',
            'content'=>'["hamsa kopi.png", "hamsa.jpeg"]',
            'menu'=>'["menu hamsa.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'iya',
            'rekomen_makanan'=>'manis',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Kawan Kopi',
            'district'=>'SUMUR BANDUNG',
            'address' =>'Jl. Hayam Wuruk No. 30, Gedung Sate, Bandung',
            'open'=>'10:00:00',
            'close'=>'22:00:00',
            'price'=>'20000',
            'upto'=>'50000',
            'thumbnail'=>'kawan kopi.png',
            'content'=>'["kawan.jpg","kawan1.jpg","kawan2.jpg"]',
            'menu'=>'["menu kawan kopi.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'iya',
            'rekomen_makanan'=>'asin',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Kilogram',
            'district'=>'COBLONG',
            'address' =>'Jl. Karang Tinggal No. 24, Sukajadi, Bandung',
            'open'=>'10:00:00',
            'close'=>'23:00:00',
            'price'=>'40000',
            'upto'=>'100000',
            'thumbnail'=>'kilogram (1).jpg',
            'content'=>'["kilogram (1).jpg", "kilogram.jpg", "kilogram2.jpg", "kilogram3.jpg"]',
            'menu'=>'["menu railway.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'tidak',
            'rekomen_makanan'=>'asin',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Kisah Manis',
            'district'=>'SUMUR BANDUNG',
            'address' =>'Jl. Sunda No. 65, Sunda, Bandung',
            'open'=>'10:00:00',
            'close'=>'23:00:00',
            'price'=>'25000',
            'upto'=>'100000',
            'thumbnail'=>'kisah manis fix.jpg',
            'content'=>'["kisah manis 2.jpg","kisah manis 3.jpg"]',
            'menu'=>'["menu kisah manis.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'iya',
            'rekomen_makanan'=>'manis',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Railway',
            'district'=>'COBLONG',
            'address' =>'Jl. Kebon Jukut No. 17, Cicendo, Bandung',
            'open'=>'10:00:00',
            'close'=>'22:00:00',
            'price'=>'15000',
            'upto'=>'60000',
            'thumbnail'=>'railway.png',
            'content'=>'["railway1.jpg","railway2.jpg","railway3.jpg"]',
            'menu'=>'["menu railway.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'iya',
            'rekomen_makanan'=>'asin',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Segi Coffee',
            'district'=>'COBLONG',
            'address' =>'Jl. Cihampelas No. 144, Cihampelas, Bandung',
            'open'=>'08:00:00',
            'close'=>'21:00:00',
            'price'=>'25000',
            'upto'=>'70000',
            'thumbnail'=>'segi kopi.png',
            'content'=>'["segi kopi.png", "segi.jpg", "segi2.jpg", "segi3.jpg"]',
            'menu'=>'["menu railway.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'tidak',
            'rekomen_makanan'=>'manis',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Kopi Toko Djawa',
            'district'=>'SUMUR BANDUNG',
            'address' =>'Jl. Braga No. 81, Braga, Bandung',
            'open'=>'07:00:00',
            'close'=>'22:00:00',
            'price'=>'15000',
            'upto'=>'60000',
            'thumbnail'=>'tokjaw.jpg',
            'content'=>'["tokjaw2.jpg","tokjaw3.jpg","tokjaww.jpeg"]',
            'menu'=>'["menu tokjaw.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'iya',
            'rekomen_makanan'=>'manis',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Work Coffee',
            'district'=>'SUMUR BANDUNG',
            'address' =>'Jl. Sumbawa No. 28, Riau, Bandung',
            'open'=>'07:00:00',
            'close'=>'22:00:00',
            'price'=>'25000',
            'upto'=>'100000',
            'thumbnail'=>'work-coffee.jpg',
            'content'=>'["work.jpg","work2.png","work3.png"]',
            'menu'=>'["menu work .png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'iya',
            'rekomen_makanan'=>'asin',
            'jumlah_klik' => 0
        ]);
        Resto::create([
            'namaresto'=>'Revuse Cafe',
            'district'=>'COBLONG',
            'address' =>'Jl. Tubagus Ismail Raya No. 34, Dago Atas, Bandung',
            'open'=>'08:00:00',
            'close'=>'22:00:00',
            'price'=>'30000',
            'upto'=>'100000',
            'thumbnail'=>'reveuse.png',
            'content'=>'["reveuse.png", "revuse1.jpg", "revuse2.jpg", "revuse3.jpg"]',
            'menu'=>'["salah satu menu reveuse.png"]',
            'category'=>'gratis',
            'status'=>'approved',
            'rekomen'=>'tidak',
            'rekomen_kopi'=>'tidak',
            'rekomen_makanan'=>'asin',
            'jumlah_klik' => 0
        ]);

    }
}
