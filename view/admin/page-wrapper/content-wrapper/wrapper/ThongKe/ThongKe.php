<div class="container-fluid">
    <!-- Trang heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thống kê tháng này</h1>
    </div>

    <div class="row">

        <!-- Thống kê kiếm được trong tháng  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tổng thu nhập quý</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">15.000.000 VND</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thống kê kiếm được tổng -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Tổng thu nhập <br> (Trong tháng hiện tại)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">500.000 VND</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Hiển thị đơn đang trong giai đoạn -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Đơn hàng chờ</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thống kê số đơn bị hủy -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Đơn hàng bị hủy</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-person-fill-exclamation fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <devsite-iframe><iframe allow="clipboard-write https://developers-dot-devsite-v2-prod.appspot.com" allowfullscreen="" class="framebox inherit-locale " is-upgraded="" src="https://developers.google.com/frame/chart/interactive/docs/examples_c5eb06c860a8ceb732d164a921e94ed4cd2de0b722acefc00b30d1758f542cc3.frame?hl=vi"></iframe></devsite-iframe>
</div>
<script>
  // barsVisualization must be global in our script tag to be able
  // to get and set selection.
  var barsVisualization;

  function drawMouseoverVisualization() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Year');
    data.addColumn('number', 'Score');
    data.addRows([
      ['2005',3.6],
      ['2006',4.1],
      ['2007',3.8],
      ['2008',3.9],
      ['2009',4.6]
    ]);

    barsVisualization = new google.visualization.ColumnChart(document.getElementById('mouseoverdiv'));
    barsVisualization.draw(data, null);

    // Add our over/out handlers.
    google.visualization.events.addListener(barsVisualization, 'onmouseover', barMouseOver);
    google.visualization.events.addListener(barsVisualization, 'onmouseout', barMouseOut);
  }

  function barMouseOver(e) {
    barsVisualization.setSelection([e]);
  }

  function barMouseOut(e) {
    barsVisualization.setSelection([{'row': null, 'column': null}]);
  }

</script>
