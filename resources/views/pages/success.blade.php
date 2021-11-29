@extends('layouts.success')

@section('title')
    rdytravel | Checkout
@endsection

@section('content')
  <main>
    <section class="section-details-header"></section>
    <div class="section-success d-flex align-item-center">
      <div class="col text-center">
        <img src="images/ic_mail.png" class="mail-image" />
        <h1>Yay! Success</h1>
        <p>
          We’ve sent you email for trip instruction
          <br />
          please read it as well
        </p>
        <a href="index.html" class="btn btn-home-page mt-3 px-5">Home Page</a>
      </div>
    </div>
  </main>
@endsection
