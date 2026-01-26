@extends("index")
@section('content')
<style>
    .container{
     background:#bfe7adff;    
    }
 
        
        .gallery {
            
            position: relative;
            width: 100%;
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
   .temple_blur{
      background: linear-gradient(45deg, #bfe7adff, #9dd1f681);
         width: 100%;
            height: auto;
           
            display: flex;
            justify-content: center;
            align-items:  center;
            position: relative;
    }
    .blur{
            background: #d7e7e6d2;
            backdrop-filter: blur(7px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            width: 35%;
            min-height: 200px;
            margin-bottom: 50px;
            display: block;
            justify-content: center;
            align-items: center;
            color: #282624ff;
            text-align: center;
        }
   .two{
     background-image:  url('{{ asset('image/man2.jpg') }}');
    background-size: cover;
    background-repeat: no-repeat;
    height: 50vw;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: flex-start;
    position: relative;
    gap: 0.3%;
    padding-left: 15%;
    padding-bottom: 2rem;
}

.two-post1{
       background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), 
                url('{{ asset('image/car2.jpg') }}');
   
    background-size: cover;
    background-repeat: no-repeat;
    height: 15vw;
    width: 22%;
    border-radius: 10px;
    transition: transform 0.3s ease;
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

.two-post1:hover {
    transform: translateY(-5px);
    box-shadow: 0 3px 40px #4CAF9A;
      background-image:url('{{ asset('image/car2.jpg') }}');
}

.two-post2{
       background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), 
                url('{{ asset('image/girl2.jpg') }}');

    background-size: cover;
    background-repeat: no-repeat;
    height: 15vw;
    width: 22%;
    border-radius: 10px;
    transition: transform 0.3s ease;
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

.two-post2:hover {
    transform: translateY(-5px);
    box-shadow: 0 3px 40px #4CAF9A;
      background-image: url('{{ asset('image/girl2.jpg') }}');
    
}

.two-post{
    text-decoration: none;
    color: #8af606ff;
    font-weight: bold;
    font-size: 2vw;
    display: inline-block;
    width: 100%;
    text-align: center;
    
}
  @media (max-width: 1000px) {
          
            .blur{
                min-height: 140px;
            }
        }



        
        
        
        @media (max-width: 800px) {
            .gallery {
                height: 500px;
            }
            
            .nav-btn {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }
            .blur{
                width: 50%;
                min-height: 100px;
            }
        .blur-btn a{
            font-size:13px;
            margin:4%;
            padding: 2% 4%;
       
        }
 .two{
 
    height: 80vw;
    display: flex;
    flex-direction: column;
    
    align-items: flex-start;
    position: relative;
    gap: 1%;
    padding-left: 15%;
    padding-bottom: 1rem;
    
}

.two-post1{
   
    min-height: 25vw;
    width: 30%;

}

.two-post2{
 
    min-height: 25vw;
    width: 30%;
 
}

.two-post{
     font-weight: bold;
    font-size: 4vw;
    }
    
        }

       
         @media (max-width: 600px) {
            .gallery {
                height: 500px;
            }
            
            .gallery-title {
                font-size: 24px;
            }
           
                 .blur{
                width: 60%;
                min-height: 100px;
            }
        .blur-btn a{
            font-size:10px;
            margin:4%;
            padding: 2% 4%;
       
        }
        }
        @media (max-width: 500px) {
            .gallery {
                height: 500px;
            }
            
            .gallery-title {
                font-size: 24px;
            }
             .temple_blur{
           height: 100px;
             }
            .blur{
                min-height: 80px;
            }
  .blur-btn a{
            font-size:10px;
            margin:1%;
            padding: 1% 2%;
       
        }
             .two{
 
    height: 100vw;
    display: flex;
    flex-direction: column;
    
    align-items: flex-start;
    position: relative;
    gap: 1%;
    padding-left: 15%;
    padding-bottom: 1rem;
    
}

.two-post1{
   
    min-height: 35vw;
    width: 40%;

}

.two-post2{
 
    min-height: 35vw;
    width: 40%;
 
}

.two-post{
     font-weight: bold;
    font-size: 4vw;
    }
        }
</style>
  <div class="content">
        
       
        <div class="gallery" >
            <div class="slides-container">
                <!-- سيتم إضافة الصور ديناميكياً باستخدام JavaScript -->
            </div>
            <button class="nav-btn prev">{{trans('home.next_button')}}</button>
            <button class="nav-btn next">{{trans('home.prev_button')}}</button>
        </div>
        <div class="dots-container">
            <!-- سيتم إضافة النقاط ديناميكياً باستخدام JavaScript -->
        </div>
      
   
        <div class="temple_blur" style=" direction:{{trans('home.dir')}};">
                <div class="blur">
                <h1>{{trans('home.hero_title_line1')}}</h1>
                <h1>{{trans('home.hero_title_line2')}}</h1>
                <div class="blur-btn">
                    <a href="/gallery" style="color:white; background:#4CAF9A;">{{trans('home.gallery')}}</a>
                    <a href="/contact" style="color:#4CAF9A; background:#E3EEEA; border:solid 3px #4CAF9A;">{{trans('home.contact_title')}}</a>
                 </div>
             </div>
       </div>
        <div class="two" >
            <div class="two-post1"><a class="two-post" href="/gallery">{{trans('home.gallery')}}</a></div>
            <div class="two-post2"><a class="two-post" href="/contact">{{trans('home.contact_title')}}</a></div>
        </div>
        
        <!-- محتوى إضافي للبحث -->
        <div class="page-content" style=" direction:{{trans('home.dir')}};">
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
     
    </div>


     <script>
        // بيانات الصور
        const images = [
            '{{ asset('image/girl1.jpg') }}',
            '{{ asset('image/girl2.jpg') }}',
            '{{ asset('image/man1.jpg') }}',
            '{{ asset('image/man2.jpg') }}',
            '{{ asset('image/man3.jpg') }}'
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