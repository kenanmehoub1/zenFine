<?php
// app/Models/Video.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'youtube_url',
        'youtube_id',
        'order',
        'is_active'
    ];

    
    // أضف هذه الدالة لتحويل الرابط العادي إلى رابط embed
    public function getEmbedUrlAttribute()
    {
        return $this->convertToEmbedUrl($this->youtube_url);
    }

    // أضف هذه الدالة لاستخراج رابط التضمين
    public function getYoutubeVideoIdAttribute()
    {
        return $this->extractYouTubeId($this->youtube_url);
    }

    // دالة لتحويل الرابط
    private function convertToEmbedUrl($url)
    {
        $videoId = $this->extractYouTubeId($url);
        if ($videoId) {
            return 'https://www.youtube.com/embed/' . $videoId;
        }
        return $url; // إذا لم يكن رابط يوتيوب صحيح
    }

    // دالة لاستخراج معرف الفيديو
    private function extractYouTubeId($url)
    {
        $regExp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/';
        $match = preg_match($regExp, $url, $matches);
        
        if ($match && strlen($matches[2]) == 11) {
            return $matches[2];
        }
        
        return null;
    }
}