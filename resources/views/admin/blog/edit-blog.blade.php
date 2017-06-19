@extends('app-admin')

@section('admin-content')
    <style>
        .panel-default{
            border-color: #fff;
        }
        .callapse_block{
            font-size: 19px;
            margin-right: -5px;
            cursor: pointer;
            border: 1px solid;
            padding: 2px;
            width: 45px;
            display: inline-block;
            text-align: center;
            margin-bottom: 12px;
            background: #1caf9a;
            color: #fff;
        }
        .bg{
            background: #ccc;
        }
    </style>
    @include('message')
    <div class="portlet-body form">
        <div class="col-md-12">
            <h1>Edit Blog Information</h1>

            {!! Form::model($blog,['action' => ['AdminController@postEditBlog'] ,'files' =>true ] ) !!}
            <input type="hidden" name="id" value="{{$blog->id}}">

            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div id="collapse1" class="panel-collapse collapse in">
                                {!! Form::text('title', null, ['placeholder' => 'Title En' , 'class' => 'form-control']) !!}

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12 form-group">

                <div class="col-md-12">

                    <div class="panel-group" id="accordion1">
                        <div class="panel panel-default">
                            <div id="collapse4" class="panel-collapse collapse in">
                                {!! Form::textarea('description', null, ['placeholder' => 'Description En' , 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                {!! Form::text('video', null, ['placeholder' => 'Video' , 'class' => 'form-control']) !!}

            </div>
            <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse  Images… <input name="images" type="file" style="display: none;">
                    </span>
                </label>
                <input type="text" class="form-control" readonly="">
            </div>

            <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                Browse Gallery Images… {!! Form::file('images_gallery[]', array('multiple'=>true)) !!}
            </div>


            <div style="float: right;margin-right: 31px;">
                <button type="submit" class="btn green">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>

    </div>




@endsection

