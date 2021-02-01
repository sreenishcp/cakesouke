@extends('layouts.vendor_template')
@section('content')
   <body class="loader" id="topID">
      <div id="perspective" class="perspective effect-airbnb modalview mob-container">
         <div class="main-wrapper ">
            <div class="main-content ">
               <header class="bg-white style2 pt-2 pb-0 bg-home">
                  <div class="row">
                     <div class="col-sm-6 text-left pos-top">
                        <a href="#" class="logo d-block mt-0 cat_link_menu"><img src="images/logo.png" alt=""></a>
                     </div>

                     <div class="col-sm-6 text-right pos-top">
                        <a href="#" class="menu-btn mt-0" id="sidebar-right"><span></span></a>
                     </div>
                     

                     <div class="col-sm-12 text-left pos-top">
                        <!-- <h2 class="titleText  mt-2 mb-2 ">
                           Discover Your Taste 
                        </h2> -->

                     </div>
                     
                  </div>
               </header>
               <!-- shimmer-loader wrapper -->
               <div class="preloader-wrap p-3">
                  <div class="box shimmer">
                     <div class="lines">
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                     </div>
                  </div>
                  <div class="box shimmer mb-3">
                     <div class="lines">
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                     </div>
                  </div>
               </div>
               <!-- shimmer-loader wrapper -->
               <div class="app-body p-4 ">
                  <div class="row" id="ajaxMain">
                     <div class="col-sm-12">

                        <div class="d-flex justify-content-between w-100 mb-2">
                            <h5 class="font-weight-bold">Add Products</h5>
                            <span><a href="{{url('vendor')}}" class="f-11 text-dark"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> back to home</a></span>
                        </div>

                        <div>
                           <div class="row">
                              <div class="col-sm-12 imgUp">
                                <div class="imagePreview"></div>
                                 <label class="btn btn-primary">
                                 Upload<input type="file" class="uploadFile img" value="Upload Photo" name="primary_image" style="width: 0px;height: 0px;overflow: hidden;">
                                 </label>
                              </div><!-- col-2 -->
                             </div><!-- row -->
                             <input type="file" class="uploadFile img" value="Upload Photo" name="more_image[]" style="">
                                <input type="file" class="uploadFile img" value="Upload Photo" name="more_image[]" style="">
<!--                              <div class="float-left w-100">
                              <span class="imgAdd"><i class="fa fa-plus"></i><span class="ml-1">Add More</span></span>
                           </div> -->
                        </div>

                        <div>
                           <div class="form-group">
                              <label for="">Enter Product Name</label>
                              <input type="text" class="form-control" placeholder="Enter Product Name">
                           </div>

                           <div class="form-group">
                              <label for="">Enter Price</label>
                              <div class="d-flex">
                                 <input type="text" class="form-control" placeholder="Price">
                                 <span class="my-auto w-25 text-center">/</span>
                                 <span class="btn btn-primary my-auto f-14 mr-1">KG</span>
                                 <span class="btn btn-secondary text-uppercase my-auto f-14">Product</span>
                              </div>
                           </div>

                           <div class="form-group">
                              <label for="">Choose Category</label>
                              <select name="" class="form-control">
                                <?php
                                foreach ($categories as $key => $value) {
                                  echo '<option disabled>'.$value['name'].'</option>';
                                  foreach ($categories[$key]['subcategory'] as $key => $value1) {
                                    echo '<option value="">---'.$value1['name'].'</option>';
                                  }
                                }
                                 ?>
                              </select>
                           </div>

                           <div class="form-group">
                              <div class="d-flex">
                                 <label for="" class="my-auto">Making Duration</label>
                                 <input type="text" class="form-control w-25 ml-3">
                                 <label for="" class="ml-3 my-auto">HRS</label>
                              </div>
                           </div>
                        </div>

                     </div>

                  </div>
               </div>
            </div>
            <nav class="navigation style6 style1">
               <div class="container pl-0 pr-0">
                  <div class="nav-content" style="background-color: #fff;">
                     <ul class="d-flex">

                        <!-- <li class="w-100">
                           <button class="btn btn-success w-100 f-14 text-uppercase">Update</button>
                        </li> -->

                        <li class="w-100">
                           <button class="btn btn-danger w-100 f-14 text-uppercase">Publish</button>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>

         </div>
         <nav class="outer-nav left vertical ">
            <header class="bg-tranparent style2 mt-3 pb-0 bg-home">
               <div class="row">
                  <div class="col-sm-4 text-left pos-top">
                     <a href="#" class="menu-btn mt-0" id="close-sidebar"></a>
                  </div>
                  <div class="col-sm-6 text-center pos-top">
                     <a href="#" class="logo d-block mt-1"><img src="images/logo-white.png" class="img-fluid"></a>
                  </div>
               </div>
            </header>
            <ul class="nav-item ">
               <li><a href="index.html"  class=" cat_link_menu"><i class="ti-home"></i>
                  Home	</a>
               </li>
               <li><a href="products.html"  class=" spl_link_menu"><i class="ti-face-smile"></i>
                  Products
                  </a>
               </li>
               <li><a href="orders.html"  class=" spl_link_menu"><i class="ti-star"></i> 
                  Orders 	
                  </a>
               </li>
               <li><a href="story.html" class="allCat"><i class="ti-layout-grid2 "></i>
                  Story	
                  </a>
               </li>
            </ul>
         </nav>
      </div>
      </div>
      <!-- main wrapper -->




      <!--Add-Order-->
      <div class="modal fade iconDialog show" id="addOrder" data-backdrop="static" tabindex="-1" role="dialog" aria-modal="true">
         <div class="modal-dialog modal-lg modal-md modal-dialog-centered modal-dialog-zoom" role="document">
             <div class="modal-content b-no">
                 <div class="modal-header d-block b-no pb-0 text-center">
                     <h5 class="modal-title text-center fw-600 text-uppercase">Add Order</h5>
                 </div>
                 <div class="modal-body d-block b-no pb-4">
                  <form>
                     <div class="form-group">
                       <label class="col-form-label">Order Name</label>
                       <input type="text" class="form-control" >
                     </div>
                     <div class="form-group">
                       <label for="message-text" class="col-form-label">Message:</label>
                       <textarea class="form-control"></textarea>
                     </div>
                   </form>
                 </div>
                 <div class="modal-footer b-no py-2 d-block mt-2 text-right">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                  <button type="button" class="btn btn-info">ADD</button>
                 </div>
             </div>
         </div>
      </div>


      <!--Add-Product-->
      <div class="modal fade iconDialog show" id="addProduct" data-backdrop="static" tabindex="-1" role="dialog" aria-modal="true">
         <div class="modal-dialog modal-lg modal-md modal-dialog-centered modal-dialog-zoom" role="document">
             <div class="modal-content b-no">
                 <div class="modal-header d-block b-no pb-0 text-center">
                     <h5 class="modal-title text-center fw-600 text-uppercase">Add Product</h5>
                 </div>
                 <div class="modal-body d-block b-no pb-4">
                  <form>
                     <div class="form-group">
                       <label class="col-form-label">Product Name</label>
                       <input type="text" class="form-control" >
                     </div>
                     <div class="form-group">
                       <label for="message-text" class="col-form-label">Message:</label>
                       <textarea class="form-control"></textarea>
                     </div>
                   </form>
                 </div>
                 <div class="modal-footer b-no py-2 d-block mt-2 text-right">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                  <button type="button" class="btn btn-info">ADD</button>
                 </div>
             </div>
         </div>
      </div>


      <!--Add-Story-->
      <div class="modal fade iconDialog show" id="addStory" data-backdrop="static" tabindex="-1" role="dialog" aria-modal="true">
         <div class="modal-dialog modal-lg modal-md modal-dialog-centered modal-dialog-zoom" role="document">
             <div class="modal-content b-no">
                 <div class="modal-header d-block b-no pb-0 text-center">
                     <h5 class="modal-title text-center fw-600 text-uppercase">Add Story</h5>
                 </div>
                 <div class="modal-body d-block b-no pb-4">
                  <form>
                     <div class="form-group">
                       <label class="col-form-label">Name</label>
                       <input type="text" class="form-control" >
                     </div>
                     <div class="form-group">
                       <label for="message-text" class="col-form-label">Message:</label>
                       <textarea class="form-control"></textarea>
                     </div>
                   </form>
                 </div>
                 <div class="modal-footer b-no py-2 d-block mt-2 text-right">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                  <button type="button" class="btn btn-info">ADD</button>
                 </div>
             </div>
         </div>
      </div>
@endsection

