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
                                    <input class="online_book" placeholder="yyyy/mm/dd" type="date" name="DateIn">
                              </div>
                              <div class="col-md-12">
                                    <span>Ngày đi</span>
                                    <img class="date_cua" src="images/date.png">
                                    <input class="online_book" placeholder="yyyy/mm/dd" type="date" name="DateOut">
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
      <!-- end banner -->