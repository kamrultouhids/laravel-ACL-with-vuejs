@extends('layouts.master')
@section('title','Add Role Permission')
@section('content')
@section('custom_css')
    <style>

        .checkbox label {
            display: inline-block;
            position: relative;
            padding-left: 5px; }
        .checkbox label::before {
            content: "";
            display: inline-block;
            position: absolute;
            width: 17px;
            height: 17px;
            left: 0;
            margin-left: -20px;
            border: 1px solid #cccccc;
            border-radius: 3px;
            background-color: #fff;
            -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
            -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
            transition: border 0.15s ease-in-out, color 0.15s ease-in-out; }
        .checkbox label::after {
            display: inline-block;
            position: absolute;
            width: 16px;
            height: 16px;
            left: 0;
            top: 0;
            margin-left: -20px;
            padding-left: 3px;
            padding-top: 1px;
            font-size: 11px;
            color: #555555; }
        .checkbox input[type="checkbox"] {
            opacity: 0; }
        .checkbox input[type="checkbox"]:focus + label::before {
            outline: thin dotted;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px; }
        .checkbox input[type="checkbox"]:checked + label::after {
            font-family: 'FontAwesome';
            content: "\f00c"; }
        .checkbox input[type="checkbox"]:disabled + label {
            opacity: 0.65; }
        .checkbox input[type="checkbox"]:disabled + label::before {
            background-color: #eeeeee;
            cursor: not-allowed; }
        .checkbox.checkbox-circle label::before {
            border-radius: 50%; }
        .checkbox.checkbox-inline {
            margin-top: 0; }

        .checkbox-primary input[type="checkbox"]:checked + label::before {
            background-color: #428bca;
            border-color: #428bca; }
        .checkbox-primary input[type="checkbox"]:checked + label::after {
            color: #fff; }

        .checkbox-danger input[type="checkbox"]:checked + label::before {
            background-color: #d9534f;
            border-color: #d9534f; }
        .checkbox-danger input[type="checkbox"]:checked + label::after {
            color: #fff; }

        .checkbox-info input[type="checkbox"]:checked + label::before {
            background-color: #5bc0de;
            border-color: #5bc0de; }
        .checkbox-info input[type="checkbox"]:checked + label::after {
            color: #fff; }

        .checkbox-warning input[type="checkbox"]:checked + label::before {
            background-color: #f0ad4e;
            border-color: #f0ad4e; }
        .checkbox-warning input[type="checkbox"]:checked + label::after {
            color: #fff; }

        .checkbox-success input[type="checkbox"]:checked + label::before {
            background-color: #5cb85c;
            border-color: #5cb85c; }
        .checkbox-success input[type="checkbox"]:checked + label::after {
            color: #fff; }

        .radio {
            padding-left: 20px; }
        .radio label {
            display: inline-block;
            position: relative;
            padding-left: 5px; }
        .radio label::before {
            content: "";
            display: inline-block;
            position: absolute;
            width: 17px;
            height: 17px;
            left: 0;
            margin-left: -20px;
            border: 1px solid #cccccc;
            border-radius: 50%;
            background-color: #fff;
            -webkit-transition: border 0.15s ease-in-out;
            -o-transition: border 0.15s ease-in-out;
            transition: border 0.15s ease-in-out; }
        .radio label::after {
            display: inline-block;
            position: absolute;
            content: " ";
            width: 11px;
            height: 11px;
            left: 3px;
            top: 3px;
            margin-left: -20px;
            border-radius: 50%;
            background-color: #555555;
            -webkit-transform: scale(0, 0);
            -ms-transform: scale(0, 0);
            -o-transform: scale(0, 0);
            transform: scale(0, 0);
            -webkit-transition: -webkit-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            -moz-transition: -moz-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            -o-transition: -o-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            transition: transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33); }
        .radio input[type="radio"] {
            opacity: 0; }
        .radio input[type="radio"]:focus + label::before {
            outline: thin dotted;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px; }
        .radio input[type="radio"]:checked + label::after {
            -webkit-transform: scale(1, 1);
            -ms-transform: scale(1, 1);
            -o-transform: scale(1, 1);
            transform: scale(1, 1); }
        .radio input[type="radio"]:disabled + label {
            opacity: 0.65; }
        .radio input[type="radio"]:disabled + label::before {
            cursor: not-allowed; }
        .radio.radio-inline {
            margin-top: 0; }

        .radio-primary input[type="radio"] + label::after {
            background-color: #428bca; }
        .radio-primary input[type="radio"]:checked + label::before {
            border-color: #428bca; }
        .radio-primary input[type="radio"]:checked + label::after {
            background-color: #428bca; }

        .radio-danger input[type="radio"] + label::after {
            background-color: #d9534f; }
        .radio-danger input[type="radio"]:checked + label::before {
            border-color: #d9534f; }
        .radio-danger input[type="radio"]:checked + label::after {
            background-color: #d9534f; }

        .radio-info input[type="radio"] + label::after {
            background-color: #5bc0de; }
        .radio-info input[type="radio"]:checked + label::before {
            border-color: #5bc0de; }
        .radio-info input[type="radio"]:checked + label::after {
            background-color: #5bc0de; }

        .radio-warning input[type="radio"] + label::after {
            background-color: #f0ad4e; }
        .radio-warning input[type="radio"]:checked + label::before {
            border-color: #f0ad4e; }
        .radio-warning input[type="radio"]:checked + label::after {
            background-color: #f0ad4e; }

        .radio-success input[type="radio"] + label::after {
            background-color: #5cb85c; }
        .radio-success input[type="radio"]:checked + label::before {
            border-color: #5cb85c; }
        .radio-success input[type="radio"]:checked + label::after {
            background-color: #5cb85c; }
        .well, pre {
            background: #f3f3f3;
            border-radius: 0;
        }
        .checkbox-inline, .radio-inline {
            position: relative;
            display: inline-block;
            padding-left: 20px;
            margin-bottom: 0;
            font-weight: 400;
            vertical-align: middle;
            cursor: pointer;
        }
        .panel-body{
            margin-top: 16px;
        }
    </style>
@stop
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-8 col-12 mb-2">
                    {{Breadcrumbs::render('role_permission')}}
                </div>
            </div>

            <div class="content-body">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"><b>@yield('title')</b></h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <!--form start-->

                                    <form class="form" action="{{route('permission.store')}}" method="post">
                                       @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Role<span class="requiredField">*</span></label>
                                                        <select required class="form-control select2 role_id {{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id" >
                                                            <option value="">--- Select Role ---</option>
                                                            @foreach($data as $v)
                                                                <option value="{{$v->role_id}}">{{$v->role_name}}</option>
                                                             @endforeach
                                                        </select>
                                                        @if ($errors->has('role_id'))
                                                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('role_id') }}</strong></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row ShowMember">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-6">
                                                <div class="form-actions">
                                                    <button type="reset" class="btn btn-default  btn-min-width mr-1 mb-1">
                                                        <i class="fa fa-refresh"></i> <b>Reset</b>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1">
                                                        <i class="fa fa-check"></i> <b>Save</b>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!--form end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('custom_js')

    <script>
        $(document).on('change','[data-menu]',function(event){
            if(this.checked==false){
                var getMenuId = $(this).attr('data-menu');
                $('[data-formenu="'+getMenuId+'"]').prop('checked',false);
            }
        });
        $(document).on('change','[data-formenu]',function(event){
            if(this.checked==true){
                var getMenuId = $(this).attr('data-formenu');
                $('[data-menu="'+getMenuId+'"]').prop('checked',true);
            }
        });
        $(document).on("click", '.checkAll', function (event) {
            if (this.checked) {
                $('.inputCheckbox').each(function () {
                    this.checked = true;
                });
            } else {
                $('.inputCheckbox').each(function () {
                    this.checked = false;
                });
            }
        });

        $(document).on('change','.role_id',function(){
            var role_id = $(this).val();
            if (role_id != '') {
                $('body').find('#formSubmit').attr('disabled', false);
            } else {
                $('.inputCheckbox').each(function(){
                    this.checked = false;
                });
                $('body').find('#formSubmit').attr('disabled', true);
                $(".se-pre-con").fadeOut("slow");
                return false;
            }

            var action = "{{ URL::to('permission/get_all_menu') }}";
            $.ajax({
                type: 'POST',
                url: action,
                data: {role_id: role_id, '_token': $('input[name=_token]').val()},

                success: function (result) {
                    var subMenus,checkedValue;
                    var dataFormat = '<label class="col-md-2 col-sm-12 control-label" style="padding: 17px;"> </label>';

                    dataFormat += '<div id="area_select" class="col-md-6 col-sm-12" style="margin-top: 20px">';
                    dataFormat += '<div class="checkbox checkbox-info">';
                    dataFormat += '<input class="inputCheckbox checkAll"  type="checkbox" id="inlineCheckbox" >';
                    dataFormat += '<label for="inlineCheckbox"><strong>Select All</strong></label>';
                    dataFormat += '	</div>';
                    var sl=1;
                    $.each(result.arrayFormat, function (key, value) {
                        dataFormat += '<div class="well" style="margin-bottom:15px; padding:20px">';
                        dataFormat += '<span style="font-weight:bold; border-bottom:1px solid #000;">' + key + '</span>';
                        dataFormat += '<div class="panel-body">';

                        $.each(value, function (key1, value1) {
                            sl++;
                            checkedValue = '';
                            if (value1['hasPermission'] == 'yes') {
                                checkedValue = 'checked';
                            }
                            dataFormat += '<div class="checkbox checkbox-info">';
                            dataFormat += '<input class="inputCheckbox" data-menu="' + value1['id'] + '" type="checkbox" id="1222inlineCheckbox1'+sl+'" ' + checkedValue + ' name="menu_id[]" value="' + value1['id'] + '">';
                            dataFormat += '<label for="1222inlineCheckbox1'+sl+'">'+ value1['name'] + '</label>';
                            dataFormat += '</div>';
                            if(result.subMenu[value1['id']] !== undefined){
                                subMenus = result.subMenu[value1['id']];
                                var i=1;
                                for(var subMenuIndex in subMenus){
                                    checkedValue='';
                                    if(subMenus[subMenuIndex].hasPermission=='yes'){
                                        checkedValue='checked';
                                    }
                                    var subMenuCss = '';
                                    if(i==1){
                                        subMenuCss = "margin-left: 24px";
                                    }
                                    i++;
                                    dataFormat += '<div style="'+subMenuCss+'" class="checkbox checkbox-inline checkbox-primary">';
                                    dataFormat += '<input class="inputCheckbox" type="checkbox" id="inlineCheckbox'+subMenus[subMenuIndex].id+'" value="' + subMenus[subMenuIndex].id + '" data-formenu="' + value1['id'] + '" '+checkedValue+' name="menu_id[]" value="'+subMenus[subMenuIndex].id+'">';
                                    dataFormat += '<label for="inlineCheckbox'+subMenus[subMenuIndex].id+'"> '+subMenus[subMenuIndex].name+' </label>';
                                    dataFormat += '</div>';
                                }
                                i=1;
                            }

                        });

                        dataFormat += '</div>';
                        dataFormat += '</div>';

                    });
                    $('.ShowMember').html(dataFormat);
                }
            });
        });
    </script>
@endsection