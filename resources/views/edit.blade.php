
@extends('layouts.app');
@section('content');
@if(session()->has('message'))
<div class="alert alert-success">
  {{session()->get('message')}}
</div>
@endif
        <div class="card">
            <div class="card-body">
                <p style="font-size:20px; font-weight:bold;">Update Employee</p>
                <a href="{{route('employee.index')}}">Back to employee list</a>
                <form action="{{route('employee.update',$employee->id)}}" class="was-validated" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group has-validation">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$employee->name}}" required> 
                        @if($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-validation">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$employee->email}}" required>
                        @if($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-validation   ">
                        <label for="joining_date">Joining date</label>
                        <input type="date" name="joining_date" id="joining_date" class="form-control" value="{{$employee->joining_date}}" required>
                        @if($errors->has('joining_date'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('joining_date')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-validation">
                        <label for="joining_salary">Joining salary</label>
                        <input type="number" name="salary" id="joining_salary" class="form-control" value="{{$employee->salary}}" required>
                        @if($errors->has('salary'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('salary')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-validation">
                        <label for="is_active">Active</label><br>
                        <input type="checkbox"  {{$employee->is_active?'checked':''}} name="is_active" id="is_active" value="{{$employee->is_active}}" required>
                        <span class="invalid-feedback">
                            <strong>Error</strong>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Employee</button>
                </form>
            </div>
        </div>
@endsection