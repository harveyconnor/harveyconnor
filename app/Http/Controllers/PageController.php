<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Support\Facades\Auth;
use JavaScript;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('q')){
            $pages = Page::query()->where('title', 'LIKE', '%'.$request['q'].'%')->orderBy('id','desc')->paginate(10);

            JavaScript::put([
                'pages' => $pages->toJson(),
                'nextPage' => $pages->nextPageUrl(),
                'prevPage' => $pages->previousPageUrl()
            ]);

            $data['pages'] = $pages->toJson();
            $data['nextPage'] = $pages->nextPageUrl();
            $data['prevPage'] = $pages->previousPageUrl();

            if($request->ajax() && $request->has('page')){
                $data['pages'] = $pages->toJson();
                $data['next'] = $pages->nextPageUrl();
                $data['prev'] = $pages->previousPageUrl();
                return json_encode($data);
            }

            return $data;
        } else {
            $pages = Page::query()->orderBy('id','desc')->paginate(10);

            JavaScript::put([
                'pages' => $pages->toJson(),
                'nextPage' => $pages->nextPageUrl(),
                'prevPage' => $pages->previousPageUrl()
            ]);

            $data['pages'] = $pages->toJson();
            $data['nextPage'] = $pages->nextPageUrl();
            $data['prevPage'] = $pages->previousPageUrl();

            if($request->ajax() && $request->has('page')){
                $data['pages'] = $pages->toJson();
                $data['next'] = $pages->nextPageUrl();
                $data['prev'] = $pages->previousPageUrl();
                return json_encode($data);
            }

            return view('pages.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'required|max:5000',
            'meta' => 'required|max:255',
            'slug' => 'required|unique:pages',
        ]);

        Page::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'content' => $request['content'],
            'meta' => $request['meta'],
            'slug' => $request['slug'],
            'user_id' => Auth::user()->id,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($page)
    {
        $page = Page::query()->where('slug',$page)->first();

        if(count($page) < 1){
            abort(404);
        }

        return view('pages.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        JavaScript::put([
            'page' => $page->toJson(),
        ]);

        return view('pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        if($request['slug'] == $page->slug){
            $this->validate($request,[
                'title' => 'required|max:255',
                'description' => 'required|max:255',
                'content' => 'required|max:5000',
                'meta' => 'required|max:255',
            ]);
        }else{
            $this->validate($request,[
                'title' => 'required|max:255',
                'description' => 'required|max:255',
                'content' => 'required|max:5000',
                'meta' => 'required|max:255',
                'slug' => 'required|unique:pages',
            ]);
        }

        $page->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'content' => $request['content'],
            'meta' => $request['meta'],
            'slug' => $request['slug'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
