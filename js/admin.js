$(function() 
{
	$('#cpassword').change(function()
	{
      confirmPassword();
	}
	)});
  $('#password-confirm').submit(function(e){
    return confirmPassword();
    }
);
  if($('.alert').length>0){
      setTimeout(function(){
        $('.alert').slideUp(500);
      },5000);  
  }
   if($('#content').length>0){
    CKEDITOR.replace('content');
   }
   if($('#publshed_at').length>0){
       $('#publshed_at').datetimepicker();
   }

  $('.delete-data').click(function(){
    return confirm("Are You sure you want to delete this data.");
  })
  

;
  $("#featured").change(function(){

      readURL(this);

  });
function confirmPassword(){

   var password=$('#password').val();
       var cpassword=$('#cpassword').val(); 
       if (password!=cpassword) 
       {
         $('#cpassword')[0].setCustomValidity('password Do not match.');
         return false;

       }
       else
         {
         $('#cpassword')[0].setCustomValidity('');
         return true;

         }
}
  function readURL(input) {

      if (input.files && input.files[0]) {

          var reader = new FileReader();

          

          reader.onload = function (e) {
              var html= "<img class='img-fluid mt-3' src='"+e.target.result+"'>";

              $('#img-preview').html(html);

          }

          reader.readAsDataURL(input.files[0]);

      }

  }