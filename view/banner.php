 <!-- banner -->

 <section class="banner_main">
         <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="images/banner1.jpg" alt="First slide">
                  <div class="container">
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
               </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Trước</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Sang</span>
            </a>
         </div>
         <div class="booking_ocline">
            <div class="container">
               <div class="row">
                  <div class="col-md-5">
                     <div class="book_room">
                        <h1>Hãy đặt một phòng lúc này !</h1>
                        <!-- action="index.php?act=roomlist" -->
                        <form class="book_now" id="bookingForm" method="post" action="">
                           <div class="row">
                              <div class="col-md-12">
                                    <span>Ngày đến</span>
                                    <img class="date_cua" src="images/date.png">
                                    <input class="online_book" type="date" name="DateIn">
                              </div>
                              <div class="col-md-12">
                                    <span>Ngày đi</span>
                                    <img class="date_cua" src="images/date.png">
                                    <input class="online_book" type="date" name="DateOut">
                                    <input type="hidden" name="AmountOfDay" class="AmountOfDay" value="">
                              </div>
                              <div class="col-md-12">
                                    <button type="submit" class="book_btn">Tìm phòng ngay</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Lấy các phần tử input ngày
    var dateInInput = document.querySelector('input[name="DateIn"]');
    var dateOutInput = document.querySelector('input[name="DateOut"]');
    var amountOfDayInput = document.querySelector('.AmountOfDay');

    // Sự kiện thay đổi ngày đến
    dateInInput.addEventListener("change", function () {
      // Kiểm tra xem ngày đến có được chọn chưa
      if (dateInInput.value) {
        // Lấy giá trị ngày đến và ngày đi
        var dateIn = new Date(dateInInput.value);
        var dateOut = dateOutInput.value ? new Date(dateOutInput.value) : null;

        // Kiểm tra nếu ngày đi đã được chọn và ngày đến lớn hơn ngày đi
        if (dateOut && dateIn > dateOut) {
          alert("Ngày đến không thể lớn hơn ngày đi");
          dateInInput.value = ""; // Xóa giá trị ngày đến
        } else {
          // Tính và cập nhật số ngày lưu trú
          var timeDiff = Math.abs(dateOut - dateIn);
          var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
          amountOfDayInput.value = diffDays;
        }
      }
    });

    // Sự kiện thay đổi ngày đi
    dateOutInput.addEventListener("change", function () {
      // Kiểm tra xem ngày đi và ngày đến có được chọn chưa
      if (dateOutInput.value && dateInInput.value) {
        // Lấy giá trị ngày đến và ngày đi
        var dateIn = new Date(dateInInput.value);
        var dateOut = new Date(dateOutInput.value);

        // Kiểm tra nếu ngày đi nhỏ hơn ngày đến
        if (dateOut < dateIn) {
          alert("Ngày đi không thể nhỏ hơn ngày đến");
          dateOutInput.value = ""; // Xóa giá trị ngày đi
        } else {
          // Tính và cập nhật số ngày lưu trú
          var timeDiff = Math.abs(dateOut - dateIn);
          var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
          amountOfDayInput.value = diffDays;
        }
      }
    });
  });
</script>
