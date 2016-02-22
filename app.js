(function(){
  $.post(
    {url:"mock.php"}
  ).success(function(res){
    console.log(res);
  }).error(function(err){
    console.log("error ",err);
  })
})();
