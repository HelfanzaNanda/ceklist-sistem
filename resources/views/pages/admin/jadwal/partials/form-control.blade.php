<div class="box-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Nama Hari</label>
        <input type="text" name="day" class="form-control" id="exampleInputEmail1"
            placeholder="Hari" value="{{ old('day') ?? $schedulle->day }}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">OB Bertugas</label>
        <input type="text" name="name_ob" class="form-control" id="exampleInputEmail1"
            placeholder="OB Bertugas" value="{{ old('name_ob') ?? $schedulle->name_ob }}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Jam Kerja</label>
        <input type="text" name="working_hour" class="form-control" id="exampleInputEmail1"
            placeholder="Jam Kerja" value="{{ old('working_hour') ?? $schedulle->working_hour }}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Istirahat</label>
        <input type="text" name="break" class="form-control" id="exampleInputEmail1"
            placeholder="Istirahat" value="{{ old('break') ?? $schedulle->break }}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Jam Pulang</label>
        <input type="text" name="home_hour" class="form-control" id="exampleInputEmail1"
            placeholder="Jam Pulang"
            value="{{ old('home_hour') ?? $schedulle->home_hour }}">
    </div>

</div>

<div class="box-footer">
    <button type="submit" class="btn btn-primary">{{ $textButton }}</button>
</div>
