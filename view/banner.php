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
                        <form class="book_now" id="bookingForm" method="post" action="index.php?act=roomlist">
                           <div class="row">
                              <div class="col-md-12">
                                    <span>Ngày đến</span>
                                    <img class="date_cua" src="images/date.png">
                                    <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="DateIn">
                              </div>
                              <div class="col-md-12">
                                    <span>Ngày đi</span>
                                    <img class="date_cua" src="images/date.png">
                                    <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="DateOut">
                                    <input type="hidden" name="AmountOfDay" class="AmountOfDay" value="">
                              </div>
                              <div class="col-md-12">
                                    <a href="?act=roomlist"><button type="submit" class="book_btn">Tìm phòng ngay</button></a>
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
   // Lấy các phần tử input
   var dateIn = document.querySelector('input[name="DateIn"]');
   var dateOut = document.querySelector('input[name="DateOut"]');
   var amountOfDays = document.querySelector('input[name="AmountOfDay"]');

   // Hàm tính toán và cập nhật số ngày
   function updateDays() {
      var inDate = new Date(dateIn.value);
      var outDate = new Date(dateOut.value);
      var timeDiff = outDate.getTime() - inDate.getTime();
      var daysDiff = timeDiff / (1000 * 3600 * 24);

      // Cập nhật giá trị vào input ẩn
      amountOfDays.value = daysDiff;
   }

   // Thêm sự kiện 'onchange' vào các trường nhập ngày
   dateIn.addEventListener('change', updateDays);
   dateOut.addEventListener('change', updateDays);
});

</script>
