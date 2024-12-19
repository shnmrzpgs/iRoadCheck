<?php

namespace App\Livewire;

use Livewire\Component;

class CameraCapture extends Component
{
    public $image;
    public $latitude;
    public $longitude;

    // Method to handle the captured image and location
    public function storeCapture($image, $latitude, $longitude)
    {
        // You can save the image and location here (e.g., to the database)
        $this->image = $image;
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        // You can trigger other actions here
        session()->flash('message', 'Capture saved successfully!');
    }
    public function render()
    {
        return view('livewire.camera-capture');
    }
}
