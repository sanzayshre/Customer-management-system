<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    //
    protected $data = [];

    function __construct()
    {
        $this->data['title'] = 'Customer management';
    }

    function index()
    {
        $this->data['title'] = 'Home';
        $studentData = Customer::orderBy('id', 'desc')->paginate(5);
        return view('welcome', compact('studentData'), $this->data);
    }

    function addUser(Request $request)
    {
        if ($request->isMethod('get')) {

            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'customerName' => 'required|min:3',
                'email' => 'email',
                'image' => 'mimes:jpeg,jpg,png,gif',
            ]);
            $data['customerName'] = $request->customerName;
            $data['address'] = $request->address;
            $data['organization'] = $request->organization;
            $data['email'] = $request->email;
            $data['mobile'] = $request->mobile;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $imageName = str::random(10) . '.' . $ext;
                $uploadPath = public_path('lib/images/');
                $image->move($uploadPath, $imageName);
                $data['image'] = $imageName;
            }

            //dd($data);
            if (Customer::create($data)) { //User is a model
                return redirect()->route('home')->with('success', 'Record is inserted');

            }


        }
    }

    public function deleteUser(Request $request){
        $id=$request->user_id;

        if($this->deleteImage($id) && Customer::findOrFail($id)->delete()){
            return redirect()->route('home')->with('success', 'Record is deleted.');
        }

    }
    public function deleteImage($id){
        $userData=Customer::findOrFail($id);
        $imageName=$userData->image;
        $deletePath=public_path('lib/images'.$imageName);
        if(file_exists($deletePath)){
            return unlink($deletePath);
        }
        return true;
    }
    public function editUser(Request $request){
        $this->data['title'] = 'Edit';
        $id=$request->user_id;
        $editRecord=Customer::findOrFail($id);
        return view('edit_customer', compact('editRecord'),$this->data);
    }
    public function editAction(Request $request){
        if ($request->isMethod('get')) {

            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'customerName' => 'required|min:3',
                'email' => 'email',
                'image' => 'mimes:jpeg,jpg,png,gif']);

            $data['customerName'] = $request->customerName;
            $data['address'] = $request->address;
            $data['organization'] = $request->organization;
            $data['email'] = $request->email;
            $data['mobile'] = $request->mobile;
            $id=$request->student_id;
            echo $id;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $imageName = str::random(10) . '.' . $ext;
                $uploadPath = public_path('lib/images/');
                if ($this->deleteImage($id) && $image->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;
                }
            }
            if(Customer::where('id', $id)->update($data)){
                return redirect()->route('home')->with('success', 'Record is edited
                successfully');
            }



        }
    }



}
