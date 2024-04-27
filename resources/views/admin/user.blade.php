@include('admin.css')
@include('admin.sidebar')
@push('styles')
<style>
</style>
@endpush
<div class="main-panel">
<div class="bg-dark py-1" >
    <h3 class="text-white text-center">Admin Panel</h3>
</div>
<div class="bg-dark bg-gradiant py-1" >
    <h3 class="text-white text-center">Products</h3>
</div>
        

                <div class="container">
                    <div class="row d-flex justify-content-center">
                        @if(Session::has('success'))
                        <div class="col-md-10 mt-4">
                            <div class="alert alert-success">
                           {{Session::get('success')}} 
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                            <div class="container">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                    <th>Email</th>
                                    <th>User Id</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                                    @if($user->isNotEmpty())
                                    @foreach($user as $user)
                                    <tr>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->userid}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>
                                        <form action="{{ route('delete_user', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    
                                </table>

                            </div>


@include('admin.script')

</div>
<!-- <script>
   function deleteProduct(id) {
    if (confirm("Are you sure you want to delete this?")) {
        
    }
}
</script> -->

