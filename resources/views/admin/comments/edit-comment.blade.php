@extends('admin.layouts.app')
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Comment</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <fieldset class="form-label-group mb-75">
                            <textarea class="form-control" id="label-textarea" name="comment" rows="5">Wonderful Machine· A well-written bio allows viewers to get to know a photographer  beyond the work. This can make the difference when presenting to clients who are looking for the perfect fit.
                            </textarea>
                            </fieldset>
                            <input type="submit" class="btn btn-sm btn-primary" value="Update">
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
