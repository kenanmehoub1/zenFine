<script>
    // وظيفة زر القائمة
    function btnHeader(event) {
        const btn = document.querySelector('.header');
        btn.classList.toggle('show');
        event.stopPropagation(); // منع انتشار الحدث
    }

    // إغلاق القائمة عند النقر خارجها
    document.addEventListener('click', function(event) {
        const btn = document.querySelector('.header');
        const headerBtn = document.querySelector('.btn-header');
        
        // إذا كان النقر خارج القائمة وخارج زر القائمة
        if (!event.target.closest('.header') && !event.target.closest('.btn-header')) {
            btn.classList.remove('show');
        }
    });

    // منع إغلاق القائمة عند النقر داخلها
    document.querySelector('.header').addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // وظيفة شريط البحث
    document.addEventListener('DOMContentLoaded', function() {
        const searchToggle = document.querySelector('.search-toggle');
        const searchBar = document.querySelector('.search-bar');
        const searchClose = document.querySelector('.search-close');
        const searchSubmit = document.querySelector('.search-submit');
        const searchInput = document.querySelector('.search-input');
        let currentHighlightIndex = -1;
        let searchResults = [];
        
        // فتح شريط البحث
        searchToggle.addEventListener('click', function(e) {
            e.preventDefault();
            searchBar.classList.add('active');
            setTimeout(() => {
                searchInput.focus();
            }, 300);
        });
        
        // إغلاق شريط البحث
        searchClose.addEventListener('click', function() {
            searchBar.classList.remove('active');
            searchInput.value = '';
            clearHighlights();
        });
        
        // البحث عند النقر على زر البحث
        searchSubmit.addEventListener('click', function() {
            performSearch();
        });
        
        // البحث عند الضغط على Enter
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
        
        // إغلاق شريط البحث عند النقر خارجها
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.search-container') && searchBar.classList.contains('active')) {
                searchBar.classList.remove('active');
                searchInput.value = '';
                clearHighlights();
            }
        });
        
        // منع إغلاق شريط البحث عند النقر داخله
        searchBar.addEventListener('click', function(e) {
            e.stopPropagation();
        });
        
        // وظيفة البحث
        function performSearch() {
            const searchTerm = searchInput.value.trim().toLowerCase();
            
            if (!searchTerm) {
                return;
            }
            
            // إغلاق شريط البحث بعد البحث
            searchBar.classList.remove('active');
            
            // مسح التظليلات السابقة
            clearHighlights();
            
            // البحث في المحتوى
            searchInContent(searchTerm);
            
            // إعادة تعيين مؤشر النتائج
            currentHighlightIndex = -1;
            
            // الانتقال إلى أول نتيجة
            navigateToNextResult();
        }
        
        // البحث في محتوى الصفحة
        function searchInContent(searchTerm) {
            const contentElements = document.querySelectorAll('.page-content p, .page-content h2');
            searchResults = [];
            
            contentElements.forEach(element => {
                const originalText = element.innerHTML;
                const textContent = element.textContent.toLowerCase();
                
                if (textContent.includes(searchTerm)) {
                    // إنشاء تعبير منتظم للبحث مع تجاهل حالة الأحرف
                    const regex = new RegExp(searchTerm, 'gi');
                    const highlightedText = originalText.replace(regex, match => 
                        `<span class="search-highlight">${match}</span>`
                    );
                    
                    element.innerHTML = highlightedText;
                    
                    // جمع جميع العناصر المظللة حديثاً
                    const highlights = element.querySelectorAll('.search-highlight');
                    highlights.forEach(highlight => {
                        searchResults.push(highlight);
                    });
                }
            });
            
            // إذا لم توجد نتائج
            if (searchResults.length === 0) {
                showNoResultsMessage();
            }
        }
        
        // الانتقال إلى النتيجة التالية
        function navigateToNextResult() {
            if (searchResults.length === 0) return;
            
            // إزالة التظليل النشط من النتيجة الحالية
            if (currentHighlightIndex >= 0) {
                searchResults[currentHighlightIndex].classList.remove('active');
            }
            
            // الانتقال إلى النتيجة التالية
            currentHighlightIndex = (currentHighlightIndex + 1) % searchResults.length;
            
            // إضافة التظليل النشط للنتيجة الجديدة
            searchResults[currentHighlightIndex].classList.add('active');
            
            // التمرير إلى النتيجة
            searchResults[currentHighlightIndex].scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
        
        // إظهار رسالة عدم وجود نتائج
        function showNoResultsMessage() {
            const pageContent = document.querySelector('.page-content');
            const noResults = document.createElement('div');
            noResults.className = 'search-no-results';
            noResults.textContent = `No results found for "${searchInput.value}"`;
            pageContent.appendChild(noResults);
            
            // إزالة الرسالة بعد 3 ثوان
            setTimeout(() => {
                if (noResults.parentNode) {
                    noResults.parentNode.removeChild(noResults);
                }
            }, 3000);
        }
        
        // مسح جميع التظليلات
        function clearHighlights() {
            const highlights = document.querySelectorAll('.search-highlight');
            highlights.forEach(highlight => {
                const parent = highlight.parentNode;
                parent.replaceChild(document.createTextNode(highlight.textContent), highlight);
                parent.normalize();
            });
            
            searchResults = [];
            currentHighlightIndex = -1;
        }
        
        // إضافة إمكانية التنقل بين النتائج باستخدام مفاتيح الأسهم
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                if (searchResults.length > 0) {
                    e.preventDefault();
                    navigateToNextResult();
                }
            }
        });
    });
</script>