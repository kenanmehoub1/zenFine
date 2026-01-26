@extends("index")
@section('content')
<div class="hero-section">
    <!-- خلفية الصور المتقلبة -->
    <div class="slideshow">
        <div class="slide" style="background-image: url('/image/car1.jpg');"></div>
        <div class="slide" style="background-image: url('/image/car2.jpg');"></div>
        <div class="slide" style="background-image: url('/image/girl1.jpg');"></div>
        <div class="slide" style="background-image: url('/image/man1.jpg');"></div>
    </div>
    
    <!-- طبقة التعتيم الخفيفة -->
    <div class="overlay"></div>
    
    <!-- المحتوى -->
    <div class="hero-content" style="direction: {{trans('home.dir')}};">
        <div class="hero-text">
            <h1 class="hero-title">Zinefine</h1>
            <p class="hero-subtitle">
               
                {{trans('home.we_handle')}}
            </p>
            <a href="/contact" class="hero-btn">{{trans('home.contact_us_button')}}</a>
        </div>
    </div>
</div>

<div class="one" style="direction: {{trans('home.dir')}};">
    <div class="blur">
        <h1>{{trans('home.hero_title_line1')}}</h1>
        <h1>{{trans('home.hero_title_line2')}}</h1>
        <div class="blur-btn">
            <a href="/contact" style="color:white; background:#4CAF9A;">{{trans('home.contact')}}</a>
            <a href="/gallery" style="color:#4CAF9A; background:#E3EEEA; border:solid 3px #4CAF9A;">{{trans('home.gallery')}}</a>
        </div>
    </div>
</div>

<div class="two" style="direction: {{trans('home.dir')}};">
    <div class="two-post1"><a class="two-post" href="/services">{{trans('home.Deep_cleaning')}}</a></div>
    <div class="two-post2"><a class="two-post" href="/House_cleaning">{{trans('home.House_cleaning')}}</a></div>
</div>

<!-- محتوى إضافي للبحث -->
<div class="page-content" style="direction: {{trans('home.dir')}};">
    <div class="section">
        <h2>{{trans('home.our_services_title')}}</h2>
        <p>{{trans('home.our_services_text1')}}</p>
        <p>{{trans('home.our_services_text2')}}</p>
    </div>
    
    <div class="section">
        <h2>{{trans('home.about_us_title')}}</h2>
        <p>{{trans('home.about_us_text1')}}</p>
        <p>{{trans('home.about_us_text2')}}</p>
    </div>
    
    <div class="section">
        <h2>{{trans('home.why_choose_us_title')}}</h2>
        <p>{{trans('home.why_choose_us_text1')}}</p>
        <p>{{trans('home.why_choose_us_text2')}}</p>
    </div>
</div>
       
     <style>
    /* تصميم القسم الجديد */
    .hero-section {
        position: relative;
        width: 100%;
        height: 100vh;
        min-height: 700px;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }
    
    /* خلفية الصور المتقلبة */
    .slideshow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }
    
    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0;
        animation: slideshow 20s infinite;
    }
    
    .slide:nth-child(1) {
        animation-delay: 0s;
    }
    
    .slide:nth-child(2) {
        animation-delay: 5s;
    }
    
    .slide:nth-child(3) {
        animation-delay: 10s;
    }
    
    .slide:nth-child(4) {
        animation-delay: 15s;
    }
    
    @keyframes slideshow {
        0% {
            opacity: 0;
            transform: scale(1.1);
        }
        10% {
            opacity: 0.7;
            transform: scale(1);
        }
        20% {
            opacity: 0.7;
        }
        30% {
            opacity: 0;
        }
        100% {
            opacity: 0;
        }
    }
    
    /* طبقة التعتيم */
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        z-index: 2;
    }
    
    /* المحتوى */
    .hero-content {
        position: relative;
        display: flex;
        align-items: center;
        height: 100%;
        padding: 0 5%;
        z-index: 3;
        color: white;
    }
    
    .hero-text {
        max-width: 600px;
    }
    
    .hero-title {
        font-size: 4.5rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        color: #ffffff;
    }
    
    .hero-subtitle {
        font-size: 1.5rem;
        line-height: 1.6;
        margin-bottom: 2.5rem;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        color: #f0f0f0;
    }
    
    .hero-btn {
        display: inline-block;
        padding: 15px 40px;
        background-color: #4CAF9A;
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-size: 1.2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 2px solid #4CAF9A;
    }
    
    .hero-btn:hover {
        background-color: transparent;
        border-color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    
    /* تصميم متجاوب */
    @media (max-width: 768px) {
        .hero-section {
            height: 80vh;
            min-height: 600px;
        }
        
        .hero-title {
            font-size: 3rem;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
        }
        
        .hero-btn {
            padding: 12px 30px;
            font-size: 1rem;
        }
    }
    
    @media (max-width: 480px) {
        .hero-section {
            height: 70vh;
            min-height: 500px;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1rem;
        }
        
        .hero-content {
            padding: 0 20px;
        }
    }
</style>
  <script>
    // إضافة تأثيرات تفاعلية للزر
    document.addEventListener('DOMContentLoaded', function() {
        const heroBtn = document.querySelector('.hero-btn');
        
        heroBtn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.3)';
        });
        
        heroBtn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
        
        // تأكد من تحميل الصور لضمان انتقال سلس
        window.addEventListener('load', function() {
            document.querySelector('.hero-section').style.opacity = '1';
        });
    });
</script>
    @endsection