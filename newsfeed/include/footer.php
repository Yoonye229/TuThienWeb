<div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Tin phổ biến</span></h2>
          <div class="latest_post_container" style="height:500p; overflow: auto;">
            <ul class="latest_postnav" >

            <!-- ADDING LATEST NEWS---------------------------------------------------------------------- -->
            <?php 

            $latest = "SELECT * FROM post_description ORDER BY RAND() DESC LIMIT 10";
            $latest_n = mysqli_query($conn , $latest);
            if($latest_n){
              while( $rows = mysqli_fetch_assoc($latest_n) ){
                $heading = $rows["p_heading"];
                $img = $rows["p_thumbnail"];
                $id = $rows["p_id"]
                ?>
                <li>
                <div class="media"> <a href="read-post.php?id=<?php echo $id; ?>" class="media-left"> <img alt="" src="./admin/upload/thumbnail/<?php echo $img; ?>"> </a>
                  <div class="media-body"> <a href="read-post.php?id=<?php echo $id; ?>" class="catg_title"> <?php echo $heading; ?> </a> </div>
                </div>
              </li>
              <?php

              }
            }
            ?>
            </ul>
          </div>
        </div>

        <aside class="right_content">
        <div class="latest_post">
            <h2><span>Tin mới nhất</span></h2>
            <div class="latest_post_container" style="height:500p; overflow: auto;">
            <ul class="spost_nav pt-4"  >

            <!-- ADDING POPULAR NEWS --------------------------------------------------------------->
            <?php 
                $latest = "SELECT * FROM post_description ORDER BY p_time DESC LIMIT 10";
                $latest_n = mysqli_query($conn , $latest);
                if($latest_n){
                 
                  while( $rows = mysqli_fetch_assoc($latest_n) ){
                    $heading = $rows["p_heading"];
                    $img = $rows["p_thumbnail"];
                    $id = $rows["p_id"];
                    ?>
                    <li>
                    <div class="media"> <a href="read-post.php?id=<?php echo $id; ?>" class="media-left"> <img alt="" src="./admin/upload/thumbnail/<?php echo $img; ?>"> </a>
                      <div class="media-body"> <a href="read-post.php?id=<?php echo $id; ?>" class="catg_title"> <?php echo $heading; ?> </a> </div>
                    </div>
                  </li>
                  <?php
                  }
                }
                ?>
            </ul>
          </div>
          </div>
          <div class="single_sidebar">
          <div class="latest_post">
            <h2><span>Chương trình</span></h2>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                <li class="cat-item">  <a href="all-posts.php">All</a>  </li>
                <!-- adding category----------------------------------------------------------------- -->
                    <?php 
                // require_once "./admin/include/connection.php";

                $get_category = "SELECT * FROM post_category";
                $result = mysqli_query($conn , $get_category);
                if($result){
                  while ( $rows =  mysqli_fetch_assoc($result) ){
                    $c_name = $rows["c_name"];
                    $post = $rows["no_of_post"];
              ?> 
                <li class="cat-item"><a href="read-category.php?category=<?php echo $c_name; ?> "><?php echo ucwords($c_name); ?> (<?php echo $post; ?>)</a></li>
                      <?php
                        }
                    }
                  ?>
                <!-- end of adding category---------------------------------------------------------  -->
                </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Mục</span></h2>
            <ul>
            <!-- <li><a href="#">Log-in / Sign-Up</a></li> -->
            <li><a href="./about-us.php">Giới thiệu</a></a></li>
              <li><a href="./contact-us.php">Liên hệ chúng tôi</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
  
  <footer id="footer">
    <div class="footer_top">
      
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="footer_widget wow fadeInDown">
            <h2>Chương trình từ thiện</h2>
            <ul class="tag_nav">
            <!-- <li><a href="#">Log-in / Sign-Up</a></li> -->
               <!-- adding category----------------------------------------------------------------- -->
               <?php 
                // require_once "connection.php";

                $get_category = "SELECT * FROM post_category";
                $result = mysqli_query($conn , $get_category);
                if($result){
                  while ( $rows =  mysqli_fetch_assoc($result) ){
                    $c_name = $rows["c_name"];
                   
              ?> 
                <li><a href="read-category.php?category=<?php echo $c_name; ?> "> <?php echo ucwords($c_name); ?> </a></li>
                      <?php
                        }
                    }
                  ?>
                <!-- end of adding category---------------------------------------------------------  -->
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="footer_widget wow fadeInRightBig">
          <?php 
                $get_details = "SELECT * FROM contact_us ORDER BY id DESC LIMIT 1";
                $get_details_result = mysqli_query($conn , $get_details);

                if($get_details_result){
                  while ($rows = mysqli_fetch_assoc($get_details_result) ){

                    $address = ucwords($rows["address"]);
                    $phn = $rows["phn"];
                    $email = ucfirst($rows["email"]);
                    $fax = $rows["fax"];
              ?>
             
            <h2>Thông tin liên hệ</h2>
          
            <address>
          
              <P> Địa chỉ : <?php echo $address; ?></P>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.427573076796!2d106.78318431455546!3d10.85504796070641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527c3debb5aad%3A0x5fb58956eb4194d0!2zxJDhuqFpIEjhu41jIEh1dGVjaCBLaHUgRQ!5e0!3m2!1sen!2sus!4v1680602514895!5m2!1sen!2sus" width="450" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <P>  SĐT: <a  style="color:rgb(218,218,218);" href="tel:<?php echo $phn ?>"> <?php echo $phn; ?> </a></P>
              <p>Email : <a style="color:rgb(218,218,218);" href = "mailto:<?php echo $email; ?>"> <?php echo $email; ?> </a> </p>
              <p>Fax : <a style="color:rgb(218,218,218);" href="fax:<?php echo $fax; ?>"> <?php echo $fax; ?> </a> </p>
            </address>

            <?php 
              }
            }
            ?>

          </div>
        </div>
      </div>

    </div>
    <div class="footer_bottom">
      
      <p class="copyright">Copyright &copy; <?php echo date("Y" , strtotime("now") ); ?> <a href="./index.php">AMPK</a></p>
      <p class="developer" style="color:white;">Developed By MinhOke</p>
      <!-- Wpfreeware -->
    </div>
  </footer>
</div>
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>
</body>
</html>