@extends('layouts.layout')
@section('content')
    <section id="news-page">
        <div class="berita-content">

            <div class="foto-berita">
                <img src="{{ asset('images/berita/' . $berita->image) }}" alt="Gambar Berita">
            </div>

            <div class="berita">
                <h1>{{ $berita->title }}</h1>
                <p class="author-berita">Oleh : {{ $berita->author }}</p>
                <div class="berita-isi">{!! $berita->content !!}</div>
            </div>

        </div>
    </section>
@endsection
