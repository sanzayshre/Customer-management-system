@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="row">
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <form action="{{route('add')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <div>
                        <a href="" style="color: red;">{{$errors->first('name')}}</a>
                    </div>
                    <label for="customerName">Customer Name</label>
                    <input type="text" name="customerName" id="customerName" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="organization">Organization</label>
                    <input type="text" name="organization" id="organization" class="form-control">
                </div>
                <div class="form-group">
                    <div>
                        <a href="" style="color: red;">{{$errors->first('email')}}</a>
                    </div>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control">
                </div>

                <div class="form-group">
                    <div>
                        <a href="" style="color: red;">{{$errors->first('image')}}</a>
                    </div>
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="btn btn-default">
                </div>

                <div class="form-group">
                    <button class="btn-primary">Register</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-hover">
                <tr>
                    <th>s.no</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Organization</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Created At</th>

                </tr>

                @foreach($studentData as $key=>$studentDatum)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$studentDatum->customerName}}</td>
                        <td>{{$studentDatum->address}}</td>
                        <td>{{$studentDatum->organization}}</td>
                        <td>{{$studentDatum->email}}</td>
                        <td>
                            <img src="{{url('lib/images/'.$studentDatum->image)}}" height="30" width="30" alt="">
                        </td>
                        <td>
                            <a href="{{route('edit').'/'.$studentDatum->id}}" class="btn btn-primary btn-xs">Edit</a>
                            <a href="{{route('delete').'/'.$studentDatum->id}}" class="btn btn-danger btn-xs">Delete</a>
                        </td>
                        <td>{{$studentDatum->created_at->DiffForHumans()}}</td>
                    </tr>

                @endforeach
            </table>
            {{$studentData->links()}}
        </div>
    </div>


@endsection
