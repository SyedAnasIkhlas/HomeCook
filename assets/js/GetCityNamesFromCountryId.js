// 
// getCityNameFromCountryId
// 

$('#country').change(function()
{
  var country_id = $(this).val();

 $.ajax
  ({
    url:"getCityFromCountry.php",
    method:"POST",
    data:{country_id:country_id},
    dataType:"text",
    success:function(data)
    {
      // alert(data)
      $("#city").html(data)
    }

  })

})