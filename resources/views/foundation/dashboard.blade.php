@section('header')
    <h1>Tracker</h1>
@endsection

@section('content')
    @include(Arcanesoft\Tracker\ViewComposers\Dashboard\LatestThirtyDaysVisitsAndVisitorsComposer::VIEW)

    <div class="row">
        <div class="col-md-4">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\AuthenticatedVisitorsRatioComposer::VIEW)
        </div>
        <div class="col-md-4">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\DevicesRatioComposer::VIEW)
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection
