<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Mail\MakeMailPippo;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;



class RevisorController extends Controller
{

    protected $categoryTranslations;

    public function __construct()
    {
        $this->categoryTranslations = App::make('categoryTranslations');
    }


    public function index()
    {
        $logged_in_reviewer_id = Auth::id();
        // voglio passare i primi 5 annunci
        /* $announcement_to_check = Announcement::where('is_accepted', null)->orderBy('created_at', 'desc')->take(5)->get(); */
        $announcement_to_check = Announcement::where('is_accepted', null)
        ->where('user_id', '!=', $logged_in_reviewer_id)
        ->orderBy('updated_at', 'desc')
        ->first();
        
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
    
        
        if ($announcement_to_check && $announcement_to_check->category !== null) {
            $translatedCategory = $categoryTranslations[$announcement_to_check->category->name] ?? $announcement_to_check->category->name;
        } else {
            $translatedCategory = 'Nessuna categoria';
        }
        
        return view('dashboard-revisore', compact('announcement_to_check','translatedCategory'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {

        $announcement->setAccepted(true);
        return redirect()->back()->with('success',  __('ui.messageAsdAccepted') );
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('denied', __('ui.messageAsdRejected'));
    }

    public function becomeRevisor()
    {

        $user = Auth::user();
        Mail::to('admin@presto.it')->send(new BecomeRevisor($user));
        return redirect()->back()->with('message', __('ui.messageBecomeRevisor'));
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email" => $user->email]);
        return redirect('/')->with('message', __('ui.messageIsRevisor'));
    }


}