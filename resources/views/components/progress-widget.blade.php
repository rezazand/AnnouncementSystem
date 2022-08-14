<div>
    <!-- BAR CHART -->
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">پیشرفت کار</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i
                        class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
            </div>
            <div class="d-flex flex-row justify-content-end">
                <span class="pl-2">
                    <i class="fa fa-square" style="color: #00A65AFF"></i>
                    ارجاع داده شده
                  </span>
                <span class="ml-2">
                    <i class="fa fa-square " style="color: #D2D6DEFF"></i>
                    همه
                  </span>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <script>
        let areaChartData = {
            labels: [@foreach($data['labels'] as $label) '{{$label}}', @endforeach],
            datasets: [
                {
                    label: 'Electronics',
                    fillColor: 'rgba(210, 214, 222, 1)',
                    strokeColor: 'rgba(210, 214, 222, 1)',
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [@foreach($data['all'] as $item) '{{$item}}', @endforeach]
                },
                {
                    label: 'Digital Goods',
                    fillColor: 'rgba(60,141,188,0.9)',
                    strokeColor: 'rgba(60,141,188,0.8)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [@foreach($data['reply'] as $reply) '{{$reply}}', @endforeach]
                }
            ]
        }
    </script>
</div>
