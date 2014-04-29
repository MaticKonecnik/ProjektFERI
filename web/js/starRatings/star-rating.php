<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="Author" content="Cashmopolit" />
<meta name="Publisher" content="Cashmopolit" />
<meta name="Copyright" content="Cashmopolit" />
<meta name="Content-language" content="en" />
<title>Cashmopolit.hr - Tutorial how to jQuery Star Rating plugin</title>
<meta name="Keywords" content="Tutorial how to jQuery Star Rating plugin" />
<meta name="Description" content="Tutorial how to jQuery Star Rating plugin" />
<script type="text/javascript" src="jquery.js" ></script>
<link rel="stylesheet" href="ui.tabs.css" type="text/css" />
<style>
* {
	margin:0;
	padding:0;
	outline: none;
	font-family:"Trebuchet MS", Tahoma, Arial;
}
html {
	margin:0;
	padding: 0;
}
body {
	margin: 0;
	padding: 0;
	color:#000;
	font-size:13px;
}
h1 {
	font-size:20px;
}
h2 {
	font-size:18px;
}
h3 {
	font-size:15px;
}
h1, h2, h3 {
	clear:left;
	font-weight:100;
}
img {
	border:0;
}
.left {
	float:left;
}
.right {
	float:right;
}
#sadrzaj {
	margin: 0 auto;
	width:960px;
}
#upute_desno {
	width:100%;
	float:left;
	color:#333;
	margin:10px;
	font-size:14px;
}
#upute_desno h1 {
	font-size:28px;
	padding:5px 0 10px;
}
#upute_desno h2 {
	padding:5px 0 3px;
	margin:10px 0;
	border-bottom:1px solid #000;
}
#upute_desno p {
	margin:5px 0;
	text-align:justify;
}
#upute_desno table {
	width:100%;
}
#upute_desno td {
	vertical-align:top;
}
#upute_desno a {
	color:#090;
}
#upute_desno ol {
	margin:0 0 0 20px;
}
#upute_desno pre {
	border-left:1px solid #999;
	background:#CCC;
	color:#333;
	margin:10px 10px 10px 0;
	padding:5px;
	white-space: pre-wrap;       /* css-3 */
	white-space: -moz-pre-wrap !important;  /* Mozilla, since 1999 */
	white-space: -pre-wrap;      /* Opera 4-6 */
	white-space: -o-pre-wrap;    /* Opera 7 */
	word-wrap: break-word;       /* Internet Explorer 5.5+ */
	font-family: "Courier New", Courier, monospace, sans-serif;
	font-size:12px;
}
#upute_desno pre.zeleno {
	color:#090;
}
#tabs p {
	font-size:16px;
}
#tabs a {
	color:#b0025c;
}
#tabs ul {
	margin:0 0 0 25px;
}
#tabs dl {
	border:1px solid #999;
	padding:10px;
	margin:5px;
}
#tabs dt {
	color:#F00;
}
#tabs dt em {
	color:#333;
}
#tabs dd {
	padding:5px 0 5px 40px;
}
#tabs th {
	text-align:right;
	vertical-align:top;
}
#tabs td {
	text-align:left;
	padding:0 0 3px 10px;
}
#tabs .test {
	float:right;
	border:1px solid #bb0224;
	padding:5px;
}
.podvuceno {
	color:#6F6;
	text-decoration:underline;
}
#ads_desno {
	width:160px;
	float:right;
	margin:10px 10px 10px 0;
}
#footer {
	margin:0 auto;
	padding: 10px 0 0 0;
	width:990px;
	text-align:center;
	clear:both;
	font-size:12px;
}
#razmak {
	border-bottom:1px solid #000;
}
.padding_gore {
	padding:3px 0 0 0;
}
#footer a {
	color:#888888;
	text-decoration:none;
}
#footer a:hover {
	text-decoration:underline;
}
.code {
	width:290px;
}
</style>
<script type="text/javascript" src="ui.core.min.js"></script>
<script type="text/javascript" src="ui.tabs.min.js"></script>
<script type="text/javascript" src="jquery.rating.js"></script>
<script type="text/javascript" src="jquery.MetaData.js"></script>
<link rel="stylesheet" href="jquery.rating.css" type="text/css" />
<script type="text/javascript">
	$(function(){
		$('#tabs').tabs();
		$('#sub-tabs1').tabs();
	});
</script>
</head>
<body>
<div id="sadrzaj">
  <div id="upute">
    <div id="upute_desno"> <a href="http://www.cashmopolit.hr/howto/jquery/how_to_jquery_php_mysql_star_rating.php" class="right" title="How to jQuery Star Rating plugin"><img src="http://www.cashmopolit.hr/images/englishflag.gif" alt="How to jQuery Star Rating plugin" /></a>
      <h1>jQuery/PHP/Mysql Star Rating plugin</h1>
      <div id="tabs">
        <ul>
          <li><a href="#tabs-1">Overview</a></li>
          <li><a href="#tabs-2">Documentation</a></li>
          <li><a href="#tabs-3">Examples</a></li>
          <li><a href="#tabs-4">Database integration</a></li>
        </ul>
        <div id="tabs-1">
          <h2>Overview</h2>
          <p>The Star Rating Plugin is a plugin for the jQuery Javascript library that creates a non-obstrusive star rating control based on a set of radio input boxes. </p>
          <p>What does it do?</p>
          <ul>
            <li>It turns a collection of radio boxes into a neat star-rating control.</li>
            <li>It creates the interface based on standard form elements, which means the basic functionality will still be available even if Javascript is disabled.</li>
            <li>NEW (12-Mar-08): In read only mode (using the 'readOnly' option or disabled property), the plugin is a neat way of displaying star-like values without any additional code</li>
          </ul>
          <p>The better way to know what is <strong>jQuery Star Rating plugin</strong>, click the Example tab above and see it in action.</p>
          <h2>Download</h2>
          <p><a href="../../download/star-rating/star-rating.zip" title="Download jQuery Star Rating plugin v3.13">Download jQuery Star Rating plugin v3.13</a></p>
          <h2>Credits</h2>
          <ul>
            <li>It all started with <em>Will Stuckey</em>'s <a target="_blank" href="http://www.visualjquery.com/rating/rating_redux.html">jQuery Star Rating Super Interface!</a></li>
            <li>The original then became the inspiration for <em>Ritesh Agrawal</em>'s <a target="_blank" href="http://php.scripts.psu.edu/rja171/widgets/rating.php">Simple Star Rating System</a>,       which allows for a GMail like star/un-star toggle. </li>
            <li>This was followed by several spin-offs... (one of which is the <a target="_blank" href="http://www.learningjquery.com/2007/05/half-star-rating-plugin">Half-star rating plugin</a>) </li>
            <li>Then someone at <a target="_blank" href="http://www.phpletter.com/Demo/Jquery-Star-Rating-Plugin/">PHPLetter.com modified the plugin</a> to overcome the issues - then plugin was now based on standard form elements, meaning the interface would still work with Javascript disabled making it <em>beautifully downgradable</em>. </li>
            <li>Then <a href="http://www.fyneworks.com/">fyneworks.com</a> came along and noticed a fundamental flaw with the latter: there could only be one star rating control per page. The rest of the story is what you will see below... </li>
            <li><strong>NEW</strong> (12-Mar-08): Then <strong><a href="http://keith-wood.name/">Keith Wood</a></strong> added some very nice functionality to the plugin: option to disable the cancel button, option to make the plugin readOnly and ability to accept any value (other than whole numbers) </li>
            <li><strong>NEW</strong> (20-Mar-08): Now supports half-star, third-star, quater-star, etc... Not additional code required. No additional images required. </li>
            <li><strong>NEW</strong> (31-Mar-08): Two new events, hover/blur (arguments: [value, linkElement]) </li>
            <li><a href="how_to_jquery_php_mysql_star_rating.php">Cashmopolit</a> - Added PHP/Mysql support</li>
          </ul>
          <p>&nbsp;</p>
        </div>
        <div id="tabs-2">
          <h2>Documentation</h2>
          <p><strong>jQuery Cycle Plugin</strong> uses the <a href="http://jquery.com/">jQuery JavaScript library</a>, only. So, include just these two javascript files in your header.</p>
          <pre>&lt;script type="text/javascript" src="js/jquery.js"&gt;&lt;/script&gt;
&lt;script type="text/javascript" src="js/jquery.rating.js"&gt;&lt;/script&gt;
</pre>
          <p>Just add the <strong>star</strong> class to your radio boxes:</p>
          <pre>
&lt;input name="star1" type="radio" class="star"/&gt;
&lt;input name="star1" type="radio" class="star"/&gt;
&lt;input name="star1" type="radio" class="star"/&gt;
&lt;input name="star1" type="radio" class="star"/&gt;
&lt;input name="star1" type="radio" class="star"/&gt;</pre>
          <p>
            <input name="star1" type="radio" class="star"/>
            <input name="star1" type="radio" class="star"/>
            <input name="star1" type="radio" class="star"/>
            <input name="star1" type="radio" class="star"/>
            <input name="star1" type="radio" class="star"/>
          </p>
          <br />
          <p>Use the <strong>checked</strong> property to specify the initial/default value of the control:</p>
          <pre>
&lt;input name="star2" type="radio" class="star"/&gt;
&lt;input name="star2" type="radio" class="star"/&gt;
&lt;input name="star2" type="radio" class="star" checked="checked"/&gt;
&lt;input name="star2" type="radio" class="star"/&gt;
&lt;input name="star2" type="radio" class="star"/&gt;</pre>
          <p>
            <input name="star2" type="radio" class="star"/>
            <input name="star2" type="radio" class="star"/>
            <input name="star2" type="radio" class="star" checked="checked"/>
            <input name="star2" type="radio" class="star"/>
            <input name="star2" type="radio" class="star"/>
          </p>
          <br />
          <p>Use the <strong>disabled</strong> property to use a control for display purposes only:</p>
          <pre>
&lt;input name="star3" type="radio" class="star" disabled="disabled"/&gt;
&lt;input name="star3" type="radio" class="star" disabled="disabled"/&gt;
&lt;input name="star3" type="radio" class="star" disabled="disabled" checked="checked"/&gt;
&lt;input name="star3" type="radio" class="star" disabled="disabled"/&gt;
&lt;input name="star3" type="radio" class="star" disabled="disabled"/&gt;</pre>
          <p>
            <input name="star3" type="radio" class="star" disabled="disabled"/>
            <input name="star3" type="radio" class="star" disabled="disabled"/>
            <input name="star3" type="radio" class="star" disabled="disabled" checked="checked"/>
            <input name="star3" type="radio" class="star" disabled="disabled"/>
            <input name="star3" type="radio" class="star" disabled="disabled"/>
          </p>
          <br />
          <p>Use metadata plugin to pass advanced settings to the plugin via the class property:</p>
          <pre>
&lt;input name="adv1" type="radio" class="star {split:4}"/&gt;
&lt;input name="adv1" type="radio" class="star {split:4}"/&gt;
&lt;input name="adv1" type="radio" class="star {split:4}"/&gt;
&lt;input name="adv1" type="radio" class="star {split:4}"/&gt;
&lt;input name="adv1" type="radio" class="star {split:4}" checked="checked"/&gt;
&lt;input name="adv1" type="radio" class="star {split:4}"/&gt;
&lt;input name="adv1" type="radio" class="star {split:4}"/&gt;
&lt;input name="adv1" type="radio" class="star {split:4}"/&gt;</pre>
          <p>
            <input name="adv1" type="radio" class="star {split:4}"/>
            <input name="adv1" type="radio" class="star {split:4}"/>
            <input name="adv1" type="radio" class="star {split:4}"/>
            <input name="adv1" type="radio" class="star {split:4}"/>
            <input name="adv1" type="radio" class="star {split:4}" checked="checked"/>
            <input name="adv1" type="radio" class="star {split:4}"/>
            <input name="adv1" type="radio" class="star {split:4}"/>
            <input name="adv1" type="radio" class="star {split:4}"/>
          </p>
          <br />
          <p>Use custom selector:</p>
          <script>$(function(){ // wait for document to load
								$('input.wow').rating();
							});</script>
          <pre>
&lt;input name="adv2" type="radio" class="wow {split:4}"/&gt;
&lt;input name="adv2" type="radio" class="wow {split:4}"/&gt;
&lt;input name="adv2" type="radio" class="wow {split:4}"/&gt;
&lt;input name="adv2" type="radio" class="wow {split:4}"/&gt;
&lt;input name="adv2" type="radio" class="wow {split:4}" checked="checked"/&gt;
&lt;input name="adv2" type="radio" class="wow {split:4}"/&gt;
&lt;input name="adv2" type="radio" class="wow {split:4}"/&gt;
&lt;input name="adv2" type="radio" class="wow {split:4}"/&gt;</pre>
          <p>
            <input name="adv2" type="radio" class="wow {split:4}"/>
            <input name="adv2" type="radio" class="wow {split:4}"/>
            <input name="adv2" type="radio" class="wow {split:4}"/>
            <input name="adv2" type="radio" class="wow {split:4}"/>
            <input name="adv2" type="radio" class="wow {split:4}" checked="checked"/>
            <input name="adv2" type="radio" class="wow {split:4}"/>
            <input name="adv2" type="radio" class="wow {split:4}"/>
            <input name="adv2" type="radio" class="wow {split:4}"/>
          </p>
          <br />
        </div>
        <div id="tabs-3">
          <script type="text/javascript" language="javascript">
								$(function(){ 
									$('#form1 :radio.star').rating(); 
									$('#form2 :radio.star').rating({cancel: 'Cancel', cancelValue: '0'}); 
									$('#form3 :radio.star').rating(); 
									$('#form4 :radio.star').rating(); 
								});
              </script>
          <script>
							$(function(){
								$('#tabs-3 form').submit(function(){
									$('.test',this).html('');
									$('input',this).each(function(){
									if(this.checked) $('.test',this.form).append(''+this.name+': '+this.value+'<br/>');
								});
								return false;
								});
							});
              </script>
          <h2>Example 1 - A blank form</h2>
          <form id="form1">
            <div class="test"> <span style="color:#FF0000">Results will be displayed here</span> </div>
            <p>Rating 1: (N/M/Y)
              <input class="star" type="radio" name="test-1-rating-1" value="N" title="No"/>
              <input class="star" type="radio" name="test-1-rating-1" value="M" title="Maybe"/>
              <input class="star" type="radio" name="test-1-rating-1" value="Y" title="Yes"/>
            </p>
            <p>Rating 2: (10 - 50)
              <input class="star" type="radio" name="test-1-rating-2" value="10"/>
              <input class="star" type="radio" name="test-1-rating-2" value="20"/>
              <input class="star" type="radio" name="test-1-rating-2" value="30"/>
              <input class="star" type="radio" name="test-1-rating-2" value="40"/>
              <input class="star" type="radio" name="test-1-rating-2" value="50"/>
            </p>
            <p>Rating 3: (1 - 7)
              <input class="star" type="radio" name="test-1-rating-3" value="1"/>
              <input class="star" type="radio" name="test-1-rating-3" value="2"/>
              <input class="star" type="radio" name="test-1-rating-3" value="3"/>
              <input class="star" type="radio" name="test-1-rating-3" value="4"/>
              <input class="star" type="radio" name="test-1-rating-3" value="5"/>
              <input class="star" type="radio" name="test-1-rating-3" value="6"/>
              <input class="star" type="radio" name="test-1-rating-3" value="7"/>
            </p>
            <p>Rating 4: (1 - 5)
              <input class="star" type="radio" name="test-1-rating-4" value="1" title="Worst"/>
              <input class="star" type="radio" name="test-1-rating-4" value="2" title="Bad"/>
              <input class="star" type="radio" name="test-1-rating-4" value="3" title="OK"/>
              <input class="star" type="radio" name="test-1-rating-4" value="4" title="Good"/>
              <input class="star" type="radio" name="test-1-rating-4" value="5" title="Best"/>
            </p>
            <p>Rating 5: (1 - 5)
              <input class="star" type="radio" name="test-1-rating-5" value="1"/>
              <input class="star" type="radio" name="test-1-rating-5" value="2"/>
              <input class="star" type="radio" name="test-1-rating-5" value="3"/>
              <input class="star" type="radio" name="test-1-rating-5" value="4"/>
              <input class="star" type="radio" name="test-1-rating-5" value="5"/>
            </p>
            <p>Rating 6 (readonly): (1 - 5)
              <input class="star" type="radio" name="test-1-rating-6" value="1" disabled="disabled"/>
              <input class="star" type="radio" name="test-1-rating-6" value="2" disabled="disabled"/>
              <input class="star" type="radio" name="test-1-rating-6" value="3" disabled="disabled"/>
              <input class="star" type="radio" name="test-1-rating-6" value="4" disabled="disabled"/>
              <input class="star" type="radio" name="test-1-rating-6" value="5" disabled="disabled"/>
            </p>
            <p>
              <input type="submit" value="Submit scores!"/>
            </p>
          </form>
          <h2>Test 2 - With defaults ('checked')</h2>
          <form id="form2">
            <div class="test"> <span style="color:#FF0000">Results will be displayed here</span> </div>
            <p>Rating 1: (N/M/Y, default M)
              <input class="star" type="radio" name="test-2-rating-1" value="N" title="No"/>
              <input class="star" type="radio" name="test-2-rating-1" value="M" title="Maybe" checked="checked"/>
              <input class="star" type="radio" name="test-2-rating-1" value="Y" title="Yes"/>
            </p>
            <p>Rating 2: (10 - 50, default 30)
              <input class="star" type="radio" name="test-2-rating-2" value="10"/>
              <input class="star" type="radio" name="test-2-rating-2" value="20"/>
              <input class="star" type="radio" name="test-2-rating-2" value="30" checked="checked"/>
              <input class="star" type="radio" name="test-2-rating-2" value="40"/>
              <input class="star" type="radio" name="test-2-rating-2" value="50"/>
            </p>
            <p>Rating 3: (1 - 7, default 4)
              <input class="star" type="radio" name="test-2-rating-3" value="1"/>
              <input class="star" type="radio" name="test-2-rating-3" value="2"/>
              <input class="star" type="radio" name="test-2-rating-3" value="3"/>
              <input class="star" type="radio" name="test-2-rating-3" value="4" checked="checked"/>
              <input class="star" type="radio" name="test-2-rating-3" value="5"/>
              <input class="star" type="radio" name="test-2-rating-3" value="6"/>
              <input class="star" type="radio" name="test-2-rating-3" value="7"/>
            </p>
            <p>Rating 4: (1 - 5, default 1)
              <input class="star" type="radio" name="test-2-rating-4" value="1" title="Worst" checked="checked"/>
              <input class="star" type="radio" name="test-2-rating-4" value="2" title="Bad"/>
              <input class="star" type="radio" name="test-2-rating-4" value="3" title="OK"/>
              <input class="star" type="radio" name="test-2-rating-4" value="4" title="Good"/>
              <input class="star" type="radio" name="test-2-rating-4" value="5" title="Best"/>
            </p>
            <p>Rating 5: (1 - 5, default 5)
              <input class="star" type="radio" name="test-2-rating-5" value="1"/>
              <input class="star" type="radio" name="test-2-rating-5" value="2"/>
              <input class="star" type="radio" name="test-2-rating-5" value="3"/>
              <input class="star" type="radio" name="test-2-rating-5" value="4"/>
              <input class="star" type="radio" name="test-2-rating-5" value="5" checked="checked"/>
            </p>
            <p>Rating 6 (readonly): (1 - 5, default 3)
              <input class="star" type="radio" name="test-2-rating-6" value="1" disabled="disabled"/>
              <input class="star" type="radio" name="test-2-rating-6" value="2" disabled="disabled"/>
              <input class="star" type="radio" name="test-2-rating-6" value="3" disabled="disabled" checked="checked"/>
              <input class="star" type="radio" name="test-2-rating-6" value="4" disabled="disabled"/>
              <input class="star" type="radio" name="test-2-rating-6" value="5" disabled="disabled"/>
            </p>
            <p>
              <input type="submit" value="Submit scores!"/>
            </p>
          </form>
          <h2>Example 3-A - With callback</h2>
          <script>
$(function(){
 $('.auto-submit-star').rating({
  callback: function(value, link){
   // 'this' is the hidden form element holding the current value
   // 'value' is the value selected
   // 'element' points to the link element that received the click.
   alert("The value selected was '" + value + "'\n\nWith this callback function I can automatically submit the form with this code:\nthis.form.submit();");
   
   // To submit the form automatically:
   //this.form.submit();
   
   // To submit the form via ajax:
   //$(this.form).ajaxSubmit();
  }
 });
});
</script>
          <form id="form3A">
            <div class="test"> <span style="color:#FF0000">Results will be displayed here</span> </div>
            <p>Rating 1: (1 - 3, default 2)
              <input class="auto-submit-star" type="radio" name="test-3A-rating-1" value="1"/>
              <input class="auto-submit-star" type="radio" name="test-3A-rating-1" value="2" checked="checked"/>
              <input class="auto-submit-star" type="radio" name="test-3A-rating-1" value="3"/>
            </p>
            <p>
            <pre>$('.auto-submit-star').rating({
  callback: function(value, link){
  	alert(value);
  }
});</pre>
            </p>
            <p>
              <input type="submit" value="Submit scores!"/>
            </p>
          </form>
          <h2>Example 3-B With hover effects</h2>
          <script>
$(function(){
 $('.hover-star').rating({
  focus: function(value, link){
    // 'this' is the hidden form element holding the current value
    // 'value' is the value selected
    // 'element' points to the link element that received the click.
    var tip = $('#hover-test');
    tip[0].data = tip[0].data || tip.html();
    tip.html(link.title || 'value: '+value);
  },
  blur: function(value, link){
    var tip = $('#hover-test');
    $('#hover-test').html(tip[0].data || '');
  }
 });
});
</script>
          <form id="form3B">
            <div class="test"> <span style="color:#FF0000">Results will be displayed here</span> </div>
            <p>Rating 1: (1 - 3, default 2) </p>
            <p>
              <input class="hover-star" type="radio" name="test-3B-rating-1" value="1" title="Very poor"/>
              <input class="hover-star" type="radio" name="test-3B-rating-1" value="2" title="Poor"/>
              <input class="hover-star" type="radio" name="test-3B-rating-1" value="3" title="OK"/>
              <input class="hover-star" type="radio" name="test-3B-rating-1" value="4" title="Good"/>
              <input class="hover-star" type="radio" name="test-3B-rating-1" value="5" title="Very Good"/>
              <span id="hover-test" style="margin:0 0 0 20px;">Hover tips will appear in here</span> </p>
            <p>
            <pre>$('.hover-star').rating({
  focus: function(value, link){
    var tip = $('#hover-test');
    tip[0].data = tip[0].data || tip.html();
    tip.html(link.title || 'value: '+value);
	},
  blur: function(value, link){
    var tip = $('#hover-test');
    $('#hover-test').html(tip[0].data || '');
  }
});</pre>
            </p>
            <p>
              <input type="submit" value="Submit scores!"/>
            </p>
          </form>
          <h2>Example 4 - <strong>Half Stars</strong> and <strong>Split Stars</strong></h2>
          <form id="form4">
            <div class="test"> <span style="color:#FF0000">Results will be displayed here</span> </div>
            <p>Rating 1: (N/M/Y/?)</p>
            <p>
              <input class="star {half:true}" type="radio" name="test-4-rating-1" value="N" title="No"/>
              <input class="star {half:true}" type="radio" name="test-4-rating-1" value="M" title="Maybe"/>
              <input class="star {half:true}" type="radio" name="test-4-rating-1" value="Y" title="Yes"/>
              <input class="star {half:true}" type="radio" name="test-4-rating-1" value="?" title="Don't Know"/>
            </p>
            <br />
            <p>
            <pre class="code">&lt;input class="star {half:true}"</pre>
            </p>
            <p> Rating 2: (10 - 60)</p>
            <p>
              <input class="star {split:3}" type="radio" name="test-4-rating-2" value="10"/>
              <input class="star {split:3}" type="radio" name="test-4-rating-2" value="20"/>
              <input class="star {split:3}" type="radio" name="test-4-rating-2" value="30"/>
              <input class="star {split:3}" type="radio" name="test-4-rating-2" value="40"/>
              <input class="star {split:3}" type="radio" name="test-4-rating-2" value="50"/>
              <input class="star {split:3}" type="radio" name="test-4-rating-2" value="60"/>
            </p>
            <br />
            <p>
            <pre class="code">&lt;input class="star {split:3}"</pre>
            </p>
            <p> Rating 3: (0-5.0, default 3.5)</p>
            <p>
              <input class="star {split:2}" type="radio" name="test-4-rating-3" value="0.5"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-3" value="1.0"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-3" value="1.5"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-3" value="2.0"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-3" value="2.5"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-3" value="3.0"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-3" value="3.5" checked="checked"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-3" value="4.0"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-3" value="4.5"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-3" value="5.0"/>
            </p>
            <br />
            <p>
            <pre class="code">&lt;input class="star {split:2}"</pre>
            </p>
            <p> Rating 4: (1-6, default 5)</p>
            <p>
              <input class="star {split:2}" type="radio" name="test-4-rating-4" value="1" title="Worst"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-4" value="2" title="Bad"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-4" value="3" title="OK"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-4" value="4" title="Good"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-4" value="5" title="Best" checked="checked"/>
              <input class="star {split:2}" type="radio" name="test-4-rating-4" value="6" title="Bestest!!!"/>
            </p>
            <br />
            <p>
            <pre class="code">&lt;input class="star {split:2}"</pre>
            </p>
            <p> Rating 5: (1-20, default 11)</p>
            <p>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="1"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="2"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="3"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="4"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="5"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="6"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="7"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="8"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="9"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="10"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="11" checked="checked"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="12"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="13"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="14"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="15"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="16"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="17"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="18"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="19"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-5" value="20"/>
            </p>
            <br />
            <p>
            <pre class="code">&lt;input class="star {split:4}"</pre>
            </p>
            <p> Rating 6 (readonly): (1-20, default 13)</p>
            <p>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="1" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="2" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="3" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="4" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="5" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="6" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="7" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="8" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="9" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="10" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="11" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="12" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="13" disabled="disabled" checked="checked"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="14" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="15" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="16" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="17" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="18" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="19" disabled="disabled"/>
              <input class="star {split:4}" type="radio" name="test-4-rating-6" value="20" disabled="disabled"/>
            </p>
            <br />
            <p>
            <pre class="code">&lt;input class="star {split:4}"</pre>
            </p>
            <p>
              <input type="submit" value="Submit scores!"/>
            </p>
          </form>
          <h2>NEW to v3</h2>
          <p>API methods can be invoked this this:</p>
          <pre>$(selector).rating(
  'method', // method name
  [] // method arguments (not required)
);</pre>
          <pre>$().rating('select', index / value)</pre>
          <p>Use this method to set the value (and display) of the star rating control via javascript. It accepts the index of the star you want to select (0 based) or its value (which must be passed as a string.</p>
          <p>Example: (values A/B/C/D/E) </p>
          <form name="api-select">
            <p>
              <input type="radio" class="star" name="api-select-test" value="A"/>
              <input type="radio" class="star" name="api-select-test" value="B"/>
              <input type="radio" class="star" name="api-select-test" value="C"/>
              <input type="radio" class="star" name="api-select-test" value="D"/>
              <input type="radio" class="star" name="api-select-test" value="E"/>
            </p>
            <p>
              <input type="button" value="Submit &raquo;" onClick="$(this).next().html( $(this.form).serialize() || '(nothing submitted)' );"/>
              <span></span> </p>
            <p>
            <p>By index:</p>
            <p>
              <input type="button" onClick="javascript:$('input',this.form).rating('select',0)" value="0"/>
              <input type="button" onClick="javascript:$('input',this.form).rating('select',1)" value="1"/>
              <input type="button" onClick="javascript:$('input',this.form).rating('select',2)" value="2"/>
              <input type="button" onClick="javascript:$('input',this.form).rating('select',3)" value="3"/>
              <input type="button" onClick="javascript:$('input',this.form).rating('select',4)" value="4"/>
            </p>
            <pre>eg.: $('input').rating('select',3) </pre>
            <p>By value:</p>
            <p>
              <input type="button" onClick="javascript:$('input',this.form).rating('select',this.value)" value="A"/>
              <input type="button" onClick="javascript:$('input',this.form).rating('select',this.value)" value="B"/>
              <input type="button" onClick="javascript:$('input',this.form).rating('select',this.value)" value="C"/>
              <input type="button" onClick="javascript:$('input',this.form).rating('select',this.value)" value="D"/>
              <input type="button" onClick="javascript:$('input',this.form).rating('select',this.value)" value="E"/>
            </p>
            <pre>eg.: $('input').rating('select','C')</pre>
          </form>
          <pre>$().rating('readOnly', true / false)</pre>
          <p>Use this method to set the value (and display) of the star rating control via javascript. It accepts the index of the star you want to select (0 based) or its value (which must be passed as a string. </p>
          <p>Example: (values 1,2,3...10) </p>
          <form name="api-readonly">
            <p>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="1"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="2"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="3"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="4"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="5"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="6"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="7"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="8"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="9"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="10"/>
            </p>
            <p>
              <input type="button" value="Submit &raquo;" onClick="$(this).next().html( $(this.form).serialize() || '(nothing submitted)' );"/>
              <span></span> </p>
            <p>
              <input type="button" onClick="javascript:$('input',this.form).rating('readOnly',true)" value="Set readOnly = true"/>
            </p>
            <pre>eg.: $('input').rating('readOnly',true) </pre>
            <p>
              <input type="button" onClick="javascript:$('input',this.form).rating('readOnly',false)" value="Set readOnly = false"/>
            </p>
            <pre>eg.: $('input').rating('readOnly',false) 
or simply
$('input').rating('readOnly');</pre>
          </form>
          <h3>$().rating('disable') / $().rating('enable')</h3>
          <p>These methods bahve almost exactly as the readOnly method, however they also control whether or not the select value is submitted with the form. </p>
          <p>Example: (values 1,2,3...10) </p>
          <form name="api-readonly">
            <p>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="1"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="2"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="3"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="4"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="5"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="6"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="7"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="8"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="9"/>
              <input type="radio" class="star {split:2}" name="api-readonly-test" value="10"/>
            </p>
            <p>
              <input type="button" value="Submit &raquo;" onClick="$(this).next().html( $(this.form).serialize() || '(nothing submitted)' );"/>
              <span></span> </p>
            <p>
              <input type="button" onClick="javascript:$('input',this.form).rating('disable')" value="disable"/>
            </p>
            <pre>eg.: $('input').rating('disable') </pre>
            <p>
              <input type="button" onClick="javascript:$('input',this.form).rating('enable')" value="enable"/>
            </p>
            <pre>eg.: $('input').rating('enable');</pre>
          </form>
        </div>
        <div id="tabs-4">
          <h2>Star Rating plugin database integration using Jquery, PHP and Mysql</h2>
          <p>Everything up to here was created by <a href="http://www.fyneworks.com/">fyneworks.com</a> and others. From here you will find database integration addition using javascript (jQuery), PHP and Mysql database.</p>
          <p>Here you will find how to use and integrate Star Rating plugin with your own database in your web-shop or web application. This example is not for begginers.</p>
          <p>Before you start tryout our example and see how it works.</p>
          <script type="text/javascript" src="rate-product-ajax.js"></script>
          <h2>Database vote example:</h2>
          <form>
            <p>
              <input class="star rate" type="radio" name="rate" value="1" />
              <input class="star rate" type="radio" name="rate" value="2" />
              <input class="star rate" type="radio" name="rate" value="3" />
              <input class="star rate" type="radio" name="rate" value="4" />
              <input class="star rate" type="radio" name="rate" value="5" />
            </p>
          </form>
          <div id="votes"></div>
          <div class="vote_count"></div>
          <br />
          <br />
          <div id="sub-tabs1">
            <ul>
              <li><a href="#sub-tab-1-html">HTML</a></li>
              <li><a href="#sub-tab-1-PHP">PHP</a></li>
              <li><a href="#sub-tab-1-javascript">JavaScript</a></li>
            </ul>
            <div id="sub-tab-1-html">
              <p>First create your HTML using jQuery Star Rating plugin:</p>
              <pre>&lt;form&gt;
&lt;input class=&quot;star rate&quot; type=&quot;radio&quot; name=&quot;rate&quot; value=&quot;1&quot; /&gt;
&lt;input class=&quot;star rate&quot; type=&quot;radio&quot; name=&quot;rate&quot; value=&quot;2&quot; /&gt;
&lt;input class=&quot;star rate&quot; type=&quot;radio&quot; name=&quot;rate&quot; value=&quot;3&quot; /&gt;
&lt;input class=&quot;star rate&quot; type=&quot;radio&quot; name=&quot;rate&quot; value=&quot;4&quot; /&gt;
&lt;input class=&quot;star rate&quot; type=&quot;radio&quot; name=&quot;rate&quot; value=&quot;5&quot; /&gt;
&lt;/form&gt;</pre>
            </div>
            <div id="sub-tab-1-PHP">
              <p>Edit config.php with your own database username, password, and database name:</p>
              <pre>&lt;?php
	$dbhost = 'localhost';
	$dbuser = 'username';
	$dbpass = 'password';
	$dbname = 'database_name';
?&gt;</pre>
              <p>Then create table in your Mysql database where you will keep your records:</p>
              <pre>CREATE TABLE `example_rate` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `product_id` int(1) NOT NULL,
  `rate` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;</pre>
              <p>Here is our PHP code (named rate-product.php if you download the whole package) that is inserting and selecting our data</p>
              <pre>
/**
 * jQuery-PHP-Mysql Star Rating
 * This jQuery-PHP-Mysql plugin was inspired and based on jQuery Star Rating Plugin (http://www.fyneworks.com/jquery/star-rating/)
 * and adapted to me for use like a plugin from jQuery.
 * @name jQuery-PHP-Mysql Star Rating
 * @author Igor Jovičić - http://www.cashmopolit.hr
 * @version v3.13
 * @date August 14, 2010
 * @category jQuery plugin
 * @copyright (c) 2010 Igor Jovičić (www.cashmopolit.hr)
 * @license CC Attribution-No Derivative Works 2.5 Brazil - http://creativecommons.org/licenses/by-nd/2.5/br/deed.en_US
 * @example Visit http://www.cashmopolit.hr/howto/jquery/how_to_jquery_php_mysql_star_rating.php for more informations about this jQuery/PHP/Mysql plugin
 */
&lt;?php
// function to retrieve
function getRate() {
  $sql= "select ifnull(round(sum(rate)/count(*),0),0) avg, count(*) count from example_rate where product_id=" . $_GET['product_id'];
  if($result=mysql_query($sql)) {
    if($row=mysql_fetch_array($result)) {
      $rate['avg'] = $row['avg'];
      $rate['count'] = $row['count'];
      echo json_encode($rate);
    }
  }
}

// function to insert rating
function rate() {
	$sql = "insert into example_rate (product_id, rate) values (" . $_GET['product_id'] . ", ".$_GET['rate'].")";
  if($result=mysql_query($sql)) {
    getRate(); //call retrieve from getRate function
  }
}

if(!empty($_GET['do'])) {
  include 'config.php';
  include 'opendb.php';  //open database connection
	
  if($_GET['do']=='rate'){
    // do rate
    rate();
  }
  else if($_GET['do']=='getRate'){
    // get rating
    getRate();
  }
}
?&gt;
                  </pre>
            </div>
            <div id="sub-tab-1-javascript">
              <p>Here is our jQuery ajax code (named rate-product-ajax.js if you download the whole package) that is calling PHP script (rate-product.php) with product_id and/or vote</p>
              <pre>&lt;script type=&quot;text/javascript&quot;&gt;
/**
 * jQuery-PHP-Mysql Star Rating
 * This jQuery-PHP-Mysql plugin was inspired and based on jQuery Star Rating Plugin (http://www.fyneworks.com/jquery/star-rating/)
 * and adapted to me for use like a plugin from jQuery.
 * @name jQuery-PHP-Mysql Star Rating
 * @author Igor Jovičić - http://www.cashmopolit.hr
 * @version v3.13
 * @date August 14, 2010
 * @category jQuery plugin
 * @copyright (c) 2010 Igor Jovičić (www.cashmopolit.hr)
 * @license CC Attribution-No Derivative Works 2.5 Brazil - http://creativecommons.org/licenses/by-nd/2.5/br/deed.en_US
 * @example Visit http://www.cashmopolit.hr/howto/jquery/how_to_jquery_php_mysql_star_rating.php for more informations about this jQuery/PHP/Mysql plugin
 */

$(document).ready(function() {
  var some_product_id=1;  //let's say it's product with id=1, if you have application you will change this variable programatically
  
  getRating(some_product_id);
  
  function getRating(id){
    $.ajax({
      type: &quot;GET&quot;,
      url: &quot;../../download/star-rating/rate-product.php&quot;,
      dataType : 'json',
      data: &quot;do=getRate&amp;product_id=&quot; + id,
      cache: false,
      async: false,
      success: function(result) {
        avg=result.avg;
        sum=result.count;
        $(&quot;#votes&quot;).html(&quot;Average:&quot; + avg);
        $(&quot;.vote_count&quot;).html(sum + &quot; vote(s)&quot;);
        $('.rate').rating('select',avg);
      },
      error: function() {
        alert(&quot;Error, please try again!&quot;);
      }
    });
  }
  
  $('.rate').click(function(){
    $.ajax({
      type: &quot;GET&quot;,
      url: &quot;../../download/star-rating/rate-product.php&quot;,
      dataType : 'json',
      data: &quot;do=rate&amp;product_id=&quot; + some_product_id + &quot;&amp;rate=&quot;+$(this).text(),
      cache: false,
      async: false,
      success: function(result) {
        avg=result.avg;
        sum=result.count;
        $(&quot;#votes&quot;).html(&quot;Average:&quot; + avg);
        $(&quot;.vote_count&quot;).html(sum + &quot; vote(s)&quot;);
        $('.rate').rating('select',avg);
      },
      error: function() {
        alert(&quot;Error, please try again!&quot;);
      }
    });
  });
});
&lt;/script&gt;</pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="footer">
  <div id="razmak" title="Cashmopolit.hr - Izrada logotipa, bannera, Flash animacija, Web stranica, SEO, Dizajn, Arhitektura"></div>
  <p class="padding_gore">&copy; 2010. Cashmopolit d.o.o., All rights reserved</p>
  <p>Design by <a href="http://www.cashmopolit.hr/" title="Cashmopolit d.o.o.">Cashmopolit d.o.o.</a> </p>
</div>
</body>
</html>