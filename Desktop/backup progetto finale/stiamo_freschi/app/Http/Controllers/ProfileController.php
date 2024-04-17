<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Requests\EditProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\password;

class ProfileController extends Controller
{
    public function index()
    {

        $myAnnouncements = auth()->user()->announcements()
            ->where('is_accepted', true)
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('profile', ['myAnnouncements' => $myAnnouncements]);
    }

    public function goToEdit()
    {
        return view('modifica-profilo');
    }

    public function update(EditProfile $request)
    {
        $user = Auth::user();
        $validateData = $request->validated();
        
        // Verifica se la password corrente è stata fornita e se è corretta
        if ($request->filled('current_password')) {
            // Verifica che la password corrente fornita dall'utente sia corretta
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'La password corrente non è corretta.'])->withInput();
            }
        }
    
        // Se la nuova password è stata fornita e valida, aggiorna la password
        if ($request->filled('password')) {
            $validateData['password'] = Hash::make($validateData['password']);
        } else {
            // Se il campo password è vuoto, non modificarlo
            unset($validateData['password']);
        }
    
        // Aggiorna gli altri campi del profilo
        $user->update($validateData);
        
        // GESTIONE IMMAGINE
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $file_name = $user->id . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profile_images', $file_name);
            
            // Crea una nuova istanza di Image e salvala nel database
            $image = new Image(['path' => $file_name]);
            $image->save();
    
            // Controlla se l'utente ha già un'immagine associata
            if ($user->image) {
                // Ottieni l'immagine associata all'utente
                $old_image = $user->image;
                // Rimuovi l'associazione tra l'utente e l'immagine
                $user->image_id = null;
                $user->save();
                $old_image->delete();
            }
            // Aggiorna l'ID dell'immagine per l'utente
            $user->image_id = $image->id;
            $user->save();
        }
        return redirect()->back()->with('message', 'Profilo modificato con successo');
    }
    
}
