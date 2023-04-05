<style>
    nav svg {
        height: 20px;
    }
    nav .hidden {
        display: block;
    }
</style>


<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Categories
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        All Categories
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.category.add') }}" class="btn btn-succuess float-end">Add New Category</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category )
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td><a href="{{ route('product.category', ['slug' => $category->slug]) }}">{{ $category->slug }}</a></td>
                                                <td>
                                                    <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" class="text-info">Edit</a>
                                                    <a href="#" class="text-danger" onclick="deleteConfirmation({{ $category->id }})" style="margin-left: 20px">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>




<div class="modal fade" id="deleteConfirmation">
    <div class="modal-dialog" role="document">
      <div class="modal-content pb-30 pt-30">
        <div class="modal-body">
            <h4 class="p-3 text-center">Do You want delete category..?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Close</button>
          <button type="button" class="btn btn-danger" onclick="deleteCategory()">Delete</button>
        </div>
      </div>
    </div>
  </div>

@push('scripts')
    <script>
        function deleteConfirmation(id) {
            @this.set('category_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteCategory(){
            @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush
