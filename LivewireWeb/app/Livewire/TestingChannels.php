<?php

namespace App\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class TestingChannels extends Component
{
    public $count = 1;
    public $data = "Sin datos";
    public $message = 'Mensaje';
    public $mensaje = "test";

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }
    public function hacerPeticion1()
    {
        // Inicializa el cliente Guzzle
        $client = new Client();

        // Hace la petición GET
        $response = $client->get('http://127.0.0.1:8000/testing');

        // Obtiene el cuerpo de la respuesta como JSON
        $body = $response->getBody();
        $content = json_decode($body, true);
        $this->data = $content;
        // Retorna los datos que necesitas
        return $content['variable'] ?? 'No se encontraron datos';
    }

    public function ejecutarUrl()
    {
        // Asegúrate de cambiar la URL base por la que corresponda
        $url = "http://127.0.0.1:8000/testing/" . urlencode($this->mensaje);
        $response = Http::get($url);

        // Opcionalmente, manejar la respuesta
        if ($response->successful()) {
            session()->flash('success', $response->json()['message']);
        } else {
            session()->flash('error', 'Error al ejecutar la URL.');
        }
    }

    public function hacerPeticion()
    {
        // Inicializa cURL
        $ch = curl_init();

        // Establece la URL y otras opciones necesarias
        curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:8000/testing");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Ejecuta la petición y obtiene la respuesta
        $output = curl_exec($ch);

        // Cierra el manejador cURL
        curl_close($ch);

        // Decodifica la respuesta JSON
        $data = json_decode($output, true);

        // Actualiza el mensaje con la respuesta del endpoint
        if ($data['status'] === 'success') {
            $this->data = $data['message'];
        } else {
            $this->data = 'Error al obtener el mensaje.';
        }
    }





    public function render()
    {
        return view('livewire.testing-channels');
    }
}
