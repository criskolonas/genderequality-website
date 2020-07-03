//ajax request to view specified article
function previewMember(userId){
  $(document).ready(function(){
    $.ajax({
        url:'fetchMemData.php',
        dataType:"json",
        data:{'uid':userId},
        success: function(Response){
	        $('#update_id').val(userId);
          $('#urName').val(Response.username);
          $('#uremail').val(Response.useremail);
          $('#urbio').val(Response.userbio);
	        $('#isadmin').val(Response.useradmin);
        }
    });
    });

};

      function deleteMember(){
          var id =document.getElementById('update_id').value;
          $.ajax({
              url:'deleteMember.php',
              data:{'id':id},
              success: function(Response){
                location.reload();
              }
          });
        };
