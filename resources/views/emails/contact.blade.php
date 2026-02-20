<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ trans('home.new_inquiry_title') }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
        .content {
            padding: 30px;
        }
        .info-card {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 15px 0;
            border-radius: 5px;
        }
        .info-label {
            font-weight: bold;
            color: #667eea;
            display: inline-block;
            width: 150px;
        }
        .info-value {
            color: #555;
        }
        .message-box {
            background: #ccdae6ff;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }
        .message-box h3 {
            color: #856404;
            margin-top: 0;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
            border-top: 1px solid #dee2e6;
        }
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #dee2e6, transparent);
            margin: 25px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>{{ trans('home.new_inquiry_title') }}</h1>
           
        </div>

        <!-- Content -->
        <div class="content">
            <div class="info-card">
                <div class="info-item">
                    <span class="info-label">{{ trans('home.customer_name_label') }}</span>
                    <!-- التصحيح هنا: استخدام array بدلاً من object -->
                    <span class="info-value">{{ $x['full_name'] }}</span>
                </div>
            </div>

            <div class="info-card">
                <div class="info-item">
                    <span class="info-label">{{ trans('home.business_email_label') }}</span>
                    <!-- التصحيح هنا -->
                    <span class="info-value">{{ $x['business_email'] }}</span>
                </div>
            </div>

            <div class="info-card">
                <div class="info-item">
                    <span class="info-label">{{ trans('home.phone_number_label') }}</span>
                    <!-- التصحيح هنا -->
                    <span class="info-value">{{ $x['phone_number'] }}</span>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Message Section -->
            <div class="message-box">
                <h3>{{ trans('home.customer_message_title') }}</h3>
                <!-- التصحيح هنا -->
                <p style="color: #555; line-height: 1.8; margin: 0;">{{ $x['message'] }}</p>
            </div>
        </div>

     
            
        </div>
    </div>
</body>
</html>