@extends('layouts.checkout') 

@section('title') 
  rdytravel | Checkout 
@endsection

@push('addon-style')
  <link rel="stylesheet" href="{{ url('libraries/gijgo/css/gijgo.min.css') }}" />
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
              <li class="breadcrumb-item">{{ $item->travel_package->title }}</li>
              <li class="breadcrumb-item">Details</li>
              <li class="breadcrumb-item active">Checkout</li>
            </ol>
          </nav>
        </div>
        <div class="row">
          <div class="col-lg-8 p-lg-0">
            <div class="card card-details">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <h1>Who is Going?</h1>
              <p>Buy {{ $item->travel_package->title }}</p>
              <div class="attendee">
                <table class="table table-responsive-sm text-center">
                  <thead>
                    <tr>
                      <td>Picture</td>
                      <td>Name</td>
                      <td>Nationality</td>
                      <td>Visa</td>
                      <td>Passport</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($item->details as $detail)
                        <tr>
                          <td>
                            <img src="https://ui-avatars.com/api/?name= {{ $detail->username }}" height="60" class="rounded-circle"/>
                          </td>
                          <td class="align-middle">
                            {{ $detail->username }}
                          </td>
                          <td class="align-middle">
                            {{ $detail->nationality }}
                          </td>
                          <td class="align-middle">
                            {{ $detail->is_visa ? '30 Days' : 'N/A' }}
                          </td>
                          <td class="align-middle">
                            {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                          </td>
                          <td class="align-middle">
                            <a href="{{ route('checkout-remove', $detail->id) }}">
                              <img src="{{ url('images/ic_remove.png') }}" alt="" />
                            </a>
                          </td>
                        </tr>
                    @empty
                      <tr>
                        <td colspan="6" class="text-center">
                            No Visitor
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <div class="member mt-3">
                <h2>Add Member</h2>
                <form class="row g-3" method="post" action="{{ route('checkout-create', $item->id) }}">
                  @csrf
                  <div class="col-auto">
                    <label for="inputUsername" class="visually-hidden sr-only"
                      >Name</label
                    >
                    <input
                      type="text"
                      name="username"
                      class="form-control"
                      id="inputUsername"
                      placeholder="Username"
                    />
                  </div>
                  <div class="col-auto">
                    <label for="nationality" class="visually-hidden sr-only"
                      >Nationality</label
                    >
                    <input
                      type="text"
                      name="nationality"
                      class="form-control mb-2"
                      style="width: 50px;"
                      id="inputNationality"
                      placeholder="Nationality"
                    />
                  </div>
                  <div class="col-auto">
                    <label
                      class="visually-hidden me-2"
                      for="inlineFormCustomSelectPref"
                      >Preference</label
                    >
                    <select
                      name="is_visa"
                      id="inputVisa"
                      class="form-select mb-2 me-sm-2"
                    >
                      <option selected value="">VISA</option>
                      <option value="1">30 Days</option>
                      <option value="0">N/A</option>
                    </select>
                  </div>
                  <div class="col-auto">
                    <label for="doePassport" class="visually-hidden"
                      >DOE Passport</label
                    >
                    <div class="input-group mb-2 mr-sm-2">
                      <input
                        type="text"
                        name="doe_passport"
                        class="form-control-sm datepicker"
                        id="doePassport"
                        placeholder="DOE Passport"
                      />
                    </div>
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary">
                      Add Now
                    </button>
                  </div>
                </form>
                <h3 class="mt-2 mb-0">Note</h3>
                <p class="disclaimer mb-0">
                  You are only able to invite member that has registered in
                  rdytravel.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-details card-right">
              <h2>Checkout Information</h2>
              <table class="trip-information">
                <tr>
                  <th width="50%">Members</th>
                  <td width="50%" class="text-right">
                      {{ $item->details->count() }} Person
                  </td>
                </tr>
                <tr>
                  <th width="50%">Additional Visa</th>
                  <td width="50%" class="text-right">
                    $ {{ $item->additional_visa }},00
                  </td>
                </tr>
                <tr>
                  <th width="50%">Trip Price</th>
                  <td width="50%" class="text-right"> 
                    {{ $item->travel_package->price }},00 / person
                  </td>
                </tr>
                <tr>
                  <th width="50%">Sub Total</th>
                  <td width="50%" class="text-right">$ {{ $item->transaction_total }},00</td>
                </tr>
                <tr>
                  <th width="50%">Total (+Unique)</th>
                  <td width="50%" class="text-right text-total">
                    <span class="text-green">$ {{ $item->transaction_total }},</span>
                    <span class="text-orange">{{ mt_rand(0,99) }}</span>
                  </td>
                </tr>
              </table>
              <hr />
              <h2>Payment Instructions</h2>
              <p class="payment-instructions">
                Please complete your payment before to continue the wonderful
                trip
              </p>
              <div class="bank">
                <div class="bank-item pb-3">
                  <img src="{{ url('images/ic_bank.png') }}" class="bank-image" />
                  <div class="description">
                    <h3>PT rdytravel Tbk</h3>
                    <p>
                      0881 9892 9880
                      <br />
                      Bank Central Asia
                    </p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="bank-item pb-3">
                  <img src="{{ url('images/ic_bank.png') }}" class="bank-image" />
                  <div class="description">
                    <h3>PT rdytravel Tbk</h3>
                    <p>
                      0881 9892 0089
                      <br />
                      Standard Chartered Bank
                    </p>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <div class="join-container">
              <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-join-now py-2">I Have Made Payment</a>
            </div>
            <div class="text-center mt-3">
              <a href="{{ route('detail', $item->travel_package->slug) }}" class="text-muted"> Cancel Booking </a>
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
<script src="{{ url('libraries/retina/retina.js') }}"></script>
<script src="{{ url('libraries/gijgo/js/gijgo.min.js') }}"></script>
<script>
  $(document).ready(function () {
    $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      uiLibrary: "bootstrap5",
      icons: {
        rightIcon: '<img src="{{ url('images/ic_doe.png') }}" />',
      },
    });
  });
</script>
@endpush
