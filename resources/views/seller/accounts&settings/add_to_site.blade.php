@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>

.ticketorModal 
{display: none;
position: fixed
;z-index: 10000;
left: 0;
top: 0;
width: 100%;
height: 100%;
overflow: auto;

background-color: rgb(0,0,0);
background-color: rgba(0,0,0,0.4);}
.ticketorClose {
    background-color: #aaa;
    
    color:#000;
    border-radius:3px;
    text-decoration:none;
     width:30px;
     height:30px;
     line-height:30px;
     position:fixed;
     right:30px;
      top:10px;
      font-size: 28px;
      font-weight: bold;
      z-index:10001;
      text-align:center;
      font-family: verdana,arial,sans-serif,helvetica;}
      .ticketorClose:hover,.ticketorClose:focus 
      {text-decoration: none;
      cursor: pointer;}
      .ticketorLoader 
      {border: 16px solid #f3f3f3;
      border-top: 16px solid #333;
      border-radius: 50%;
      width: 120px;
      height: 120px;
      animation: spin 2s linear infinite;
      left:50%;top:50%;
      margin: -60px 0 0 -60px;position:absolute;}
      @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
          }
          .ticketorFrameContainer
           {
              width:80%;
              top:10%;
              position:absolute;
               left:10%;
               }
               @media all and (max-width: 800px)
               {
                   body .ticketorFrameContainer
                {
                    width:100%;top:0;
                position:absolute; 
                left:0;
                }
               }




hr{
    border-top-color: gray;

}

</style>

@endsection
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
  <!-- Navbar -->
  @include('layouts.seller_navbar')
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      @include('layouts.seller_sidebar')
      <!-- /Main Sidebar Container -->
      <div class="content-wrapper">
   
          <div class="card card-info" >
            <div class="card-header" style="background-color: #007bff;">
              <h3 class="card-title">Add to your site
              </h3>
            </div>
        </div>
        <div id="cEmbed" title="Add to your site or WordPress" class="clearfix"style="padding-left: 40px;">
          <div class="block">
              <span for="cEmbedWhat">What do you want to add to your site?</span><br>
              <select id="cEmbedWhat">
                  <option value="" disabled="disabled">-----------Events-----------</option><option value="" selected="selected">List of all events page</option><option value="https://www.ticketor.com/ajevents/upcomingevents?cat=">List of all events in a certain category</option><option value="" disabled="disabled">-----------Site Pages-----------</option><option value="https://www.ticketor.com/ajevents/about-us?pageid=168571">About Us</option><option value="https://www.ticketor.com/ajevents/tickets?pageid=168567">Tickets</option><option value="https://www.ticketor.com/ajevents/store?pageid=168568">Store</option><option value="https://www.ticketor.com/ajevents/gallery?pageid=168569">Gallery</option><option value="https://www.ticketor.com/ajevents/contact-us?pageid=168570">Contact Us</option><option value="https://www.ticketor.com/ajevents/reviews?pageid=168572">Reviews</option><option value="" disabled="disabled">--------------------------</option><option value="current">Current Page</option>
              </select>
          </div><br>
          <div class="row2">
              <span for="cEmbedType">How do you want to add it to your site?</span><br>
              <select id="cEmbedType">
                  <option value="cTicketorButton cTicketorPopup" selected="selected">A button that opens as popup in my website</option>
                  <option value="cTicketorLink cTicketorPopup">A link that opens as popup in my website</option>
                  <option value="cTicketorButton cTicketorHref">A button that links to your Ticketor site</option>
                  <option value="cTicketorLink cTicketorHref">A link that points to your Ticketor site</option>
                  <option value="cTicketorIframe">An iframe embeded in your site</option>
                  <option value="cTicketorShortcode">A shortcode to use in Wordpress site</option>
                  <option value="cTicketorUrl ">Just the URL</option>
              </select>
          </div><br>
          <h3 class="devider"style="color: #007bff;"><i class="fa fa-gear fa-15x "></i>&nbsp;&nbsp;Options:</h3><hr>
          <div id="cEmbedOptions">
              <div class="row emEventCategory" style="display: none;">
                  <span for="cEventCategory">Event Category:</span>
                  <input type="text" id="cEventCategory" maxlength="100">
              </div>
              <div class="row cViewAs" style="display: none;">
                  <span for="cViewAs">View as:</span>
                  <select id="cViewAs">
                      <option value="list" selected="selected">List / Gallery</option>
                      <option value="calendar">Calendar</option>
                      <option value="map">Map</option>
                  </select>
              </div>
      
              <div class="row2 emNoHref" style="padding-left: 10px;">
                  <input type="checkbox" id="cModuleOnly" checked="checked">
                  <span for="cModuleOnly">Show the module only</span>
              </div>
              <div class="row2 emNoHref" style="padding-left: 10px;">
                  <input type="checkbox" id="cHasHeader">
                  <span for="cHasHeader">Show Page Header</span>
              </div>
              <div class="row2 emNoHref" style="padding-left: 10px;">
                  <input type="checkbox" id="cHasTopNav">
                  <span for="cHasTopNav">Show Top Nav</span>
              </div>
              <div class="row2 emNoHref" style="padding-left: 10px;">
                  <input type="checkbox" id="cHasModuleHeader" checked="checked">
                  <span for="cHasModuleHeader">Show Module Header</span>
              </div>
              <div class="row emNoHref" style="display: none;">
                  <input type="checkbox" id="cHasModuleWrap">
                  <label for="cHasModuleWrap">Show Module Wrap</span>
              </div>
              <div class="row  emIframe cTransparent" style="display: none;">
                  <input type="checkbox" id="cTransparent" checked="checked">
                  <spanl for="cTransparent">Transparent</span>
              </div><br>
              <div class="row2 emButton emLink"  style="padding-left: 10px;">
                  <span for="cLinkText">Text on The Link / Button:</span><br>
                  <input type="text" id="cLinkText" maxlength="100" value="Buy Tickets">
              </div><br>
              <div class="row2 emButton"  style="padding-left: 10px;">
                  <span for="cLinkColor emButton">Text Color:</span><br>
                  <input type="text" id="cLinkText" maxlength="100" value="fffff">
              </div><br>
              <div class="row2 emButton"  style="padding-left: 10px;">
                  <span for="cLinkBGColor emButton">Background Color:</span><br>
                  <input type="text" id="cLinkBGColor" maxlength="8" value="3498db" style="background-color: rgb(52, 152, 219); color: rgb(0, 0, 0);"><span class="jPicker"><span class="Icon"><span class="Color" style="background-color: rgb(52, 152, 219)width:65px;;">&nbsp;</span><span class="Alpha" style="background-image: url(&quot;/jPicker/images/bar-opacity.png&quot;); visibility: hidden;">&nbsp;</span><span class="Image" title="Click To Open Color Picker" style="background-image: url(&quot;/jPicker/images/picker.gif&quot;);">&nbsp;</span><span class="Container">&nbsp;</span></span></span>
              </div><br>
              <div class="row2 cOpenLinks emButton emLink emIframe" style="padding-left: 10px;">
                  <span for="cOpenLinks">Open links in:</span><br>
                  <select id="cOpenLink">
                      <option value="blank" selected="selected">A new window</option>
                      <option value="parent">The parent window</option>
                      <option value="frame">The same iframe</option>
                  </select>
              </div>
      
          </div><br>
          <h3 class="devider"style="color: #007bff; padding-left: 10px;"><i class="fa fa-code fa-15x "></i>&nbsp;&nbsp;Code:</h3>
          <div class="cEmbedNotes">
              <p class="hint emIframe" style="margin-bottom: 10px; display: none;">Make sure to embed the code in a section that is wide enough (specially on mobile and smaller screens) and the height can grow and shrink without limitation.</p>
              <p class="hint emIframe emPopup" style="margin-bottom: 10px;padding-left: 10px;;">You should only add this code to a secure page (https:)</p>
              <p class="hint emShortCode" style="display: none;"><a href="" target="_blank">Instruction &amp; Download Plugin</a></p>
          </div>
          <div class="cCopiable">
              <a href="javascript:void(0)" title="Copy value" class="cCopy"><i class="fa fa-copy fa-hover"></i></a>
              <textarea id="cEmbedCodeResult" readonly="readonly" rows="3"style="padding-left: 719px;"></textarea>
          </div><br>
      
          <h3 class="devider"style="color: #007bff; padding-left: 10px;"><i class="fa fa-eye fa-15x "></i>&nbsp;&nbsp;Preview:</h3><hr><br>
          <div class="cEmbedPreview">
            <div class="cPromotionPlan cNoPromotion " data-value="1"> <div id="filters ui-widget-content  ui-corner-all" class="filters ui-widget-content  ui-corner-all" style="padding-left: 30px;
              border: 1px solid black;
              width: 95%;
              margin: 0 auto;
              padding-top: 25px;
              border-radius: 20px;
              padding-bottom: 25px;
              min-height: 156px;">
              <div class="cEmbedPreviewHead"></div>
              <div class="cEmbedPreviewbody">
                  <div class="cEmbedPreviewSide"></div>
                  <div class="cEmbedPreviewArea">
                  
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent laoreet ut urna quis euismod. Pellentesque habitant morbi tristique senectus et.</p>
<div style="padding:20px;text-align:center;">
   <div class="ticketorEmbedContainer">
      
      <div class="ticketorModal" role="dialog" aria-modal="true">
         <a class="ticketorClose" href="#" title="Close" target="_blank">×</a>
         <div class="ticketorLoader"></div>
         <div class="ticketorFrameContainer"></div>
      </div>
   </div>
   <div style="width:0;height:0;overflow:hidden;">Event ticketing and box-office system for ARJUN EVENTS provided by <a href="https://www.ticketor.com" title="Event ticketing and box-office system for ARJUN EVENTS" target="_blank">Ticketor</a></div>
   <a href="" onclick="" title="Buy Tickets" style="text-decoration:none;color:#ffffff;background-color:#3498db;border-radius:3px; padding:5px 10px;display:inline-block;" target="_blank">Buy Tickets</a><script type="text/javascript" src="//www.ticketor.com/js/embed.js"></script>
</div>
<p>Nulla nisl velit, auctor eget dapibus at, condimentum et magna. Ut vitae dignissim enim. Nullam sit amet dapibus eros, a venenatis ante. Mauris interdum, orci nec tempor ornare, arcu enim accumsan mauris, id lacinia lorem orci id ipsum. Donec placerat nisi eu nisl consequat, nec luctus urna luctus. Aenean a.</p>
</div>
              </div>
          </div>
          
      </div><br>
      
          </div>

  
 
     
         <!-- footer -->
         <!-- @include('layouts.seller_footer') -->
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')

@endsection