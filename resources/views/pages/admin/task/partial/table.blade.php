<div class="box-body">
    <div class="table-responsive">
        <table class="table table-hover myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->name }}</td>
                    <td>
                        <a href="{{ route('admin.task.edit', $task) }}"
                        class="btn btn-warning btn-xs btn-edit"
                            id="edit"><i class="fa fa-pencil-square-o"></i></a>

                        <div style="display: inline">
                            <form action="{{ route('admin.task.delete', $task) }}" method="post"
                            style="display: inline">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                class="btn btn-danger btn-xs btn-hapus"
                                id="delete"><i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>