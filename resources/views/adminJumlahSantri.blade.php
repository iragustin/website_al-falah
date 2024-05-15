@extends('layouts.admin.layout')
@section('content')

<div class="container-head">
    <h1>PANEL ADMIN PONDOK PESANTREN AL-QUR'AN AL-FALAH</h1>

</div>
<!-- Tempatkan konten admin di sini -->
        <div class="container">
            <h1>Data Jumlah Santri</h1>
            <form action="/controlpanel/admin/jumlahsantri" method="POST">
                @csrf
            <table>
                <thead>
                    <tr>
                        <th>Jumlah Santri</th>
                        <th>Jumlah Tenaga Pendidik</th>
                        <th>Jumlah Tenaga Kependidikan</th>
                        <th>Rombongan Belajar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="number" name="jumlah_santri" class="form-input" value="{{ $data->jumlah_santri }}" min="0" step="1" style="border: none; outline: none;"></td>
                        <td><input type="number" name="jumlah_pendidik" class="form-input" value="{{ $data->jumlah_pendidik }}" min="0" step="1" style="border: none; outline: none;"></td>
                        <td><input type="number" name="jumlah_kependidikan" class="form-input" value="{{ $data->jumlah_kependidikan }}" min="0" step="1" style="border: none; outline: none;"></td>
                        <td><input type="number" name="jumlah_rombongan" class="form-input" value="{{ $data->jumlah_rombongan }}" min="0" step="1" style="border: none; outline: none;"></td>
                    </tr>
                </tbody>
            </table>

            <div class="add-news-button">
                <a><button>Simpan Perubahan</button></a>
            </div>

            </form>

        </div>

@endsection