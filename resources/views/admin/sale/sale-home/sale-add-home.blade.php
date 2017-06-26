@extends('app-admin')
@section('admin-content')
    @include('message')

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
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        .pac-container {
            font-family: Roboto;
        }

        #type-selector {
            color: #fff;
            background-color: #4d90fe;
            padding: 5px 11px 0px 11px;
        }

        #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }
        #target {
            width: 345px;
        }
        #map {
            width: 100%;
            height: 500px;
        }
        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }
        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
        }
        #pac-input:focus {
            border-color: #4d90fe;
        }
        .pac-container {
            font-family: Roboto;
        }
        #type-selector {
            color: #fff;
            background-color: #4d90fe;
            padding: 5px 11px 0px 11px;
        }
        #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }
        #target {
            width: 345px;
        }
        .house_save_block{
            float: right;
            margin-right: 31px;
            margin-top: 20px;
        }
    </style>
    @include('message')
    <div class="portlet-body form">
        <div class="col-md-12">
            <h1>Ավելացնել ՎԱՃԱՌՔԻ ԲՆԱԿԱՐԱՆ</h1>

            {!! Form::open(['action' => ['AdminController@postAddSaleHome'],'files' => 'true','id'=>'house_form']) !!}
            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapse1" class="panel-collapse collapse in">
                                <b>Հարկ/Հարկայնություն</b>
                                {!! Form::text('tax', null, ['placeholder' => 'Հարկ/Հարկայնություն' , 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapse1" class="panel-collapse collapse in">
                                <b>Մակերես</b>
                                {!! Form::text('area', null, ['placeholder' => 'Մակերես' , 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapse1" class="panel-collapse collapse in">
                                <b>Սենյակների քանակ</b>
                                {!! Form::number('count_rooms', null, ['placeholder' => 'Սենյակների քանակ' , 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapse1" class="panel-collapse collapse in">
                                <b>Սանհանգույց</b>
                                {!! Form::text('bathroom', null, ['placeholder' => 'Սանհանգույց' , 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapse1" class="panel-collapse collapse in">
                                <b>Առաստաղի բարձրությունը</b>
                                {!! Form::text('ceiling_height', null, ['placeholder' => 'Առաստաղի բարձրությունը' , 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapse1" class="panel-collapse collapse in">
                                <b>Շինության տիպը </b>
                                {!! Form::text('type_of_building', null, ['placeholder' => 'Շինության տիպը ' , 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapse1" class="panel-collapse collapse in">
                                <b>Վիճակը</b>
                                {!! Form::text('condition', null, ['placeholder' => 'Վիճակը' , 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapse1" class="panel-collapse collapse in">
                                <b>Գին</b>
                                {!! Form::text('price', null, ['placeholder' => 'Գին' , 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapse1" class="panel-collapse collapse in">
                                <b>Կոմունալ Հարմարություններ</b>
                                {!! Form::text('facilities', null, ['placeholder' => 'Կոմունալ Հարմարություններ' , 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapse1" class="panel-collapse collapse in">
                                <b>Լրացուցիչ ինֆորմացիա</b>
                                {!! Form::textarea('more_info', null, ['placeholder' => 'Լրացուցիչ ինֆորմացիա' , 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div style="width: 94%;margin-left: 32px;" class="input-group form-group">

                <label class="input-group-btn">
                    <span class="btn btn-primary">

                        Browse  Images… <input name="images" type="file" style="display: none;margin: 20px 0 20px 0;">
                    </span>
                </label>
                <input type="text" class="form-control" readonly="">
            </div>

            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapse1" class="panel-collapse collapse in">
                                <b>Կոնտ. Տվյալներ</b>
                                {!! Form::text('contact_detalis', null, ['placeholder' => 'Կոնտ. Տվյալներ' , 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapse1" class="panel-collapse collapse in">
                                <b>Վիդեո</b>
                                {!! Form::text('video', null, ['placeholder' => 'Վիդեո' , 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <input type="hidden" value="sale_home" name="role">
            {!! Form::hidden('lat', null,['placeholder' => 'Lat','class' => 'form-control controls','id'=>'lat']) !!}
            {!! Form::hidden('lng', null, ['placeholder' => 'Lng','class' => 'form-control controls','id'=>'lng']) !!}


            {!! Form::text('address', null, ['placeholder' => 'Search Box' , 'class' => 'controls search_map','id'=>'pac-input']) !!}

            <div id="map"></div>



            <div class="house_save_block">
                <button type="button" class="btn green house_save">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>


@endsection

@section('script')

    <script>

        $('.house_save').click(function () {

            $('#house_form').submit();
        })

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 40.17868892305818, lng: 44.498930291479496},
                zoom: 13,
            });
            var marker = new google.maps.Marker({
                position: {lat: 40.17868892305818, lng: 44.498930291479496},
                map: map,
                draggable:true
            });
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            google.maps.event.addListener(searchBox,'places_changed', function() {
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i,place;
                for(i=0; place=places[i]; i++){
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location); //set marker position new...
                }
                map.fitBounds(bounds);
                map.setZoom(15);
            });
            google.maps.event.addListener(marker,'position_changed', function(){
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();
                $('#lat').val(lat);
                $('#lng').val(lng);
            })

        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwTTsTdg_lk0yJpRjzVtF40o-iYcdW3Hs&libraries=places&callback=initAutocomplete">
    </script>


@endsection