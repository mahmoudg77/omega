@extends('layouts.app')

@section('title') Contact Us @endsection

@section('content')

<!-- Banner area -->
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2>Contact US</h2>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="#" class="active">Contact US</a></li>
    </ol>
</section>
<!-- End Banner area -->

    <!-- Map -->
    <div class="contact_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.9076082531474!2d31.239657615171115!3d30.039508381884115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840b64d44b52d%3A0x3c3326e33e3290aa!2s17+Magles+Al+Shaab%2C+Al+Gazirah+Al+Gadidah%2C+Abdeen%2C+Cairo+Governorate!5e0!3m2!1sen!2seg!4v1535400680467"></iframe>
        {{--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d233533.81021805512!2d90.44069804466251!3d23.85534870087626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1482565625375"></iframe>--}}
    </div>
    <!-- End Map -->

    <!-- All contact Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>Contact Info</h2>
                    <p>{{Setting::getIfExists("site_desc")}}</p>
                    <div class="location">
                        <div class="location_laft">
                            <a class="f_location" href="#">location</a>
                            <a href="#">phone</a>
                            <a href="#">fax</a>
                            <a href="#">email</a>
                        </div>
                        <div class="address">
                            <a href="#">{{Setting::getIfExists("site_address")}} <br/><br/></a>
                            <a href="#">{{Setting::getIfExists("site_phone")}}</a>
                            <a href="#">{{Setting::getIfExists("site_fax")}}</a>
                            <a href="#">{{Setting::getIfExists("emails_default")}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Send Us a Message</h2>
                    @if(isset($formErrors))
                        <div class="alert alert-danger alert-dismissible" role="start">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            @foreach($formErrors as $error)
                                {{$error}} <br/>
                            @endforeach
                        </div>
                    @endif
                    @if(isset($success)) {{$success}} @endif
                    {!!Form::open(['route'=>["contact.send"], "method"=>"POST", "class"=>"form-inline contact_box"])!!}
                        <input type="text" name="first_name" class="form-control input_box" placeholder="First Name *" value="{{isset($first_name)?$first_name:"" }}">
                        <input type="text" name="last_name" class="form-control input_box" placeholder="Last Name *"  value="{{isset($last_name)?$last_name:"" }}">
                        <input type="email" name="email" class="form-control input_box" placeholder="{{ trans('app.contact-email') }}"  value="{{isset($email)?$email:"" }}">
                        <input type="text" name="subject" class="form-control input_box" placeholder="Subject"  value="{{isset($subject)?$subject:"" }}">
                        <input type="text" name="cellphone" class="form-control input_box" placeholder="{{ trans('app.contact-tel') }}"  value="{{isset($cellphone)?$cellphone:"" }}">
                        <textarea name="message" class="form-control input_box" placeholder="{{ trans('app.contact-message') }}"  value="{{isset($message)?$message:"" }}"></textarea>
                        <button type="submit" class="btn btn-default">{{ trans('app.contact-send') }}</button>

                   {!! Form::close() !!}
                </div>

            </div>
        </div>
    </section>
    <!-- End All contact Info -->

@stop