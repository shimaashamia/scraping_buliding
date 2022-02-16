@extends("layouts.admin")
@section("title"," create home ")

@section("title-side")

@endsection

@section("content")
<div class="m-portlet m-portlet--mobile">
    <form method="post" action='{{route("home.index")}}' enctype="multipart/form-data">
        @csrf
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Cover image</label>
                        <div class="col-lg-6">
                            <input type="file" name="image" value="{{old('image')}}" class="form-control m-input" placeholder="image ">
                        </div>
                    </div>
                    <!-- <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">image callary</label>
                        <div class="col-lg-6">
                            <input type="text" name="price" value="{{old('price')}}" class="form-control m-input" placeholder="price">
                        </div>
                    </div> -->
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">price</label>
                        <div class="col-lg-6">
                            <input type="text" name="price" value="{{old('price')}}" class="form-control m-input" placeholder="price">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">size or space</label>
                        <div class="col-lg-6">
                            <input type="text" name="space" value="{{old('space')}}" class="form-control m-input" placeholder="space">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">city</label>
                        <div class="col-lg-6">
                            <input type="text" name="city" value="{{old('city')}}" class="form-control m-input" placeholder="city">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">bedrooms count</label>
                        <div class="col-lg-6">
                            <input type="text" name="bedrooms_count" value="{{old('bedrooms_count')}}" class="form-control m-input" placeholder="bedrooms_count  ">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">bathrooms_count</label>
                        <div class="col-lg-6">
                            <input type="text" name="bathrooms_count" value="{{old('bathrooms_count')}}" class="form-control m-input" placeholder="bathrooms_count">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">details_description</label>
                        <div class="col-lg-6">
                        <textarea class="form-control" id="details_description" name="details_description" rows="3">{{ old("details_description") }}</textarea>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">sales_agent_name</label>
                        <div class="col-lg-6">
                        <input type="text" name="sales_agent_name" value="{{old('sales_agent_name')}}" class="form-control m-input" placeholder="sales_agent_name">
                        </div>
                    </div>


                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary">اضافة</button>
                            <a href="{{asset('admin/home')}}" class="btn btn-secondary">الغاء الامر</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection