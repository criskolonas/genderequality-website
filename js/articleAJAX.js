  //ajax request to delete specified article
  function deleteArticle(articleId){
    $(document).ready(function(){
      $.ajax({
          url:'articleDelete.php',
          data:{'id':articleId},
          success: function(Response){
            location.reload();
          }
      });
      });

  };
//ajax request to view specified article
function previewArticle(articleId){
  $(document).ready(function(){
    $.ajax({
        url:'articlePreview.php',
        dataType:"json",
        data:{'id':articleId},
        success: function(Response){
	console.log("hello")
          $('#update_id').val(articleId);
          $('#arName').val(Response.articleName);
          $('#arContent').val(Response.articleContent);
          $('#arImage').val(Response.articleImage);
        }
    });
    });

};
