<?php /** @var  \Illuminate\Pagination\LengthAwarePaginator  $visitors */ ?>
@section('header')
    <h1><i class="fa fa-fw fa-users"></i> {{ trans('tracker::visitors.titles.visitors') }} <small>{{ trans('tracker::visitors.titles.visitors-list') }}</small></h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            @include('core::admin._includes.pagination.labels', ['paginator' => $visitors])
        </div>
        <div class="box-body no-padding">
            <div class="table-responsive">
                <table class="table table-condensed table-hover no-margin">
                    <thead>
                        <tr>
                            <th>{{ trans('tracker::visitors.attributes.ip_address') }}</th>
                            <th>{{ trans('tracker::visitors.attributes.country') }} / {{ trans('tracker::visitors.attributes.city') }}</th>
                            <th>{{ trans('tracker::visitors.attributes.user') }}</th>
                            <th>{{ trans('tracker::visitors.attributes.device') }}</th>
                            <th>{{ trans('tracker::visitors.attributes.browser') }}</th>
                            <th>{{ trans('tracker::visitors.attributes.referer') }}</th>
                            <th class="text-center">{{ trans('tracker::visitors.attributes.page_views') }}</th>
                            <th>{{ trans('tracker::visitors.attributes.last_activity') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($visitors as $visitor)
                            <tr>
                                <td>
                                    <span class="label label-inverse">{{ $visitor->client_ip }}</span>
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
                                    {{ label_count($visitor->activities->count()) }}
                                </td>
                                <td>
                                    {{ $visitor->updated_at->diffForHumans() }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    <span class="label label-default">{{ trans('tracker::visitors.list-empty') }}</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if ($visitors->hasPages())
            <div class="box-footer clearfix">{!! $visitors->render() !!}</div>
        @endif
    </div>
@endsection
