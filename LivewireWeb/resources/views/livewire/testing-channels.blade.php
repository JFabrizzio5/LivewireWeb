<div>

    <h1>Este es de livewire normal no volt</h1>

    <h1>{{ $data }}</h1>
    <button wire:click="hacerPeticion">Hacer Petición</button>
    <div>
        <h1>{{ $count }}</h1>

        <button wire:click="increment">+</button>

        <button wire:click="decrement">-</button>
    </div>
    Manda un mensaje tu
    <div>
        <input type="text" wire:model.live="mensaje" placeholder="Escribe un mensaje" />
        <button wire:click="ejecutarUrl">Ejecutar URL</button>

        @if (session()->has('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        @if (session()->has('error'))
            <div style="color: red;">{{ session('error') }}</div>
        @endif
    </div>






    <div>
        <input type="text" id="mensaje" placeholder="Escribe un mensaje" />
        <button id="ejecutar-url">Ejecutar URL</button>

        <div id="success-message" style="color: green; display: none;"></div>
        <div id="error-message" style="color: red; display: none;"></div>

        <script>
            document.getElementById('ejecutar-url').addEventListener('click', function() {
                let mensaje = document.getElementById('mensaje').value;
                let url = `http://127.0.0.1:8000/testing/${encodeURIComponent(mensaje)}`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            document.getElementById('success-message').textContent = data.message;
                            document.getElementById('success-message').style.display = 'block';
                            document.getElementById('error-message').style.display = 'none';
                        }
                    })
                    .catch(error => {
                        document.getElementById('error-message').textContent = 'Error al ejecutar la URL.';
                        document.getElementById('error-message').style.display = 'block';
                        document.getElementById('success-message').style.display = 'none';
                    });
            });
        </script>
    </div>






    {{-- Care about people's approval and you will be their prisoner. --}}
</div>
