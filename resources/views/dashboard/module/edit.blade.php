@extends('includes.layouts.dashboard')

@section('module-name', 'Category')
@section('page-title', 'Categories')

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Edit Category
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.category.update', $category->id) }}" method="post">
                        @csrf @method('PUT')
                        <p>
                            Name
                            <input value="{{ $category->name }}" type="text" required name="name" spellcheck="true"
                                class="form-control">
                        </p>
                        <div class="mb-4">
                            Type
                            <select name="type" required class="form-select">
                                <option value=""> -select type-</option>
                                @foreach (config('category.types') as $type)
                                    <option value="{{ $type }}" @if($category->type == $type) selected @endif >{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <p>
                            <button class="btn text-white btn-primary" type="submit"><i class="fa fa-save"></i>
                                Save Changes</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
