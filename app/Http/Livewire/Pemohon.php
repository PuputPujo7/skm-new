<?php

namespace App\Http\Livewire;

use App\Models\Pemohon as ModelsPemohon;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Livewire\Component;

class Pemohon extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;


    public $kode = [
        'A',
        'B',
        'C',
        'D',
    ];

    public $data, $pemohon, $attributes;
    public $nama, $alamat, $no_hp,
    $jenis_kelamin, $usia, $pendidikan,
    $jenis_layanan, $date, $no_tiket ;
    public $pemohons;
    public function mount(): void
    {
        $this->form->fill();
        $this->pemohons = ModelsPemohon::all();
    }


    protected function getFormSchema(): array
    {
        return [
            TextInput::make('nama')->required(),
                    Textarea::make('alamat')->required(),
                    Radio::make('jenis_kelamin')->required()->options([
                        'laki-laki' => 'Laki-Laki',
                        'perempuan' => 'Perempuan',
                        'null' => 'Tidak Disebutkan',
                    ])->inline(),
                    Grid::make()->schema([
                    TextInput::make('no_hp')->numeric()->required()->maxLength(13),
                    TextInput::make('usia')->required()->numeric()->maxLength(2),
                ])->columns(2),
                    Grid::make()->schema([
                    Select::make('pendidikan')->required()->options([
                        'sd' => 'SD',
                        'sma' => 'SMA',
                        'd1' => 'D1',
                        'd2' => 'D2',
                        'd3' => 'D3',
                        'd4' => 'D4',
                        's1' => 'S1',
                        's2' => 'S2',
                        's3' => 'S3',

                    ]),
                    Select::make('jenis_layanan')->required()->options([
                    'oss' => 'Layanan OSS',
                    'lkpm' => 'Layanan LKPM',
                    'izin' => 'Layanan Perizinan',
                    'pengaduan' => 'Layanan Pengaduan dan Informasi'
                    ]),
                ]),
                    Hidden::make('date')->default(Carbon::now()->format('M')),
                    Hidden::make('no_tiket')
                //    ->default(Carbon::now()->format('Ymd'))
        ];
    }


    public function submit()
    {
        $this->data = $this->form->getState();

        // dd($this->data);
        $randomNumber = random_int(1000000, 9999999);

        $this->no_tiket = $randomNumber;

        $pemohon = ModelsPemohon::create($this->form->getState());

        $this->form->model($pemohon)->saveRelationships();

        // dd($pemohon);

        return redirect('/survey/{nomorTiket}');

    }

    public function render()
    {
        return view('livewire.pemohon');
    }
}
