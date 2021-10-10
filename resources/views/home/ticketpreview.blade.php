<style type="text/css">
    /*ticke demo previe*/
    .pre_preview {
        position: absolute;
        top: 73px;
        left: 131px;
        width: 14%;
    }

    .tic_image {
        position: relative;
        top: 0;
        left: 0;

    }

    @media screen and (max-width: 600px) {
        .ticket_demo {
            width: 73% !important;
            padding-top: 10px !important;
        }

        .pre_preview {

            top: 46px;
            left: 89px;

        }
    }


    / Ticket ui / .ticket-barcode {
        float: right;
        margin-top: 57px;
    }

    .ticket-qrcode {

    }



    .fl-left {
        float: left
    }

    .fl-right {
        float: right
    }

    .row {
        overflow: hidden
    }

    .ticketcard {
        display: table-row;
        width: 80%;
        background-color: #fff;
        margin-bottom: 10px;
        border-radius: 4px;
        position: relative
    }

    .ticketcard+.ticketcard {
        margin-left: 2%
    }

    .date {
        display: table-cell;
        width: 25%;
        position: relative;
        text-align: center;
        border-right: 2px dashed #dadde6
    }

    .date:before,
    .date:after {
        content: "";
        display: block;
        width: 30px;
        height: 30px;
        background-color: #ffffff;
        position: absolute;
        top: -15px;
        right: -15px;
        z-index: 1;
        border-radius: 50%
    }

    .date:after {
        top: auto;
        bottom: -15px
    }

    .date time {
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%)
    }

    .date time span {
        display: block
    }

    .date time span:first-child {
        color: #2b2b2b;
        font-weight: 600;
        font-size: 250%
    }

    .date time span:last-child {
        text-transform: uppercase;
        font-weight: 600;
        margin-top: -10px
    }

    .ticketcard-cont {
        background-color: #F69E35;
        border-radius: 10px;
        display: table-cell;
        width: 75%;
        font-size: 67%;
        padding: 6px 85px 12px 40px;
    }

    .ticketcard-cont h3 {
        color: #3C3C3C;

        font-size: 130%
    }



    .ticketcard-cont>div {
        display: table-row
    }
    .ticketcard-cont .even-date i,
    .ticketcard-cont .even-info i,
    .ticketcard-cont .even-date time,
    .ticketcard-cont .even-info p {
        display: table-cell
    }

    .ticketcard-cont .even-date i,
    .ticketcard-cont .even-info i {
        padding: 5% 5% 0 0
    }

    .ticketcard-cont .even-info p {
        padding: 30px 50px 0 0
    }

    .ticketcard-cont .even-date time span {
        display: block
    }

    .ticketcard-cont a {
        display: block;
        text-decoration: none;
        width: 80px;
        height: 30px;
        background-color: #D8DDE0;
        color: #fff;
        text-align: center;
        line-height: 30px;
        border-radius: 2px;
        position: absolute;
        right: 10px;
        bottom: 10px
    }

    .row:last-child .ticketcard:first-child .ticketcard-cont a {
        background-color: #037FDD
    }

    .row:last-child .ticketcard:last-child .ticketcard-cont a {
        background-color: #F8504C
    }

    @media screen and (max-width: 860px) {
        .ticketcard {
            display: block;
            float: none;
            width: 100%;
            margin-bottom: 10px
        }

        .ticketcard+.ticketcard {
            margin-left: 0
        }

        .ticketcard-cont .even-date,
        .ticketcard-cont .even-info {
            font-size: 75%
        }
    }


    /**/

    /* .div-main{
    width: 100%;
        margin: 30px auto 0px 222px;
    }.article-main{

    background-color: #008DFF;

    border-radius: 10px;
    width: 50%;
    }
    @media only screen and (max-width: 600px) {
      .div-main{
    width: 100%;
        margin: 30px auto 0px 0px;
    }

    .article-main{

    width: 100%;
    } */
    }

</style>
<div class="row div-main ">
    <article id="TicketHolder" class="ticketcard fl-left article-main" style="background-color: #008DFF;border-radius: 10px;">
        <section class="date">
            <div class="ticket-qrcode" style="width: 148px;margin: -1px auto;" >
                <div id="qrcode" style="padding:30px;">
                <div>
            </div>
            <time datetime="23th feb" style="color:white;">
                <span style="color:white;" id="month">mo</span>
                <span id="start_date">start_date</span>
            </time>

        </section>
        <section class="ticketcard-cont">

            <div class="ticket-barcode" style="float: right;
      margin-top: 57px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="73" viewBox="0 0 24 73" fill="none">
                    <path
                        d="M23.25 73H0L0 70.4336H23.25V73ZM23.2335 69.1708H0L0 67.8672H23.2335V69.1708ZM23.2335 65.3008H0L0 64.038H23.2335V65.3008ZM23.2335 58.9052H0L0 57.6423H23.2335V58.9052ZM23.2335 53.7723H0L0 51.2467H23.2335V53.7723ZM23.2335 47.3767H0L0 46.1139H23.2335V47.3767ZM23.2335 44.8103H0L0 43.5475H23.2335V44.8103ZM23.2335 42.2439H0L0 40.9811H23.2335V42.2439ZM23.2335 37.1517H0L0 34.5853H23.2335V37.1517ZM23.2335 30.7561H0L0 28.1897H23.2335V30.7561ZM23.2335 25.6234H0L0 23.0569H23.2335V25.6234ZM23.2335 20.4905H0L0 17.9239H23.2335L23.2335 20.4905ZM23.2335 16.6613H0L0 14.0948H23.2335V16.6613ZM23.2335 10.2248H0L0 6.39563H23.2335V10.2248ZM23.2335 5.13281H0L0 3.82922H23.2335V5.13281ZM23.25 2.56641H0L0 0H23.25V2.56641Z"
                        fill="black" />
                </svg>

            </div>

            <h3><b id="event_tittle">Rahul Krishna G S</b></h3>
            <div class="even-date">
                <i class="fa fa-calendar"></i>
                <time>
                    <span id="start_to_end_date">wednesday 28 december 2014</span>
                    <span id="start_to_end_time">08:55pm to 12:00 am</span>
                </time>
            </div>
            <div class="even-info">
                <i class="fa fa-map-marker"></i>
                <p id="venue">
                    location
                </p>

            </div>
            <h3 style="margin-top: 10px;"><b id="price">Price : 20$</b></h3>
            <p style="margin-top: 10px;">Print this e-ticket in color or black while or show it on your phone. You will
                not get admitted without this ticket.</p>
        </section>

    </article>
</div>
<td> <a href="#" onclick="generatePDF()" style="background:#0c7e3f;color: #fff;text-decoration: none;"
        class="btn-sm btn-dark ticketdownloard">Download</a></td>
{{--
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	text: "https://google.com",
	width: 90,
	height: 90,
    margin: 10,
	colorDark : "#000000",
	colorLight : "#037FDD",
	correctLevel : QRCode.CorrectLevel.H
});
</script> --}}
