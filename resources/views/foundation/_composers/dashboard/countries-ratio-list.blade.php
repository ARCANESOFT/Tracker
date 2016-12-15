<div class="box">
    <div class="box-header with-border">
        <h2 class="box-title">Countries</h2>
    </div>
    <div class="box-body no-padding">
        <div class="table-responsive">
            <table class="table table-condensed table-hover no-margin">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 36px;">Flag</th>
                        <th class="text-center" style="width: 50px;">Code</th>
                        <th>Name</th>
                        <th class="text-center" style="width: 100px;">Count</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countriesRatio as $country)
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
                            <span class="label label-info">{{ $country['count'] }}</span>
                        </td>
                        <td>
                            <div class="progress no-margin">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ $country['percentage'] }}%" aria-valuemin="0" aria-valuemax="100" style="width: {{ $country['percentage'] }}%">
                                    {{ $country['percentage'] }}%
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
