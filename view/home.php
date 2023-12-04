



<!-- our_room -->
<div class="our_room">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="titlepage">
          <p class="margin_0" style="font-family: 'Arial', sans-serif; font-size: 16px; color: #333; line-height: 1.5;">
            Chào mừng đến với trang web của chúng tôi
            - nơi mà sự thoải mái gặp gỡ với sự đa dạng. Từ các loại phòng dịch vụ thoải
            mái cho đến sang trọng, chúng tôi mang đến cho bạn trải nghiệm lưu trú
            tối ưu. Khám phá không gian sống và làm việc tiện nghi, được thiết kế để đáp
            ứng mọi nhu cầu của bạn. Hãy dành thời gian để chìm đắm trong sự đẳng cấp và
            sự ấm áp mỗi khi bạn chọn lựa một trong những không gian tuyệt vời của chúng tôi." </p>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
         foreach ($roomdm as $dm) {
            extract($dm);
            //   $hinh = $img_path.$img;



         ?>

      <!-- <div class="col-md-4 col-sm-6">
        <div id="serv_hover" class="room"> -->
          <!-- <div class="room_img">
                        <figure><img src="<?php echo $hinh ?>" alt="#"/></figure>
                     </div> -->
          <!-- <div class="bed_room">
            <a href="index.php?act=danhmuc&ID=<?php echo $dm['ID']; ?>">
              <h3><?php echo $TenLoai ?></h3>
            </a>
            <p><?php echo $MoTaLoai ?></p>
            <p><?php echo $GiaPhongChung ?></p>
          </div>
        </div>
      </div> -->
      <?php } ?>
      <!-- <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="images/room2.jpg" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>Bed Room</h3>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="images/room3.jpg" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>Bed Room</h3>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="images/room4.jpg" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>Bed Room</h3>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="images/room5.jpg" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>Bed Room</h3>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="images/room6.jpg" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>Bed Room</h3>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                     </div>
                  </div>
               </div> -->
    </div>
  </div>
</div>
<!-- end our_room -->
<!-- our_room -->
<div class="our_room">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="titlepage">
          <h2>Nêu qua về khách sạn của chúng tôi</h2>
          <p>Khám phá sự hoàn hảo trong sự đơn giản tinh thế tại khách sạn chúng tôi, nơi mỗi chi tiết được chăm chút
            kỹ
            lưỡng để tạo nên không gian ấm cúng và thân thiện. Với vị trí thuận lợi và tiện nghi hiện đại, chúng tôi
            tự
            hào là điểm đến lý tưởng cho những chuyến công tác hoặc du lịch đầy thoải mái. </p>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
         foreach ($roomnew as $room) {
            extract($room);
            $hinh = $img_path . $AnhPhong;


         ?>
      <div class="col-md-4 col-sm-6">
        <div id="serv_hover" class="room">
          <div class="room_img">
            <figure><img src="<?php echo $hinh ?>" alt="#" /></figure>
          </div>
          <div class="bed_room">
            <a href="index.php?act=phongct">
              <h3><?php echo $TenPhong ?></h3>
            </a>
            <a href="index.php?act=phongct">
              <h3><?php echo $TenPhong ?></h3>
            </a>
            <a href="index.php?act=phongct">
              <h3><?php echo $TenPhong ?></h3>
            </a>
            <p><?php echo $TrangThaiPhong ?></p>
          </div>
        </div>
      </div>
      <?php } ?>
      <!-- <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="images/room2.jpg" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>Bed Room</h3>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="images/room3.jpg" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>Bed Room</h3>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="images/room4.jpg" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>Bed Room</h3>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="images/room5.jpg" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>Bed Room</h3>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="images/room6.jpg" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>Bed Room</h3>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                     </div>
                  </div>
               </div> -->
               <!-- about -->
<div class="about">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-5">
        <div class="titlepage">
          <h2>Về chúng tôi<img src="" alt=""></h2>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit tempora officia quasi veniam nostrum quos magnam debitis aperiam, labore blanditiis enim perferendis est repudiandae sit beatae, deserunt sed dolorem doloremque. </p>
          <a class="read_more" href="Javascript:void(0)"> Read More</a>
        </div>
      </div>
      <div class="col-md-7">
        <div class="about_img">
          <figure><img src="images/about.png" alt="#" /></figure>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end about -->
    </div>
  </div>
</div>
<!-- end our_room -->
