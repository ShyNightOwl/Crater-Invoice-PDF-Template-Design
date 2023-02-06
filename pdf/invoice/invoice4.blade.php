<!DOCTYPE html>
<html>
<head>
    <title>@lang('pdf_invoice_label') - {{ $invoice->invoice_number }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
    /* -- Base -- */
    body {font-family: "DejaVu Sans";}
    html {margin: 0px; padding: 0px; margin-top: 160px;margin-bottom: 50px;}
    table {border-collapse: collapse;}
    /*hr {color: #000000; border: 1px solid #000000;}*/
    /* -- Helpers -- */
    table .text-left {text-align: left;}
    table .text-right {text-align: right;}
    .text-primary {color: #000000;}
    .text-center {text-align: center}
    .border-0 {border: none;}
    .py-2 {padding-top: 2px;padding-bottom: 2px;}
    .py-3 {padding: 3px 0px;}
    .py-8 {padding-top: 8px;padding-bottom: 8px;}
    .pl-0 {padding-left: 0px;}
    .pl-10 {padding-left: 10px;}
    .pl-20 {padding-left: 20px;}
    .pr-10 {padding-right: 10px;}
    .pr-20 {padding-right: 20px;}
    .pagenum:after {content: counter(page);}

    /* -- Header -- */
    #header {background: url("https://cdn.pixabay.com/photo/2015/11/19/08/51/banner-1050624_960_720.jpg");background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;position: fixed;width: 100%;height: 140px;left: 0px;top: -160px;margin-bottom: 0px; font-size: 20px; color: #ffffff;}
    .header-logo {position: absolute; color: #ffffff;}
    .header-section-left {padding: 45px 0px 45px 30px; display: inline-block; width: 30%;}
    .header-section-right {padding: 4px 30px 4px 0px; display: inline-block; width: 35%; float: right; text-align: right; color: #ffffff;}

    /* -- Footer -- */
    #footer {color: #ffffff;background: #CC0000;padding: 2px 0px;width: 100%;text-align: center;position: fixed;left: 0px;right: 0px;bottom: -50px;}

    /* -- Header Estimate Details -- */
    .estimate-details-container {text-align: center; width: 40%;}
    .estimate-details-container h1 {margin: 0;font-size: 28px;line-height: 36px;text-align: right;text-transform: uppercase;}
    .estimate-details-container h3 {margin-bottom: 1px;margin-top: 0;}
    .estimate-details-container h4 {margin: 0;font-size: 13px;line-height: 15px;text-align: right;}

    /* -- Address -- */
    .address-label {color: #FFFFFF;background: #CC0000;font-size: 13px;font-weight: bold;text-transform: uppercase;padding: 2px 5px 3px 5px;}
    .content-wrapper {display: block;padding-bottom: 20px;}
    .address-container {display: block;}

    /* -- Company Address -- */
    .company-address-container {padding: 0 30px 0 30px;display: inline;float: left;width: 30%;text-transform: capitalize;margin-bottom: 2px;}
    .company-address-container h1 {font-size: 15px;line-height: 22px;letter-spacing: 0.05em;margin-bottom: 0px;}
    .company-address {text-align: left;word-wrap: break-word;font-size: 10px;line-height: 15px;color: #000000;text-transform: none;}

    /* -- Billing -- */
    .billing-address-container {display: block;/* position: absolute; */float: right;padding: 0 30px 0 0;}
    .billing-address-label {font-size: 12px;line-height: 18px;padding: 0px;margin-bottom: 0px;}
    .billing-address-name {font-size: 15px;line-height: 22px;padding: 0px;margin-top: 0px;margin-bottom: 0px;}
    .billing-address {font-size: 10px;line-height: 15px;color: #000000;padding: 0px;margin: 0px;word-wrap: break-word;width: 200px;}

    /* -- Shipping -- */
    .shipping-address-container {display: block;float: right;padding: 0 30px 0 0;}
    .shipping-address-label {font-size: 12px;line-height: 18px;padding: 0px;margin-bottom: 0px;}
    .shipping-address-name {font-size: 15px;line-height: 22px;padding: 0px;margin-top: 0px;margin-bottom: 0px;}
    .shipping-address {font-size: 10px;line-height: 15px;color: #000000;padding: 0px 30px 0px 20px;margin: 0px;word-wrap: break-word;width: 200px;}
    .attribute-label {font-size: 12;font-weight: bold;line-height: 22px;color: #000000;}
    .attribute-value {font-size: 12;line-height: 22px;color: #000000;}

    /* -- Items Table -- */
    .items-table {padding: 30px 30px 10px 30px;page-break-before: avoid;page-break-after: auto;}
    .items-table hr {height: 0.1px;margin: 0 30px;}
    .item-table-heading {font-size: 14;text-transform: uppercase;color: #ffffff;background: #CC0000;padding: 5px;border-left: 1px solid #CC0000;border-right: 1px solid #CC0000;}
    .item-table-heading-row {/*border-bottom: 2px solid #000000;*/}
    .item-table-heading-row td {padding: 5px;padding-bottom: 10px;}
    tr.item-table-heading-row th {padding-bottom: 10px;font-size: 12px;line-height: 18px;}
    tr.item-row td {font-size: 12px;line-height: 18px;border: 1px solid #CCCCCC;}
    .items-table tr:nth-child(odd) {background: #F8F8F8;}
    .item-cell {font-size: 13;color: #000000;text-align: center;padding: 5px;padding-top: 10px;}
    .item-description {color: #000000;font-size: 10px;line-height: 12px;page-break-inside: avoid;}

    /* -- Total Display Table -- */
    .total-display-container {padding: 0 25px;margin-right: 5px;}
    .item-cell-table-hr {margin: 0 25px;}
    .total-display-table {box-sizing: border-box;page-break-inside: avoid;page-break-before: auto;page-break-after: auto;float: right;width: auto;border: 1px solid #CC0000;}
    .total-table-attribute-label {color: #000000;font-size: 12px;font-weight: bold;text-align: left;padding: 0px 10px;}
    .total-table-attribute-value {color: #000000;font-size: 12px;font-weight: bold;text-align: right;padding: 2px 10px 2px 0px;width: 100px;}
    .total-border-left {/*border: 2px solid #000000 !important;*/color: #ffffff;background: #CC0000;border-right: 0px !important;padding-top: 0px;padding: 8px !important;}
    .total-border-right {/*border: 2px solid #000000 !important;*/color: #ffffff !important;background: #CC0000;border-left: 0px !important;padding-top: 0px;padding: 8px !important;}

    /* -- Notes -- */
    .notes {margin: 0px 25px 25px 25px;font-size: 12px;color: #000000;text-align: justify;page-break-inside: auto;}
    .notes-label {font-size: 14px;letter-spacing: 0.05em;color: #000000;white-space: nowrap;}
    .notes h1 {color: #ffffff;}
    .notes h2 {color: #ffffff;background: #CC0000;width: 100%;text-align: center;padding-bottom: 2px;}
    .notes h3 {color: #CC0000;line-height: 28px;}

    /* -- Signature -- */
    .signature-container{margin: 0 25px;font-size: 12px;}
    .signature-section-left {text-align: center;padding: 30px;}
    .signature-section-left h4 {padding-bottom: 80px;border-bottom: 1px solid #000000;}
    .signature-section-right {text-align: center;padding: 30px;}
    .signature-section-right h4 {padding-bottom: 80px;border-bottom: 1px solid #000000;}
</style>
    @if (App::isLocale('th'))
        @include('app.pdf.locale.th')
    @endif
</head>

<body>
    <div id="header" style="clear: both;">
    	<table width="100%">
			<tr>
				@if ($logo)
				<td width="60%" class="header-section-left">
					<img class="header-logo" style="height: auto;" src="{{ $logo }}" alt="Company Logo">
				</td>
				@else
				<td width="60%" class="header-section-left" style="padding-top: 0px;">
					@if ($estimate->customer->company)
					<h1 class="header-logo"> {{ $invoice->customer->company->name }} </h1>
					@endif
				</td>
				@endif
				<td width="40%" class="header-section-right estimate-details-container">
					<h1>@lang('pdf_invoice_label')</h1>
					<h4>Invoice No.: {{ $invoice->invoice_number }}</h4>
					<h4>Invoice Date: {{ $invoice->formattedInvoiceDate }}</h4>
					<h4>Invoice Due Date: {{ $invoice->formattedDueDate }}</h4>
                    <h4 class="pagenum">Page No.: </h4>
				</td>
			</tr>
		</table>
    </div>
    <div class="content-wrapper" style="clear: both;">
		<div class="address-container">
			<div class="company-address-container company-address">
				<div class="address-label" >FROM,<br></div>
				{!! $company_address !!}
			</div>
		@if ($shipping_address !== '</br>')
		<div class="shipping-address-container shipping-address">
			@if ($shipping_address)
				<div class="address-label" >@lang('pdf_ship_to')<br></div>
			{!! $shipping_address !!}
			@endif
		</div>
		@endif
		<div class="billing-address-container billing-address" @if ($shipping_address === '</br>') style="float:right; margin-right:30px;" @endif>
			@if ($billing_address)
				<div class="address-label" >@lang('pdf_bill_to')<br></div>
			{!! $billing_address !!}
			@endif
		</div>
	</div>
    <div style="clear: both;">@include('app.pdf.invoice.partials.table')</div>
	<div style="page-break-after: always;"></div>
	<div class="notes">
		@if ($notes)
		<!-- <div class="notes-label"> @lang('pdf_notes') </div> -->
		{!! $notes !!}
		@endif
	</div>
	<div class="signature-container">
		<h5>NOTE* :- By signing these documents, the customer agrees to all the services, terms and conditions described in these documents.</h5>
		<table width="100%">
			<tr>
				<td width="50%" class="signature-section-left">
					Authorised Signatory For, <h4 class="signature-title">{{ $invoice->customer->company->name }}<br>( CEO / Owner )</h4>
					<h5>Accepted & Signed Date: ________/________/________</h5>
				</td>
				<td width="50%" class="signature-section-right">
					Authorised Signatory For, <h4 class="signature-title">{{ $invoice->customer->billingaddress->name }}<br>( {{ $invoice->customer->contact_name }} )</h4>
					<h5>Accepted & Signed Date: ________/________/________</h5>
				</td>
			</tr>
		</table>
	</div>
</div>
<footer id="footer" style="clear: both;">
	<h4>{{ $invoice->customer->company->name }}</h4>
</footer>
</body>
</html>