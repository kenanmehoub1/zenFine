@extends("index")
@section('content')
<style>
    .one1{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto 40px;
    }
    .one1 img{
        width: 60%;
        margin: 0 auto;
    }
    
    /* حاوية زر التواصل */
    .contact-section {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 50px auto;
        padding: 40px 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-width: 800px;
    }
    
    /* عنوان تواصل معنا */
    .contact-title {
        font-size: 28px;
        color: #2c3e50;
        margin-bottom: 15px;
        text-align: center;
        font-weight: 700;
        position: relative;
        padding-bottom: 15px;
    }
    
    .contact-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, #3498db, #2ecc71);
        border-radius: 2px;
    }
    
    /* عرض الرقم */
    .phone-number {
        font-size: 24px;
        color: #e74c3c;
        margin: 20px 0 30px;
        padding: 15px 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        font-weight: 700;
        direction: ltr;
        display: inline-block;
    }
    
    /* تصميم الزر */
    .contact-btn {
        background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        color: white;
        padding: 18px 45px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: bold;
        font-size: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .contact-btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(52, 152, 219, 0.4);
        background: linear-gradient(135deg, #2980b9 0%, #1f6396 100%);
    }
    
    .contact-btn:active {
        transform: translateY(-2px);
    }
    
    /* تأثير زراعي على الزر */
    .contact-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: 0.5s;
    }
    
    .contact-btn:hover::before {
        left: 100%;
    }
    
    .contact-btn i {
        font-size: 22px;
    }
    
    /* أيقونة الهاتف */
    .phone-icon {
        animation: ring 2s ease-in-out infinite;
        font-size: 28px;
        margin-left: 10px;
    }
    
    @keyframes ring {
        0%, 100% {
            transform: rotate(0deg);
        }
        10%, 30%, 50%, 70%, 90% {
            transform: rotate(-10deg);
        }
        20%, 40%, 60%, 80% {
            transform: rotate(10deg);
        }
    }
    
    /* لشاشات الهواتف */
    @media (max-width: 768px) {
        .contact-section {
            margin: 30px auto;
            padding: 30px 15px;
            max-width: 95%;
        }
        
        .contact-title {
            font-size: 24px;
        }
        
        .phone-number {
            font-size: 20px;
            padding: 12px 25px;
        }
        
        .contact-btn {
            padding: 16px 35px;
            font-size: 18px;
        }
    }
</style>
<div class="one1">
    <img src="{{ asset('image/new8.jpg') }}" alt="">
</div>
<div class="one1">
    <img src="{{ asset('image/new7.jpg') }}" alt="">
</div>
<div class="one1">
    <img src="{{ asset('image/new6.jpg') }}" alt="">
</div>
<div class="one1">
    <img src="{{ asset('image/new5.jpg') }}" alt="">
</div>
<div class="one1">
    <img src="{{ asset('image/house1.jpg') }}" alt="">
</div>
<div class="one1">
    <img src="{{ asset('image/clean2.jpg') }}" alt="">
</div>

<!-- قسم تواصل معنا -->
<div class="contact-section" style=" direction:{{trans('home.dir')}};">
    <h2 class="contact-title">{{trans('home.contact_title')}}</h2>
    
    <div class="phone-number">
        <span class="phone-icon">📞</span>
        +971 54 596 9516
    </div>
    
    <a href="tel:+971545969516" class="contact-btn">
        <i>📱</i>
       {{trans('home.call_us_title')}}
    </a>
    
    <p style="margin-top: 20px; color: #7f8c8d; text-align: center; font-size: 16px;">
        {{trans('home.work_for_us')}}
    </p>
</div>

@endsection