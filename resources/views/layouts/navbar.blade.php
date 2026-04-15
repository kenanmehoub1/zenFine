<div class="content-header" >
     <a href="/home"><img class="logo1" src="{{ asset('image/logo5.jpg') }}" alt="" class="img1"></a>

     <div class="header">
         <a href="/home"><img class="logo" src="{{ asset('image/logo5.jpg') }}" alt="" class="img1"></a>
         
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
          <li>
 <div class="language-switcher">
  @if(app()->getLocale() == 'ar')
 <a href="{{ route('lang.switch', ['lang' => 'en']) }}" class="lang-btn">
     <span class="fi fi-us fis" style="border-radius: 3px;"></span>
     {{trans('home.english')}}
 </a>
@else
 <a href="{{ route('lang.switch', ['lang' => 'ar']) }}" class="lang-btn">
     <span class="fi fi-ae fis" style="border-radius: 3px;"></span>
     {{trans('home.arabic')}}
 </a>
@endif
 </div>
</li>
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
     
     .theme-toggle {
         border: none;
         background: transparent;
         color: inherit;
         cursor: pointer;
         margin-left: 12px;
         padding: 6px;
         font-size: 1.1rem;
         transition: color 0.2s ease, transform 0.2s ease;
     }
     .theme-toggle:hover {
         color: #86BE41;
         transform: scale(1.05);
     }
     .dark-theme {
         --page-bg: #121212;
         --page-color: #f5f5f5;
         --panel-bg: #1d1d1d;
         --panel-border: #333;
     }
     body.dark-theme {
         background-color: var(--page-bg);
         color: var(--page-color);
     }
     body.dark-theme .content-header,
     body.dark-theme .nav li a,
     body.dark-theme .dropdown-menu {
         background-color: var(--panel-bg);
         color: var(--page-color);
         border-color: var(--panel-border);
     }
     body.dark-theme .nav li a,
     body.dark-theme .nav-1,
     body.dark-theme .dropdown-item {
         color: #e8e8e8;
     }
     body.dark-theme .search-input,
     body.dark-theme .dropdown-menu {
         background: #2b2b2b;
         color: #f0f0f0;
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

 // وضعية النهاري/الليلي
 const themeToggleBtn = document.getElementById('theme-toggle-btn');
 const currentTheme = localStorage.getItem('site-theme');

 function applyTheme(theme) {
     if (theme === 'dark') {
         document.body.classList.add('dark-theme');
         themeToggleBtn.innerHTML = '<i class="fas fa-sun"></i>';
         themeToggleBtn.title = 'انتقال إلى النهاري';
     } else {
         document.body.classList.remove('dark-theme');
         themeToggleBtn.innerHTML = '<i class="fas fa-moon"></i>';
         themeToggleBtn.title = 'انتقال إلى الليلي';
     }
     localStorage.setItem('site-theme', theme);
 }

 if (currentTheme === 'dark') {
     applyTheme('dark');
 } else if (currentTheme === 'light') {
     applyTheme('light');
 } else {
     // افتراضي على وضع الجهاز
     const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
     applyTheme(prefersDark ? 'dark' : 'light');
 }

 themeToggleBtn.addEventListener('click', function() {
     const isDark = document.body.classList.contains('dark-theme');
     applyTheme(isDark ? 'light' : 'dark');
 });
});
</script>