@extends('layouts.layout')
@section('content')
<!-- <section id="home">
    @if (session()->has('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif
    <div class="background-image">

    </div>
    <div class="headline">
        <h2>PONDOK PESANTREN AL-QUR'AN<br><span class="highlight">AL-FALAH</span><br>CICALENGKA - NAGREG - BANDUNG</h2>
    </div>
    <div class="model-photo">
        <img src="{{ asset('images/model.png') }}" alt="Model Photo">
    </div>

</section> -->

<section id="home">
    @if (session()->has('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

    <div class="container-home">
        <div class="headline">    
            <h2>PONDOK PESANTREN AL-QUR'AN<br><span class="highlight">AL-FALAH</span><br>CICALENGKA - NAGREG - BANDUNG</h2>
        </div>
        <img src="{{ asset('images/background_perusahaan.png') }}" alt="Model Photo" class="background-home">
        <img src="{{ asset('images/model.png') }}" alt="Model Photo" class="model-home">
    </div>

</section>

<script>
    window.onload = function() {
    var modelImage = document.getElementById('model-home');
    modelImage.onload = function() {
        var modelHeight = modelImage.offsetHeight;
        document.getElementById('home').style.height = modelHeight + 'px';
    };
};

</script>

<section id="statistik">
        <h1>STATISTIK PESANTREN</h1>
        <div class="statistik-container" >   
            <div class="kolom-statistik" style="background-color: #009665;">
                <div class="ikon"><img src="{{ asset('images/santri.png') }}" alt="Santri Icon"></div>
                <div class="jumlah">{{ $data->jumlah_santri }}</div>
                <div class="keterangan">Santri</div>
            </div>
            <div class="kolom-statistik" style="background-color: #FDA600;">
                <div class="ikon"><img src="{{ asset('images/teacher.png') }}" alt="Tenaga Pendidik Icon"></div>
                <div class="jumlah">{{ $data->jumlah_pendidik }}</div>
                <div class="keterangan">Tenaga Pendidik</div>
            </div>
            <div class="kolom-statistik" style="background-color: #00B3FF;">
                <div class="ikon"><img src="{{ asset('images/kependidikan.png') }}" alt="Tenaga Kependidikan Icon"></div>
                <div class="jumlah">{{ $data->jumlah_kependidikan }}</div>
                <div class="keterangan">Tenaga Kependidikan</div>
            </div>
            <div class="kolom-statistik" style="background-color: #FF5DE4;">
                <div class="ikon"><img src="{{ asset('images/kelompok.png') }}" alt="Rombongan Belajar Icon"></div>
                <div class="jumlah">{{ $data->jumlah_rombongan }}</div>
                <div class="keterangan">Rombongan Belajar</div>
            </div>
        </div>
    </section>
    
<script>
    var angkaElement = document.getElementById("angka");
    var angka = 0;

    function updateAngka() {
        angkaElement.textContent = angka;
        angka++;
        setTimeout(updateAngka, 1000); // Update angka setiap 1 detik
    }

    updateAngka(); // Panggil fungsi untuk memulai animasi

</script>

<section id="about">
    <div class="about-info">

        <div class="scrollable-text">
        <h2>SEJARAH SINGKAT</h2>
            <p>
            Drs. KH. Q Ahmad Syahid, M.Sc (alm) bin KH. Sholeh (alm), seorang kiai yang pernah menjuarai MTQ Tingkat Nasional Pertama 1968 di Makasar Ujung Pandang, dengan tekad yang kuat dan tanggung jawab sosial yang tinggi, di tengah himpitan keterbatasan ekonomi dan kondisi sosial yang tidak ramah, pada tanggal 3 Mei 1971 beliau merintis pendirian Pondok Pesantren al-Qur’an Al-Falah, di atas lahan seluas 2100 M2 dengan sebuah rumah tua yang dibeli dari KH. Romli Ishaq dengan uang hasil rekaman PH di Remaco sebesar Rp 60.000,-.
            
            <br></br>Di rumah tua itulah, dengan penuh suka cita beliau tinggal bersama isteri tercinta Hj. Euis Kultsum, dan sekaligus memulai misi “profetis”nya, untuk mengajarkan al-Qur’an dan menyemaikan nilai-nilai al-Qur’an dalam kehidupan sehari-hari. Dengan penuh ketekunan dan keikhlasan ngawuruk ngaji (dibaca: ta’lim, tarbiyah dan ta’dib), meski muridnya hanya tiga orang santri.
            
            <br></br>Seiring dengan perjalanan waktu, terutama setelah lawatan beliau ke Negeri Thailand masih pada tahun 1971 dalam rangka muhibah tilawat al-Qur’an, jumlah santri yang ingin berguru semakin bertambah, sehingga tempat pemondokan pun tidak mampu lagi menampung mereka. Oleh karena itu para santri pada waktu itu sempat dititipkan sementara di pabrik tektil yang belum beroperasi. Berkat kegigihan beliau dan kerjasama dengan semua lapisan masyarakat maka Pondok Pesantren Al-Qur’an Al-Falah, dalam tiga dasawarsa telah menjadi lembaga yang besar dan dikenal oleh banyak kalangan, karena peranannya dalam kehidupan masyarakat.
            
            </p>
            <!-- Tambahkan lebih banyak teks sesuai kebutuhan -->
        </div>
    </div>
    <div class="founder-photo">
        <img src="{{ asset('images/sejarah_singkat.png') }}" alt="Foto Pendiri Perusahaan">
    </div>
</section>

<section id="management">
    <div class="management-title">
        <h2>JAJARAN DEWAN PENGASUH</h2>
        <p>Pondok pesantren Al-Qur’an Al-falah Cicalengka - Nagreg - bandung</p>
    </div>
    <div class="management-container">
    <button class="scroll-left">&lt;</button>
    <div class="management-content">
        @foreach ($pengasuh as $p)
        <div class="card-container">
            <a href="/pengasuh/{{ $p->id }}" class="no-underline">
                <div class="card-box">
                    <img src="{{ asset('images/pengasuh/' . $p->image) }}" alt="Foto Pengasuh">
                    <span>{{ $p->name }}</span>
                </div>
            </a>
        </div>
        @endforeach


    </div>
    <button class="scroll-right">&gt;</button>
    </div>
    <!-- Daftar kepengurusan -->
</section>

<!-- Script JavaScript -->
<script>
document.querySelector('.scroll-left').addEventListener('click', function() {
    document.querySelector('.management-content').scrollBy({
        left: -290, // Sesuaikan dengan lebar kartu Anda
        behavior: 'smooth'
    });
});

document.querySelector('.scroll-right').addEventListener('click', function() {
    document.querySelector('.management-content').scrollBy({
        left: 290, // Sesuaikan dengan lebar kartu Anda
        behavior: 'smooth'
    });
});
</script>


<!-- <section id="affiliates">
    <div class="affiliates-header">
        <h2>LEMBAGA AL-FALAH</h2>
    </div>
    <div class="affiliates-logos">
        <div class="row-affiliates">
            <img src="{{ asset('logo/logo1.png') }}" alt="Logo 1">
            <img src="{{ asset('logo/logo2.png') }}" alt="Logo 2">
            <img src="{{ asset('logo/logo3.png') }}" alt="Logo 3">
            <img src="{{ asset('logo/logo4.png') }}" alt="Logo 4">
            <img src="{{ asset('logo/logo5.png') }}" alt="Logo 5">
            <img src="{{ asset('logo/logo6.png') }}" alt="Logo 6">
        </div>
        <div class="row-affiliates">
            <img src="{{ asset('logo/logo7.png') }}" alt="Logo 7" >
            <img src="{{ asset('logo/logo8.jpeg') }}" alt="Logo 8">
            <img src="{{ asset('logo/logo9.png') }}" alt="Logo 9">
            <img src="{{ asset('logo/logo10.png') }}" alt="Logo 10">
            <img src="{{ asset('logo/logo11.png') }}" alt="Logo 11">
            <img src="{{ asset('logo/logo12.png') }}" alt="Logo 12">
        </div>
    </div>
</section> -->

<section id="affiliates">
    <div class="affiliates-header">
        <h2>LEMBAGA AL-FALAH</h2>
    </div>
    <div class="affiliates-logos">
            <img class="logo-instansi" src="{{ asset('logo/logo1.png') }}" alt="Logo 1">
            <img class="logo-instansi" src="{{ asset('logo/logo2.png') }}" alt="Logo 2">
            <img class="logo-instansi" src="{{ asset('logo/logo3.png') }}" alt="Logo 3">
            <img class="logo-instansi" src="{{ asset('logo/logo4.png') }}" alt="Logo 4">
            <img class="logo-instansi" src="{{ asset('logo/logo5.png') }}" alt="Logo 5">
            <img class="logo-instansi" src="{{ asset('logo/logo6.png') }}" alt="Logo 6">
            <img class="logo-instansi" src="{{ asset('logo/logo7.png') }}" alt="Logo 7" >
            <img class="logo-instansi" src="{{ asset('logo/logo8.jpeg') }}" alt="Logo 8">
            <img class="logo-instansi" src="{{ asset('logo/logo9.png') }}" alt="Logo 9">
            <img class="logo-instansi" src="{{ asset('logo/logo10.png') }}" alt="Logo 10">
            <img class="logo-instansi" src="{{ asset('logo/logo11.png') }}" alt="Logo 11">
            <img class="logo-instansi" src="{{ asset('logo/logo12.png') }}" alt="Logo 12">
        </div>
        <!-- Tambahkan lebih banyak logo sesuai kebutuhan -->
    </div>
</section>

<section id="registration">
    <div class="registration-header">
        <h2>INFORMASI PENDAFTARAN</h2>
    </div>
    <div class="registration-content">
        @foreach ($pendaftaran as $p)
        <div class="row-registration">
            <div class="column-registration">
                <div class="card-box-pendaftaran">
                    <h3>{{ $p->name }}</h3>
                    <p>{{ $p->address }}</p>
                    <a href="{{ $p->link }}" class="registration-button-pendaftaran">Daftar Sekarang</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>

<section id="news">

    <div class="news-header">
        <h2>INFORMASI DAN BERITA</h2>
    </div>

    <div class="news-container">
        <button class="scroll-left">&lt;</button>
        @if (count($berita) > 0)
        <div class="news-content">
            @foreach ($berita as $b)
            <div class="card-container-news">
                <!-- card-box 1 -->
                <div class="card-box-news">
                    <img src="{{ asset('images/berita/' . $b->image) }}" alt="Foto Berita">
                    <h4>{{ $b->title }}</h4>
                    <p class="author">{{ $b->author }}</p>
                    <div class="card-box-news-date">
                        <p>{{ $b->date }}</p>
                        <a href="/berita/{{ $b->slug }}" class="news-button">Baca</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        <button class="scroll-right">&gt;</button>
    </div>

</section>

<script>
// Menambahkan event listener untuk tombol scroll kiri
document.querySelector('#news .scroll-left').addEventListener('click', function() {
    document.querySelector('#news .news-content').scrollBy({
        left: -320, // Sesuaikan dengan lebar konten Anda
        behavior: 'smooth'
    });
});

// Menambahkan event listener untuk tombol scroll kanan
document.querySelector('#news .scroll-right').addEventListener('click', function() {
    document.querySelector('#news .news-content').scrollBy({
        left: 320, // Sesuaikan dengan lebar konten Anda
        behavior: 'smooth'
    });
});
</script>

<section id="brosur">
    <div class="brosur-container">
    <h2>BROSUR</h2>
    <div class="brosur-container-content">
        <button class="scroll-left">&lt;</button>
        <div class="brosur-content">
            @foreach ($brosur as $p)
            <div class="brosur-card-container">
                <a class="no-underline" onclick="showPopup('{{ asset('images/brosur/' . $p->image) }}')">
                    <div class="brosur-card-box">
                        <img src="{{ asset('images/brosur/' . $p->image) }}" alt="Foto brosur">
                        <span>{{ $p->name }}</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <button class="scroll-right">&gt;</button>
    </div>
    </div>

    <!-- Modal popup -->
    <div id="myModal" class="modal">
        <span class="close" onclick="closePopup()">&times;</span>
        <img class="modal-content" id="modalImg">
    </div>

<script>
    // Fungsi untuk menampilkan modal popup
function showPopup(imageSrc) {
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("modalImg");

    modal.style.display = "block";
    modalImg.src = imageSrc;
}

// Fungsi untuk menutup modal popup
function closePopup() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}
    
</script>
    
    <div class="brosur-title">
        <h2>ALAMAT PONDOK PESANTREN</h2>
        <iframe id="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2336856374445!2d107.8349992!3d-6.9817276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c5eaa4d6a4d9%3A0x146cbbef00b69bd8!2sPondok%20Pesantren%20Al-Qur%27an%20Al-Falah%201!5e0!3m2!1sid!2sid!4v1711956352852!5m2!1sid!2sid" width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <p id="location-info">Pondok pesantren Al-Qur’an Al-falah 1 Cicalengka</p>
        <div class="location-buttons">
            <button onclick="changeLocation('location1')">Al-Falah 1</button>
            <button onclick="changeLocation('location2')">Al-Falah 2</button>
        </div>
    </div>

    <!-- Daftar kepengurusan -->
</section>

<!-- Script JavaScript -->
<script>
    document.querySelector('#brosur .scroll-left').addEventListener('click', function() {
        document.querySelector('#brosur .brosur-content').scrollBy({
            left: -300, // Sesuaikan dengan lebar konten Anda
            behavior: 'smooth'
        });
    });

    document.querySelector('#brosur .scroll-right').addEventListener('click', function() {
        document.querySelector('#brosur .brosur-content').scrollBy({
            left: 300, // Sesuaikan dengan lebar konten Anda
            behavior: 'smooth'
        });
    });
</script>

<script>
        function changeLocation(location) {
            var iframe = document.getElementById('google-map');
            var locationInfo = document.getElementById('location-info');
            if (location === 'location1') {
                iframe.src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2336856374445!2d107.8349992!3d-6.9817276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c5eaa4d6a4d9%3A0x146cbbef00b69bd8!2sPondok%20Pesantren%20Al-Qur%27an%20Al-Falah%201!5e0!3m2!1sid!2sid!4v1711956352852!5m2!1sid!2sid';
                locationInfo.textContent = 'Pondok pesantren Al-Qur’an Al-Falah 1 Cicalengka';
            } else if (location === 'location2') {
                iframe.src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.914489514422!2d107.89266857563884!3d-7.01933729298228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c8dd69c4feef%3A0xb0dfb71340d05c5a!2sPondok%20Pesantren%20Al-Qur%27an%20Al-Falah%202!5e0!3m2!1sid!2sid!4v1711960098873!5m2!1sid!2sid';
                locationInfo.textContent = 'Pondok pesantren Al-Qur’an Al-Falah 2 Nagreg';
            }
        }
    </script>



@endsection