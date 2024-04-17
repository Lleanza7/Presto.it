<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use Livewire\Livewire;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\Watermark;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;

class FormCreate extends Component
{
    use WithFileUploads;
    public $title;
    public $price;
    public $description;
    public $category_id;
    public $images = [];
    public $announcement;
    public $temporary_images;
    public $announcement_revisor_counter;

    public $name = ['Sport', 'Elettronica', 'Musica', 'Casa', 'Giardino', 'Fai da te', 'Abbigliamento', 'Accessori', 'Gioielli'];



    protected $rules = [
        'title' => 'required|min:4|max:40',
        'price' => 'required|numeric',
        'description' => 'required|min:10|max:255',
        'category_id' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
    ];

    protected $messages = [
        'title.required' => '',
        'title.min' => '',
        'title.max' => '',
        'price.required' => '',
        'price.numeric' => '',
        'description.required' => '',
        'description.min' => '',
        'description.max' => '',
        'category_id.required' => '',
        'images.image' => '',
        'images.max' => '',
        'temporary_images.*.image' => '',
        'temporary_images.*.max' => '',
    ];

    public function __construct()
    {

        $this->messages['title.required'] = Lang::get('ui.titleRequired');
        $this->messages['title.min'] = Lang::get('ui.titleMin');
        $this->messages['title.max'] = Lang::get('ui.titleMax');
        $this->messages['price.required'] = Lang::get('ui.priceRequired');
        $this->messages['price.numeric'] = Lang::get('ui.priceNumeric');
        $this->messages['description.required'] = Lang::get('ui.descriptionRequired');
        $this->messages['description.min'] = Lang::get('ui.descriptionMin');
        $this->messages['description.max'] = Lang::get('ui.descriptionMax');
        $this->messages['category_id.required'] = Lang::get('ui.categoryRequired');
        $this->messages['images.image'] = Lang::get('ui.imagesImage');
        $this->messages['images.max'] = Lang::get('ui.imagesMax');
        $this->messages['temporary_images.*.image'] = Lang::get('ui.tempImagesImage');
        $this->messages['temporary_images.*.max'] = Lang::get('ui.tempImagesMax');

    }

    public function mount()
    {
        $this->announcement_revisor_counter = Announcement::toBeRevisionedCount();
    }


    public function store()
    {
        // [0 => Sport, 1 => Elettronica, 2 => Musica, 3 => Casa, 4 => Giardino, 5 => Fai da te, 6 => Abbigliamento, 7 => Accessori, 8 => Gioielli]
        $validatedData = $this->validate();
        $this->validate();
        $authUser = auth()->user()->id;
        $this->announcement = Announcement::create(array_merge($this->validate(), ['user_id' => $authUser]));
        /*    $authUser = auth()->user()->id;
           Announcement::create(array_merge($validatedData, ['user_id' => $authUser])); */
        if (count($this->images)) {
            foreach ($this->images as $image) {
                $newFileName = "announcement/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);
                RemoveFaces::withChain([
                    new Watermark($newImage->id),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                    new ResizeImage($newImage->path, 400, 500),
                ])->dispatch($newImage->id);

                // Invia la job Watermark separatamente dopo che tutte le altre operazioni sono state completate
                // Watermark::dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        session()->flash('message', __('ui.messageAsdAccepted'));
        $this->announcement_revisor_counter = Announcement::toBeRevisionedCount();
        session()->flash('message', 'Annuncio creato con successo! Verrà pubblicato solamente dopo la revisione');
        $this->clearForm();
    }

    public function render()
    {
        $categories = Category::all()->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->translatedName(),
            ];
        });

        return view('livewire.form-create', [
            'categories' => $categories,
        ]);
    }

    public function updatedTemporaryImages()
    {
        if ($this->validate(['temporary_images.*' => 'image|max:1024'])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function clearForm()
    {
        $this->title = '';
        $this->price = '';
        $this->description = '';
        $this->images = [];
        $this->temporary_images = [];
        $this->category_id = '';
    }

}