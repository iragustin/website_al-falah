@extends('layouts.layout')
@section('content')
<section id="pengasuh">
        <div class="pengasuh-content">

            <div class="pengasuh-content-kiri">
                <div class="card-container">
                    <!-- card-box 1 -->
                    <div class="card-box-pengasuh">
                        <img src="{{ asset('images/pengasuh/' . $pengasuh->image) }}" alt="Foto Pengasuh">
                    </div>             
                </div>
                <p>KETUA YAYASAN ASYAHIDIYAH PONDOK PESANTREN AL-QUR'AN AL-FALAH</p>  
            </div>

            <div class="biography">
                <h1>{{ $pengasuh->name }}</h1>
                <p>{{ $pengasuh->description }}</p>
            </div>

        </div>
    </section>
    @endsection