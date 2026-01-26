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
           background: #EAEAEA;
            color: #3D523B;
            line-height: 1.6;
        }
        .container{
             background: #EAEAEA;
             min-height: 100vh;
             margin:0;
             border:none;
             border-radius: 4px;  
             border-radius: 4px;
             display: flex;
             flex-direction: column;
        }
        
         /* التعديلات الأساسية لجعل الـ Header يتحرك */
        .content-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: white;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0);
        }
        
        /* إضافة ظل عند التمرير */
        .content-header.scrolled {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header{
            margin-top: 0rem;
            margin-right: 0rem;
            height: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background:#EAEAEA;
            
        }   
        
        .logo{
            width: 120px;
            height: 80px;
            margin-left: 2rem;
             margin-top: 1px;
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
            color:  #568B3E;
            text-decoration: none;
        }
        
        .nav-1{
            color: #3D523B;
            text-decoration: none;
            padding: 10px 15px;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-1:hover {
            color: #86BE41;
        }

        .nav-1::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: #2E6A92;
            bottom: 0;
            left: 0;
            transition: all 0.3s ease;
        }

        .nav-1:hover::after {
            width: 100%; /* خط كامل العرض */
        }
        
        .z{
            background: #568B3E; 
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
        .z:hover{
            background: #4fbd1cff; 
             box-shadow: 0px 0px 16px rgba(12, 107, 6, 0.8);
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
            color: #3D523B;
            outline: none;
        }
        
        .search-input::placeholder {
            color: #3D523B;
        }
        
        .search-close {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #3D523B;
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
            background-color: #86BE41;
            padding: 2px 4px;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }
        
        .search-highlight.active {
            background-color: #86BE41;
            animation: pulse 1.5s infinite;
        }
        
        @keyframes pulse {
            0% { background-color: #86BE41; }
            50% { background-color: #568B3E; }
            100% { background-color: #86BE41; }
        }
        
        .search-no-results {
            text-align: center;
            padding: 20px;
            color: #888;
            font-style: italic;
        }
             
        .content{
          
                  background: linear-gradient(#adc0e789, #bfe7adff);

        }
        
        .one{
           background-image: url('{{ asset('image/man2.jpg') }}');
background-size: contain;
background-repeat: no-repeat;
background-position: center center;

            width: 100%;
            min-height: 900px;
            height: auto;
            display: flex;
            justify-content: center;
            align-items:  flex-end;
            position: relative;
           
        }

        .blur{
            background: rgba(84, 208, 35, 0.2);
            backdrop-filter: blur(7px);
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
         background:#86BE41;
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
            background-image: url('{{ asset('image/car1.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 60vw;
            
            display: flex;
            justify-content:space-evenly;
            align-items:  flex-start;
            position: relative;
        }

        .two-post1{
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), 
                url('{{ asset('image/man2.jpg') }}');
   
            background-size: cover;
            margin-top: 5rem;
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
             background-image:url('{{ asset('image/man2.jpg') }}');
        }
        
        .two-post2{
             background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), 
                url('{{ asset('image/girl1.jpg') }}');
            background-size: cover;
            margin-top: 5rem;
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
            background-image: url('{{ asset('image/girl1.jpg') }}');
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
            background: #192119ff;
            color: white;
            padding: 50px 0 20px;
           
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
              margin: 0 auto !important;
             
        }
      
        .social-link-1 {
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
        
        .social-link-1:hover {
            background: #2618e2ff;
            transform: translateY(-3px);
        }
      .social-link-2 {
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
        
        .social-link-2:hover {
            background: #119fdcdd;
            transform: translateY(-3px);
        }
          .social-link-3 {
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
        
        .social-link-3:hover {
            background: #f50fbfdd;
            transform: translateY(-3px);
        }
          .social-link-4 {
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
        
        .social-link-4:hover {
            background: #e21818ff;
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
          .footer-section p a{
           color: #3EA997;
            text-decoration: none;
          transition: all 0.3s ease;  
           display: inline-block;
        }
        .footer-section p a:hover{
         color:#17f426ff;
         transform: translateY(-3px);
        }
        /* التكيف مع الشاشات الصغيرة للمحتوى الإضافي */
     
       @media (max-width: 1281px) {
            .one{
               
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
        
            
            .blur{ 
                font-size: 12px;
                height: 160px;
            }
              .container{
          
             margin: 0rem;
          
        }
        
        }
     
     
     
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
      
      

        @media (max-width: 1063px){
            .content-header{
                display: flex;
                justify-content: space-between;
                position: relative;
                transition: all 0.3s ease;
            }
             .content-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: #EAEAEA;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0);
        }
        
        /* إضافة ظل عند التمرير */
        .content-header.scrolled {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
            .header{
                margin-top: 1rem;
                height: 80;
                display: block;
                text-align: right;
                overflow: auto;
                transition: all 0.3s ease;
                opacity: 0;
                position: absolute;
                top: 100%;
                right: 0;
                z-index: 1000;
            }

            .header.show{
                height: 350px;
                width: 300px;
                background: rgba(255, 255, 255, 0.9);
               
                border: 1px solid rgba(45, 42, 42, 0.3);
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
                color: #86BE41;
            }
            
            .logo{
                display: none; 
            }
            
            .logo1{
                display: block;
                width: 100px;
                height: 75px;
                margin-left:2rem;
            }

            .btn-header{
                 position: fixed;
                top: 0.5rem;
                right: 2rem;
                width: 3rem;
                height: 3rem;
                border:none;
                border-radius: 18px;
                cursor: pointer;
                transition: all 0.3s ease;
                z-index: 1100;
                display: block;
                background: #5F8987;
            }

            .one{
           
        }
        
        /*nest hub */
        @media (max-width: 1024px) {
            .one{
                min-height: 585px; 
            }
        }

        @media (max-width: 900px) {
            .one{
                min-height: 520px;  
            }
            
            .blur{ 
                font-size: 10px;
                height: 140px; 
            }
        }
        
        @media (max-width: 800px) {
            .one{
                min-height: 460px;         
            }
            
            .blur{ 
                font-size: 9px;
                height: 120px; 
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
         @media (max-width: 700px) {
            .one{
                background-size: cover;
                min-height: 400px;         
            }
            
            .blur{ 
                font-size: 8px;
                height: 100px; 
                width: 40%;
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

        
        @media (max-width: 600px) {
            .one{
                min-height: 335px;         
            }
            
            .blur{ 
                font-size: 6px;
                height: 80px; 
                width: 45%;
            }
        }
        
        @media (max-width: 550px) {
            .one{
                min-height: 310px;  
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
                      .content-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: #EAEAEA;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0);
        }
        
        /* إضافة ظل عند التمرير */
        .content-header.scrolled {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
                width: 100px;
                height: 75px;
                margin-left:2rem;
            }

            .btn-header{
              position: fixed;
                top: 0.5rem;
                right: 2rem;
                width: 3rem;
                height: 3rem;
                border:none;
                border-radius: 18px;
                cursor: pointer;
                transition: all 0.3s ease;
                z-index: 1100;
                display: block;
                background: #5F8987;
            }

            .one{
                min-height: 290px;  
            }
            
            .blur{ 
                font-size: 6px;
                height: 80px; 
                width: 50%;
            }
        }
        
        @media (max-width: 400px) {
            .one{
                min-height: 300px;         
            }
              .two{
                min-height: 300px;         
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