<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">{{ array_key_last($breadcrumbs) }}</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    @foreach($breadcrumbs as $breadcrumb => $route)
                        @if($loop->last)
                            <li class="breadcrumb-item active">{{ $breadcrumb }}</li>
                        @else
                            <li class="breadcrumb-item">
                                <a href="{{ route($route) }}">{{ $breadcrumb }}</a>
                            </li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
