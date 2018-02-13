<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Project;
use Intervention\Image\Facades\Image as Image;

class MainController extends Controller
{
    public function start(Request $request)
    {
        return view('admin.start');
    }

    public function ofirmie(Request $request)
    {
        $data = [
            'settings' => Setting::where('group', 'ofirmie')->get()
        ];
        return view('admin.ofirmie')->with($data);
    }

    public function oferta(Request $request)
    {
        $data = [
            'settings' => Setting::where('group', 'oferta')->get()
        ];
        return view('admin.oferta')->with($data);
    }

    public function projekty(Request $request)
    {
        $data = [
            'projects' => Project::all()
        ];
        return view('admin.projekty')->with($data);
    }

    public function kontakt(Request $request)
    {
        $data = [
            'settings' => Setting::where('group', 'kontakt')->get()
        ];
        return view('admin.kontakt')->with($data);
    }

    public function dojazd(Request $request)
    {
        $data = [
            'settings' => Setting::where('group', 'dojazd')->get()
        ];
        return view('admin.dojazd')->with($data);
    }

    public function ustawienia(Request $request)
    {
        $data = [
            'settings' => Setting::where('group', 'pageMeta')->get()
        ];
        return view('admin.ustawienia')->with($data);
    }







    public function destroyProject(Request $request)
    {
        $data = [];
        $data['status'] = false;

        if ($request->has('id')) {
            $id = intval( $request->get('id') );
            $item = Project::find($id);
            if ($item) {
                if (file_exists( public_path('/img/projects/' . $item->image) )) unlink( public_path('/img/projects/' . $item->image) );
                if (file_exists( public_path('/img/projects/thumb/' . $item->thumb) )) unlink( public_path('/img/projects/thumb/' . $item->thumb) );
                $item->delete();
                $data['status'] = true;
            }
        }

        return $data;
    }

    public function editProject(Request $request)
    {
        $data = [];
        $data['status'] = false;

        if ($request->has('id')) {
            // $item = $request->get('id');
            $id = intval( $request->get('id') );
            $gallery = Project::find($id);
            if ($gallery) {
                if ( $request->file('image') ) {
                    $image = $request->file('image');
                    if (file_exists( public_path('/img/projects/' . $gallery->image) )) unlink( public_path('/img/projects/' . $gallery->image) );
                    // $imageExt = $image->getClientOriginalExtension();
                    $imageName = $gallery->image;
                    $image->move(public_path('/img/projects/'), $imageName);
                    $image = Image::make(public_path('/img/projects/') . $imageName)->encode('jpg', 75);
                    $image->resize(1920, 1080, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $image->save(public_path('/img/projects/') . $imageName);
        
                    $gallery->image = $imageName;
                }

                if ( $request->file('thumb') ) {
                    $thumb = $request->file('thumb');
                    if (file_exists( public_path('/img/projects/thumb/' . $gallery->thumb) )) unlink( public_path('/img/projects/thumb/' . $gallery->thumb) );
                    $thumbName = $gallery->thumb;
                    $thumb->move(public_path('/img/projects/thumb/'), $thumbName);
                    $thumb = Image::make(public_path('/img/projects/thumb/') . $thumbName)->encode('jpg', 75);
                    $thumb->fit(200, 200);
                    $thumb->save(public_path('/img/projects/thumb/') . $thumbName);

                    $gallery->thumb = $thumbName;
                }


                $gallery->name = $request->get('name');
                $gallery->description = $request->get('description');
                $gallery->save();
                $data['status'] = true;
                $data['item'] = $gallery;
            }
        }

        return $data;
    }

    public function createProject(Request $request)
    {
        $data = [];
        $data['status'] = false;

        if ( $request->file('image') && $request->file('thumb') ) {
            $image = $request->file('image');
            $thumb = $request->file('thumb');

            $rand = strval(rand(10, 100000));

            // $imageExt = $image->getClientOriginalExtension();
            $imageName = $rand . '.jpg';
            $image->move(public_path('/img/projects/'), $imageName);
            $image = Image::make(public_path('/img/projects/') . $imageName)->encode('jpg', 75);
            $image->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image->save(public_path('/img/projects/') . $imageName);

            // $thumbExt = $thumb->getClientOriginalExtension();
            $thumbName = $rand . '.jpg';
            $thumb->move(public_path('/img/projects/thumb/'), $thumbName);
            $thumb = Image::make(public_path('/img/projects/thumb/') . $thumbName)->encode('jpg', 75);
            $thumb->fit(200, 200);
            $thumb->save(public_path('/img/projects/thumb/') . $thumbName);

            $name = '';
            if ($request->has('name')) $name = $request->get('name');

            $description = '';
            if ($request->has('description')) $description = $request->get('description');

            $item = new Project;
            $item->name = $name;
            $item->description = $description;
            $item->image = $imageName;
            $item->thumb = $thumbName;
            $item->save();

            $data['status'] = true;
            $data['item'] = $item;
        }

        return $data;
    }

    public function ofertaUploadImage(Request $request)
    {
        $data = [];
        $data['status'] = false;

        if ( $request->file('image') && $request->has('name') ) {
            $image = $request->file('image');
            $name = $request->get('name');

            if (file_exists( public_path('/img/offer/' . $name) )) unlink( public_path('/img/offer/' . $name) );

            $image->move(public_path('/img/offer/'), $name);
            $image = Image::make(public_path('/img/offer/') . $name)->encode('jpg', 75);
            $image->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image->save(public_path('/img/offer/') . $name);

            $data['status'] = true;
        }

        return $data;
    }
    public function ofertaUploadThumb(Request $request)
    {
        $data = [];
        $data['status'] = false;

        if ( $request->file('image') && $request->has('name') ) {
            $image = $request->file('image');
            $name = $request->get('name');

            if (file_exists( public_path('/img/offer/' . $name) )) unlink( public_path('/img/offer/' . $name) );

            $image->move(public_path('/img/offer/'), $name);
            $image = Image::make(public_path('/img/offer/') . $name)->encode('jpg', 75);
            $image->fit(200, 200);
            $image->save(public_path('/img/offer/') . $name);

            $data['status'] = true;
        }

        return $data;
    }
}
