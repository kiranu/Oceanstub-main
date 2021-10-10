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
              <h3 class="card-title">FAQ - Frequently Asked Questions
              </h3>
            </div>
        </div>

       <br>

        <div class="cHtmlEditorContent"style="padding-left:30px">
        <h5><b>Common Customer Questions</b></h5> <br>• I don't know if my order went through?<br>
        Ask them if they received a confirmation number and / or confirmation email or to login to their account and check the User Menu > Order > Order History or alternatively you can check the Control Panel > Reports > Sales & Invoices.<br><br>
        
        • How can I print my tickets?
        When user completes the purchase, assuming that they have selected e-tickets as delivery method:
        
        They will see the tickets on the confirmation page and can print them directly
        In the confirmation email that they have received, there is a link to the "Print Tickets Page"
        They can login to their account and print tickets from: User Menu > Tickets > Print Tickets<br><br>
        • I checked out as a guest and didn't create an account. Can I still login to manage, print or refund my tickets?<br>
        Yes, click on the sign in button, enter the email you used for the purchase and click on the 'Forgot Password' button to create a password. You can create the password if you have access to the email address you provided.<br><br>
        
        • I need to change my delivery method?<br>
        Go to Control Panel > Reports > Sales & Invoices, find the invoice, click on the "Edit icon" for the invoice. Now you can change the delivery method for each ticket and click on "Update delivery methods"<br><br>
        
        • I need to change my seat or performance (I got the wrong tickets)?<br>
        Use the instruction in "Control Panel > Help & Support > Help & Instructions > Returning Tickets" to return their tickets for "Store Credit". You may want to also return the "Service Charge" so adjust the total return amount accordingly. Then ask the customer to purchase their new set of tickets. On the checkout page they will receive the "Store Credit".<br><br>
        
        • Do I need to print my e-tickets or can I show on my phone?<br>
        It depends on your set up. If you are using phone camera or a barcode scanner that can scan from the phone display, then they really don't have to print their e-tickets.<br><br>
        
        • I didn't receive a confirmation email?<br>
        Ask the buyer to check their spam folder. You can also re-send the confirmation email from the invoice. Browse to Control Panel > Reports > Sales & Invoices and edit the invoice<br><br>
        
        • I forgot my password? How do I sign in?<br>
        They can simply reset their password if they have entered the correct email address and have access to the email. Simply click on the sign in button, click on "Forgot password", wait a few minutes till you receive the password recovery code in your email and change your password.<br><br>
        
        • I cannot sign in and I don't get any emails from you. No welcome email, no password recovery and no confirmation email?<br>
        The buyer has probably signed up with a wrong email address or has had a typo in their email address. You can browse to Control Panel > Account & Settings > User manager and try to find the user by name. Then you can give them the actual email address they used to sign up. Using that email address, they can sign in but they should probably sign up with their correct email address for further purchases.<br><br>
        
        • I received several charges on my credit card but purchased only once!<br>
        1- Check the Control Panel > Reports > Sales & Invoices to make sure they purchased only once. If they purchased more than once, you may want to refund or void the duplicates.<br>
        
        2- Authorization and not a Charge: When you charge a client through your merchant account (payment processor), the merchant account first runs an authorization for the amount. If that is successful (meaning that the credit card number is correct and the funds are available), then they run their fraud protection system to verify the billing address. This step is optional and you can configure in your PayPal or Merchant account. If the address verification fails, they reject the transaction due to fraud suspiciousness. At this point the purchase is rejected but the authorization will stay. Then the user tries a few more billing addresses and each time a new authorization will happen. Some credit card companies, display the authorization to the user and the user assumes that this is a charge, however, an authorization is not a charge and will go away from their statement in a few days.<br>
        
        In this scenario, just explain the user that this is an authorization and it will go away in a few days. You can also login to your PayPal / payment processor to verify this.<br><br>
        
        • Seat selection on the seating chart options (Exact vs Limited)<br>
        We support 2 methods of seat selection.<br>
        
        1- Exact: Buyer clicks on a certain seat and gets that exact seat. If the buyer clicks on the row (instead of a seat in the row) it will work similar to limited mode and the buyer can select multiple seats in one click.<br>
        
        2- Limited: We do not allow user to exactly select their seat on the seating chart. Instead they can pick their row and preference in the row (left, center or right of the row). In this method, the buyer can buy as many seats in one click instead of clicking on each individual seat. This limitation does not apply to administrators and sales agents.<br>
        
        Why limited? There are several reasons for that. The most important is to protect you (the event organizer) from many single, fragmented unsold seats that would cause loss of profit to you. Buyers tend to leave a seat next to them vacant so they can sit more comfortably. This will result in single unsold seats throughout the venue and as a result, money loss for the event planner. Ticketor's limited method of picking seats, ensures that the buyer can get the seat they want while preventing abuse.<br>
        
        Another reason is that since we have not reserved the exact seats for the buyer, we don't have to rush them through the purchase by showing timers and we don't need to ask them to fill out a CAPTCH (hard to read words). This will result in easier purchase for your customers and more sales for you.<br>
        
        You can select the method that best works for you from "Control Panel > Account & Settings > Site Settings > Options"<br>
        
        Warning: "Limited" option is highly recommended for big events and events that are expected to have high sales volume in a short amount of time.<br>

        <br>
        <br>
        <br>
        <br>
        <div class="cHtmlEditorContent"style="">
          <h5><b>Administrator Questions</b></h5> <br>• I got a charge-back. What should I do now?<br>
          Read the charge-back to see if the buyer really qualifies for a refund or not.<br>
          
          If not and you want to fight back, simply respond to the charge-back with all the evidence.<br>
          
          Ticketor can help you prepare a generic response with all the buyer and invoice details. Simply browse to Control Panel > Reports > Sales & Invoices, find the invoice, edit it and from the Actions menu choose "Prepare charge-back response".<br>
          
          You can either print it out as is or save it as html and open it in MS-Word to edit it. Just make sure to submit your response on-time.<br><br>
          
          • Where can I rent / buy equipment and supplies including barcode scanners, thermal printers, credit card swappers, etc.?<br>
          Check out Ticketor Store for compatible devices.<br><br>
          
          • When and how do I get billed by Ticketor?<br>
          You will get your statements monthly (on the same day of the month as your original sign up), however, Ticketor may charge you anytime during the month for your current balance (for the tickets you have already sold and collected the money).<br>
          
          You will auto-pay for Ticketor bills using your credit card or PayPal account on file.<br>
          
          Whenever you get charged, you will receive an email indicating that your payment has gone through and if the charge fails or is declined, you will get another email requesting you to update your credit card on-file and make the payment.<br>
          
          You can always see your statements including the on-going (in-complete) one in Control Panel > Account & Settings > Billing & Payments.<br>
          
          If you have unpaid balance and your auto-payment does not go through, Ticketor may ask you to make the payment before continuing your use of the site. Please note that it will only affect you and not the buyers. The buyers can continue their use of the site and purchase their tickets as normal, unless you receive emails from Ticketor, warning you of blocking the site due to unpaid balance.<br><br><br>

          <div class="cHtmlEditorContent"style="">
            <h5><b>Sales Agents Questions</b></h5> <br>• I made a mistake in an invoice, what can I do?<br>
            You can edit the invoice from Box Office > Sales and make minor changes such as changing delivery method, shipping address or returning extra tickets<br>
            You can void the invoice and start over. Go to Box office > Sales, edit the invoice and click the "Void invoice" from the "Actions menu". This will also refund the payment transaction.<br>
            You can refund the tickets for store credit and use the store credit to purchase new set of tickets. Follow the instruction in "Control Panel > Help & Support > Help & Instructions > Returning Tickets"<br><br>
            • Somebody is here to pick up their will-call tickets. What should I do?<br>
            Go to Box Office menu > Ticket Pickup, find the invoice by confirmation number or name. Check their ID or Credit Card they purchased with. Click on the  icon. The tickets should get printed with a receipt. Ask them to sign the receipt and hand out the tickets. The invoice will get marked as delivered with current date/time.e.
            
            If the  doesn't show up for the invoice, it means that it is either already delivered or the delivery method is not "Will-Call". Anyway, you can always re-print by editing the invoice and going to the "Actions Menu"u"<br><br>
            
            • I need to sell blocked tickets. How do I do that?<br>
            Ask your system administrator to grant you permission to "Sell Blocked Tickets"<br><br>
            
            • Can I use any shortcut keys to increase my sales speed?<br>
            Sure, Shortcut keys also known as hotkeys are available for the buttons and functionalities mostly used by the sales agents during the busiest sales hours to make the sales and print process as fast as possible.<br>
            
            These shortcuts are in the form of Ctrl + [a key] and are mostly available on the checkout page, confirmation page and the mini shopping cart at the top.<br>
            
            The shortcut key is either mentioned on the button or will be visible when you hover your mouse over the button.<br>

        </div>
        </div>
        <br>
        <br>
        <br>

      
  
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
      </div>
         <!-- footer -->
         <!-- @include('layouts.seller_footer') -->
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
@endsection