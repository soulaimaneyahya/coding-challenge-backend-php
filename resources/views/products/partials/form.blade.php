<div class="mb-3">
    <label for="name">{{ __('Name') }}</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" maxlength="255" value="{{ old('name', $product->name ?? '') }}" placeholder="Product Name (Exp: T-shirt Black) .." required autocomplete="name" autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="description">{{ __('Description') }}</label>
    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" maxlength="700" placeholder="Product Description .." autocomplete="description" autofocus>{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="price">{{ __('Price') }}</label>
    <input id="price" type="number" min="1" step=".01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $product->price ?? '') }}" placeholder="Price" required autocomplete="price" autofocus>
    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="category_id">{{ __('Choose Category') }}</label>
    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
        <option value {{ old('category_id', null) === null ? 'selected' : '' }}>Havn't Category</option>
        @foreach ($categories as $category)
          <option 
          {{ old('category_id') == $category->id ? "selected" : "" }}
          {{ isset($product) && $product->categories->contains($category->id) ? "selected" : "" }}
          value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Attache Image</label>
    <input class="form-control @error('image') is-invalid @enderror" 
    name="image" {{ !isset($product) ? 'required' : '' }}
    accept="image/png, image/gif, image/svg, image/jpg, image/jpeg" type="file" id="image"/>
    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
