 <section class="category-img-wrapper ratio_asos pt-0 section-b-space">
     <div class="container">
         <div class="row">
             <div class="col-md-3 col-6">
                 <div class="category-wrap">
                     <div class="banner-effect">
                         <div>
                             <img src="{{ asset($category1->image) }}" class="img-fluid bg-img" alt="">
                         </div>
                     </div>
                     <div class="category-content">
                         <h3>{{ $category1->name }}</h3>
                         <a href="#">shop Now</a>
                     </div>
                 </div>
             </div>
             <div class="col-md-3 col-6">
                 <div class="category-wrap">
                     <div class="category-content top-content">
                         <h3>{{ $category2->name }}</h3>
                         <a href="#">shop Now</a>
                     </div>
                     <div class="banner-effect">
                         <div>
                             <img src="{{ asset($category2->image) }}" class="img-fluid bg-img" alt="">
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-3 col-6">
                 <div class="category-wrap">
                     <div class="banner-effect">
                         <div>
                             <img src="{{ asset($category3->image) }}" class="img-fluid bg-img" alt="">
                         </div>
                     </div>
                     <div class="category-content">
                         <h3>{{ $category3->name }}</h3>
                         <a href="#">shop Now</a>
                     </div>
                 </div>
             </div>
             <div class="col-md-3 col-6">
                 <div class="category-wrap">
                     <div class="category-content top-content">
                         <h3>{{ $category4->name }}</h3>
                         <a href="#">shop Now</a>
                     </div>
                     <div class="banner-effect">
                         <div>
                             <img src="{{ asset($category4->image) }}" class="img-fluid bg-img" alt="">
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
