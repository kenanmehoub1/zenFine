@extends("index")

@section('content')
<div class="about-page" style="min-height: 100vh; direction:{{trans('home.dir')}};" >
    <!-- Hero Section with Gradient Background -->
    <div class="hero-section" style="background: linear-gradient(#adc0e789, #bfe7adff); padding: 100px 20px 80px;">
        <div class="container" style="max-width: 1200px; margin: 0 auto;  background:none;">
            <div class="hero-content" style="display: flex; align-items: center; gap: 60px; flex-wrap: wrap;">
                <!-- Logo Image -->
                <div class="logo-container" style="flex: 1; min-width: 300px;">
                    <div style="background-color: white;  border-radius: 20px; box-shadow: 0 15px 40px rgba(62, 169, 151, 0.2);">
                        <div style="width: 100%; height: 400px; border-radius: 15px; overflow: hidden; position: relative;">
                            <img src="{{ asset('image/logo4.jpg') }}" alt="Zenfine Clean Logo" 
                                 style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; 
                                      background: linear-gradient(45deg, rgba(62, 169, 151, 0.1), rgba(62, 169, 151, 0.3));
                                      display: flex; align-items: center; justify-content: center;">
                               
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hero Text -->
                <div class="hero-text" style="flex: 1; min-width: 300px;">
                    <h1 class="main-title" style="color: #3EA997; font-size: 3.5rem; font-weight: 700; margin-bottom: 20px; line-height: 1.2;">
                        {{trans('home.about_page_title')}}
                    </h1>
                    <p class="tagline" style="color: #333; font-size: 1.4rem; font-weight: 500; margin-bottom: 30px;">
                        {{trans('home.transforming_spaces')}}
                    </p>
                    <p class="description" style="color: #444; line-height: 1.8; font-size: 1.1rem; margin-bottom: 30px;">
                        {{trans('home.about_description')}}
                    </p>
                    <div class="cta-buttons" style="display: flex; gap: 20px; flex-wrap: wrap;">
                        <a href="{{ route('contact') }}" style="display: inline-block; background-color: #3EA997; color: white; 
                            padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: bold; 
                            font-size: 1.1rem; transition: all 0.3s ease; border: 2px solid #3EA997;">
                            {{trans('home.contact')}}
                        </a>
                        <a href="/services" style="display: inline-block; background-color: transparent; color: #3EA997; 
                            padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: bold; 
                            font-size: 1.1rem; transition: all 0.3s ease; border: 2px solid #3EA997;">
                            {{trans('home.our_services_link')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Sections with White Background -->
    <div class="content-sections" style="background: linear-gradient(#adc0e789, #bfe7adff); padding: 80px 20px; direction:{{trans('home.dir')}};">
        <div class="container" style="max-width: 1200px; margin: 0 auto;  background:none;">
            
            <!-- Our Mission Section -->
            <div class="mission-section" style="margin-bottom: 100px;">
                <div class="section-header" style="text-align: center; margin-bottom: 60px;">
                    <h2 style="color: #3EA997; font-size: 2.5rem; margin-bottom: 20px; position: relative; display: inline-block;">
                        {{trans('home.mission_vision_title')}}
                        <span style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); 
                            width: 80px; height: 4px; background-color: #3EA997; border-radius: 2px;"></span>
                    </h2>
                </div>
                
                <div class="mission-content" style="display: flex; gap: 60px; align-items: center; flex-wrap: wrap;">
                    <div class="mission-text" style="flex: 1; min-width: 300px;">
                        <h3 style="color: #3EA997; font-size: 2rem; margin-bottom: 25px;">{{trans('home.our_mission')}}</h3>
                        <p style="color: #444; line-height: 1.8; font-size: 1.1rem; margin-bottom: 25px;">
                            {{trans('home.mission_text1')}}
                        </p>
                        <p style="color: #444; line-height: 1.8; font-size: 1.1rem;">
                            {{trans('home.mission_text2')}}
                        </p>
                    </div>
                    <div class="vision-text" style="flex: 1; min-width: 300px;">
                        <h3 style="color: #3EA997; font-size: 2rem; margin-bottom: 25px;">{{trans('home.our_vision')}}</h3>
                        <p style="color: #444; line-height: 1.8; font-size: 1.1rem; margin-bottom: 25px;">
                            {{trans('home.vision_text1')}}
                        </p>
                        <p style="color: #444; line-height: 1.8; font-size: 1.1rem;">
                            {{trans('home.vision_text2')}}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Core Values Section -->
            <div class="values-section" style="margin-bottom: 100px;">
                <div class="section-header" style="text-align: center; margin-bottom: 60px;">
                    <h2 style="color: #3EA997; font-size: 2.5rem; margin-bottom: 20px; position: relative; display: inline-block;">
                        {{trans('home.core_values_title')}}
                        <span style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); 
                            width: 80px; height: 4px; background-color: #3EA997; border-radius: 2px;"></span>
                    </h2>
                </div>
                
                <div class="values-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
                    <div class="value-card" style="background: linear-gradient(145deg, #f8f9fa, #ffffff); padding: 40px 30px; 
                        border-radius: 20px; box-shadow: 0 10px 30px rgba(62, 169, 151, 0.1); text-align: center; 
                        transition: all 0.3s ease; border-left: 5px solid #3EA997;">
                        <div class="value-icon" style="background-color: #3EA997; width: 80px; height: 80px; border-radius: 50%; 
                            display: flex; align-items: center; justify-content: center; margin: 0 auto 25px;">
                            <span style="color: white; font-size: 2rem; font-weight: bold;">✓</span>
                        </div>
                        <h3 style="color: #3EA997; font-size: 1.5rem; margin-bottom: 15px;">{{trans('home.excellence')}}</h3>
                        <p style="color: #666; line-height: 1.6;">{{trans('home.excellence_text')}}</p>
                    </div>

                    <div class="value-card" style="background: linear-gradient(145deg, #f8f9fa, #ffffff); padding: 40px 30px; 
                        border-radius: 20px; box-shadow: 0 10px 30px rgba(62, 169, 151, 0.1); text-align: center; 
                        transition: all 0.3s ease; border-left: 5px solid #3EA997;">
                        <div class="value-icon" style="background-color: #3EA997; width: 80px; height: 80px; border-radius: 50%; 
                            display: flex; align-items: center; justify-content: center; margin: 0 auto 25px;">
                            <span style="color: white; font-size: 2rem; font-weight: bold;">♻</span>
                        </div>
                        <h3 style="color: #3EA997; font-size: 1.5rem; margin-bottom: 15px;">{{trans('home.sustainability')}}</h3>
                        <p style="color: #666; line-height: 1.6;">{{trans('home.sustainability_text')}}</p>
                    </div>

                    <div class="value-card" style="background: linear-gradient(145deg, #f8f9fa, #ffffff); padding: 40px 30px; 
                        border-radius: 20px; box-shadow: 0 10px 30px rgba(62, 169, 151, 0.1); text-align: center; 
                        transition: all 0.3s ease; border-left: 5px solid #3EA997;">
                        <div class="value-icon" style="background-color: #3EA997; width: 80px; height: 80px; border-radius: 50%; 
                            display: flex; align-items: center; justify-content: center; margin: 0 auto 25px;">
                            <span style="color: white; font-size: 2rem; font-weight: bold;">⭐</span>
                        </div>
                        <h3 style="color: #3EA997; font-size: 1.5rem; margin-bottom: 15px;">{{trans('home.reliability')}}</h3>
                        <p style="color: #666; line-height: 1.6;">{{trans('home.reliability_text')}}</p>
                    </div>
                </div>
            </div>

            <!-- Why Choose Us -->
            <div class="features-section" style="margin-bottom: 100px;">
                <div class="section-header" style="text-align: center; margin-bottom: 60px;">
                    <h2 style="color: #3EA997; font-size: 2.5rem; margin-bottom: 20px; position: relative; display: inline-block;">
                        {{trans('home.why_choose_title')}}
                        <span style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); 
                            width: 80px; height: 4px; background-color: #3EA997; border-radius: 2px;"></span>
                    </h2>
                </div>
                
                <div class="features-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
                    <div style="text-align: center;">
                        <div style="background-color: #3EA997; width: 70px; height: 70px; border-radius: 50%; display: flex; 
                            align-items: center; justify-content: center; margin: 0 auto 25px;">
                            <span style="color: white; font-size: 1.8rem;">👨‍🔬</span>
                        </div>
                        <h3 style="color: #3EA997; margin-bottom: 15px;">{{trans('home.trained_professionals')}}</h3>
                        <p style="color: #666;">{{trans('home.trained_professionals_text')}}</p>
                    </div>
                    
                    <div style="text-align: center;">
                        <div style="background-color: #3EA997; width: 70px; height: 70px; border-radius: 50%; display: flex; 
                            align-items: center; justify-content: center; margin: 0 auto 25px;">
                            <span style="color: white; font-size: 1.8rem;">🌿</span>
                        </div>
                        <h3 style="color: #3EA997; margin-bottom: 15px;">{{trans('home.eco_friendly_products')}}</h3>
                        <p style="color: #666;">{{trans('home.eco_friendly_products_text')}}</p>
                    </div>
                    
                    <div style="text-align: center;">
                        <div style="background-color: #3EA997; width: 70px; height: 70px; border-radius: 50%; display: flex; 
                            align-items: center; justify-content: center; margin: 0 auto 25px;">
                            <span style="color: white; font-size: 1.8rem;">⏰</span>
                        </div>
                        <h3 style="color: #3EA997; margin-bottom: 15px;">{{trans('home.flexible_scheduling')}}</h3>
                        <p style="color: #666;">{{trans('home.flexible_scheduling_text')}}</p>
                    </div>
                    
                    <div style="text-align: center;">
                        <div style="background-color: #3EA997; width: 70px; height: 70px; border-radius: 50%; display: flex; 
                            align-items: center; justify-content: center; margin: 0 auto 25px;">
                            <span style="color: white; font-size: 1.8rem;">💯</span>
                        </div>
                        <h3 style="color: #3EA997; margin-bottom: 15px;">{{trans('home.satisfaction_guarantee')}}</h3>
                        <p style="color: #666;">{{trans('home.satisfaction_guarantee_text')}}</p>
                    </div>
                </div>
            </div>

            <!-- Statistics Section with Gradient Background -->
            <div class="stats-section" style="background: linear-gradient(135deg, #3EA997, #2c8a7d); padding: 60px 40px; 
                border-radius: 20px; margin-bottom: 80px;">
                <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
                    gap: 40px; text-align: center;">
                    <div>
                        <h3 style="color: white; font-size: 3rem; margin-bottom: 10px; font-weight: bold;">1500+</h3>
                        <p style="color: white; opacity: 0.9; font-size: 1.1rem;">{{trans('home.satisfied_clients')}}</p>
                    </div>
                    <div>
                        <h3 style="color: white; font-size: 3rem; margin-bottom: 10px; font-weight: bold;">12+</h3>
                        <p style="color: white; opacity: 0.9; font-size: 1.1rem;">{{trans('home.years_experience')}}</p>
                    </div>
                    <div>
                        <h3 style="color: white; font-size: 3rem; margin-bottom: 10px; font-weight: bold;">50+</h3>
                        <p style="color: white; opacity: 0.9; font-size: 1.1rem;">{{trans('home.professional_staff')}}</p>
                    </div>
                    <div>
                        <h3 style="color: white; font-size: 3rem; margin-bottom: 10px; font-weight: bold;">98%</h3>
                        <p style="color: white; opacity: 0.9; font-size: 1.1rem;">{{trans('home.client_retention')}}</p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="cta-section" style="text-align: center;">
                <h2 style="color: #3EA997; font-size: 2.5rem; margin-bottom: 30px;">{{trans('home.cta_title')}}</h2>
                <p style="color: #444; line-height: 1.8; font-size: 1.1rem; max-width: 700px; margin: 0 auto 40px;">
                    {{trans('home.cta_text')}}
                </p>
                <a href="{{ route('contact') }}" style="display: inline-block; background-color: #3EA997; color: white; 
                    padding: 18px 50px; border-radius: 50px; text-decoration: none; font-weight: bold; 
                    font-size: 1.2rem; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(62, 169, 151, 0.3);">
                    {{trans('home.contact_title')}}
                </a>
            </div>

        </div>
    </div>
</div>

<style>
    /* Hover Effects */
    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(62, 169, 151, 0.15) !important;
    }
    
    .cta-buttons a:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(62, 169, 151, 0.2);
    }
    
    .cta-section a:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(62, 169, 151, 0.4) !important;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-content {
            flex-direction: column;
        }
        
        .main-title {
            font-size: 2.5rem !important;
        }
        
        .mission-content {
            flex-direction: column;
        }
        
        .values-grid,
        .features-grid,
        .stats-grid {
            grid-template-columns: 1fr !important;
        }
        
        .hero-section {
            padding: 80px 20px 60px !important;
        }
        
        .logo-container,
        .hero-text {
            min-width: 100% !important;
        }
        
        .logo-container {
            order: -1;
        }
    }
    
    @media (max-width: 480px) {
        .main-title {
            font-size: 2rem !important;
        }
        
        .section-header h2 {
            font-size: 2rem !important;
        }
        
        .cta-buttons {
            flex-direction: column;
        }
        
        .cta-buttons a {
            width: 100%;
            text-align: center;
        }
    }
    
    /* Animation for value cards on scroll */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .value-card {
        animation: fadeInUp 0.6s ease forwards;
    }
    
    .value-card:nth-child(2) {
        animation-delay: 0.2s;
    }
    
    .value-card:nth-child(3) {
        animation-delay: 0.4s;
    }
</style>

<script>
    // Interactive hover effects
    document.addEventListener('DOMContentLoaded', function() {
        const valueCards = document.querySelectorAll('.value-card');
        const ctaButtons = document.querySelectorAll('.cta-buttons a, .cta-section a');
        
        // Add hover effects to value cards
        valueCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
                this.style.boxShadow = '0 20px 40px rgba(62, 169, 151, 0.15)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 10px 30px rgba(62, 169, 151, 0.1)';
            });
        });
        
        // Add hover effects to CTA buttons
        ctaButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Add scroll animation for cards
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);
        
        valueCards.forEach(card => {
            card.style.animationPlayState = 'paused';
            observer.observe(card);
        });
    });
</script>
@endsection