<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Propinsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('propinsi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('propinsi');
            $table->string('kota');
        });

       $data = [
           ['kota'=>'Meulaboh', 'propinsi'=>'Aceh'],
           ['kota'=>'Biangpidie', 'propinsi'=>'Aceh'],
           ['kota'=>'Jantho', 'propinsi'=>'Aceh'],
           ['kota'=>'Krueng Sabee', 'propinsi'=>'Aceh'],
           ['kota'=>'Tapak Tuan', 'propinsi'=>'Aceh'],
           ['kota'=>'Singkil', 'propinsi'=>'Aceh'],
           ['kota'=>'Kuala Simpang', 'propinsi'=>'Aceh'],
           ['kota'=>'Takengon', 'propinsi'=>'Aceh'],
           ['kota'=>'Kutacane', 'propinsi'=>'Aceh'],
           ['kota'=>'Idi Rayeuk', 'propinsi'=>'Aceh'],
           ['kota'=>'Lhoksukon', 'propinsi'=>'Aceh'],
           ['kota'=>'Simpang Tiga Redelon', 'propinsi'=>'Aceh'],
           ['kota'=>'Bireuen', 'propinsi'=>'Aceh'],
           ['kota'=>'Blang Kejeren', 'propinsi'=>'Aceh'],
           ['kota'=>'Suka Makmue', 'propinsi'=>'Aceh'],
           ['kota'=>'Sigil', 'propinsi'=>'Aceh'],
           ['kota'=>'Meureudu', 'propinsi'=>'Aceh'],
           ['kota'=>'Sinabang', 'propinsi'=>'Aceh'],
           ['kota'=>'Banda Aceh', 'propinsi'=>'Aceh'],
           ['kota'=>'Langsa', 'propinsi'=>'Aceh'],
           ['kota'=>'Lhokseumawe', 'propinsi'=>'Aceh'],
           ['kota'=>'Sabang', 'propinsi'=>'Aceh'],
           ['kota'=>'Subulussalam', 'propinsi'=>'Aceh'],
           ['kota'=>'Manna', 'propinsi'=>'Bengkulu'],
           ['kota'=>'Arga Makmur', 'propinsi'=>'Bengkulu'],
           ['kota'=>'Kaur', 'propinsi'=>'Bengkulu'],
           ['kota'=>'Kepahiang', 'propinsi'=>'Bengkulu'],
           ['kota'=>'Lebong', 'propinsi'=>'Bengkulu'],
           ['kota'=>'Muko-muko', 'propinsi'=>'Bengkulu'],
           ['kota'=>'Curup', 'propinsi'=>'Bengkulu'],
           ['kota'=>'Tais', 'propinsi'=>'Bengkulu'],
           ['kota'=>'Bengkulu', 'propinsi'=>'Bengkulu'],
           ['kota'=>'Muara Bulian', 'propinsi'=>'Jambi'],
           ['kota'=>'Muara Bungo', 'propinsi'=>'Jambi'],
           ['kota'=>'Sungai Penuh', 'propinsi'=>'Jambi'],
           ['kota'=>'Bangko', 'propinsi'=>'Jambi'],
           ['kota'=>'Sengeti', 'propinsi'=>'Jambi'],
           ['kota'=>'Sarolangun', 'propinsi'=>'Jambi'],
           ['kota'=>'Muarasabak', 'propinsi'=>'Jambi'],
           ['kota'=>'Kualatungkai', 'propinsi'=>'Jambi'],
           ['kota'=>'Muara Tebo', 'propinsi'=>'Jambi'],
           ['kota'=>'Jambi', 'propinsi'=>'Jambi'],
           ['kota'=>'Bengkalis', 'propinsi'=>'Riau Daratan'],
           ['kota'=>'Tembilahan', 'propinsi'=>'Riau Daratan'],
           ['kota'=>'Rengat', 'propinsi'=>'Riau Daratan'],
           ['kota'=>'Bangkinang', 'propinsi'=>'Riau Daratan'],
           ['kota'=>'Teluk Kuantan', 'propinsi'=>'Riau Daratan'],
           ['kota'=>'Pangkalan Kerinci', 'propinsi'=>'Riau Daratan'],
           ['kota'=>'Pasir Pangaraian', 'propinsi'=>'Riau Daratan'],
           ['kota'=>'Bagan Siapi-api', 'propinsi'=>'Riau Daratan'],
           ['kota'=>'Siak Sriindrapura', 'propinsi'=>'Riau Daratan'],
           ['kota'=>'Dumai', 'propinsi'=>'Riau Daratan'],
           ['kota'=>'Pekanbaru', 'propinsi'=>'Riau Daratan'],
           ['kota'=>'Duri', 'propinsi'=>'Riau Daratan'],
           ['kota'=>'Lubuk Basung', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Pualu Punjung', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Sarilamak', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Tuapejat', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Pariaman', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Lubuk Sikaping', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Simpang Empat', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Painan', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Muara', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Arosuka', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Padang Aro', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Batu Sangkar', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Bukit Tinggi', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Padang', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Padang Panjang', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Pariaman', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Payakumbuh', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Sawahlunto', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Solok', 'propinsi'=>'Sumatera Barat'],
           ['kota'=>'Pangkalan Balai', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Tebing Tinggi', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Lahat', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Muara Enim', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Sekayu', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Muara Beliti Baru', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Indralaya', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Kayu Agung', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Baturaja', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Martapura', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Muaradua', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Lubuk Linggau', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Pagar Alam', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Palembang', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Prabumulih', 'propinsi'=>'Sumatera Selatan'],
           ['kota'=>'Liwa', 'propinsi'=>'Lampung'],
           ['kota'=>'Kalianda', 'propinsi'=>'Lampung'],
           ['kota'=>'Gunung Sugih', 'propinsi'=>'Lampung'],
           ['kota'=>'Sukadana', 'propinsi'=>'Lampung'],
           ['kota'=>'Kotabumi', 'propinsi'=>'Lampung'],
           ['kota'=>'Blambangan Umpu', 'propinsi'=>'Lampung'],
           ['kota'=>'Kota Agung', 'propinsi'=>'Lampung'],
           ['kota'=>'Menggala', 'propinsi'=>'Lampung'],
           ['kota'=>'Gedong Tataan', 'propinsi'=>'Lampung'],
           ['kota'=>'Bandar Lampung', 'propinsi'=>'Lampung'],
           ['kota'=>'Metro', 'propinsi'=>'Lampung'],
           ['kota'=>'Sungailiat', 'propinsi'=>'Bangka Belitung'],
           ['kota'=>'Kelapa', 'propinsi'=>'Bangka Belitung'],
           ['kota'=>'Koba', 'propinsi'=>'Bangka Belitung'],
           ['kota'=>'Toboali', 'propinsi'=>'Bangka Belitung'],
           ['kota'=>'Tanjung Pandan', 'propinsi'=>'Bangka Belitung'],
           ['kota'=>'Manggar', 'propinsi'=>'Bangka Belitung'],
           ['kota'=>'Pangkal Pinang', 'propinsi'=>'Bangka Belitung'],
           ['kota'=>'Tanjung, Tanjung Balai Karimun', 'propinsi'=>'Riau Kepulauan'],
           ['kota'=>'Bandar Seri Bentan', 'propinsi'=>'Riau Kepulauan'],
           ['kota'=>'Daik', 'propinsi'=>'Riau Kepulauan'],
           ['kota'=>'Ranai', 'propinsi'=>'Riau Kepulauan'],
           ['kota'=>'Batam', 'propinsi'=>'Riau Kepulauan'],
           ['kota'=>'Tanjung Pinang', 'propinsi'=>'Riau Kepulauan'],
           ['kota'=>'Tigaraksa', 'propinsi'=>'Banten'],
           ['kota'=>'Tangerang', 'propinsi'=>'Banten'],
           ['kota'=>'Serang', 'propinsi'=>'Banten'],
           ['kota'=>'Rangkasbitung', 'propinsi'=>'Banten'],
           ['kota'=>'Pandeglang', 'propinsi'=>'Banten'],
           ['kota'=>'Baros', 'propinsi'=>'Banten'],
           ['kota'=>'Cilegon', 'propinsi'=>'Banten'],
           ['kota'=>'Jakata Barat', 'propinsi'=>'Jakarta'],
           ['kota'=>'Jakarta Selatan', 'propinsi'=>'Jakarta'],
           ['kota'=>'Jakarta Pusat', 'propinsi'=>'Jakarta'],
           ['kota'=>'Jakarta Timur', 'propinsi'=>'Jakarta'],
           ['kota'=>'Jakarta Utara', 'propinsi'=>'Jakarta'],
           ['kota'=>'Bantul', 'propinsi'=>'Yogyakarta'],
           ['kota'=>'Wonosari', 'propinsi'=>'Yogyakarta'],
           ['kota'=>'Wates', 'propinsi'=>'Yogyakarta'],
           ['kota'=>'Sleman', 'propinsi'=>'Yogyakarta'],
           ['kota'=>'Yogyakarta', 'propinsi'=>'Yogyakarta'],
           ['kota'=>'Bangkalan', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Banyuwangi', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Blitar', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Bondowoso', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Gresik', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Jember', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Jombang', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Kediri', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Lamongan', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Lumajang', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Caruban', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Magetan', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Kepanjen', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Mojokerto', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Nganjuk', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Ngawi', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Pacitan', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Pamekasan', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Pandaan', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Ponorogo', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Bantaran', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Sampang', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Sidoarjo', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Situbondo', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Sumenep', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Trenggalek', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Tuban', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Tulungagung', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Batu', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Blitar', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Kediri', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Madiun', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Malang', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Mojokerto', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Pasuruan', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Probolinggo', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Surabaya', 'propinsi'=>'Jawa Timur'],
           ['kota'=>'Menguwi', 'propinsi'=>'Bali'],
           ['kota'=>'Bangli', 'propinsi'=>'Bali'],
           ['kota'=>'Singaraja', 'propinsi'=>'Bali'],
           ['kota'=>'Gianyar', 'propinsi'=>'Bali'],
           ['kota'=>'Negara', 'propinsi'=>'Bali'],
           ['kota'=>'Amiapura', 'propinsi'=>'Bali'],
           ['kota'=>'Samarapura', 'propinsi'=>'Bali'],
           ['kota'=>'Tabanan', 'propinsi'=>'Bali'],
           ['kota'=>'Denpasar', 'propinsi'=>'Bali'],
           ['kota'=>'Cikarang', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Cibinong', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Sukabumi', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Cianjur', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Sukabumi', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Sumber', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Indramayu', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Kuningan', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Majalengka', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Cirebon', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Karawang', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Purwakarta', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Subang', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Soreang', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Ngamprah', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Sumedang', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Singaparna', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Tasikmalaya', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Garut', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Ciamis', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Bandung', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Cimahi', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Banjar', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Bekasi', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Bogor', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Depok', 'propinsi'=>'Jawa Barat'],
           ['kota'=>'Kalabahi', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Atambua', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Ende', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Larantuka', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Oelamasi', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Lewoleba', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Ruteng', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Labuan Bajo', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Borong', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Mbay', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Bajawa', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Baa', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Maumere', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Waikabubak', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Tambolaka', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Waibakul', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Waingapu', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Soe', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Kafamenanu', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Kupang', 'propinsi'=>'Nusa Tenggara Timur'],
           ['kota'=>'Banjarnegara', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Purwokerto', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Batang', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Blora', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Brebes', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Demak', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Wonosalam', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Jepara', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Kendal', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Kudus', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Pati', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Kajen', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Pemalang', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Purbalingga', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Rembang', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Ungaran', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Slawi', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Salatiga', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Semarang', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Pekalongan', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Tegal', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Bojonegoro', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Mungkid', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Cilacap', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Boyolali', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Karanganyar', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Kebumen', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Klaten', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Purworejo', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Sragen', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Sukoharjo', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Temanggung', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Wonogiri', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Wonosobo', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Magelang', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Surakarta / Solo', 'propinsi'=>'Jawa Tengah'],
           ['kota'=>'Woha', 'propinsi'=>'Nusa Tenggara Barat'],
           ['kota'=>'Dompu', 'propinsi'=>'Nusa Tenggara Barat'],
           ['kota'=>'Gerung', 'propinsi'=>'Nusa Tenggara Barat'],
           ['kota'=>'Praya', 'propinsi'=>'Nusa Tenggara Barat'],
           ['kota'=>'Selong', 'propinsi'=>'Nusa Tenggara Barat'],
           ['kota'=>'Sumbawa Besar', 'propinsi'=>'Nusa Tenggara Barat'],
           ['kota'=>'Taliwang', 'propinsi'=>'Nusa Tenggara Barat'],
           ['kota'=>'Mataram', 'propinsi'=>'Nusa Tenggara Barat'],
           ['kota'=>'Bima', 'propinsi'=>'Nusa Tenggara Barat'],
           ['kota'=>'Bengkayang', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Putussibau', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Ketapang', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Sukadana / Teluk Melano', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Ngabang', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Nanga Pinoh', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Mempawah', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Sambas', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Sanggau', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Sekadau Hilir', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Sintang', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Sungai Raya', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Pontianak', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Singkawang', 'propinsi'=>'Kalimantan Barat'],
           ['kota'=>'Paringin', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Martapura', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Marabahan', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Kandangan', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Barabai', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Amuntai', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Kotabaru', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Pelaihari', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Tanjung', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Batu Licin', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Rantau', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Banjarbaru', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Banjarmasin', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Buntok', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Tamiang Layang', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Muara Teweh', 'propinsi'=>'Kalimantan Selatan'],
           ['kota'=>'Kuala Kurun', 'propinsi'=>'Kalimantan Tengah'],
           ['kota'=>'Kuala Kapuas', 'propinsi'=>'Kalimantan Tengah'],
           ['kota'=>'Kasongan', 'propinsi'=>'Kalimantan Tengah'],
           ['kota'=>'Pangkalan Bun', 'propinsi'=>'Kalimantan Tengah'],
           ['kota'=>'Sampit', 'propinsi'=>'Kalimantan Tengah'],
           ['kota'=>'Nanga Bulik', 'propinsi'=>'Kalimantan Tengah'],
           ['kota'=>'Puruk Cahu', 'propinsi'=>'Kalimantan Tengah'],
           ['kota'=>'Pulang Pisau', 'propinsi'=>'Kalimantan Tengah'],
           ['kota'=>'Sukamara', 'propinsi'=>'Kalimantan Tengah'],
           ['kota'=>'Kuala Pembuang', 'propinsi'=>'Kalimantan Tengah'],
           ['kota'=>'Palangkaraya', 'propinsi'=>'Kalimantan Tengah'],
           ['kota'=>'Tanjung Redep', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Tanjung Selor', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Sendawar', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Tenggarong', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Sanggata', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Malinau', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Nunukan', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Tanah Grogot', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Penajam', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Tana Tidung', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Balik Papan', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Bontang', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Samarinda', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Tarakan', 'propinsi'=>'Kalimantan Timur'],
           ['kota'=>'Tilamuta', 'propinsi'=>'Gorontalo'],
           ['kota'=>'Suwawa', 'propinsi'=>'Gorontalo'],
           ['kota'=>'Limboto', 'propinsi'=>'Gorontalo'],
           ['kota'=>'Kwandang', 'propinsi'=>'Gorontalo'],
           ['kota'=>'Marisa', 'propinsi'=>'Gorontalo'],
           ['kota'=>'Gorontalo', 'propinsi'=>'Gorontalo'],
           ['kota'=>'Bantaeng', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Barru', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Watampone', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Bulukumba', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Enrekang', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Sungguminasa', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Jeneponto', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Belopa', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Soroako / Malili', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Masamba', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Maros', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Pangkajene', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Pinrang', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Benteng', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Sinjai', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Sidenreng', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Watansoppeng', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Takalar', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Makale', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Sengkang', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Makassar', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Palopo', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Pare-Pare', 'propinsi'=>'Sulawesi Selatan'],
           ['kota'=>'Rumbia', 'propinsi'=>'Sulawesi Tenggara'],
           ['kota'=>'Pasar Wajo', 'propinsi'=>'Sulawesi Tenggara'],
           ['kota'=>'Kolaka', 'propinsi'=>'Sulawesi Tenggara'],
           ['kota'=>'Lasusua', 'propinsi'=>'Sulawesi Tenggara'],
           ['kota'=>'Unaaha', 'propinsi'=>'Sulawesi Tenggara'],
           ['kota'=>'Wanggodo / Andolo', 'propinsi'=>'Sulawesi Tenggara'],
           ['kota'=>'Raha', 'propinsi'=>'Sulawesi Tenggara'],
           ['kota'=>'Wangi-Wangi', 'propinsi'=>'Sulawesi Tenggara'],
           ['kota'=>'Bau-Bau', 'propinsi'=>'Sulawesi Tenggara'],
           ['kota'=>'Kendari', 'propinsi'=>'Sulawesi Tenggara'],
           ['kota'=>'Luwuk', 'propinsi'=>'Sulawesi Tengah'],
           ['kota'=>'Banggai', 'propinsi'=>'Sulawesi Tengah'],
           ['kota'=>'Buol', 'propinsi'=>'Sulawesi Tengah'],
           ['kota'=>'Banawa', 'propinsi'=>'Sulawesi Tengah'],
           ['kota'=>'Bungku', 'propinsi'=>'Sulawesi Tengah'],
           ['kota'=>'Parigi', 'propinsi'=>'Sulawesi Tengah'],
           ['kota'=>'Poso', 'propinsi'=>'Sulawesi Tengah'],
           ['kota'=>'Ampana', 'propinsi'=>'Sulawesi Tengah'],
           ['kota'=>'Tolitoli', 'propinsi'=>'Sulawesi Tengah'],
           ['kota'=>'Palu', 'propinsi'=>'Sulawesi Tengah'],
           ['kota'=>'Kotamobagu', 'propinsi'=>'Sulawesi Utara'],
           ['kota'=>'Boroko', 'propinsi'=>'Sulawesi Utara'],
           ['kota'=>'Tahuna', 'propinsi'=>'Sulawesi Utara'],
           ['kota'=>'Melonguane', 'propinsi'=>'Sulawesi Utara'],
           ['kota'=>'Tondano', 'propinsi'=>'Sulawesi Utara'],
           ['kota'=>'Airmadidi', 'propinsi'=>'Sulawesi Utara'],
           ['kota'=>'Amurang', 'propinsi'=>'Sulawesi Utara'],
           ['kota'=>'Ratahan', 'propinsi'=>'Sulawesi Utara'],
           ['kota'=>'Bitung', 'propinsi'=>'Sulawesi Utara'],
           ['kota'=>'Manado', 'propinsi'=>'Sulawesi Utara'],
           ['kota'=>'Tomohon', 'propinsi'=>'Sulawesi Utara'],
           ['kota'=>'Namlea', 'propinsi'=>'Maluku'],
           ['kota'=>'Dobo', 'propinsi'=>'Maluku'],
           ['kota'=>'Masohi', 'propinsi'=>'Maluku'],
           ['kota'=>'Tual', 'propinsi'=>'Maluku'],
           ['kota'=>'Saumlaki', 'propinsi'=>'Maluku'],
           ['kota'=>'Piru', 'propinsi'=>'Maluku'],
           ['kota'=>'Dataran Hunimoa', 'propinsi'=>'Maluku'],
           ['kota'=>'Ambon', 'propinsi'=>'Maluku'],
           ['kota'=>'Majene', 'propinsi'=>'Sulawesi Barat'],
           ['kota'=>'Mamasa', 'propinsi'=>'Sulawesi Barat'],
           ['kota'=>'Mamuju', 'propinsi'=>'Sulawesi Barat'],
           ['kota'=>'Pasangkayu', 'propinsi'=>'Sulawesi Barat'],
           ['kota'=>'Polewali', 'propinsi'=>'Sulawesi Barat'],
           ['kota'=>'Jailolo', 'propinsi'=>'Maluku Utara'],
           ['kota'=>'Labuha', 'propinsi'=>'Maluku Utara'],
           ['kota'=>'Weda', 'propinsi'=>'Maluku Utara'],
           ['kota'=>'Maba', 'propinsi'=>'Maluku Utara'],
           ['kota'=>'Tobelo', 'propinsi'=>'Maluku Utara'],
           ['kota'=>'Sanana', 'propinsi'=>'Maluku Utara'],
           ['kota'=>'Ternate', 'propinsi'=>'Maluku Utara'],
           ['kota'=>'Tidore', 'propinsi'=>'Maluku Utara'],
           ['kota'=>'Fak-Fak', 'propinsi'=>'Papua Barat'],
           ['kota'=>'Kaimana', 'propinsi'=>'Papua Barat'],
           ['kota'=>'Waisai', 'propinsi'=>'Papua Barat'],
           ['kota'=>'Abun', 'propinsi'=>'Papua Barat'],
           ['kota'=>'Teminabuan', 'propinsi'=>'Papua Barat'],
           ['kota'=>'Bintuni', 'propinsi'=>'Papua Barat'],
           ['kota'=>'Rasei', 'propinsi'=>'Papua Barat'],
           ['kota'=>'Sorong', 'propinsi'=>'Papua Barat'],
           ['kota'=>'Timika', 'propinsi'=>'Papua Barat'],
           ['kota'=>'Monokwari', 'propinsi'=>'Papua Barat'],
           ['kota'=>'Nabire', 'propinsi'=>'Papua Barat'],
           ['kota'=>'Enarotari', 'propinsi'=>'Papua Barat'],
           ['kota'=>'Agats', 'propinsi'=>'Papua'],
           ['kota'=>'Biak', 'propinsi'=>'Papua'],
           ['kota'=>'Tanah Merah', 'propinsi'=>'Papua'],
           ['kota'=>'Demta', 'propinsi'=>'Papua'],
           ['kota'=>'Wamena', 'propinsi'=>'Papua'],
           ['kota'=>'Waris', 'propinsi'=>'Papua'],
           ['kota'=>'Kepi', 'propinsi'=>'Papua'],
           ['kota'=>'Merauke', 'propinsi'=>'Papua'],
           ['kota'=>'Oksibil', 'propinsi'=>'Papua'],
           ['kota'=>'Mulia', 'propinsi'=>'Papua'],
           ['kota'=>'Sarmi', 'propinsi'=>'Papua'],
           ['kota'=>'Sorendiweri', 'propinsi'=>'Papua'],
           ['kota'=>'Karubaga', 'propinsi'=>'Papua'],
           ['kota'=>'Botawa', 'propinsi'=>'Papua'],
           ['kota'=>'Sumohai', 'propinsi'=>'Papua'],
           ['kota'=>'Serui', 'propinsi'=>'Papua'],
           ['kota'=>'Burmeso', 'propinsi'=>'Papua'],
           ['kota'=>'Jayapura', 'propinsi'=>'Papua'],
           ['kota'=>'Kisaran','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Limapuluh','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Sidikalang','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Lubuk Pakam','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Dolok Sanggul','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Kabanjahe','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Rantau Prapat','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Kota Pinang','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Aek Kanopan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Stabat','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Panyabungan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Gunung Sitoli','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Lahomi','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Teluk Dalam','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Lotu','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Sibuhuan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Gunung Tua','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Salak','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Panguruan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Sei Rampah','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Raya','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Sipirok','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Pandan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Tarutung','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Balige','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Binjai','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Medan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Gunungsitoli','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Padangsidempuan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Pematangsiantar','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Sibolga','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Tanjungbalai','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Tebing Tinggi','propinsi'=>'Sumatera Utara'],
           ];
       foreach ($data as $item) {
           $kota = $item['kota'];
           $propinsi = $item['propinsi'];
           DB::table('propinsi')->insert(
               array('kota'=>$kota,
                     'propinsi'=>$propinsi
                 )
           );
       }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('propinsi');
    }
}