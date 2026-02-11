<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Posts;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{   

    public function my_posts(){

        $posts = Posts::where('id_user', '=', Auth::id())->get();

        return Inertia::render('Posts/MyPosts', ['posts' => $posts, 'user' => Auth::user() ]);
        #return Inertia::render('Posts/MyPosts', ['user' => Auth::user() ]);

    }

    public function create(){
        
        return Inertia::render('Posts/create', ['user' => Auth::user()]);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'thumbnail' => 'required|string|min:5|max:255',
            'title' => 'required|string|min:3|max:50',
            'status' => 'required|string',
            'content' => 'required|string|min:3|max:5000',
            'description' => 'nullable|string|max:255',
        ]);

        $dados = array_merge($validated, [
            'id_user' => Auth::id(),
        ]);

        $post = Posts::create($dados);

        if($post){
            return redirect()->route('my_posts')->with('success', 'Cadastrado com sucesso!');
        }else{
            return redirect()->route('my_posts')->with('success', 'Erro ao cadastrar');
        }
        
    }

    public function edit($id){

        $post = Posts::where('id_user', Auth::id())
            ->where('id', $id)
            ->first();

        if (!$post) {
            abort(404);
        }

        return Inertia::render('Posts/edit', ['post' => $post, 'user' => Auth::user()]);
        
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            'title' => 'required|string|min:3|max:50',
            'status' => 'required|string',
            'text' => 'required|text|min:3',
            'description' => 'nullable|string|max:255',
        ]);

        $post = Posts::where('id', $id)->where('id_user', Auth::id())->first();

        if (!$post) {
            abort(404);
        }

        // Atualizar Meta
        $post->update($validated);

        return redirect()->route('my_posts')->with('success', 'Post atualizado com sucesso!');
        
    }

    public function destroy($id){
        

        try {
            $post = Posts::where('id', $id)->where('id_user', Auth::id())->first();
            
            if (!$post) {
                abort(404);
            }
            
            $post->delete();

            return redirect()->route('my_posts')->with('success', 'Post removido com sucesso!');
            
        } catch (\Exception $e) {
            return redirect()->route('my_posts')->with('error', 'Erro ao apagar post: ' . $e->getMessage());
        }
         
    }
}
