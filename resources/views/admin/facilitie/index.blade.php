@extends("layouts.admin")
@section("title","Homes Management")

@section("title-side")
<a href="{{asset('admin/facilitie/create')}}"
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
  
        <!--begin: Datatable -->
        @if($items->count()>0)
        <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped- table-bordered table-hover">
                        <thead>
                            <tr role="row">
                                <th>name facilitie</th>
                                <th  width='10%'>city home</th>
                                <th width='15%'>خيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr role="row" class="odd">
                                <td>{{$item->name}}</td>
                                <td>{{$item->home->city}}</td>
                                <td>{{$item->updated_at}}</td>
                                <!-- <td>

                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('image.edit',$item->id)}}" title="تعديل"><i
                                            class="la la-edit"></i> </a>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('image.delete',$item->id)}}"
                                        onclick="return confirm('هل انت متأكد من حذف {{$item->name}} ؟')" title="حذف"><i
                                            class="la la-remove"></i> </a>

                                </td> -->
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