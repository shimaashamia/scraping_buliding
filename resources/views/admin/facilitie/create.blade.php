@extends("layouts.admin")
@section("title"," create facilitie ")

@section("title-side")

@endsection

@section("content")
<div class="m-portlet m-portlet--mobile">
    <form method="post" action='{{route("facilitie.index")}}'>
        @csrf
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">facilitie</label>
                        <div class="col-lg-6">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control m-input" placeholder=" name">
                        </div>
                    </div>


                    <div class="m-form__group form-group row">
                        <label class=" col-lg-3 col-form-label"> select home </label>
                        <div class="m-radio-inline col-lg-6">
                        <select class="form-control chosen-rtl select" name='home_id' id='home_id'>
                                <option selected>-اختر الصنف- </option>
                                @foreach($homes as $home)
                                <option {{old('home_id')==$home->id?'selected':''}} value='{{$home->id}}'>
                                    {{$home->city}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="m-form__help"></span>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary">اضافة</button>
                            <a href="{{asset('admin/facilitie')}}" class="btn btn-secondary">الغاء الامر</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection