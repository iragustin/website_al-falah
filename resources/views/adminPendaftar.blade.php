@extends('layouts.admin.layout')
@section('content')
<div class="container-head">
    <h1>PANEL ADMIN PONDOK PESANTREN AL-QUR'AN AL-FALAH</h1>

</div>
<!-- Tempatkan konten admin di sini -->


<div class="container">    
    <h1>List Pendaftar</h1>
    <h4>Takhosus</h4>
    <div class="container-table">
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>No.Telp</th>
                <th>Nama Ibu</th>
                <th>Nama Ayah</th>
                <th>No. Telp Wali</th>
                <th>E-Mail</th>
                <th>Alamat</th>
                <th>Asal Sekolah</th>
                <th>Bukti Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($takhosus as $t)
                <tr>
                    <td>{{ $t->name }}</td>
                    <td>{{ $t->gender }}</td>
                    <td>{{ $t->birth_place }}</td>
                    <td>{{ $t->birth_date }}</td>
                    <td>{{ $t->phone }}</td>
                    <td>{{ $t->mother_name }}</td>
                    <td>{{ $t->father_name }}</td>
                    <td>{{ $t->parent_phone }}</td>
                    <td>{{ $t->email }}</td>
                    <td>{{ $t->address }}</td>
                    <td>{{ $t->school_origin }}</td>
                    <td>
                        @if($t->payment_proof == null) - @else
                        <img style="width: 100px; height: auto;" src="{{ asset('images/payment_proof/' . $t->payment_proof) }}" alt="image">
                        @endif
                    </td>
                    <td>
                    @if($t->is_paid == 1)
                        <select id="is_paid" name="is_paid" style="color:white; background-color: #45a049">
                                    @if($t->is_paid == 1)
                                    <option value="" selected disabled style="background-color: grey">Sudah Bayar</option>
                                    <option value="{{ $t->id }}">Belum Bayar</option>
                                    @else
                                    <option value="" selected disabled style="background-color: grey">Belum Bayar</option>
                                    <option value="{{ $t->id }}">Sudah Bayar</option>
                                    @endif
                        </select>
                        @else
                        <select id="is_paid" name="is_paid" style="color:white; background-color: rgba(128, 0, 0, 0.5)">
                                @if($t->is_paid == 1)
                                <option value="" selected disabled style="background-color: grey">Sudah Bayar</option>
                                <option value="{{ $t->id }}">Belum Bayar</option>
                                @else
                                <option value="" selected disabled style="background-color: grey">Belum Bayar</option>
                                <option value="{{ $t->id }}">Sudah Bayar</option>
                                @endif
                        </select>
                        @endif    
                        
                    </td>
                    <td>
                        <a href="/controlpanel/admin/pendaftar/edit/{{ $t->id }}" class="edit-button"><button>Edit</button></a>
                        <a href="/controlpanel/admin/pendaftar/hapus/{{ $t->id }}" class="delete-button"><button>Hapus</button></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    </div>

    <h4>Tahfidz</h4>
    <div class="container-table">
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>No.Telp</th>
                <th>Nama Ibu</th>
                <th>Nama Ayah</th>
                <th>No. Telp Wali</th>
                <th>E-Mail</th>
                <th>Alamat</th>
                <th>Asal Sekolah</th>
                <th>Bukti Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tahfidz as $t)
                <tr>
                    <td>{{ $t->name }}</td>
                    <td>{{ $t->gender }}</td>
                    <td>{{ $t->birth_place }}</td>
                    <td>{{ $t->birth_date }}</td>
                    <td>{{ $t->phone }}</td>
                    <td>{{ $t->mother_name }}</td>
                    <td>{{ $t->father_name }}</td>
                    <td>{{ $t->parent_phone }}</td>
                    <td>{{ $t->email }}</td>
                    <td>{{ $t->address }}</td>
                    <td>{{ $t->school_origin }}</td>
                    <td>
                        @if($t->payment_proof == null) - @else
                        <img style="width: 100px; height: auto;" src="{{ asset('images/payment_proof/' . $t->payment_proof) }}" alt="image">
                        @endif
                    </td>
                    <td>
                    @if($t->is_paid == 1)
                        <select id="is_paid" name="is_paid" style="color:white; background-color:#45a049">
                                    @if($t->is_paid == 1)
                                    <option value="" selected disabled style="background-color: grey">Sudah Bayar</option>
                                    <option value="{{ $t->id }}">Belum Bayar</option>
                                    @else
                                    <option value="" selected disabled style="background-color: grey">Belum Bayar</option>
                                    <option value="{{ $t->id }}">Sudah Bayar</option>
                                    @endif
                        </select>
                        @else
                        <select id="is_paid" name="is_paid" style="color:white; background-color: rgba(128, 0, 0, 0.5)">
                                @if($t->is_paid == 1)
                                <option value="" selected disabled style="background-color: grey">Sudah Bayar</option>
                                <option value="{{ $t->id }}">Belum Bayar</option>
                                @else
                                <option value="" selected disabled style="background-color: grey">Belum Bayar</option>
                                <option value="{{ $t->id }}">Sudah Bayar</option>
                                @endif
                        </select>
                        @endif    
                        
                    </td>
                    <td>
                        <a href="/controlpanel/admin/pendaftar/edit/{{ $t->id }}" class="edit-button"><button >Edit</button></a>
                        <a href="/controlpanel/admin/pendaftar/hapus/{{ $t->id }}" class="delete-button"><button >Hapus</button></a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    </div>

    <div class="row">
        <a href="/controlpanel/admin/pendaftar/export" class="add-news-button"><button>Export ke Excel</button></a>
        <a href="/controlpanel/admin/pendaftar/tambah"class="add-news-button"><button>Tambah Pendaftar</button></a>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('[id="is_paid"]').change(function() {
            window.location.href = '/controlpanel/admin/pendaftar/status/ ' + $(this).val();
        });
    });

    
</script>
@endsection