<?php
$contact = "Contact Us";
include_once 'myportalhead.php';
?>
<div class="gy-1" id="contact">
  <div class="mt-sm-5">
    <div class="row text-center mx-auto gy-5" style="width: 170px;font-family:czars;z-index:-1">
      <h1> Contact Us</h1>
    </div>
  </div>

  <div class="mt-sm-3">
    <div class="row-sm mx-auto" style="width:initial">
      <div class="col-sm-6 mx-auto">

        <form action="" method="">
          <p>
            <input type="text" name="fullname" id="names" placeholder="name" style="border: 0px solid black;
                    background-color: rgba(223, 223, 223,0.9);
                     " class="form-control" />

          <p>
            <label for="emailaddress"></label>
            <input type="email" name="emailaddress" id="emailaddress" placeholder="email" style="border: 0px solid black;
                    background-color: rgba(223, 223, 223,0.9);
                    " class="form-control" />
          </p>

          <p> <input type="number" name="contact number" id="names" placeholder="phone number" style="border: 0px solid black;
                         background-color: rgba(223, 223, 223,0.9);
                          " class="form-control" />
          </p>

          <p>

            <label for="msg">Message </label>
            <textarea name="message" rows="5" cols="30" id="msg" value="message" style="border: 0px solid black;
                      background-color: rgba(223, 223, 223,0.9);
                       " class="form-control"> </textarea>
          </p>
          <p>
            <!--code for submit button-->
            <input type="submit" name="submit" value="Send message" style="border: 0px solid rgba(0,0,0,0.5);
                    background-color:rgba(5, 12, 36, 0.7); color: white;" class="form-control" />
          </p>
          </p>

        </form>
      </div>
    </div>
  </div>
</div>

<div class="row p-4" style="justify-content: center;text-align:center;font-family:czars">
  <h1>Our Location</h1>
  <div class="col-sm-12">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.083580704098!2d3.340091074520879!3d6.511104612328915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8c242cf8cf63%3A0x1728e66a3197cb85!2s5%20Cole%20St.%2C%20Ikate%20101241%2C%20Lagos!5e0!3m2!1sen!2sng!4v1663551695292!5m2!1sen!2sng" width="950" height="" class="img-fluid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>

<?php
include_once 'myportalfoot.php';
?>