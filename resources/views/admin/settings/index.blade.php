@section('header')
    <h1><i class="fa fa-fw fa-cog"></i> {{ trans('tracker::settings.titles.settings') }} <small></small></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">{{ trans('tracker::settings.titles.trackers') }}</h2>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover no-margin">
                            <tbody>
                                @foreach ($trackers as $key => $status)
                                <tr>
                                    <td>
                                        <b>{{ trans("tracker::settings.trackers.$key") }}</b>
                                    </td>
                                    <td class="text-right">
                                        <span class="label label-{{ $status ? 'success' : 'danger' }}">
                                            <i class="fa fa-fw fa-{{ $status ? 'check' : 'times' }}"></i>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
