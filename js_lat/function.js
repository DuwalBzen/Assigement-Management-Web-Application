$(document).ready(function () { 
    
    $('input').attr('autocomplete','off');
    
    $.ajaxSetup({
        beforeSend: function (xhr, data) {
            //if (data.url.indexOf('reallyeasyproperty.at-widget.co.uk') == -1) {
                $('.loader-overlay').show();
            //}
        },
        complete: function () {
            $('.loader-overlay').hide();
        },
        error: function () {
            $('.loader-overlay').hide();
        }
    });
});
var scripts= document.getElementsByTagName('script');
var path= scripts[scripts.length-1].src.split('?')[0];
var WEB_ROOT = path.split('/').slice(0, -2).join('/')+'/';
var BASE_URL = WEB_ROOT+'index.php/';
var FILE_DISPLAY_PATH= WEB_ROOT+"";
var ZipLengthCheck = {
	"GBR" : 6,
	"USA" : 5,
	"EGY" : 5,
	"PRT" : 7,	
	"ARE" : 5,
	"ARG" : 8,
	"ITA" : 5
};
function getPriceRange(minPrice, type, currency) {

    if (type == 'rent') {
        var data = ["100", "150", "200", "250", "300", "350", "400", "450", "500", "600", "700", "800", "900", "1000", "1100", "1200", "1250",
            "1300", "1400", "1500", "1750", "2000", "2250", "2500", "2750", "3000", "3500", "4000", "4500", "5000", "5500", "6000",
            "6500", "7000", "8000", "9000", "10000", "12500", "15000", "17500", "20000", "25000", "30000", "35000", "40000"];
        var ddData = [];
        var minPrice = (isNaN(minPrice) || minPrice == '') ? 0 : minPrice;
        $.each(data, function (key, i) {
            (i >= parseInt(minPrice)) ? ddData.push({text: currencyFormat(parseInt(i), currency) + " PCM", value: i}) : '';
        });
    } else {
        var data = ["10000", "20000", "30000", "40000", "50000", "60000", "70000", "80000", "90000", "100000", "110000", "120000", "125000", "130000", "140000", "150000",
            "160000", "170000", "175000", "180000", "190000", "200000", "210000", "220000", "230000", "240000", "250000", "260000",
            "270000", "280000", "290000", "300000", "325000", "350000", "375000", "400000", "425000", "450000", "475000", "500000",
            "550000", "600000", "650000", "700000", "800000", "900000", "1000000", "1250000", "1500000", "1750000", "2000000",
            "2500000", "3000000", "4000000", "5000000", "7500000", "10000000", "15000000", "20000000"];
        var ddData = [];
        var minPrice = (isNaN(minPrice) || minPrice == '') ? 0 : minPrice;
        $.each(data, function (key, i) {
            (i >= parseInt(minPrice)) ? ddData.push({text: currencyFormat(parseInt(i), currency), value: i}) : '';
        });
    }

    return ddData;
}

function setMinMaxPrice(propertyType)
{
    var priceArray = '';
    if (propertyType == 'sales') {
        priceArray = getPriceRange(0, 'sales', '£');
    } else {
        priceArray = getPriceRange(0, 'rent', '£');
    }

    $.each(priceArray, function (i, item) {
        $('#minPrice').append($('<option>', {
            value: item.value,
            text: item.text
        }));

        $('#maxPrice').append($('<option>', {
            value: item.value,
            text: item.text
        }));
        
        $('#minCommPrice').append($('<option>', {
            value: item.value,
            text: item.text
        }));

        $('#maxCommPrice').append($('<option>', {
            value: item.value,
            text: item.text
        }));
    });
}

function currencyFormat(n, currency) {
    return currency + " " + n.toFixed(0).replace(/./g, function (c, i, a) {
        return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
    });
}

function currencyFormatIndian(amount) {
    var x=amount;
    x=x.toString();
    var afterPoint = '';
    if(x.indexOf('.') > 0)
       afterPoint = x.substring(x.indexOf('.'),x.length);
    x = Math.floor(x);
    x=x.toString();
    var lastThree = x.substring(x.length-3);
    var otherNumbers = x.substring(0,x.length-3);
    if(otherNumbers != '')
        lastThree = ',' + lastThree;
    return res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;
}

function scrollToTarget(target, height) {
    $('html, body').animate({
        scrollTop: ($(target).offset().top - height)}, //$(".second").offset().top
    'slow');
}

function wordCount(val) {
    if (val != '') {
        return {
            charactersNoSpaces: val.replace(/\s+/g, '').length,
            characters: val.length,
            words: val.match(/\S+/g).length,
            lines: val.split(/\r*\n/).length
        };
    } else {
        return {
            charactersNoSpaces: 0,
            characters: 0,
            words: 0,
            lines: 0
        };
    }
}

function calculateMortgage(balance, rate, term) {

    var period = 12; // 52 - Weekly 26 - Biweekly 12 - Monthly 6 - Bimonthly

    var N = term * period;
    var I = (rate / 100) / period;
    var v = Math.pow((1 + I), N);
    var t = (I * v) / (v - 1);
    var result = (balance * t).toFixed(2);

    return {'payment': result, 'interest': ((balance * rate / 100 / period)).toFixed(2)};
}

function savingCalculator(homeValue, Commission) {
    var homeValue = parseInt(homeValue);
    var Commission = parseFloat(Commission);
    var repCommission = 695;

    var agent_comm = (homeValue >= 100000) ? ((homeValue * Commission) / 100) : 1000;
    var saving = (agent_comm - repCommission);
    var saving_percent = (saving * 100) / agent_comm;

    return {'agent_comm': agent_comm, 'saving': saving, 'percent': saving_percent};
}

function scrollToTarget(target, height) {
    $('html, body').animate({
        scrollTop: ($(target).offset().top - height)}, //$(".second").offset().top
    'slow');
}

function displayAdsInSlot(adSlotId){
        
        var jsonData= {slotId:adSlotId};
        $.ajax({
                url: BASE_URL+"showAd" , //'<?php //echo BASE_URL . "showAd"; ?>',
                type: 'post',
                data: jsonData,
                dataType: 'json',
                beforeSend: function() {
                    
                },
                success: function(response) {
                    //console.log(response);
                    var file_path=FILE_DISPLAY_PATH +"adImages/"; //'<?php //echo FILE_DISPLAY_PATH; ?>';
                   
                    if(response!=''){
                        var ls= 'as_'+adSlotId; //slot_slotId_adId
                        var adData='';
                        var isLast=true;
                        //get prev store ads id 
                        var prevAdId = localStorage.getItem(ls);
                        //console.log(prevAdId);
                        
                        if(prevAdId!=null){
                        $.each(response,function(key,value){
                            
                            if(isLast && prevAdId < value.adId){
                                adData=response[key];
                                localStorage.setItem(ls,adData.adId);
                                isLast=false; 
                            }
                        });
                        if(isLast){
                                adData=response[0];
                                localStorage.setItem(ls,adData.adId);
                            }
                    }else{
                         adData=response[0];
                        localStorage.setItem(ls,adData.adId);
                    }
                        var adhtml=" <a href='http://"+adData.adUrl+ "' target='_blank' > <img style='height:100%;width: 100%;' title='"+adData.adName+"' src='"+file_path+adData.adImage+"' alt='ad image' /> </a> "; 
                        
                        $("#adSlot_"+adSlotId).html(adhtml);
                        
                        
                    }else{
                        console.log("no ads found for this ad-slot");
                        var adhtml=" <a href='#' > <img style='height:100%;width: 100%;' src='"+file_path+"default.jpg' alt='ad image' /> </a> "; 
                        $("#adSlot_"+adSlotId).html(adhtml);
                    }
                    
                },
                error: function(){
                    console.log("Error Ajax call");
                }    
            });
        
    }

function goBack() {
    window.history.back()
}

function number_format_js(number, decimals, dec_point, thousands_sep) {  
  number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k).toFixed(prec);
    };  
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}


$(document).ready(function(){
	$('#toggleMenu').on("click", function(){
	   var $selfI = $(this).children('i');
		$('#toggleNav').slideToggle();
		if( $selfI.hasClass('fa-bars') ) {
			$selfI.removeClass('fa-bars');
			$selfI.addClass('fa-times');
		}else {
			$selfI.addClass('fa-bars');
			$selfI.removeClass('fa-times');
		}
	});
}); 

/*Start make diffrent script here*/
function tec_show(tab, cls) {
	i = 1;

	while (document.getElementById("tab_" + i)) {
		document.getElementById("tab_" + i).style.display = 'none';
		document.getElementById("a" + i).className = '';
		i++;

	}
	document.getElementById(tab).style.display = 'block';
	document.getElementById(cls).className = 'sel';
}
/*End make diffrent script here*/

/*calculates percentage by taking market price and starting price*/
 function calculatePercentage(price , marketPrice) {
//     console.log(price);
//     console.log(marketPrice);
     
     var percent = (price/marketPrice) * 100;
     //console.log(percent);
     var percentage  = 100 - percent;
     return Math.floor(percentage);
 }

/*Start function for common html of property block*/
 function propertyBlockHtml(page , property, file_diplay_path, base_path, localStartBidding, localEndBidding , now ){
    
    var content = '';
    /*seo friendly property name url starts here*/
    var seo_friendly_property_name = getSeoFriendlyPropertyName(property);
    var seo_friendly_project_name= getSeoFriendlyProjectName(property);
    var seo_friendly_developer_name = getSeoFriendlyDeveloperName(property);
    /*seo friendly property name url ends here*/
     
    var percentage = calculatePercentage(parseInt(property.startBidAmount) , parseInt(property.currentMarketValueAmount))
    //console.log(percentage);
    var priceText = (property.auction_type != '3') ?'Starting Bid : ' : 'Guide Price : ';
       var address = '';
                        address += ($.trim(property.propertyAddress)) ? property.propertyAddress : '';
                        //address += ($.trim(property.cityName)) ? ', ' + property.cityName : '';
                        if (address.length > 83) {
                            address = address.substr(0, 83);
                            address += '...';
                        }
                        
          content += '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">' +
                        '<div class="property-box propertySearch-box">';
                        if (property.propertyLabel == 3) {
                            content += '<div class="sold-con"><img src="' + file_diplay_path + 'images_lat/icons/sold.png" /></div>';
                        }
                        var banner = '';
                        if (property.featured !== '0') {
                            if(typeof(percentage) !== undefined && !isNaN(percentage) && percentage > 5){
                                 banner = '<div class="badgeProperty">Going <span>'+percentage+'%</span> Lesser Than Market Price </div>';
                            } 
                        } 
                        content += '<div class="img-con"><a href="' + base_path + 'details/' + seo_friendly_property_name + '"><img src="' + file_diplay_path + 'propertyImage/Thumb/' + property.propertyImages + '" />' + banner + '</a></div>' +
                                '<div class="name-con"><div class="pro-detail"><a href="' + file_diplay_path + 'details/' + seo_friendly_property_name + '">' + property.propertyName + '</a></div>';
                        
                         if(property.auction_type != '2'){
                            if (typeof (property.projectId) !== undefined && property.projectId !== null && property.projectId !== '0') {
                                content += '<div class="pro-detail p-detail"><a href="' + base_path + 'project/' + seo_friendly_project_name + '">' + property.projectName + '</a></div>';
                            }
                            content += '<div class="name-left-con">';
                            if (property.developerName) {
                                var name = property.developerName;

                                content += '<span> <a href="' + base_path + 'developer/' + seo_friendly_developer_name + '">' + name + '</a></span>';
                            }
                        } else {
                            if (property.institution) {
                                content += '<div class="pro-detail p-detail"><a href="javascript:void(0);">' + property.institution+ '</a></div>';
                            }
                            content += '<div class="name-left-con">';
                            if (property.institutionBranch) {
                                var name = property.institutionBranch;

                                content += '<span> <a href="javascript:void(0);">' + name + '</a></span>';
                            }
                        }
                        content += '<i class="fa fa-map-marker"></i> &nbsp;' + address;


                        content += '</div>' +
                                '</div>' +
                                '<div class="price-con"><span>' + priceText + '</span>' + property.start_bid + '</div>' +
                                '<div class="price-con"><span>Market Estimate :</span> ' + property.current_market_value + '</div>' +
                                '<div class="place-bid-con">' +
                                '<ul>';
                        var bidText = (property.auction_type != '3') ? (new Date(now) > new Date(localStartBidding) ? 'Bid Now' : 'Register Now') : 'Make an Offer';
                        var soldText = '<a href="javascript:void(0);" onclick = "checkPlaceBid(' + property.propertyId + ' , ' + property.auction_type + ',\'' + seo_friendly_property_name + '\');"><i class="fa fa-gavel"></i> ' + bidText + '</a>';
                        if (property.propertySold == '1') {
                            soldText = '<a style = "background-color:rgba(212, 10, 16, 0.5);" href="javascript:void(0);">Sold</a>';
                        } else {
                            if (property.saleStatus != '34' && property.saleStatus != '35' && property.saleStatus != '37') {
                                if (new Date(now) > new Date(localEndBidding)) {
                                    soldText = '<a style = "background-color:rgba(212, 10, 16, 0.5);" href="javascript:void(0);"><span>Expired</span></a>';
                                }
                            }
                        }
                        content += '<li>' + soldText + '</li>' +
                                '<li><a href="' + base_path + 'details/' + seo_friendly_property_name + '">Read more</a></li>' +
                                '</ul>' +
                                '</div>' +
                                '<div class="detail-con">' +
                                '<ul>' +
                                '<li><a href="javascript:void(0);"><span><img src="' + file_diplay_path + 'images_lat/icons/detail-sm-icon1.png" /></span>' + property.homeSquareFootage + ' </a></li>' +
                                '<li><a href="javascript:void(0);"><span><img src="' + file_diplay_path + 'images_lat/icons/detail-sm-icon2.png" /></span>' + property.bedrooms + '</a></li>' +
                                '<li><a href="javascript:void(0);"><span><img src="' + file_diplay_path + 'images_lat/icons/detail-sm-icon3.png" /></span>' + property.baths + '</a></li>' +
                                '</ul>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

     
    return content;
 }
 



/*Endfunction for common html of property block*/


function getSeoFriendlyPropertyName(property) {
    var seo_friendly_property_name = '';
    if (property.propertyName !== '' && property.propertyName != null) {
        seo_friendly_property_name += property.propertyName.trim().replace(/[^A-Za-z0-9-]+/g, "-");
    }
    if (property.cityName !== '' && property.cityName != null) {
        seo_friendly_property_name += '-' + property.cityName.trim().replace(/[^A-Za-z0-9-]+/g, "-");
    }
    if (property.stateName !== '' && property.stateName != null) {
        seo_friendly_property_name += '-' + property.stateName.trim().replace(/[^A-Za-z0-9-]+/g, "-");
    }
    seo_friendly_property_name += '-' + property.propertyId;
    return seo_friendly_property_name;
}

function getSeoFriendlyProjectName(property) {
    var seo_friendly_project_name = '';
    if (property.projectName != '' && property.projectName != null) {
        seo_friendly_project_name = property.projectName.replace(/ /g, "-");
    }
    seo_friendly_project_name += '-' + property.projectId;
    return seo_friendly_project_name;
}

function getSeoFriendlyDeveloperName(property) {
    var seo_friendly_developer_name = '';
    if (property.developerName != '' && property.developerName != null) {
        seo_friendly_developer_name = property.developerName.replace(/ /g, "-");
    }
    seo_friendly_developer_name += '-' + property.developerId;
    return seo_friendly_developer_name;
}
