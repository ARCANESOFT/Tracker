<div class="box">
    <div class="box-header with-border">
        <h2 class="box-title">{{ trans('tracker::referers.titles.referers') }}</h2>
    </div>
    <div class="box-body no-padding">
        <div class="table-responsive">
            <table class="table table-condensed table-hover no-margin">
                <thead>
                    <tr>
                        <th>{{ trans('tracker::referers.attributes.domain') }}</th>
                        <th class="text-center" style="width: 100px;">{{ trans('tracker::generals.count') }}</th>
                        <th>{{ trans('tracker::generals.percentage') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($referersRatio as $referer)
                        <tr>
                            <td>
                                <small>{{ $referer['name'] }}</small>
                            </td>
                            <td class="text-center">
                                {{ label_count($referer['count']) }}
                            </td>
                            <td>
                                <div class="progress no-margin">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ $referer['percentage'] }}%" aria-valuemin="0" aria-valuemax="100" style="width: {{ $referer['percentage'] }}%">
                                        {{ $referer['percentage'] }}%
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                <span class="label label-default">{{ trans('tracker::referers.list-empty') }}</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
