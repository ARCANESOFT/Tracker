@section('header')
    <h1>Tracker <small>Visits</small></h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h2 class="box-title">Visits</h2>
        </div>
        <div class="box-body no-padding">
            <div class="table-responsive">
                <table class="table table-condensed table-hover no-margin">
                    <thead>
                        <tr>
                            <th>IP Address</th>
                            <th>Country / City</th>
                            <th>User</th>
                            <th>Device</th>
                            <th>Browser</th>
                            <th>Referer</th>
                            <th class="text-center">Page Views</th>
                            <th>Last activity</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if ($sessions->count())
                        @foreach ($sessions as $session)
                        <tr>
                            <td>
                                <span class="label label-inverse">
                                    {{ $session->client_ip }}
                                </span>
                            </td>
                            <td>
                                {{ $session->location_name }}
                            </td>
                            <td>
                                {{ $session->username }}
                            </td>
                            <td>
                                {{ $session->device->kind_name }} [{{ $session->device->platform }}]
                            </td>
                            <td>
                                {{ $session->agent->browser }} ({{ $session->agent->browser_version }})
                            </td>
                            <td>
                                {{ $session->referer->host }}
                            </td>
                            <td class="text-center">
                                <span class="label label-info">
                                    {{ $session->activities->count() }}
                                </span>
                            </td>
                            <td>
                                {{ $session->updated_at->diffForHumans() }}
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">
                                <span class="label label-default">The visits list is empty!</span>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
