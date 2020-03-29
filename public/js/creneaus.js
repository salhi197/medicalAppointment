$("#post").hide();

$(".modif").click(function(event) 
{   
    
    event.preventDefault();

    var $id=($(this).attr('id'));

    var $i=($(this).attr('name'));            

    var $limite=($(this).parent().prev().children().val());

    var $fin=($(this).parent().prev().prev().children().val());

    var $debut=($(this).parent().prev().prev().prev().children("div").children("label").children("input").val());

    $.ajax({
        headers: 
        {
           'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },                    
        type:"POST",
        url:"/medecin/modifiercreneau/ajax",
        data:{id:$id,limite:$limite,fin:$fin,debut:$debut},

        success:function(data) 
        {

            var the_hidden="#lotfi"+$i;    

            if($debut<$fin)
            {

                $(the_hidden).hide(500,function() 
                {
                            
                    $(the_hidden).show(1500);
                    
                    $(the_hidden).attr('class', 'alert alert-success');    

                    // body... 
                });
                
                ($(this).parent().prev().children().val(data.limite));

                ($(this).parent().prev().prev().children().val(data.fin));

                ($(this).parent().prev().prev().prev().children("div").children("label").children("input").val(data.debut));

                //
            }
            else
            {

                $(the_hidden).hide(500,function() 
                {
                            
                    $(the_hidden).show(1500);
                    
                    $(the_hidden).attr('class', 'alert alert-danger');    

                    // body... 
                });


                //
            }


            // body...
        },

        error: function (jqXHR, exception) 
        {


            var the_hidden="#lotfi"+$i;     
                
            $(the_hidden).hide(500,function() 
            {
                        
                $(the_hidden).show(1500);
                
                $(the_hidden).attr('class', 'alert alert-danger');    

                // body... 
            });


            var msg = '';
            
            if (jqXHR.status === 0) 
            {
                msg = 'Not connect.\n Verify Network.';
            } 
            else if (jqXHR.status == 404) 
            {
                msg = 'Requested page not found. [404]';
            } 
            else if (jqXHR.status == 500) 
            {
                msg = 'Le début du créneau est supérieur a sa fin';
            } 
            else if (exception === 'parsererror') 
            {
                msg = 'Requested JSON parse failed.';
            } 
            else if (exception === 'timeout') 
            {
                msg = 'Time out error.';
            } 
            else if (exception === 'abort') 
            {
                msg = 'Ajax request aborted.';
            } 
            else 
            {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            
            $('#post').html(msg);

            $('#post').attr('class', 'alert alert-warning');

            $('#post').attr('style', 'clor:white');

            
            $('#post').show(2000);


            setTimeout(function()
            {

                $('#post').hide(1000);

                //
            },5000);
                      
        }                
    })


    /* Act on the event */
});
