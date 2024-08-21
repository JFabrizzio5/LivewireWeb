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
    <livewire:testing-channels />

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

        <script>
            setTimeout(() => {
                window.Echo.channel('testing')
                    .listen('testing', (e) => {
                        // Selecciona el contenedor del chat por su ID
                        const chatContainer = document.getElementById('chat-container');

                        // Crea un nuevo elemento div para el mensaje
                        const nuevoMensaje = document.createElement('div');
                        nuevoMensaje.classList.add('mensaje');

                        // Agrega el contenido al nuevo mensaje
                        nuevoMensaje.innerHTML = `
                           <p>Data del evento: ${e.message ? e.message : 'No hay data disponible'}</p>
                       `;

                        // Agrega el nuevo mensaje al contenedor del chat
                        chatContainer.appendChild(nuevoMensaje);

                        // (Opcional) Hacer scroll hacia abajo automáticamente
                        chatContainer.scrollTop = chatContainer.scrollHeight;
                    });
            }, 1000);
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

        <div id="chat-container"></div>


    @endsection

    <div>
        <H1>Hola que tal este es el index</H1>
    </div>





</div>
