@props(['total' => 0, 'pageSize' => 10])

<div class="d-flex flex-wrap align-items-center justify-content-between mt-3 gap-2">
    <div class="pager-info" id="pagerInfo">
        Showing 1 to {{ min($pageSize, $total) }} of {{ $total }} entries
    </div>
    <nav>
        <ul class="pagination mb-0" id="paginationEl">
            {{-- Rebuilt by public/js/app.js based on live filter/search state --}}
        </ul>
    </nav>
</div>
