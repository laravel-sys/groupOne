@extends('layouts.app')

@section('content')

            <div class="container">
                    <div style="text-align:center; margin-bottom:">
                        <h1>Library Contact Info</h1>
                            <p><b>For more inquries please contact us:</b></p>
                    </div>
                    <div class="row">
                       
                        <div class="column">
                                <h4>Email: info@qf.org.qa</h4>
                                <p>Tel: <b>+9745243222</b></p>
                                <p>For general media inquiries,</p> 
                                <p>please contact <b>libraryMang@li.org.qa</b></p>
                                <p>Would you like to know our location?</p>
                                <p>Location: <b> Doha, Qatar. </b></p>
                                <a class="btn btn-primary" href="/contacts">Submit your inquiry</a>
                        </div> 

                        <div class="column" style="padding-left:200px;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.170521163828!2d51.52207988551355!3d25.29847433379354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45c52a09e719d7%3A0xe3ed8e4e429dd203!2z2KfZhNmD2YjYsdmG2YrYtNiMINin2YTYr9mI2K3YqQ!5e0!3m2!1sar!2sqa!4v1616791618445!5m2!1sar!2sqa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            <!-- <img src="/map.jpg" style="width:100%"> -->
                        </div>
                    </div>
            </div>
@endsection