<div class="box">
    <div class="box-header with-border">
        <h2 class="box-title">{{ trans('tracker::devices.titles.devices') }}</h2>
    </div>
    <div class="box-body">
        <canvas id="devices-ratio-chart" height="200"></canvas>
    </div>
</div>

@section('scripts')
    @parent

    <script>
        new Chart($('canvas#devices-ratio-chart'), {
            type: 'pie',
            data: {
                labels: {!! $devicesRatio->pluck('kind') !!},
                datasets: [
                    {
                        data: {!! $devicesRatio->pluck('count') !!},
                        backgroundColor: [
                            "#058DC7",
                            "#50B432",
                            "#ED561B",
                            "#EDEF00"
                        ],
                        hoverBackgroundColor: [
                            "#058DC7",
                            "#50B432",
                            "#ED561B",
                            "#EDEF00"
                        ]
                    }
                ]
            },
            options: {
                legend: {
                    position: 'right'
                }
            }
        });
    </script>
@endsection
