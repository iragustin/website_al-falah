@extends('layouts.admin.layout')
@section('content')
    <div class="container-head">
        <h1>PANEL ADMIN PONDOK PESANTREN AL-QUR'AN AL-FALAH</h1>


    </div>

    <div class="container">
        <div class="container-form">
            <h1>Ganti Password</h1>
            <form action="/controlpanel/admin/ganti-password" method="POST">
                @csrf
                <div class="form-group">
                    <label for="password">Password Baru:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Konfirmasi Password Baru:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="add-news-button">
                    <a><button>Simpan Perubahan</button></a>
                </div>

            </form>

        </div>

    </div>

    @endsection

