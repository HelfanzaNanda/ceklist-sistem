<div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Email Address</label>
      <input type="email" name="email" class="form-control"
      value="{{ old('email') ?? $user->email }}" placeholder="Enter email">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Nama</label>
      <input type="text" name="name" class="form-control"
      value="{{ old('name') ?? $user->name }}" placeholder="Nama">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Role</label>
        <select name="role" class="form-control">
            <option selected disabled>pilih role</option>
            <option value="indoor" {{ $user->role =='indoor' ? 'selected' :'' }}>indoor</option>
            <option value="indoor" {{ $user->role =='outdoor' ? 'selected' :'' }}>outdoor</option>
        </select>
      </div>

  </div>
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">{{ $textButton }}</button>
  </div>
