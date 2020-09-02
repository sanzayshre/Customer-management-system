@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-4">
            <form action="{{route('edit_action')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="student_id" value="{{$editRecord->id}}">
                <div class="form-group">
                    <div>
                        <a href="" style="color: red;">{{$errors->first('name')}}</a>
                    </div>
                    <label for="customerName">Customer Name</label>
                    <input type="text" name="customerName" id="customerName" class="form-control" value="{{$editRecord->customerName}}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{$editRecord->address}}">
                </div>
                <div class="form-group">
                    <label for="organization">Organization</label>
                    <input type="text" name="organization" id="organization" class="form-control" value="{{$editRecord->organization}}">
                </div>
                <div class="form-group">
                    <div>
                        <a href="" style="color: red;">{{$errors->first('email')}}</a>
                    </div>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{$editRecord->email}}">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" value="{{$editRecord->mobile}}">
                </div>

                <div class="form-group">
                    <div>
                        <a href="" style="color: red;">{{$errors->first('image')}}</a>
                    </div>
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="btn btn-default">
                </div>

                <div class="form-group">
                    <button class="btn-primary">update</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <img src="{{url('lib/images/'.$editRecord->image)}}" alt="no image" class="img-responsive thumbnail" style="margin-top: 20px">
        </div>

    </div>


@endsection
