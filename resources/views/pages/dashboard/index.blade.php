@extends('layouts.app') @section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Welcome {{ request()->session()->get('user')['name'] }} </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content font-poppins">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea aperiam repudiandae veniam suscipit eos
                    magnam! Commodi quasi nihil itaque, odio cumque non illum temporibus, odit rem hic nesciunt repellendus
                    explicabo.
                </div>
            </div>
        </div>
    </section>
@endsection
