@extends("index")
@section('content')
<style>
    .header{
        height: 90px;
    }
    .container{
        background:#bfe7adff;    
    }
    .first{
        display: flex;
    }
    .post1{
        width: 50%;
        display: block;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        background: linear-gradient(45deg, #bfe7adff, #9dd1f681);
        padding: 40px;
        text-align:center;
    }
    .portfolio-title {
        color: #333;
        font-size: 4em;
        margin-bottom: 20px;
        background: linear-gradient(45deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }
    .portfolio-description {
        color: #666;
        font-size: 1.2em;
        line-height: 1.6;
        margin: 0;
        padding: 0 20px;
        margin-top:4rem;
    }
    .contact-btn {
        background: linear-gradient(45deg, #667eea, #764ba2);
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
    .second{
        display: flex;
        background: linear-gradient(45deg, #bfe7adff, #9dd1f681);
    }
    .second-img{
        width: 50%;
    }
    .second-img img{
        width: 100%;
    }
    .second-img video{
        width: 100%;
        height: auto;
        aspect-ratio: 1;
    }
    .second-img iframe{
        width: 100%;
        height: auto;
        aspect-ratio: 16 / 9;
    }
    .single-video{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px 0;
    }
    .single-video .second-img{
        width: 100%;
        max-width: 920px;
    }
    .single-video .second-img iframe{
        width: 100%;
        height: auto;
        aspect-ratio: 16 / 9;
    }
    .second-post{
        width: 50%;              
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        padding: 40px;       
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .second-post h2 {
        color: #764ba2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        font-size: 32px;
        position: relative;
        padding-bottom: 15px;
    }
    .second-post p {
        color: #555;
        margin-bottom: 30px;
        font-size: 18px;
        text-align: justify;
    }
    @media (max-width: 1000px) {
    }
    @media (max-width: 800px) {
        .first{
            display: block;
        }
        .post1{
            width: 100%;
        }
        .second{
            display: block;
        }
        .second-img{
            width: 100%;
        }
        .second-img img{
            width: 100%;
        }
        .second-img video{
            width: 100%;
            height: auto;
            aspect-ratio: 1;
        }
        .second-img iframe{
            width: 100%;
            height: auto;
            aspect-ratio: 16 / 9;
        }
        .single-video{
            display: flex;
            justify-content: center;
            padding: 20px 0;
        }
        .single-video .second-img{
            width: 80%;
        }
        .single-video .second-img iframe{
            height: auto;
            aspect-ratio: 16 / 9;
        }
        .second-post{
            width: 100%;  
        }
    }
    @media (max-width: 600px) {
    }
    @media (max-width: 500px) {
    }
</style>
<div class="content">
    <div class="first">
        <div class="post1" style=" direction:{{trans('home.dir')}};">
            <h2 class="portfolio-title">Latest Work</h2>
            <p class="portfolio-description">
                شاهد أحدث أعمالنا ومشاريعنا في مجال خدمات التنظيف والعناية بالممتلكات
            </p>
            <a href="tel:+971545969516" class="contact-btn">اتصل بنا</a>
        </div>
    </div>

    @foreach($videos as $video)
        @if($video->is_active)
            <div class="second" style=" direction:{{trans('home.dir')}};">
                  <div class="second-post">
                    <h2 style="text-align:center;">{{ $video->title }}</h2>
                </div>
            <div class="second-img">
                    @php
                        // استخراج ID الفيديو بشكل صحيح
                        $videoId = null;
                        $url = trim($video->youtube_url);
                        
                        // معالجة不同类型的 الروابط
                        if (strpos($url, 'youtube.com/watch?v=') !== false) {
                            parse_str(parse_url($url, PHP_URL_QUERY), $params);
                            $videoId = $params['v'] ?? null;
                        } 
                        elseif (strpos($url, 'youtu.be/') !== false) {
                            $path = parse_url($url, PHP_URL_PATH);
                            $videoId = trim($path, '/');
                        }
                        elseif (strpos($url, 'youtube.com/embed/') !== false) {
                            preg_match('/embed\/([a-zA-Z0-9_-]+)/', $url, $matches);
                            $videoId = $matches[1] ?? null;
                        }
                        elseif (preg_match('/[?&]v=([a-zA-Z0-9_-]{11})/', $url, $matches)) {
                            $videoId = $matches[1];
                        }
                        elseif (preg_match('/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
                            $videoId = $matches[1];
                        }
                        
                        // التحقق من صحة ID (يجب أن يكون 11 حرف)
                        if ($videoId && strlen($videoId) != 11) {
                            $videoId = null;
                        }
                    @endphp
                    
                    @if($videoId)
                        <iframe 
                            width="100%" 
                            height="auto" 
                            src="https://www.youtube.com/embed/{{ $videoId }}" 
                            title="{{ $video->title }}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen 
                            loading="lazy"
                            style="aspect-ratio: 16/9;"
                        ></iframe>
                    @else
                        <div style="background:#f8d7da; padding:20px; text-align:center; border:1px solid #f5c6cb; border-radius:5px;">
                            <p style="color:#721c24; margin:0;">❌ لا يمكن عرض الفيديو - رابط غير صالح</p>
                            <small style="color:#721c24;">الرابط: {{ $video->youtube_url }}</small>
                        </div>
                    @endif
                </div>
             
            </div>
        @endif
    @endforeach
</div>
@endsection