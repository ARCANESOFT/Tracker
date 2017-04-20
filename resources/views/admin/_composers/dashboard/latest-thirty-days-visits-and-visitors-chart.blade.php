<div class="box">
    <div class="box-header with-border">
        <h2 class="box-title">{{ trans('tracker::visits.titles.visits') }}</h2>
    </div>
    <div class="box-body">
        <canvas id="visitors-and-visits-chart" height="250"></canvas>
    </div>
</div>

@section('scripts')
    @parent

    <script>
        new Chart($('canvas#visitors-and-visits-chart'), {
            type: 'line',
            data: {
                labels: {!! $thirtyDaysRange->values() !!},
                datasets: [
                    {
                        label: "{{ trans('tracker::visits.attributes.page_views') }}",
                        data: {!! $latestVisitsByThirtyDays->values() !!},
                        fill: true,
                        lineTension: 0.1,
                        backgroundColor: 'rgba(0, 115, 183, 0.1)',
                        borderColor: '#0073B7',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        spanGaps: false
                    },
                    {
                        label: "{{ trans('tracker::visits.attributes.unique_visitors') }}",
                        data: {!! $latestVisitorsByThirtyDays->values() !!},
                        fill: true,
                        lineTension: 0.1,
                        backgroundColor: 'rgba(0, 166, 90, 0.1)',
                        borderColor: '#00A65A',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        spanGaps: false
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
@endsection
