@if (session('message'))
<div class="alert alert-success " id="final-message">
    {{ session('message')}}
</div>
    {{-- scrivendo session('message') mi prendo il valore della chiave message che ho inserito nel metodo store del controller --}}
@endif