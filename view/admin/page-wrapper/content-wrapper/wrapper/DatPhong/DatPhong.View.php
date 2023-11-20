<!-- Bắt đầu vào trang chính -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bảng quản lý đơn đặt phòng</h1>
    <p class="mb-4">Quản lý thông tin các đơn đặt phòng chung.</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên khách hàng đặt phòng</th>
                            <th>SDT </th>
                            <th>Địa chỉ nhà</th>
                            <th>Ngày vào</th>
                            <th>Ngày ra</th>
                            <th>Tổng số ngày</th>
                            <th>Tổng tiền </th>
                            <th>Tiền cọc</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>1</td>
                            <td>Dương</td>
                            <td>0123456789</td>
                            <td>Hà Nội</td>
                            <td>30/7/2023</td>
                            <td>31/7/2023</td>
                            <td>1</td>
                            <td>150.000 VND</td>
                            <td>50.000 VND</td>
                            <td>Đã thanh toán</td>
                            <td>
                                <a href='?act=?deleteID={$row['ID']}  class='btn btn-info'>Sửa</a>
                                <a href='?act=?deleteID={$row['ID']}  class='btn btn-danger'>Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Dương</td>
                            <td>0123456789</td>
                            <td>Hà Nội</td>
                            <td>30/7/2023</td>
                            <td>31/7/2023</td>
                            <td>1</td>
                            <td>150.000 VND</td>
                            <td>50.000 VND</td>
                            <td>Đã thanh toán</td>
                            <td>
                                <a href='?act=?deleteID={$row['ID']}  class='btn btn-info'>Sửa</a>
                                <a href='?act=?deleteID={$row['ID']}  class='btn btn-danger'>Xóa</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->