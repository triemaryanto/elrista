 <!-- breadcrumb start-->
 <div class="breadcrumb-section">
     <div class="container">
         <div class="row">
             <div class="col-sm-6">
                 <div class="page-title">
                     <h2>blog details</h2>
                 </div>
             </div>
             <div class="col-sm-6">
                 <nav aria-label="breadcrumb" class="theme-breadcrumb">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                         <li class="breadcrumb-item"><a href="{{ route('blog') }}">blog</a></li>
                         <li class="breadcrumb-item active" aria-current="page">blog deatils</li>
                     </ol>
                 </nav>
             </div>
         </div>
     </div>
 </div>
 <!-- breadcrumb end-->


 <!--section start-->
 <section class="blog-detail-page section-b-space ratio2_3">
     <div class="container">
         <div class="row">
             <div class="col-sm-12 blog-detail">
                 <img src="{{ route('helper.show-picture', ['path' => $data->picture]) }}"
                     class="img-fluid blur-up lazyload" alt="">
                 <h3>{{ $data->title }}.</h3>
                 <ul class="post-social">
                     <li>{{ $data->created_at->settings(['formatFunction' => 'translatedFormat'])->locale('id')->format('l, j F Y') }}
                     </li>
                     <li>Posted By : {{ $data->user->name }}</li>
                     {{-- <li><i class="fa fa-heart"></i> 5 Hits</li>
                     <li><i class="fa fa-comments"></i> 10 Comment</li> --}}
                 </ul>
                 {!! $data->content !!}
             </div>
         </div>
     </div>
 </section>
 <!--Section ends-->
