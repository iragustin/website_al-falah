@extends('layouts.layout')
@section('content')

    <div class="container-registration-notes">
        <div class="kolom-registration-notes">
            <h2>UPLOAD BUKTI PEMBAYARAN</h2>
            <p>Sudah mengisi pendaftaran dan ingin mengunggah bukti pendaftaran?</p>
            <a href="/bukti-pembayaran">Klik disini!</a>
        </div>
        <div class="kolom-registration-notes">
            <h2>LIHAT STATUS PEMBAYARAN</h2>
            <p>Cek status pembayaran pendaftar </p>
            <a href="/status-pembayaran">Klik disini!</a>
        </div>
    </div>

    <section id="registration-form">
        <h2>FORM PENDAFTARAN</h2>
        <form action="/pendaftaran" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="fullname">Nama Lengkap:</label>
                <input type="text" id="fullname" name="name" required>
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select id="gender" name="gender">
                    <option value="laki-laki">Laki-laki</option>
                    <option value="female">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birth_place">Tempat Lahir:</label>
                <input type="text" id="place" name="birth_place" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Tanggal Lahir:</label>
                <input type="date" id="birthdate" name="birth_date" required>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{9,}" required>
                <small>Contoh: 081234567890</small>
            </div>
            <div class="form-group">
                <label for="mothername">Nama Ibu:</label>
                <input type="text" id="mothername" name="mother_name" required>
            </div>
            <div class="form-group">
                <label for="fathername">Nama Ayah:</label>
                <input type="text" id="fathername" name="father_name" required>
            </div>
            <div class="form-group">
                <label for="parentphone">Nomor Telepon Wali:</label>
                <input type="tel" id="parentphone" name="parent_phone" pattern="[0-9]{9,}" required>
                <small>Contoh: 081234567890</small>
            </div>
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="text" id="email" name="email" required>
                <small>Catatan : Alamat E-mail aktif!</small>
            </div>
            <div class="form-group">
                <label for="address">Alamat:</label>
                <textarea id="address" name="address" required cols="27" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="school">Asal Sekolah:</label>
                <input type="text" id="school" name="school_origin" required>
            </div>
            <div class="form-group">
                <label for="type">Jenis Pendaftaran:</label>
                <select id="type" name="type" required>
                    <option value="" selected>Pilih</option>
                    <option value="takhosus">Takhosus</option>
                    <option value="tahfidz">Tahfidz</option>
                </select>
            </div>

            <div class="form-group">
                <label for="payment_option">Pembayaran:</label>
                <select id="payment_option" name="payment_option" onchange="togglePayment()">
                    <option value="" selected>Pilih</option>
                    <option value="upload_proof">Upload Foto Bukti</option>
                    <option value="unpaid">Belum Bayar</option>
                </select>
                <p>Pembayaran formulir pendaftaran sebesar <span class="bold-regist">Rp.50.000</span> melalui No. rek <span class="bold-regist"> BCA 6019 9999 9999 9999</span></p>

            </div>

            <div id="proof_upload" style="display: none;" class="form-group">
                <label for="payment_proof">Upload Foto Bukti Pembayaran:</label>
                <input type="file" id="payment_proof" name="payment_proof" accept="image/*">
                <small>Format yang didukung: JPG, JPEG, PNG. Maksimal ukuran file: 2MB.</small>
            </div>
            <div id="payment_status" style="display: none;" class="form-group">
                <input type="hidden" name="payment_status" value="unpaid">
            </div>

            <button type="submit">KIRIM</button>
        </form>
    </section>

@endsection

<script>
    function togglePayment() {
        var paymentOption = document.getElementById("payment_option").value;
        var proofUpload = document.getElementById("proof_upload");
        var paymentStatus = document.getElementById("payment_status");

        if (paymentOption === "upload_proof") {
            proofUpload.style.display = "block";
            paymentStatus.style.display = "none";
        } else if (paymentOption === "unpaid") {
            proofUpload.style.display = "none";
            paymentStatus.style.display = "block";
        }
    }
</script>