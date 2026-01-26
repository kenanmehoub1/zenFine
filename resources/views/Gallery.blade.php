@extends("index")
@section('content')
<style>
    .header{
          
            height: 90px;
            
            
        }  
    .container{
     background:#bfe7adff;    
    }
    .first{
        display: flex;
    }
        .post1{
            width: 50%;
            display: block;
             justify-content: center;
             align-items: center;
  margin: 0 auto;
  background: linear-gradient(45deg, #bfe7adff, #9dd1f681);
  padding: 40px;
text-align:center;
 
        }
        .portfolio-title {
  color: #333;
  font-size: 4em;
  margin-bottom: 20px;
  background: linear-gradient(45deg, #667eea, #764ba2);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.portfolio-description {
  color: #666;
  font-size: 1.2em;
  line-height: 1.6;
  margin: 0;
  padding: 0 20px;
   margin-top:4rem;
}

.contact-btn {
  background: linear-gradient(45deg, #667eea, #764ba2);
  color: white;
  margin-top:6rem;
  border: none;
  padding: 15px 40px;
  font-size: 1.1em;
  border-radius: 50px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 1px;
  text-decoration: none;
  display: inline-block;
}

.contact-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
  background: linear-gradient(45deg, #764ba2, #667eea);
  color: white;
  text-decoration: none;
}

.contact-btn:active {
  transform: translateY(-1px);
}

.second{
    display: flex;
    background: linear-gradient(45deg, #bfe7adff, #9dd1f681);
}
.second-img{
    width: 50%;
    
    
}
.second-img img{
    width: 100%;
    
}
.second-post{
    
    width: 50%;              
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
     padding: 40px;       
      transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
       .second-post h2 {
             color: #764ba2;
             text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            font-size: 32px;
            position: relative;
            padding-bottom: 15px;
        }
        .second-post p {
            color: #555;
            margin-bottom: 30px;
            font-size: 18px;
            text-align: justify;
        }


        .gallery {
            
            position: relative;
            width: 50%;
            height: 600px;
            overflow: hidden;
           
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        

        .slides-container {
            
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }
        
        .slide {
            min-width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
           
                  background: linear-gradient(45deg, #bfe7adff, #9dd1f681);
        }
        
        .slide img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
        
        .nav-btn {
            
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .nav-btn:hover {
            background-color: white;
            transform: translateY(-50%) scale(1.1);
        }
        
        .prev {
            right: 20px;
        }
        
        .next {
            left: 20px;
        }
        
        .dots-container {
            display: flex;
            justify-content: center;
            margin: 20px 0px;
            
            gap: 10px;
        }
        
        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #bbb;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .dot.active {
            background-color: #2575fc;
            transform: scale(1.2);
        }
        
        .dot:hover {
            background-color: #6a11cb;
        }
        
        .image-counter {
            text-align: center;
            margin-top: 10px;
            color: #666;
            font-size: 14px;
        }
  

  @media (max-width: 1000px) {
          
           
        }



        
        
        
        @media (max-width: 800px) {
             .first{
        display: block;
    }
     .post1{
            width: 100%;
     }
     
            .gallery {
                   width: 100%;
                height: 500px;
            }
            
     .nav-btn {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

.second{
    display: block;
 
}
.second-img{
    width: 100%;
    
    
}
.second-img img{
    width: 100%;
    
}
.second-post{
    
    width: 100%;  
          

    
        }

       
         @media (max-width: 600px) {
            .gallery {
                height: 500px;
            }
            
            .gallery-title {
                font-size: 24px;
            }
           
                
        }
        @media (max-width: 500px) {
            .gallery {
                height: 500px;
            }
            
            .gallery-title {
                font-size: 24px;
            }
           
        }
</style>
  <div class="content" >
    <div class="first" >
     
<div class="post1"style=" direction:{{trans('home.dir')}};">
 <h2 class="portfolio-title">{{trans('home.gallery_title')}}</h2>
    <p class="portfolio-description">
      {{trans('home.gallery_description')}}
    </p>
<a href="tel:+971545969516" class="contact-btn">{{trans('home.contact_us_button')}}</a>
 </div>

        <div class="gallery" >
           
            <div class="slides-container">
                <!-- سيتم إضافة الصور ديناميكياً باستخدام JavaScript -->
            </div>
            <button class="nav-btn prev">{{trans('home.next_button')}}</button>
            <button class="nav-btn next">{{trans('home.prev_button')}}</button>
        </div>

 

 </div>
        <div class="dots-container">
            <!-- سيتم إضافة النقاط ديناميكياً باستخدام JavaScript -->
        </div>
      
  <div class="second" style=" direction:{{trans('home.dir')}};">
<div class="second-img">
<img src="{{ asset('image/new1.jpg') }}" alt="">
</div>
    <div class="second-post"style=" direction:{{trans('home.dir')}};">
        <h2>{{trans('home.premium_cleaning_title')}}</h2>
        <p>{{trans('home.premium_cleaning_text')}}</p>
      
    </div>
  </div>

    <div class="second"style=" direction:{{trans('home.dir')}};">
<div class="second-img">
<img src="{{ asset('image/new2.jpg') }}" alt="">
</div>
    <div class="second-post">
        <h2>{{trans('home.professional_home_cleaning_title')}}</h2>
        <p>{{trans('home.professional_home_cleaning_text')}}</p>
        <a href="tel:+1234567890" class="contact-btn">
            <span class="icon">{{trans('home.contact_us_icon')}}</span> {{trans('home.contact_us_button')}}
        </a>
    </div>
  </div>
    
    <div class="second"style=" direction:{{trans('home.dir')}};">
<div class="second-img">
<img src="{{ asset('image/new3.jpg') }}" alt="">
</div>
    <div class="second-post">
        <h2>{{trans('home.zenfine_excellence_title')}}</h2>
        <p>{{trans('home.zenfine_excellence_text')}}</p>
       
    </div>
  </div>
    <div class="second" style=" direction:{{trans('home.dir')}};">
<div class="second-img">
<img src="{{ asset('image/new4.jpg') }}" alt="">
</div>
    <div class="second-post">
        <h2>{{trans('home.premium_cleaning_title')}}</h2>
        <p>{{trans('home.premium_cleaning_text')}}</p>
        <a href="tel:+971545969516" class="contact-btn">
            <span class="icon">{{trans('home.contact_us_icon')}}</span> {{trans('home.contact_us_button')}}
        </a>
    </div>
  </div>
       


     <script>
        // بيانات الصور
        const images = [
            '{{ asset('image/new1.jpg') }}',
            '{{ asset('image/new2.jpg') }}',
            '{{ asset('image/new3.jpg') }}',
            '{{ asset('image/new4.jpg') }}',
            '{{ asset('image/new5.jpg') }}',
            '{{ asset('image/new6.jpg') }}',
            '{{ asset('image/new7.jpg') }}'
        ];
        
        // العناصر الأساسية
        const slidesContainer = document.querySelector('.slides-container');
        const dotsContainer = document.querySelector('.dots-container');
        const prevBtn = document.querySelector('.next');
        const nextBtn = document.querySelector('.prev');
        const currentSlideElement = document.getElementById('current-slide');
        
        let currentSlide = 0;
        let autoSlideInterval;
        
        // تهيئة المعرض
        function initGallery() {
            // إضافة الصور
            images.forEach((image, index) => {
                const slide = document.createElement('div');
                slide.className = 'slide';
                
                const img = document.createElement('img');
                img.src = image;
                img.alt = `صورة ${index + 1}`;
                
                slide.appendChild(img);
                slidesContainer.appendChild(slide);
                
                // إضافة النقاط
                const dot = document.createElement('div');
                dot.className = 'dot';
                if (index === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goToSlide(index));
                dotsContainer.appendChild(dot);
            });
            
            // بدء التقليب التلقائي
            startAutoSlide();
        }
        
        // بدء التقليب التلقائي
        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 3000); // 3000 مللي ثانية = 3 ثواني
        }
        
        // إيقاف التقليب التلقائي
        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }
        
        // الانتقال إلى شريحة محددة
        function goToSlide(slideIndex) {
            currentSlide = slideIndex;
            slidesContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
            updateDots();
            updateCounter();
        }
        
        // الانتقال إلى الشريحة التالية
        function nextSlide() {
            currentSlide = (currentSlide + 1) % images.length;
            goToSlide(currentSlide);
        }
        
        // الانتقال إلى الشريحة السابقة
        function prevSlide() {
            currentSlide = (currentSlide - 1 + images.length) % images.length;
            goToSlide(currentSlide);
        }
        
        // تحديث النقاط النشطة
        function updateDots() {
            const dots = document.querySelectorAll('.dot');
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }
        
        // تحديث العداد
        function updateCounter() {
            if (currentSlideElement) {
                currentSlideElement.textContent = currentSlide + 1;
            }
        }
        
        // إضافة مستمعي الأحداث
        prevBtn.addEventListener('click', () => {
            stopAutoSlide();
            prevSlide();
            startAutoSlide();
        });
        
        nextBtn.addEventListener('click', () => {
            stopAutoSlide();
            nextSlide();
            startAutoSlide();
        });
        
        // إيقاف التقليب التلقائي عند التمرير فوق المعرض
        document.querySelector('.gallery').addEventListener('mouseenter', stopAutoSlide);
        document.querySelector('.gallery').addEventListener('mouseleave', startAutoSlide);
        
        // بدء المعرض
        initGallery();
    </script>

@endsection