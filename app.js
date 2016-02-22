(function(){
  $.post(
    {url:"mock.php"}
  ).success(function(res){
    init(res);
  }).error(function(err){
    console.log("error ",err);
  })

  function init(res){
    var instagramArray = JSON.parse(res).data;
    var sliderImagesHtml = imageListItemHtml(instagramArray);
    renderSlider(sliderImagesHtml);
  }

  function renderSlider(sliderImagesHtml){
    var $slider = $('<div id="dog-carousel">').append(sliderImagesHtml);
    $('body').append($slider);
    $slider.slick();
  }

  function imageListItemHtml(unfilteredArray, currentHtmlStirng){
    var html = currentHtmlStirng || ''

    if (
        unfilteredArray[0].type === "image" &&
        unfilteredArray[0].images &&
        unfilteredArray[0].images.standard_resolution &&
        unfilteredArray[0].images.standard_resolution.url
      ) {
      html += '<li><image src="' + unfilteredArray[0].images.standard_resolution.url + '"></li>';
    }

    var remainingArray = unfilteredArray.slice(1);

    if (remainingArray.length) {
      return imageListItemHtml(remainingArray, html);
    } else {
      return html;
    }
  }

})();
