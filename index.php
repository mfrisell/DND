<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<meta name="viewport" content="width=320, initial-scale=1, user-scalable=no, minimal-ui">
<title>Knukk Lee</title>
<link rel="stylesheet" href="dist/css/swiper.css">
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="ionicons/css/ionicons.css">
<script type='application/javascript' src='js/fastclick.js'></script>
<script src="js/jquery-1.10.1.min.js"></script>
<script>
window.addEventListener('load', function() {
    FastClick.attach(document.body);
}, false);
</script>
<script>
function start() {
document.ontouchmove = function(e) {e.preventDefault()};

var bardinsp = {
	name: "Bardic Inspiration",
	buff: "+d8"
	}
	
var insp = {
	name: "Inspiration",
	buff: "Advantage"
	}

var tmpBuff = [bardinsp, insp];

var stats = {
	strength:12,
	dexterity:18,
	constitution:13,
	intelligence:8,
	wisdom:16,
	charisma:10
	};

var statsProf = {
	strength: [[1, "Saving Throws"], [1, "Athletics"]],
	dexterity: [[1, "Saving Throws"], [0, "Acrobatics"], [0, "Sleight of Hand"], [1, "Stealth"]],
	constitution: [[0, "Saving Throws"]],
	intelligence: [[0, "Saving Throws"], [0, "Arcana"], [0, "History"], [0, "Investigation"], [0, "Nature"], [1, "Religion"]],
	wisdom: [[0, "Saving Throws"], [0, "Animal Handling"], [0, "Insight"], [0, "Medicine"], [0, "Perception"], [1, "Survival"]],
	charisma: [[0, "Saving Throws"], [0, "Deception"], [0, "Intimidation"], [0, "Performance"], [0, "Persuasion"]]
};

var lvl = 10;
var proficiency = Math.floor((lvl-1)/4)+2;

var name = "Knukk Lee";
$("#name").html(name);

var conMod = Math.floor((stats.constitution-10)/2);
var totHealth = 10+conMod+2*(6+conMod)+(lvl-3)*(5+conMod);
var tmpHealth = 13;
var health = 27;
var healthProcent = (health/totHealth)*100;
var tmpHealthProcent = (tmpHealth/totHealth)*100;
var tmpAndHealth = health+tmpHealth;

$("#bottomMenuHealthNumbHolder").html(tmpAndHealth);
$("#bottomMenuHealthNumbBack").html(tmpAndHealth);

$("#bottomMenuHealthRemaining").css("height", healthProcent + "%");
$("#bottommenuHealtTmp").css("height", tmpHealthProcent + "%");
$("#bottommenuHealtTmp").css("bottom", healthProcent + "%");
var tmpAndHealthProcent = healthProcent+tmpHealthProcent;
$("#bottomMenuHealthNumb").css("height", tmpAndHealthProcent + "%");

var maxKi = lvl-3;
var remainingKi = maxKi;

var tmpSpots = "";
for(iVal=0;iVal<remainingKi;iVal++) {
	tmpSpots += "<div class='tmpHealthDot' style='transform: rotate("+2*iVal+"0deg);'>&#149;</div>";
}

$("#bottomMenuTmpHealthHolder").html(tmpSpots);

var ac = 10 + (Math.floor((stats.wisdom-10)/2)) + (Math.floor((stats.dexterity-10)/2));

$(".ac").html(ac);

$(".init").html(Math.floor((stats.dexterity-10)/2));

$.each( stats, function( key, value ) {
	var threeKey = key.slice(0,3);
  	var mod = Math.floor((value-10)/2);
  
  	var startStr = "";
  	var statTypeProfNumber = "";
  
  	$.each(statsProf[key], function( index, val ) {
		if(val[0]==1) {
			prof = mod + proficiency;
		  	startStr += "<div class='statProf'><div class='statProfHolder'>"+ prof + "</div> " + val[1] + " &#149;</div>";
		  	statTypeProfNumber +=" &#149";
	  	} else {
		  	startStr += "<div class='statProf'><div class='statProfHolder'>"+ mod + "</div> " + val[1] + "</div>";
		}
  });
  
  var insert = '<div class="stat">'+mod+'<div class="statSmallOuter '+threeKey+'"><div class="statSmall">'+value+'</div></div><div class="statType">'+key+'<div class="statTypeProf">'+statTypeProfNumber+'</div></div></div><div class="stats">';
  
$(".menuObject" + "." + key.slice(0,3)).html(insert + startStr + "</div></div>");
  
  if(tmpBuff.length>0) {
	  $('.tmpBrick').html(tmpBuff.length);
	  $('.tmpBrick').addClass('tmpBrickVisible');
	  var writeThisToTemp = "";
	  $.each(tmpBuff, function(ind, objects) {
		  writeThisToTemp += "<div class='tmpBuffObject'><div class='tmpBuffObjectRemove'>X</div>"+objects.name+"</div>";
	  });
	  $('.mainTempSlide').html(writeThisToTemp);
	}
  
});

}

function openFact(n) {
	$('.menuObject').each(function(i, obj) {
    	$('.menuObject').removeClass('open');
		$('.menuObject').children('.stats').removeClass('statsOpen');
		$('.menuObject').children('.stat').removeClass('statMin')
		$('.menuObject').children('.stat').children('.statType').removeClass('statTypeMax')
		
	});

	$(n).addClass("open");
	$(n).children('.stats').addClass('statsOpen');
	$(n).children('.stat').addClass('statMin');
	$(n).children('.stat').children('.statType').addClass('statTypeMax');
	console.log(n);
}

function openStuff(y) {
	if(y==0) {
		if(swiperH.activeIndex==0) {
			swiperH.slideNext();
		} else {
			swiperH.slidePrev();
		}
	} else {
		if(swiperV.activeIndex==0) {
			swiperV.slideNext();
		} else {
			swiperV.slideTo(0, 300);
		}
	}
	
}

</script>
</head>
<body onLoad="start();">
    <!-- Swiper -->
    <div class="swiper-container swiper-container-h">
        <div class="swiper-wrapper">
            <div class="swiper-slide menu">
            	<div class="menuObject str" onClick="openFact(this);">
            	</div>
            	<div class="menuObject dex" onClick="openFact(this);">
           		</div>
            	<div class="menuObject con" onClick="openFact(this);">
            	</div>
            	<div class="menuObject int" onClick="openFact(this);">
            	</div>
            	<div class="menuObject wis" onClick="openFact(this);">
            	</div>
            	<div class="menuObject cha" onClick="openFact(this);">
            	</div>
            </div>
            <div class="swiper-slide main">
                <div class="swiper-container swiper-container-v">
                    <div class="swiper-wrapper">
                    	<div class="swiper-slide mainTempSlide">
                        </div>
                        <div class="swiper-slide mainFirstSlide">
                        	<div class="mainFirstSlideStandard">
                            	<div id="image"></div>
                                <div class="attribute">
                                	<div class="attributeHeader">Armor Class</div>
                                    <div class="attributeNumber ac"></div>
                                </div>
                                <div class="attribute">
                                	<div class="attributeHeader">Initiative</div>
                                    <div class="attributeNumber init"></div>
                                </div>
                                <div class="attribute">
                                	<div class="attributeHeader">Speed</div>
                                    <div class="attributeNumber speed">40</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mainSecondSlide">
                        	<div id="secondSlideTop"></div>
                            <div id="secondSlideRest">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="topMenu">
                	<div id="openMenu" onclick="openStuff(0);">
                    <div class="openMenu ion-ios-settings"></div>
                    </div>
                    <div id="name"></div>
                    <div id="openTemp" onclick="openStuff(1);">
                    	<div class="openTemp ion-ios-alarm-outline"></div>
                        <div class="tmpBrick"></div>
                    </div>
                </div>
            	<div id="bottomMenu">
                	<div id="bottomMenuTmpHealthHolder">
                    </div>
                	<div id="bottomMenuHealth">
                    	<div id="bottomMenuHealthNumbBack"></div>
                    	<div id="bottomMenuHealthRemaining"></div>
                        <div id="bottommenuHealtTmp"></div>
                        <div id="bottomMenuHealthNumb">
                        	<div id="bottomMenuHealthNumbHolder"></div>
                        </div>
                    </div>
                	<div id="bottomMenuTopShadow">
                		<div id="bottomMenuTopTriangleShadow"></div>
                	</div>
            		<div id="bottomMenuTop">
                		<div id="bottomMenuTopTriangle"></div>
                	</div>
                    
                	<div id="bottomMenuBottom"></div>
            	</div>
                
            </div>
        </div>
        <!-- Add Pagination -->
    </div>

    <!-- Swiper JS -->
    <script src="dist/js/swiper.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiperH = new Swiper('.swiper-container-h', {
		initialSlide:1,
		slidesPerView: 'auto',
		resistance: true,
		resistanceRatio:0,
		onTransitionEnd: function(swiperH) {
			if(swiperH.activeIndex==0) {
				$('.openMenu').removeClass('ion-ios-settings').addClass('ion-ios-settings-strong');
			} else {
				$('.openMenu').removeClass('ion-ios-settings-strong').addClass('ion-ios-settings');
			}
		}
    });
    var swiperV = new Swiper('.swiper-container-v', {
        direction: 'vertical',
		slidesPerView: "auto",
		resistance: true,
		resistanceRatio:0.5,
		initialSlide:1,
		onTransitionEnd: function(swiperV) {
			if(swiperV.activeIndex==0) {
				$('.openTemp').removeClass('ion-ios-alarm-outline').addClass('ion-ios-alarm');
			} else {
				$('.openTemp').removeClass('ion-ios-alarm').addClass('ion-ios-alarm-outline');
			}
		}
    });
    </script>
</body>
</html>