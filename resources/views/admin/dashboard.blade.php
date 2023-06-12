@extends('layouts.admin')

@section('content')
    <h1 class="text-center my-5">Buongiorno <span class="number text-decoration-underline"> {{ Auth::user()->name }}</span></h1>
@endsection
