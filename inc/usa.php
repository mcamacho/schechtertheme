<?php $inc_path = get_stylesheet_directory_uri() . '/inc/'; ?>
<script language="JavaScript" type="text/JavaScript">
<!--
// Make sure the browser supports the script
if (document.images)
{
	inc_path = '<?php echo $inc_path?>';
	// Setup eaach state
	function Area(filename,site)
	{
		// Set the site to open on click
		this.site = site;
		// Set the rollover image
		this.filename = inc_path + filename;
		// Set the image for this area
		this.pic = new Image; 
		// Preload the image for the user
		this.pic.src = this.filename; 
	}
	// Go to the website for this state
	Area.prototype.nav  = function() { self.location = this.site; }
	// Show the state the mouse is over
	Area.prototype.swp  = function() { document['MAP'].src = this.filename; }
	// Show the default state
	Area.prototype.rst  = function() { document['MAP'].src = Default.filename; }
}
// Setup the default map
var Default = new Area('images/default.gif','');

// Setup each states URL
var QC = new Area('images/qc.gif','?state_id=60');
var ON = new Area('images/on.gif','?state_id=61');
var AL = new Area('images/al.gif','?state_id=2');
var AR = new Area('images/ar.gif','?state_id=5');
var AZ = new Area('images/az.gif','?state_id=4');
var CA = new Area('images/ca.gif','?state_id=6');
var CO = new Area('images/co.gif','?state_id=7');
var CT = new Area('images/ct.gif','?state_id=8');
var DC = new Area('images/dc.gif','?state_id=10');
var DE = new Area('images/de.gif','?state_id=9');
var DW = new Area('images/de.gif','?state_id=10');
var FL = new Area('images/fl.gif','?state_id=12');
var GA = new Area('images/ga.gif','?state_id=13');
var IA = new Area('images/ia.gif','?state_id=19');
var ID = new Area('images/id.gif','?state_id=16');
var IL = new Area('images/il.gif','?state_id=17');
var IN = new Area('images/in.gif','?state_id=18');
var KS = new Area('images/ks.gif','?state_id=20');
var KY = new Area('images/ky.gif','?state_id=21');
var LA = new Area('images/la.gif','?state_id=22');
var MA = new Area('images/ma.gif','?state_id=26');
var ME = new Area('images/me.gif','?state_id=23');
var MD = new Area('images/md.gif','?state_id=25');
var MI = new Area('images/mi.gif','?state_id=27');
var MN = new Area('images/mn.gif','?state_id=28');
var MO = new Area('images/mo.gif','?state_id=30');
var MS = new Area('images/ms.gif','?state_id=29');
var MT = new Area('images/mt.gif','?state_id=31');
var NC = new Area('images/nc.gif','?state_id=38');
var ND = new Area('images/nd.gif','?state_id=39');
var NE = new Area('images/ne.gif','?state_id=32');
var NH = new Area('images/nh.gif','?state_id=34');
var NJ = new Area('images/nj.gif','?state_id=35');
var NM = new Area('images/nm.gif','?state_id=36');
var NV = new Area('images/nv.gif','?state_id=33');
var NY = new Area('images/ny.gif','?state_id=37');
var OH = new Area('images/oh.gif','?state_id=41');
var OK = new Area('images/ok.gif','?state_id=42');
var OR = new Area('images/or.gif','?state_id=43');
var PA = new Area('images/pa.gif','?state_id=45');
var RI = new Area('images/ri.gif','?state_id=47');
var SC = new Area('images/sc.gif','?state_id=48');
var SD = new Area('images/sd.gif','?state_id=49');
var TN = new Area('images/tn.gif','?state_id=50');
var TX = new Area('images/tx.gif','?state_id=51');
var UT = new Area('images/ut.gif','?state_id=52');
var VA = new Area('images/va.gif','?state_id=55');
var VT = new Area('images/vt.gif','?state_id=53');
var WA = new Area('images/wa.gif','?state_id=56');
var WV = new Area('images/wv.gif','?state_id=57');
var WY = new Area('images/wy.gif','?state_id=59');
var WI = new Area('images/wi.gif','?state_id=58');
//-->
</script>

<img src="<?php echo $inc_path?>images/default.gif" name="MAP" border="0" usemap="#MAP">

<map name="MAP">
  <area onMouseOver="DE.swp()" onMouseOut="DE.rst()" onclick="DE.nav()" shape="poly" coords="446,275,451,275,444,263,442,265">
<area onMouseOver="RI.swp()" onMouseOut="RI.rst()" onclick="RI.nav()" shape="poly" coords="467,230,468,234,477,237,484,242,495,242,495,230,483,232,481,225">
<area onMouseOver="MD.swp()" onMouseOut="MD.rst()" onclick="MD.nav()" shape="poly" coords="449,288,452,277,447,276,442,269,438,269,443,273">
<area onMouseOver="WI.swp()" onMouseOut="WI.rst()" onclick="WI.nav()" shape="poly" coords="339,257,316,257,311,254,312,250,312,247,310,243,299,235,297,227,300,221,299,216,301,211,310,209,312,212,317,216,324,216,331,217,336,224,339,226,340,235">
<area onMouseOver="MI.swp()" onMouseOut="MI.rst()" onclick="MI.nav()" shape="poly" coords="349,261,375,257,379,251,382,244,381,238,379,233,371,229,371,224,369,218,363,214,367,211,361,206,354,203,347,204,339,208,330,204,335,199,329,198,319,206,314,210,317,214,328,214,333,216,337,221,344,217,348,216,352,215,352,218,352,223,347,225,346,229,345,235,345,241,349,249">
<area onMouseOver="DC.swp()" onMouseOut="DC.rst()" onclick="DC.nav()" shape="poly" coords="411,272,433,267,436,267,443,275,446,285,436,279,436,272,427,273,424,277">
<area onMouseOver="DC.swp()" onMouseOut="DC.rst()" onclick="DC.nav()" shape="rect" coords="455,287,474,300">
<area onMouseOver="WY.swp()" onMouseOut="WY.rst()" onclick="WY.nav()" shape="poly" coords="150,270,157,228,207,234,206,275,174,272">
<area onMouseOver="WV.swp()" onMouseOut="WV.rst()" onclick="WV.nav()" shape="poly" coords="390,290,398,277,405,273,411,274,421,275,407,300,399,301,392,296">
<area onMouseOver="WA.swp()" onMouseOut="WA.rst()" onclick="WA.nav()" shape="poly" coords="80,166,122,174,113,200,109,208,105,207,84,205,73,203,60,191,63,165">
<area onMouseOver="VA.swp()" onMouseOut="VA.rst()" onclick="VA.nav()" shape="poly" coords="389,312,405,310,449,297,445,289,441,281,435,279,435,274,424,273,415,286,411,298,397,303">
<area onMouseOver="VT.swp()" onMouseOut="VT.rst()" onclick="VT.nav()" shape="poly" coords="450,224,454,223,455,208,457,200,456,196,442,202">
<area onMouseOver="VT.swp()" onMouseOut="VT.rst()" onclick="VT.nav()" shape="rect" coords="418,187,434,202">
<area onMouseOver="UT.swp()" onMouseOut="UT.rst()" onclick="UT.nav()" shape="poly" coords="118,311,126,256,149,261,148,272,164,273,159,316">
<area onMouseOver="TX.swp()" onMouseOut="TX.rst()" onclick="TX.nav()" shape="poly" coords="175,378,213,378,213,328,238,327,239,346,247,352,262,357,276,357,286,354,294,359,296,373,300,380,301,391,298,407,285,417,274,423,269,432,271,448,249,443,243,433,237,424,230,411,225,407,217,405,213,414,199,409,192,394,181,386">
<area onMouseOver="TN.swp()" onMouseOut="TN.rst()" onclick="TN.nav()" shape="poly" coords="336,322,402,310,397,317,379,332,329,340">
<area onMouseOver="SD.swp()" onMouseOut="SD.rst()" onclick="SD.nav()" shape="poly" coords="209,224,264,224,265,232,268,237,266,245,265,251,266,256,261,256,209,254">
<area onMouseOver="SC.swp()" onMouseOut="SC.rst()" onclick="SC.nav()" shape="poly" coords="389,331,417,357,419,355,428,348,435,331,419,326,412,327,407,325">
<area onMouseOver="PA.swp()" onMouseOut="PA.rst()" onclick="PA.nav()" shape="poly" coords="403,274,398,249,405,246,409,248,441,239,444,244,445,259,441,264">
<area onMouseOver="OR.swp()" onMouseOut="OR.rst()" onclick="OR.nav()" shape="poly" coords="103,250,46,238,47,226,51,221,55,212,58,203,60,198,64,196,68,203,73,203,80,206,92,206,100,207,108,208,113,214,106,227">
<area onMouseOver="OK.swp()" onMouseOut="OK.rst()" onclick="OK.nav()" shape="poly" coords="214,322,287,322,290,356,284,352,277,356,266,355,254,352,241,347,239,326,214,327">
<area onMouseOver="OH.swp()" onMouseOut="OH.rst()" onclick="OH.nav()" shape="poly" coords="363,260,371,259,397,250,402,268,400,277,392,283,388,291,380,289,369,291">
<area onMouseOver="ND.swp()" onMouseOut="ND.rst()" onclick="ND.nav()" shape="poly" coords="212,188,257,190,265,223,209,223">
<area onMouseOver="NC.swp()" onMouseOut="NC.rst()" onclick="NC.nav()" shape="poly" coords="381,332,393,321,403,311,449,299,454,305,452,316,446,320,439,334,434,333,427,327,421,324,412,327,410,323">
<area onMouseOver="NY.swp()" onMouseOut="NY.rst()" onclick="NY.nav()" shape="poly" coords="414,227,423,228,426,224,421,219,427,210,431,204,441,199,447,215,456,242,445,242,443,238,405,247,404,242,405,233">
<area onMouseOver="NM.swp()" onMouseOut="NM.rst()" onclick="NM.nav()" shape="poly" coords="163,318,212,321,212,376,168,375,162,382,156,383">
<area onMouseOver="NJ.swp()" onMouseOut="NJ.rst()" onclick="NJ.nav()" shape="poly" coords="445,243,453,244,452,252,455,255,454,262,453,267,445,263,447,257,446,250">
<area onMouseOver="NJ.swp()" onMouseOut="NJ.rst()" onclick="NJ.nav()" shape="rect" coords="458,252,473,264">
<area onMouseOver="NH.swp()" onMouseOut="NH.rst()" onclick="NH.nav()" shape="poly" coords="458,192,469,218,456,221,457,212,457,206,459,200">
<area onMouseOver="NH.swp()" onMouseOut="NH.rst()" onclick="NH.nav()" shape="rect" coords="434,171,454,186">
<area onMouseOver="NV.swp()" onMouseOut="NV.rst()" onclick="NV.nav()" shape="poly" coords="80,247,125,256,118,317,113,322,110,331,73,280">
<area onMouseOver="NE.swp()" onMouseOut="NE.rst()" onclick="NE.nav()" shape="poly" coords="208,275,206,255,245,255,249,258,253,256,266,258,271,271,277,284,220,286,221,276">
<area onMouseOver="MT.swp()" onMouseOut="MT.rst()" onclick="MT.nav()" shape="poly" coords="124,179,155,184,182,187,210,190,207,233,155,227,151,232,147,229,140,229,136,223,131,219,131,210,129,205,124,196,122,190">
<area onMouseOver="MO.swp()" onMouseOut="MO.rst()" onclick="MO.nav()" shape="poly" coords="278,281,313,279,312,288,318,294,324,297,323,305,335,315,332,327,317,324,315,325,290,327,288,299">
<area onMouseOver="MS.swp()" onMouseOut="MS.rst()" onclick="MS.nav()" shape="poly" coords="328,342,347,339,351,388,341,389,334,382,322,383,324,370,323,365,323,361,322,353">
<area onMouseOver="MN.swp()" onMouseOut="MN.rst()" onclick="MN.nav()" shape="poly" coords="259,192,265,216,265,225,268,231,268,248,310,248,308,243,297,235,297,234,296,225,298,219,297,217,298,210,303,205,320,196,308,193,291,190,281,185,272,182">
<area onMouseOver="MA.swp()" onMouseOut="MA.rst()" onclick="MA.nav()" shape="poly" coords="453,224,472,218,478,225,471,227,454,232">
<area onMouseOver="MA.swp()" onMouseOut="MA.rst()" onclick="MA.nav()" shape="rect" coords="479,212,499,223">
<area onMouseOver="MD.swp()" onMouseOut="MD.rst()" onclick="MD.nav()" shape="rect" coords="459,275,481,286">
<area onMouseOver="ME.swp()" onMouseOut="ME.rst()" onclick="ME.nav()" shape="poly" coords="460,192,469,213,471,206,472,200,476,199,477,193,479,194,484,189,488,185,482,175,479,180,475,163,462,163">
<area onMouseOver="LA.swp()" onMouseOut="LA.rst()" onclick="LA.nav()" shape="poly" coords="300,402,302,391,303,386,297,379,297,363,320,363,323,372,320,384,334,385,346,395,340,401,355,407,335,405,329,404,321,406,318,401,311,405">
<area onMouseOver="KY.swp()" onMouseOut="KY.rst()" onclick="KY.nav()" shape="poly" coords="336,321,387,312,393,306,395,301,389,295,389,289,383,291,376,290,370,289,364,297,362,301,350,305,345,307">
<area onMouseOver="KS.swp()" onMouseOut="KS.rst()" onclick="KS.nav()" shape="poly" coords="223,287,276,286,283,292,285,299,289,320,222,320">
<area onMouseOver="IA.swp()" onMouseOut="IA.rst()" onclick="IA.nav()" shape="poly" coords="265,249,311,250,309,254,315,258,320,263,314,272,314,278,308,278,274,280,273,273,270,265,270,259">
<area onMouseOver="IN.swp()" onMouseOut="IN.rst()" onclick="IN.nav()" shape="poly" coords="343,266,350,262,363,260,368,289,364,294,360,301,348,304">
<area onMouseOver="IL.swp()" onMouseOut="IL.rst()" onclick="IL.nav()" shape="poly" coords="317,258,339,257,342,265,346,297,346,304,341,312,337,317,333,310,324,305,326,297,322,296,318,291,313,284,317,268,321,266">
<area onMouseOver="ID.swp()" onMouseOut="ID.rst()" onclick="ID.nav()" shape="poly" coords="118,178,124,178,122,190,126,198,129,207,129,213,129,218,133,220,137,230,154,233,150,259,102,251,107,231,107,225,114,216,111,207">
<area onMouseOver="GA.swp()" onMouseOut="GA.rst()" onclick="GA.nav()" shape="poly" coords="370,335,392,331,398,338,404,343,410,350,417,358,417,374,382,377">
<area onMouseOver="FL.swp()" onMouseOut="FL.rst()" onclick="FL.nav()" shape="poly" coords="358,381,389,379,396,377,416,375,430,394,436,406,442,416,441,429,435,436,421,426,409,415,404,406,404,396,394,390,393,390,382,396,374,388,362,389">
<area onMouseOver="DE.swp()" onMouseOut="DE.rst()" onclick="DE.nav()" shape="rect" coords="467,264,485,274">
<area onMouseOver="CT.swp()" onMouseOut="CT.rst()" onclick="CT.nav()" shape="rect" coords="472,245,488,256">
<area onMouseOver="CT.swp()" onMouseOut="CT.rst()" onclick="CT.nav()" shape="poly" coords="454,234,465,230,467,237,457,242">
<area onMouseOver="CO.swp()" onMouseOut="CO.rst()" onclick="CO.nav()" shape="poly" coords="166,273,222,277,221,320,160,316">
<area onMouseOver="CA.swp()" onMouseOut="CA.rst()" onclick="CA.nav()" shape="poly" coords="43,239,79,247,71,280,109,332,110,341,106,352,105,361,81,359,81,345,73,341,62,337,60,332,53,329,54,318,53,313,48,304,49,299,46,292,49,288,43,282,41,274,42,265,39,257,43,249">
<area onMouseOver="AR.swp()" onMouseOut="AR.rst()" onclick="AR.nav()" shape="poly" coords="289,329,324,326,330,328,331,330,322,350,320,358,321,362,296,362,293,357">
<area onMouseOver="AZ.swp()" onMouseOut="AZ.rst()" onclick="AZ.nav()" shape="poly" coords="120,314,161,318,155,381,143,380,134,378,103,360,107,358,108,355,109,348,111,339,112,325,118,321">

<area onMouseOver="AL.swp()" onMouseOut="AL.rst()" onclick="AL.nav()" shape="poly" coords="348,338,370,336,376,362,380,378,357,380,359,390,353,386,349,368">
<area onMouseOver="ON.swp()" onMouseOut="ON.rst()" onclick="ON.nav()" shape="poly" coords="269,154,304,107,326,118,344,114,351,138,376,153,390,194,416,198,417,204,428,204,420,217,401,229,402,238,391,243,382,254,383,240,386,221,395,216,382,208,367,211,352,196,331,189,322,190,273,181">
<area onMouseOver="QC.swp()" onMouseOut="QC.rst()" onclick="QC.nav()" shape="poly" coords="344,32,359,31,366,26,379,34,388,30,398,50,415,49,413,27,453,69,432,79,450,106,468,104,460,88,471,99,507,71,497,101,458,124,458,136,451,164,465,141,478,128,484,132,470,146,461,163,458,171,434,170,432,185,416,185,416,196,392,192,376,151,364,112,373,86,352,73,353,54">
</map>