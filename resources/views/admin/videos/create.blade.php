{{-- resources/views/admin/videos/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h4><i class="fas fa-plus-circle"></i> إضافة فيديو جديد</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.videos.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="title">عنوان الفيديو <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title') }}" required placeholder="أدخل عنوان الفيديو">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="youtube_url">رابط الفيديو من اليوتيوب <span class="text-danger">*</span></label>
                <input type="url" name="youtube_url" id="youtube_url" class="form-control @error('youtube_url') is-invalid @enderror" 
                       value="{{ old('youtube_url') }}" required placeholder="https://www.youtube.com/watch?v=...">
                <small class="form-text text-muted">مثال: https://www.youtube.com/watch?v=XtMox9YApto</small>
                @error('youtube_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

         

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save"></i> حفظ الفيديو
                </button>
                <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary btn-lg">
                    <i class="fas fa-arrow-left"></i> إلغاء
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $('#youtube_url').on('keyup change', function() {
        let url = $(this).val();
        let videoId = extractYouTubeId(url);
        
        if(videoId) {
            let embedUrl = 'https://www.youtube.com/embed/' + videoId;
            $('#videoPreview').html(`
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="${embedUrl}" allowfullscreen></iframe>
                </div>
            `);
        } else if(url && url !== '') {
            $('#videoPreview').html('<p class="text-danger">رابط يوتيوب غير صحيح</p>');
        } else {
            $('#videoPreview').html('<p class="text-muted">سيظهر معاينة الفيديو هنا بعد إدخال الرابط</p>');
        }
    });

    function extractYouTubeId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }
});
</script>
@endpush
@endsection