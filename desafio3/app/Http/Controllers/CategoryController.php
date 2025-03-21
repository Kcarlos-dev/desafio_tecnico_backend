<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Category;

class CategoryController extends Controller
{
    private $objCategory;

    public function __construct(){
        $this->objCategory = new Category();
    }
/*    public function index()
    {
     return view('categorias-cadastrar', ['categories' => $categories] );
    }*/

    public function listar()
    {
     $categories = \App\Models\Category::all();
     return view('categorias', ['categories' => $categories] );
    }

    public function create()
    {
     return view('categorias.create', ['category' => '']);
    }

    public function store(Request $request)
    {
        $data = \App\Models\Category::all();
        $msg = 'Categoria já existente';
        foreach($data as $i){
            if($i->name == $request->name){
                return view('alertas.equal', ['tipo' => $msg,'rota' => 'categorias/listar']);
            }
       }
        $category= $this->objCategory->create([
            'name'=>$request->name,
            'slug'=> str_slug($request->name),
            'description'=>$request->description
        ]);
        if($category){
            return redirect('categorias/listar');
        }
    }
 
    public function edit($id)
    {
     $category = $this->objCategory->find($id);
     return view('categorias.edit', ['category' => $category] );
    }

    public function update(Request $request, $id)
    {
        $this->objCategory->where(['id' => $id])->update([
            'name'=>$request->name,
            'slug'=> str_slug($request->name),
            'description'=>$request->description
        ]);
        return redirect('categorias/listar');
    }
 
    public function destroy($id)
    {
        $category = $this->objCategory->find($id)->delete();
        return redirect('categorias/listar')->with('msg', 'Categoria excluída com sucesso.');
    }
}
