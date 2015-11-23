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

var proficiency = 4;

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

function openMenu() {
swiperH.slidePrev();
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
                        <div class="swiper-slide mainFirstSlide">Vertical Slide 1</div>
                        <div class="swiper-slide mainSecondSlide">
                        	<div id="mainSecondButton"></div>
                        	<div id="secondSlideTop"></div>
                            <div id="secondSlideRest">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="topMenu">
                	<div id="openMenu" onclick="openMenu();"></div>
                    <div id="openTemp"></div>
                </div>
            	<div id="bottomMenu">
            		<div id="bottomMenuTop">
                		<div id="bottomMenuTopTriangle">
                    </div>
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
		resistanceRatio:0
    });
    var swiperV = new Swiper('.swiper-container-v', {
        direction: 'vertical',
		slidesPerView: "auto",
		resistance: true,
		resistanceRatio:0.5
    });
    </script>
</body>
</html>