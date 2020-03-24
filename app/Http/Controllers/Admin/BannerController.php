<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Utils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ImageManipulation;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['banners' => Banner::all()];
        return view('admin.banners.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $banner = new Banner();

            $banner->title = $request->input('title');
            if (!$banner->title) {
                throw new \Exception("O campo título é de preenchimento obrigatório");
            }
            $banner->description = $request->input('description');
            $banner->order = $request->input('order');
            if (!$banner->order) {
                throw new \Exception("O campo ordem é de preenchimento obrigatório");
            }
            $banner->url = $request->input('url');
            $banner->active = $request->input('active') ? 1 : 0;
            $banner->save();

            if ($request->hasFile("image")) {
                $this->storeImage($request, $banner);
            }

            return redirect('admin/banners')->with('status', 'Banner criado com sucesso');
        } catch (\Exception $e) {
            return $this->handleException($e);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function edit($id)
    {
        try {
            $banner = Banner::find($id);
            if (!$banner) {
                throw new \Exception('Banner não encontrado', 404);
            }
            return view('admin.banners.create')->with(['banner' => $banner]);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $banner = Banner::find($id);
            if (!$banner) {
                throw new \Exception('Banner não encontrado', 404);
            }

            $banner->title = $request->input('title');
            if (!$banner->title) {
                throw new \Exception("O campo título é de preenchimento obrigatório");
            }
            $banner->description = $request->input('description');
            $banner->order = $request->input('order');
            if (!$banner->order) {
                throw new \Exception("O campo ordem é de preenchimento obrigatório");
            }
            $banner->url = $request->input('url');
            $banner->active = $request->input('active') ? 1 : 0;

            if ($request->input("remove_image")) {
                @unlink("images/banners/".$banner->image_url);
                @unlink("images/banners/".$banner->image_url);
                $banner->image_url = "";
            }
            $banner->save();

            if ($request->hasFile("image")) {
                $this->storeImage($request, $banner);
            }

            return redirect('admin/banners')->with('status', 'Banner criado com sucesso');
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $banner = Banner::find($id);
            if (!$banner) {
                throw new \Exception('Banner não encontrado', 404);
            }
            $banner->delete();
            return redirect('admin/banners')->with('status', 'Banner removido com sucesso');
        } catch (\Exception $e) {
            $this->handleException($e);
        }
    }

    /**
     * @param \Exception $e
     * @param null $id
     * @return RedirectResponse
     */
    private function handleException(\Exception $e, $id = null){
        switch ($e->getCode()) {
            case 404:
                return redirect("admin/banners")->with("error", $e->getMessage());
                break;
            default:
                return redirect($id ? "admin/banners/".$id."/edit" : "admin/banners/create")->with("error", $e->getMessage());
                break;
        }
    }

    /**
     * @param Request $request
     * @param Banner $banner
     * @return void
     * @throws \Exception
     */
    public function storeImage(Request $request, Banner $banner)
    {
        $dpath = 'images/banners/';

        $fileName = $request->file('image')->getClientOriginalName();

        $fileNameParts = explode(".", $fileName);

        $extension = end($fileNameParts);

        if (!in_array($extension, ['jpg', 'png', 'jpeg'])) {
            throw new \Exception("A imagem necessita ser no formato jpg ou png", 400);
        }

        $r = $request->file('image')->move($dpath, $banner->id.'.'.$extension);

        /* Instanciar Image Manipulation e gerar uma miniatura quadrada com 1920x570 */
        $im = new ImageManipulation();
        $im->loadResizeCropSave($dpath.$banner->id.'.'.$extension, $dpath.$banner->id.'.'.$extension, 1920, 570);

        /* Instanciar Image Manipulation e gerar uma miniatura quadrada com 300x300 */
        $im = new ImageManipulation();
        $im->loadResizeCropSave($dpath.$banner->id.'.'.$extension, $dpath.$banner->id.'_mini.'.$extension, 400, 400);

        $banner->image_url = $dpath.$banner->id.".".$extension;
        $banner->save();

    }
}
