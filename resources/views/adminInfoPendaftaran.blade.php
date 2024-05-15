@extends('layouts.admin.layout')
@section('content')
        <!-- Konten admin panel -->
        <div class="container-head">
            <h1>PANEL ADMIN PONDOK PESANTREN AL-QUR'AN AL-FALAH</h1>

        </div>
        <!-- Tempatkan konten admin di sini -->


        <div class="container">
            <h1>Info Pendaftaran</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nama Instansi</th>
                        <th>Alamat</th>
                        <th>Link Pendaftaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($info_pendaftaran as $i)
                        <tr>
                            <td>{{ $i->name }}</td>
                            <td>{{ $i->address }}</td>
                            <td>{{ $i->link }}</td>
                            <td>
                                <a href="/controlpanel/admin/info-pendaftaran/edit/{{ $i->id }}" class="edit-button"><button>Edit</button></a>
                                <a href="/controlpanel/admin/info-pendaftaran/hapus/{{ $i->id }}" class="delete-button"><button>Hapus</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="add-news-button">
                <a href="/controlpanel/admin/info-pendaftaran/tambah"><button>Tambah Info Pendaftaran</button></a>
            </div>
    
@endsection
