<form action="{{ route("dashboard.module.update", $module) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Module Name *</label>
        <input type="text" required class="form-control" name="name"
            value="{{ $module->name }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Quarter *</label>
        <select name="quarter_id" required class="form-select" required>
            <option value=""> -select quarter-</option>
            @foreach ($quarters as $quarter)
                <option @if ($module->quarter_id == $quarter->id) selected @endif
                    value="{{ $quarter->id }}">{{ ucfirst($quarter->name) }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Category *</label>
        <select name="category_id" required class="form-select" required>
            <option value=""> -select type-</option>
            @foreach ($categories as $category)
                <option @if ($module->category_id == $category->id) selected @endif
                    value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Details</label>
        {!! $module->details !!}
        <textarea name="details" class="form-control" rows="5" style="min-height: 200px">{{ $module->details }}</textarea>
        <div id="emailHelp" class="form-text">This is optional, you can change it in the edit page.
        </div>
    </div>

    <button type="submit" class="btn btn-primary text-white">Update Module</button>
</form>