<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Category;
use App\ImageManipulation;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy("order", "ASC")->get();
        $params = ['categories' => $categories];
        return view('admin/categories/index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/categories/create');
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
            $name = $request->input('name');
            if (!$name) {
                throw new \Exception("Campo nome não pode estar em branco", 400);
            }
            $category = new Category();
            $category->name = $name;
            $category->slug = $this->slugify($name);
            $category->order = $request->input("order");
            if (!$category->order) {
                throw new \Exception("O campo ordem não pode estar em branco", 400);
            }
            $category->save();
            if ($request->hasFile("image")) {
                $this->storeImage($request, $category);
            }
            return redirect('admin/categories')->with('status', 'Categoria cadastrada com sucesso');
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    /**
     * @param $text
     * @return false|string|string[]|null
     */
    private function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $category = $this->getCategory($id);
            $params = ['category' => $category];
            return view('admin/categories/create')->with($params);
        } catch (\Exception $e) {
            return $this->handleException($e, $id);
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
            $category = $this->getCategory($id);
            $name = $request->input('name');
            if (!$name) {
                throw new \Exception("O campo nome não pode estar em branco", 400);
            }
            $category->name = $name;
            $category->order = $request->input("order");
            if (!$category->order) {
                throw new \Exception("O campo ordem não pode estar em branco", 400);
            }
            if ($request->input("remove_image")) {
                @unlink("images/categories/".$category->id.".jpg");
                @unlink("images/categories/".$category->id."_mini.jpg");
                @unlink("images/categories/".$category->id.".png");
                @unlink("images/categories/".$category->id."_mini.png");
                $category->image = "";
            }
            $category->save();
            if ($request->hasFile("image")) {
                $this->storeImage($request, $category);
            }
            return redirect('admin/categories')->with('status', 'Categoria atualizada com sucesso');
        } catch (\Exception $e) {
            return $this->handleException($e, $id);
        }
    }

    /**
     * @param Request $request
     * @param Category $category
     */
    private function storeImage(Request $request, Category $category)
    {

        $dpath = 'images/categories/';

        $fileName = $request->file('image')->getClientOriginalName();

        $fileNameParts = explode(".", $fileName);

        $extension = end($fileNameParts);

        $r = $request->file('image')->move($dpath, $category->id.'.'.$extension);

        /* Instanciar Image Manipulation e gerar uma miniatura */

        $im = new ImageManipulation();
        $im->loadResizeCropSave($dpath.$category->id.'.'.$extension, $dpath.$category->id.'_mini.'.$extension, 400, 250);

        $category->image = $dpath.$category->id.'_mini.'.$extension;
        $category->save();

    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    private function getCategory($id)
    {
        $category = Category::find($id);
        if (!$category) {
            throw new \Exception("Categoria não encontrada", 404);
        }
        return $category;
    }

    /**
     * @param \Exception $e
     * @param null $id
     * @return RedirectResponse
     */
    private function handleException(\Exception $e, $id = null){
        switch ($e->getCode()) {
            case 404:
                return redirect("admin/categories")->with("error", $e->getMessage());
                break;
            default:
                return redirect($id ? "admin/categories/".$id."/edit" : "admin/categories/create")->with("error", $e->getMessage());
                break;
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
            $category = $this->getCategory($id);
            $category->delete();
            return redirect("admin/categories")->with("status", "Categoria excluída com sucesso");
        } catch (\Exception $e) {
            return $this->handleException($e);
        }

    }
}
