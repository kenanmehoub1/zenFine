<!doctype html>
<html lang="en" >
  @include('layouts.header')
  <body>
   
   <div class="container">
    @include('layouts.navbar')
      <div class="content">
     
     

     
        
        @yield('content')
     
    

      @include('layouts.footer')
       @include('layouts.whatsUp')
          </div>
    </div>
   

    @include('layouts.scripts')
  </body>
</html>
