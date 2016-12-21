@section('header')
    <h1>Tracker <small>Visitors</small></h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h2 class="box-title">Visitors</h2>
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
                    @if ($visitors->count())
                        @foreach ($visitors as $visitor)
                        <tr>
                            <td>
                                <span class="label label-inverse">
                                    {{ $visitor->client_ip }}
                                </span>
                            </td>
                            <td>
                                {{ $visitor->location_name }}
                            </td>
                            <td>
                                {{ $visitor->username }}
                            </td>
                            <td>
                                {{ $visitor->device->kind_name }} [{{ $visitor->device->platform }}]
                            </td>
                            <td>
                                {{ $visitor->agent->browser }} ({{ $visitor->agent->browser_version }})
                            </td>
                            <td>
                                {{ $visitor->referer_host }}
                            </td>
                            <td class="text-center">
                                <span class="label label-info">
                                    {{ $visitor->activities->count() }}
                                </span>
                            </td>
                            <td>
                                {{ $visitor->updated_at->diffForHumans() }}
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">
                                <span class="label label-default">The visitors list is empty!</span>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
