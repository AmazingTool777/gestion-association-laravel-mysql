@props(['placeholder', 'action' => null, 'class' => ''])

<form method="GET" action="" class="{{ $class }}" {{ $attributes->merge(['style' => '']) }}>
    <div class="flex gap-x-1">
        <input type="search" id="exampleDataList" name="q" placeholder="{{ $placeholder }}"
            value="{{ request()->input('q') ?? '' }}" aria-label="{{ $placeholder }}" class="form-control" />
        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-search"></i>
        </button>
    </div>
</form>
