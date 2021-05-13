@extends('app.layouts.app')
@section('content')
    <section class="gallery-area pb-40">
        <div class="container">
            <ul class="breadcrumb">
                @include('app.layouts.breadcrumb')
            </ul>
            @include('app.layouts.gallery-photos')
        </div>
    </section>
@endsection
