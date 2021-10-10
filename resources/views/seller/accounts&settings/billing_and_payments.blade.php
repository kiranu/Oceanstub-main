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
              <h3 class="card-title">Billing & Payments
              </h3>
            </div>
        </div><br>
        <style>
          hr{
            border-top-color: gray;
      
          }
      </style>
     
        <div id="content" class="floatleft" role="main" tabindex="-1">
            
                    
            <div class="Module" role="region" aria-labelledby="cMH598372">
             
        
               
                <div class="modulebody ui-widget-content ui-corner-bottom">
                    
                    <div class="filters ui-widget-content  ui-corner-all clearfix">
                        <div class="cPromotionPlan cNoPromotion " data-value="1"> <div id="filters ui-widget-content  ui-corner-all" class="filters ui-widget-content  ui-corner-all" style="padding-left: 30px;
                            border: 1px solid black;
                            width: 95%;
                            margin: 0 auto;
                            padding-top: 25px;
                            border-radius: 20px;
                            padding-bottom: 25px;
                            min-height: 156px;">
                        <div class="filterrow"style="padding-left: 10px;">
                            <span id="ctl00_CPMain_Label5" class="filterLabelTitle ColTextHighlight"style="color: #007bff;">Select Statement/Invoice:</span>
                        </div>
                        <br>
                        <div class="filterrow">
                            <span id="ctl00_CPMain_Label6" class="filterLabel" style="display:inline-block;width:225px;padding-left: 90px;">Select Bill / Invoice:</span>
                            <select name="ctl00$CPMain$cStatements" onchange="javascript:setTimeout('__doPostBack(\'ctl00$CPMain$cStatements\',\'\')', 0)" id="ctl00_CPMain_cStatements" class="filterText " style="width:350px;">
            <option selected="selected" value="-1">Ongoing Balance, Mar 20 2021, Incomplete</option>
        
        </select></div>
                        </div>
                          <br><br>
                    </div>
                    
                    <h2 style="padding-left:25px;color: #007bff; font-size:30px;" class="ColTextHighlight devider">Ticketor Ongoing Balance for ARJUN EVENTS<hr></a></h2><h4 style=""><span class="ColTextHighlight"style="padding-left:25px;">Description: </span><br> </h4><p style="text-align: right; float: right; background-color: #127bc6; color:#fff; padding:  10px 25px; margin-right: 5%; font-weight: bold;">On-going (No payment due yet)</p><br><br><br><h3 class="ColTextHighlight" style="color: #007bff;"><i class="fa  fa-th-list fa-15x"style="padding-left:25px;color: #007bff;"></i>&nbsp;&nbsp;Items:<hr></h3><table border="0" cellpadding="5px" cellspacing="0px" width="90%" align="center" class="statement"><tbody><tr class="ui-widget-header" style="text-shadow:none;border:none;"><th>Description</th><th>Amount</th></tr><tr style="background-color:#eee; color:#222;text-shadow:none;border:none;;"><td>Monthly Fee:</td><td>₹0.00</td></tr><tr style="background-color:#e5e5e5; color:#222;text-shadow:none;border:none;;"><td>Earnings from ads:</td><td>₹0.00</td></tr><tr class="ui-state-highlight" style="border:none;"><td><b>Total</b>: </td><td><b>₹0.00 INR</b></td></tr></tbody></table><div style="text-align:right; padding: 20px 10px;"><a target="_blank" href="" class="ColTextHighlight" style=""><i class="fa fa-external-link"></i>&nbsp;&nbsp; Fee Breakdown by Invoice</a></div>
                    
                </div>    
            </div>
        
                            
                            <div class="floatleft">
                                
                            </div>
                            
                            
                            <footer aria-label="Site footer">
                                <div class="paymentLogos hidePrint">
                                    
                                </div>
        
                                
        
                                <div class="cSocialShare cSocialShareFooter hidePrint"></div>
                                <a href="" target="_blank" style="display: inline-block; overflow: hidden; text-indent: -1000px; height: 0; width: 0;" title="Powered by Ticketor Event Ticketing and box office system" class="hidePrint">Ticketing and box-office solution powered by: Ticketor (Ticketor.com)</a>
                                <a href="" target="_blank" style="display: inline-block; overflow: hidden; text-indent: -1000px; height: 0; width: 0;" title="Ticketor reviews and ratings powered by TrustedViews.org" class="hidePrint">Ticketor reviews and ratings powered by TrustedViews.org</a>
        
                                <span class="clearfix" style="display: none;">
                                    <img src="/account/img/Online-ticketing-system-and-box-office-solution.jpg" class="hidden" alt="Ticketor">
                                    <a href="" target="_blank" style="display: inline-block; clear: both; margin: 9px; outline: none 0; text-align: center; height: 28px; overflow: hidden;" title="Ticketing System Powered by Ticketor" class="hidePrint">
                                        <img src="" alt="Powered by: Ticketor ticketing system" width="184" height="28" style="border: none 0;"><br>
                                        Ticketing and box-office system by Ticketor</a>
                                    <span>
                                        
                                </span>
                                    <span class="hidden">Build your own online box-office. Sell tickets on your own website.</span>
                                </span>
                               
                                
        
                                    </div>
                                </div>
                            </footer>
                            
                        </div>
                    </form>
                </div>
      </div>
         <!-- footer -->
         <!-- @include('layouts.seller_footer') -->
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
@endsection