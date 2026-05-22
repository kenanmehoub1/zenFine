{{-- resources/views/admin/videos/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h4><i class="fas fa-video"></i> إدارة الفيديوهات</h4>
        <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> إضافة فيديو جديد
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th width="50">#</th>
                        <th>عنوان الفيديو</th>
                        <th>رابط اليوتيوب</th>
                        <th>تاريخ الإضافة</th>
                        <th>الحالة</th>
                        <th width="150">الإجراءات</th>
                    </tr>
                </thead>
                <tbody id="sortable">
                    <div style=" padding:10px; margin:10px;">
   
                    @foreach($videos as $index => $video)
                    <tr data-id="{{ $video->id }}">
                        <td class="drag-handle" style="cursor: move;">
                            <i class="fas fa-grip-vertical"></i> {{ $index + 1 }}
                        </td>
                        <td>{{ $video->title }}</td>
                        <td>
                            <a href="{{ $video->youtube_url }}" target="_blank">
                                {{ Str::limit($video->youtube_url, 50) }}
                            </a>
                        </td>
                        <td>{{ $video->created_at->format('Y-m-d') }}</td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input toggle-status" 
                                       id="status{{ $video->id }}" data-id="{{ $video->id }}"
                                       {{ $video->is_active ? 'checked' : '' }}>
                                <label class="custom-control-label" for="status{{ $video->id }}"></label>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i> تعديل
                            </a>
                            <button class="btn btn-sm btn-danger delete-video" data-id="{{ $video->id }}">
                                <i class="fas fa-trash"></i> حذف
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function() {
    // ترتيب الفيديوهات بالسحب
    $("#sortable").sortable({
        handle: ".drag-handle",
        update: function(event, ui) {
            let orders = [];
            $('#sortable tr').each(function(index) {
                orders.push($(this).data('id'));
            });
            
            $.ajax({
                url: '{{ route("admin.videos.update-order") }}',
                method: 'POST',
                data: {
                    orders: orders,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    toastr.success('تم تحديث الترتيب بنجاح');
                }
            });
        }
    });

    // تبديل الحالة
    $('.toggle-status').on('change', function() {
        let videoId = $(this).data('id');
        $.ajax({
            url: '/admin/videos/' + videoId + '/toggle-status',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                toastr.success('تم تغيير حالة الفيديو');
            }
        });
    });

    // حذف الفيديو
    $('.delete-video').on('click', function() {
        if(confirm('هل أنت متأكد من حذف هذا الفيديو؟')) {
            let videoId = $(this).data('id');
            $.ajax({
                url: '/admin/videos/' + videoId,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    });
});
</script>

<style>
.drag-handle {
    cursor: move;
}
.drag-handle i {
    font-size: 18px;
    color: #999;
}
</style>
@endpush
@endsection