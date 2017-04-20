<div class="box">
    <div class="box-header with-border">
        <h2 class="box-title">{{ trans('tracker::browsers.titles.browsers') }}</h2>
    </div>
    <div class="box-body">
        <canvas id="browsers-ratio-chart" height="200"></canvas>
    </div>
</div>

@section('scripts')
    @parent

    <script>
        new Chart($('canvas#browsers-ratio-chart'), {
            type: 'pie',
            data: {
                labels: {!! $browsersRatio->pluck('name') !!},
                datasets: [
                    {
                        data: {!! $browsersRatio->pluck('count') !!},
                        backgroundColor: [
                            "#058DC7",
                            "#50B432",
                            "#ED561B",
                            "#EDEF00",
                            "#24CBE5",
                            "#64E572",
                            "#FF9655"
                        ],
                        hoverBackgroundColor: [
                            "#058DC7",
                            "#50B432",
                            "#ED561B",
                            "#EDEF00",
                            "#24CBE5",
                            "#64E572",
                            "#FF9655"
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
