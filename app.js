(function(){
  $.post(
    {url:"api.php"}
  ).success(function(res){
    console.log("cool ",res);
  }).error(function(err){
    console.log("error ",err);
  })
})();
