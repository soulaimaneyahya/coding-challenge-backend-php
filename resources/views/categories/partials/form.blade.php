<div class="mb-3">
    <label for="name">{{ __('Name') }}</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" maxlength="191" value="{{ old('name', $category->name ?? '') }}" placeholder="Category Name (Exp: Cosmetics) .." required autocomplete="name" autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="parent_category_id">{{ __('Choose Parent Category') }}</label>
    <select class="form-control" name="parent_category_id" id="parent_category_id">
        <option value {{ old('parent_category_id', null) === null ? 'selected' : '' }}>Havn't Parent Category</option>
        @foreach ($parent_categories as $item)
          <option 
          {{ old('parent_category_id') == $item->id ? "selected" : "" }}
          {{ isset($category) && $category->parent_category_id == $item->id ? "selected" : "" }}
          value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    @error('parent_category_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
