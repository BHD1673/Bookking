<!-- form nhập thông tin -->
<div class="container">
    <div class="row">
        <!-- Form Section (Left Side) -->
        <!-- Phần này là phần chính khi hiển thị trang đặt phòng -->
        <div class="col-md-3">
            <h2 class="mb-4">Khoảng thời gian đặt phòng</h2>
            <form>
                <div class="mb-3">
                    <label for="checkin" class="form-label">Ngày Check-In:</label>
                    <input type="date" class="form-control" id="checkin" name="checkin">
                </div>
                <div class="mb-3">
                    <label for="checkout" class="form-label">Ngày Check-Out:</label>
                    <input type="date" class="form-control" id="checkout" name="checkout">
                </div>
                <button type="submit" class="btn btn-primary">Đặt phòng mới+</button>
            </form>
            <form>
                <div class="mb-3">
                    <label for="checkin" class="form-label">Ngày Check-In:</label>
                    <input type="date" class="form-control" id="checkin" name="checkin">
                </div>
                <div class="mb-3">
                    <label for="checkout" class="form-label">Ngày Check-Out:</label>
                    <input type="date" class="form-control" id="checkout" name="checkout">
                </div>
                <button type="submit" class="btn btn-primary">Bạn muốn đặt phòng <br> ở khoảng thời gian mới ?</button>
            </form>
        </div>
        

<!-- Room Details Section (Right Side) -->
<div class="col-md-9 ">
    <div class="card  d-flex flex-row  ">
        <img src="images/about.png" class="card-img-top" alt="Ảnh phòng" style="border: 1px solid black; width: 40%; ">
        <div class="card-body d-flex flex-column">
            <h2 class="card-title mb-3">Tên loại phòng: [Ten]</h2>
            
            <!-- Room Details -->
            <div class="row">
                <div class="col-md-12">
                    <p class="card-text">ID phòng: [ID]</p>
                    <p class="card-text">Vị trí: [ViTriPhong]</p>
                    <p class="card-text">Giá phòng chung: [GiaPhongChung]</p>
                    <p class="card-text">Mô tả: [MoTa]</p>
                </div>
            </div>

            <!-- Amount Input and Radio Buttons -->
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <!-- Radio Buttons -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="choiceroom" checked>
                        <label class="form-check-label" for="choiceroom">
                            Chọn loại phòng này
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Amount Input -->
                    <div class="form-group">
                        <label for="amountInput">Số lượng phòng muốn chọn cho đơn này:</label>
                        <select name="amountRoomInput" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>

            
        </div>
        
    </div>
</div>