@extends('layouts.app')

@section('title', 'Inicio deportivo')

<?php
//Ejecutar php artisan queue:work
//Ejecutar npm run build
//Ejecutar php artisan reverb:start

use function Livewire\Volt\{state};
use Illuminate\Support\Facades\Http;

state(['count' => 0, 'data' => []]);

$increment = fn() => $this->count++;
$fetchUrl = function () {
    $this->dispatch('mi-evento', ['mensaje' => 'Hola desde Livewire']);
    //dd($data);
};

?>
<div>


    @section('content')
        @vite('resources/js/app.js')
        <script>
            setTimeout(() => {
                window.Echo.channel('testing')
                    .listen('testing', (e) => {
                        console.log(e);

                    })
            }, 400);



            document.addEventListener('DOMContentLoaded', function() {
                Livewire.on('mi-evento', (data) => {
                    fetch('http://127.0.0.1:8000/testing')
                        .then(response => {
                            if (!response.ok) {
                                thrownewError('Network response was not ok ' + response.statusText);
                            }
                            return response.json(); // Suponiendo que la respuesta es en formato JSON
                        })
                        .then(data => {
                            console.log(data); // Maneja los datos obtenidos
                        })
                        .catch(error => {
                            console.error('There has been a problem with your fetch operation:', error);
                        });


                    //alert(data.mensaje); // Aquí puedes poner cualquier código JavaScript que desees ejecutar




                });
            });
        </script>


        @volt
            <div>
                <h1>Bienvenido a la página de inicio</h1>
                <p>Este es el contenido de la página de inicio.</p>

                <H1>Hola que tal este es el index</H1>


                <h1>{{ $count }}</h1>
                <button wire:click="increment">+</button>

                <button wire:click="fetchUrl" class="btn btn-primary">
                    Fetch Data
                </button>

            </div>
        @endvolt



    @endsection

    <div>
        <H1>Hola que tal este es el index</H1>
    </div>





</div>
