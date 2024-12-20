<?php

namespace App\Livewire;

use Livewire\Component;

class CameraCapture extends Component
{
    public $image;
    public $latitude;
    public $longitude;

    // Method to handle the captured image and location
    public function storeData($latitude, $longitude, $photo)
    {
        // Assign the data to the public properties
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->image = $photo;

        // Here you could save the data to the database or perform other actions
        // For example:
        // Capture::create([
        //     'image' => $photo,
        //     'latitude' => $latitude,
        //     'longitude' => $longitude,
        // ]);

        session()->flash('message', 'Data saved successfully!');
    }
    public function render()
    {
        return view('livewire.camera-capture');
    }
}
