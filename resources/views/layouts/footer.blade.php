<footer class="footer">
    <div class="footer-content">
        
        <div class="footer-section" style=" direction:{{trans('home.dir')}}; ">
            <h3>{{trans('home.about_title')}}</h3>
            <p>{{trans('home.about_description')}}</p>
            <div class="social-links" ">
                <a href="https://www.facebook.com/share/1QYiQUkMKv/" class="social-link-1" aria-label="{{trans('home.social_facebook')}}"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-link-2" aria-label="{{trans('home.social_twitter')}}"><i class="fab fa-x"></i></a>
                <a href="https://www.instagram.com/zenfine.fpc" class="social-link-3" aria-label="{{trans('home.social_instagram')}}"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link-4" aria-label="{{trans('home.social_youtube')}}"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        
        <div class="footer-section" style=" direction:{{trans('home.dir')}};">
            <h3>{{trans('home.contact_title')}}</h3>
            <p><i class="fas fa-map-marker-alt"></i> {{trans('home.address1')}}</p>
            <p><i class="fas fa-phone"></i> {{trans('home.phoneNumper1')}}</p>
            <p><i class="fas fa-envelope"></i> {{trans('home.email_address')}}</p>
           
        </div>
        
        <div class="footer-section" style=" direction:{{trans('home.dir')}};">
            <h3>{{trans('home.quick_links_title')}}</h3>
            <p><a href="/home">{{trans('home.home')}}</a></p>
            <p><a href="/services">{{trans('home.services')}}</a></p>
            <p><a href="/gallery">{{trans('home.gallery')}}</a></p>
            
             <p><a href="/about">{{trans('home.About_Us')}}</a></p>
            <p><a href="/contact">{{trans('home.contact')}}</a></p>
        </div>
    </div>
    
    <div class="footer-bottom" style=" direction:{{trans('home.dir')}};">
        <div class="footer-bottom-content">
              <p>{{trans('home.Payment')}}  <span ><i class="fa-brands fa-cc-mastercard" style="color: #eb001b;"></i>
     <i class="fa-brands fa-cc-visa" style="color: #0566f8ff;"></i></span> </p>
            <p>{{trans('home.copyright')}}</p>
            
            <div class="language-switcher-wrapper">
                <span class="language-label">{{trans('home.language_label')}}</span>
                <div class="language-switcher">
                    @if(app()->getLocale() == 'ar')
                        <a href="{{ route('lang.switch', ['lang' => 'en']) }}" class="lang-btn">
                            {{trans('home.english')}}
                        </a>
                    @else
                        <a href="{{ route('lang.switch', ['lang' => 'ar']) }}" class="lang-btn">
                            {{trans('home.arabic')}}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>
<style>
    /* تنسيق footer-bottom */
.footer-bottom {
    width: 100%;
    background: #192119ff;
    padding: 20px 0;
    border:none;
}

.footer-bottom-content {
    width: 100%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    padding: 0;
}

.footer-bottom-content p {
    color: #f9f2f2ff;
    font-size: 14px;
    margin: 0;
    text-align: center;
    width: 100%;
    padding: 0 20px;
}

/* تنسيق محول اللغة - تصميم بسيط وعرض قليل */
.language-switcher-minimal {
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 10px 0;
}
.lang-btn{
   color:#86BE41; 
    text-decoration: none;
}
.lang-btn:hover{
   color:#0c9fc0ff; 
    
}

.lang-btn-minimal {
    display: inline-block;
    padding: 6px 16px;
    background: white;
    color: #0c9fc0ff;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    border: 1px solid #f9f2f2ff;
    border-radius: 4px;
    transition: all 0.2s ease;
    min-width: 80px;
    text-align: center;
}

.lang-btn-minimal:hover {
    background: #333;
    color: white;
}

/* تصميم متجاوب */
@media (max-width: 768px) {
    .footer-bottom {
        padding: 15px 0;
    }
    
    .footer-bottom-content {
        gap: 2px;
    }
    
    .footer-bottom-content p {
        font-size: 13px;
    }
    
    .lang-btn-minimal {
        padding: 5px 14px;
        font-size: 13px;
        min-width: 70px;
    }
}
</style>