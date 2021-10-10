@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
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
              <h3 class="card-title">Admin Help / Instructions
              </h3>
            </div>
        </div>
        <style>
          hr{
            border-top-color: gray;
      
          }
          @media all and (max-width:720px){
            .search-box{
              padding-left: 42px!important;
            }
            .search-button{
              margin-left: 55px!important;
            }
          }
      </style>
      <br>
        <h5 id="ctl00_CPMain_cH1" style="padding-left: 20px;">Learn how to build a ticketing (box office) website in a few minutes using Ticketor and sell your tickets online.</h4><br>
            <div class="cSearch search-box" role="search"style="padding-left: 320px;">
                <label>Search: 
                    <input type="text" id="cSearchBox" role="searchbox">
                </label>
                <button id="cSearchPageBtn " class="nsBtn large utility search-button">Search</button>
            </div><br>
            <div class="cHtmlEditorContent"style="padding-left:30px">
                <h5><b>1 Creating an Event</b></h5> <br>Creating events on Ticketor is fast and easy. To add your event use the "Control Panel > Events & Venues > Events" and click on the New Event button. Alternatively, you can click on the Add Event button on your home page.<br><br>
                Later on, to edit your event use the "Control Panel > Events & Venues > Events". Find the event in the list, and click on the  icon to edit the event. Alternatively, as a shortcut, if the event is showing up on your home page, you can hover your mouse over the event and use the "Edit Event" link.

There is a Walk through that pops up and guides you through the steps. Make sure to use it. You can always open the walk-through from the right side of the screen. To complete the event, use the walk-through or continue reading.<br><br>
      
<h3 class="ColTextHighlight"style="color: #007bff;">COVID-19 Notes:</h3>
<p>After reviewing this section about creating an event, you can checkout <a target="_blank" href="">Tips on Creating an Online Event</a> and <a target="_blank" href="?section=safeDistancing">Tips on Creating Events with Safe Distancing Due to COVID-19</a></p>
<h3 class="ColTextHighlight"style="color: #007bff;">Steps to Create Events</h3><hr>
<ul>
    <li>Enter event details, optionally upload pictures and videos.</li>
    <li>Select an existing venue or create a new one.</li>
    <li>If your event is assigned seat, you will need to design the seating chart for the venue</li>
    <li>Define your pricing structure  and charges by creating "price levels" and "price variations"</li>
    <li>For assigned seat events, add tickets to your event on the seating chart</li>
</ul> 
<p>Please note that venues and seating charts are independent of events and can be reused in as many events. As a result, when creating a venue or seating chart, there is no concept of events or pricing.</p>

<p>Event creation page consists of a few tabs. Fill out the information in each tab, save and continue to the next tab to complete the event.</p>
<h3 class="ColTextHighlight"style="color: #007bff;">Information Tab</h3><hr><p>Start with entering event's general information such as event name, date, venue etc. </p>
<h4 class="ColTextHighlight"style="color: #007bff;">Seating Type</h4><p>Select the events seating type:</p><ul><li><b>General Admission (first-come, first-serve) or Standing:</b> Select this option if you don't want seat numbers on your tickets and your event is either standing, or first-come-first-serve. You can still have different sections and price levels.</li><li><b>Assigned seats (Tickets have a seat numbers on them) or mix</b> Select this option if your event or at least part of it is assigned seat. It could be amphitheater style, round-table dinner style or tables at a restaurant or night club. Select this option even if part of the event is assigned seats and part general admission</li></ul>
<h4 class="ColTextHighlight"style="color: #007bff;">Venue</h4><p>Venue is where your event happens. If you have already created the venue, you can select it from the list. Otherwise, click on "Create a new venue" and create one.</p><p>You will need to set the: </p><ul><li><b>Venue's name</b></li><li><b>Address:</b> will be used for direction and print on tickets</li><li><b>Time-zone:</b> Will be used to start and end ticket sales based on the local time</li></ul><p></p>
<h4 class="ColTextHighlight"style="color: #007bff;">Date / Time</h4><p>Set the date/time of the event and set the date/time when the system will start and end the ticket sales.</p><p>Note that all times are based on the venue's local time-zone. So double-check and make sure the venue time-zone is set correctly.</p>
<h4 class="ColTextHighlight"style="color: #007bff;">Sale End Date / Time</h4><p>At this exact time (based on venues local time-zone) ticket sales will end.</p><p>It is recommended to set the sales end date to a couple hours after the start of the event so that last-minute buyers can still buy tickets and attend the event, even after it is started.</p>
<h4 class="ColTextHighlight"style="color: #007bff;">Activate:</h4><p>Set the rest of event details and tick the "Active" box to activate it.</p>
<h4 class="ColTextHighlight"style="color: #007bff;">Save</h4><p>Hit save and save your event</p>
<h3 class="ColTextHighlight"style="color: #007bff;">Delivery &amp; Return Tab</h3><hr><p>Here you can select the different delivery methods that you want to offer for this event and specify the event's returns policy.</p>
<h4 class="ColTextHighlight"style="color: #007bff;">Delivery Methods</h4><p>Select the delivery methods that you want to offer.</p><p>By default, the system comes with 2 delivery methods.</p><ul><li>Will-Call: Means that the buyer will pick up the tickets at the venue before the event</li><li>Print e-tickets or show on the phone: means that the buyer will either print their tickets or show them on their phone to get admitted.</li></ul>
<p>You can add more delivery methods such as different types of mail (post), pick up from a certain location or retail store, ... here. You can even specify a fee for each delivery method.</p>

<h4 class="ColTextHighlight"style="color: #007bff;">e-Tickets</h4>
<p>One of the most popular delivery methods is e-Tickets. It is easy and cost effective delivery method. The tickets will be emailed to the user, right after the purchase and they can either print them or show them on the phone to get admitted.</p>
<p>e-Tickets are secured using a hard-to-generate code that is printed on each e-ticket. It is printed in QR code format, barcode format and human readable digits. At the gate, tickets should be validated to make sure they are valid and they are not duplicate (not being used more than once). Check out <i>Control Panel &gt; Help &amp; Support &gt; Help &amp; Instructions &gt; Gate Control &amp; E-Ticket Validation</i>  for more information.</p>
<h4 class="ColTextHighlight"style="color: #007bff;">Will-Call (Venue Pickup)</h4>
<p>Another delivery method is will-call where the customer picks up their tickets at a booth at the venue or a designated pick up location before the event. Users who don't have access to printers may choose this option.</p>
<p>If will-call is offered as the delivery method, you should be prepared to deliver the will-call tickets. Check out   <i>Control Panel &gt; Help &amp; Support &gt; Help &amp; Instructions &gt;Ticket Delivery  &amp; Delivery Options </i>  for more information.</p>
<h4 class="ColTextHighlight"style="color: #007bff;">Mail</h4>
<p>You can also offer delivery by mail. You can consult the post office or any mailing service to find the proper mailing options. You will get an email anytime a customer purchases tickets that require shipping and you are responsible for printing and mailing out the tickets. Check out <i>Control Panel &gt; Help &amp; Support &gt; Help &amp; Instructions &gt;Ticket Delivery  &amp; Delivery Options </i>  for more information.</p>
<h4 class="ColTextHighlight"style="color: #007bff;">Returns Policy</h4><p>Specify the event returns policy. Whether or not you accept returns and if you do, for how long before the event and how much you charge for returns.</p>
<h3 class="ColTextHighlight"style="color: #007bff;">Pictures &amp; Videos</h3><hr><p>Upload your flyer, picture of the venue/seating chart and add your YouTube or Facebook video.</p><p>All pictures should be in jpg, gif or png format.</p>
<h3 class="ColTextHighlight"style="color: #007bff;">Tickets</h3><hr><p>Select the e-tickets design and preview a sample e-ticket.</p>

<h3 class="ColTextHighlight"style="color: #007bff;">Add / Update Tickets</h3><hr>
<p>Define your pricing structure by creating "Price Levels" And "Price Variations"</p>
<p>If your event is assigned seat and you have not created the seating chart yet, you will be asked to design your seating chart for the venue before you can add tickets.</p>

<h3 class="ColTextHighlight"style="color: #007bff;">Details &amp; Questions</h3><hr><p>Set some more options and details about your event.</p>
                    <h4 class="ColTextHighlight">Organizer:</h4>
<p>If you are selling ticket for another entity (organizer) and you want to give them access to all the sales reports for their event, or even access to create events on your site, you need to introduce them in the system as an organizer and select them as the organizer for the event.</p>
<p>Check out <i>Control Panel &gt; Help &amp; Support &gt; Help &amp; Instructions &gt; Users with special permission: Administrators, Reporter Generators, Event Organizers, Sales Agents &amp; Gate Controllers</i> on how to add new organizers. </p>

<h4 class="ColTextHighlight"style="color: #007bff;">Questions to be Asked</h4><p>If necessary, enter questions that the buyer must answer to buy tickets. Check out <i>Control Panel &gt; Help &amp; Support &gt;  Help &amp; Instructions &gt; Question Manager (Asking questions from buyers) </i> on how to create and manage questions. </p>
<h3 class="ColTextHighlight"style="color: #007bff;">Promote</h3><hr><p>When your event is all set up, you can use the promote tab to send out promotional emails to your mailing list or create track-able links to distribute to your promoters or use in your digital ads. Track-able links, are links to your event or website that is tracked by the system. You can create as many track-able links, just by entering a unique keyword. Anytime somebody uses those links to come to your website and purchases tickets, the system relates that purchase to the keyword so you can report on that. This feature can be used to evaluate the efficiency (ROI) of your different ads or marketing campaigns or to calculate the amount of sales by your sub-promoters.</p>
</div><br><br>

<div class="cHtmlEditorContent"style="padding-left:30px">
    <h5><b>2 Tips on Creating an Online Event</b></h5> <br>Creating online event is very similar to creating a regular event with some minor differences.<br><br>

    Ticketor supports both 'Live' and 'On-Demand' streaming events.<br><br>
    
    Click here to learn about Creating an event on Ticketor<br><br>
    <h3 class="ColTextHighlight"style="color: #007bff;">Online events</h3><hr>
    <p>Online events can be pe  rformed through a variety of conferencing or streaming tools including Facebook, YouTube, Vimeo, Zoom, etc.. The attendee needs to click on a link to join the event and optionally they may need a password or special instruction.</p>
    <p>When creating the venue, you can set the venue name to something like 'Online', 'Online through [your provider name]'</p>
    <h4 class="ColTextHighlight"style="color: #007bff;">Admission</h4><hr>
    <p>You have 2 options for controlling the admission and making sure only people with a ticket can attend.</p>
    <h5 class="ColTextHighlight"style="color: #007bff;">1- Admission On Ticketor (Preferred)</h5>
    <p>Whether you are planning a 'Live' event or an 'On-demand' one, Ticketor will take care of the admission and ticket validation so you can easily monetize your events or videos.</p>
    <p>Choose the option to Stream on Ticketor, then get the embed code from your streaming provider and add it to your event. A 'Watch Here' link will be added to your tickets and confirmation emails and the buyer can click on the link, enter the code on their ticket and the system will validate the ticket and upon validation, admit them to the page with your embedded video.</p>
    <h6 class="ColTextHighlight"style="color: #007bff;">Hints</h6><hr>
    <p>• &nbsp;For on-demand videos, set the duration of the event to all the time that the video is available for watching.</p>
    <p>• &nbsp;To secure your video and making sure that a user cannot share the video after they get admitted, there are certain actions that you can take.</p>
    <p>In your streaming provider, choose the option that the video can only be watched when it is embedded in certain domain, in this case: ticketor.com</p>
    
        <p>For added security, move your site to your own domain / sub-domain so you do not use the ticketor.com domain that is shared with other event organizers.</p>
    
    <p>• &nbsp;You have the option to allow 'Exit for re-entry' or not allow it.</p>
    <p>If exit for re-entry is allowed, the buyer can click on a button to leave the event and they can re-enter from the same device or another one by re-entering their ticket code, otherwise they have to watch the full event on the same device.</p>
    <p>In either case, if the viewer's computer dies or becomes inaccessible, the admin can use the Gate Control page or app to enter the buyer's ticket code in 'Exit mode' (un-scan the ticket), so the buyer can use the ticket again on a different computer.</p>
    <h5 class="ColTextHighlight"style="color: #007bff;">2- Manual Admission</h5><hr>
    <p>Set the venue address to the link (URL) to join the event or leave the address empty if you prefer not to reveal the URL before the purchase.</p>
    <p>You may get a warning that the system could not find the address. You can ignore the warning.</p>
    <p>To reveal the link or any other instruction after the purchase is complete, from the 'Details tab' add it to 'After purchase notes' box. The content of this box will be shown to the buyer after the purchase is completed.</p>
    <p>If you prefer to reveal the URL at a later time, maybe last-minute on the event date, you can use the <i>Control Panel &gt; Events &amp; Venues &gt; Mailing List</i> feature and send an email to all the buyers. On the 'Send Tab' select 'Send to customers who have purchased tickets to the selected event'</p>
    <p>If your streaming / conferencing provider can accept attendees email or a password, you can use <i>Control Panel &gt; Events &amp; Venues &gt; Admission List Detail</i> to export the attendee list.</p>
    <p>Each purchase has a unique 'Confirmation Number'. Each ticket has a unique barcode number. You can use this data as the username or password for the attendees to log in.</p>
    <p>Please note that a purchase may have several tickets and so all those tickets will have the same confirmation number and email associated with them but each ticket will get a unique barcode number.</p>
    <p>If you need to get individual attendees email address or ask the each attendee to select a username or a password, you can follow <a href="" target="_blank"><i>Control Panel &gt; Help &amp; Support &gt;  Help &amp; Instructions &gt; Question Manager (Asking questions from buyers) </i></a></p>
    <p>Optionally you can create a delivery method from <i>Control Panel &gt; Account &amp; Settings &gt; Delivery Methods</i> for online events with proper name and description and use it in your event instead of the e-ticket or will-call options.</p>
    <br>                
    <h6 class="ColTextHighlight"style="color: #007bff;">Example: Creating a ticketed event on Facebook</h6>
    <hr>
    <p>Note: The below technique can be used with other social networks, streaming or conferencing sites.</p>
    <p>Create a private Facebook group for your event.</p>
    <p>Set the group in a way that you have to approve every new member and that the new members should answer the following question:</p>
    <ul>
        <li>Purchase your ticket from [your Ticketor address] and enter the barcode number that appears on your ticket, here:</li>
    </ul>
    <p>Create your event on your Ticketor site, set the venue address to the Facebook Group URL and instruct the buyers to join the group as soon as their purchase is complete so you have plenty of time to validate the barcodes and admit the attendees to the group.</p>
    <p>To admit people to the group, go to the gate control page of your website, copy and paste the barcodes entered by attendees to the gate control's barcode box. If the barcode is accepted, add the user to the group.</p>
    <p>At the time of the event, start a live stream to the group.</p>
    <p>PS: You can leverage this opportunity to get more followers for your social network</p>
    <br>
    <br>
    <p>This blog and video show you how to how to create ticketed online event (live streaming or on-demand) or monetize your videos:</p>
    <p><a href="" target="_blank">How to create ticketed online event (live streaming or on-demand) or monetize your videos</a></p>
</div>
<div class="cHtmlEditorContent"style="padding-left:30px">
    <h5><b>3 Designing the Seating chart</b></h5> <br>
    If your event is general admission, you can skip this section. However, if your event or part of the event is assigned seat, you need to create a seating chart for your venue.<br><br>
    
    Go to Control Panel > Events & Venues > Venues. You should see your venue in the list. Click on the  icon for the venue to go to the "Seating chart designer" page.<br><br>
    
    There is a Walk-through that pops up and guides you through the steps. Make sure to use it. You can always open the walk-through from the right side of the screen. Use the walk-through or continue reading.<br><br>
    
    The point of creating the interactive seating chart is to allow the buyer to select their seat or table on the interactive seating chart when buying tickets.<br><br>
    
    You probably have the seating chart on paper or in mind.<br><br>
    <h3 class="ColTextHighlight"style="color: #007bff;">Important notes:</h3><hr>
    <p>1- The venue and the seating chart should be re-usable by different events. So when creating the seating chart, do not think about the pricing or colors of the seats. They will be determined at the next step, when you create the event and add tickets to the chart.</p><p>2- The point of seating chart is to give the buyer an idea on where they are going to seat. It is not meant to match exactly what you have on paper or what is actually on the ground.</p><p>3- All changes to the seating chart are <b>auto-saved</b>. There is no need for explicit saving.</p> 
    
    <h3 class="ColTextHighlight"style="color: #007bff;">Seating chart components:</h3><hr><p>A seating chart is made of different components:</p><ul><li>1- Sections: an amphitheater style chart is made of sections that contain rows and each row contains seats.</li><li>2- Tables (without seat number): could be in different shapes (round, square, corner) and different sizes (8 person, 10 person, etc.). Buyer can select the table but not individual seats. You should use this option if the seats are not numbered or the seats are not fixed and people may be able to move the seats around. Otherwise, if the seats are fixed and are numbered, use the "tables with seat numbers" instead. </li><li>3- General admission sections: Could be a standing area in the venue or a seated area that is based on first-come-first-serve. General admission sections can be used to create general admission sections or areas in an assigned seat event.</li><li>4- Tables with seat numbers or individual seats: Are a group of individual seats with an optional shape object (table). You can move around each individual seat or the table itself. You can use them to create scattered seats in the venue or use it with a shape (table) to create tables that the buyer can select individual seats on. Each seat and the optional shape can be moved individually and the shape can be resized.</li><li>5- Shapes: Could be used to show other areas of the venue such as the stage, bars, dance floor, etc.</li></ul><p>You can add any of the above components to your seating chart.</p> 
    
    <h3 class="ColTextHighlight"style="color: #007bff;">Section, Row, Seat:</h3><hr><p>Most venues including amphitheaters and arenas consist of "Sections". In such venues, each seat is identified by section name, row name and seat number.</p>

    <h3 class="ColTextHighlight"style="color: #007bff;">Stage at the Bottom</h3><hr><p>If you are designing an amphitheater, it is easier if you rotate your paper seating chart to have the stage at the bottom and then design the chart. After the design is complete, you can rotate the chart. </p>

    <h3 class="ColTextHighlight"style="color: #007bff;">Seating Chart Designer Area</h3><hr><p>The area with the dotted border is the seating chart designer area.</p><p>It can expand to the right and bottom as much as you need.</p><p>So start by adding sections from the top-left and expand to the bottom and right as needed to make sure you don't run out of space.</p>

    <h3 class="ColTextHighlight"style="color: #007bff;">Add an Object to the Chart</h3><hr><p>Click anywhere in the area with the dotted border to add an object (Section, General Admission Section, Table or Shape) to your seating chart.</p>

    <h3 class="ColTextHighlight"style="color: #007bff;">Section Properties</h3><hr><p>After adding an object to the chart, a window pops up and asks about the section properties which may vary based on the object type. Hover your mouse over the <i class="fa fa-question-circle"></i> icon for more information about each field.</p>

    <h3 class="ColTextHighlight"style="color: #007bff;">What does "Sales Priority" mean?</h3><hr><p>Buyers can select their seat on the seating chart. However, alternatively, they can ask the system to find them the best available seat for the price they have selected.</p><p>How does the system determine the best available seat? Here is where the sales priority comes to the picture. The system assumes that the sections with lower sales priority are the better sections.</p><p>Make sure to set the sales priority so that the best sections in the venue have the sales priority of 1 and as you get farther from the stage, the sections get bigger sales priorities.</p> 

    <h3 class="ColTextHighlight"style="color: #007bff;">Adding Rows</h3><hr><p>If you add a section, then the next step is to add rows. Click on the 'Add row' link in the section to open the 'Edit Rows' pop up.</p><p><b>Important note:</b> Always start by adding the closest row to the stage (usually row A or 1) and then proceed to next rows. </p>

    <h3 class="ColTextHighlight"style="color: #007bff;">Verify Rows</h3><hr><p>After adding the first row in the section, always verify by hovering your mouse over the seats to make sure they are in the correct order and alignment before you proceed with the rest of the rows.</p>
    <h3 class="ColTextHighlight"style="color: #007bff;">Edit Rows or Add the Missing Rows</h3><hr><p>Made a mistake in row properties? Or did you miss a row? Click on the row to edit it or insert the missing row below it.</p>

    <h3 class="ColTextHighlight"style="color: #007bff;">Edit / Delete / Mark as Accessible / Mark as Restricted View / Add Space to the Left or Right of a Seat</h3><hr><p>Click on any seat in a section to open the 'Edit Seat' window where you can manage individual seats.</p>

    <h3 class="ColTextHighlight"style="color: #007bff;">Edit, Delete, Rotate or Duplicate Sections</h3><hr><p>Click on the <span class="settings ui-icon ui-icon-gear" style="display:inline-block;"></span> to edit, delete or rotate the section. Have similar sections? Duplicate the section and edit the properties. Duplication is really helpful for table events to create tables at exactly same size.</p>

    <h3 class="ColTextHighlight"style="color: #007bff;">Move Sections</h3><hr><p>Drag and drop the section to move them around.</p> 

    <h3 class="ColTextHighlight"style="color: #007bff;">Adjust the seating chart</h3><hr><p>This step should be done after your seating chart is complete. Using the slider at the top-right, zoom the seating chart in or out to make it best fit on the screen. Also, use the rotate icon to rotate the chart. </p><p>Hide section details: For larger venues, usually with over 6000 seats, it may look better and work faster to make the seating chart to hide the section details. The buyer clicks on a section and the details (row and seats) open up in a bigger window. </p>

    <h3 class="ColTextHighlight"style="color: #007bff;"><i class="fa fa-thumbs-up "></i> Your Seating Chart is Ready!</h3><hr><p>Your seating chart is now ready! Now you can go to the Add/Update Tickets page to add tickets to the chart.</p>

    <p>Watch the video below on creating a complex amphi-theater style seating chart:</p>

    
</div>
</div>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
      </div>
         <!-- footer -->
        <!--  @include('layouts.seller_footer') -->
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
@endsection