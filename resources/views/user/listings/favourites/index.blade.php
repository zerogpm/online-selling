@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($listings->count())
            @each ('listings.partials._listing_favourite', $listings, 'listing')
            {{ $listings->links() }}
        @else
            <p>No favourite listings found.</p>
        @endif
    </div>
@endsection
