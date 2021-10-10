


<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab" style="padding-left: 15px;">
            
            <div class="Help" style="float: right;">
               <a data-toggle="modal" data-target="#exampleModalLong"  target="_blank"><i class="fa fa-question-circle  fa-2x fa-hover"></i></a>
           
            </div>

         

          <h3 class="devider ColTextHighlight" style="color: #007bff" ;><i class="fa fa-envelope fa-15x  "></i>&nbsp;&nbsp;Google Analytics & Google Ads Conversion tracking:
            </h3>
            <hr>
            <form id="googleform">
               <input type="hidden" name="g_id" id="g_id" value="@isset($ga){{$ga->id}}@endisset">
                <div class="row">
                    <span id="ctl00_CPMain_cCompanyEdit_Label18" class="editLabel"> Web Property Id:</span>
                    <input name="GoogleAnalyticsId" type="text" value="@isset($ga){{$ga->analytics_id}}@endisset" maxlength="50" id="GoogleAnalyticsId" class="editText form-control" style="width:391px;">
                </div>
                <br>

                

   <h3 class="devider ColTextHighlight" style="color: #007bff" ;><i class="fa fa-envelope fa-15x  "></i>&nbsp;&nbsp;Google Ads Conversion tracking:
            </h3>
            <hr>

                <div class="row">
                    <span id="ctl00_CPMain_cCompanyEdit_Label25" class="editLabel">Google Ads Conversion Id:</span>
                    <input name="GoogleAdConversionId" type="text" value="@isset($ga){{$ga->ad_conversion_id}}@endisset" maxlength="50" id="GoogleAdConversionId" class="editText form-control" data-validation-number="Int" data-validation-number-min="0" style="width:391px;">

                    <p class="hint" style="clear:both;">Entering Google Conversion Id that you can get from your Google Ads portal pixel generation page, will add remarketing tracking to all your website pages.</p>
                </div>
                <div class="row">
                    <span id="ctl00_CPMain_cCompanyEdit_Label26" class="editLabel">Google Ads Conversion Label:</span>
                    <input name="GoogleAdConversionLabel" type="text" value="@isset($ga){{$ga->ad_conversion_label}}@endisset" maxlength="50" id="GoogleAdConversionLabel" class="editText form-control" style="width:391px;">
                    <p class="hint" style="clear:both;">Entering Google Ads Conversion Label and the conversion id adds conversion tracking to the purchase confirmation page.</p>
                </div>

            
            
            <div class="row2" style="text-align:center;">
      <button class="btn btn-success  btn-sm" style="width: 60px;">Save</button>
   </div>
           </form> 
        </div>

      


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Google Analytics Integration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="cHelpDialog Module adminhelpModule cSingle ui-dialog-content ui-widget-content" id="ui-id-71" style="width: auto; min-height: 0px; max-height: none; height: 649.728px;"><h2 class="ColTextHighlight"> <i class="fa fa-question-circle"></i>&nbsp;&nbsp;Google Analytics Integration</h2>
                    <p>Google Analytics gives you detailed analytics and stats of your website's traffic. If you want to improve your website traffic, first you should have a good insight of its current state and should be able to monitor the growth or changes.</p>
                    <p>Google Analytics gives you valuable information about users who visited your site. From what country/city they area? What demographic? From what website, did they get to your site? What keywords did they search to find your site? And many more valuable information.</p>
                    <p>You will need to register for Google Analytics (free) to make use of this feature.</p>"
                    <h3 class="ColTextHighlight">Integrating your website with Google Analytics:</h3>
                    <ol>
                        <li>Sign up for a Google Analytics account by going to <a href="https://www.google.com/analytics" target="_blank">https://www.google.com/analytics/</a> or log into an existing Analytics Account </li>
                        <li>Click on "Admin" at the top</li>
                        <li>Click on "New Account" button</li>
                        <li>Enter your site name as the account name and enter the url to your site</li>
                        <li>Hit Save</li>
                        <li>Click on "A Single Domain" and click save again.</li>
                        <li>Get the "Tracking ID" or "Property ID" (UA-xxxxxxxx-x) </li>
                        <li>Open your site in a new window, login as admin and go to <i>Control Panel -&gt; Account &amp; Settings -&gt; Site Settings</i> and click on <i>Google Analytics</i> tab.</li>
                        <li>Paste the value in the "Web Property ID" field of your site</li>
                        <li>Hit Save.</li>
                        <li>In a few hours, you will be able to get reports by logging in to your Google Analytics account.</li>
                    </ol>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>