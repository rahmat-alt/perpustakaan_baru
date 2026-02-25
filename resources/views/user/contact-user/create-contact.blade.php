@forelse ($heroinfo as $item)
<div class="col-lg-3">
    <div class="right-info">
        <ul>
            <li>
                <h6>Phone Number</h6>
                <span>{{ $item->phone_number }}</span>
            </li>
            <li>
                <h6>Email Address</h6>
                <span>{{ $item->email ?? 'info@meeting.edu' }}</span>
            </li>
            <li>
                <h6>Street Address</h6>
                <span>{{ $item->address ?? 'Alamat belum tersedia' }}</span>
            </li>
            <li>
                <h6>Website URL</h6>
                <span>{{ $item->website ?? 'www.meeting.edu' }}</span>
            </li>
        </ul>
    </div>
</div>
@empty
<div class="col-lg-3">
    <div class="right-info">
        <p>Data informasi belum tersedia.</p>
    </div>
</div>
@endforelse
