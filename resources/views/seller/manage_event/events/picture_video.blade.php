 <div id="picture" class="cPictures ui-tabs-panel ui-corner-bottom ui-widget-content" aria-labelledby="ui-id-24" role="tabpanel" aria-hidden="false" style="">
     <div class="cFlyerContainer  cWizStep5"style="padding-left:20px;">

      <div class="Help" style="float: right;margin:18px;">
               <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                <i class="fa fa-question-circle  fa-2x fa-hover"></i>
              </a>
                <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                  <i class="fa fa-youtube-play fa-2x fa-hover" ></i>
                </a>
            </div>

                <h3 class="devider ColTextHighlight"style="color: #007bff";>
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="20" viewBox="0 0 16 12" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 1H1.5C1.36739 1 1.24021 1.05268 1.14645 1.14645C1.05268 1.24021 1 1.36739 1 1.5V10.5C1 10.6326 1.05268 10.7598 1.14645 10.8536C1.24021 10.9473 1.36739 11 1.5 11H14.5C14.6326 11 14.7598 10.9473 14.8536 10.8536C14.9473 10.7598 15 10.6326 15 10.5V1.5C15 1.36739 14.9473 1.24021 14.8536 1.14645C14.7598 1.05268 14.6326 1 14.5 1ZM1.5 0C1.10218 0 0.720644 0.158035 0.43934 0.43934C0.158035 0.720644 0 1.10218 0 1.5L0 10.5C0 10.8978 0.158035 11.2794 0.43934 11.5607C0.720644 11.842 1.10218 12 1.5 12H14.5C14.8978 12 15.2794 11.842 15.5607 11.5607C15.842 11.2794 16 10.8978 16 10.5V1.5C16 1.10218 15.842 0.720644 15.5607 0.43934C15.2794 0.158035 14.8978 0 14.5 0H1.5Z" fill="#007BFF"/>
                    <path d="M10.648 5.64595C10.7222 5.57189 10.8179 5.52306 10.9215 5.50637C11.025 5.48968 11.1312 5.50598 11.225 5.55295L15.002 7.49995V11H1.00195V9.99995L3.64795 7.64595C3.72969 7.56452 3.83707 7.51385 3.95189 7.50255C4.06672 7.49125 4.18191 7.52001 4.27795 7.58395L6.93795 9.35695L10.648 5.64695V5.64595Z" fill="#007BFF"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.50195 5C4.69894 5 4.89399 4.9612 5.07598 4.88582C5.25797 4.81044 5.42333 4.69995 5.56261 4.56066C5.7019 4.42137 5.81239 4.25601 5.88777 4.07403C5.96315 3.89204 6.00195 3.69698 6.00195 3.5C6.00195 3.30302 5.96315 3.10796 5.88777 2.92597C5.81239 2.74399 5.7019 2.57863 5.56261 2.43934C5.42333 2.30005 5.25797 2.18956 5.07598 2.11418C4.89399 2.0388 4.69894 2 4.50195 2C4.10413 2 3.7226 2.15804 3.44129 2.43934C3.15999 2.72064 3.00195 3.10218 3.00195 3.5C3.00195 3.89782 3.15999 4.27936 3.44129 4.56066C3.7226 4.84196 4.10413 5 4.50195 5V5Z" fill="#007BFF"/>
                  </svg>
                  &nbsp;&nbsp;Flyer:
                </h3>
                <hr>

       <div class="row">
                  <span id="ctl02_Label24" class="editLabel"style="padding-left: 15px;">Upload a flyer for your event: (.jpg, .gif, .png)</span>
                  <p class="hint"style="padding-left: 15px; font-size:14px">Flyers will show on your homepage, event information page, find tickets page and the tickets. It is the main picture for the event.</p>

           <!--form end picture & video-------------------------------------------------  -->
       <!-- <form id="flyer-form" method="POST" action="/seller/add_event_flyer"  enctype="multipart/form-data" >   
                    @csrf
                    -->                       
                  <form id="flyer-form">
                  <div class="row imgContainer">
                    <div class="cImageUploader" style="text-align:center;" data-type="EventFlyer" data-uploadfilename="209443" data-noimage="">
                      <div class="row flyerupload1"style="padding-left:400px;">

                        <!-- <button class="btn btn-dark "><i class="fa fa-upload  "></i>&nbsp;&nbsp; Select / Upload Flyer</button> -->
                   






                        <input type="file" name="flyer" id="flyer">
                        &nbsp;&nbsp;
                        <i class="fa fa-trash fa-2x delete fa-hover" title="Remove Image" style="display: none;"></i>
                      </div>
                      <br>

                      <div class="row ticket-upload"style="float:left;padding-left:340px;display:inline-block;">
                        <img id="FlyerPreview" src="https://ticketor.net/usercontent/0/evt/0.gif" style="border-width:1px;border-style:solid;border-radius: 20px;width: 200px;">

                         

                      </div>
                           

         <div class="row ticket-upload ticket_demo"style="display:inline-block;width:50%;float:left;position: relative; left: 0; top: 0;">
  <img class="tic_image" id="ctl02_cFlyerPreview"  src="{{ asset('assets/seller/images/ticket_preview.png')}}" style="border-width:1px;border-style:solid;border-radius:20px;width:100%;">
<img class="pre_preview" id="innerFlyerPreview" src="https://ticketor.net/usercontent/0/evt/0.gif" >
                      </div>

                    </div>
                  </div>
                </div>
                <br>


          <div class="cSeatingChartContainer cAdv">
            <div class="Help" style="float: right;margin:18px;">
               <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                <i class="fa fa-question-circle  fa-2x fa-hover"></i>
              </a>
                <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                  <i class="fa fa-youtube-play fa-2x fa-hover" ></i>
                </a>
            </div>

            
                  <h3 class="devider ColTextHighlight"style="color: #007bff">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 20 20" fill="none">
                      <path d="M4.9059 11.5414L8.4569 15.0944L14.9749 8.57637L11.4219 5.02537L4.9059 11.5414ZM19.1039 6.66437L17.5929 5.15237C17.2091 5.36207 16.7677 5.44182 16.3348 5.37968C15.9019 5.31754 15.5008 5.11685 15.1915 4.80766C14.8822 4.49847 14.6813 4.09741 14.619 3.66453C14.5568 3.23165 14.6363 2.79023 14.8459 2.40637L13.3349 0.894368C13.1444 0.705549 12.8871 0.599609 12.6189 0.599609C12.3507 0.599609 12.0934 0.705549 11.9029 0.894368L0.892903 11.9044C0.704084 12.0948 0.598145 12.3522 0.598145 12.6204C0.598145 12.8886 0.704084 13.1459 0.892903 13.3364L2.4049 14.8464C2.78888 14.6361 3.23068 14.556 3.66403 14.6181C4.09737 14.6802 4.49891 14.8811 4.8084 15.1907C5.1179 15.5003 5.31867 15.902 5.3806 16.3353C5.44253 16.7687 5.36229 17.2105 5.1519 17.5944L6.6639 19.1044C6.85411 19.2937 7.11155 19.3999 7.3799 19.3999C7.64826 19.3999 7.90569 19.2937 8.0959 19.1044L19.1039 8.09637C19.2932 7.90616 19.3995 7.64872 19.3995 7.38037C19.3995 7.11201 19.2932 6.85458 19.1039 6.66437ZM8.4569 16.7194L3.2809 11.5414L11.4229 3.40037L16.5989 8.57637L8.4569 16.7194Z" fill="#007BFF"/>
                    </svg>
                    &nbsp;&nbsp;E-Ticket Addition (optional):
                  </h3>
                  <hr>



         <div class="row cSeatingChartContainer"style="padding-left: 15px;">
                    <span id="ctl02_Label35" class="editLabel">Upload a picture here to be printed on each e-ticket: (Width: 655px, .jpg, .gif, .png)</span>
                    <p class="hint"style="font-size:14">You can upload an image with your sponsors logo or special terms or instruction to be printed on e-tickets. You can preview the result in the tickets tab.</p>
                    <p class="hint"style="font-size:14">Adding a picture here will increase the size of the ticket and result in more paper and ink usage which buyers may not like. Avoid using a flyer or unnecessary big pictures here.</p>
                  </div>
                  <div class="row imgContainer">
                    <div class="cImageUploader" style="text-align:center;" data-type="TicketAddition" data-uploadfilename="209443" data-noimage="">


                      <div class="row flyerupload2"style="padding-left: 370px;">
                       <!--  <button class="btn btn-dark "><i class="fa fa-upload "></i>&nbsp;&nbsp; Select / Upload Ticket Addition</button> -->

                        <input type="file" name="picture" id="picturesecondpictures">
                        &nbsp;&nbsp;<i class="fa fa-trash fa-2x delete fa-hover" title="Remove Image" style="display: none;"></i>
                        <img id="picturesecondpicturesimg" src="#" style="display: none;">
                      </div>
                        

                      <div class="row">
                        <img id="tic" src="" >
                      </div>

                    </div>
                  </div>
                </div>
                <br>




        <div class="cSeatingChartContainer cAdv" style="padding-left: 10px ;">
                  <h3 class="devider ColTextHighlight"style="color: #007bff;><i class="fa fa-play-circle fa-15xstyle="color: #007bff;"></i>&nbsp;&nbsp;Video (optional):</h3>
                  <hr>
                  <div class="row cSeatingChartContainer">
                    <table id="ctl02_cVideoType" class="leftAlign" border="0">
                      <tbody>
                        <tr>

                          <td>

                <input id="yt" type="radio" name="media_link" value="yt"style="margin-left: 10px; ">

                        

                            <span for="ctl02_cVideoType_0"style="padding-left: 10px; ">YouTube Video - https://YouTube.com/watch?v=VIDEO_ID</span></td>
                        </tr>
                        <tr>
                          <td>
                           <!--  <input id="ctl02_cVideoType_1" type="radio" name="ctl02$cVideoType" value="fb" style="margin-left: 10px; "> -->

                            <input id="fb" type="radio" name="media_link" value="fb" style="margin-left: 10px; ">

                            <span for="ctl02_cVideoType_1"style="padding-left: 10px; ">Facebook Video - https://facebook.com/video.php?v=VIDEO_ID</span></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                  </div>
                  <br>


           
                  <span style="padding-left: 10px; ">Video ID:
                    <input name="video_id" id="video_id" type="text">

                 </span><br>
                  <p class="hint"style="padding-left: 10px; font-size:14">Enter your YouTube or Facebook video ID. Do NOT enter the full video URL, just the ID part of it.</p>
                  <br>
                  <div id="youtube_div_id">
                  </div>
                <!-- </div> -->


        <div class="row step1-step3" style="padding-left:220px;">
            <div class="row2" style="text-align:center;">
              <a data-toggle="pill" href="#custom-tabs-one-profile" class="btn btn-secondary prvbtn add_event_prev_button" style="width:221px;margin-left:20px;margin-top:10px;"><i class="fa-angle-double-left fa fa-15x"></i>&nbsp;&nbsp; <span>Step 2 Delivery & Returns</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a data-toggle="pill" href="#custom-tabs-one-settings" class="btn btn-secondary nxtbtn add_event_next_button" style="margin-top: 10px; width:218px"><span>Step 4 Tickets</span> &nbsp;&nbsp;<i class="fa-angle-double-right fa fa-15x"></i></a>
              <br>
              <br>
              <button type="submit" class="btn btn-success  btn-sm svbtn" style="width: 50px;">Save</button>
              <br>
              
            </div>
          </div>


        </form>
        </div>
    </div>
</div>
<br>
<br>
<br>