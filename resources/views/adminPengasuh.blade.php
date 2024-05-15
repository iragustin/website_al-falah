@extends('layouts.admin.layout')
@section('content')

<div class="container-head">
    <h1>PANEL ADMIN PONDOK PESANTREN AL-QUR'AN AL-FALAH</h1>

</div>
<!-- Tempatkan konten admin di sini -->


<div class="container">
    <h1>Data Pengasuh</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengasuh as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td><img style="width: 100px; height: auto;" src="{{ asset('images/pengasuh/' . $p->image) }}"
                            alt="image"></td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->position }}</td>
                    <td>{!! substr($p->description, 0, 100) !!}...</td>
                    <td>
                        <a href="/controlpanel/admin/pengasuh/edit/{{ $p->id }}" class="edit-button"><button>Edit</button></a>
                        <a href="/controlpanel/admin/pengasuh/hapus/{{ $p->id }}" class="delete-button"><button>Hapus</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="add-news-button">
        <a href="/controlpanel/admin/pengasuh/tambah"><button>Tambah Pengasuh</button></a>
    </div>

</div>
@endsection