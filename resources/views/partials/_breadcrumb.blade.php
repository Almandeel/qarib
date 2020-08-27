<section class="content-header" style="margin-top: -40px;margin-bottom: 40px;">
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        @php $title; $url ; $icon @endphp
        @for($i = 0; $i < count($title); $i++)
            <li {{ $i == (count($title) - 1) ? '' : 'class=active' }}><a href="{{ $url[$i] }}"><i class="fa fa-{{ $icon[$i] }}"></i>{{ __($title[$i]) }}</a></li>
        @endfor
    </ol>
</section>