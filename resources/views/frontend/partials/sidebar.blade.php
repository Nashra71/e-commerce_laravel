
<div class="col-md-4">
    <div class="list-group">
        @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id','NULL')->get() as $parent)
        <a href="#main-{{$parent->id}}" class="list-group-item" data-toggle="collapse" >
            <img src="{{asset('images/categories/'.$parent->image)}}" width="50">
            {{$parent->name}}
        </a>

        <div class="collapse" id="main-{{$parent->id}}">
            <div class="child-rows">
                @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                <a href="#main-{{$parent->id}}" class="list-group-item ">
                    <img src="{{asset('images/categories/'.$child->image)}}" width="40">
                    {{$child->name}}
                </a>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

      </div>


{{-- <div class="col-md-4">
    <div class="list-group">
        <a href="#" class="list-group-item active" >
            <h2></h2>
        </a>

    </div
></div> --}}
