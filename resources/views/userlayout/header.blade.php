<nav class="nav-menu d-none d-lg-block">
    <ul>
      <li class="active"><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('/about') }}">About Us</a></li>
      <li class="drop-down"><a href="{{ url('/university') }}">Study</a>
        <ul>
                @foreach ($unicats as $item)
          <li><a href="/university/cat/{{ $item->id }}">{{ $item->name_uni }}</a></li>
        @endforeach
        </ul>
      </li>
      <li><a href="{{ url('homerent/') }}">Rent House</a></li>

      <li>

        <li class="drop-down"><a href="#">Halal Zone</a>
          <ul>

            <li><a href="{{ url('homerent/muslim') }}">Rent House</a></li>
            <li><a href="{{ url('halal/food') }}">Halal Food Shop</a></li>



            <li><a href="{{ url('/mosque') }}">Mosque</a></li>

          </ul>
            </li>
      </li>
      <li class="drop-down"><a href="#">Job</a>
        <ul>
          @foreach ($jobs as $value)



          <li><a href="{{ url('jobs') }}/{{ $value->id }}">{{ $value->menu_title }}</a></li>
             @endforeach

        </ul>
          </li>
    </li>


      <li class="drop-down"><a href="">Preparation</a>
        <ul>
 <?php

  $data = DB::table('preparationcats')->get();

               foreach ($data as  $value) {

                   echo "<li class='drop-down'><a href='#''>".$value->name."</a>
                   <ul>";


                   $id = $value->id;
                   $datas = DB::table('preparations')->where('cat_id', '=', $id)->get();
                   foreach ($datas as $values) {
                       echo "<li><a href='".url("preparation/{$values->id}")."'>".$values->menu_title."</a></li>";
                   }


                   echo "</ul></li>";
                }

  ?>

        </ul>
      </li>

      <li class="drop-down"><a href="#">Japanese Test </a>
        <ul>
          @foreach ($japantest as $value)



          <li><a href="{{ url('japanesetest') }}/{{ $value->id }}">{{ $value->menu_title }}</a></li>
             @endforeach

        </ul>
          </li>
    </li>



      <li>
        @if (session('active')==true)

            <li class="drop-down"><a href="#">{{ session('user') }}</a>
              <ul>
                @if (session('status')==1)
                
                <li><a href="{{ url('agentpost/') }}">Add agent Post</a></li>
                <li><a href="{{ url('mypost/agent') }}">my Post</a></li>

                @endif
                <li><a href="{{ url('/logout') }}">Logout</a></li>

              </ul>
                </li>
            @else
            <li>

              <a href="/customerlogin">Login</a>
            </li>
            @endif




    </ul>
<style>
    .goog-te-banner-frame{visibility: hidden !important;}
    .goog-te-gadget-icon{ visibility: hidden !important;}
    #google_translate_element{margin-right: 36px !important;}
    .goog-logo-link{visibility: hidden !important;}
    .skiptranslate,.goog-te-gadget{ color: #fff !important;}
</style>
<script type="text/javascript">
// function googleTranslateElementInit() {
//   new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
// }
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </nav><!-- .nav-menu -->
 <div style="margin-left: 10px;" id="google_translate_element"></div>

