@extends('layouts.app')

@section('title', 'Inicio deportivo')

<?php

use function Livewire\Volt\{state};

state(['count' => 0]);

$increment = fn() => $this->count++;

?>
<div>


    @section('content')
        @volt
            <div>
                <h1>Bienvenido a la página de inicio</h1>
                <p>Este es el contenido de la página de inicio.</p>

                <H1>Hola que tal este es el index</H1>


                <h1>{{ $count }}</h1>
                <button wire:click="increment">+</button>
            </div>
        @endvolt
    @endsection

    <div>
        <H1>Hola que tal este es el index</H1>
    </div>





</div>
