<div class="box">
    <div class="box-header with-border">
        <h2 class="box-title">{{ trans('tracker::languages.titles.languages') }}</h2>
    </div>
    <div class="box-body no-padding">
        <div class="table-responsive">
            <table class="table table-condensed table-hover no-margin">
                <thead>
                    <tr>
                        <th>{{ trans('tracker::languages.attributes.language') }}</th>
                        <th class="text-center" style="width: 100px;">{{ trans('tracker::generals.count') }}</th>
                        <th>{{ trans('tracker::generals.percentage') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($languagesRatio as $language)
                    <tr>
                        <td>
                            <span class="label label-inverse">{{ $language['name'] }}</span>
                        </td>
                        <td class="text-center">
                            <span class="label label-info">{{ $language['count'] }}</span>
                        </td>
                        <td>
                            <div class="progress no-margin">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ $language['percentage'] }}%" aria-valuemin="0" aria-valuemax="100" style="width: {{ $language['percentage'] }}%">
                                    {{ $language['percentage'] }}%
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
