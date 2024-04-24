<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class AboutusController extends Controller
{
    public function index()
    {
        $about = About::first();
        if (!$about) {
            $about = new About(); // If the record does not exist, create a new instance
        }
        // $about = About::first();
        return view('admin.about.index', compact('about'));
    }


    public function store_5(Request $request)
    {
        $about = About::first();
        // if (!$about) {
        //     $about = new About(); // If the record does not exist, create a new instance
        // }
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $filename1 = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/slider/about1/', $filename1);

            $about->image1 =  "uploads/slider/about1/" . $filename1;
            $about->title1 =  $request->title1;
            $about->description1 =  $request->description1;
            $about->update();

        }
         else if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $filename2 = time() . '1.' . $file->getClientOriginalExtension();
            $file->move('uploads/slider/about2/', $filename2);

            $about->image2 =  "uploads/slider/about2/" . $filename2;
            $about->title2 =  $request->title2;
            $about->description2 =  $request->description2;
            $about->update();
        }
         else if ($request->hasFile('card_image')) {
            $file = $request->file('card_image');
            $filename3 = time() . '2.' . $file->getClientOriginalExtension();
            $file->move('uploads/slider/about3/', $filename3);

            $about->card_image =  "uploads/slider/about3/" . $filename3;
            $about->card_title =  $request->card_title;
            $about->card_description =  $request->card_description;
            $about->update();
        }
        else if ($request->hasFile('card_image1')) {
            $file = $request->file('card_image1');
            $filename4 = time() . '3.' . $file->getClientOriginalExtension();
            $file->move('uploads/slider/about4/', $filename4);

            $about->card_image1 =  "uploads/slider/about4/" . $filename4;
            $about->card_title1 =  $request->card_title1;
            $about->card_description1 =  $request->card_description1;
            $about->update();
        }
        else if ($request->hasFile('card_image2')) {
            $file = $request->file('card_image2');
            $filename5 = time() . '4.' . $file->getClientOriginalExtension();
            $file->move('uploads/slider/about5/', $filename5);

            $about->card_image2 =  "uploads/slider/about5/" . $filename5;
            $about->card_title2 =  $request->card_title2;
            $about->card_description2 =  $request->card_description2;
            $about->update();
        }
        else {
            $data = [
                'title1'  => $request->title1,
                'description1'  => $request->description1,
                // 'image1' => $request->card_title,
                // 'image2' => $request->card_title,
                'title2'  => $request->title2,
                'description2'  => $request->description2,
                'card_title'  => $request->card_title,
                'card_description'  => $request->card_description,
                // 'card_image'  => $request->card_image,
                'card_title1'  => $request->card_title1,
                'card_description1'  => $request->card_description1,
                // 'card_image1'  => $request->card_image1,
                'card_title2'  => $request->card_title2,
                'card_description2'  => $request->card_description2,
                // 'card_image2' => $request->card_image2
            ];
            $about->fill($data)->save();
        }
        return redirect()->back()->with('message', 'Settings Saved');
    }
}




















































 // public function store_5(Request $request)
 // {
 //     $about = About::first();
 //     if (!$about) {
 //         $about = new About(); // If the record does not exist, create a new instance
 //     }
 //     if ($request->hasFile('card_image')) {
 //         $file = $request->file('card_image');
 //         $filename3 = time().'.'.$file->getClientOriginalExtension();
 //         $file->move('uploads/slider/about3/',$filename3);
 //         $data = [
 //             'card_image'  => "uploads/slider/about3/".$filename3, //         ];
 //         $about->update($data);
 //     } else {
 //         $data = [
 //             'title1'  => $request->title1,
 //             'description1'  => $request->description1,
 //             'image1'=> $request->card_title,
 //             'image2'=> $request->card_title,
 //             'title2'  => $request->title2,
 //             'description2'  => $request->description2,
 //             'card_title'  => $request->card_title,
 //             'card_description'  => $request->card_description,
 //             // 'card_image'  => $request->card_image,
 //             'card_title1'  => $request->card_title1,
 //             'card_description1'  => $request->card_description1,
 //             'card_image1'  => $request->card_image1,
 //             'card_title2'  => $request->card_title2,
 //             'card_description2'  => $request->card_description2,
 //             'card_image2' => $request->card_image2
 //         ];
 //         $about->fill($data)->save();
 //     }
 //     return redirect()->back()->with('message', 'Settings Saved');
 // }





  // public function store(Request $request)
    // {
    //     $about = About::first();
    //     if (!$about) {
    //         $about = new About(); // If the record does not exist, create a new instance
    //     }

    //     if ($request->hasFile('image1')) {
    //         $file = $request->file('image1');
    //         $filename = time() . '.'.$file->getClientOriginalExtension();
    //         $file->move('uploads/slider/about1/', $filename);
    //         $data = [
    //             'image1'  => "uploads/slider/about1/".$filename,
    //         ];
    //         $about->update($data);
    //     } else {
    //         $data = [
    //             'title1'  => $request->title1,
    //             'description1'  => $request->description1,
    //             // 'image1'  => $request->image1,
    //             'title2'  => $request->title2,
    //             'description2'  => $request->description2,
    //             'image2'  => $request->image2,
    //             'card_title'  => $request->card_title,
    //             'card_description'  => $request->card_description,
    //             'card_image'  => $request->card_image,
    //             'card_title1'  => $request->card_title1,
    //             'card_description1'  => $request->card_description1,
    //             'card_image1'  => $request->card_image1,
    //             'card_title2'  => $request->card_title2,
    //             'card_description2'  => $request->card_description2,
    //             'card_image2' => $request->card_image2
    //         ];
    //         $about->fill($data)->save();
    //     }
    //     return redirect()->back()->with('message', 'Settings Saved');
    // }




  // public function store(Request $request)
    // {
    //     $about = About::first();
    //     if (!$about) {
    //         $about = new About(); // If the record does not exist, create a new instance
    //     }

    //     if ($request->hasFile('image1')) {
    //         $file = $request->file('image1');
    //         $filename = time() . '.'.$file->getClientOriginalExtension();
    //         $file->move('uploads/slider/about1/', $filename);
    //         $data = [
    //             'image1'  => "uploads/slider/about1/".$filename,
    //         ];
    //         $about->update($data);
    //     } else {
    //         $data = [
    //             'title1'  => $request->title1,
    //             'description1'  => $request->description1,
    //             // 'image1'  => $request->image1,
    //             'title2'  => $request->title2,
    //             'description2'  => $request->description2,
    //             'image2'  => $request->image2,
    //             'card_title'  => $request->card_title,
    //             'card_description'  => $request->card_description,
    //             'card_image'  => $request->card_image,
    //             'card_title1'  => $request->card_title1,
    //             'card_description1'  => $request->card_description1,
    //             'card_image1'  => $request->card_image1,
    //             'card_title2'  => $request->card_title2,
    //             'card_description2'  => $request->card_description2,
    //             'card_image2' => $request->card_image2
    //         ];
    //         $about->fill($data)->save();
    //     }
    //     return redirect()->back()->with('message', 'Settings Saved');
    // }









//     public function store(Request $request)
//     {
//         $about = About::firstOrNew();


//         if ($request->hasFile('image1')) {
//             $file1 = $request->file('image1');
//             $filename1 = time() . '.'.$file1->getClientOriginalExtension();
//             $file1->move('uploads/slider/about1/', $filename1);
//             $about->image1 = "uploads/slider/about1/".$filename1;
//         }


//         if ($request->hasFile('image2')) {
//             $file2 = $request->file('image2');
//             $filename2 = time() . '2.'.$file2->getClientOriginalExtension();
//             $file2->move('uploads/slider/about2/', $filename2);
//             $about->image2 = "uploads/slider/about2/".$filename2;
//         }

//         if ($request->hasFile('card_image')) {
//             $file3 = $request->file('card_image');
//             $filename3 = time() . '3.'.$file3->getClientOriginalExtension();
//             $file3->move('uploads/slider/about3/', $filename3);
//             $about->card_image = "uploads/slider/about3/".$filename3;
//         }

//         if ($request->hasFile('card_image1')) {
//             $file4 = $request->file('card_image2');
//             $filename4 = time() . '4.'.$file4->getClientOriginalExtension();
//             $file4->move('uploads/slider/about4/', $filename4);
//             $about->card_image1 = "uploads/slider/about4/".$filename4;
//         }

//         if ($request->hasFile('card_image2')) {
//             $file5 = $request->file('card_image2');
//             $filename5 = time() . '5.'.$file5->getClientOriginalExtension();
//             $file5->move('uploads/slider/about5/', $filename5);
//             $about->card_image2 = "uploads/slider/about5/".$filename5;
//         }

//         $about->title1 = $request->input('title1');
//         $about->description1 = $request->input('description1');
//         $about->title2 = $request->input('title2');
//         $about->description2 = $request->input('description2');
//         $about->card_title = $request->input('card_title');
//         $about->card_description = $request->input('card_description');
//         $about->card_image = $request->input('card_image');
//         $about->card_title1 = $request->input('card_title1');
//         $about->card_description1 = $request->input('card_description1');
//         $about->card_image1 = $request->input('card_image1');
//         $about->card_title2 = $request->input('card_title2');
//         $about->card_description2 = $request->input('card_description2');
//         $about->card_image2 = $request->input('card_image2');



//         $about->save();



//         return redirect()->back()->with('message', 'Settings Saved');
//     }
// }




















































//     public function store_5(Request $request)
//  {
//      $about = About::first();
//      if (!$about) {
//          $about = new About(); // If the record does not exist, create a new instance
//      }
//      if ($request->hasFile('card_image')) {
//          $file = $request->file('card_image');
//          $filename3 = time().'.'.$file->getClientOriginalExtension();
//          $file->move('uploads/slider/about3/',$filename3);
//          $data = ['card_image'  => "uploads/slider/about3/".$filename3,];
//         $about->update($data);
//      } else {
//          $data = [
//              'title1'  => $request->title1,
//              'description1'  => $request->description1,
//              'image1'=> $request->card_title,
//              'image2'=> $request->card_title,
//              'title2'  => $request->title2,
//              'description2'  => $request->description2,
//              'card_title'  => $request->card_title,
//              'card_description'  => $request->card_description,
//              // 'card_image'  => $request->card_image,
//              'card_title1'  => $request->card_title1,
//              'card_description1'  => $request->card_description1,
//              'card_image1'  => $request->card_image1,
//              'card_title2'  => $request->card_title2,
//              'card_description2'  => $request->card_description2,
//              'card_image2' => $request->card_image2
//          ];
//          $about->fill($data)->save();
//      }
//      return redirect()->back()->with('message', 'Settings Saved');
//  }



//   public function store(Request $request)
//     {
//         $about = About::first();
//         if (!$about) {
//             $about = new About(); // If the record does not exist, create a new instance
//         }

//         if ($request->hasFile('image1')) {
//             $file = $request->file('image1');
//             $filename = time() . '.'.$file->getClientOriginalExtension();
//             $file->move('uploads/slider/about3/', $filename);
//             $data = ['image1'  => "uploads/slider/about3/".$filename,];
//             $about->update($data);
//         } else {
//             $data = [
//                 'title1'  => $request->title1,
//                 'description1'  => $request->description1,
//                 // 'image1'  => $request->image1,
//                 'title2'  => $request->title2,
//                 'description2'  => $request->description2,
//                 'image2'  => $request->image2,
//                 'card_title'  => $request->card_title,
//                 'card_description'  => $request->card_description,
//                 'card_image'  => $request->card_image,
//                 'card_title1'  => $request->card_title1,
//                 'card_description1'  => $request->card_description1,
//                 'card_image1'  => $request->card_image1,
//                 'card_title2'  => $request->card_title2,
//                 'card_description2'  => $request->card_description2,
//                 'card_image2' => $request->card_image2
//             ];
//             $about->fill($data)->save();
//         }
//         return redirect()->back()->with('message', 'Settings Saved');
//     }
//

























 // public function store(Request $request)
 // {
 //     $about = About::first();
 //     if (!$about) {
 //         $about = new About(); // If the record does not exist, create a new instance
 //     }
 //     if ($request->hasFile('image1')) {
 //         $file = $request->file('image1');
 //         $filename = time().'.'.$file->getClientOriginalExtension();
 //         $file->move('uploads/slider/about1/',$filename);
 //         $data = [
 //             'image1'  => "uploads/slider/about1/".$filename,
 //         ];
 //         $about->update($data);
 //     } else {
 //         $data = [
 //             'title1'  => $request->title1,
 //             'description1'  => $request->description1,
 //             // 'image1'  => $request->title2,
 //             'title2'  => $request->title2,
 //             'description2'  => $request->description2,
 //             'image2'  => $request->title2,
 //             'card_title'  => $request->card_title,
 //             'card_description'  => $request->card_description,
 //             'card_image'  => $request->card_image,
 //             'card_title1'  => $request->card_title1,
 //             'card_description1'  => $request->card_description1,
 //             'card_image1'  => $request->card_image1,
 //             'card_title2'  => $request->card_title2,
 //             'card_description2'  => $request->card_description2,
 //             'card_image2' => $request->card_image2
 //         ];
 //         $about->fill($data)->save();
 //     }
 //     return redirect()->back()->with('message', 'Settings Saved');
 // }










    // public function store_2(Request $request)
    // {
    //     $about = About::first();
    //     if (!$about) {
    //         $about = new About(); // If the record does not exist, create a new instance
    //     }

    //     if ($request->hasFile('image2')) {
    //         $file = $request->file('image2');
    //         $filename1 = time() . '.'.$file->getClientOriginalExtension();
    //         $file->move('uploads/slider/about2/', $filename1);
    //         $data = [
    //             'image2'  => "uploads/slider/about2/".$filename1,
    //         ];
    //         $about->update($data);
    //     } else {
    //         $data = [
    //             'title1'  => $request->title1,
    //             'description1'  => $request->description1,
    //             'image1'  => $request->image1,
    //             'title2'  => $request->title2,
    //             // 'image2'  => $request->image2,
    //             'description2'  => $request->description2,
    //             'card_title'  => $request->card_title,
    //             'card_description'  => $request->card_description,
    //             'card_image'  => $request->card_image,
    //             'card_title1'  => $request->card_title1,
    //             'card_description1'  => $request->card_description1,
    //             'card_image1'  => $request->card_image1,
    //             'card_title2'  => $request->card_title2,
    //             'card_description2'  => $request->card_description2,
    //             'card_image2' => $request->card_image2
    //         ];
    //         $about->fill($data)->save();
    //     }
    //     return redirect()->back()->with('message', 'Settings Saved');
    // }
    // public function store_3(Request $request)
    // {
    //     $about = About::first();
    //     if (!$about) {
    //         $about = new About(); // If the record does not exist, create a new instance
    //     }

    //     if ($request->hasFile('card_image2')) {
    //         $file = $request->file('card_image2');
    //         $filename2 = time() . '.'.$file->getClientOriginalExtension();
    //         $file->move('uploads/slider/about3/', $filename2);
    //         $data = [
    //             'card_image2'  => "uploads/slider/about3/".$filename2,
    //         ];
    //         $about->update($data);
    //     } else {
    //         $data = [
    //             'title1'  => $request->title1,
    //             'description1'  => $request->description1,
    //             'title2'  => $request->title2,
    //             'description2'  => $request->description2,
    //             'card_title'  => $request->card_title,
    //             'card_description'  => $request->card_description,
    //             'image1'=> $request->card_title,
    //             'image2'=> $request->card_title,
    //             'card_title1'  => $request->card_title1,
    //             'card_description1'  => $request->card_description1,
    //             'card_image1'  => $request->card_image1,
    //             'card_title2'  => $request->card_title2,
    //             'card_description2'  => $request->card_description2,
    //             // 'card_image2' => $request->card_image2
    //         ];
    //         $about->fill($data)->save();
    //     }
    //     return redirect()->back()->with('message', 'Settings Saved');
    // }
    // public function store_4(Request $request)
    // {
    //     $about = About::first();


    //     if ($request->hasFile('card_image1')) {
    //         $file = $request->file('card_image1');
    //         $filename3 = time() . '.'.$file->getClientOriginalExtension();
    //         $file->move('uploads/slider/about4/', $filename3);
    //         $data = [
    //             'card_image1'  => "uploads/slider/about4/".$filename3,
    //         ];
    //         $about->update($data);
    //     } else {
    //         $data = [
    //             'title1'  => $request->title1,
    //             'description1'  => $request->description1,
    //             'title2'  => $request->title2,
    //             'image1'=> $request->card_title,
    //             'image2'=> $request->card_title,
    //             'description2'  => $request->description2,
    //             'card_title'  => $request->card_title,
    //             'card_description'  => $request->card_description,
    //             'card_image'  => $request->card_image,
    //             'card_title1'  => $request->card_title1,
    //             'card_description1'  => $request->card_description1,
    //             // 'card_image1'  => $request->card_image1,
    //             'card_title2'  => $request->card_title2,
    //             'card_description2'  => $request->card_description2,
    //             'card_image2' => $request->card_image2
    //         ];
    //         $about->fill($data)->save();
    //     }
    //     return redirect()->back()->with('message', 'Settings Saved');
    // }

 // public function store_5(Request $request)
 // {
 //     $about = About::first();
 //     if (!$about) {
 //         $about = new About(); // If the record does not exist, create a new instance
 //     }
 //     if ($request->hasFile('card_image')) {
 //         $file = $request->file('card_image');
 //         $filename3 = time().'.'.$file->getClientOriginalExtension();
 //         $file->move('uploads/slider/about3/',$filename3);
 //         $data = [
 //             'card_image'  => "uploads/slider/about3/".$filename3, //         ];
 //         $about->update($data);
 //     } else {
 //         $data = [
 //             'title1'  => $request->title1,
 //             'description1'  => $request->description1,
 //             'image1'=> $request->card_title,
 //             'image2'=> $request->card_title,
 //             'title2'  => $request->title2,
 //             'description2'  => $request->description2,
 //             'card_title'  => $request->card_title,
 //             'card_description'  => $request->card_description,
 //             // 'card_image'  => $request->card_image,
 //             'card_title1'  => $request->card_title1,
 //             'card_description1'  => $request->card_description1,
 //             'card_image1'  => $request->card_image1,
 //             'card_title2'  => $request->card_title2,
 //             'card_description2'  => $request->card_description2,
 //             'card_image2' => $request->card_image2
 //         ];
 //         $about->fill($data)->save();
 //     }
 //     return redirect()->back()->with('message', 'Settings Saved');
 // }





  // public function store(Request $request)
    // {
    //     $about = About::first();
    //     if (!$about) {
    //         $about = new About(); // If the record does not exist, create a new instance
    //     }

    //     if ($request->hasFile('image1')) {
    //         $file = $request->file('image1');
    //         $filename = time() . '.'.$file->getClientOriginalExtension();
    //         $file->move('uploads/slider/about1/', $filename);
    //         $data = [
    //             'image1'  => "uploads/slider/about1/".$filename,
    //         ];
    //         $about->update($data);
    //     } else {
    //         $data = [
    //             'title1'  => $request->title1,
    //             'description1'  => $request->description1,
    //             // 'image1'  => $request->image1,
    //             'title2'  => $request->title2,
    //             'description2'  => $request->description2,
    //             'image2'  => $request->image2,
    //             'card_title'  => $request->card_title,
    //             'card_description'  => $request->card_description,
    //             'card_image'  => $request->card_image,
    //             'card_title1'  => $request->card_title1,
    //             'card_description1'  => $request->card_description1,
    //             'card_image1'  => $request->card_image1,
    //             'card_title2'  => $request->card_title2,
    //             'card_description2'  => $request->card_description2,
    //             'card_image2' => $request->card_image2
    //         ];
    //         $about->fill($data)->save();
    //     }
    //     return redirect()->back()->with('message', 'Settings Saved');
    // }
