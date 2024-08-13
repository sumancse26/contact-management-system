<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function getAllContact()
    {
        $contacts = DB::table('contacts')->get();

        return view('index', ['contacts' => $contacts]);
    }
    public function navigateToContactForm()
    {

        return view('create');
    }

    public function saveContact(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20|min:11',
                'address' => 'nullable|string|max:255',
            ],
            [
                'name.required' => 'Please enter your name.',
                'email.email' => 'The email must be a valid email address.',
                'email.required' => 'Please enter your email address.',
                'phone.max' => 'The phone number can not have more than 16 digits.',
                'phone.min' => 'The phone number must have 11 digits.',
            ]
        );

        try {
            DB::table('contacts')->insert(
                [
                    "name" => $request->input('name'),
                    "email" => $request->input('email'),
                    "phone" => $request->input('phone'),
                    "address" => $request->input('address')
                ]
            );

            return redirect()->route('get.contact')->with('success', 'Contact created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('get.contact')->with('error', 'Failed to create contact. Please try again.');
        }
    }

    public function getSingleContact($id)
    {
        $singleContact = DB::table('contacts')
            ->where('id', '=', $id)
            ->first();

        return view('edit', ['contact' => $singleContact]);
    }

    public function showSingleContact($id)
    {
        $specificContact = DB::table('contacts')
            ->where('id', '=', $id)
            ->first();

        return view('show', ['contact' => $specificContact]);
    }

    public function updateContact(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email:rfc,dns',
                'phone' => 'nullable|string|max:20|min:11',
                'address' => 'nullable|string|max:255',
            ],
        );

        try {
            DB::table('contacts')
                ->where('id', '=', $id)
                ->update([
                    "name" => $request->input('name'),
                    "email" => $request->input('email'),
                    "phone" => $request->input('phone'),
                    "address" => $request->input('address')
                ]);

            return redirect()->route('get.contact')->with('success', 'Contact updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('get.contact')->with('error', 'Failed to update contact. Please try again.');
        }
    }

    public function deleteContact($id)
    {
        $deleted = DB::table('contacts')
            ->where('id', '=', $id)
            ->delete();

        return redirect()->route('get.contact')->with('success', 'Contact deleted successfully!');
    }

    public function searchContact(Request $req)
    {
        $searchQuery = $req->input('query');
        $sort = $req->input('sort', 'name');
        $direction = $req->input('direction', 'asc');

        $searchedContacts = DB::table('contacts')
            ->where('name', 'LIKE', "%{$searchQuery}%")
            ->orWhere('email', 'LIKE', "%{$searchQuery}%")
            ->orderBy($sort, $direction)
            ->get();

        return view('index', ['contacts' => $searchedContacts]);
    }
}
