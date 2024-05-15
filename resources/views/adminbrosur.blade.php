@extends('layouts.admin.layout')
@section('content')

<div class="container-head">
    <h1>PANEL ADMIN PONDOK PESANTREN AL-QUR'AN AL-FALAH</h1>

</div>
<!-- Tempatkan konten admin di sini -->


<div class="container">
    <h1>Data Brosur</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Foto Depan</th>
                <th>Foto Belakang</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brosur as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td><img style="width: 100px; height: auto;" src="{{ asset('images/brosur/' . $p->image) }}"
                            alt="image"></td>
                    <td><img style="width: 100px; height: auto;" src="{{ asset('images/brosur/' . $p->back_image) }}" alt="image"></td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->description }}</td>
                    <td>
                        <a href="/controlpanel/admin/brosur/edit/{{ $p->id }}" class="edit-button"><button>Edit</button></a>
                        <a href="/controlpanel/admin/brosur/hapus/{{ $p->id }}" class="delete-button"><button>Hapus</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="add-news-button">
        <a href="/controlpanel/admin/brosur/tambah"><button>Tambah Brosur</button></a>
    </div>

</div>
@endsection