@extends('tempelate.base')
@section('content')
    <style>
        .card-image {
            position: relative;
            margin-bottom: 30px;
        }

        .card-image-action {
            position: absolute;
            width: 100%;
            height: 250px;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.3);
            opacity: 0;
            transition: all .5s linear;
        }

        .card-image:hover .card-image-action {
            opacity: 1;
        }
    </style>

    <div class="row">
        <div class="col-md-4">
            <img src="{{ url('public') }}/{{ $list->gambar }}" alt=""
                    style="width: 100%;height: 250px">
        </div>
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">DETAIL KUIS</h5>
                    
                    <ul>
                        <li>
                            <span class="fw-semibold">Level</span>
                            <p>{{ $list->level }}</p>
                        </li>
                        <li>
                            <span class="fw-semibold">Pertanyaan </span>
                            <p>{{ $list->pertanyaan }}</p>
                        </li>
                        <li>
                            <span class="fw-semibold">Pilihan A </span>
                            <p>{{ $list->a }}</p>
                        </li>
                        <li>
                            <span class="fw-semibold">Pilihan B </span>
                            <p>{{ $list->b }}</p>
                        </li>
                        <li>
                            <span class="fw-semibold">Pilihan C </span>
                            <p>{{ $list->c }}</p>
                        </li>
                        <li>
                            <span class="fw-semibold">Pilihan D </span>
                            <p>{{ $list->d }}</p>
                        </li>
                        <li>
                            <span class="fw-semibold">Jawaban </span>
                            <p>{{ $list->jawaban }}</p>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
