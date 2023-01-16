@if (session('toast-success'))
  
    <section class="position-fixed p-4 flex-row-reverse " style="z-index: 8; left: 0; top: 1.5rem; width:26rem; max-width:80%;">

        <div class="toast" id="toast-success" data-delay="7000" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <div class="rounded me-2" style="background: red"></div>
              <strong class="me-auto">فروشگاه ستاره شمال</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                
                {{ session('toast-success') }}

            </div>
          </div>

    </section>

    
    <script>
      $(document).ready(function() {
        $("#toast-success").toast('show');
    });
    </script>
  
@endif