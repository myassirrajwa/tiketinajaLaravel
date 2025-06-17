<link rel="stylesheet" href="{{ asset('storage/css/post/post.css') }}">
<div class="container"> 
    <div class="col-12">
        <a class="" href="{{ route('post.create') }}">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered table-primary">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($list_post as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
                                <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>