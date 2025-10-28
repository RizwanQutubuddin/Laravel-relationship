<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Student;
use Illuminate\Http\Request;


class RelationshipController extends Controller
{
    public function oneToOne()
    {
        return Student::with('contact')->where('age','>','15')->whereHas('contact',function($e){
            $e->where('city','mumbai');
        })->get();
       
    }

    public function belongsTo()
    {
        return Contact::with('student')
        ->where('city','mumbai')
        ->whereHas('student',function($e){
            $e->where('age','>','19');
        })
        ->get();
        
    }

    // create data by relationship
    public function create(){
        $student = Student::create(
            [
            'name' => 'Ramesh',
            'age' => 25,
            'gender' => 'Male'
            ]
        );

        $student->contact()->create([
            'city'=>'Chennai',
            'phone'=>'9555534223',
        ]);

        return "Student and Contact created";

    }
   
    function issueBook(){
        $book=new Book([
            'name' => 'Science',
            'date_of_issue' => '2024-01-02',
        ]);  
        $student = Student::find(3);
        $student->book()->save($book);
        return "Book issued:".$student;
    }

    public function oneToMany()
    {
        return Student::select("name","age","gender")->withCount('book')->with('book')
        // ->doesnthave('book')
        // ->select('name','age','gender')
        // ->where('id','2')
        // ->whereHas('book',function($e){
        //     $e->where("date_of_issue", "2024-01-02");
        // })
        ->get();
        return view('one-to-many');
    }

    public function belongsToMany()
    {
        return Book::with('student')
        // ->where('id','1')
        // ->WhereHas('student',function($e){
        //     $e->where('id','1');
        // })
        ->get();
    }   

    //many to many user to role
    public function manyToMany()
    {
        $users = User::get();

        foreach($users as $user){
            echo $user->name."<br>";
            echo $user->email."<br>";
            foreach($user->roles as $role){
                echo $role->role."<br>";
            }
            echo "<br><br>";
        }
    }

    //many to many role to user
    public function manyToManyReverse()
    {
        $roles = Role::get();
       
        foreach($roles as $role){
            echo $role->role."<br>";
            foreach($role->users as $user){
                echo $user->name."<br>";
                echo $user->email."<br>";
            }
            echo "<br><br>";
        }
    }

    //many to many create/update/delete record
    public function manyToManyCreate(){
        $user = User::find(1);
        $role = Role::find(3);
        
        // $user->roles()->attach($role);// for single record
        // $user->roles()->attach([2,3]);// for multiple record
        // $user->roles()->detach([3]);// to remove record
        $user->roles()->sync([1]);// to remove other and keep only mentioned record    
        return "Role assigned to user";
    }

    // Has one through relationship
    public function hasOneThrough(){
        $users = User::with('company')->with('companyPhoneNnumber')->find(1);
        return $users;
    }

    // Has many through relationship
    public function hasManyThrough(){
        $country = Country::with('posts')->with('users')->get();

        return $country;
    }

    // Has one relationship latest order
    public function hasOneLatest(){
        $orders = User::with('latestOrder')->find(2);
        return $orders;
    }

    // Has one relationship oldest order
    public function hasOneOldest(){
        $orders = User::with('oldestOrder')->find(2);
        return $orders;
    }

    // Has one relationship largest order
    public function hasOneLargest(){
        $orders = User::with('largestOrder')->find(2);
        return $orders;
    }

    // Has one relationship smalest order
    public function hasOneSmallest(){
        $orders = User::with('smallestOrder')->find(2);
        return $orders;
    }

    // Has one relationship order-latestOrder-largestOrder
    public function hasManyOrders(){
        $orders = User::with('orders')->with('latestOrder')->with('largestOrder')->get();
        return $orders;
    }



    public function polymorphic()
    {
        return view('polymorphic');
    }

    public function polymorphicMany()
    {
        return view('polymorphic-many');
    }   
}
