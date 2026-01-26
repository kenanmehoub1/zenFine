   <div class="top-nav" style=" direction:{{trans('home.dir')}};">
     <div class='email' style="  margin-right:20px;">{{trans('home.Email_At')}} {{trans('home.email_address')}}</div>
     <div>  <div class="social-links"style="  margin-left:90px;">
                <a href="https://www.facebook.com/share/1QYiQUkMKv/" class="social-link-n" aria-label="{{trans('home.social_facebook')}}"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-link-n" aria-label="{{trans('home.social_twitter')}}"><i class="fab fa-x"></i></a>
                <a href="https://www.instagram.com/zenfine.fpc" class="social-link-n" aria-label="{{trans('home.social_instagram')}}"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link-n" aria-label="{{trans('home.social_youtube')}}"><i class="fab fa-youtube"></i></a>
            </div></div>
     <div class='phone' style="  margin-left:20px;"> 
        <p>{{trans('home.Payment')}} : <span style="font-size:1.5rem;"><i class="fa-brands fa-cc-mastercard" style="color: #eb001b;"></i>
     <i class="fa-brands fa-cc-visa" style="color: #1a1f71;"></i></span>
    </p>
     </div>
   </div>
   <div class="content-header" >
        <a href="/home"><img class="logo1" src="{{ asset('image/logo11.jpg') }}" alt="" class="img1"></a>

        <div class="header">
            <a href="/home"><img class="logo" src="{{ asset('image/logo11.jpg') }}" alt="" class="img1"></a>
            
            <ul class="nav">
                  <li class="dropdown">
                <a href="#" class="nav-1 dropdown-toggle" >
                    {{trans('home.services')}}   
                    <i class="fas fa-chevron-down dropdown-icon" style="margin-left:5px;"></i>
                </a>
                <ul class="dropdown-menu">
                      <li><a href="/services" class="dropdown-item">{{trans('home.Deep_cleaning')}}</a></li>
                    <li><a href="/House_cleaning" class="dropdown-item">{{trans('home.House_cleaning')}}</a></li>
                    <li><a href="/Gym_cleaning" class="dropdown-item">{{trans('home.Gym_Cleaning')}}</a></li>
                    <li><a href="/Office_cleaning" class="dropdown-item">{{trans('home.Office_Cleaning')}}</a></li>
                </ul>
            </li>
                <li ><a href="/gallery" class="nav-1">{{trans('home.gallery')}}</a></li>
                
             
             <li><a href="/about" class="nav-1">{{trans('home.About_Us')}}</a></li>
                <li><a href="/contact" class="nav-1">{{trans('home.contact')}}</a></li>
                 <li> <div class="language-switcher">
                    @if(app()->getLocale() == 'ar')
                        <a href="{{ route('lang.switch', ['lang' => 'en']) }}" class="lang-btn">
                            {{trans('home.english')}}
                        </a>
                    @else
                        <a href="{{ route('lang.switch', ['lang' => 'ar']) }}" class="lang-btn">
                            {{trans('home.arabic')}}
                        </a>
                    @endif
                </div></li>
                <li><a href="/home"><span class="z">z</span></a></li>
                <li>
                    <div class="search-container">
                        <a href="#" class="nav-1 search-toggle"><i class="fas fa-search"></i></a>
                        <div class="search-bar">
                            <input type="text" class="search-input" placeholder="Search...">
                            <button class="search-submit"><i class="fas fa-search"></i></button>
                            <button class="search-close"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <button class="btn-header" onclick="btnHeader()">
        <i class="fas fa-bars"></i>
    </button>
    <style>
          
    /* تنسيقات القائمة المنسدلة */
    .dropdown {
        position: relative;
       
    }
    
    .dropdown-toggle {
        display: flex;
        align-items: center;
       margin-right:20px;
    }
    
    .dropdown-icon {
        font-size: 0.8rem;
        transition: transform 0.3s ease;
    }
    
    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        background-color: white;
        min-width: 200px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border-radius: 5px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 1000;
        padding: 10px 0;
    }
    
    .dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    .dropdown:hover .dropdown-icon {
        transform: rotate(180deg);
    }
    
    .dropdown-item {
        display: block;
        padding: 10px 20px;
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .dropdown-item:hover {
        background-color: #f5f5f5;
        color: #86BE41;
    }
    @media (min-width: 1066px) {
    .dropdown {
        margin-top: -10px;
    }
}
    /* تحسينات للجوال */
    @media (max-width: 1065px) {
        .top-nav{
            display: none;
        }
        .nav li{
            text-align:center;
        }
      
        /* تعديلات للقائمة المنسدلة على الجوال */
        .dropdown-menu {
            position: static;
            opacity: 1;
            visibility: visible;
            transform: none;
            box-shadow: none;
            background-color: transparent;
            padding-left: 20px;
            display: none;
        }

        
        .dropdown.active .dropdown-menu {
            display: block;
        }
        
        .dropdown.active .dropdown-icon {
            transform: rotate(180deg);
        }
    }
        .top-nav{
            display: flex;
            justify-content:space-between;
          background:#adc0e789;
            margin-bottom: 3px;
        }
        .social-links{
       
            margin:0;
             margin-right:100px;

        }
        .social-link-n{
            width: 25px;
            height: 25px;
             color:green;
            padding: 0;
            margin-left:20px;
           
        }
        .social-link-n:hover{
            color:#86BE41;
        }
        .phone{
            color:green;
             margin-right:20px;

        }
         .email{
            color:green;
             margin-left:20px;
         }
          @media (max-width: 1066px) {
         .top-nav{
            display: none;
         }
          }

    </style>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // الحصول على جميع القوائم المنسدلة وأزرار التبديل
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    const dropdowns = document.querySelectorAll('.dropdown');
    
    // إضافة حدث النقر لكل زر تبديل
    dropdownToggles.forEach((toggle, index) => {
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 1066) {
                e.preventDefault();
                // تبديل حالة القائمة المنسدلة المقابلة
                dropdowns[index].classList.toggle('active');
                
                // إغلاق القوائم الأخرى إذا كانت مفتوحة
                dropdowns.forEach((dropdown, i) => {
                    if (i !== index && dropdown.classList.contains('active')) {
                        dropdown.classList.remove('active');
                    }
                });
            }
        });
    });
    
    // إغلاق القائمة المنسدلة عند النقر خارجها (للجوال)
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 1066) {
            let clickedInsideDropdown = false;
            
            // التحقق إذا كان النقر داخل أي قائمة منسدلة
            dropdowns.forEach((dropdown) => {
                if (dropdown.contains(e.target)) {
                    clickedInsideDropdown = true;
                }
            });
            
            // إذا لم يكن النقر داخل قائمة منسدلة، أغلق جميع القوائم
            if (!clickedInsideDropdown) {
                dropdowns.forEach((dropdown) => {
                    dropdown.classList.remove('active');
                });
            }
        }
    });
});
</script>
    