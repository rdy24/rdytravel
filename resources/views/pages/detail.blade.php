@extends('layouts.app')

@section('title')
    rdytravel | {{ $item->title }}
@endsection

@push('addon-style')
    <!-- Xzoom -->
    
    <link rel="stylesheet" href="{{ url('libraries/xzoom/dist/xzoom.css') }}" />
@endpush

@section('content')
<main>
  <section class="section-details-header"></section>
  <section class="section-details-content">
    <div class="container">
      <div class="row">
        <div class="col p-0">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item" aria-current="page">
                {{ $item->title }}
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Details
              </li>
            </ol>
          </nav>
        </div>
        <div class="row">
          <div class="col-lg-8 pl-lg-0">
            <div class="card card-details">
              <h1>{{ $item->title }}</h1>
              @if ($item->galleries->count() > 0)
                  <div class="gallery">
                    <div class="xzoom-container">
                      <img
                        class="xzoom"
                        id="xzoom-default"
                        src="{{ Storage::url($item->galleries->first()->image) }}"
                        xoriginal="{{ Storage::url($item->galleries->first()->image) }}"
                      />
                      <h2 class="mt-3">Destination</h2>
                      <div class="xzoom-thumbs">
                        @foreach ($item->galleries as $gallery)
                          <a href="{{ Storage::url($gallery->image) }}"
                          ><img
                            class="xzoom-gallery"
                            width="120"
                            height="80"
                            src="{{ Storage::url($gallery->image) }}"
                            xpreview="{{ Storage::url($gallery->image) }}"
                          /></a>
                        @endforeach
                      </div>
                    </div>
                  </div>
              @endif
              <h2>Tentang Wisata</h2>
              {!! $item->about !!}
              <div class="features row">
                <div class="col md-4">
                  <img
                    src="{{ url('images/tiket.png') }}"
                    alt="Event"
                    class="featured-image"
                  />
                  <div class="description">
                    <h3>Features Event</h3>
                    <p>{{ $item->featured_event }}</p>
                  </div>
                </div>
                <div class="col md-4 border-left">
                  <img
                    src="{{ url('images/bahasa.png') }}"
                    alt="Language"
                    class="featured-image"
                  />
                  <div class="description">
                    <h3>Language</h3>
                    <p>{{ $item->language }}</p>
                  </div>
                </div>
                <div class="col md-4 border-left">
                  <img
                    src="{{ url('images/Food.png') }}"
                    alt="Food"
                    class="featured-image"
                  />
                  <div class="description">
                    <h3>Foods</h3>
                    <p>{{ $item->foods }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-details card-right">
              <h2>Members are going</h2>
              <div class="members mt-3">
                <img src="{{ url('images/member-1.png') }}" class="member-image mr-1" />
                <img src="{{ url('images/member-2.png') }}" class="member-image mr-1" />
                <img src="{{ url('images/member-3.png') }}" class="member-image mr-1" />
                <img src="{{ url('images/member-4.png') }}" class="member-image mr-1" />
                <img src="{{ url('images/member-5.png') }}" class="member-image mr-1" />
              </div>
              <hr />
              <h2>Trip Information</h2>
              <table class="trip-information">
                <tr>
                  <th width="50%">Date of Depature</th>
                  <td width="50%" class="text-right">{{ \Carbon\Carbon::create($item->date_of_departure)->format('F n, Y') }}</td>
                </tr>
                <tr>
                  <th width="50%">Duration</th>
                  <td width="50%" class="text-right">{{ $item->duration }}</td>
                </tr>
                <tr>
                  <th width="50%">Type</th>
                  <td width="50%" class="text-right">{{ $item->type }}</td>
                </tr>
                <tr>
                  <th width="50%">Price</th>
                  <td width="50%" class="text-right">${{ $item->price }} / person</td>
                </tr>
              </table>
            </div>
            <div class="join-container">
              @auth
              <form action="{{ route('checkout_process', $item->id) }}" method="post">
                  @csrf
                  <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                      Join Now
                  </button>
              </form>
              @endauth
              @guest
                  <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                      Login or Register to Join
                  </a>
              @endguest
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@push('addon-script')
<script src="{{ url('libraries/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ url('libraries/xzoom/dist/xzoom.min.js') }}"></script>
<script>
  $(document).ready(function () {
    $(".xzoom, .xzoom-gallery").xzoom({
      zoomWidth: 500,
      title: false,
      tint: "#333",
      Xoffset: 15,
    });
  });
</script>
@endpush