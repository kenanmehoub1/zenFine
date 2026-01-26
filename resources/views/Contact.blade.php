@extends("index")

@section('content')
                @if(session('success'))
                    <div class="alert-success">
                     {{ trans('home.success_message') }}
                       
                    </div>
                @endif
 <div class="image-section">
            
            <img src="{{asset('image/logo2.jpg')}}" alt="Contact Illustration" class="contact-image">
        </div>
<div class="contact-form-container" style=" direction:{{trans('home.dir')}};">

 

    <div class="contact-wrapper">
        <div class="text">
          <h1>{{trans('home.connect_title')}}</h1>

        <p>{{trans('home.connect_description')}}</p>
        </div>
        
        <div class="contact-form">
            
            <div class="form-header">
                <h2>{{trans('home.send_queries')}}</h2>
                <p>{{trans('home.queries_response')}}</p>
            </div>
                @if(session('error'))
                    <div class="alert-danger">
                        {{ trans('home.error_message') }}
                      
                    </div>
                @endif
            <form method="POST" action="{{ route('contact') }}">
                @csrf
                <div class="form-group">
                    <label for="fullName">{{trans('home.full_name')}}</label>
                    <input type="text" id="fullName" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="{{trans('home.full_name_placeholder')}}"  required>
                </div>
                 @error('full_name')
                 <div class="alert-danger">{{ $message }}</div>
                  @enderror
                <div class="form-group">
                    <label for="businessEmail">{{trans('home.business_email')}}</label>
                    <input type="email" id="businessEmail" name="business_email" value="{{ old('business_email') }}"  class="form-control" placeholder="{{trans('home.email_placeholder')}}" required>
                </div>
                  @error('business_email')
                 <div class="alert-danger">{{ $message }}</div>
                  @enderror
                <div class="form-group">
                    <label for="phoneNumber">{{trans('home.phone_number')}}</label>
                    <input type="tel" id="phoneNumber" name="phone_number" value="{{ old('phone_number') }}"  class="form-control" placeholder="{{trans('home.phone_placeholder')}}">
                </div>
                  @error('phone_number')
                 <div class="alert-danger">{{ $message }}</div>
                  @enderror
                <div class="form-group">
                    <label for="yourMessage">{{trans('home.your_message')}}</label>
                    <textarea id="yourMessage" name="message"  class="form-control" placeholder="{{trans('home.message_placeholder')}}" required>{{ old('message') }}</textarea>
                </div>
                  @error('message')
                 <div class="alert-danger">{{ $message }}</div>
                  @enderror
                <button type="submit" class="submit-btn">{{trans('home.submit_button')}}</button>
            </form>
        </div>

      
    </div>


</div>

<div class="contact-parent" style=" direction:{{trans('home.dir')}};">
    <div class="contact-chiled">
         <div>
             <h1>{{trans('home.head_office_title')}}</h1>  
             <p>{{trans('home.head_office_address')}}</p> 
             <p>{{trans('home.head_office_call')}}</p>
         </div>
          <div>
             <h1>{{trans('home.contact_channels_title')}}</h1>  
            <p>{{trans('home.whatsapp_number')}}</p>
             <p>{{trans('home.call_number1')}}</p>
             <p>{{trans('home.call_number2')}}</p>
              <p>{{trans('home.contact_email')}}</p>
          </div>

    </div>
   <div class="contact-chiled">
            <div>
             <h1>{{trans('home.dubai_branch_title')}}</h1>  
             <p>{{trans('home.dubai_branch_address')}}</p> 
                <P>{{trans('home.dubai_branch_call')}}</P>
         </div>
            <div>
             <h1>{{trans('home.working_hours_title')}}</h1>  
               <P>{{trans('home.booking_hours')}}</P>
               <P>{{trans('home.monday_hours')}}</P>
               <P>{{trans('home.tuesday_hours')}}</P>
               <P>{{trans('home.wednesday_hours')}}</P>
               <P>{{trans('home.thursday_hours')}}</P>
               <P>{{trans('home.friday_hours')}}</P>
               <P>{{trans('home.saturday_hours')}}</P>
               <P>{{trans('home.sunday_hours')}}</P>
                </div>

   </div>
</div>


<div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.4077623808093!2d55.29968912516074!3d25.256865029282267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f4314a24f239b%3A0xc202f77fde46a416!2sKPM%20Global%20Services!5e0!3m2!1sar!2s!4v1769442523171!5m2!1sar!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div class="contact-parent" style=" background:#EAEAEA;">
    <div class="contact-chiled1">
         <div class="logo-end">
             <img width="300px" src="{{asset('image/logo11.jpg')}}" alt="">
         </div>
          <div class="social1">
              <div class="footer-section">
                  
                    <div class="social-links" style="margin-left:100px;">
                        <a href="https://www.facebook.com/share/1QYiQUkMKv/" class="social-link-1" aria-label="{{trans('home.social_facebook')}}"><i class="fab fa-facebook-f" ></i></a>
                        <a href="#" class="social-link-2" aria-label="{{trans('home.social_twitter')}}"><i class="fab fa-x"></i></a>
                        <a href="https://www.instagram.com/zenfine.fpc" class="social-link-3" aria-label="{{trans('home.social_instagram')}}"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link-4" aria-label="{{trans('home.social_youtube')}}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
          </div>

    </div>
   <div class="contact-chiled1" style=" background:#EAEAEA;">
            
             <h1 style=" color:  #3EA997;">{{trans('home.business_details_title')}}</h1> 
             <h2 style=" color:  #3EA997;">{{trans('home.working_hours_subtitle')}}</h2> 
             <p style=" color:  #101111ff;">{{trans('home.working_time')}}</p> 
             <h2 style=" color:  #3EA997;">{{trans('home.address')}}</h2>
         <P style=" color:  #1f2222ff;">{{trans('home.address1')}}</P>
         <h2 style=" color:  #3EA997;">{{trans('home.call_us_title')}}</h2>
             <div style="display:flex;   justify-content: space-evenly;
    align-items: center;">
<a href="tel:+1234567890" class="contact-btn">{{trans('home.phoneNumper1')}}</a>
<a href="tel:+1234567890" class="contact-btn">{{trans('home.phoneNumper2')}}</a>

             </div>

         
           

   </div>
</div>


<style>
    .contact-btn {
  background: #3EA997;
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
    .contact-chiled1{
             display: flex;
  flex-direction: column;
  gap: 0px;
 
  text-align:center;
    width: 50%;
    background:#EAEAEA;
    }
    .logo-end{
       background:#EAEAEA;  
    }
    .social1{
        background:#EAEAEA;
        margin:0 auto;  
    }
.contact-parent{
    display: flex;
    background: linear-gradient(#bfe7adff, #b2cbe2ff );
}
.contact-chiled{
     display: flex;
  flex-direction: column;
  gap: 100px;
  margin:10px;
  text-align:center;
    width: 50%;
    
}
.contact-chiled h1{
    color:#764ba2 ;
}
.contact-chiled p{
     color:black;
}
    .alert-danger{
      
        padding: 5px;
        color:red;
        text-align:center;
    }
  .alert-success{
      
        padding: 5px;
        color:black;
        text-align:center;
        background:#0dc7207a;
         border-radius: 8px;
         margin:0 2rem;
    }
.contact-form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
    padding: 40px 20px;
   
      background: linear-gradient(#bfe7adff, #b2cbe2ff );
}

.contact-wrapper {
    display: flex;
    align-items: center;
    gap: 50px;
    max-width: 1200px;
    width: 100%;
    justify-content: center;
}

.contact-form {
   background: linear-gradient(#b2cbe2ff, #d6cad5ff);
    border: 1px solid rgba(255, 255, 255, 0.1);
   
    padding: 40px;
    width: 100%;
    max-width: 500px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    position: relative;
    flex-shrink: 0;
}

.contact-form::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    background: linear-gradient(45deg, #00FFFF, #00FF00, #00FFFF);
   
    z-index: -1;
    opacity: 0.1;
}



.form-header {
    width: 100%;
    text-align: center;
    margin-bottom: 30px;
    
}

.form-header h2 {
    font-size: 2.2rem;
    background: linear-gradient(45deg, #00FFFF, #162316ff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 10px;
    animation: float 3s ease-in-out infinite;
}

.form-header p {
    color: #0b9b5aff;
    font-size: 1.1rem;
}

.form-group {
    margin-bottom: 25px;
    position: relative;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #0b9b5aff;
    font-weight: 500;
    font-size: 1rem;
}

.form-control {
    width: 100%;
    padding: 15px 20px;
    background: rgba(255, 255, 255, 0.08);
    border: 2px solid rgba(19, 19, 19, 0.1);
    border-radius: 12px;
    color: #333;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.form-control:focus {
    outline: none;
    border-color: #00FFFF;
    background: white;
    box-shadow: 0 0 15px rgba(0, 255, 255, 0.2);
}

.form-group:focus-within label {
    color: #00FF00;
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

.submit-btn {
    width: 100%;
    padding: 16px;
     background: linear-gradient(45deg, #00FFFF, #162316ff);
    border: none;
    border-radius: 12px;
    color: #1a1a1a;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.submit-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 255, 255, 0.3);
}
.text{
    text-align:center;
}
    .image-section {
            width: 50%;
            margin: 0 auto 40px;
           
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(6, 188, 239, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
           
        }
         .contact-image {
            width: 100%;
            height: 40vw;
            display: block;
            object-fit: cover;
        }

        @media (max-width: 1024px) {
      .contact-parent{
    display: block;
      text-align:center;
       }
        .contact-chiled{
             display:block;
              text-align:center;
                justify-content:center ;
                align-items:center;
    }
         .image-section {
            width: 80%;}
         .contact-image {
            height: 60vw;
        }
    }
        @media (max-width: 700px) {
         .image-section {
            width: 100%;}
         .contact-image {
            height: 80vw;
        }
    }
        
       
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Responsive Design - شاشات متوسطة */
@media (max-width: 1024px) {
    .contact-parent {
        display: block;
        text-align: center; /* هذا لتوسيط النصوص */
    }
    
    .contact-chiled {
        width: 100% !important; /* تأكد من أنه يأخذ العرض الكامل */
        margin: 0 auto; /* توسيط العنصر نفسه */
        text-align: center; /* توسيط المحتوى داخله */
    }
    
    .contact-chiled1 {
        display: block;
        width: 100% !important;
        text-align: center;
        margin: 0 auto;
    }
    
    /* إذا كان لديك عناصر flex داخل contact-chiled، أضف: */
    .contact-chiled > div {
        margin: 0 auto;
        text-align: center;
    }
        .contact-btn {

  margin-top:3rem;
    margin-bottom:1rem;
 
  padding: 10px 30px;
  font-size: 0.8rem;

  letter-spacing: 0px;

}
.social-links{
    margin:0 auto!important;
   
    width: fit-content;
}
 
}

/* Responsive Design - أجهزة لوحية */
@media (max-width: 768px) {
    .contact-wrapper {
        flex-direction: column;
        gap: 40px;
    }
    
    .contact-form {
        padding: 30px 25px;
        max-width: 100%;
        margin: 0 20px;
    }
    

    
    .form-header h2 {
        font-size: 1.8rem;
    }
    
    .contact-form-container {
        padding: 30px 0;
    }
}

/* Responsive Design - هواتف */
@media (max-width: 480px) {
    .contact-form {
        padding: 25px 20px;
        margin: 0 15px;
        border-radius: 15px;
    }
    
  
    
    .form-header h2 {
        font-size: 1.6rem;
    }
    
    .form-header p {
        font-size: 1rem;
    }
    
    .form-control {
        padding: 12px 15px;
    }
    
    .submit-btn {
        padding: 14px;
    }
    
    .contact-wrapper {
        gap: 30px;
    }
}

/* Responsive Design - هواتف صغيرة */
@media (max-width: 360px) {
    .contact-form {
        padding: 20px 15px;
        margin: 0 10px;
    }
    
  
    
    .form-header h2 {
        font-size: 1.4rem;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const submitBtn = document.querySelector('.submit-btn');
    const form = document.querySelector('form');
    
    submitBtn.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Simple validation
        const inputs = form.querySelectorAll('input[required], textarea[required]');
        let isValid = true;
        
        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.borderColor = '#ff4757';
            } else {
                input.style.borderColor = 'rgba(19, 19, 19, 0.1)';
            }
        });
        
        if (isValid) {
            // Submit form
            this.style.transform = 'scale(0.95)';
            this.textContent = '{{trans('home.sending_button')}}';
            
            setTimeout(() => {
                form.submit();
            }, 1000);
        } else {
            // Shake effect for invalid form
            this.style.transform = 'translateX(-10px)';
            setTimeout(() => {
                this.style.transform = 'translateX(10px)';
                setTimeout(() => {
                    this.style.transform = 'translateX(0)';
                }, 100);
            }, 100);
        }
    });
});
</script>
@endsection