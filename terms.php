<?php
error_reporting(0);
$id = $_GET['id'];
if ($id == '') {
    session_start();
    if(isset($_SESSION['id']))
      $id = $_SESSION['id'];
}
if ($id == '') {
  		$id = $_COOKIE['id'];
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once("includes/head.php") ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Why MaxLife | MaxLifeFoods</title>
<link rel="stylesheet" href="css/main_s.css" type="text/css" />
<script src="/js/jquery-1.3.2.min.js" content="text/javascript"></script>
<script type="text/javascript">
function cycleImages(){
  var $active = $('#portfolio_cycler2 .active');
  var $next = ($('#portfolio_cycler2 .active').next().length > 0) ? $('#portfolio_cycler2 .active').next() : $('#portfolio_cycler2 img:first');
  $next.css('z-index',2);//move the next image up the pile
  $active.fadeOut(1500,function(){//fade out the top image
  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
  $next.css('z-index',3).addClass('active');//make the next image the top one
  if ($('#portfolio_cycler2 .active').next().length > 0) setTimeout('cycleImages()',7000);//check for a next image, and if one exists, call the function recursively
  });
}
$(document).ready(function(){
  // run every 7s
  setTimeout('cycleImages()', 5500);
})
</script>
<?php include_once("analyticstracking.php") ?>
</head>
<body>
<?php include_once("includes/header.php") ?>
<section>
    <div class="container">
    	<div class="row">
			<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            <div class="heading-blue">
                <h1>Terms of Use</h1>               
                <p>Welcome to MAXLIFEFOODS.COM (“Site”).  By using this Site, you are agreeing to the following terms and conditions of use.  If you are acting on behalf of a company or other legal entity, you represent and warrant that you have the authority to act on behalf of and bind that entity to the following terms and conditions of use.</p>
                <p>If you disagree with any of the terms and conditions, you may not use this Site or any service offered through this Site. We reserve the right to change these Terms of Use at any time without specific notice to you, so please check for changes each time you use the Site. Your continued use of the Site following the posting of changes to these terms and conditions means that you accept those changes and agree to abide by them.</p>
                <p>This is a private Site.  We reserve the right to deny or limit access to this Site to, or block the account of, any person who fails to comply with these Terms of Use, or who otherwise acts in a manner inappropriate for or incompatible with our Site or our audience, in our sole discretion and without notice.</p>
                <h2>PERMITTED USERS</h2>
                <p>To use this Site, you must be at least 18 years of age and have the capacity and authority to enter into a contract.</p>
                <h2>CONDUCT ON SITE</h2>
                <p>This Site is an interactive online service with the primary purpose of connecting with buyers.  By using this Site, you agree to the following:</p>
                <ul class="terms">
                <li>You  will only submit true and accurate information to the Site that you have the right to submit;</li>
                <li>You will only submit information about yourself.</li>
                <li>You will not attempt to access information not intended for me;</li>
                <li>You will not attempt to breach or circumvent any security measures on this Site;</li>
                <li>You will not attempt to interfere with any functionality or service of this Site;</li>
                <li>You will not use this site for “spamming” purposes;</li>
                <li>You will not use this site to compete with you or to induce users of the Site to engage in activities that compete with you;</li>
                <li>You will not attempt to bypass any measures utilized to prevent or restrict access to this Site;</li>
                <li>You will not aggregate any information from this Site with material from other sites;</li>
                <li>You will not attempt to overload the Site or place undue burdens on the Site servers;</li>
                <li>You will not use any automated or manual means to access, copy, or monitor content from this Site;</li>
                <li>You will not act contrary to your best interests;</li>
                <li>You will comply with all laws, rules, and regulations, including without limitation federal election laws;</li>
                <li>You will comply with the terms and conditions of all offers made available through the Site.</li>
                </ul>
                <h2>CREATING AN ACCOUNT</h2>
                <p>By creating an account on our Site, you agree to the following:</p>
                <ul class="terms">
                <li>You will only make legitimate purchases through the Site that comply with the letter and spirit of the terms of the respective offers;</li>
                <li>You will not engage in fraudulent conduct using your account;</li>
                <li>You will not submit false or inaccurate information concerning your account;</li>
                </ul>
                <h2>PAYMENTS</h2>
                <p>You agree to comply with the following terms if you make a purchase through the Site:</p>
                <ul class="terms">
                <li>You agree to be bound by and pay for that transaction;</li>
                <li>You agree that all sales are final;</li>
                <li>If you order something that becomes unavailable before it can be provided to you, you agree that your only remedy is to receive a refund of your purchase price;</li>
                <li>You represent and warrant that you are authorized to use the payment source provided and authorize us to collect and store it, along with other related transaction information;</li>
                <li>You authorize us (and our designated payment processor) to charge the full amount of the transaction to the payment source you designate;</li>
                <li>You agree that we may cancel any transaction if we believe the transaction violates any Terms of Use or if we believe that doing so may prevent financial loss.</li>
                <li>You agree that we may place a delay on a payment for a period of time, limit payment sources for a transaction, limit your ability to make a payment or deactivate your account if we believe doing so may prevent financial loss.</li>
                <li>You agree that we may contact your payment source issuer, law enforcement, or impacted third parties (including other users) and share details of any payments you are associated with if we believe doing so may prevent financial loss or a violation of law.</li>
                </ul>
                <h2>PAYMENT DISPUTES</h2>
                <ul class="terms">
                <li>If you believe that an unauthorized or otherwise problematic transaction has taken place under your account, you agree to notify us immediately, so that we may take action to prevent financial loss.</li>
                <li>To the fullest extent permitted by law, you waive all claims against us related to payments unless you submit the claim to us within 30 days after the charge.</li>
                <li>You are responsible for and agree to reimburse us for all reversals, charge-backs, claims, fees, fines, penalties and other liability incurred by us (including costs and related expenses) that were caused by or arising out of payments that you authorized or accepted.</li>
                <li>If you enter into a transaction with a third party and have a dispute over the goods or services you purchased, you agree that we have no liability for such goods or services. Our only involvement with regard to such transaction is as a payment agent.</li>
                <li>We may intervene in disputes between users concerning payments but have no obligation to do so.</li>
                <li>Your only remedy for a technical failure or interruption of service is to request that your transaction be completed at a later time.</li>
                </ul>
                <h2>OWNERSHIP AND LIMITED LICENSE</h2>
                <p>The content found on this Site, and the selection, arrangement, and coordination thereof, is protected by copyright and owned either by us or used with permission.  Except as expressly provided herein, you may not download, copy, reproduce, distribute, transmit, broadcast, display, sell, licensed or otherwise exploit such content for any other purposes whatsoever without the prior written consent of its owner. You are granted a limited, nonexclusive, nontransferable, revocable license to view, download, print, and distributed material owned by us from this Site only for your personal, noncommercial use.  Notwithstanding the foregoing, we reserve the right in our sole discretion to deny, revoke, or limit permission to use the copyrighted materials found at this Site at any time. You may not sell material from this Site for any purpose. We reserve all rights not expressly granted in and to the Site and its content.</p>
                <h2>TRADEMARKS</h2>
                <p>MaxLife Foods, LLC. is our trademark and may not be used without our permission.</p>
                <h2>ACCESS TO SITE</h2>
                <p>You acknowledge that there may be interruptions to this Site and that the Site may be unavailable from time to time.  You acknowledge that your access to this Site may be interrupted, suspended, or terminated. You understand that the Site uses third party vendors and hosting partners to provide the necessary hardware, software, networking, storage, and related technology required to run the Site.</p>
                <h2>PRIVACY POLICY</h2>
                <p>You have read and agree to all of the terms and conditions of our Privacy Policy, which is located at WWW.MAXLIFEFOODS.COM.</p>
                <h2>DISCLAIMERS AND LIMITATION OF LIABILITY</h2>
                <p>THE MATERIAL PROVIDED ON THIS SITE IS INTENDED FOR INFORMATIONAL PURPOSES ONLY, AND HEREBY DO WAIVE, ANY LEGAL OR EQUITABLE RIGHTS OR REMEDIES YOU HAVE OR MAY HAVE AGAINST US WITH RESPECT THERETO, AND AGREE TO INDEMNIFY AND HOLD US, OUR OWNERS/OPERATORS, AFFILIATES, AND/OR LICENSORS, HARMLESS TO THE FULLEST EXTENT ALLOWED BY LAW REGARDING ALL MATTERS RELATED TO YOUR USE OF THE SITE. WE DISCLAIM ALL LIABILITY TO ANY PERSON FOR ANY LOSS CAUSED BY ERRORS OR OMISSIONS IN THIS COLLECTION OF INFORMATION.</p>
                <p>THE INFORMATION PROVIDED FROM OR THROUGH THIS SITE IS “AS IS” AND “AS AVAILABLE,” AND YOU USE IT AT YOUR OWN RISK.  WE DO NOT MAKE, AND HEREBY DISCLAIM, ANY AND ALL EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, NONINFRINGEMENT, AND ANY WARRANTIES ARISING FROM A COURSE OF DEALING, USAGE, OR TRADE PRACTICE.  WE DO NOT WARRANT THAT THE INFORMATION OR SERVICE WILL BE UNINTERRUPTED, ERROR-FREE, OR COMPLETELY SECURE. OUR AGGREGATE LIABILITY ARISING FROM OR RELATING YOUR USE OF THIS SITE (REGARDLESS OF THE FORM OF ANY ACTION OR CLAIM - E.G., CONTRACT, WARRANTY, TORT, AND/OR OTHERWISE), IS LIMITED TO THE TOTAL AMOUNT PAID BY YOU FOR THE INFORMATION IN THE PAST SIX MONTHS OR FIVE HUNDRED DOLLARS, WHICHEVER IS LESS.  WE SHALL NOT IN ANY CASE BE LIABLE FOR ANY SPECIAL, INCIDENTAL, CONSEQUENTIAL, INDIRECT OR PUNITIVE DAMAGES, INCLUDING LOST PROFITS OR REVENUE, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.</p>
                <h2>INDEMNIFICATION BY USER</h2>
                <p>You agree to indemnify, defend and hold us and our affiliates, business partners, officers, directors, employees and agents harmless from any loss, liability, claim, demand, damage, or expense (including reasonable legal fees) asserted by any third party relating in any way to your use of this Site or breach of these Terms of Use. We reserve the right to assume the exclusive defense and control of any matter subject to indemnification by you, which shall not excuse your indemnity obligations.</p>
                <h2>ARBITRATION</h2>
                <p>We will make every reasonable effort to resolve any disagreements that you have with us. If those efforts fail, by using this Site you agree that any claim, dispute, or controversy you may have against us arising out of, relating to, or connected in any way with this Agreement this Site or the purchase or sale of any voucher(s), shall be resolved exclusively by final and binding arbitration administered by the American Arbitration Association (“AAA”) and conducted before a single arbitrator pursuant to the applicable Rules and Procedures established by AAA (“Rules and Procedures”). You agree further that: (a) the arbitration shall be held at a location determined by AAA pursuant to the Rules and Procedures (provided that such location is reasonably convenient for you), or at such other location as may be mutually agreed upon by you and us; (b) the arbitrator shall apply Utah law consistent with the Federal Arbitration Act and applicable statutes of limitations, and shall honor claims of privilege recognized at law; (c) there shall be no authority for any claims to be arbitrated on a class or representative basis; arbitration can decide only your and/or our individual claims; and the arbitrator may not consolidate or join the claims of other persons or parties who may be similarly situated; (d) in the event that you are able to demonstrate that the costs of arbitration will be prohibitive as compared to the costs of litigation, we will pay as much of your filing and hearing fees in connection with the arbitration as the arbitrator deems necessary to prevent the arbitration from being cost-prohibitive; and (e) with the exception of subpart (c) above, if any part of this arbitration provision is deemed to be invalid, unenforceable or illegal, or otherwise conflicts with the Rules and Procedures established by AAA, then the balance of this arbitration provision shall remain in effect and shall be construed in accordance with its terms as if the invalid, unenforceable, illegal or conflicting provision were not contained herein. If, however, subpart (c) is found to be invalid, unenforceable or illegal, then the entirety of this Arbitration Provision shall be null and void, and neither you nor we shall be entitled to arbitrate their dispute.</p>
                <h2>JURISDICTION AND APPLICABLE LAW</h2>
                <p>This Site is designed for use by U.S. residents only.  If you are not a U.S. resident, you may use this Site, but you are responsible for making sure that your actions comply with the laws in your area. This agreement shall be governed by the laws of the State of Utah, as applied to agreements entered into and to be performed entirely within the state, without giving effect to any principles of conflicts of law. Any action brought to enforce this agreement or any matters related to this Site shall be brought in the state or federal courts located in Utah County, Utah, and you hereby consent and submit to the personal jurisdiction of such courts for the purposes of litigating any such action. If any provision of this agreement is unlawful, void, or unenforceable in whole or in part, the remaining provisions shall not be affected, unless we determine that the invalid or unenforceable provision is an essential term to the agreement, in which case we may at our sole discretion amend the agreement.</p>
                <h2>TERMINATION</h2>
                <p>We may terminate these Terms of Use at any time. Without limiting the foregoing, we shall have the right to immediately terminate or suspend any of your passwords or accounts in the event we consider, in our sole discretion, any of your conduct to be unacceptable, or in the event you breach these Terms of Use. Notwithstanding the above, these Terms of Use will survive termination of this Agreement.</p>
                <h2>MISCELLANEOUS</h2>
                <p>No waiver by either party of any breach or default or failure to exercise any right allowed under these Terms of Use is a waiver of any preceding or subsequent breach or default or a waiver or forfeiture of any similar or future rights under these Terms of Use. The section headings used herein are for convenience only and shall be of no legal force or effect. If a court of competent jurisdiction holds any provision of these Terms of Use invalid, such invalidity shall not affect the enforceability of any other provisions contained herein, and the remaining portions shall continue in full force and effect.</p>
                <h2>CONTACT</h2>
                <p>You are contracting with MaxLife Foods, LLC. Correspondence should be directed to: MaxLife Foods, LLC., PO Box 2335, Orem, UT  84059 and <a href="mailto:foodstorage@maxlifefoods.com">foodstorage@maxlifefoods.com</a>. The provisions of these Terms of Use apply equally to and are for the benefit of our subsidiaries, affiliates, partners, and third-party content providers.</p>
                <p>©2012 MaxLife Foods, LLC. All rights reserved.</p>
			</div>
		</div>
	</div>
</section>
<?php include_once("includes/footer.php") ?>
<?php include_once("googlefooter.php") ?>
</body>
</html>