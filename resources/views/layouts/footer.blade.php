<!-- <p>Hak Cipta &copy; 2024 Pondok Pesantren Al-Qur'an Al-Falah Cicalengka Nagreg Bandung</p> -->
<footer class="footer">
    <div class="container">
        <div class="row-footer">
            <div class="col-md-3">
                <div class="footer-col">
                    <img src="{{ asset('images/logo-perusahaan.png') }}"  alt="Logo" class="footer-logo">
                    <p>Pondok pesantren Al-Quran Al-falah</p>
                    <p>Cicalengka-Nagreg-Bandung</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-col">
                    <h4>Alamat</h4>
                    <p>Al-falah 1</p>
                    <p>Jl. Kapten Sangun No.6, RT.01/RW.03, Tenjolaya, Kec. Cicalengka, Kabupaten Bandung, Jawa Barat 40395</p>
                    <p>Al-falah 2</p>
                    <p>Nagreg, Kec. Nagreg, Kabupaten Bandung, Jawa Barat 40214</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-col">
                    <h4>Links</h4>
                    <ul>
                        @if (Request::path() == '/')
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#about">Tentang</a></li>
                        <li><a href="#management">Kepengurusan</a></li>
                        <li><a href="#affiliates">Lembaga Terkait</a></li>               
                        <li><a href="#news">Berita</a></li>
                        @else
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/#about">Tentang</a></li>
                        <li><a href="/#management">Kepengurusan</a></li>
                        <li><a href="/#affiliates">Lembaga Terkait</a></li>
                        <li><a href="/#news">Berita</a></li>
                        @endif

                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-col">
                    <h4>Kontak dan Sosial Media</h4>
                    <p>Email: info@perusahaan.com</p>
                    <div class="social-media">
                        <a href="https://www.facebook.com/OfficialPonpesAlQuranAlFalah"><img src="{{ asset('images/facebook.png') }}" alt="Facebook" class="sosmed-logo"></a>
                        <a href="https://www.instagram.com/official_ponpesalquranalfalah/"><img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="sosmed-logo"></a>
                        <a href="https://www.youtube.com/@officialponpesalquranalfalah/videos"><img src="{{ asset('images/youtube.png') }}" alt="Youtube" class="sosmed-logo"></a>
                        <a href="https://www.tiktok.com/@ponpesalquranalfalah"><img src="{{ asset('images/tik-tok.png') }}" alt="tiktok" class="sosmed-logo"></a>
                        <a href="https://twitter.com/officialalfalah"><img src="{{ asset('images/twitter.png') }}" alt="twitter" class="sosmed-logo"></a>
                        <!-- Tambahkan ikon sosial media lainnya sesuai kebutuhan -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="footer-bottom">
                    <p>&copy; 2024 Pondok Pesantren Al-Qur'an Al-Falah Cicalengka Nagreg Bandung. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
