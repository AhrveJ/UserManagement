@props(['regions' => [], 'divisions' => [], 'statuses' => []])

<div class="d-flex align-items-center gap-3 mb-3">
    <button class="btn btn-filters active-state" id="filtersToggleBtn"><i class="bi bi-funnel-fill me-1"></i>Filters</button>
    <a href="#" class="clear-filters-link" id="clearFiltersLink">Clear Filters</a>
</div>

<div class="row g-3 mb-3" id="filterRow">
    <div class="col-6 col-md-3 filter-row">
        <label>Status</label>
        <select class="form-select" id="statusFilter">
            <option value="All">All</option>
            @foreach ($statuses as $status)
                <option value="{{ $status }}">{{ $status }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-6 col-md-3 filter-row">
        <label>Region</label>
        <select class="form-select" id="regionFilter">
            <option value="All">All</option>
            @foreach ($regions as $region)
                <option value="{{ $region }}">{{ $region }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-6 col-md-3 filter-row">
        <label>Division</label>
        <select class="form-select" id="divisionFilter">
            <option value="All">All</option>
            @foreach ($divisions as $division)
                <option value="{{ $division }}">{{ $division }}</option>
            @endforeach
        </select>
    </div>
</div>
