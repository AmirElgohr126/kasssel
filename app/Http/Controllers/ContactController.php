<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function insertContact(Request $request)
    {
        $vaildatedData = $request->validate([
        'name' => ['required','string'],
        'email' => ['required','string','email'],
        'phone' => ['required','numeric'],
        'message' => ['required','string']
        ]);

        $data = Contact::create($vaildatedData);

        if(!$data){
            return finalResponse('failed',400,null,null,'something error happen contact to backend');
        }

        return finalResponse('success', 200, 'data inserted successfully');

    }
}

