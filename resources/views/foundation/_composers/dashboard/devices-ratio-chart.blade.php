<div class="box">
    <div class="box-header with-border">
        <h2 class="box-title">Devices</h2>
    </div>
    <div class="box-body">
        <canvas id="devicesChart" height="200"></canvas>
    </div>
</div>

@section('scripts')
    @parent

    <script>
        new Chart($('canvas#devicesChart'), {
            type: 'pie',
            data: {
                labels: [
                    "{{ trans('tracker::device.kinds.'.Arcanesoft\Tracker\Models\Device::KIND_COMPUTER) }}",
                    "{{ trans('tracker::device.kinds.'.Arcanesoft\Tracker\Models\Device::KIND_TABLET) }}",
                    "{{ trans('tracker::device.kinds.'.Arcanesoft\Tracker\Models\Device::KIND_PHONE) }}",
                    "{{ trans('tracker::device.kinds.'.Arcanesoft\Tracker\Models\Device::KIND_UNAVAILABLE) }}"
                ],
                datasets: [
                    {
                        data: [
                            {{ $computerDevices }},
                            {{ $tabletDevices }},
                            {{ $phoneDevices }},
                            {{ $unavailableDevices }}
                        ],
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
