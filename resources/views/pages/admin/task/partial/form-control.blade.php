<div class="box-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Nama Tugas</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') ?? $task->name }}"
            placeholder="Nama Tugas">
    </div>
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-primary">{{ $textButton }}</button>
</div>
