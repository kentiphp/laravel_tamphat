<section class="content-header">
    <h1>
        {{ $currentPage ?? 'Dashboard' }}
        <small> Version {{ $version ?? '0.1' }}</small>
    </h1>
    <ol class="breadcrumb">
        @if(isset($pages))
            @foreach($pages as $page )
                <li><a href="{{$page['link']}}"><i class="fa fa-dashboard"></i> {{$page['name']}}</a></li>
            @endforeach
        @endif
        <li class="active"> {{ $currentPage ?? 'Dashboard' }}</li>
    </ol>
</section>