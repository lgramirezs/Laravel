<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'slug'    =>  'required|unique:posts,slug',
            'content' =>  'required',
        ]);
        // El post es creado a partir del usuario logueado, el usuario logueado lo recuperamos con $request->user(), hasta este punto usamos el metodo user()para obtener el usuario que creo el registro.
        //Al acceder al metodo posts accedemos al metodo para establecer la relación y la asignación masiva de datos.
        // El método posts no existe es una relación que creamos en el modelo User
        $request->user()->posts()->create([
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

        }

        //Si no es necesario establcer ninguna relación ni hacer un registro de forma masivo, puedo instanciar la clase a utilizar, es decir
        //$post =new Post
        // $post->name = $request->name
        // $post->save();
        // public function store(Request $request)
        // {
        //     $movie = new Movie;
        //     $movie->create($request->all());
        //     return redirect('movie');

        // }
        // En este caso hacemos uso del método Create() y ya que en el formulario se han definido los campos usando los mismos nombres de la tabla movies, no habrá ningún problema al enviar el request como array asociativo y guardar el nuevo registro.


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name'    =>  'required',
            //Campo requerido unico en la tabla posts del campo slug, ecluyendo el post con el id especificado
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ]);

        $post->update([
            'user_id' =>  $request->user()->id,
            'name'    =>  $request->name,
            'slug'    =>  $request->slug,
            // 'name'    =>  $title = $request->name,
            // 'slug'    =>  Str::slug($title),
            'content' =>  $request->content,
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}
