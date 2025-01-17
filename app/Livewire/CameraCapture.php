<?php

namespace App\Livewire;

use App\Models\Report;
use Illuminate\Http\Request;
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
    public function submitReport(Request $request)
    {
        dd($request);
        // Save the data to the database
        Report::create([
            'latitude' => $latitude,
            'longitude' => $longitude,
            'address' => $address,
            'date' => $date,
            'time' => $time,
        ]);
        session()->flash('message', 'Data saved successfully!');
        // Send a success message back to the frontend
//        $this->dispatchBrowserEvent('report-saved', ['message' => 'Report submitted successfully!']);
    }
    public function render()
    {
        return view('livewire.camera-capture');
    }
}
