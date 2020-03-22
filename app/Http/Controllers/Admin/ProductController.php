<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Utils;
use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\ImageManipulation;
use DB;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = Auth::user();
        if (!$user) {
            return redirect('/admin/login');
        }

        $id = $request->input('id');
        $category = $request->input('category');
        $name = $request->input('name');
        $query = Product::whereRaw("1=1");
        if ($id) {
            $query->where("id", $id);
        }
        if ($name) {
            $query->where("name", "LIKE", "%".$name."%");
        }
        if ($category) {
            $query->where("id_category", $category);
        }
        $query->orderBy('order', 'ASC');
        $products = $query->get();
        $params = ["products"=>$products, "params"=>$request->all()];
        return view('admin/products/index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy("order")->get();
        $params = ["categories"=>$categories];
        return view('admin/products/create')->with($params);
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
            $product = new Product();

            $category = $this->getCategory($request->input('id_category'));
            $product->id_category = $category->id;
            $product->name = $request->input('name');
            if (!$product->name) {
                throw new \Exception("O campo nome é de preenchimento obrigatório");
            }
            $product->description = $request->input('description');
            $product->order = $request->input('order');
            if (!$product->order) {
                throw new \Exception("O campo ordem é de preenchimento obrigatório");
            }
            $product->price = Utils::toDbCurrency($request->input('price'));
            if (!$product->price) {
                throw new \Exception("O campo preço é de preenchimento obrigatório");
            }
            $product->save();

            if ($request->hasFile("image")) {
                $this->storeImage($request, $product);
            }

            return redirect('admin/products')->with('status', 'Produto criado com sucesso');
        } catch (\Exception $e) {
            return $this->handleException($e);
        }

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
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    private function getProduct($id)
    {
        $product = Product::find($id);
        if (!$product) {
            throw new \Exception("Produto não encontrado", 404);
        }
        return $product;
    }

    /**
     * @param \Exception $e
     * @param null $id
     * @return RedirectResponse
     */
    private function handleException(\Exception $e, $id = null){
        switch ($e->getCode()) {
            case 404:
                return redirect("admin/products")->with("error", $e->getMessage());
                break;
            default:
                return redirect($id ? "admin/products/".$id."/edit" : "admin/products/create")->with("error", $e->getMessage());
                break;
        }
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
            $product = $this->getProduct($id);
            $categories = Category::orderBy("order")->get();
            $params = ['product' => $product, 'categories' => $categories];
            return view('admin/products/create')->with($params);
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
            $product = $this->getProduct($id);
            $category = $this->getCategory($request->input("id_category"));
            $product->id_category = $category->id;
            $product->name = $request->input('name');
            if (!$product->name) {
                throw new \Exception("O campo nome não pode estar em branco");
            }
            $product->description = $request->input('description');
            $product->order = $request->input('order');
            if (!$product->order) {
                throw new \Exception("O campo ordem não pode estar em branco");
            }
            $product->price = Utils::toDbCurrency($request->input('price'));
            if (!$product->price) {
                throw new \Exception("O campo preço não pode estar em branco");
            }
            $product->price = $request->input('price');
            if ($request->input("remove_image")) {
                @unlink("images/products/".$product->id.".jpg");
                @unlink("images/products/".$product->id."_mini.jpg");
                $product->image = "";
            }
            $product->save();
            if ($request->hasFile("image")) {
                $this->storeImage($request, $product);
            }
            return redirect('admin/products/' . $id . '/edit')->with('status', 'Produto atualizado com sucesso');
        } catch (\Exception $e) {
            return $this->handleException($e, $id);
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
            $product = $this->getProduct($id);
            $product->delete();
            return redirect('admin/products')->with('status', 'Produto removido com sucesso');
        } catch (\Exception $e) {
            return $this->handleException($e, $id);
        }
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeImage(Request $request, Product $product)
    {
        $dpath = 'images/products/';

        $fileName = $request->file('image')->getClientOriginalName();

        $fileNameParts = explode(".", $fileName);

        $extension = end($fileNameParts);

        if (!in_array($extension, ['jpg', 'png', 'jpeg'])) {
            throw new \Exception("A imagem necessita ser no formato jpg ou png", 400);
        }

        $r = $request->file('image')->move($dpath, $product->id.'.'.$extension);

        /* Instanciar Image Manipulation e gerar uma miniatura quadrada com 300x300 */
        $im = new ImageManipulation();
        $im->loadResizeCropSave($dpath.$product->id.'.'.$extension, $dpath.$product->id.'_mini.'.$extension, 400, 400);

        $product->image = $dpath.$product->id."_mini.".$extension;
        $product->save();

    }

}
