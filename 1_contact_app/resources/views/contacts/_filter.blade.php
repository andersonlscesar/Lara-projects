<form class="row" id="filter">
    <div class="col-md-6">
        <a href="{{ request()->fullUrlWithQuery(['trash' => false]) }}" class="btn {{ !request()->query('trash') ? 'text-primary' : 'text-secondary'}}">All</a>
        |
        <a href="{{ request()->fullUrlWithQuery(['trash' => true]) }}" class="btn {{ request()->query('trash') ? 'text-primary' : 'text-secondary'}}">Trash</a>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col">
          <select class="custom-select" name="company_id" >
            <option value="" selected>All Companies</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}" @if ($company->id == request()->query('company_id')) selected @endif>{{ $company->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col">
          <div class="input-group mb-3">
            <input type="hidden" name="trash" value="{{ request()->query('trash') }}">
            <input type="text" class="form-control" name="search" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2" value="{{ request()->query('search') }}">
            <div class="input-group-append">
              @if (request()->filled('company_id') || request()->filled('search'))
                <button class="btn btn-outline-secondary" type="submit" id="reset-button">
                  <i class="fa fa-refresh"></i>
                </button>
              @endif
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>


  @push('scripts')
  <script src="{{ asset('assets/js/custom.js')}}"></script>
  @endpush