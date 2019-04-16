@extends("main")

@section("title")
        <title>Read Post</title>
@endsection

@section("content")      
     
<section id="contact" class="content-section text-center">
        <div class="contact-section">
            <div class="container">
              <h2>Contact Us</h2>
              <p>Feel free to shout us by feeling the contact form or visiting our social network sites like Fackebook,Whatsapp,Twitter.</p>
              <div class="row">
                <div class="col-md-12 col-md-offset-4">
                <form class="form-horizontal" method='post' action='{{ url('contact')}}'>
                  {{csrf_field()}}  
                  <div class="form-group">
                      <label for="exampleInputName2">Name</label>
                      <input name='name' type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail2">Email</label>
                      <input name='email' type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputText">Your Message</label>
                     <textarea name='body' class="form-control" placeholder="Description"></textarea> 
                    </div>
                    <button type="submit" class="btn btn-success">Send Message</button>
                  </form>

                  <hr>
                </div>
              </div>
            </div>
        </div>
      </section>

@endsection