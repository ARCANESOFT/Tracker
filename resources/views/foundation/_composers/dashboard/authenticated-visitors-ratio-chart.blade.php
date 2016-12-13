<div class="box">
    <div class="box-header with-border">
        <h2 class="box-title">Authenticated Visitors</h2>
    </div>
    <div class="box-body">
        <canvas id="authenticatedVisitorsChart" height="200"></canvas>
    </div>
</div>

@section('scripts')
    @parent

    <script>
        new Chart($('canvas#authenticatedVisitorsChart'), {
            type: 'pie',
            data: {
                labels: [
                    "Authenticated",
                    "Guest"
                ],
                datasets: [
                    {
                        data: [
                            {{ $authenticatedVisitors->count() }},
                            {{ $guestVisitors->count() }}
                        ],
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

