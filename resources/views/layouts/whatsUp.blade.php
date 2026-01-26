<style>
      .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .whatsapp-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        .whatsapp-button img {
            width: 35px;
            height: 35px;
        }

        /* تأثير النبض */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        .whatsapp-button.pulse {
            animation: pulse 2s infinite;
        }

        /* تصميم متجاوب للشاشات المختلفة */
        @media (max-width: 768px) {
            .whatsapp-button {
                width: 55px;
                height: 55px;
                bottom: 15px;
                right: 15px;
            }
            
            .whatsapp-button img {
                width: 30px;
                height: 30px;
            }
        }

        @media (max-width: 480px) {
            .whatsapp-button {
                width: 50px;
                height: 50px;
                bottom: 10px;
                right: 10px;
            }
            
            .whatsapp-button img {
                width: 28px;
                height: 28px;
            }
        }


        
        /* زر الاتصال العائم */
        .floating-call-button {
            position: fixed;
            bottom: 85px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #2cceffff, #85c7f2ff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 20px rgba(75, 217, 249, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1000;
            animation: pulse 2s infinite;
            text-decoration: none;
        }
        
        .floating-call-button:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(79, 180, 248, 0.6);
        }
        
        .floating-call-button:active {
            transform: scale(0.95);
        }
        
        .floating-call-button .phone-icon {
            width: 35px;
            height: 35px;
            filter: brightness(0) invert(1);
        }
        
        .floating-call-button .tooltip {
            position: absolute;
            bottom: 85px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #333;
            color: white;
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 14px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }
        
        .floating-call-button .tooltip::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-width: 6px;
            border-style: solid;
            border-color: #333 transparent transparent transparent;
        }
        
        .floating-call-button:hover .tooltip {
            opacity: 1;
            visibility: visible;
        }
        
        /* تأثير النبض */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(80, 172, 248, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }
        
        /* تصميم متجاوب */
        @media (max-width: 768px) {
            .floating-call-button {
                width: 55px;
                height: 55px;
                bottom: 75px;
                right: 15px;
            }
            
            .floating-call-button .phone-icon {
                width: 30px;
                height: 30px;
            }
               
        }
       

        @media (max-width: 480px) {
            .whatsapp-button {
                width: 50px;
                height: 50px;
                bottom: 10px;
                right: 10px;
            }
            
        }
       
</style>
 <!-- زر واتساب -->
    <a href="https://wa.me/+971545969516" 
       class="whatsapp-button pulse" 
       target="_blank" 
       title="تواصل معنا على واتساب">
        <img src="https://cdn-icons-png.flaticon.com/512/124/124034.png"" alt="واتساب">
    </a>

        
    <!-- زر الاتصال العائم -->
    <a href="tel:+971561004127" class="floating-call-button">
        <svg class="phone-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
        </svg>
        <span class="tooltip">{{trans('home.contact')}}</span>
    </a>
  