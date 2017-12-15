@extends('main')

     @section('title','| contact')
    @section('content')
      <div class="row">
        <div class="col-md-12">

          <h1>Contact me</h1>
          <hr>
          <form>
             <div class="form-group">
                 <label name="email"> email:</label>
                 <input type="text" name="email" id="emial" size="20px"  class="form-control">
             </div>
             <div class="form-group">
                 <label name="subject"> subject:</label>
                 <input type="text"  name="subject" size="20px" id="subject" class="form-control">
             </div>
             <div class="form-group">
                 <label name="message"> Message:</label>
                 <textarea name="message" id="message" size="20px"  class="form-control"> 
                  type your message here//</textarea>
             </div>
             <input type="submit" value="send" class="btn btn-success" />
          </form>

        </div>  
      </div>
    @endsection