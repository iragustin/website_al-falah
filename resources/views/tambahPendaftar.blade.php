@extends('layouts.admin.layout')
@section('content')
    <div class="container-head">
        <h1>PANEL ADMIN PONDOK PESANTREN AL-QUR'AN AL-FALAH</h1>


    </div>

    <div class="container">
        <div class="container-form">
            @isset($pendaftar)
                <h1>EDIT PENDAFTAR</h1>
                <form action="/controlpanel/admin/pendaftar/edit/{{ $pendaftar->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" id="name" name="name" value="{{ $pendaftar->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin:</label>
                        <select id="gender" name="gender" required value="{{ $pendaftar->gender }}">
                            <option value="" selected>Pilih</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birth_place">Tempat Lahir:</label>
                        <input type="text" id="birth_place" name="birth_place" value="{{ $pendaftar->birth_place }}" required>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Tanggal Lahir:</label>
                        <input type="date" id="birth_date" name="birth_date" value="{{ $pendaftar->birth_date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon:</label>
                        <input type="tel" id="phone" name="phone" value="{{ $pendaftar->phone }}" pattern="[0-9]{9,}" required>
                        <small style="color:#cccccc">Contoh: 081234567890</small>
                    </div>
                    <div class="form-group">
                        <label for="mother_name">Nama Ibu:</label>
                        <input type="text" id="mother_name" name="mother_name" value="{{ $pendaftar->mother_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="father_name">Nama Ayah:</label>
                        <input type="text" id="father_name" name="father_name" value="{{ $pendaftar->father_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="parent_phone">Nomor Telepon Wali:</label>
                        <input type="tel" id="parent_phone" name="parent_phone" value="{{ $pendaftar->parent_phone }}" pattern="[0-9]{9,}" required>
                        <small style="color:#cccccc">Contoh: 081234567890</small>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail:</label>
                        <input type="text" id="email" name="email" value="{{ $pendaftar->email }}" required>
                        <small style="color:#cccccc">Catatan : Alamat E-mail aktif!</small>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat:</label>
                        <textarea id="address" name="address" required cols="50" rows="10">{{ $pendaftar->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="school_origin">Asal Sekolah:</label>
                        <input type="text" id="school_origin" name="school_origin" value="{{ $pendaftar->school_origin }}" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Jenis Pendaftaran:</label>
                        <select id="type" name="type" required value="{{ $pendaftar->type }}">
                            <option value="" selected>Pilih</option>
                            <option value="takhosus">Takhosus</option>
                            <option value="tahfidz">Tahfidz</option>
                        </select>
                    </div>
                    <div class="add-news-button">
                        <button type="submit">Edit Pendaftar</button>
                    </div>
                </form>
            @else
                <h1>TAMBAH PENDAFTAR</h1>
                <form action="/pendaftaran" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin:</label>
                        <select id="gender" name="gender" required>
                            <option value="" selected>Pilih</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birth_place">Tempat Lahir:</label>
                        <input type="text" id="birth_place" name="birth_place" required>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Tanggal Lahir:</label>
                        <input type="date" id="birth_date" name="birth_date" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon:</label>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{9,}" required>
                        <small style="color:#cccccc">Contoh: 081234567890</small>
                    </div>
                    <div class="form-group">
                        <label for="mother_name">Nama Ibu:</label>
                        <input type="text" id="mother_name" name="mother_name" required>
                    </div>
                    <div class="form-group">
                        <label for="father_name">Nama Ayah:</label>
                        <input type="text" id="father_name" name="father_name" required>
                    </div>
                    <div class="form-group">
                        <label for="parent_phone">Nomor Telepon Wali:</label>
                        <input type="tel" id="parent_phone" name="parent_phone" pattern="[0-9]{9,}" required>
                        <small style="color:#cccccc">Contoh: 081234567890</small>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail:</label>
                        <input type="text" id="email" name="email" required>
                        <small style="color:#cccccc">Catatan : Alamat E-mail aktif!</small>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat:</label>
                        <textarea id="address" name="address" required cols="50" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="school_origin">Asal Sekolah:</label>
                        <input type="text" id="school_origin" name="school_origin" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Jenis Pendaftaran:</label>
                        <select id="type" name="type" required>
                            <option value="" selected>Pilih</option>
                            <option value="takhosus">Takhosus</option>
                            <option value="tahfidz">Tahfidz</option>
                        </select>
                    </div>
                    <div class="add-news-button">
                        <button type="submit">Tambah Pendaftar</button>
                    </div>

                </form>
            @endisset

        </div>
    </div>
@endsection
