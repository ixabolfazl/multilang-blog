<li><a href="{{ route('home') }}"><i class="icofont-home"></i>{{ __('Home') }}</a></li>
<li><i class="icofont-rounded-{{ app()->getLocale()=='fa'? 'left': 'right' }}"></i></li>
@foreach($breadcrumbs as $breadcrumb => $route)
    @if($loop->last)
        <li>{{$breadcrumb}}</li>
    @else
        <li><a href="{{ route($route) }}">{{ $breadcrumb }}</a></li>
        <li><i class="icofont-rounded-{{ app()->getLocale()=='fa'? 'left': 'right' }}"></i></li>
    @endif
@endforeach


