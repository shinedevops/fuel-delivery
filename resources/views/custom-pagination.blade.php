
<div class="db-pagination-bx">
        <div class="pagination-prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                <path d="M5.82554 11.7343C5.93433 11.7343 6.04327 11.6929 6.12635 11.6098C6.29252 11.4436 6.29252 11.1743 6.12635 11.0081L1.32272 6.20465L6.12621 1.40116C6.29238 1.235 6.29238 0.965702 6.12621 0.799674C5.96005 0.633507 5.69075 0.633507 5.52458 0.799674L0.420282 5.90398C0.340516 5.98374 0.295726 6.09199 0.295726 6.20479C0.295726 6.3176 0.340516 6.42584 0.420282 6.50561L5.52472 11.6098C5.60781 11.6929 5.7166 11.7343 5.82554 11.7343Z" fill="CurrentColor" />
            </svg>
        </div>
        {{-- {{ $users->links('pagination::simple-bootstrap-5') }} --}}
        {{-- {{ $users->render('custom-pagination') }} --}}
        {{-- {{ $users->onEachSide(1)->withQueryString()->onEachSide(1)->links('pagination::simple-bootstrap-5') }} --}}

        <div class="pagination-no-bx">
            <div class="pagination-no active">
                1
            </div>
            <div class="pagination-no">
                2
            </div>
            <div class="pagination-no">
                3
            </div>
            <div class="pagination-no">
                ...
            </div>
            <div class="pagination-no">
                10
            </div>
        </div>

        <div class="pagination-next active">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                <path d="M1.3356 11.7344C1.2268 11.7344 1.11786 11.693 1.03478 11.6099C0.868615 11.4437 0.868615 11.1744 1.03478 11.0083L5.83841 6.20477L1.03492 1.40129C0.868753 1.23512 0.868753 0.965824 1.03492 0.799796C1.20109 0.633629 1.47038 0.633629 1.63655 0.799796L6.74085 5.9041C6.82062 5.98386 6.86541 6.09211 6.86541 6.20491C6.86541 6.31772 6.82062 6.42596 6.74085 6.50573L1.63641 11.6099C1.55333 11.693 1.44453 11.7344 1.3356 11.7344Z" fill="CurrentColor" />
            </svg>
        </div>
    </div>
{{-- @endsectiona --}}