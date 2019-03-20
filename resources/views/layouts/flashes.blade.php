@if(session('message'))
<div class="alert alert-success" id="flash-messages">
      <p>{{ session('message') }}</p>
</div>
@endif