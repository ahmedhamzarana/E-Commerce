<?php
    include('header.php');
?>


      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
                  <?php
                    $query = "SELECT * FROM products";
                    $result = mysqli_query($con, $query);                                      
                    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                  ?>
                <?php foreach($items as $row ):?>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="place_order.php?add=<?php echo $row['id']; ?>" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="../Admin/assets/uploads/<?php echo $row['image']; ?>" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           <?php echo $row['name']?>
                        </h5>
                        <h6>
                           <?php echo $row['price']?>
                        </h6>
                     </div>
                  </div>
               </div>
               <?php endforeach;?>
            </div>
            </div>
            <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
      </section>
      <!-- end product section -->

<?php
    include('footer.php');
?>