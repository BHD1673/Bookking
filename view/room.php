 <!-- our_room -->
 <div class="our_room">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Các Phòng Của Khách Sạn</h2>
                <p>Khám phá sự hoàn hảo trong sự đơn giản tinh thế tại khách sạn chúng tôi, nơi mỗi chi tiết được chăm chút kỹ
                   lưỡng để tạo nên không gian ấm cúng và thân thiện. Với vị trí thuận lợi và tiện nghi hiện đại, chúng tôi tự
                   hào là điểm đến lý tưởng cho những chuyến công tác hoặc du lịch đầy thoải mái. </p>
             </div>
          </div>
       </div>
       <div class="row">
          <?php
            foreach ($roomnew as $room) {
               $id = isset($room['ID']) ? $room['ID'] : null; // Gán giá trị mặc định nếu 'id' không tồn tại
               extract($room);
               $hinh = $img_path . $AnhPhong;
               $linksp = "index.php?act=sanphamct&idsp=" . $id;
               echo '<div class="col-md-4 col-sm-6">
                       <div id="serv_hover" class="room">
                           <div class="room_img">
                               <figure><img src="' . $hinh . '" alt="#"/></figure>
                           </div>
                           <div class="bed_room">
                           <a href="' . $linksp . '"><h3>' . $TenPhong . '</h3></a>
                           <a href="' . $linksp . '"> <p>' . $TrangThaiPhong . '</p></a>
                           </div>
                       </div>
                   </div>';
            }

            ?>
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