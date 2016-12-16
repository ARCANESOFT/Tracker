<div class="box">
    <div class="box-header with-border">
        <h2 class="box-title">Referers</h2>
    </div>
    <div class="box-body no-padding">
        <div class="table-responsive">
            <table class="table table-condensed table-hover no-margin">
                <thead>
                    <tr>
                        <th>Domain</th>
                        <th class="text-center" style="width: 100px;">Count</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($referersRatio as $referer)
                    <tr>
                        <td>
                            <small>{{ $referer['name'] }}</small>
                        </td>
                        <td class="text-center">
                            <span class="label label-info">{{ $referer['count'] }}</span>
                        </td>
                        <td>
                            <div class="progress no-margin">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ $referer['percentage'] }}%" aria-valuemin="0" aria-valuemax="100" style="width: {{ $referer['percentage'] }}%">
                                    {{ $referer['percentage'] }}%
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
