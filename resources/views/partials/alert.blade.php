@if(session()->get('msg'))
    <div class="alert alert-{{ session()->get('msg') }} p-3">
      {{ session()->get('txt') }}  
    </div><br />
  @endif