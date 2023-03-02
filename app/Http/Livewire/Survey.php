<?php

namespace App\Http\Livewire;

use App\Models\HasilSurvey;
use App\Models\Pemohon;
use App\Models\Survey as ModelsSurvey;
use Filament\Forms;
use Livewire\Component;

class Survey extends Component implements Forms\Contracts\HasForms
{

    use Forms\Concerns\InteractsWithForms;

    protected $surveys;
    protected $formsSurvey = [];
    public
        $tiket,
        $review,
        $rating = [],
        $lastReview;

    public function mount($nomorTiket){
        $this->tiket = $nomorTiket;
        $this->lastReview = Pemohon::whereNotNull('review')->latest()->first();
    }
    // $request_id,
    //     $review,
    //     $rating = [],
    //     $lastReview;

    // public function mount($request_id){
    //     $this->request_id = $request_id;
    //     $this->lastReview = Pemohon::whereNotNull('review')->latest()->first();
    // }

    public function submit(){
        // dd($this->rating);
        $pemohon = Pemohon::where('review')->first();
        $summary = [];


        // dd($);

        $this->surveys = ModelsSurvey::all();
        foreach ($this->surveys as $key => $survey){
            array_push($summary,
                [
                    'pemohon_id' => $pemohon->id,
                    'survey_id' => $survey->id,
                    'amount' => $this->rating[$key]
                ]
            );
            $hasil = HasilSurvey::create($summary[$key]);
            $question = Survey::all('question');
        }
        $avg = array_sum(array_column($summary, 'amount'))*100/count($question)*2 / count($summary);
        $pemohon->review = $this->review;
        $pemohon->review_star = $avg;
        $pemohon->update();


        // return redirect('/thanks');
        return redirect('/nilai-anda/{nomorTiket}');

    }

    public function render()
    {
        $this->surveys = ModelsSurvey::all();
        $surveys = $this->surveys;
        return view('livewire.survey',compact('surveys'));
    }
}
