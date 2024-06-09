@extends('layouts.app') @section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Obat - {{ $obat->nama }}</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('includes.error-card')
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ad porro suscipit culpa iure
                            ratione reiciendis. Exercitationem, quas error rem numquam ex corporis dignissimos? Harum
                            eveniet aspernatur id. Veniam, impedit?
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
