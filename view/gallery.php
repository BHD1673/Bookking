<!-- our_room -->
<div class="our_room">

   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <p class="margin_0" style="font-family: 'Arial', sans-serif; font-size: 16px; color: #333; line-height: 1.5;">
                  Chào mừng đến với Danh Mục Phòng của chúng tôi
                  - nơi mà sự thoải mái gặp gỡ với sự đa dạng. Từ phòng Standard thoải
                  mái cho đến Suite sang trọng, chúng tôi mang đến cho bạn trải nghiệm lưu trú
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
            <div class="col-md-4 col-sm-6">
               <div id="serv_hover" class="room">
                  <!-- <div class="room_img">
                        <figure><img src="<?php echo $hinh ?>" alt="#"/></figure>
                     </div> -->
                  <div class="bed_room">
                     <a href="index.php?act=danhmuc&ID=<?php echo $dm['ID']; ?>">
<<<<<<< HEAD
                        <h3><?php echo $Ten ?></h3>
                     </a>
                     <p><?php echo $MoTa?></p>
=======
                        <h3><?php echo $TenLoai ?></h3>
                     </a>
                     <p><?php echo $MoTaLoai ?></p>
>>>>>>> 89c2d0a5ec0d5e74a63f8b1e548070681bec67b2
                     <p><?php echo $GiaPhongChung ?></p>
                  </div>
               </div>
            </div>
         <?php } ?>
         <?php
         foreach ($sptheodm as $sp) {
            extract($dm);
            //   $hinh = $img_path.$img;


         ?>
            <div class="col-md-4 col-sm-6">
               <div id="serv_hover" class="room">
                  <div class="room_img">
                     <figure><img src="images/room3.jpg" alt="#" /></figure>
                  </div>
                  <div class="bed_room">
                     <h3>Bed Room</h3>
                     <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                  </div>
               </div>
            </div>
         <?php } ?>
      </div>