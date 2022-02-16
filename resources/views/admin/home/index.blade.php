@extends("layouts.admin")
@section("title","Homes Management")

@section("title-side")
<a href="{{asset('admin/home/create')}}"
    class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
           Add Home
        </span>
    </span>
</a>
@endsection

@section("content")
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <form>
            <div class='row mb-3'>
                <div class='col-sm-8'>
                    <input type='text' value="{{request()->q}}" name="q" class='form-control'
                        placeholder='أدخل كلمة البحث هنا' />
                </div>
               
                <div class='col-sm-1 text-right'>
                    <button type="submit" class='btn btn-primary'><i class='fa fa-search'></i></button>
                </div>
            </div>
        </form>
        <!--begin: Datatable -->
        @if($items->count()>0)
        <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped- table-bordered table-hover">
                        <thead>
                            <tr role="row">
                         
                                <th>الاسم</th>
                                <th  width='10%'>price</th>
                                <th>space</th>
                                <th>city</th>
                                <th>bedrooms_count</th>
                                <th>bathrooms_count</th>
<th>details_description</th>
<th>sales_agent_name</th>

                                <th width='15%'>
                                    اخر تحديث</th>

                                <th width='15%'>خيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr role="row" class="odd">
                                
                                <td><img height=50 width=50 src='{{asset("images/image/".$item->image)}}' alt="img"></td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->space}}</td>
                                <td>{{$item->city}}</td>
                                <td>{{$item->bedrooms_count}}</td>
                                <td>{{$item->bathrooms_count}}</td>
                                <td>{{$item->details_description}}</td>
                                <td>{{$item->sales_agent_name}}</td>

                                <td>{{$item->updated_at}}</td>
                                <td>


                              
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('home.edit',$item->id)}}" title="تعديل"><i
                                            class="la la-edit"></i> </a>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('home.delete',$item->id)}}"
                                        onclick="return confirm('هل انت متأكد من حذف {{$item->name}} ؟')" title="حذف"><i
                                            class="la la-remove"></i> </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info"> لا يوجد نتائج في البحث..... </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection