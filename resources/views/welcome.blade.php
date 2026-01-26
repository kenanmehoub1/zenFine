<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZenLife Technical Services LLC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
           background: #E2E2E2;
            color: #333;
            line-height: 1.6;
        }
        .container{
             background: white;
             min-height: 100vh;
             margin: 1.5rem;
             border:none;
             border-radius: 4px;  
             border-radius: 4px;
             display: flex;
             flex-direction: column;
        }
 
        .header{
            margin-top: 1rem;
            margin-right: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }   
        
        .logo{
            width: 200px;
            height: 100px;
            margin-left: 2rem;
        }
        
        .logo1{
            display: none; 
        }
        
        .nav{
            display: flex;
            justify-content: space-between;
        }
        
        .nav li{
            margin-left: 2rem;
            list-style-type: none;
        }     
        
        .nav a{
            color: #434140ff;
            text-decoration: none;
        }
        
        .nav-1{
            color: #434140ff;
            text-decoration: none;
            padding: 10px 15px;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-1:hover {
            color: #3EA997;
        }

        .nav-1::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: #3EA997;
            bottom: 0;
            left: 0;
            transition: all 0.3s ease;
        }

        .nav-1:hover::after {
            width: 100%; /* خط كامل العرض */
        }
        
        .z{
            background: #3EA997; 
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        /*button menu */
        .btn-header{
            display: none;
        }
        /*button menu --*/
        
        /* شريط البحث */
        .search-container {
            position: relative;
        }
        
        .search-bar {
            position: absolute;
            top: 100%;
            right: 0;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
        }
        
        .search-bar.active {
            width: 300px;
            height: 50px;
            opacity: 1;
            visibility: visible;
        }
        
        .search-input {
            width: 100%;
            height: 100%;
            border: none;
            background: transparent;
            padding: 0 50px 0 20px;
            font-size: 16px;
            color: #333;
            outline: none;
        }
        
        .search-input::placeholder {
            color: #888;
        }
        
        .search-close {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #888;
            font-size: 18px;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .search-close:hover {
            color: #3EA997;
        }
        
        .search-submit {
            position: absolute;
            right: 45px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #3EA997;
            font-size: 18px;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .search-submit:hover {
            color: #2a7a6a;
        }
        
        /* التكيف مع الشاشات الصغيرة */
        @media (max-width: 1063px) {
            .search-bar.active {
                width: 250px;
            }
        }
        
        @media (max-width: 768px) {
            .search-bar.active {
                width: 220px;
                height: 45px;
            }
        }
        
        @media (max-width: 500px) {
            .search-bar.active {
                width: 180px;
                height: 42px;
            }
            
            .search-input {
                font-size: 14px;
                padding: 0 45px 0 15px;
            }
            
            .search-close, .search-submit {
                font-size: 16px;
            }
            
            .search-close {
                right: 12px;
            }
            
            .search-submit {
                right: 38px;
            }
        }
        
        @media (max-width: 400px) {
            .search-bar.active {
                width: 160px;
                height: 40px;
            }
        }
        /* نهاية شريط البحث */
        
        /* تنسيق نتائج البحث */
        .search-highlight {
            background-color: #ffeb3b;
            padding: 2px 4px;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }
        
        .search-highlight.active {
            background-color: #ff9800;
            animation: pulse 1.5s infinite;
        }
        
        @keyframes pulse {
            0% { background-color: #ff9800; }
            50% { background-color: #ffeb3b; }
            100% { background-color: #ff9800; }
        }
        
        .search-no-results {
            text-align: center;
            padding: 20px;
            color: #888;
            font-style: italic;
        }
             
        .content{
            background: #DEDBD4; 
        }
        
        .one{
            background-image: url('{{ asset('pp.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            min-height: 900px;
            height: auto;
            display: flex;
            justify-content: center;
            align-items:  flex-end;
            position: relative;
        }

        .blur{
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            width: 35%;
            height: 200px;
            margin-bottom: 50px;
            display: block;
            justify-content: center;
            align-items: center;
            color: #282624ff;
            text-align: center;
        }
        
        .blur-btn{
            margin-top:4%;
        }
        
        .blur-btn a{
            margin:4%;
            padding: 2% 4%;
            text-decoration: none;
            background:red;
            border-radius:17px;
        }
        
        .blur-btn a:first-child:hover {
            background: #3EA997;
            box-shadow: 0 3px 40px #4CAF9A;
        }

        .blur-btn a:last-child:hover {
            background: #4CAF9A;
            color: white;
            box-shadow: 0 3px 40px #4CAF9A;
        }
        
        .two{
            background-image: url('{{ asset('mmm.jpg') }}');
            background-size: contain;
            background-repeat: no-repeat;
            width: 100%;
            height: 60vw;
            
            display: flex;
            justify-content:space-evenly;
            align-items:  flex-start;
            position: relative;
        }

        .two-post1{
            background-image: url('{{ asset('nnn.jpg') }}');
            background-size: contain;
            margin-top: 1rem;
            background-repeat: no-repeat;
            width: 22%;
            height: 12.3vw;
            border-radius: 10px;
            transition: transform 0.3s ease;
            display:flex;
            justify-content:center;
            align-items:  center;
        }
        
        .two-post1:hover {
            transform: translateY(-5px);
            box-shadow: 0 3px 40px #4CAF9A;
        }
        
        .two-post2{
            background-image: url('{{ asset('zzz.jpg') }}');
            background-size: contain;
            margin-top: 1rem;
            background-repeat: no-repeat;
            width:22%;
            height: 12.3vw;
            border-radius:10px;
            transition: transform 0.3s ease;
            display:flex;
            justify-content:center;
            align-items:  center;
        }
        
        .two-post2:hover {
            transform: translateY(-5px);
            box-shadow: 0 3px 40px #4CAF9A;
        }
        
        .two-post{
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: clamp(14px, 2vw, 18px);
            display: inline-block;
            width: 100%;
            text-align: center;
        }
        
        /* محتوى إضافي للبحث */
        .page-content {
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .section {
            margin-bottom: 60px;
        }
        
        .section h2 {
            color: #3EA997;
            margin-bottom: 20px;
            font-size: 28px;
        }
        
        .section p {
            margin-bottom: 15px;
            line-height: 1.8;
        }
        
        /* خاتمة الموقع */
        .footer {
            background: #434140;
            color: white;
            padding: 50px 0 20px;
            margin-top: 40px;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0 40px;
        }
        
        .footer-section {
            flex: 1;
            min-width: 250px;
            margin-bottom: 30px;
            padding: 0 20px;
        }
        
        .footer-section h3 {
            color: #3EA997;
            margin-bottom: 20px;
            font-size: 22px;
        }
        
        .footer-section p {
            line-height: 1.8;
            margin-bottom: 20px;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #3EA997;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background: #2a7a6a;
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid #555;
            max-width: 1200px;
            margin: 30px auto 0;
            padding: 30px 40px 0;
        }
        
        /* التكيف مع الشاشات الصغيرة للمحتوى الإضافي */
        @media (max-width: 1063px) {
            .page-content {
                padding: 30px 20px;
            }
            
            .section h2 {
                font-size: 24px;
            }
            
            .section p {
                font-size: 15px;
            }
        }
        
        @media (max-width: 768px) {
            .page-content {
                padding: 20px 15px;
            }
            
            .section {
                margin-bottom: 40px;
            }
            
            .section h2 {
                font-size: 22px;
                margin-bottom: 15px;
            }
            
            .section p {
                font-size: 14px;
                line-height: 1.6;
            }
            
            .footer-content {
                flex-direction: column;
                padding: 0 20px;
            }
            
            .footer-section {
                padding: 0 10px;
                margin-bottom: 30px;
            }
            
            .social-links {
                justify-content: center;
            }
        }
        
        @media (max-width: 500px) {
            .page-content {
                padding: 15px 10px;
            }
            
            .section {
                margin-bottom: 30px;
            }
            
            .section h2 {
                font-size: 20px;
            }
            
            .section p {
                font-size: 13px;
            }
            
            .footer {
                padding: 30px 0 15px;
            }
            
            .footer-section h3 {
                font-size: 18px;
            }
            
            .footer-section p {
                font-size: 14px;
            }
            
            .social-link {
                width: 35px;
                height: 35px;
            }
            
            .footer-bottom {
                padding: 20px 15px 0;
            }
        }

        @media (max-width: 1281px) {
            .one{
                background-size: contain;
                min-height: 738px;         
            }
            
            .blur{ 
                font-size: 15px;
            }
            
            .btn-header:hover {
                box-shadow: 
                    inset 0 0 10px rgba(76, 175, 154, 0.2),
                    0 0 15px rgba(76, 175, 154, 0.5);
            }
        }              
        
        @media (max-width: 1100px) {
            .one{
                background-size: contain;
                min-height: 620px;         
            }
            
            .blur{ 
                font-size: 12px;
                height: 160px;
            }
        }

        @media (max-width: 1063px){
            .content-header{
                display: flex;
                justify-content: space-between;
                position: relative;
                transition: all 0.3s ease;
            }
            
            .header{
                margin-top: 1rem;
                height: 0;
                display: block;
                text-align: right;
                overflow: hidden;
                transition: all 0.3s ease;
                opacity: 0;
                position: absolute;
                top: 100%;
                right: 0;
                z-index: 1000;
            }

            .header.show{
                height: 310px;
                width: 250px;
                background: rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.3);
                border-radius: 10px;
                opacity: 1;
                transition: all 0.3s ease;
            }
            
            .nav{
                margin-right: 4%;
                margin-top: 4px;
                display: block;
                justify-content: space-between;
                align-items: center;
            }
            
            .nav li{
                margin: 0.5rem;
                list-style-type: none;
            }
            
            .nav a{
                display: inline-block;
                text-align: center;
            }

            .nav-1:hover {
                color: white;
            }
            
            .logo{
                display: none; 
            }
            
            .logo1{
                display: block;
                width: 150px;
                height: 75px;
            }

            .btn-header{
                position: absolute;
                top: 2rem;
                right: 2rem;
                width: 3rem;
                height: 3rem;
                border:none;
                cursor: pointer;
                transition: all 0.3s ease;
                z-index: 10;
                display: block;
                background: white;
            }

            .one{
                background-size: contain;
                min-height: 595px;         
            }
        }
        
        /*nest hub */
        @media (max-width: 1024px) {
            .one{
                min-height: 585px; 
            }
        }

        @media (max-width: 900px) {
            .one{
                min-height: 500px;  
            }
            
            .blur{ 
                font-size: 10px;
                height: 140px; 
            }
        }
        
        @media (max-width: 800px) {
            .one{
                min-height: 440px;         
            }
            
            .blur{ 
                font-size: 9px;
                height: 120px; 
            }
        }
        
        @media (max-width: 700px) {
            .one{
                min-height: 380px;         
            }
            
            .blur{ 
                font-size: 8px;
                height: 100px; 
                width: 40%;
            }
        }
        
        @media (max-width: 600px) {
            .one{
                min-height: 315px;         
            }
            
            .blur{ 
                font-size: 6px;
                height: 80px; 
                width: 45%;
            }
        }
        
        @media (max-width: 550px) {
            .one{
                min-height: 290px;  
            }
            
            .blur{ 
                font-size: 6px;
                height: 80px; 
                width: 50%;
            }
        }
        
        @media (max-width: 500px) {
            .content-header{
                display: flex;
                justify-content: space-between;
                position: relative;
                transition: all 0.3s ease;
            }

            .nav li{
                margin: 0.5rem;
                list-style-type: none;
            }     
            
            .nav a{
                display: inline-block;
                text-align: center;
            }
            
            .logo{
                display: none; 
            }
            
            .logo1{
                display: block;
                width: 150px;
                height: 75px;
            }

            .btn-header{
                position: absolute;
                top: 2rem;
                right: 2rem;
                width: 3rem;
                height: 3rem;
                border:none;
                cursor: pointer;
                transition: all 0.3s ease;
                z-index: 10;
                display: block;
                background: white;
            }

            .one{
                min-height: 250px;  
            }
            
            .blur{ 
                font-size: 6px;
                height: 80px; 
                width: 50%;
            }
        }
        
        @media (max-width: 400px) {
            .one{
                min-height: 200px;         
            }
            
            .blur{ 
                font-size: 6px;
                height: 80px; 
                width: 60%;
            }
            
            .header.show{
                width: 200px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content-header">
        <a href="#"><img class="logo1" src="{{ asset('zen.jpg') }}" alt="" class="img1"></a>

        <div class="header">
            <a href="#"><img class="logo" src="{{ asset('zen.jpg') }}" alt="" class="img1"></a>
            
            <ul class="nav">
                <li><a href="#" class="nav-1">Services</a></li>
                <li><a href="#" class="nav-1">Gallery</a></li>
                <li><a href="#" class="nav-1">Testimonials</a></li>
                <li><a href="#" class="nav-1">Contact</a></li>
                <li><a href="#"><span class="z">z</span></a></li>
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
    
    <div class="content">
        <div class="one">
            <div class="blur">
                <h1>Let Peace and Happiness</h1>
                <h1>Enter Your Life.</h1>
                <div class="blur-btn">
                    <a href="#" style="color:white; background:#4CAF9A;">Explore Cleaning</a>
                    <a href="#" style="color:#4CAF9A; background:#E3EEEA; border:solid 3px #4CAF9A;">Discover Decor</a>
                </div>
            </div>
        </div>
        <div class="two">
            <div class="two-post1"><a class="two-post" href="#">Create Your Sanctuar</a></div>
            <div class="two-post2"><a class="two-post" href="#">Elevate Your Space</a></div>
        </div>
        
        <!-- محتوى إضافي للبحث -->
        <div class="page-content">
            <div class="section">
                <h2>Our Services</h2>
                <p>At ZenLife Technical Services, we offer a wide range of professional cleaning and maintenance services designed to bring peace and tranquility to your living spaces. Our team of experts is dedicated to providing exceptional quality and attention to detail in every project we undertake.</p>
                <p>From residential cleaning to commercial maintenance, our services are tailored to meet your specific needs and exceed your expectations. We use eco-friendly products and advanced techniques to ensure a healthy environment for you and your family.</p>
            </div>
            
            <div class="section">
                <h2>About Us</h2>
                <p>Founded with a vision to transform spaces into havens of peace and harmony, ZenLife Technical Services has been serving customers with dedication and professionalism. Our mission is to enhance the quality of life by creating clean, organized, and beautiful environments.</p>
                <p>We believe that a well-maintained space contributes significantly to mental clarity and overall wellbeing. That's why we approach every project with mindfulness and precision, ensuring results that not only meet but exceed your expectations.</p>
            </div>
            
            <div class="section">
                <h2>Why Choose Us</h2>
                <p>With years of experience in the industry, our team brings expertise and reliability to every job. We understand that your home or office is a reflection of your values, and we treat every space with the respect and care it deserves.</p>
                <p>Our commitment to using sustainable practices and environmentally friendly products sets us apart. We continuously train our staff in the latest cleaning techniques and safety protocols to ensure the highest standards of service.</p>
            </div>
        </div>
        
        <!-- خاتمة الموقع -->
        <footer class="footer">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About ZenLife</h3>
                    <p>ZenLife Technical Services is dedicated to transforming your spaces into peaceful sanctuaries. With our professional cleaning and decor services, we bring harmony and tranquility to your environment.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Peace Street, Serenity City</p>
                    <p><i class="fas fa-phone"></i> +1 234 567 8900</p>
                    <p><i class="fas fa-envelope"></i> info@zenlifeservices.com</p>
                </div>
                
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <p><a href="#" style="color: #3EA997; text-decoration: none;">Home</a></p>
                    <p><a href="#" style="color: #3EA997; text-decoration: none;">Services</a></p>
                    <p><a href="#" style="color: #3EA997; text-decoration: none;">Gallery</a></p>
                    <p><a href="#" style="color: #3EA997; text-decoration: none;">Contact</a></p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 ZenLife Technical Services LLC. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
</div>

<script>
    // وظيفة زر القائمة
    function btnHeader(event) {
        const btn = document.querySelector('.header');
        btn.classList.toggle('show');
        event.stopPropagation(); // منع انتشار الحدث
    }

    // إغلاق القائمة عند النقر خارجها
    document.addEventListener('click', function(event) {
        const btn = document.querySelector('.header');
        const headerBtn = document.querySelector('.btn-header');
        
        // إذا كان النقر خارج القائمة وخارج زر القائمة
        if (!event.target.closest('.header') && !event.target.closest('.btn-header')) {
            btn.classList.remove('show');
        }
    });

    // منع إغلاق القائمة عند النقر داخلها
    document.querySelector('.header').addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // وظيفة شريط البحث
    document.addEventListener('DOMContentLoaded', function() {
        const searchToggle = document.querySelector('.search-toggle');
        const searchBar = document.querySelector('.search-bar');
        const searchClose = document.querySelector('.search-close');
        const searchSubmit = document.querySelector('.search-submit');
        const searchInput = document.querySelector('.search-input');
        let currentHighlightIndex = -1;
        let searchResults = [];
        
        // فتح شريط البحث
        searchToggle.addEventListener('click', function(e) {
            e.preventDefault();
            searchBar.classList.add('active');
            setTimeout(() => {
                searchInput.focus();
            }, 300);
        });
        
        // إغلاق شريط البحث
        searchClose.addEventListener('click', function() {
            searchBar.classList.remove('active');
            searchInput.value = '';
            clearHighlights();
        });
        
        // البحث عند النقر على زر البحث
        searchSubmit.addEventListener('click', function() {
            performSearch();
        });
        
        // البحث عند الضغط على Enter
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
        
        // إغلاق شريط البحث عند النقر خارجها
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.search-container') && searchBar.classList.contains('active')) {
                searchBar.classList.remove('active');
                searchInput.value = '';
                clearHighlights();
            }
        });
        
        // منع إغلاق شريط البحث عند النقر داخله
        searchBar.addEventListener('click', function(e) {
            e.stopPropagation();
        });
        
        // وظيفة البحث
        function performSearch() {
            const searchTerm = searchInput.value.trim().toLowerCase();
            
            if (!searchTerm) {
                return;
            }
            
            // إغلاق شريط البحث بعد البحث
            searchBar.classList.remove('active');
            
            // مسح التظليلات السابقة
            clearHighlights();
            
            // البحث في المحتوى
            searchInContent(searchTerm);
            
            // إعادة تعيين مؤشر النتائج
            currentHighlightIndex = -1;
            
            // الانتقال إلى أول نتيجة
            navigateToNextResult();
        }
        
        // البحث في محتوى الصفحة
        function searchInContent(searchTerm) {
            const contentElements = document.querySelectorAll('.page-content p, .page-content h2');
            searchResults = [];
            
            contentElements.forEach(element => {
                const originalText = element.innerHTML;
                const textContent = element.textContent.toLowerCase();
                
                if (textContent.includes(searchTerm)) {
                    // إنشاء تعبير منتظم للبحث مع تجاهل حالة الأحرف
                    const regex = new RegExp(searchTerm, 'gi');
                    const highlightedText = originalText.replace(regex, match => 
                        `<span class="search-highlight">${match}</span>`
                    );
                    
                    element.innerHTML = highlightedText;
                    
                    // جمع جميع العناصر المظللة حديثاً
                    const highlights = element.querySelectorAll('.search-highlight');
                    highlights.forEach(highlight => {
                        searchResults.push(highlight);
                    });
                }
            });
            
            // إذا لم توجد نتائج
            if (searchResults.length === 0) {
                showNoResultsMessage();
            }
        }
        
        // الانتقال إلى النتيجة التالية
        function navigateToNextResult() {
            if (searchResults.length === 0) return;
            
            // إزالة التظليل النشط من النتيجة الحالية
            if (currentHighlightIndex >= 0) {
                searchResults[currentHighlightIndex].classList.remove('active');
            }
            
            // الانتقال إلى النتيجة التالية
            currentHighlightIndex = (currentHighlightIndex + 1) % searchResults.length;
            
            // إضافة التظليل النشط للنتيجة الجديدة
            searchResults[currentHighlightIndex].classList.add('active');
            
            // التمرير إلى النتيجة
            searchResults[currentHighlightIndex].scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
        
        // إظهار رسالة عدم وجود نتائج
        function showNoResultsMessage() {
            const pageContent = document.querySelector('.page-content');
            const noResults = document.createElement('div');
            noResults.className = 'search-no-results';
            noResults.textContent = `No results found for "${searchInput.value}"`;
            pageContent.appendChild(noResults);
            
            // إزالة الرسالة بعد 3 ثوان
            setTimeout(() => {
                if (noResults.parentNode) {
                    noResults.parentNode.removeChild(noResults);
                }
            }, 3000);
        }
        
        // مسح جميع التظليلات
        function clearHighlights() {
            const highlights = document.querySelectorAll('.search-highlight');
            highlights.forEach(highlight => {
                const parent = highlight.parentNode;
                parent.replaceChild(document.createTextNode(highlight.textContent), highlight);
                parent.normalize();
            });
            
            searchResults = [];
            currentHighlightIndex = -1;
        }
        
        // إضافة إمكانية التنقل بين النتائج باستخدام مفاتيح الأسهم
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                if (searchResults.length > 0) {
                    e.preventDefault();
                    navigateToNextResult();
                }
            }
        });
    });
</script>
</body>
</html>