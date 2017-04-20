@section('header')
    <h1><i class="fa fa-fw fa-bar-chart"></i> {{ trans('tracker::dashboard.titles.statistics') }} <small></small></h1>
@endsection

@section('content')
    @include('tracker::admin._composers.dashboard')
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection
