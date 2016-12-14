@section('header')
    <h1>Tracker</h1>
@endsection

@section('content')
    @include(Arcanesoft\Tracker\ViewComposers\Dashboard\LatestThirtyDaysVisitsAndVisitorsComposer::VIEW)

    <div class="row">
        <div class="col-sm-6 col-md-4">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\DevicesRatioComposer::VIEW)
        </div>
        <div class="col-sm-6 col-md-4">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\BrowsersRatioComposer::VIEW)
        </div>
        <div class="clearfix visible-sm"></div>
        <div class="col-sm-6 col-md-4">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\OperatingSystemRationComposer::VIEW)
        </div>
        <div class="clearfix visible-md visible-lg"></div>
        <div class="col-sm-6 col-md-4">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\AuthenticatedVisitorsRatioComposer::VIEW)
        </div>
        <div class="clearfix visible-sm"></div>
        <div class="col-sm-12 col-md-8">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\LanguagesListComposer::VIEW)
        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection
