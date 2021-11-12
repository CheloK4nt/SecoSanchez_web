<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
Use Str, Config, Image;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getSlider(){
        $slides = DB::select('SELECT * FROM slider');
        $cantidad_slides = 0;

        foreach ($slides as $slide) {
            $cantidad_slides = $cantidad_slides + 1;
        }

        // Se genera el código de slide //
        $valor_numerico = $cantidad_slides + 1;
        $id_slide = 'SLI';
        $parte_numerica = '';

        if ($valor_numerico < 10){
            $parte_numerica = '00';
        }
        if ($valor_numerico > 9 && $valor_numerico < 100){
            $parte_numerica = '0';
        }
        if ($valor_numerico > 99) {
            $parte_numerica = '';
        }

        $id_slide = $id_slide . $parte_numerica . $valor_numerico;

        $slides = DB::table('slider')->select('*')
        ->whereNull('deleted_at')
        ->paginate(5);

        return view('admin.slider.home',compact('id_slide','slides'));
    }

    public function store(Request $request)    {

        // SE CREA PATH PARA IMAGENES
        $path = '/'.date('Y-m-d');
        $fileExt = trim($request->file('img_sli')->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.slides.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('img_sli')->getClientOriginalName()));
        $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        
        $file_file = $upload_path.'/'.$path.'/'.$filename;
        // dd($file_file);

        $slider = new Slider;
        $slider->id_sli = $request->id_sli;
        $slider->estado_sli = $request->estado_sli;
        $slider->nom_sli = $request->nom_sli;
        $slider->file_path_sli = date('Y-m-d');
        $slider->file_name_sli = $filename;
        $slider->sub_sli = $request->sub_sli;

        $slider->save();

        if ($request->hasfile('img_sli')) {
            $fl = $request->img_sli->storeAs($path, $filename, 'slides');
            $img = Image::make($file_file);
            $img->fit(256, 256, function($constraint){
                $constraint->upsize();
            });
            $img->save($upload_path.'/'.$path.'/t_'.$filename); 
        }

        return redirect()->route('admin.slider')->with('success',"Slide $request->id_sli CREADO exitosamente");
    }

    public function destroy(Slider $slider, $id){
        $slide = Slider::findOrFail($id);        
        $path = $slide->file_path_sli;
        $file = $slide->file_name_sli;
        $id_sli = $id;
        $upload_path = Config::get('filesystems.disks.slides.root');
        if ($slide->delete()) {
            unlink($upload_path.'/'.$path.'/'.$file);
            unlink($upload_path.'/'.$path.'/t_'.$file);
            return redirect()->route('admin.slider')->with('success',"SLIDE {$id_sli} eliminado exitosamente");
        }
    }

    public function getSlideEdit($id){
        $sli = Slider::findOrFail($id);
        $data = ['sli' => $sli];

        return view('admin.slider.edit', $data);
    }

    public function update(Request $request, Slider $slider, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->nom_sli = $request->nom_sli;
        $slider->sub_sli = $request->sub_sli;
        $slider->estado_sli = $request->estado_sli;
        $id_sli = $slider->id_sli;
        $slider->save();
        return redirect()->route('admin.slider')->with('success',"Slide {$id_sli} MODIFICADO exitosamente");
    }
}
