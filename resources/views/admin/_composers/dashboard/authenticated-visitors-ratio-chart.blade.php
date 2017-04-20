<div class="box">
    <div class="box-header with-border">
        <h2 class="box-title">{{ trans('tracker::visitors.titles.authenticated-visitors') }}</h2>
    </div>
    <div class="box-body">
        <canvas id="authenticated-visitors-chart" height="200"></canvas>
    </div>
</div>

@section('scripts')
    @parent

    <script>
        new Chart($('canvas#authenticated-visitors-chart'), {
            type: 'pie',
            data: {
                labels: {!! $authenticatedVisitorsRatio->pluck('name') !!},
                datasets: [
                    {
                        data: {!! $authenticatedVisitorsRatio->pluck('count') !!},
                        backgroundColor: [
                            "#00A65A",
                            "#36A2EB"
                        ],
                        hoverBackgroundColor: [
                            "#00A65A",
                            "#36A2EB"
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

