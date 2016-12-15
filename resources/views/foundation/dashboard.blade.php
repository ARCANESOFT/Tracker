@section('header')
    <h1>Tracker</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-3">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\TotalUniqueUsersBoxComposer::VIEW)
        </div>
        <div class="col-sm-6 col-md-3">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\TotalPageViewsBoxComposer::VIEW)
        </div>
        <div class="col-sm-6 col-md-3">
        </div>
        <div class="col-sm-6 col-md-3">
        </div>
    </div>

    @include(Arcanesoft\Tracker\ViewComposers\Dashboard\LatestThirtyDaysVisitsAndVisitorsComposer::VIEW)

    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\DevicesRatioComposer::VIEW)
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\BrowsersRatioComposer::VIEW)
        </div>
        <div class="clearfix visible-sm"></div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\OperatingSystemRationComposer::VIEW)
        </div>
        <div class="clearfix visible-md"></div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            @include(Arcanesoft\Tracker\ViewComposers\Dashboard\AuthenticatedVisitorsRatioComposer::VIEW)
        </div>
        <div class="clearfix visible-sm visible-lg"></div>
        <div class="col-md-8 col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    @include(Arcanesoft\Tracker\ViewComposers\Dashboard\LanguagesListComposer::VIEW)
                </div>
                <div class="col-lg-6">
                    @include(Arcanesoft\Tracker\ViewComposers\Dashboard\CountriesListComposer::VIEW)
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection
