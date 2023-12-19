 <section class="blog ratio2_1 gym-blog pt-0 slick-default-margin">
     <div class="container">
         <div class="row section-t-space">
             <div class="col-md-12">
                 <div class="title3">
                     <h4>Latest blog</h4>
                     <h2 class="title-inner3">Get Inspired</h2>
                     <div class="line"></div>
                 </div>
                 <div class="slide-3 no-arrow">
                     @foreach ($data as $item)
                         <div class="col-md-12">
                             <a href="{{ route('detailblog', ['slug' => $item->slug]) }}">
                                 <div class="classic-effect">
                                     <div>
                                         <img alt=""
                                             src="{{ route('helper.show-picture', ['path' => $item->picture]) }}"
                                             class="img-fluid blur-up lazyload bg-img">
                                         <span></span>
                                     </div>
                                 </div>
                             </a>
                             <div class="blog-details">
                                 <h4>{{ $item->created_at->settings(['formatFunction' => 'translatedFormat'])->locale('id')->format('l, j F Y') }}
                                 </h4>
                                 <a href="{{ route('detailblog', ['slug' => $item->slug]) }}">
                                     <p>{{ $item->title }}</p>
                                 </a>
                                 <h6>by: {{ $item->user->name }}</h6>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </section>
