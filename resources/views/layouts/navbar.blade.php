<div class="logo">
    <img src="{{ asset('images/logo-perusahaan.png') }}" alt="Logo Perusahaan">
</div>

<input type="checkbox" id="check">
<label for="check" class="icon-menu">
    <i class="bx bx-menu" id="menu-icon"><img src="{{ asset('images/menu.png') }}" alt="Menu"></i>
    <i class="bx bx-x" id="close-icon"><img src="{{ asset('images/delete.png') }}" alt="Menu"></i>
</label>

<nav class="navbar-box">
        @if (Request::path() == '/')
        <a href="#home">Beranda</a></li>
        <a href="#about">Tentang</a></li>
        <a href="#management" id="kepengurusan">Kepengurusan</a></li>
        <a href="#affiliates" id="lembaga">Lembaga Terkait</a></li>               
        <a href="#news">Berita</a></li>
        <a href="/pendaftaran" class="registration-button" >Pendaftaran</a></li>
        @else
        <a href="/">Beranda</a></li>
        <a href="/#about">Tentang</a></li>
        <a href="/#management">Kepengurusan</a></li>
        <a href="/#affiliates">Lembaga Terkait</a></li>
        <a href="/#news">Berita</a></li>
        <a href="/pendaftaran" class="registration-button" >Pendaftaran</a></li>
        @endif
</nav>