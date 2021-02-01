@extends('layouts.vendor_template')
@section('content')
   <body class="loader" id="topID">
      <div id="perspective" class="perspective effect-airbnb modalview mob-container">
         <div class="main-wrapper ">
            <div class="main-content ">
               <header class="bg-white style2 pt-2 pb-0 bg-home">
                  <div class="row">
                     <div class="col-sm-6 text-left pos-top">
                        <a href="#" class="logo d-block mt-0 cat_link_menu"><img src="{{asset("vendorcss/images/logo.png")}}" alt=""></a>
                     </div>

                     <div class="col-sm-6 text-right pos-top">
                        <a href="#" class="menu-btn mt-0" id="sidebar-right"><span></span></a>
                     </div>
                     

                     <div class="col-sm-12 text-left pos-top">
                        <!-- <h2 class="titleText  mt-2 mb-2 ">
                           Discover Your Taste 
                        </h2> -->

                        <div class="home-profile">
                           <div class="span4 well bg-white p-3">
                                 <div class="d-flex">
                                   <div class="span1"><a href="" class="thumbnail"><img src="{{asset("vendorcss/images/uploads/products/5.jpg")}}" alt=""></a></div>
                                   <div class="span3">
                                       <p class="mb-1 text-dark" style="opacity:1;"><strong>Anoop Antony</strong></p>
                                      <span class=" badge badge-danger">20% Visits</span> <span class=" badge badge-info">129 Views</span>
                                   </div>
                                </div>
                             </div>
                        </div>

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

                        <div class="d-flex justify-content-between w-100">
                           <h5 class="font-weight-bold">Popular Products</h5>
                           <a href="products.html" class="f-10 my-auto">View All</a>
                        </div>

                        <ul class="shop-item shop-item-home pl-0">
                           <div id="ajax">
                              <div id="response">
                                 <li>
                                    <a href="" class="showProductInfo">
                                       <div class="item list-item-full  pl-0 pr-0">
                                          <figure class="mb-0"><img src="{{asset("vendorcss/images/uploads/products/1.jpg")}}" ></figure>
                                          <div class="content-div"></div>
                                          <i class="ti-heart mt-3 text-red bg-price price">INR <span>32.00</span></i>
                                       </div>
                                    </a>
                                    <h4 class="">Um Ali</h4>
                                 </li>
                                 
                                 <li>
                                    <a href="" class="showProductInfo">
                                       <div class="item list-item-full  pl-0 pr-0">
                                          <figure class="mb-0"><img src="{{asset("vendorcss/images/uploads/products/2.jpg")}}" ></figure>
                                          <div class="content-div"></div>
                                          <i class="ti-heart mt-3 text-red bg-price price">INR <span>30.00</span></i>
                                       </div>
                                    </a>
                                    <h4 class="">Luqymat</h4>
                                 </li>
                                 
                                 <li>
                                    <a href="" class="showProductInfo">
                                       <div class="item list-item-full  pl-0 pr-0">
                                          <figure class="mb-0"><img src="{{asset("vendorcss/images/uploads/products/3.jpg")}}" ></figure>
                                          <div class="content-div"></div>
                                          <i class="ti-heart mt-3 text-red bg-price price">INR <span>35.00</span></i>
                                       </div>
                                    </a>
                                    <h4 class="">Khabees Heaven</h4>
                                 </li>
                                 
                              </div>
                              <div class="clearfix"></div>
                              <!-- <div class="text-center">
                                 <img id="loader" src="loader.svg">
                              </div> -->
                           </div>
                        </ul>
                     </div>


                     <div class="col-sm-12 pb-3">
                        <div class="d-flex justify-content-between w-100">
                           <a href="{{url('vendor/add-product')}}" class="btn btn-info text-uppercase btn-width">
                              <span class="float-left w-100 text-center"><i class="fa fa-plus-square-o fs30 mb-1" aria-hidden="true"></i></span>
                               Products
                           </a>

                           <a href="add-story.html" class="btn btn-success text-uppercase btn-width" >
                              <span class="float-left w-100 text-center"><i class="fa fa-plus-square-o fs30 mb-1" aria-hidden="true"></i></span>
                               Story
                           </a>

                           <a href="" class="btn text-white text-uppercase btn-width" style="background-color: #35CDAD;">
                              <span class="float-left w-100 text-center"><i class="fa fa-plus-square-o fs30 mb-1" aria-hidden="true"></i></span>
                               Offer
                           </a>
                        </div> 
                     </div>
                  </div>
               </div>
            </div>
            <nav class="navigation style6 style1">
               <div class="container pl-0 pr-0">
                  <div class="nav-content" style="background-color: #fff;">
                     <ul>
                        <li><a href="index.html" class="nav-content-bttn"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                        <li><a href="products.html" class=" nav-content-bttn" ><i class="fa fa-bandcamp" aria-hidden="true"></i>Products</a></li>
                        <li><a  data-toggle="modal" data-target="#addOrder" class="nav-content-bttn allCat"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add</a></li>
                        <li><a href="story.html" class="nav-content-bttn" data-tab="favorites"><i class="fa fa-stumbleupon-circle" aria-hidden="true"></i>Story</a></li>
                        <li><a href="profile.html" class="nav-content-bttn" ><i class="fa fa-user-circle-o" aria-hidden="true"></i>User</a></li>
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
                     <a href="#" class="logo d-block mt-1"><img src="asset("vendorcss/images/logo-white.png")}}" class="img-fluid"></a>
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