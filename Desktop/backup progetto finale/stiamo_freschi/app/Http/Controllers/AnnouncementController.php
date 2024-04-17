<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Providers\CategoryTranslationsProvider;

class AnnouncementController extends Controller
{

    protected $categoryTranslations;

    public function __construct()
    {
        $this->categoryTranslations = App::make('categoryTranslations');
    }
    
    public function indexByCategory($id)
    {
        $categories = Category::all();
        $thisCategory = Category::find($id)->name;

        $currentTranslations = $this->categoryTranslations[App::getLocale()];

        $categoryTranslations = [
            'Sport' => $currentTranslations['Sport'],
            'Elettronica' => $currentTranslations['Elettronica'],
            'Musica' => $currentTranslations['Musica'],
            'Casa' => $currentTranslations['Casa'],
            'Giardino' => $currentTranslations['Giardino'],
            'Fai da te' => $currentTranslations['Fai da te'],
            'Abbigliamento' => $currentTranslations['Abbigliamento'],
            'Accessori' => $currentTranslations['Accessori'],
            'Gioielli' => $currentTranslations['Gioielli'],
        ];

        $announcements = Announcement::where('category_id', $id)->where('is_accepted', true)->orderBy('updated_at', 'desc')->get();

        $announcements->transform(function ($announcement) use ($categoryTranslations) {
            $translatedCategory = $categoryTranslations[$announcement->category->name] ?? 'Nessuna categoria';
            $announcement->translatedCategory = $translatedCategory;
            return $announcement;
        });
        return view('search-bycategory', compact('announcements', 'categories', 'thisCategory'));
    }

    public function searchAnnouncements(Request $request)
    {
        /* dd($request->all());  */
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(8);
        /*   dd($announcements); */
        $categories = Category::all();
        return view('homepage', compact('announcements', 'categories'));
    }
    
    public function show(Announcement $announcement)
    {
        $currentTranslations = $this->categoryTranslations[App::getLocale()] ?? [];

        $categoryTranslations = [
            'Sport' => $currentTranslations['Sport'],
            'Elettronica' => $currentTranslations['Elettronica'],
            'Musica' => $currentTranslations['Musica'],
            'Casa' => $currentTranslations['Casa'],
            'Giardino' => $currentTranslations['Giardino'],
            'Fai da te' => $currentTranslations['Fai da te'],
            'Abbigliamento' => $currentTranslations['Abbigliamento'],
            'Accessori' => $currentTranslations['Accessori'],
            'Gioielli' => $currentTranslations['Gioielli'],
        ];

        $categoryAnnouncement = $categoryTranslations[$announcement->category->name] ?? $announcement->category->name;

        $announcementOfCategory = Announcement::where('category_id', $announcement->category_id)->where('is_accepted', true)->where('id', '!=', $announcement->id)->orderBy('updated_at', 'desc')->get();
        
        $announcementOfCategory->transform(function ($announcement) use ($categoryTranslations) {
            $translatedCategory = $categoryTranslations[$announcement->category->name] ?? 'Nessuna categoria';
            $announcement->translatedCategory = $translatedCategory;
            return $announcement;
        });
        
        $categories = Category::all();
        $announcementShow = $announcement;

        return view('announcement-show', compact('announcementShow', 'categoryAnnouncement', 'categories','announcementOfCategory'));
    }







    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->back()->with('message', 'Annuncio eliminato con successo!');
    }
}
