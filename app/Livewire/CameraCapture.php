<?php

namespace App\Livewire;

use App\Models\Report;
use App\Models\Suggestion;
use App\Models\TemporaryReport;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class CameraCapture extends Component
{

    public $image, $data;
    public $latitude;
    public  $longitude, $address, $purok, $street, $barangay, $date, $time, $photo;
    protected $listeners = ['updateLocation'];
    public function updateLocation($data)
    {
        dd($data);
        $this->latitude = $data['latitude'];
        $this->longitude = $data['longitude'];
        $this->address = $data['address'];
    }
//    protected $rules = [
//        'latitude' => 'required',
//        'longitude' => 'required',
//        'address' => 'required',
//        'street' => 'required',
//        'barangay' => 'required',
//        'date' => 'required',
//        'time' => 'required',
//        'photo' => 'required',
//    ];
    public function placeholder(){
        return <<<'HTML'
        <div>
            <!-- Loading spinner... -->

        <div role="status">
        <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-green-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
         /div>


        </div>
        HTML;
    }

    public function submitTemp()
    {
        dd($this->all());

        // Decode base64 photo
        $photoData = str_replace('data:image/png;base64,', '', $this->photo);
        $image = base64_decode($photoData);

        // Generate filenames
        $timestamp = time();
        $imageName = "report_photo_{$timestamp}.png";
        $annotatedPath = "output/reports/report_photo_{$timestamp}_annotated.jpg";
        $jsonPath = storage_path("app/public/output/reports/report_photo_{$timestamp}.json");

        // Save image
        $imagePath = Storage::disk('public')->put("reports/{$imageName}", $image);
        $fullImagePath = "reports/{$imageName}";

        // Wait for the JSON file to be generated
        $issue_name = "Unknown";
        $timeout = 10; // Max wait time in seconds
        $startTime = time();

        while (!file_exists($jsonPath) && (time() - $startTime) < $timeout) {
            usleep(500000); // Wait 0.5 seconds before checking again
        }

        // If JSON exists, read and extract issue name
        if (file_exists($jsonPath)) {

            $jsonData = json_decode(file_get_contents($jsonPath), true);

            if (!empty($jsonData['prediction'])) {

                $highestPrediction = collect($jsonData['prediction'])
                    ->sortByDesc(fn($p) => $p['best_probability'] * ($p['rect']['width'] * $p['rect']['height']))
                    ->first();
                $issue_name = $highestPrediction['name'] ?? 'Unknown';
            }
            else{
                // ✅ Error feedback
//                session()->flash('feedback', 'No road defect found. Please try again.');
//                session()->flash('feedback_type', 'error');
//                $report = 1;
//                session(['report_id' => $report]);
                return $this->redirect('/residents/report-road-issue', navigate:true)->with('no_defect_modal_open', true);
//                return redirect()->route('report-road-issue')->with('trigger_modal', true);



//                return redirect()->route('report-road-issue')->with('error', 'No road issues found, please retry!.');
            }
        } else{
            return $this->redirect('/residents/report-road-issue', navigate:true)->with('no_defect_modal_open', true);
        }


        // Check if report already exists
//        $existingReport = Report::where([
//            ['lat', '=', $request->latitude],
//            ['lng', '=', $request->longitude],
//            ['street', '=', $request->street],
//            ['barangay', '=', $request->barangay],
//            ['defect', '=', $issue_name]
//        ])->first();
//
//        if ($existingReport) {
//            // Save to suggestions table instead
//            Suggestion::create([
//                'report_id' => $existingReport->id,
//                'reporter_id' => Auth::id(),
//                'is_match' => false, // Default to false until user confirms
//                'response_deadline' => Carbon::now()->addDays(5), // Set deadline 5 days later
//                'defect' => $issue_name,
//                'lat' => $request->latitude,
//                'lng' => $request->longitude,
//                'location' => $request->address,
//                'street' => $request->street,
//                'purok' => $request->purok,
//                'barangay' => $request->barangay,
//                'date' => Carbon::createFromFormat('F d, Y', $request->date)->format('Y-m-d'),
//                'time' => Carbon::parse($request->time)->format('H:i:s'),
//                'severity' => 1,
//                'image' => $fullImagePath,
//                'image_annotated' => $annotatedPath,
//                'status' => "Unfixed"
//            ]);
//            return redirect()->route('report-road-issue')->with('success', 'Your report was marked as existing, please check Suggestions.');
//        }

        // No existing report found, save as new report

        $report = TemporaryReport::where('reporter_id', Auth::id())->first();

        $data = [
            'defect' => $issue_name,
            'lat' => $request->latitude,
            'lng' => $request->longitude,
            'location' => $request->address,
            'street' => $request->street,
            'purok' => $request->purok,
            'barangay' => $request->barangay,
            'date' => Carbon::createFromFormat('F d, Y', $request->date)->format('Y-m-d'),
            'time' => Carbon::parse($request->time)->format('H:i:s'),
            'severity' => 1,
            'image' => $fullImagePath,
            'image_annotated' => $annotatedPath,
            'status' => "Unfixed"
        ];

        if ($report) {
            // Update existing report
            $report->update($data);
        } else {
            // Create new report
            $report = TemporaryReport::create(array_merge(['reporter_id' => Auth::id()], $data));
        }



        // ✅ Success feedback
//        session()->flash('feedback', 'Report submitted successfully!');
//        session()->flash('feedback_type', 'success');

        return redirect()->route('report-road-issue')->with('success', true);
        // Send a success message back to the frontend
//        $this->dispatchBrowserEvent('report-saved', ['message' => 'Report submitted successfully!']);
    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.camera-capture');
    }
}
