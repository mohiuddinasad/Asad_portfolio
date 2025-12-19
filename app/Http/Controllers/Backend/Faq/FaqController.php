<?php

namespace App\Http\Controllers\Backend\Faq;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function create()
    {

        return view('backends.faq.faqCreate');
    }

    public function faqStore(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);
        // Here you would typically store the FAQ in the database
        $faqs = new Faq(); // Assuming you have an Faq model
        $faqs->question = $request->question;
        $faqs->answer = $request->answer;
        $faqs->save();

        return redirect()->back()->with('success', 'FAQ stored successfully!');
    }

    public function faqList()
    {
        $faqs = Faq::all(); // Retrieve all FAQs from the database
        return view('backends.faq.faqList', compact('faqs'));
    }
    public function faqDelete($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->back()->with('success', 'FAQ deleted successfully!');
    }

    public function faqEdit($id)
    {
        $faq = Faq::find($id);
        return view('backends.faq.faqEdit', compact('faq'));
    }

    public function faqUpdate(Request $request, $id)
    {
        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save(); // don’t forget to save changes!

        return redirect()->back()->with('success', 'FAQ updated successfully!');
    }


}
