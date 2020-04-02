function registerjournee(event,objet) 
{

    event.preventDefault();

    var $id=($(objet).attr('id'));

    console.log($id);

    var debutselected ="#heuredeb"+$id+" option:selected";

    var finselected ="#heurefin"+$id+" option:selected";

    var dispo = "#dispo"+$id;

    var $disponibilite=($(dispo).val());

    var $debutcreneau =($(debutselected).text());

    var $fincreneau=($(finselected).text());    

    console.log($disponibilite)

    console.log($debutcreneau)

    console.log($fincreneau)

    if ($disponibilite==0) 
    {

        $(debutselected).text("--:--");        

        $(finselected).text("--:--");

        //
    }


    var id_to_hide="#j"+$id;

    $.ajax({
        headers: 
        {
           'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },                    
        type:"POST",
        url:"/medecin/journées/modifier/post/ajax",

        data:{id:$id,dispo:$disponibilite,heuredeb:$debutcreneau,heurefin:$fincreneau},

        success:function(data) 
        {
    

            if ($debutcreneau>$fincreneau)  
            {
                
                $(id_to_hide).hide(500, function() 
                {
                    
                    $(id_to_hide).attr('class', 'alert alert-danger');

                    $(id_to_hide).show(1000);   

                    //    
                });

                // statement
            }
            
            if ($debutcreneau<$fincreneau && $disponibilite==0) 
            {
                
                $(id_to_hide).hide(500, function() 
                {
                    
                    $(id_to_hide).attr('class', 'alert alert-danger');

                    $(id_to_hide).show(1000);   

                    //    
                });

                // statement
            }

            if ($debutcreneau<$fincreneau && $disponibilite!=0) 
            {
                
                $(id_to_hide).hide(500, function() 
                {
                    
                    $(id_to_hide).attr('class', 'alert alert-success');

                    $(id_to_hide).show(1000);   

                    //    
                });

                // statement
            } 


            // body...
        }
    })

    // body... 
}
