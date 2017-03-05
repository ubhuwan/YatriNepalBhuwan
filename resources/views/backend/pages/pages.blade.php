@extends('backend.layouts.index')

@section('style')
    <link href="{{ URL::asset('/assets/css/table.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Pages</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.pages.get.create') }}">Create Page</a><br/>
                            @if(count($pages) == 0)
                                <br><p align="center">No pages available<p>
                            @else
                            <table class="table">
                                <thead class="text-primary">
                                <th>Title</th>
                                <th>Page</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <td><a href="{{ route('backend.pages.single.page', ['page_id' => $page->id]) }}">{{ $page->title }}</a></td>
                                        <td>{{ $page->page }}</td>
                                        <td><button class="btn-edit"><a href="{{ route('backend.pages.get.update', ['page_id' => $page->id]) }}">Edit</a></button></td>
                                        <td><button class="btn-view"><a href="{{ route('backend.pages.single.page', ['page_slug' => $page->slug/*, 'page_id' => $page->id*/])  }}">View</a></button></td>
                                        <td><button class="btn-delete"><a href="{{ route('backend.pages.delete', ['page_id' => $page->id]) }}">Delete</a></button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                            {!! $pages->links() !!}
                            <div class="pagination">

                            {{--@if($pages->currentPage() !== 1)
                                <a href ="{{ $pages->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                            @endif
                            @if($pages->currentPage() !== $pages->lastPage() && $pages->hasPages())
                                <a href ="{{ $pages->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
                                @endif--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
