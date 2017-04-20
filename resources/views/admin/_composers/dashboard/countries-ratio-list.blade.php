<div class="box">
    <div class="box-header with-border">
        <h2 class="box-title">{{ trans('tracker::countries.titles.countries') }}</h2>
    </div>
    <div class="box-body no-padding">
        <div class="table-responsive">
            <table class="table table-condensed table-hover no-margin">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 36px;">{{ trans('tracker::countries.attributes.flag') }}</th>
                        <th class="text-center" style="width: 50px;">{{ trans('tracker::countries.attributes.code') }}</th>
                        <th>{{ trans('tracker::countries.attributes.name') }}</th>
                        <th class="text-center" style="width: 100px;">{{ trans('tracker::generals.count') }}</th>
                        <th>{{ trans('tracker::generals.percentage') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($countriesRatio as $country)
                        <tr>
                            <td class="text-center">
                                <span class="flag-icon flag-icon-{{ is_null($country['code']) ? 'unknown' : strtolower($country['code']) }}"></span>
                            </td>
                            <td class="text-center">
                                {{ $country['code'] }}
                            </td>
                            <td>
                                {{ $country['name'] }}
                            </td>
                            <td class="text-center">
                                {{ label_count($country['count']) }}
                            </td>
                            <td>
                                <div class="progress no-margin">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ $country['percentage'] }}%" aria-valuemin="0" aria-valuemax="100" style="width: {{ $country['percentage'] }}%">
                                        {{ $country['percentage'] }}%
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <span class="label label-default">{{ trans('tracker::countries.list-empty') }}</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
