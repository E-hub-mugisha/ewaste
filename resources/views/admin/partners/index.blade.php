@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Partners Management</h2>

    <!-- Add Partner Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPartnerModal">Add Partner</button>

    <!-- Partners Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partners as $partner)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $partner->name }}</td>
                <td>{{ $partner->email }}</td>
                <td>{{ $partner->phone }}</td>
                <td>{{ $partner->address }}</td>
                <td>
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPartnerModal{{ $partner->id }}">Edit</button>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deletePartnerModal{{ $partner->id }}">Delete</button>
                </td>
            </tr>

            <!-- Edit Partner Modal -->
            <div class="modal fade" id="editPartnerModal{{ $partner->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" class="modal-content">
                        @csrf @method('PUT')
                        <div class="modal-header">
                            <h5>Edit Partner</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" value="{{ $partner->name }}" required></div>
                            <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ $partner->email }}"></div>
                            <div class="mb-3"><label>Phone</label><input type="text" name="phone" class="form-control" value="{{ $partner->phone }}"></div>
                            <div class="mb-3"><label>Address</label><textarea name="address" class="form-control">{{ $partner->address }}</textarea></div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Partner Modal -->
            <div class="modal fade" id="deletePartnerModal{{ $partner->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" class="modal-content">
                        @csrf @method('DELETE')
                        <div class="modal-header"><h5>Delete Partner</h5></div>
                        <div class="modal-body">Are you sure to delete <strong>{{ $partner->name }}</strong>?</div>
                        <div class="modal-footer"><button class="btn btn-danger">Delete</button></div>
                    </form>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Partner Modal -->
<div class="modal fade" id="addPartnerModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.partners.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header"><h5>Add Partner</h5></div>
            <div class="modal-body">
                <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" required></div>
                <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
                <div class="mb-3"><label>Phone</label><input type="text" name="phone" class="form-control"></div>
                <div class="mb-3"><label>Address</label><textarea name="address" class="form-control"></textarea></div>
            </div>
            <div class="modal-footer"><button class="btn btn-success">Save</button></div>
        </form>
    </div>
</div>
@endsection
