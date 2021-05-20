const mainBannerTimer = 5000
const fadingBannerTimer = 1000

$("#slideshow > a:gt(0)").hide();

setInterval(function () {
    $('#slideshow > a:first')
        .fadeOut(fadingBannerTimer)
        .next()
        .fadeIn(fadingBannerTimer)
        .end()
        .appendTo('#slideshow');
}, mainBannerTimer);
