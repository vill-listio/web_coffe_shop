@extends('layouts.admin')


@section('content')

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Product</h5>
          <form method="POST" action="{{ route('store.products') }}" enctype="multipart/form-data">
                <!-- Email input -->
                 @csrf
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                @if($errors->has('name'))
								<p class="alert alert-success">{{ $errors->first('name') }}</p>
							@endif
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                 
                </div>
                @if($errors->has('price'))
								<p class="alert alert-success">{{ $errors->first('price') }}</p>
							@endif
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control"  />
                 
                </div>
                @if($errors->has('image'))
								<p class="alert alert-success">{{ $errors->first('image') }}</p>
							@endif
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                @if($errors->has('description'))
								<p class="alert alert-success">{{ $errors->first('description') }}</p>
							@endif
               
                <div class="form-outline mb-4 mt-4">

                  <select name="type" class="form-select  form-control" aria-label="Default select example">
                    <option selected disabled value="">Choose Type</option>
                    <option value="drinks">drinks</option>
                    <option value="desserts">desserts</option>
                  </select>
                </div>
                @if($errors->has('type'))
								<p class="alert alert-success">{{ $errors->first('type') }}</p>
							@endif
                

                <br>
                
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

      @endsection