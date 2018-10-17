@if ($breadcrumbs)
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if ($breadcrumb->url && !$loop->last)
                        <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}"><strong>{{ ucfirst ($breadcrumb->title) }}</strong></a></li>
                    @else
                        <li class="breadcrumb-item"><strong>{{ ucfirst ($breadcrumb->title) }}</strong></li>
                    @endif
                @endforeach
            </ol>
        </div>
    </div>
@endif