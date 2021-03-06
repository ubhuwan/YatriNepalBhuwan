@extends('backend.layouts.index')

@section('style')
    <link href="{{ URL::asset('/assets/css/table.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    @if(count($errors) > 0)
        <section class="info-box fail">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </section>
    @endif
    @if(Session::has('success'))
        <section class="info-box success">
            {{ Session::get('success') }}
        </section>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Customized Trip</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.customize.get.create') }}">Create Customized Trip</a>
                            <a href="{{ route('backend.customize.delete.page') }}">
                                <i class="material-icons delete">delete
                                    @php
                                        $count = count($customizes);
                                        $i = 0;
                                    @endphp
                                    @foreach($customizes as $customize)
                                        @php

                                            if($customize->status == "trash"){
                                                $i += 1;
                                        }
                                        @endphp
                                    @endforeach
                                    @if($i != 0)
                                        <span class="noti-badge">{{ $i }}</span>
                                    @endif
                                </i>
                            </a>
                            @if(count($customizes) == 0 || $count == $i)
                                <br><p align="center">No customized trip available<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($customizes as $customize)
                                        @if($customize->status == "published" || $customize->status == "unpublished")
                                            <tr>
                                                <td><a href="{{ route('backend.customize.single.customize', ['customize_id' => $customize->id]) }}">{{ $customize->name }}</a></td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.customize.get.update', ['customize_id' => $customize->id]) }}">Edit</a></button></td>
                                                <td><button class="btn-view"><a href="{{ route('backend.customize.single.customize', ['customize_slug' => $customize->slug])  }}">View</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.customize.trash', ['customize_id' => $customize->id]) }}">Delete</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $customizes->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($customizes->currentPage() !== 1)
                                    <a href ="{{ $customizes->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($customizes->currentPage() !== $customizes->lastPage() && $customizes->hasPages())
                                    <a href ="{{ $customizes->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
