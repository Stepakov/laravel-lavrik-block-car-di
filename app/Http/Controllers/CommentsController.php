<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\StoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store( StoreRequest $request )
    {
        $model = $request->checkData();

        $comment = Comment::make( $request->only( 'text' ) );

//        $model = $request->model::find( $request->model_id );

        $model->comments()->save( $comment );

        return redirect()->back()->with( 'message', 'Comment was added' );
    }
}
