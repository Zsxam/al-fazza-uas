<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            // Kategori Bolu
            [
                'kategori' => 'bolu',
                'nama' => 'Cheese Cake',
                'tipe' => 'Kue Bolu',
                'harga' => 13500,
                'rating' => 4.9,
                'gambar' => '/assets/img/bolu/1-bolukeju.png',
                'stok' => 50,
                'deskripsi' => 'Premium Cheese Long Cake dengan roti sisir premium dan cream cheese gurih.',
                'bahan' => 'Keju Cheddar, Cream Cheese, Tepung Terigu, Telur',
                'saran_penyimpanan' => 'Simpan dalam suhu ruang (tahan 3-4 hari) atau di dalam kulkas (tahan hingga 7 hari) dalam wadah kedap udara.'
            ],
            [
                'kategori' => 'bolu',
                'nama' => 'Meses',
                'tipe' => 'Kue Bolu',
                'harga' => 11900,
                'rating' => 4.9,
                'gambar' => '/assets/img/bolu/2-bolumeses.png',
                'stok' => 50,
                'deskripsi' => 'Roti lembut dengan olesan krim manis dan taburan meses cokelat klasik.',
                'bahan' => 'Meses Cokelat, Krim Manis, Tepung Terigu, Mentega',
                'saran_penyimpanan' => 'Simpan dalam suhu ruang (tahan 3-4 hari) atau di dalam kulkas (tahan hingga 7 hari) dalam wadah kedap udara.'
            ],
            [
                'kategori' => 'bolu',
                'nama' => 'Coffee Raisin',
                'tipe' => 'Bolu Puding',
                'harga' => 31700,
                'rating' => 4.9,
                'gambar' => '/assets/img/bolu/3-bolupuding.png',
                'stok' => 50,
                'deskripsi' => 'Bolu aroma kopi berlapis puding segar dengan kismis pilihan.',
                'bahan' => 'Ekstrak Kopi, Kismis, Agar-agar, Telur',
                'saran_penyimpanan' => 'Simpan di dalam kulkas agar puding tetap segar (tahan 3-4 hari).'
            ],
            [
                'kategori' => 'bolu',
                'nama' => 'Coklat',
                'tipe' => 'Bolu Coklat',
                'harga' => 79500,
                'rating' => 4.9,
                'gambar' => '/assets/img/bolu/4-bolucoklat.png',
                'stok' => 50,
                'deskripsi' => 'Bolu cokelat pekat yang sangat lembut dengan lapisan ganache cokelat premium.',
                'bahan' => 'Cokelat Bubuk, Dark Chocolate, Tepung Terigu, Mentega, Telur',
                'saran_penyimpanan' => 'Simpan dalam suhu ruang (tahan 3-4 hari) atau di dalam kulkas (tahan hingga 7 hari) dalam wadah kedap udara.'
            ],
            [
                'kategori' => 'bolu',
                'nama' => 'Chiffon Pandan',
                'tipe' => 'Bolu Pandan',
                'harga' => 76500,
                'rating' => 4.9,
                'gambar' => '/assets/img/bolu/5-bolupandan.png',
                'stok' => 50,
                'deskripsi' => 'Chiffon cake super ringan dan mengembang sempurna dengan aroma pandan asli yang harum.',
                'bahan' => 'Ekstrak Pandan, Santan, Tepung Terigu, Gula Pasir, Telur',
                'saran_penyimpanan' => 'Simpan dalam suhu ruang (tahan 3-4 hari) atau di dalam kulkas (tahan hingga 7 hari) dalam wadah kedap udara.'
            ],
            [
                'kategori' => 'bolu',
                'nama' => 'Chiffon Keju',
                'tipe' => 'Bolu',
                'harga' => 85000,
                'rating' => 4.9,
                'gambar' => '/assets/img/bolu/6-chiffonkeju.png',
                'stok' => 50,
                'deskripsi' => 'Kue chiffon bertekstur selembut kapas dengan taburan keju parut gurih di dalam dan luarnya.',
                'bahan' => 'Keju Cheddar, Susu Segar, Tepung Terigu, Minyak Nabati, Telur',
                'saran_penyimpanan' => 'Simpan dalam suhu ruang (tahan 3-4 hari) atau di dalam kulkas (tahan hingga 7 hari) dalam wadah kedap udara.'
            ],
            [
                'kategori' => 'bolu',
                'nama' => 'Bolu Lemon',
                'tipe' => 'Bolu Gulung',
                'harga' => 103000,
                'rating' => 4.9,
                'gambar' => '/assets/img/bolu/7-bolulemon.png',
                'stok' => 50,
                'deskripsi' => 'Bolu gulung segar dengan olesan selai lemon manis asam yang menggugah selera.',
                'bahan' => 'Sari Lemon Asli, Selai Lemon, Tepung Terigu, Telur, Mentega',
                'saran_penyimpanan' => 'Simpan dalam suhu ruang (tahan 3-4 hari) atau di dalam kulkas (tahan hingga 7 hari) dalam wadah kedap udara.'
            ],
            [
                'kategori' => 'bolu',
                'nama' => 'Bolu Mocca',
                'tipe' => 'Bolu Gulung',
                'harga' => 103000,
                'rating' => 4.9,
                'gambar' => '/assets/img/bolu/8-bolugulungmoca.png',
                'stok' => 50,
                'deskripsi' => 'Bolu gulung klasik dengan olesan krim moka khas dan taburan meises cokelat.',
                'bahan' => 'Pasta Moka, Krim Moka, Meses Cokelat, Tepung Terigu, Telur',
                'saran_penyimpanan' => 'Simpan dalam suhu ruang (tahan 3-4 hari) atau di dalam kulkas (tahan hingga 7 hari) dalam wadah kedap udara.'
            ],
            [
                'kategori' => 'bolu',
                'nama' => 'Bolu Keju',
                'tipe' => 'Bolu Gulung',
                'harga' => 119500,
                'rating' => 4.9,
                'gambar' => '/assets/img/bolu/9-bolugulungkeju.png',
                'stok' => 50,
                'deskripsi' => 'Bolu gulung lembut yang padat dengan lapisan krim keju dan taburan keju cheddar melimpah.',
                'bahan' => 'Keju Cheddar, Krim Mentega, Tepung Terigu, Telur',
                'saran_penyimpanan' => 'Simpan dalam suhu ruang (tahan 3-4 hari) atau di dalam kulkas (tahan hingga 7 hari) dalam wadah kedap udara.'
            ],
            [
                'kategori' => 'bolu',
                'nama' => 'Bolu Pandan',
                'tipe' => 'Bolu Gulung',
                'harga' => 85000,
                'rating' => 4.9,
                'gambar' => '/assets/img/bolu/10-bolugulungpandan.png',
                'stok' => 50,
                'deskripsi' => 'Bolu gulung pandan tradisional dengan isi krim vanilla yang lembut dan manis pas.',
                'bahan' => 'Ekstrak Pandan, Krim Vanilla, Tepung Terigu, Telur',
                'saran_penyimpanan' => 'Simpan dalam suhu ruang (tahan 3-4 hari) atau di dalam kulkas (tahan hingga 7 hari) dalam wadah kedap udara.'
            ],
            [
                'kategori' => 'bolu',
                'nama' => 'Raisin Muffin',
                'tipe' => 'Bolu',
                'harga' => 11900,
                'rating' => 4.9,
                'gambar' => '/assets/img/bolu/11-raisinmuffin.png',
                'stok' => 50,
                'deskripsi' => 'Muffin klasik yang padat namun lembut, dipenuhi dengan potongan kismis manis di setiap gigitannya.',
                'bahan' => 'Kismis, Tepung Terigu, Mentega, Telur, Baking Powder',
                'saran_penyimpanan' => 'Simpan dalam suhu ruang (tahan 3-4 hari) atau di dalam kulkas (tahan hingga 7 hari) dalam wadah kedap udara.'
            ],
            [
                'kategori' => 'bolu',
                'nama' => 'Coklat Muffin',
                'tipe' => 'Bolu',
                'harga' => 11900,
                'rating' => 4.9,
                'gambar' => '/assets/img/bolu/12-chocolatemuffin.png',
                'stok' => 50,
                'deskripsi' => 'Muffin cokelat kaya rasa dengan taburan choco chips lezat yang lumer di mulut.',
                'bahan' => 'Bubuk Kakao, Choco Chips, Tepung Terigu, Mentega, Susu',
                'saran_penyimpanan' => 'Simpan dalam suhu ruang (tahan 3-4 hari) atau di dalam kulkas (tahan hingga 7 hari) dalam wadah kedap udara.'
            ],

            // Kategori Pastry
            [
                'kategori' => 'pastry',
                'nama' => 'Mushroom',
                'tipe' => 'Pastry',
                'harga' => 11900,
                'rating' => 4.9,
                'gambar' => '/assets/img/pastry/1-mushroom-pastry.png',
                'stok' => 50,
                'deskripsi' => 'Pastry renyah dengan isian krim jamur gurih yang creamy dan kaya rempah.',
                'bahan' => 'Jamur Champignon, Krim Susu, Kulit Pastry, Bawang Bombay',
                'saran_penyimpanan' => 'Sebaiknya langsung dikonsumsi. Jika disimpan, masukkan ke kulkas dan panaskan sebelum dihidangkan.'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Chicken Pies',
                'tipe' => 'Pastry',
                'harga' => 11900,
                'rating' => 4.9,
                'gambar' => '/assets/img/pastry/2-chicken-pie.png',
                'stok' => 50,
                'deskripsi' => 'Pai gurih dengan isian daging ayam cincang, wortel, dan kentang dalam saus creamy yang nikmat.',
                'bahan' => 'Daging Ayam Cincang, Sayuran Campur, Susu, Kulit Pie',
                'saran_penyimpanan' => 'Sebaiknya langsung dikonsumsi. Jika disimpan, masukkan ke kulkas dan panaskan sebelum dihidangkan.'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Croissant Penyet',
                'tipe' => 'Pastry',
                'harga' => 11600,
                'rating' => 4.9,
                'gambar' => '/assets/img/pastry/3-croissant-penyet.png',
                'stok' => 50,
                'deskripsi' => 'Inovasi croissant viral yang dipipihkan hingga renyah maksimal, berlapis mentega gurih.',
                'bahan' => 'Adonan Croissant, Mentega Premium, Ragi, Gula',
                'saran_penyimpanan' => 'Simpan di suhu ruang (1-2 hari) dalam wadah tertutup agar tetap renyah.'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Cromboloni Coklat',
                'tipe' => 'Pastry',
                'harga' => 21800,
                'rating' => 4.9,
                'gambar' => '/assets/img/pastry/4-cromboloni-coklat.png',
                'stok' => 50,
                'deskripsi' => 'Paduan renyahnya croissant berbentuk roll dengan isian krim cokelat lumer yang melimpah.',
                'bahan' => 'Adonan Croissant, Krim Cokelat, Cokelat Leleh, Mentega',
                'saran_penyimpanan' => 'Simpan di dalam kulkas jika tidak langsung dikonsumsi. Panaskan sebentar di microwave agar krim lumer.'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Danish Coklat',
                'tipe' => 'Pastry',
                'harga' => 14100,
                'rating' => 4.9,
                'gambar' => '/assets/img/pastry/5-danish-coklat.png',
                'stok' => 50,
                'deskripsi' => 'Kue danish berlapis mentega yang renyah dengan potongan cokelat berkualitas di tengahnya.',
                'bahan' => 'Kulit Danish, Cokelat Batang, Mentega, Telur',
                'saran_penyimpanan' => 'Simpan di suhu ruang dalam wadah kedap udara (1-2 hari).'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Danish Keju',
                'tipe' => 'Pastry',
                'harga' => 16300,
                'rating' => 4.9,
                'gambar' => '/assets/img/pastry/6-danish-keju.png',
                'stok' => 50,
                'deskripsi' => 'Pastry manis dan gurih dengan isian krim keju panggang di tengah lapisan danish yang renyah.',
                'bahan' => 'Kulit Danish, Cream Cheese, Keju Parut, Mentega',
                'saran_penyimpanan' => 'Simpan di dalam kulkas agar keju tidak cepat basi. Hangatkan sebelum dikonsumsi.'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Danish Raisin',
                'tipe' => 'Pastry',
                'harga' => 13600,
                'rating' => 4.9,
                'gambar' => '/assets/img/pastry/7-danish-raisin.png',
                'stok' => 50,
                'deskripsi' => 'Danish pastry klasik yang disajikan dengan taburan kismis manis dan olesan glasir tipis.',
                'bahan' => 'Kulit Danish, Kismis, Gula Glasir, Mentega',
                'saran_penyimpanan' => 'Simpan di suhu ruang dalam wadah kedap udara (1-2 hari).'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Kue Soes',
                'tipe' => 'Pastry',
                'harga' => 10100,
                'rating' => 4.9,
                'gambar' => '/assets/img/pastry/8-kue-soes.png',
                'stok' => 50,
                'deskripsi' => 'Kue choux pastry bertekstur ringan dengan isian vla vanilla yang dingin, lembut, dan creamy.',
                'bahan' => 'Tepung Terigu, Mentega, Telur, Susu Segar, Vanilla',
                'saran_penyimpanan' => 'Wajib disimpan di dalam kulkas agar vla tidak asam (tahan 2 hari).'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Tuna Corn Puff',
                'tipe' => 'Pastry',
                'harga' => 11900,
                'rating' => 4.9,
                'gambar' => '/assets/img/pastry/9-tuna-corn-puff.png',
                'stok' => 50,
                'deskripsi' => 'Puff pastry gurih dengan isian paduan ikan tuna berbumbu dan jagung manis.',
                'bahan' => 'Kulit Puff Pastry, Ikan Tuna, Jagung Manis, Bawang Bombai',
                'saran_penyimpanan' => 'Sebaiknya langsung dikonsumsi. Jika disimpan, masukkan ke kulkas dan panaskan sebelum dihidangkan.'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Almond Pastry',
                'tipe' => 'Pastry',
                'harga' => 11900,
                'rating' => 4.9,
                'gambar' => '/assets/img/pastry/10-almond-pastry.png',
                'stok' => 50,
                'deskripsi' => 'Pastry renyah berlapis dengan taburan kacang almond iris dan lapisan gula karamel.',
                'bahan' => 'Kulit Pastry, Kacang Almond, Gula Karamel, Mentega',
                'saran_penyimpanan' => 'Simpan di suhu ruang dalam wadah kedap udara (1-2 hari).'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Apple Pie',
                'tipe' => 'Pastry',
                'harga' => 16500,
                'rating' => 4.9,
                'gambar' => '/assets/img/pastry/11-apple-pie.png',
                'stok' => 50,
                'deskripsi' => 'Pie klasik dengan isian apel segar berempah kayu manis yang manis dan sedikit asam.',
                'bahan' => 'Buah Apel, Kayu Manis, Gula Palem, Kulit Pie',
                'saran_penyimpanan' => 'Bisa disimpan di suhu ruang (1 hari) atau di dalam kulkas (hingga 3 hari).'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Sausage Brood',
                'tipe' => 'Pastry',
                'harga' => 11900,
                'rating' => 4.9,
                'gambar' => '/assets/img/pastry/12-sausage-brood.png',
                'stok' => 50,
                'deskripsi' => 'Sosis sapi premium berbalut kulit pastry renyah yang dipanggang hingga keemasan.',
                'bahan' => 'Sosis Sapi Premium, Kulit Puff Pastry, Telur, Mentega',
                'saran_penyimpanan' => 'Sebaiknya langsung dikonsumsi. Jika disimpan, masukkan ke kulkas dan panaskan sebelum dihidangkan.'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Bolen Pisang',
                'tipe' => 'Pastry',
                'harga' => 30000,
                'rating' => 4.9,
                'gambar' => '/assets/img/pisangbolen 1.png',
                'stok' => 50,
                'deskripsi' => 'Perpaduan pisang dan cokelat lumer atau keju gurih yang dibalut kulit pastry berlapis yang renyah di luar namun lembut di dalam.',
                'bahan' => 'Tepung Terigu, Korsvet, Susu, Pisang, Coklat/Keju Batang',
                'saran_penyimpanan' => 'Simpan di suhu ruang dalam wadah tertutup. Tahan hingga 3 hari.'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Cheese Roll',
                'tipe' => 'Pastry',
                'harga' => 35000,
                'rating' => 4.9,
                'gambar' => '/assets/img/cheeseroll 1.png',
                'stok' => 50,
                'deskripsi' => 'Pastry renyah yang digulung dengan isian keju premium yang gurih dan melimpah di setiap gigitannya.',
                'bahan' => 'Tepung Terigu, Korsvet, Keju Premium, Telur, Gula',
                'saran_penyimpanan' => 'Simpan di suhu ruang dalam toples kedap udara agar tetap renyah.'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Croissant',
                'tipe' => 'Pastry',
                'harga' => 30000,
                'rating' => 4.9,
                'gambar' => '/assets/img/krasong 1.png',
                'stok' => 50,
                'deskripsi' => 'Roti pastry khas Prancis yang berlapis-lapis, renyah di luar dan lembut serta berongga di dalam.',
                'bahan' => 'Tepung Terigu, Ragi, Mentega Premium, Susu, Garam',
                'saran_penyimpanan' => 'Simpan di suhu ruang. Hangatkan di oven atau air fryer selama 3 menit sebelum dihidangkan.'
            ],
            [
                'kategori' => 'pastry',
                'nama' => 'Kue Corong',
                'tipe' => 'Pastry',
                'harga' => 30000,
                'rating' => 4.9,
                'gambar' => '/assets/img/corong 1.png',
                'stok' => 50,
                'deskripsi' => 'Kue kering tradisional dengan bentuk corong yang unik dan isian kelapa parut manis.',
                'bahan' => 'Tepung Beras, Santan, Gula Merah, Kelapa Parut, Garam',
                'saran_penyimpanan' => 'Simpan dalam wadah kedap udara di suhu ruang. Tahan hingga 2 minggu.'
            ],

            // Kategori Cookies
            [
                'kategori' => 'cookies',
                'nama' => 'Cookies Coklat',
                'tipe' => 'Cookies',
                'harga' => 76000,
                'rating' => 4.9,
                'gambar' => '/assets/img/cookies/1-cookies-coklat.png',
                'stok' => 50,
                'deskripsi' => 'Kue kering cokelat klasik yang renyah dengan rasa cokelat pekat yang otentik.',
                'bahan' => 'Bubuk Cokelat, Tepung Terigu, Mentega, Telur, Gula',
                'saran_penyimpanan' => 'Simpan dalam toples kedap udara di tempat yang sejuk dan kering. Tahan hingga 1-2 bulan.'
            ],
            [
                'kategori' => 'cookies',
                'nama' => 'Cookies Hati',
                'tipe' => 'Cookies',
                'harga' => 76000,
                'rating' => 4.9,
                'gambar' => '/assets/img/cookies/2-cookies-hati.png',
                'stok' => 50,
                'deskripsi' => 'Kue kering berbentuk hati yang manis dan cantik, cocok untuk bingkisan atau camilan.',
                'bahan' => 'Tepung Terigu, Mentega, Gula Halus, Telur, Vanilla',
                'saran_penyimpanan' => 'Simpan dalam toples kedap udara di tempat yang sejuk dan kering. Tahan hingga 1-2 bulan.'
            ],
            [
                'kategori' => 'cookies',
                'nama' => 'Kaasstengels',
                'tipe' => 'Cookies',
                'harga' => 151500,
                'rating' => 4.9,
                'gambar' => '/assets/img/cookies/3-kaasstengels.png',
                'stok' => 50,
                'deskripsi' => 'Kue kering gurih khas Belanda dengan paduan keju edam dan cheddar premium yang renyah.',
                'bahan' => 'Keju Edam, Keju Cheddar, Mentega, Tepung Terigu, Kuning Telur',
                'saran_penyimpanan' => 'Simpan dalam toples kedap udara di tempat yang sejuk dan kering. Tahan hingga 1-2 bulan.'
            ],
            [
                'kategori' => 'cookies',
                'nama' => 'Lidah Kucing',
                'tipe' => 'Cookies',
                'harga' => 92000,
                'rating' => 4.9,
                'gambar' => '/assets/img/cookies/4-lidah-kucing.png',
                'stok' => 50,
                'deskripsi' => 'Kue kering super tipis dan renyah beraroma vanilla dan mentega yang lumer di mulut.',
                'bahan' => 'Putih Telur, Mentega, Tepung Terigu, Gula Halus, Vanilla',
                'saran_penyimpanan' => 'Simpan dalam toples kedap udara di tempat yang sejuk dan kering. Pastikan tertutup rapat agar tidak alot.'
            ],
            [
                'kategori' => 'cookies',
                'nama' => 'Nastar',
                'tipe' => 'Cookies',
                'harga' => 95000,
                'rating' => 4.9,
                'gambar' => '/assets/img/cookies/5-nastar.png',
                'stok' => 50,
                'deskripsi' => 'Kue kering klasik isi selai nanas asli yang asam manis dengan adonan mentega lumer.',
                'bahan' => 'Selai Nanas, Mentega Premium, Tepung Terigu, Kuning Telur, Susu Bubuk',
                'saran_penyimpanan' => 'Simpan dalam toples kedap udara di tempat yang sejuk dan kering. Tahan hingga 1-2 bulan.'
            ],
            [
                'kategori' => 'cookies',
                'nama' => 'Putri Salju',
                'tipe' => 'Cookies',
                'harga' => 95000,
                'rating' => 4.9,
                'gambar' => '/assets/img/cookies/6-putri-salju.png',
                'stok' => 50,
                'deskripsi' => 'Kue kering berbentuk bulan sabit yang lumer, ditaburi gula halus manis seperti salju.',
                'bahan' => 'Kacang Mede, Mentega, Tepung Terigu, Gula Halus',
                'saran_penyimpanan' => 'Simpan dalam toples kedap udara. Taburkan tambahan gula halus jika disimpan lama.'
            ],
            [
                'kategori' => 'cookies',
                'nama' => 'Cheese Stick',
                'tipe' => 'Cookies',
                'harga' => 50500,
                'rating' => 4.9,
                'gambar' => '/assets/img/cookies/7-cheese-stick.png',
                'stok' => 50,
                'deskripsi' => 'Stik keju renyah dan gurih yang digoreng hingga keemasan, camilan favorit semua kalangan.',
                'bahan' => 'Keju Cheddar, Tepung Tapioka, Telur, Garam',
                'saran_penyimpanan' => 'Simpan dalam toples kedap udara agar tidak alot. Tahan hingga 2-3 bulan.'
            ],
            [
                'kategori' => 'cookies',
                'nama' => 'Choco Cheese',
                'tipe' => 'Cookies',
                'harga' => 66500,
                'rating' => 4.9,
                'gambar' => '/assets/img/cookies/8-choco-cheese.png',
                'stok' => 50,
                'deskripsi' => 'Perpaduan unik antara kue kering cokelat manis dengan gurihnya keju di setiap gigitan.',
                'bahan' => 'Cokelat Bubuk, Keju Parut, Mentega, Tepung Terigu',
                'saran_penyimpanan' => 'Simpan dalam toples kedap udara di tempat yang sejuk dan kering. Tahan hingga 1-2 bulan.'
            ],
            [
                'kategori' => 'cookies',
                'nama' => 'Peanut Butter',
                'tipe' => 'Cookies',
                'harga' => 76500,
                'rating' => 4.9,
                'gambar' => '/assets/img/cookies/9-peanut-butter.png',
                'stok' => 50,
                'deskripsi' => 'Kue kering renyah dengan rasa dan aroma selai kacang panggang yang pekat dan gurih.',
                'bahan' => 'Selai Kacang, Kacang Cincang, Mentega, Tepung Terigu, Gula Palem',
                'saran_penyimpanan' => 'Simpan dalam toples kedap udara di tempat yang sejuk dan kering. Tahan hingga 1-2 bulan.'
            ],
            [
                'kategori' => 'cookies',
                'nama' => 'Cranberry Corn',
                'tipe' => 'Cookies',
                'harga' => 72500,
                'rating' => 4.9,
                'gambar' => '/assets/img/cookies/10-cranberry-corn.png',
                'stok' => 50,
                'deskripsi' => 'Kukis renyah berbahan dasar cornflakes berpadu dengan potongan buah cranberry kering yang segar.',
                'bahan' => 'Cornflakes, Cranberry Kering, Mentega, Tepung Terigu',
                'saran_penyimpanan' => 'Simpan dalam toples kedap udara di tempat yang sejuk dan kering. Tahan hingga 1-2 bulan.'
            ],
            [
                'kategori' => 'cookies',
                'nama' => 'Soes Kering',
                'tipe' => 'Cookies',
                'harga' => 36000,
                'rating' => 4.9,
                'gambar' => '/assets/img/cookies/11-soes-kering.png',
                'stok' => 50,
                'deskripsi' => 'Choux pastry versi kering yang digigit renyah kopong dengan rasa gurih mentega yang khas.',
                'bahan' => 'Tepung Terigu, Telur, Mentega, Garam',
                'saran_penyimpanan' => 'Simpan dalam toples kedap udara di tempat yang sejuk dan kering agar tetap renyah.'
            ],
            [
                'kategori' => 'cookies',
                'nama' => 'Roti Bagelen Keju',
                'tipe' => 'Cookies',
                'harga' => 33200,
                'rating' => 4.9,
                'gambar' => '/assets/img/cookies/12-roti-bagelen-keju.png',
                'stok' => 50,
                'deskripsi' => 'Roti kering renyah dengan olesan mentega manis dan taburan keju cheddar parut tebal.',
                'bahan' => 'Roti Manis Kering, Mentega, Keju Cheddar, Gula Pasir',
                'saran_penyimpanan' => 'Simpan dalam toples kedap udara di tempat yang sejuk dan kering agar tidak alot.'
            ],

            // Kategori Roti
            [
                'kategori' => 'roti',
                'nama' => 'Choco Custard',
                'tipe' => 'Roti',
                'harga' => 14600,
                'rating' => 4.9,
                'gambar' => '/assets/img/roti/1-choco-custard.png',
                'stok' => 50,
                'deskripsi' => 'Roti manis super lembut dengan isian paduan vla custard creamy dan lelehan cokelat.',
                'bahan' => 'Tepung Terigu, Krim Custard, Cokelat Leleh, Susu, Ragi',
                'saran_penyimpanan' => 'Simpan di suhu ruang dalam kemasan tertutup (tahan 2-3 hari). Jangan simpan di kulkas agar tidak keras.'
            ],
            [
                'kategori' => 'roti',
                'nama' => 'Roti Kelapa',
                'tipe' => 'Roti',
                'harga' => 11000,
                'rating' => 4.9,
                'gambar' => '/assets/img/roti/2-roti-kelapa.png',
                'stok' => 50,
                'deskripsi' => 'Roti jadul nan empuk dengan isian unti kelapa parut manis legit yang khas.',
                'bahan' => 'Kelapa Parut, Gula Merah, Tepung Terigu, Mentega, Ragi',
                'saran_penyimpanan' => 'Simpan di suhu ruang (tahan 1-2 hari). Sebaiknya segera dikonsumsi.'
            ],
            [
                'kategori' => 'roti',
                'nama' => 'Garlic Cream',
                'tipe' => 'Roti',
                'harga' => 16900,
                'rating' => 4.9,
                'gambar' => '/assets/img/roti/3-garlic-cream.png',
                'stok' => 50,
                'deskripsi' => 'Roti gurih khas Korea dengan lelehan cream cheese dan baluran saus mentega bawang putih.',
                'bahan' => 'Bawang Putih, Cream Cheese, Peterseli, Mentega, Tepung Terigu',
                'saran_penyimpanan' => 'Tahan 1 hari di suhu ruang. Jika disimpan lebih lama, simpan di kulkas dan hangatkan sebelum disantap.'
            ],
            [
                'kategori' => 'roti',
                'nama' => 'Coklat Muisjes',
                'tipe' => 'Roti',
                'harga' => 11300,
                'rating' => 4.9,
                'gambar' => '/assets/img/roti/4-coklat-muisjes.png',
                'stok' => 50,
                'deskripsi' => 'Roti tawar mini lembut berbalut krim mentega dan taburan meses cokelat tebal di atasnya.',
                'bahan' => 'Meses Cokelat, Krim Mentega, Tepung Terigu, Susu Segar, Ragi',
                'saran_penyimpanan' => 'Simpan di suhu ruang dalam kemasan tertutup (tahan 2-3 hari).'
            ],
            [
                'kategori' => 'roti',
                'nama' => 'Abon Sapi',
                'tipe' => 'Roti',
                'harga' => 15100,
                'rating' => 4.9,
                'gambar' => '/assets/img/roti/5-abon-sapi.png',
                'stok' => 50,
                'deskripsi' => 'Roti gulung lembut beroleskan mayones manis gurih dengan taburan abon sapi premium melimpah.',
                'bahan' => 'Abon Sapi, Mayones, Daun Bawang, Tepung Terigu, Ragi',
                'saran_penyimpanan' => 'Tahan 2 hari di suhu ruang. Jangan disimpan di kulkas agar tekstur roti tidak rusak.'
            ],
            [
                'kategori' => 'roti',
                'nama' => 'Abon Sapi Pedas',
                'tipe' => 'Roti',
                'harga' => 15100,
                'rating' => 4.9,
                'gambar' => '/assets/img/roti/6-abon-sapi-pedas.png',
                'stok' => 50,
                'deskripsi' => 'Roti abon sapi dengan sensasi pedas ekstra dari olesan saus sambal pedas manis rahasia.',
                'bahan' => 'Abon Sapi Pedas, Saus Sambal, Mayones, Tepung Terigu, Ragi',
                'saran_penyimpanan' => 'Tahan 2 hari di suhu ruang. Jangan disimpan di kulkas agar tekstur roti tidak rusak.'
            ],
            [
                'kategori' => 'roti',
                'nama' => 'Bakso Sapi',
                'tipe' => 'Roti',
                'harga' => 15400,
                'rating' => 4.9,
                'gambar' => '/assets/img/roti/7-bakso-sapi.png',
                'stok' => 50,
                'deskripsi' => 'Roti gurih unik berisi olahan daging bakso sapi cincang yang dibumbui kecap merica.',
                'bahan' => 'Daging Sapi Cincang, Kecap Manis, Bawang Putih, Tepung Terigu, Ragi',
                'saran_penyimpanan' => 'Lebih nikmat disajikan hangat. Tahan 1 hari di suhu ruang.'
            ],
            [
                'kategori' => 'roti',
                'nama' => 'Cheese Raisin',
                'tipe' => 'Roti',
                'harga' => 14600,
                'rating' => 4.9,
                'gambar' => '/assets/img/roti/8-cheese-raisin.png',
                'stok' => 50,
                'deskripsi' => 'Perpaduan seimbang roti manis bertabur kismis dan potongan dadu keju di setiap gigitannya.',
                'bahan' => 'Kismis, Keju Cheddar Dadu, Tepung Terigu, Susu, Ragi',
                'saran_penyimpanan' => 'Simpan di suhu ruang dalam kemasan tertutup (tahan 2-3 hari).'
            ],
            [
                'kategori' => 'roti',
                'nama' => 'Roti Coklat',
                'tipe' => 'Roti',
                'harga' => 11300,
                'rating' => 4.9,
                'gambar' => '/assets/img/roti/9-roti-coklat.png',
                'stok' => 50,
                'deskripsi' => 'Roti manis klasik dengan isian selai cokelat pekat yang lumer ketika digigit.',
                'bahan' => 'Selai Cokelat, Tepung Terigu, Susu, Mentega, Ragi',
                'saran_penyimpanan' => 'Simpan di suhu ruang dalam kemasan tertutup (tahan 2-3 hari).'
            ],
            [
                'kategori' => 'roti',
                'nama' => 'Smooked Beef',
                'tipe' => 'Roti',
                'harga' => 18100,
                'rating' => 4.9,
                'gambar' => '/assets/img/roti/10-smoked-beef.png',
                'stok' => 50,
                'deskripsi' => 'Roti gurih dengan isian lembaran daging sapi asap, keju lumer, dan saus mayones.',
                'bahan' => 'Daging Sapi Asap, Keju Slice, Mayones, Tepung Terigu, Ragi',
                'saran_penyimpanan' => 'Segera konsumsi. Tahan 1 hari di suhu ruang, bisa dipanaskan sebelum disantap.'
            ],
            [
                'kategori' => 'roti',
                'nama' => 'Ikan Tuna',
                'tipe' => 'Roti',
                'harga' => 15100,
                'rating' => 4.9,
                'gambar' => '/assets/img/roti/11-ikan-tuna.png',
                'stok' => 50,
                'deskripsi' => 'Roti gurih dengan isian tumisan ikan tuna suwir pedas manis dan potongan bawang bombay.',
                'bahan' => 'Ikan Tuna Suwir, Bawang Bombay, Mayones, Tepung Terigu, Ragi',
                'saran_penyimpanan' => 'Tahan 1 hari di suhu ruang. Hindari penyimpanan terlalu lama karena isian berbahan dasar ikan.'
            ],
            [
                'kategori' => 'roti',
                'nama' => 'Roti Srikaya',
                'tipe' => 'Roti',
                'harga' => 11700,
                'rating' => 4.9,
                'gambar' => '/assets/img/roti/12-isi-srikaya.png',
                'stok' => 50,
                'deskripsi' => 'Roti manis lembut dengan isian selai srikaya pandan tradisional yang wangi dan legit.',
                'bahan' => 'Selai Srikaya Pandan, Santan, Telur, Tepung Terigu, Ragi',
                'saran_penyimpanan' => 'Simpan di suhu ruang dalam kemasan tertutup (tahan 2-3 hari).'
            ]
        ]);
    }
}
